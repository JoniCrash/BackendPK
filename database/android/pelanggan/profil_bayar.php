<?php
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
        "SELECT * FROM tb_pembayaran WHERE id_tagihan = '$id_tagihan'"
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