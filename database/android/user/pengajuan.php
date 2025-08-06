<?php
include('../../../conf/config.php');

// Ambil data dari POST
$id_user = $_POST['id_user'];
$nama_Lengkap = $_POST['Nama_Lengkap'] ?? '';
$no_nik = $_POST['Nomor_Identitas_KTP'] ?? '';
$alamat_pemasangan = $_POST['Alamat_Pemasangan'] ?? '';
$latitude = $_POST['latitude'] ?? '';
$longitude = $_POST['longitude'] ?? '';
$provinsi = $_POST['provinsi'] ?? '';
$kota = $_POST['kota'] ?? '';
$email = $_POST['Email'] ?? '';
$no1 = $_POST['Nomor_Hp_1'] ?? '';
$no2 = $_POST['Nomor_Hp_2'] ?? '';
$id_paket = $_POST['id_paket'] ?? '';
// file_put_contents("log_post.txt", print_r($_POST, true));
// file_put_contents("log_files.txt", print_r($_FILES, true));

// $nama_paket = $_POST['nama_paket'] ?? '';
// $kecepata = $_POST['kecepatan'] ?? '';

// Validasi file yang diunggah
if (!isset($_FILES['fotoktp'], $_FILES['fotodepanrumah'])) {
    die("File KTP atau Foto Rumah tidak ditemukan!");
}

// Dapatkan nama paket berdasarkan id_paket
$query_paket = "SELECT nama_paket,kecepatan FROM paket WHERE id_paket = '$id_paket'";
$result_paket = mysqli_query($koneksi, $query_paket);
$paket_data = mysqli_fetch_assoc($result_paket);

if ($paket_data) {
    $nama_paket = $paket_data['nama_paket'];
    $kecepatan = $paket_data['kecepatan'];
} else {
    $nama_paket = ''; // Jika tidak ditemukan
    $kecepatan = ''; // Jika tidak ditemukan
}

// Proses penyimpanan ke database
$query_insert = "INSERT INTO tb_pengajuan (
    id_user,
    Nama_Lengkap,
    Nomor_Identitas_KTP,
    Alamat_Pemasangan,
    latitude,
    longitude,
    provinsi,
    kota,
    Email,
    Nomor_Hp_1,
    Nomor_Hp_2,
    id_paket,
    status
    
) VALUES (
    '$id_user',
    '$nama_Lengkap',
    '$no_nik',
    '$alamat_pemasangan',
    '$latitude',
    '$longitude',
    '$provinsi',
    '$kota',
    '$email',
    '$no1',
    '$no2',
    '$id_paket',
    'Menunggu'
)";

if (mysqli_query($koneksi, $query_insert)) {
    // Ambil ID pengajuan yang baru saja dibuat
    $id_pengajuan = mysqli_insert_id($koneksi);

    $file_ktp_tmp = $_FILES['fotoktp']['tmp_name'];
$file_depanrumah_tmp = $_FILES['fotodepanrumah']['tmp_name'];

$file_ktp_ext = strtolower(pathinfo($_FILES['fotoktp']['name'], PATHINFO_EXTENSION));
$file_depanrumah_ext = strtolower(pathinfo($_FILES['fotodepanrumah']['name'], PATHINFO_EXTENSION));

$target_dir_ktp = 'foto_ktp/';
$target_dir_depanrumah = 'foto_depan_rumah/';
if (!file_exists($target_dir_ktp)) mkdir($target_dir_ktp, 0777, true);
if (!file_exists($target_dir_depanrumah)) mkdir($target_dir_depanrumah, 0777, true);

// hanya nama file
$file_ktp_name_only = "fotoktp_" . $id_pengajuan . "." . $file_ktp_ext;
$file_depanrumah_name_only = "fotoDepanRumah_" . $id_pengajuan . "." . $file_depanrumah_ext;

// full path untuk move
$file_ktp_path = $target_dir_ktp . $file_ktp_name_only;
$file_depanrumah_path = $target_dir_depanrumah . $file_depanrumah_name_only;

if (move_uploaded_file($file_ktp_tmp, $file_ktp_path) &&
    move_uploaded_file($file_depanrumah_tmp, $file_depanrumah_path)) {

    $query_update = "UPDATE tb_pengajuan SET
        Foto_KTP = '$file_ktp_name_only',
        Foto_Depan_Rumah = '$file_depanrumah_name_only'
        WHERE id_pengajuan = $id_pengajuan";


    // Lokasi file sementara
    // $file_ktp_tmp = $_FILES['fotoktp']['tmp_name'];
    // $file_depanrumah_tmp = $_FILES['fotodepanrumah']['tmp_name'];

    // // Ekstensi file
    // $file_ktp_ext = strtolower(pathinfo($_FILES['fotoktp']['name'], PATHINFO_EXTENSION));
    // $file_depanrumah_ext = strtolower(pathinfo($_FILES['fotodepanrumah']['name'], PATHINFO_EXTENSION));

    // // Lokasi folder tujuan
    // $target_dir_ktp = 'foto_ktp/';
    // $target_dir_depanrumah = 'foto_depan_rumah/';
    // if (!file_exists($target_dir_ktp)) mkdir($target_dir_ktp, 0777, true);
    // if (!file_exists($target_dir_depanrumah)) mkdir($target_dir_depanrumah, 0777, true);

    // // Nama file baru
    // $file_ktp_name = $target_dir_ktp . "fotoktp_" . $id_pengajuan . "." . $file_ktp_ext;
    // $file_depanrumah_name = $target_dir_depanrumah . "fotoDepanRumah_" . $id_pengajuan . "." . $file_depanrumah_ext;

    // // Pindahkan file ke folder tujuan
    // if (move_uploaded_file($file_ktp_tmp, $file_ktp_name) &&
    //     move_uploaded_file($file_depanrumah_tmp, $file_depanrumah_name)) {
        
    //     // Update database dengan nama file
    //     $query_update = "UPDATE tb_pengajuan SET
    //         Foto_KTP = '$file_ktp_name',
    //         Foto_Depan_Rumah = '$file_depanrumah_name'
    //         WHERE id_pengajuan = $id_pengajuan";

        if (mysqli_query($koneksi, $query_update)) {
            echo json_encode(["message" => "Data pengajuan dan foto berhasil disimpan."]);
        } else {
            echo json_encode(["error" => "Gagal memperbarui foto pengajuan: " . mysqli_error($koneksi)]);
        }
    } else {
        echo json_encode(["error" => "Gagal mengunggah file."]);
    }
} else {
    echo json_encode(["error" => "Gagal menyimpan data pengajuan: " . mysqli_error($koneksi)]);
}
?>
