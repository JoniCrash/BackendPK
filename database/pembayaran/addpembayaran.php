<?php
include('../../conf/config.php');

// Ambil data dari POST
$id_tagihan = $_POST['id_tagihan'] ?? '';
$periode = $_POST['periode'] ?? '';
$status = $_POST['status'] ?? '';



// Dapatkan tanggal berdasarkan id_tagihan
$query_periode = "SELECT dibuat_pada_ FROM tb_tagihan WHERE id_tagihan = '$id_tagihan'";
$result_periode = mysqli_query($koneksi, $query_periode);
$periode_data = mysqli_fetch_assoc($result_periode);

// Jika nama paket ditemukan, simpan ke variabel
if ($periode_data) {
    $periode = $periode_data;
}

$periode =  date('m-Y');

$query_insert = mysqli_query($koneksi,"INSERT INTO tb_pembayaran(
id_tagihan,
periode,
status
) VALUES ('$id_tagihan','$periode','$status')");
// Validasi file yang diunggah
if (!isset($_FILES['gambarbuktipembayaran'])) {
    die("File bukti pembayaran tidak ditemukan");
}
if (mysqli_query($koneksi, $query_insert)) {
    // Ambil ID pelanggan yang baru saja dibuat
    $id_pembayaran = mysqli_insert_id($koneksi);

    // Lokasi file sementara
    $file_bukti_pembayaran = $_FILES['gambarbuktipembayaran']['name'];
    $file_bukti_pembayaran_tmp = $_FILES['gambarbuktipembayaran']['tmp_name'];

    // Dapatkan ekstensi file
    $file_bukti_pembayaran_ext = strtolower(pathinfo($file_bukti_pembayaran, PATHINFO_EXTENSION));

    // Lokasi folder tujuan
    $target_dir_bukti_pembayaran = 'image/bukti_pembayaran/';
    if (!file_exists($target_dir_bukti_pembayaran)) mkdir($target_dir_bukti_pembayaran, 0777, true);

    // Nama file dengan ID pelanggan
    $file_bukti_pembayaran_name = "gambarbuktipembayaran_" . $id_pembayaran . "." . $file_bukti_pembayaran_ext;

    // Pindahkan file ke folder tujuan
    move_uploaded_file($file_bukti_pembayaran_tmp, $target_dir_bukti_pembayaran . $file_bukti_pembayaran_name);

    // Update database dengan nama file
    $query_update = "UPDATE tb_pembayaran
                     SET butki_pembayaran = '$file_bukti_pembayaran_name'
                     WHERE id_pembayaran = $id_pembayaran";
    if (mysqli_query($koneksi, $query_update)) {
        echo "Data pelanggan dan foto berhasil disimpan.";
    } else {
        echo "Gagal memperbarui foto pelanggan: " . mysqli_error($koneksi);
    }
} else {
    echo "Gagal menyimpan data pelanggan: " . mysqli_error($koneksi);
}
?>
