<?php
include('../../conf/config.php');
$username = $_POST['username'];
$email = $_POST['email'];
$pass = $_POST['pass'];

$query = mysqli_query($koneksi,"INSERT INTO user_app(id_user,username,email,pass) VALUES('','$username','$email','$pass')");

header('Location: ../../app/index.php?page=user-app');
?>