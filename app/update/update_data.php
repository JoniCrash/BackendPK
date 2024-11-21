<?php
include('../../conf/config.php');
$id_user = $_POST['id_user'];
$username = $_POST['username'];
$email = $_POST['email'];
$pass = $_POST['password'];

//nama foto
$nama_file = $_FILES['foto']['name'];

// echo $namafile;

//lokasi foto
$file_tmp = $_FILES['foto']['tmp_name'];
move_uploaded_file($file_tmp,'../foto/'.$nama_file);

$query = mysqli_query($koneksi, "UPDATE user_app SET username='$username', email='$email',password ='$pass', foto='$nama_file' WHERE id_user='$id_user'");
 header('Location: ../index.php?page=data-mahasiswa');
?>