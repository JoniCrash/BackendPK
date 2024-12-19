<?php
include('../../../conf/config.php');

    // Ambil data dari POST
    $nama_Lengkap = $_POST['Nama_Lengkap'];
    $no_nik = $_POST['Nomor_Identitas_KTP'];
    $alamat_pemasangan = $_POST['Alamat_Pemasangan'];
    $latitude = $_POST['latitude'];
    $longitude = $_POST['longitude'];
    $email = $_POST['Email'];
    $no1 = $_POST['Nomor_Hp_1'];
    $no2 = $_POST['Nomor_Hp_2'];
    $paket = $_POST['nama_paket'];
    $foto_ktp = $_POST['Foto_KTP'];
    $foto_depan_rumah = $_POST['Foto_Depan_Rumah'];

    $query_paket = "SELECT id_paket FROM paket WHERE nama_paket = '$paket'";
$result_paket = mysqli_query($koneksi, $query_paket);
$paket_data = mysqli_fetch_assoc($result_paket);

// Jika nama paket ditemukan, simpan ke variabel
if ($paket_data) {
    $id_paket = $paket_data['id_paket'];
} else {
    $id_paket = ''; // Jika tidak ditemukan, kosongkan nama paket (opsional)
}

    // Proses penyimpanan ke database
    $query_insert = "INSERT INTO tb_pengajuan (
            Nama_Lengkap,
            Nomor_Identitas_KTP,
            Alamat_Pemasangan,
            latitude,
            longitude,
            Email,
            Nomor_Hp_1,
            Nomor_Hp_2,
            nama_paket,
            Foto_KTP,
            Foto_Depan_Rumah
        ) VALUES (
            '',
            '$nama_Lengkap',
            '$no_nik',
            '$alamat_pemasangan',
            '$latitude',
            '$longitude',
            '$email',
            '$no1',
            '$no2',
            '$paket',
            '$foto_ktp',
            '$foto_depan_rumah'
        )";

    if (mysqli_query($koneksi, $query_insert)) {

        // Ambil ID pengajuan yang baru saja dibuat
        $id_pengajuan = mysqli_insert_id($koneksi);
    
        // Lokasi file sementara
        $file_ktp = $_FILES['fotoktp']['name'];
        $file_depanrumah = $_FILES['fotodepanrumah']['name'];
        $file_ktp_tmp = $_FILES['fotoktp']['tmp_name'];
        $file_depanrumah_tmp = $_FILES['fotodepanrumah']['tmp_name'];
    
        // Dapatkan ekstensi file
        $file_ktp_ext = strtolower(pathinfo($file_ktp, PATHINFO_EXTENSION));
        $file_depanrumah_ext = strtolower(pathinfo($file_depanrumah, PATHINFO_EXTENSION));
    
        // Lokasi folder tujuan
        $target_dir_ktp = 'foto_ktp/';
        $target_dir_depanrumah = 'foto_depan_rumah/';
        if (!file_exists($target_dir_ktp)) mkdir($target_dir_ktp, 0777, true);
        if (!file_exists($target_dir_depanrumah)) mkdir($target_dir_depanrumah, 0777, true);
    
        // Nama file dengan ID pengajuan
        $file_ktp_name = "fotoktp_" . $id_pengajuan . "." . $file_ktp_ext;
        $file_depanrumah_name = "fotoDepanRumah_" . $id_pengajuan . "." . $file_depanrumah_ext;
    
        // Pindahkan file ke folder tujuan
        move_uploaded_file($file_ktp_tmp, $target_dir_ktp . $file_ktp_name);
        move_uploaded_file($file_depanrumah_tmp, $target_dir_depanrumah . $file_depanrumah_name);
    
        // Update database dengan nama file
        $query_update = "UPDATE tb_pengajuan
                         SET Foto_KTP = '$file_ktp_name', 
                             Foto_Depan_Rumah = '$file_depanrumah_name' 
                         WHERE id_pengajuan = $id_pengajuan";
        if (mysqli_query($koneksi, $query_update)) {
            echo "Data pengajuan dan foto berhasil disimpan.";
        } else {
            echo "Gagal memperbarui foto pengajuan: " . mysqli_error($koneksi);
        }

    }
?>
