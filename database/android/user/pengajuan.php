<?php
include('../../../conf/config.php');

// Validasi apakah semua input tersedia melalui POST
if (
    isset(
        $_POST['Nama_Lengkap'], 
        $_POST['Nomor_Identitas_KTP'], 
        $_POST['Alamat_Pemasangan'], 
        $_POST['latitude'], 
        $_POST['longitude'], 
        $_POST['Email'], 
        $_POST['Nomor_Hp_1'], 
        $_POST['Nomor_Hp_2'], 
        $_POST['Paket'], 
        $_POST['Foto_KTP'], 
        $_POST['Foto_Depan_Rumah']
    )
) {
    // Ambil data dari POST
    $nama_Lengkap = $_POST['Nama_Lengkap'];
    $no_nik = $_POST['Nomor_Identitas_KTP'];
    $alamat_pemasangan = $_POST['Alamat_Pemasangan'];
    $latitude = $_POST['latitude'];
    $longitude = $_POST['longitude'];
    $email = $_POST['Email'];
    $no1 = $_POST['Nomor_Hp_1'];
    $no2 = $_POST['Nomor_Hp_2'];
    $paket = $_POST['Paket'];
    $foto_ktp = $_POST['Foto_KTP'];
    $foto_depan_rumah = $_POST['Foto_Depan_Rumah'];

    // Validasi input kosong
    if (
        empty($nama_Lengkap) || 
        empty($no_nik) || 
        empty($alamat_pemasangan) || 
        empty($latitude) || 
        empty($longitude) || 
        empty($email) || 
        empty($no1) || 
        empty($paket) || 
        empty($foto_ktp) || 
        empty($foto_depan_rumah)
    ) {
        echo json_encode(["status" => "error", "message" => "Semua input harus diisi."]);
        exit();
    }

    // Proses penyimpanan ke database
    $query = mysqli_query(
        $koneksi,
        "INSERT INTO tb_pengajuan (
            id_pengajuan,
            Nama_Lengkap,
            Nomor_Identitas_KTP,
            Alamat_Pemasangan,
            latitude,
            longitude,
            Email,
            Nomor_Hp_1,
            Nomor_Hp_2,
            Paket,
            Foto_KTP,
            Foto_Depan_Rumah
        ) VALUES (
            '',
            '$nama_Lengkap',
            '$no_nik',
            '$alamat_pemasangan',
            '$latitude',
            '$longitude',
            '$email',
            '$no1',
            '$no2',
            '$paket',
            '$foto_ktp',
            '$foto_depan_rumah'
        )"
    );

    // Respon berdasarkan hasil query
    if ($query) {
        echo json_encode(["status" => "success", "message" => "Pengajuan berhasil disimpan"]);
    } else {
        echo json_encode(["status" => "error", "message" => "Gagal menyimpan pengajuan."]);
    }
} else {
    echo json_encode(["status" => "error", "message" => "Input tidak lengkap."]);
}
?>
