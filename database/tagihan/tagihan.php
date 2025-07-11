<?php
include('../conf/config.php');

// Cek koneksi
if (!isset($koneksi)) {
    die("Koneksi tidak tersedia. Periksa file config.php.");
}

// Validasi ID pelanggan
if (!isset($_GET['id_pelanggan'])) {
    die("ID pelanggan tidak disediakan.");
}
$id_pelanggan = intval($_GET['id_pelanggan']);

// Ambil data id_paket dan harga dari pelanggan
$query = "SELECT p.id_paket, pk.harga 
          FROM tb_pelanggan p
          INNER JOIN paket pk ON p.id_paket = pk.id_paket 
          WHERE p.id_pelanggan = ?";
$stmt = $koneksi->prepare($query);
if (!$stmt) {
    die("Query gagal dipersiapkan: " . $koneksi->error);
}
$stmt->bind_param("i", $id_pelanggan);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 0) {
    die("Data pelanggan tidak ditemukan.");
}

$data = $result->fetch_assoc();
$id_paket = $data['id_paket'];
$harga = $data['harga'];

// Cek apakah tagihan belum lunas sudah ada
$check_query = "SELECT * FROM tb_tagihan WHERE id_pelanggan = ? AND status = 'Belum Lunas'";
$check_stmt = $koneksi->prepare($check_query);
$check_stmt->bind_param("i", $id_pelanggan);
$check_stmt->execute();
$check_result = $check_stmt->get_result();

if ($check_result->num_rows > 0) {
    die("Tagihan sudah ada untuk pelanggan ini.");
}

// Periode saat ini: YYYY-MM
$periode = date('F Y');

// Buat tagihan baru
$insert = "INSERT INTO tb_tagihan (id_pelanggan, id_paket, total_harga, periode, status, dibuat_pada_) 
           VALUES (?, ?, ?, ?, 'Belum Lunas', NOW())";
$stmt_insert = $koneksi->prepare($insert);
if (!$stmt_insert) {
    die("Gagal mempersiapkan query INSERT: " . $koneksi->error);
}
$stmt_insert->bind_param("iids", $id_pelanggan, $id_paket, $harga, $periode);

if ($stmt_insert->execute()) {
    echo "Tagihan berhasil dibuat!";
} else {
    die("Gagal membuat tagihan: " . $stmt_insert->error);
}
?>
