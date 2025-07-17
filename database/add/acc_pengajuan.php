<!-- <?php
include('../conf/config.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id_pengajuan = mysqli_real_escape_string($koneksi, $_POST['id_pengajuan']);

    // Ambil data dari tabel pengajuan
    $query_pengajuan = "SELECT * FROM tb_pengajuan WHERE id_pengajuan = '$id_pengajuan'";
    $result_pengajuan = mysqli_query($koneksi, $query_pengajuan);
    $data_pengajuan = mysqli_fetch_assoc($result_pengajuan);

    if ($data_pengajuan) {        
        // Data berhasil ditemukan, pindahkan ke tabel pelanggan
        $id_pengajuan = $data_pengajuan['id_pengajuan'];
        // $nama_lengkap = $data_pengajuan['Nama_Lengkap'];
        // $nomor_ktp = $data_pengajuan['Nomor_Identitas_KTP'];
        // $alamat = $data_pengajuan['Alamat_Pemasangan'];
        // $provinsi = $data_pengajuan['provinsi'];
        // $kota = $data_pengajuan['kota'];
        // $latitude = $data_pengajuan['latitude'];
        // $longitude = $data_pengajuan['longitude']; 
        // $email = $data_pengajuan['Email'];
        // $nomor_hp_1 = $data_pengajuan['Nomor_Hp_1'];
        // $nomor_hp_2 = $data_pengajuan['Nomor_Hp_2'];
        $id_paket = $data_pengajuan['id_paket'];
        // $nama_paket = $data_pengajuan['nama_paket'];
        // $kecepatan = $data_pengajuan['kecepatan'];
        // $fotktp = $data_pengajuan['Foto_KTP'];
        // $fotodepnrumah = $data_pengajuan['Foto_Depan_Rumah'];
        // $file_name_only = basename($target_file); // ambil nama file saja tanpa folder

        // Validasi gambar
        // if (empty($fotktp) || empty($fotodepnrumah)) {
        //     echo "<script>alert('Foto KTP atau Foto Depan Rumah kosong!');</script>";
        //     exit;
        // }

        // Masukkan data ke tabel pelanggan
        $query_pelanggan = "
            INSERT INTO tb_pelanggan 
            (id_pengajuan,id_paket) 
            VALUES 
            ('$id_pengajuan','$id_paket')";

        // if (mysqli_query($koneksi, $query_pelanggan)) {
        //     // Ambil ID pelanggan yang baru saja dibuat
        //     $id_pelanggan = mysqli_insert_id($koneksi);

        //     // Lokasi folder sumber (di folder 'user')
        //     $source_dir_ktp = '../database/android/user/';
        //     $source_dir_depanrumah = '../database/android/user/';

        //     // Lokasi folder tujuan (di folder 'pelanggan')
        //     $target_dir_ktp = '../database/android/pelanggan/foto_ktp/';
        //     $target_dir_depanrumah = '../database/android/pelanggan/foto_depan_rumah/';

        //     // Pastikan folder tujuan ada, jika belum buat
        //     if (!file_exists($target_dir_ktp)) mkdir($target_dir_ktp, 0777, true);
        //     if (!file_exists($target_dir_depanrumah)) mkdir($target_dir_depanrumah, 0777, true);

        //     // Nama file baru berdasarkan ID pelanggan
        //     $file_ktp_name = "fotoktp_" . $id_pelanggan . ".jpg";  // Pastikan ekstensi sesuai dengan file yang ada
        //     $file_depanrumah_name = "fotoDepanRumah_" . $id_pelanggan . ".jpg";  // Pastikan ekstensi sesuai dengan file yang ada

        //     // Tentukan lokasi file sumber dan tujuan
        //     $source_file_ktp = $source_dir_ktp . $fotktp;
        //     $source_file_depanrumah = $source_dir_depanrumah . $fotodepnrumah;

        //     $target_file_ktp = $target_dir_ktp . $file_ktp_name;
        //     $target_file_depanrumah = $target_dir_depanrumah . $file_depanrumah_name;

// Pindahkan file dari folder user ke folder pelanggan
// if (rename($source_file_ktp, $target_file_ktp) && rename($source_file_depanrumah, $target_file_depanrumah)) {
//     // Update database dengan nama file baru yang telah dipindahkan
//     $query_update = "UPDATE tb_pelanggan 
//                      SET Foto_KTP = '$file_ktp_name', 
//                          Foto_Depan_Rumah = '$file_depanrumah_name' 
//                      WHERE id_pelanggan = $id_pelanggan";

//     if (mysqli_query($koneksi, $query_update)) {
//         // Hapus data dari tabel pengajuan
//         // $query_hapus = "DELETE FROM tb_pengajuan WHERE id_pengajuan = '$id_pengajuan'";
//         // mysqli_query($koneksi, $query_hapus);

//         echo "<script>alert('Pengajuan berhasil diterima dan ditambahkan sebagai pelanggan!'); window.location.href='index.php?page=data-pengajuan';</script>";
//     } else {
//         echo "<script>alert('Gagal memperbarui foto pelanggan: " . mysqli_error($koneksi) . "'); window.location.href='index.php?page=data-pengajuan';</script>";
//     }
// } else {
//     echo "<script>alert('Gagal memindahkan file foto!');</script>";
// }

        // } else {
        //     echo "<script>alert('Gagal menambahkan pelanggan!'); window.location.href='index.php?page=data-pengajuan';</script>";
        // }
    } else {
        echo "<script>alert('Data pengajuan tidak ditemukan!'); window.location.href='index.php?page=data-pengajuan';</script>";
    }
} else {
    echo "<script>alert('Metode tidak valid!'); window.location.href='index.php?page=data-pengajuan';</script>";
}
?> -->

<?php
include('../conf/config.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id_pengajuan = intval($_POST['id_pengajuan']);

    // Cek apakah pengajuan sudah ada di pelanggan
    $cek_query = $koneksi->prepare("SELECT id_pelanggan FROM tb_pelanggan WHERE id_pengajuan = ?");
    $cek_query->bind_param("i", $id_pengajuan);
    $cek_query->execute();
    $cek_result = $cek_query->get_result();

    if ($cek_result->num_rows > 0) {
        echo "<script>alert('Pengajuan ini sudah menjadi pelanggan!'); window.location.href='index.php?page=data-pengajuan';</script>";
        exit;
    }

    // Ambil data pengajuan
    $query = $koneksi->prepare("SELECT id_paket FROM tb_pengajuan WHERE id_pengajuan = ?");
    $query->bind_param("i", $id_pengajuan);
    $query->execute();
    $result = $query->get_result();
    $data = $result->fetch_assoc();

    if ($data) {
        $id_paket = $data['id_paket'];

        // Masukkan ke tb_pelanggan
        $insert = $koneksi->prepare("INSERT INTO tb_pelanggan (id_pengajuan, id_paket) VALUES (?, ?)");
        $insert->bind_param("ii", $id_pengajuan, $id_paket);

        if ($insert->execute()) {
            echo "<script>alert('Berhasil menyimpan data pelanggan!'); window.location.href='index.php?page=data-pengajuan';</script>";
        } else {
            echo "<script>alert('Gagal menyimpan data pelanggan!'); window.location.href='index.php?page=data-pengajuan';</script>";
        }
    } else {
        echo "<script>alert('Data pengajuan tidak ditemukan!'); window.location.href='index.php?page=data-pengajuan';</script>";
    }
} else {
    echo "<script>alert('Metode tidak valid!'); window.location.href='index.php?page=data-pengajuan';</script>";
}
?>

