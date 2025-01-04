<?php
include('../../conf/config.php');

// Ambil data dari POST
$id_tagihan = (int) ($_POST['id_tagihan'] ?? 0);
$status = filter_var($_POST['status'] ?? 'Belum Lunas', FILTER_SANITIZE_STRING);

// Ambil Nama_Lengkap dan periode otomatis dari tabel tagihan berdasarkan id_tagihan
$query_name_periode = "
    SELECT Nama_Lengkap, DATE_FORMAT(dibuat_pada_, '%M_%Y') AS periode 
    FROM tb_tagihan 
    WHERE id_tagihan = ?";
$stmt = $koneksi->prepare($query_name_periode);
$stmt->bind_param("i", $id_tagihan);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();

// Jika data ditemukan, ambil Nama_Lengkap dan periode
if ($row) {
    $nama_lengkap = $row['Nama_Lengkap'];
    $periode = $row['periode']; // Output: December_2024
} else {
    echo "Data tidak ditemukan untuk ID Tagihan: $id_tagihan";
    exit;
}

// Query untuk menyimpan data pembayaran
$query_insert = "INSERT INTO tb_pembayaran (id_tagihan, Nama_Lengkap, periode, status) 
                 VALUES (?, ?, ?, ?)";
$stmt_insert = $koneksi->prepare($query_insert);
$stmt_insert->bind_param("isss", $id_tagihan, $nama_lengkap, $periode, $status);

if ($stmt_insert->execute()) {
    $id_pembayaran = $koneksi->insert_id;

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
                             SET bukti_pembayaran = ? 
                             WHERE id_pembayaran = ?";
            $stmt_update = $koneksi->prepare($query_update);
            $stmt_update->bind_param("si", $file_bukti_pembayaran_name, $id_pembayaran);

            if ($stmt_update->execute()) {
                echo "Data Pembayaran dan bukti pembayaran berhasil disimpan.";
            } else {
                error_log("Gagal memperbarui bukti pembayaran: " . $stmt_update->error);
                echo "Gagal memperbarui bukti pembayaran.";
            }
        } else {
            echo "Gagal menyimpan file bukti pembayaran.";
        }
    }
} else {
    error_log("Gagal mengirim bukti pembayaran: " . $stmt_insert->error);
    echo "Gagal mengirim bukti pembayaran.";
}
?>
