<?php
include('../../conf/config.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id_pengajuan = mysqli_real_escape_string($koneksi, $_POST['id_pengajuan']);

    // Ambil data dari tabel pengajuan
    $query_pengajuan = "SELECT * FROM tb_pengajuan WHERE id_pengajuan = '$id_pengajuan'";
    $result_pengajuan = mysqli_query($koneksi, $query_pengajuan);
    $data_pengajuan = mysqli_fetch_assoc($result_pengajuan);

    if ($data_pengajuan) {
        // Data berhasil ditemukan, pindahkan ke tabel pelanggan
        $nama_lengkap = $data_pengajuan['Nama_Lengkap'];
        $nomor_ktp = $data_pengajuan['Nomor_Identitas_KTP'];
        $alamat = $data_pengajuan['Alamat_Pemasangan'];
        $email = $data_pengajuan['Email'];
        $nomor_hp_1 = $data_pengajuan['Nomor_Hp_1'];
        $nomor_hp_2 = $data_pengajuan['Nomor_Hp_2'];
        $id_paket = $data_pengajuan['id_paket'];
        $nama_paket = $data_pengajuan['nama_paket'];
        $fotktp = $data_pengajuan['Foto_KTP'];
        $fotodepnrumah = $data_pengajuan['Foto_Depan_Rumah'];

        // Masukkan data ke tabel pelanggan
        $query_pelanggan = "
            INSERT INTO tb_pelanggan 
            (Nama_Lengkap, Nomor_Identitas_KTP, Alamat, Email, Nomor_Hp_1, Nomor_Hp_2, id_paket nama_paket,Foto_KTP, FotoDepanRumah) 
            VALUES 
            ('$nama_lengkap', '$nomor_ktp', '$alamat', '$email', '$nomor_hp_1', '$nomor_hp_2' ,'$id_paket','$nama_paket', '$fotoktp', '$fotodepanrumah')";

        if (mysqli_query($koneksi, $query_pelanggan)) {
            // Hapus data dari tabel pengajuan
            $query_hapus = "DELETE FROM tb_pengajuan WHERE id_pengajuan = '$id_pengajuan'";
            mysqli_query($koneksi, $query_hapus);

            echo "<script>alert('Pengajuan berhasil diterima dan ditambahkan sebagai pelanggan!'); window.location.href='index.php?page=data-pengajuan';</script>";
        } else {
            echo "<script>alert('Gagal menambahkan pelanggan!'); window.location.href='index.php?page=list-pengajuan';</script>";
        }
    } else {
        echo "<script>alert('Data pengajuan tidak ditemukan!'); window.location.href='index.php?page=list-pengajuan';</script>";
    }
} else {
    echo "<script>alert('Metode tidak valid!'); window.location.href='index.php?page=list-pengajuan';</script>";
}
?>
