<?php
// include('../../conf/config.php');
$id = $_GET['id_pelanggan'];
$query = mysqli_query($koneksi,"DELETE FROM tb_pelanggan WHERE id_pelanggan='$id'");

echo "Data Pelanggan Berhasil Di Hapus"
// header('Location: ../../index.php?page=data-pelanggan');
?> 