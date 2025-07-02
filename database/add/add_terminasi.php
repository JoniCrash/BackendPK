<?php
include('../conf/config.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id_pelanggan = mysqli_real_escape_string($koneksi, $_POST['id_pelanggan']);

    // Ambil data dari tabel pelanggan
    $query_pelanggan = "SELECT * FROM tb_pelanggan WHERE id_pelanggan = '$id_pelanggan'";
    $result_pelanggan = mysqli_query($koneksi, $query_pelanggan);
    $data_pelanggan = mysqli_fetch_assoc($result_pelanggan);

    if ($data_pelanggan) {
        // Data berhasil ditemukan, pindahkan ke tabel terminasi
        $nama_lengkap = $data_pelanggan['Nama_Lengkap'];
        $nomor_ktp = $data_pelanggan['Nomor_Identitas_KTP'];
        $alamat = $data_pelanggan['Alamat_Pemasangan'];
        $provinsi = $data_pelanggan['provinsi'];
        $kota = $data_pelanggan['kota'];
        $latitude = $data_pelanggan['latitude'];
        $longitude = $data_pelanggan['longitude']; 
        $email = $data_pelanggan['Email'];
        $nomor_hp_1 = $data_pelanggan['Nomor_Hp_1'];
        $nomor_hp_2 = $data_pelanggan['Nomor_Hp_2'];
        $id_paket = $data_pelanggan['id_paket'];
        $nama_paket = $data_pelanggan['nama_paket'];
        $kecepatan = $data_pelanggan['kecepatan'];
        $fotktp = $data_pelanggan['Foto_KTP'];
        $fotodepnrumah = $data_pelanggan['Foto_Depan_Rumah'];
        $file_name_only = basename($target_file); // ambil nama file saja tanpa folder

        // Validasi gambar
        if (empty($fotktp) || empty($fotodepnrumah)) {
            echo "<script>alert('Foto KTP atau Foto Depan Rumah kosong!');</script>";
            exit;
        }

        // Masukkan data ke tabel terminasi
        $query_terminasi = "
            INSERT INTO tb_terminasi 
            (Nama_Lengkap, Nomor_Identitas_KTP, Alamat_Pemasangan, provinsi, kota, latitude, longitude, Email, Nomor_Hp_1, Nomor_Hp_2, id_paket, nama_paket,kecepatan, Foto_KTP, Foto_Depan_Rumah) 
            VALUES 
            ('$nama_lengkap', '$nomor_ktp', '$alamat', '$provinsi', '$kota', '$latitude', '$longitude', '$email', '$nomor_hp_1', '$nomor_hp_2', '$id_paket', '$nama_paket', '$kecepatan' , '$fotktp', '$fotodepnrumah')";

        if (mysqli_query($koneksi, $query_terminasi)) {
            // Ambil ID terminasi yang baru saja dibuat
            $id_terminasi = mysqli_insert_id($koneksi);

            // Lokasi folder sumber (di folder 'user')
            $source_dir_ktp = '../database/android/user/';
            $source_dir_depanrumah = '../database/android/user/';

            // Lokasi folder tujuan (di folder 'terminasi')
            $target_dir_ktp = '../database/android/terminasi/foto_ktp/';
            $target_dir_depanrumah = '../database/android/terminasi/foto_depan_rumah/';

            // Pastikan folder tujuan ada, jika belum buat
            if (!file_exists($target_dir_ktp)) mkdir($target_dir_ktp, 0777, true);
            if (!file_exists($target_dir_depanrumah)) mkdir($target_dir_depanrumah, 0777, true);

            // Nama file baru berdasarkan ID terminasi
            $file_ktp_name = "fotoktp_" . $id_terminasi . ".jpg";  // Pastikan ekstensi sesuai dengan file yang ada
            $file_depanrumah_name = "fotoDepanRumah_" . $id_terminasi . ".jpg";  // Pastikan ekstensi sesuai dengan file yang ada

            // Tentukan lokasi file sumber dan tujuan
            $source_file_ktp = $source_dir_ktp . $fotktp;
            $source_file_depanrumah = $source_dir_depanrumah . $fotodepnrumah;

            $target_file_ktp = $target_dir_ktp . $file_ktp_name;
            $target_file_depanrumah = $target_dir_depanrumah . $file_depanrumah_name;

// Pindahkan file dari folder user ke folder terminasi
if (rename($source_file_ktp, $target_file_ktp) && rename($source_file_depanrumah, $target_file_depanrumah)) {
    // Update database dengan nama file baru yang telah dipindahkan
    $query_update = "UPDATE tb_terminasi 
                     SET Foto_KTP = '$file_ktp_name', 
                         Foto_Depan_Rumah = '$file_depanrumah_name' 
                     WHERE id_terminasi = $id_terminasi";

    if (mysqli_query($koneksi, $query_update)) {
        // Hapus data dari tabel pelanggan
        $query_hapus = "DELETE FROM tb_pelanggan WHERE id_pelanggan = '$id_pelanggan'";
        mysqli_query($koneksi, $query_hapus);

        echo "<script>alert('pelanggan berhasil diterima dan ditambahkan sebagai terminasi!'); window.location.href='index.php?page=data-pelanggan';</script>";
    } else {
        echo "<script>alert('Gagal memperbarui foto terminasi: " . mysqli_error($koneksi) . "'); window.location.href='index.php?page=data-pelanggan';</script>";
    }
} else {
    echo "<script>alert('Gagal memindahkan file foto!');</script>";
}

        } else {
            echo "<script>alert('Gagal menambahkan terminasi!'); window.location.href='index.php?page=data-pelanggan';</script>";
        }
    } else {
        echo "<script>alert('Data pelanggan tidak ditemukan!'); window.location.href='index.php?page=data-pelanggan';</script>";
    }
} else {
    echo "<script>alert('Metode tidak valid!'); window.location.href='index.php?page=data-pelanggan';</script>";
}
?>
