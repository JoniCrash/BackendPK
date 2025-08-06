<?php
include('../../conf/config.php');
// echo '<pre>';
// print_r($_POST);
// echo '</pre>';
// exit;
$id_pengajuan = $_POST['id_pengajuan'];
$fields = [];

// Tambah kolom satu per satu jika ada datanya
if (isset($_POST['nama_lengkap'])) {
        // Ambil dari form
    $nama_lengkap = mysqli_real_escape_string($koneksi, $_POST['nama_lengkap']);
    // Siapkan untuk query update ke kolom `nomorhp1` di database
    $fields[] = "Nama_Lengkap = '$nama_lengkap'";
}
if (isset($_POST['nik'])) {
    $nik = mysqli_real_escape_string($koneksi, $_POST['nik']);
    $fields[] = "Nomor_Identitas_KTP = '$nik'";
}
if (isset($_POST['alamat_pemasangan'])) {
    $alamat = mysqli_real_escape_string($koneksi, $_POST['alamat_pemasangan']);
    $fields[] = "Alamat_Pemasangan = '$alamat'";
}
if (isset($_POST['provinsi'])) {
    $provinsi = mysqli_real_escape_string($koneksi, $_POST['provinsi']);
    $fields[] = "provinsi = '$provinsi'";
}
if (isset($_POST['kota'])) {
    $kota = mysqli_real_escape_string($koneksi, $_POST['kota']);
    $fields[] = "kota = '$kota'";
}
if (isset($_POST['latitude'])) {
    $lat = mysqli_real_escape_string($koneksi, $_POST['latitude']);
    $fields[] = "latitude = '$lat'";
}
if (isset($_POST['longitude'])) {
    $long = mysqli_real_escape_string($koneksi, $_POST['longitude']);
    $fields[] = "longitude = '$long'";
}
if (isset($_POST['email'])) {
    $email = mysqli_real_escape_string($koneksi, $_POST['email']);
    $fields[] = "Email = '$email'";
}
if (isset($_POST['no_hp1'])) {
    $no_hp1 = mysqli_real_escape_string($koneksi, $_POST['no_hp1']);
    $fields[] = "Nomor_Hp_1 = '$no_hp1'";
}
if (isset($_POST['no_hp2'])) {
    $no_hp2 = mysqli_real_escape_string($koneksi, $_POST['no_hp2']);
    $fields[] = "Nomor_Hp_2 = '$no_hp2'";
}
if (!empty($_POST['id_paket'])) {
    $id_paket = mysqli_real_escape_string($koneksi, $_POST['id_paket']);
    $fields[] = "id_paket = '$id_paket'";
}
if (!empty($_POST['nama_paket'])) {
    $nama_paket = mysqli_real_escape_string($koneksi, $_POST['nama_paket']);
    $fields[] = "nama_paket = '$nama_paket'";
}
if (!empty($_POST['kecepatan'])) {
    $kecepatan = mysqli_real_escape_string($koneksi, $_POST['kecepatan']);
    $fields[] = "kecepatan = '$kecepatan'";
}

// // Upload foto_ktp jika ada file baru
// if (isset($_FILES['foto_ktp']) && $_FILES['foto_ktp']['name'] != '') {
//     $ktp_name = $_FILES['foto_ktp']['name'];
//     $ktp_tmp = $_FILES['foto_ktp']['tmp_name'];
//     $ktp_target = 'uploads/' . time() . '_ktp_' . basename($ktp_name);
    
//     if (move_uploaded_file($ktp_tmp, $ktp_target)) {
//         $fields[] = "foto_ktp = '$ktp_target'";
//     }
// }

// // Upload foto_depan_rumah jika ada file baru
// if (isset($_FILES['foto_depan_rumah']) && $_FILES['foto_depan_rumah']['name'] != '') {
//     $rumah_name = $_FILES['foto_depan_rumah']['name'];
//     $rumah_tmp = $_FILES['foto_depan_rumah']['tmp_name'];
//     $rumah_target = 'uploads/' . time() . '_rumah_' . basename($rumah_name);
    
//     if (move_uploaded_file($rumah_tmp, $rumah_target)) {
//         $fields[] = "foto_depan_rumah = '$rumah_target'";
//     }
// }

// Gabungkan semua field yang akan diupdate
$set_clause = implode(", ", $fields);

if (!empty($set_clause)) {
    $query = "UPDATE tb_pengajuan SET $set_clause WHERE id_pengajuan = '$id_pengajuan'";
    if (mysqli_query($koneksi, $query)) {
        echo "<script>alert('Data berhasil diperbarui.'); window.location.href = 'index.php?page=data-pelanggan';</script>";
    } else {
        echo "<script>alert('Gagal update: " . mysqli_error($koneksi) . "'); history.back();</script>";
    }
} else {
    echo "<script>alert('Tidak ada perubahan data.'); history.back();</script>";
}


// $Nama_Lengkap = $_POST['nama_lengkap'];
// $Nomor_Identitas_KTP = $_POST['nik'];
// $Alamat_Pemasangan = $_POST['alamat_pemasangan'];
// $latitude = $_POST['latitude'];
// $longitude = $_POST['longitude'];
// $Email =  $_POST['email'];
// $Nomor_Hp_1 = $_POST['no_hp1'];
// $Nomor_Hp_2 = $_POST['no_hp2'];
// $id_paket = $_POST['id_paket'];
// $nama_paket = $_POST['nama_paket'];

// $query = "UPDATE tb_pengajuan SET 
//           Nama_Lengkap = '$Nama_Lengkap', 
//           Nomor_Identitas_KTP = '$Nomor_Identitas_KTP', 
//           Alamat_Pemasangan = '$Alamat_Pemasangan', 
//           latitude = '$latitude', 
//           longitude = '$longitude', 
//           Email = '$Email', 
//           Nomor_Hp_1 = '$Nomor_Hp_1', 
//           Nomor_Hp_2 = '$Nomor_Hp_2', 
//           id_paket = '$id_paket', 
//           nama_paket = '$nama_paket' 
//           WHERE id_pengajuan = '$id_pengajuan'";

// if (mysqli_query($koneksi, $query)) {
//     echo "<script>alert('Data pelanggan berhasil diperbarui.'); window.location.href = 'index.php?page=data-pelanggan';</script>";
// } else {
//     echo "<script>alert('Gagal memperbarui data: " . mysqli_error($koneksi) . "'); history.back();</script>";
// }
?>
