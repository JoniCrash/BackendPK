<?php
// include('../../conf/config.php');
$id = $_GET['id_pembayaran'];
$query = mysqli_query($koneksi,"DELETE FROM tb_pembayaran WHERE id_pembayaran='$id'");

echo "Data Pembayaran Berhasil Di Hapus"
// header('Location: ../../index.php?page=data-pelanggan');
?> 