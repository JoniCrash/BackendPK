<?php
$host		= "localhost"; // sesuaikan alamat server anda
$username	= "root"; // sesuaikan user web server anda
$password	= ""; // sesuaikan password web server anda
$database	= "cometservice"; // sesuaikan database web server anda
$koneksi = mysqli_connect($host,$username,$password,$database);
// Mengecek Koneksi
if(!$koneksi){
    die("Koneksi Gagal: ". mysqli_connect_error());
}else{
    //echo"Koneksi Berhasil";
}
?>