<?php

header('Content-Type: application/json');

include('../../../conf/config.php');

// Pastikan semua input tersedia
if (isset($_POST['id_tagihan'])) {
    $id_tagihan = $_POST['id_tagihan'];

    // Validasi input kosong
    if (empty($id_tagihan)) {
        echo json_encode(["status" => "error", "message" => "ID tagihan harus diisi."]);
        exit();
    }



    // Query untuk mengambil data tagihan berdasarkan id_tagihan
$query = mysqli_query(
    $koneksi,
    "SELECT 
        tb_pembayaran.*, 
        tb_tagihan.*, 
        tb_pengajuan.Nama_Lengkap
    FROM tb_pembayaran
    JOIN tb_tagihan ON tb_pembayaran.id_tagihan = tb_tagihan.id_tagihan
    JOIN tb_pelanggan ON tb_tagihan.id_pelanggan = tb_pelanggan.id_pelanggan
    JOIN tb_pengajuan ON tb_pelanggan.id_pengajuan = tb_pengajuan.id_pengajuan
    WHERE tb_pembayaran.id_tagihan = '$id_tagihan'"
);


    if (mysqli_num_rows($query) > 0) {
        $pembayaran = [];

        // Ambil semua data tagihan
        while ($row = mysqli_fetch_assoc($query)) {
            $pembayaran[] = $row;
        }

        echo json_encode([
            "status" => "success",
            "message" => "Data tagihan ditemukan.",
            "data" => $pembayaran
        ]);
    } else {
        echo json_encode(["status" => "error", "message" => "Tidak ada tagihan untuk ID tagihan ini."]);
    }
} else {
    echo json_encode(["status" => "error", "message" => "Input tidak lengkap."]);
}
?>