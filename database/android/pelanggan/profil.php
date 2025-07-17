<?php
include('../../../conf/config.php');
// header('Content-Type: application/json');
// Pastikan semua input tersedia
if (isset($_POST['id_pelanggan'])) {
    $id_pelanggan = $_POST['id_pelanggan'];

    // Query gabungan antara tb_pelanggan dan tb_pengajuan
    $stmt = $koneksi->prepare("
        SELECT 
            pl.*,
            pj.*,
            pk.*
        FROM tb_pelanggan pl
        JOIN tb_pengajuan pj ON pl.id_pengajuan = pj.id_pengajuan
        JOIN paket pk ON pj.id_paket = pk.id_paket
        WHERE pl.id_pelanggan = ?
    ");
    $stmt->bind_param("s", $id_pelanggan);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $pelanggan = $result->fetch_assoc();
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
                // "namapaket" => $pelanggan['nama_paket'],
                "status" => $pelanggan['Status'],
                "fotoktp" => $pelanggan['Foto_KTP'],
                "fotorumah" => $pelanggan['Foto_Depan_Rumah']
            ]
        ]);
    } else {
        echo json_encode(["status" => "error", "message" => "ID Pelanggan tidak ditemukan."]);
    }

    $stmt->close();
} else {
    echo json_encode(["status" => "error", "message" => "Input tidak lengkap."]);
}

?>