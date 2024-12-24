<?php
include('../../../conf/config.php');

// Memeriksa apakah koneksi database berhasil
if ($koneksi) {
    // Ambil id_pelanggan dari POST request
    $id_pelanggan = $_POST['id_pelanggan'] ?? '';

    // Query untuk mengambil data pelanggan berdasarkan id
    $query = "SELECT * FROM tb_pelanggan WHERE id_pelanggan = '$id_pelanggan'";
    $result = mysqli_query($koneksi, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        // Ambil hasil dari query
        $row = mysqli_fetch_assoc($result);

        // Kirimkan response JSON yang berhasil
        echo json_encode([
            "status" => "success",
            "message" => "Data pelanggan ditemukan",
            "data" => [
                "id_pelanggan" => $row['id_pelanggan'],
                "nama_lengkap" => $row['Nama_Lengkap'],
                "nik" => $row['Nomor_Identitas_KTP'],
                "alamat_pemasangan" => $row['Alamat_Pemasangan'],


            ]
        ]);
    } else {
        // Jika data tidak ditemukan
        echo json_encode([
            "status" => "error",
            "message" => "Data pelanggan tidak ditemukan",
        ]);
    }
} else {
    // Jika gagal koneksi ke database
    echo json_encode([
        "status" => "error",
        "message" => "Koneksi database gagal"
    ]);
}
?>
