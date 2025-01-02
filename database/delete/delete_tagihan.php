<?php
// include('../../conf/config.php');
$id = $_GET['id_tagihan'];
$query = mysqli_query($koneksi,"DELETE FROM tb_tagihan WHERE id_tagihan='$id'");

echo "Data Tagihan Berhasil Di Hapus"
// header('Location: ../../index.php?page=data-pelanggan');
?> 