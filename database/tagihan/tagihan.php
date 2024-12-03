<?php
if (isset($_GET['id_pelanggan'])) {
    $id_pelanggan = $_GET['id_pelanggan'];

    // Ambil informasi pelanggan dan paket
    // $query = "SELECT pelanggan.id_pelanggan, pelanggan.id_paket, paket.harga 
    //           FROM pelanggan 
    //           INNER JOIN paket ON pelanggan.id_paket = paket.id_paket 
    //           WHERE pelanggan.id_pelanggan = ?";
    // $stmt = $koneksi->prepare($query);
    // $stmt->bind_param("i", $id_pelanggan);
    // $stmt->execute();
    // $result = $stmt->get_result();
    // $data = $result->fetch_assoc();

    if ($data) {
        // $id_paket = $data['id_paket'];
        // $total_harga = $data['total_harga'];

        // Tambahkan tagihan ke tabel
        $insert = "INSERT INTO tb_tagihan (id_pelanggan, id_paket, total_harga, status) 
                   VALUES (?, ?, ?, 'Belum Lunas')";
        $stmt_insert = $koneksi->prepare($insert);
        $stmt_insert->bind_param("iis", $id_pelanggan, $id_paket, $total_harga);

        if ($stmt_insert->execute()) {
            echo "<script>
                    alert('Tagihan berhasil dibuat untuk pelanggan ID: $id_pelanggan');
                    window.location = 'index.php?page=data-pelanggan';
                  </script>";
        } else {
            echo "<script>
                    alert('Gagal membuat tagihan.');
                    window.location = 'index.php?page=data-pelanggan';
                  </script>";
        }
    } else {
        echo "<script>
                alert('Data pelanggan tidak ditemukan.');
                window.location = 'index.php?page=data-pelanggan';
              </script>";
    }

    $koneksi->close();
}
?>
