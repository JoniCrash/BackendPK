<?php
include('../../../conf/config.php');

// Pastikan semua input tersedia
if (isset($_GET['id_pelanggan'])) {
    $id_pelanggan = $_GET['id_pelanggan'];

    // Validasi input kosong
    if (empty($id_pelanggan)) {
        echo json_encode(["status" => "error", "message" => "ID Pelanggan harus diisi."]);
        exit();
    }

    // Query untuk mengambil data tagihan berdasarkan id_pelanggan
    $query = mysqli_query(
        $koneksi,
        "SELECT id_tagihan, id_pelanggan, id_paket, total_harga FROM tb_tagihan WHERE id_pelanggan = '$id_pelanggan'"
    );

    if (mysqli_num_rows($query) > 0) {
        $tagihan = [];

        // Ambil semua data tagihan
        while ($row = mysqli_fetch_assoc($query)) {
            $tagihan[] = $row;
        }

        echo json_encode([
            "status" => "success",
            "message" => "Data tagihan ditemukan.",
            "data" => $tagihan
        ]);
    } else {
        echo json_encode(["status" => "error", "message" => "Tidak ada tagihan untuk ID Pelanggan ini."]);
    }
} else {
    echo json_encode(["status" => "error", "message" => "Input tidak lengkap."]);
}
?>
