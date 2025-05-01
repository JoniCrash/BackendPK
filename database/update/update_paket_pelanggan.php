<?php
// include('../../conf/config.php');
include('../conf/config.php');

if (!isset($_POST['id_pelanggan'], 
$_POST['nama_paket'], 
$_POST['kecepatan'], 
$_POST['id_paket'])) {
    echo json_encode(["success" => false, "message" => "Data tidak lengkap!"]);
    exit;
}

$id_pelanggan = mysqli_real_escape_string($koneksi, $_POST['id_pelanggan']);
$paket = mysqli_real_escape_string($koneksi, $_POST['nama_paket']);
$kecepatan = mysqli_real_escape_string($koneksi, $_POST['kecepatan']);
$id_paket = mysqli_real_escape_string($koneksi, $_POST['id_paket']);

if (!in_array($paket, ['Lite', 'Family', 'Max'])) {
    echo json_encode(["success" => false, "message" => "Paket tidak valid!"]);
    exit;
}

if (!in_array($kecepatan, ['30 MBPS', '50 MBPS', '100 MBPS'])) {
    echo json_encode(["success" => false, "message" => "Kecepatan tidak valid!"]);
    exit;
}

if (!in_array($id_paket, ['1', '2', '3'])) {
    echo json_encode(["success" => false, "message" => "ID paket tidak valid!"]);
    exit;
}

$query = "UPDATE tb_pelanggan 
          SET nama_paket = '$paket', 
              kecepatan = '$kecepatan', 
              id_paket = '$id_paket' 
          WHERE id_pelanggan = '$id_pelanggan'";

if (mysqli_query($koneksi, $query)) {
    echo json_encode(["success" => true, "message" => "Paket pelanggan berhasil diperbarui."]);
} else {
    echo json_encode(["success" => false, "message" => "Gagal memperbarui Paket pelanggan: " . mysqli_error($koneksi)]);
}
// Redirect setelah menampilkan pesan
echo "<script>window.location.href = 'index.php?page=data-paket-pelanggan';</script>";
?>
