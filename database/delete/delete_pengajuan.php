<?php
include('../../conf/config.php');
$id = $_GET['id_pengajuan'];

$query = mysqli_query($koneksi,"DELETE FROM tb_pengajuan WHERE id='$id'");
header('Location: ../index.php?page=data-pengajuan');
?>