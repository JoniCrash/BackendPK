<?php
session_start();
include('config.php');
$username = $_POST['username'];
$password = $_POST['password'];

$query = mysqli_query($koneksi , "SELECT * FROM adm WHERE username = '$username' AND password = '$password'");
if(mysqli_num_rows($query)==1) {
    header('Location: ../app');
    $user = mysqli_fetch_array($query);
    $_SESSION['nama'] = $user['nama'];
    $_SESSION['level'] = $user['level'];


}else if($username ==''|| $password ==''){
    header('Location: ../index.php?eror=2');

}
    else{
    echo "<script>alert('Username atau Password Salah')</script>";
    // echo "<script>window.location='index.php'</script>";
    header('Location: ../index.php?eror=1');
}

?>