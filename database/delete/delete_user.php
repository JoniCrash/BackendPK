<?php
// include('../../conf/config.php');
$id = $_GET['id_user'];

$query = mysqli_query($koneksi,"DELETE FROM user_app WHERE id_user='$id'");
// header('Location: ../index.php?page=user-app');
echo "Data user Berhasil Di Hapus"
?>