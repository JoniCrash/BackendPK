<!DOCTYPE html>
<?php
header("Cache-Control: no-cache, must-revalidate");
header("Pragma: no-cache");
header("Expires: 0");
?>

<html lang="en">
<?php
session_start();
if(!$_SESSION ['nama']){
  header('Location: ../index.php?session=pageExpired');
}
include('../conf/config.php');
// include('../database/add/add_user.php')
?>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Preloader -->
<!-- <?php include('preloader.php');?> -->

  <!-- Navbar -->
  <!-- <?php include('navbar.php');?> -->
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
<?php include('logo.php');?>
    <!-- Sidebar -->
    <?php include('sidebar.php');?>
    <!-- /.sidebar -->
  </aside>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
<!-- <?php include('content_header.php');?> -->
<?php 
include('header.php');
if (isset($_GET['page'])){
  if($_GET['page']=='dashboard'){
    //Dashboard
    include('content-header/content_header_dashboard.php');
  }elseif($_GET['page']=='user-app'){
    //User App
    include('content-header/content_header_user_app.php');
  }elseif($_GET['page']=='data-pelanggan'){
    //Data Pelanggan
    include('content-header/content_header_pelanggan.php');
  }elseif($_GET['page']=='data-pengajuan'){
    //Data Pengajuan
    include('content-header/content_header_pengajuan.php');
  }elseif($_GET['page']=='data-pembayaran'){
    //Data Pembayaran
    include('content-header/content_header_pembayaran.php');
  }elseif($_GET['page']=='profil-pelanggan'){
    include('content-header/content_header_profil_pelanggan.php');
  }
  elseif($_GET['page']=='profil-pengajuan'){
    include('content-header/content_header_profil_pengajuan.php');
  } 
  elseif($_GET['page']=='tambah-pengajuan'){
    include('content-header/content_header_pengajuan_baru.php');
  }
  elseif($_GET['page']=='tambah-pelanggan'){
    include('content-header/content_header_pelanggan_baru.php');
  }
  elseif($_GET['page']=='data-tagihan'){
    include('content-header/content_header_tagihan.php');
  }
  elseif($_GET['page']=='buat-tagihan'){
    include('content-header/content_header_buat_tagihan.php');
  }

  elseif($_GET['page']=='invoice'){
    include('content-header/content_header_invoice.php');
  }
  elseif($_GET['page']=='delete-pengajuan'){
    include('content-header/content_header_delete_pengajuan.php');
  }
  elseif($_GET['page']=='delete-pelanggan'){
    include('content-header/content_header_delete_pelanggan.php');
  }
  elseif($_GET['page']=='delete-tagihan'){
    include('content-header/content_header_delete_tagihan.php');
  }
  elseif($_GET['page']=='delete-pembayran'){
    include('content-header/content_header_delete_pembayaran.php');
  }



  else{
    include('content-header/content_header_dashboard.php');
  }
}else{
  include('content-header/content_header_dashboard.php');
}
?>
    <!-- /.content-header -->

    <!-- Main content -->

<?php
if (isset($_GET['page'])){
  if($_GET['page']=='dashboard'){
    //Dashboard
    include('dashboard.php');
  }else if($_GET['page']=='user-app'){
    //User App
    include('../database/user/data_user_app.php');
  }else if($_GET['page']=='data-pengajuan'){
    //Data Pengajuan
    include('../database/data/data_pengajuan.php');
  }else if($_GET['page']=='data-pelanggan'){
    //Data Pelanggan
    include('../database/data/data_pelanggan.php');
  }else if($_GET['page']=='data-paket'){
    //Data Paket
    include('../database/data/data_paket.php');
  }else if($_GET['page']=='data-tagihan' ){
    //Data Tagihan
    include('../database/data/data-tagihan.php');
  }else if($_GET['page']=='data-pembayaran'){
    //Data Pembayaran
    include('../database/data/data_pembayaran.php');
  }else if ($_GET['page'] == 'profil-pengajuan' && isset($_GET['id_pengajuan'])) {
    //Profil Pengajuan
    include('../database/profil/profil_pengajuan.php');
  }else if ($_GET['page'] == 'profil-pelanggan' && isset($_GET['id_pelanggan'])) {
    //Profil Pelanggan
      include('../database/profil/profil_pelanggan.php');
  }else if ($_GET['page'] == 'profil-pembayaran' && isset($_GET['id_pembayaran'])) {
    //Profil Pembayaran
    include('../database/profil/profil_pembayaran.php');
  }else if ($_GET['page'] == 'buat-tagihan' && isset($_GET['id_pelanggan'])) {
    //Buat Tagihan
    include('../database/tagihan/tagihan.php');
}else if ($_GET['page'] == 'delete-user' && isset($_GET['id_user'])) {
  //Delete Pengajuan
  include('../database/delete/delete_user.php');
}
else if ($_GET['page'] == 'delete-pengajuan' && isset($_GET['id_pengajuan'])) {
  //Delete Pengajuan
  include('../database/delete/delete_pengajuan.php');
}
else if ($_GET['page'] == 'delete-pelanggan' && isset($_GET['id_pelanggan'])) {
  //Delete Pelanggan
  include('../database/delete/delete_pelanggan.php');
}
else if ($_GET['page'] == 'delete-tagihan' && isset($_GET['id_tagihan'])) {
  //Delete Tagihan
  include('../database/delete/delete_tagihan.php');
}
else if ($_GET['page'] == 'delete-pemabayran' && isset($_GET['id_pemabayran'])) {
  //Delete Tagihan
  include('../database/delete/delete_pemabayran.php');
}
else if($_GET['page']=='tambah-pengajuan'){
  //Tambahan Pengajuan
  include('../database/add/add_pengajuan.php');
}
  else if($_GET['page']=='tambah-pelanggan'){
    //Tambahan Pelanggan
    include('../database/add/pelanggan_baru.php');
  }
  
  else if($_GET['page']=='edit-data'){
    include('edit/edit_data.php');
  }
  
  else{
    include('not-found.php');
  }
}else{
  include('dashboard.php');
}
?>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
<?php include('footer.php');?>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->

</body>
</html>
