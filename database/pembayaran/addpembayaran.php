<?php
include('../../conf/config.php');

// Ambil data dari POST
$id_tagihan = (int) ($_POST['id_tagihan'] ?? 0);
$status = filter_var($_POST['status'] ?? 'Belum Lunas', FILTER_SANITIZE_STRING);

// Ambil periode otomatis dari tabel tagihan berdasarkan id_tagihan
$query_periode = "SELECT DATE_FORMAT(dibuat_pada_, '%M_%Y') AS periode 
                  FROM tb_tagihan 
                  WHERE id_tagihan = ?";
$stmt = $koneksi->prepare($query_periode);
$stmt->bind_param("i", $id_tagihan);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();

// Jika data periode ditemukan, ambil format bulan dan tahun
if ($row) {
    $periode = $row['periode']; // Output: December2024
} else {
    echo "Data tidak ditemukan untuk ID Tagihan: $id_tagihan";
    exit;
}
// header('Content-Type: application/json');
// echo json_encode([
//     'status' => 'success',
//     'id_tagihan' => $id_tagihan,
//     'periode' => $periode, // Output: December2024
// ]);

// Query untuk menyimpan data pembayaran
$query_insert = "INSERT INTO tb_pembayaran(id_tagihan, periode,  status) 
                 VALUES ('$id_tagihan', '$periode', '$status')";
if (mysqli_query($koneksi, $query_insert)) {
    $id_pembayaran = mysqli_insert_id($koneksi);

    // Validasi file yang diunggah
    if (isset($_FILES['gambarbuktipembayaran'])) {
        $file_bukti_pembayaran = $_FILES['gambarbuktipembayaran']['name'];
        $file_bukti_pembayaran_tmp = $_FILES['gambarbuktipembayaran']['tmp_name'];
        $file_bukti_pembayaran_ext = strtolower(pathinfo($file_bukti_pembayaran, PATHINFO_EXTENSION));
        $target_dir_bukti_pembayaran = 'image/bukti_pembayaran/';
        if (!file_exists($target_dir_bukti_pembayaran)) mkdir($target_dir_bukti_pembayaran, 0777, true);

        $file_bukti_pembayaran_name = "bukti_" . $id_pembayaran . "_" . date("F_Y") . "." . $file_bukti_pembayaran_ext;
        if (move_uploaded_file($file_bukti_pembayaran_tmp, $target_dir_bukti_pembayaran . $file_bukti_pembayaran_name)) {
            $query_update = "UPDATE tb_pembayaran 
                             SET bukti_pembayaran = '$file_bukti_pembayaran_name' 
                             WHERE id_pembayaran = $id_pembayaran";
            if (mysqli_query($koneksi, $query_update)) {
                echo "Data Pembayaran dan bukti pembayaran berhasil disimpan.";
            } else {
                error_log("Gagal memperbarui bukti pembayaran: " . mysqli_error($koneksi));
                echo "Gagal memperbarui bukti pembayaran.";
            }
        } else {
            echo "Gagal menyimpan file bukti pembayaran.";
        }
    }
} else {
    error_log("Gagal mengirim bukti pembayaran: " . mysqli_error($koneksi));
    echo "Gagal mengirim bukti pembayaran.";
}
?>
