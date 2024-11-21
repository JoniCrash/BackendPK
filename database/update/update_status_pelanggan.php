<?php
include('../../conf/config.php'); // Hubungkan ke database

// Debugging: Cek apakah data POST diterima dengan benar
// if (isset($_POST['id_pelanggan']) && isset($_POST['status'])) {
//     echo "ID Pelanggan: " . $_POST['id_pelanggan'] . ", Status: " . $_POST['status'];
// } else {
//     echo "Data tidak lengkap!";
//     exit;
// }

// Ambil data dari request
$id_pelanggan = $_POST['id_pelanggan'];
$status = $_POST['status'];
// Validasi agar hanya menerima nilai 0 atau 1
// $status = ($status == '1') ? 1 : 0;

// Update status di database
$query = "UPDATE tb_pelanggan SET status = '$status' WHERE id_pelanggan = $id_pelanggan";
if (mysqli_query($koneksi, $query)) {
    echo "Status berhasil diperbarui";
} else {
    echo "Gagal memperbarui status: " . mysqli_error($koneksi);
}
?>
