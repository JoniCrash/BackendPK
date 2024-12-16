<?php
include('../../../conf/config.php');

// Pastikan semua input tersedia
if (isset($_POST['id_pelanggan'])) {
    $id_pelanggan = $_POST['id_pelanggan'];

    // Validasi input kosong
    if (empty($id_pelanggan)) {
        echo json_encode(["status" => "error", "message" => "ID Pelanggan harus diisi."]);
        exit();
    }

    // Proses verifikasi ke database
    $sql = mysqli_query($koneksi, "SELECT * FROM pelanggan WHERE id_pelanggan = '$id_pelanggan'");

    if (mysqli_num_rows($sql) > 0) {
        $pelanggan = mysqli_fetch_assoc($sql);
        echo json_encode([
            "status" => "success",
            "message" => "Login berhasil",
            "data" => [
                "id_pelanggan" => $pelanggan['id_pelanggan'],
                "nama" => $pelanggan['nama'],
                "email" => $pelanggan['email'],
                "alamat" => $pelanggan['alamat']
            ]
        ]);
    } else {
        echo json_encode(["status" => "error", "message" => "ID Pelanggan tidak ditemukan."]);
    }
} else {
    echo json_encode(["status" => "error", "message" => "Input tidak lengkap."]);
}
?>
