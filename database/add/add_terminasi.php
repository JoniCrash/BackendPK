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
        $id_pelanggan = $data_pelanggan['id_pelanggan'];
        $nama_lengkap = $data_pelanggan['Nama_Lengkap'];
        
        // Masukkan data ke tabel terminasi
$query_terminasi = "
    INSERT INTO tb_terminasi 
    (id_pelanggan,Nama_Lengkap) 
    VALUES 
    ('$id_pelanggan','$nama_lengkap')";

$result_terminasi = mysqli_query($koneksi, $query_terminasi);

if ($result_terminasi) {
    echo "<script>alert('Pelanggan berhasil ditemukan dan ditambahkan sebagai terminasi!'); window.location.href='index.php?page=data-terminasi';</script>";
} else {
    echo "<script>alert('Gagal menambahkan data ke tabel terminasi!'); window.location.href='index.php?page=data-pelanggan';</script>";
}

        


    } else {
        echo "<script>alert('Data pelanggan tidak ditemukan!'); window.location.href='index.php?page=data-pelanggan';</script>";
    }
} else {
    echo "<script>alert('Metode tidak valid!'); window.location.href='index.php?page=data-pelanggan';</script>";
}
?>
