<?php
include('../../conf/config.php');
$username = $_GET['username'];
$email = $_GET['email'];
$pass = $_GET['pass'];

$query = mysqli_query($koneksi,"INSERT INTO user_app(id_user,username,email,pass) VALUES('','$username','$email','$pass')");

header('Location: ../index.php?page=user-app');
?>