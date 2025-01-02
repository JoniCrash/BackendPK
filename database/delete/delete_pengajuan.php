<?php
// include('../../conf/config.php');
$id = $_GET['id_pengajuan'];
$query = mysqli_query($koneksi,"DELETE FROM tb_pengajuan WHERE id_pengajuan='$id'");

echo "Data Pengajuan Berhasil Di Hapus"
// header('Location: ../../index.php?page=data-pelanggan');
?> 