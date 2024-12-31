<?php
include('../../conf/config.php');

// Ambil data dari POST
$id_tagihan = $_POST['id_tagihan'] ?? '';
$status = "Belum Lunas"; // Status otomatis "belum lunas"

// Ambil periode otomatis dari tabel tagihan berdasarkan id_tagihan
$query_periode = "SELECT DATE_FORMAT(dibuat_pada_, '%M%Y') AS periode 
                  FROM tb_tagihan 
                  WHERE id_tagihan = ?";
$stmt = $koneksi->prepare($query_periode);
$stmt->bind_param("i", $id_tagihan);
$stmt->execute();
$result = $stmt->get_result();
$periode = $result->fetch_assoc()['periode'];

// Query untuk menyimpan data pembayaran
$query_insert = "INSERT INTO tb_pembayaran(id_tagihan, periode, status) 
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
        $file_bukti_pembayaran_name = "gambarbuktipembayaran_" . $id_pembayaran . "." . $file_bukti_pembayaran_ext;
        move_uploaded_file($file_bukti_pembayaran_tmp, $target_dir_bukti_pembayaran . $file_bukti_pembayaran_name);
        
        // Update database dengan nama file
        $query_update = "UPDATE tb_pembayaran 
                         SET butki_pembayaran = '$file_bukti_pembayaran_name' 
                         WHERE id_pembayaran = $id_pembayaran";
        if (mysqli_query($koneksi, $query_update)) {
            echo "Data Pembayaran dan bukti pembayaran berhasil disimpan.";
        } else {
            echo "Gagal memperbarui bukti pembayaran: " . mysqli_error($koneksi);
        }
    }
} else {
    echo "Gagal mengirim bukti pembayaran " . mysqli_error($koneksi);
}
?>
