
<?php
include('../conf/config.php');

if (!isset($_POST['id_pelanggan'], $_POST['id_paket'])) {
    echo json_encode(["success" => false, "message" => "Data tidak lengkap!"]);
    exit;
}

$id_pelanggan = mysqli_real_escape_string($koneksi, $_POST['id_pelanggan']);
$id_paket = mysqli_real_escape_string($koneksi, $_POST['id_paket']);

// Validasi id_paket apakah ada di tabel tb_paket
$cek_paket = mysqli_query($koneksi, "SELECT * FROM paket WHERE id_paket = '$id_paket'");
if (mysqli_num_rows($cek_paket) == 0) {
    echo json_encode(["success" => false, "message" => "ID Paket tidak ditemukan di database!"]);
    exit;
}

// Update hanya id_paket di tabel pelanggan
$query = "UPDATE tb_pelanggan 
          SET id_paket = '$id_paket' 
          WHERE id_pelanggan = '$id_pelanggan'";

if (mysqli_query($koneksi, $query)) {
    echo json_encode(["success" => true, "message" => "Paket pelanggan berhasil diperbarui."]);
} else {
    echo json_encode(["success" => false, "message" => "Gagal memperbarui Paket pelanggan: " . mysqli_error($koneksi)]);
}

// Optional redirect jika tidak pakai AJAX:
echo "<script>window.location.href = 'index.php?page=data-paket-pelanggan';</script>";
?>
