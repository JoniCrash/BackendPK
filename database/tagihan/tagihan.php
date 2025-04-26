<?php
include('../conf/config.php');

// Pastikan koneksi tersedia
if (!isset($koneksi)) {
    die("Variabel \$koneksi tidak ditemukan. Periksa file config.php.");
}

// Pastikan ID pelanggan tersedia
if (isset($_GET['id_pelanggan'])) {
    $id_pelanggan = $_GET['id_pelanggan'];
} else {
    die("ID pelanggan tidak disediakan.");
}

// Query data pelanggan
$query = "SELECT p.id_paket, pk.nama_paket, pk.kecepatan,pk.harga, pk.kecepatan, p.Nama_Lengkap
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

if ($result->num_rows > 0) {
    $data = $result->fetch_assoc();

    // Periksa apakah tagihan sudah ada
    $check_query = "SELECT * FROM tb_tagihan WHERE id_pelanggan = ? AND status = 'Belum Lunas'";
    $check_stmt = $koneksi->prepare($check_query);
    $check_stmt->bind_param("i", $id_pelanggan);
    $check_stmt->execute();
    $check_result = $check_stmt->get_result();

    if ($check_result->num_rows > 0) {
        die("Tagihan sudah ada untuk pelanggan ini.");
    }

    // Proses pembuatan tagihan
    $insert = "INSERT INTO tb_tagihan (id_pelanggan, Nama_Lengkap, id_paket, nama_paket,kecepatan, total_harga, status) 
               VALUES (?, ?, ?, ?, ?, ?, 'Belum Lunas')";
    $stmt_insert = $koneksi->prepare($insert);

    if (!$stmt_insert) {
        die("Gagal mempersiapkan query INSERT: " . $koneksi->error);
    }

    $stmt_insert->bind_param("isissd", $id_pelanggan,$data['Nama_Lengkap'] , $data['id_paket'], $data['nama_paket'], $data['kecepatan'], $data['harga']);
    if ($stmt_insert->execute()) {
        echo "Tagihan berhasil dibuat!";
    } else {
        die("Gagal membuat tagihan: " . $stmt_insert->error);
    }
} else {
    die("Data pelanggan tidak ditemukan.");
}
?>


<!-- debugging -->
