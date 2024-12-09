<?php
include('../../conf/config.php');

// Ambil data dari form
$nama = $_POST['nama'];
$nik = $_POST['nik'];
$alamat = $_POST['alamat'];
$provinsi = $_POST['provinsi'];
$kota = $_POST['kota'];
$latitude = $_POST['latitude'];
$longitude = $_POST['longitude'];
$email = $_POST['email'];
$no1 = $_POST['no1'];
$no2 = $_POST['no2'];
$id_paket = $_POST['id_paket'];
// $nama_paket = $_POST['paket']; // Tidak perlu lagi, kita ambil dari tabel tb_paket
$Status = $_POST['status'];

// Dapatkan nama paket berdasarkan id_paket
$query_paket = "SELECT nama_paket FROM paket WHERE id_paket = '$id_paket'";
$result_paket = mysqli_query($koneksi, $query_paket);
$paket_data = mysqli_fetch_assoc($result_paket);

// Jika nama paket ditemukan, simpan ke variabel
if ($paket_data) {
    $nama_paket = $paket_data['nama_paket'];
} else {
    $nama_paket = ''; // Jika tidak ditemukan, kosongkan nama paket (opsional)
}

// Simpan data pelanggan dengan nama paket yang sudah ditemukan
$query_insert = "INSERT INTO tb_pelanggan 
(
    Nama_Lengkap,
    Nomor_Identitas_KTP,
    Alamat_Pemasangan,
    provinsi,
    kota,
    latitude,
    longitude,
    Email,
    Nomor_Hp_1,
    Nomor_Hp_2,
    id_paket,
    nama_paket,
    Status
) VALUES (
    '$nama',
    '$nik',
    '$alamat',
    '$provinsi',
    '$kota',
    '$latitude',
    '$longitude',
    '$email',
    '$no1',
    '$no2',
    '$id_paket',
    '$nama_paket',
    '$Status'
)";

// Menyimpan data pelanggan
if (mysqli_query($koneksi, $query_insert)) {
    // Ambil ID pelanggan yang baru saja dibuat
    $id_pelanggan = mysqli_insert_id($koneksi);

    // Lokasi file sementara
    $file_ktp = $_FILES['fotoktp']['name'];
    $file_depanrumah = $_FILES['fotodepanrumah']['name'];
    $file_ktp_tmp = $_FILES['fotoktp']['tmp_name'];
    $file_depanrumah_tmp = $_FILES['fotodepanrumah']['tmp_name'];

    // Dapatkan ekstensi file
    $file_ktp_ext = strtolower(pathinfo($file_ktp, PATHINFO_EXTENSION));
    $file_depanrumah_ext = strtolower(pathinfo($file_depanrumah, PATHINFO_EXTENSION));

    // Lokasi folder tujuan
    $target_dir_ktp = '../image/foto_ktp/';
    $target_dir_depanrumah = '../image/foto_depan_rumah/';
    if (!file_exists($target_dir_ktp)) mkdir($target_dir_ktp, 0777, true);
    if (!file_exists($target_dir_depanrumah)) mkdir($target_dir_depanrumah, 0777, true);

    // Nama file dengan ID pelanggan
    $file_ktp_name = "fotoktp_" . $id_pelanggan . "." . $file_ktp_ext;
    $file_depanrumah_name = "fotoDepanRumah_" . $id_pelanggan . "." . $file_depanrumah_ext;

    // Pindahkan file ke folder tujuan
    move_uploaded_file($file_ktp_tmp, $target_dir_ktp . $file_ktp_name);
    move_uploaded_file($file_depanrumah_tmp, $target_dir_depanrumah . $file_depanrumah_name);

    // Update database dengan nama file
    $query_update = "UPDATE tb_pelanggan 
                     SET Foto_KTP = '$file_ktp_name', 
                         Foto_Depan_Rumah = '$file_depanrumah_name' 
                     WHERE id_pelanggan = $id_pelanggan";
    if (mysqli_query($koneksi, $query_update)) {
        echo "Data pelanggan dan foto berhasil disimpan.";
    } else {
        echo "Gagal memperbarui foto pelanggan: " . mysqli_error($koneksi);
    }
} else {
    echo "Gagal menyimpan data pelanggan: " . mysqli_error($koneksi);
}

header('Location: ../../index.php?page=data-pelanggan');
?>
