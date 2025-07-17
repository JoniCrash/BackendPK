<?php
include('../../../conf/config.php');

// Pastikan semua input tersedia
// if (isset($_POST['id_pelanggan'])) {
//     $id_pelanggan = $_POST['id_pelanggan'];

//     // Validasi input kosong
//     if (empty($id_pelanggan)) {
//         echo json_encode(["status" => "error", "message" => "ID Pelanggan harus diisi."]);
//         exit();
//     }

//     // Query untuk mengambil data tagihan berdasarkan id_pelanggan
//     $query = mysqli_query(
//         $koneksi,
//         "SELECT id_tagihan, id_pelanggan, Nama_Lengkap, id_paket, total_harga, status FROM tb_tagihan WHERE id_pelanggan = '$id_pelanggan'"
//     );

//     if (mysqli_num_rows($query) > 0) {
//         $tagihan = [];

//         // Ambil semua data tagihan
//         while ($row = mysqli_fetch_assoc($query)) {
//             $tagihan[] = $row;
//         }

//         echo json_encode([
//             "status" => "success",
//             "message" => "Data tagihan ditemukan.",
//             "data" => $tagihan
//         ]);
//     } else {
//         echo json_encode(["status" => "error", "message" => "Tidak ada tagihan untuk ID Pelanggan ini."]);
//     }
// } else {
//     echo json_encode(["status" => "error", "message" => "Input tidak lengkap."]);
// }

if (isset($_POST['id_pelanggan'])) {
    $id_pelanggan = $_POST['id_pelanggan'];

    if (empty($id_pelanggan)) {
        echo json_encode(["status" => "error", "message" => "ID Pelanggan harus diisi."]);
        exit();
    }

    $query = mysqli_query(
        $koneksi,
        "SELECT 
            t.*, 
            pj.*,
            p.*
         FROM tb_tagihan t
         JOIN tb_pelanggan pl ON t.id_pelanggan = pl.id_pelanggan
         JOIN tb_pengajuan pj ON pl.id_pengajuan = pj.id_pengajuan
         JOIN tb_paket p ON t.id_paket = p.id_paket
         WHERE t.id_pelanggan = '$id_pelanggan'"
    );

    if (mysqli_num_rows($query) > 0) {
        $tagihan = [];

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