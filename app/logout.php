<?php
session_start();
unset($_SESSION['nama']);
unset($_SESSION['level']);
//session_destroy(); bisa menggunakan sesi destroy jika ingin menghapus sesi pada sebelumnya
header('Location: ../')

?>