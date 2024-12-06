<?php
if (isset($_GET['id_pelanggan'])) {
    $id_pelanggan = $_GET['id_pelanggan'];

    // Koneksi ke database
    $koneksi = new mysqli("localhost", "root", "", "nama_database");

    if ($koneksi->connect_error) {
        die("Koneksi gagal: " . $koneksi->connect_error);
    }

    // Query data pelanggan
    $query = "SELECT p.id_paket, pk.harga 
              FROM tb_pelanggan p 
              INNER JOIN tb_paket pk ON p.id_paket = pk.id_paket 
              WHERE p.id_pelanggan = ?";
    $stmt = $koneksi->prepare($query);

    if (!$stmt) {
        die("Query gagal dipersiapkan: " . $koneksi->error);
    }

    $stmt->bind_param("i", $id_pelanggan);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $data = $result->fetch_assoc();

        // Proses pembuatan tagihan
        $insert = "INSERT INTO tb_tagihan (id_pelanggan, id_paket, total_harga, status) 
                   VALUES (?, ?, ?, 'Belum')";
        $stmt_insert = $koneksi->prepare($insert);

        if (!$stmt_insert) {
            die("Gagal mempersiapkan query INSERT: " . $koneksi->error);
        }

        $stmt_insert->bind_param("iis", $id_pelanggan, $data['id_paket'], $data['harga']);
        if ($stmt_insert->execute()) {
            echo "Tagihan berhasil dibuat!";
        } else {
            die("Gagal membuat tagihan: " . $stmt_insert->error);
        }
    } else {
        die("Data pelanggan tidak ditemukan.");
    }

    $koneksi->close();
} else {
    die("Parameter id_pelanggan tidak ditemukan.");
}
?>