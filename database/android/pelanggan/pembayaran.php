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
$status = filter_var($_POST['Status'] ?? 'Belum Lunas');

// Simpan data pembayaran
$query_insert = "INSERT INTO tb_pembayaran (id_tagihan, Status) 
                 VALUES (?, ?)";
$stmt_insert = $koneksi->prepare($query_insert);
$stmt_insert->bind_param("is", $id_tagihan, $status);

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
    $target_file = $target_dir . "bukti_" . $id_pembayaran . "_" . date("F Y") . "." . $file_ext;
    $file_name_only = basename($target_file); // ambil nama file saja tanpa folder

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
        $stmt_update->bind_param("si", $file_name_only, $id_pembayaran);

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
