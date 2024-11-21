<?php
include('../../conf/config.php');
$username = $_POST['username'];
$email = $_POST['email'];
$password = $_POST['password'];
$sql = mysqli_query($koneksi,"INSERT INTO user_app(id,username,email,password) VALUES('','$username','$email','$password')");
?>