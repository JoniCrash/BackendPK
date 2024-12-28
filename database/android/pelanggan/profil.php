<?php
include('../../../conf/config.php');
// header('Content-Type: application/json');
// Pastikan semua input tersedia
if (isset($_POST['id_pelanggan'])) {
    $id_pelanggan = $_POST['id_pelanggan'];


    // Proses verifikasi ke database
    $sql = mysqli_query($koneksi, "SELECT * FROM tb_pelanggan WHERE id_pelanggan = '$id_pelanggan'");

    if (mysqli_num_rows($sql) > 0) {
        $pelanggan = mysqli_fetch_assoc($sql);
        echo json_encode([
            "status" => "success",
            "message" => "Login berhasil",
            "data" => [
                "id_pelanggan" => $pelanggan['id_pelanggan'],
                "Nama_Lengkap" => $pelanggan['Nama_Lengkap'],
                "nik" => $pelanggan['Nomor_Identitas_KTP'],
                "alamat" => $pelanggan['Alamat_Pemasangan'],
                "provinsi" => $pelanggan['provinsi'],
                "kota" => $pelanggan['kota'],
                "latitude" => $pelanggan['latitude'],
                "longitude" => $pelanggan['longitude'],
                "email" => $pelanggan['Email'],
                "nohp1" => $pelanggan['Nomor_Hp_1'],
                "nohp2" => $pelanggan['Nomor_Hp_2'],
                "idpaket" => $pelanggan['id_paket'],
                "namapaket" => $pelanggan['nama_paket'],
                "fotoktp" => $pelanggan['Foto_KTP'],
                "fotorumah" => $pelanggan['Foto_Depan_Rumah']
            ]
        ]);
    } else {
        echo json_encode(["status" => "error", "message" => "ID Pelanggan tidak ditemukan."]);
    }
} else {
    echo json_encode(["status" => "error", "message" => "Input tidak lengkap."]);
}
?>