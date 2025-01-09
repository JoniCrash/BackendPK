<?php
include('../../../conf/config.php');

// Fungsi untuk merespon error
function sendError($message)
{
    error_log($message);
    echo json_encode(["status" => "error", "message" => $message]);
    exit;
}

// Validasi dan sanitasi input
$id_tagihan = filter_var($_POST['id_tagihan'] ?? 0, FILTER_VALIDATE_INT);
$status = filter_var($_POST['status'] ?? 'BelumLunas', FILTER_SANITIZE_STRING);

// Validasi ID Tagihan
if (!$id_tagihan) {
    sendError("ID Tagihan tidak valid.");
}

// Ambil Nama_Lengkap dan periode dari tabel tagihan
$query_name_periode = "
    SELECT Nama_Lengkap, DATE_FORMAT(dibuat_pada_, '%M_%Y') AS periode 
    FROM tb_tagihan 
    WHERE id_tagihan = ?";
$stmt = $koneksi->prepare($query_name_periode);
$stmt->bind_param("i", $id_tagihan);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();

// Validasi data tagihan
if (!$row) {
    sendError("Data tidak ditemukan untuk ID Tagihan: $id_tagihan");
}
$nama_lengkap = $row['Nama_Lengkap'];
$periode = $row['periode'];

// Simpan data pembayaran
$query_insert = "INSERT INTO tb_pembayaran (id_tagihan, Nama_Lengkap, periode, status) 
                 VALUES (?, ?, ?, ?)";
$stmt_insert = $koneksi->prepare($query_insert);
$stmt_insert->bind_param("isss", $id_tagihan, $nama_lengkap, $periode, $status);

if (!$stmt_insert->execute()) {
    sendError("Gagal mengirim bukti pembayaran: " . $stmt_insert->error);
}

// Dapatkan ID pembayaran
$id_pembayaran = $koneksi->insert_id;

// Validasi dan simpan file bukti pembayaran
if (isset($_FILES['gambarbuktipembayaran'])) {
    $file = $_FILES['gambarbuktipembayaran'];
    $file_ext = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));
    $target_dir = 'bukti_pembayaran/';
    $target_file = $target_dir . "bukti_" . $id_pembayaran . "_" . date("F_Y") . "." . $file_ext;

    // Cek direktori
    if (!is_dir($target_dir)) {
        mkdir($target_dir, 0777, true);
    }

    // Pindahkan file
    if (move_uploaded_file($file['tmp_name'], $target_file)) {
        $query_update = "UPDATE tb_pembayaran 
                         SET bukti_pembayaran = ? 
                         WHERE id_pembayaran = ?";
        $stmt_update = $koneksi->prepare($query_update);
        $stmt_update->bind_param("si", $target_file, $id_pembayaran);

        if (!$stmt_update->execute()) {
            sendError("Gagal memperbarui bukti pembayaran: " . $stmt_update->error);
        } else {
            echo json_encode(["status" => "success", "message" => "Data berhasil disimpan."]);
        }
    } else {
        sendError("Gagal menyimpan file bukti pembayaran.");
    }
} else {
    echo json_encode(["status" => "success", "message" => "Data pembayaran berhasil disimpan tanpa file."]);
}
?>
