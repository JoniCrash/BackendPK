<?php
include('../../../conf/config.php');
// header('Content-Type: application/json');
// Pastikan semua input tersedia
if (isset($_POST['id_user'])) {
    $id_user = $_POST['id_user'];

    // Koneksi ke database
    // $koneksi sudah diasumsikan aktif

    // Ambil data user dari tabel user_app
    $sql = mysqli_query($koneksi, "SELECT * FROM user_app WHERE id_user = '$id_user'");

    if (mysqli_num_rows($sql) > 0) {
        $user = mysqli_fetch_assoc($sql);

        // Ambil status pengajuan dari tabel tb_pengajuan
        $pengajuanQuery = mysqli_query($koneksi, "SELECT status FROM tb_pengajuan WHERE id_user = '$id_user' ORDER BY id_pengajuan DESC LIMIT 1");

        // Cek apakah ada data pengajuan
        $status_pengajuan = null;
        if (mysqli_num_rows($pengajuanQuery) > 0) {
            $pengajuan = mysqli_fetch_assoc($pengajuanQuery);
            $status_pengajuan = $pengajuan['status'];
        } else {
            $status_pengajuan = "Belum ada pengajuan";
        }

        echo json_encode([
            "status" => "success",
            "message" => "Login berhasil",
            "data" => [
                "id_user" => $user['id_user'],
                "username" => $user['username'],
                "email" => $user['email'],
                "password" => $user['pass'],
                "status" => $status_pengajuan
            ]
        ]);
    } else {
        echo json_encode(["status" => "error", "message" => "ID user tidak ditemukan."]);
    }
} else {
    echo json_encode(["status" => "error", "message" => "Input tidak lengkap."]);
}
?>