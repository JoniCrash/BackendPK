<?php
include('../../../conf/config.php');
// header('Content-Type: application/json');
// Pastikan semua input tersedia
if (isset($_POST['id_pembayaran'])) {
    $id_pembayaran = $_POST['id_pembayaran'];


    // Proses verifikasi ke database
    $sql = mysqli_query($koneksi, "SELECT * FROM tb_pembayaran WHERE id_pembayaran = '$id_pembayaran'");

    if (mysqli_num_rows($sql) > 0) {
        $pembayaran = mysqli_fetch_assoc($sql);
        echo json_encode([
            "status" => "success",
            "message" => "Login berhasil",
            "data" => [
                "id_pembayaran" => $pembayaran['id_pembayaran'],
                "id_tagihan" => $pembayaran['id_tagihan'],
                "Nama_Lengkap" => $pembayaran['Nama_Lengkap'],
                "bukti_pembayaran" => $pembayaran['bukti_pembayaran'],
                "periode" => $pembayaran['periode'],
                "status" => $pembayaran['status']



                // "Nama_Lengkap" => $pelanggan['Nama_Lengkap'],
                // "nik" => $pelanggan['Nomor_Identitas_KTP'],
                // "alamat" => $pelanggan['Alamat_Pemasangan'],
                // "provinsi" => $pelanggan['provinsi'],
                // "kota" => $pelanggan['kota'],
                // "latitude" => $pelanggan['latitude'],
                // "longitude" => $pelanggan['longitude'],
                // "email" => $pelanggan['Email'],
                // "nohp1" => $pelanggan['Nomor_Hp_1'],
                // "nohp2" => $pelanggan['Nomor_Hp_2'],
                // "idpaket" => $pelanggan['id_paket'],
                // "namapaket" => $pelanggan['nama_paket'],
                // "status" => $pelanggan['Status'],
                // "fotoktp" => $pelanggan['Foto_KTP'],
                // "fotorumah" => $pelanggan['Foto_Depan_Rumah']
            ]
        ]);
    } else {
        echo json_encode(["status" => "error", "message" => "ID pembayaran tidak ditemukan."]);
    }
} else {
    echo json_encode(["status" => "error", "message" => "Input tidak lengkap."]);
}
?>