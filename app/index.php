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
<!-- <?php //include('preloader.php');?> -->

  <!-- Navbar -->
  <!-- <?php //include('navbar.php');?> -->
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
  }elseif($_GET['page']=='data-user'){
    //User App
    include('content-header/content_header_user.php');
  }elseif($_GET['page']=='data-pelanggan'){
    //Data Pelanggan
    include('content-header/content_header_pelanggan.php');
  }elseif($_GET['page']=='data-paket'){
    //data paket
    include('content-header/content_header_data_paket.php');
      }elseif($_GET['page']=='data-request-ubah-paket'){
    //data paket
    include('content-header/content_header_data_request_ubah_paket.php');
  }elseif($_GET['page']=='data-paket-pelanggan'){
    //Data Paket Pelanggan
    include('content-header/content_header_data_paket_pelanggan.php');
  }elseif($_GET['page']=='data-pengajuan'){
    //Data Pengajuan
    include('content-header/content_header_pengajuan.php');
  }elseif($_GET['page']=='data-pembayaran'){
    //Data Pembayaran
    include('content-header/content_header_pembayaran.php');
      }elseif($_GET['page']=='data-terminasi'){
    //Data Terminasi
    include('content-header/content_header_data_terminasi.php');
  }elseif($_GET['page']=='profil-pelanggan'){
    //Profil Pelanggan
    include('content-header/content_header_profil_pelanggan.php');
  }
  elseif($_GET['page']=='profil-pengajuan'){
    //Profil Pengajuan
    include('content-header/content_header_profil_pengajuan.php');
  } 
  elseif($_GET['page']=='profil-pembayaran'){
    //Profil Pembayaran
    include('content-header/content_header_profil_pembayaran.php');
  }
  elseif($_GET['page']=='tambah-pengajuan'){
    //Tambah Pengajuan
    include('content-header/content_header_pengajuan_baru.php');
  }
    elseif($_GET['page']=='terima-pengajuan'){
    //terima pengajuan
    include('content-header/content_header_terima_pengajuan.php');
  }
  elseif($_GET['page']=='tambah-pelanggan'){
    //tambah pelanggan
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
  elseif($_GET['page']=='delete-pembayaran'){
    include('content-header/content_header_delete_pembayaran.php');
  }
  elseif($_GET['page']=='edit-pelanggan'){
    include('content-header/content_header_edit_pelanggan.php');
  }
  elseif($_GET['page']=='ubah-paket-pelanggan'){
    include('content-header/content_header_ubah_paket_pelanggan.php');
  }
  elseif($_GET['page']=='update-pelanggan'){
    include('content-header/content_header_update_pelanggan.php');
  }
  elseif($_GET['page']=='update-paket-pelanggan'){
    include('content-header/content_header_update_paket_pelanggan.php');
  }
  elseif($_GET['page']=='buat-terminasi'){
    //buat terminasi
    include('content-header/content_header_buat_terminasi.php');
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
  }else if($_GET['page']=='data-user'){
    //User App
    include('../database/data/data_user.php');
  }else if($_GET['page']=='data-paket'){
    //Data Paket Pelanggan
    include('../database/data/data_paket.php');
      }else if($_GET['page']=='data-request-ubah-paket'){
    //Data Request Ubah Paket
    include('../database/data/req_ubah_paket.php');
  }else if($_GET['page']=='data-pengajuan'){
    //Data Pengajuan
    include('../database/data/data_pengajuan.php');
  }else if($_GET['page']=='data-pelanggan'){
    //Data Pelanggan
    include('../database/data/data_pelanggan.php');
  }else if($_GET['page']=='data-paket-pelanggan'){
    //Data Paket Pelanggan
    include('../database/data/data_paket_pelanggan.php');
  }else if($_GET['page']=='data-tagihan' ){
    //Data Tagihan
    include('../database/data/data-tagihan.php');
  }else if($_GET['page']=='data-pembayaran'){
    //Data Pembayaran
    include('../database/data/data_pembayaran.php');
      }else if($_GET['page']=='data-terminasi'){
    //Data Terminasi
    include('../database/data/data_terminasi.php');
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
else if ($_GET['page'] == 'delete-pembayaran' && isset($_GET['id_pembayaran'])) {
  //Delete Pembayaran
  include('../database/delete/delete_pembayaran.php');
}
else if($_GET['page']=='tambah-pengajuan'){
  //Tambahan Pengajuan
  include('../database/add/add_pengajuan.php');
}

else if($_GET['page']=='terima-pengajuan'){
  //Terima pengajuan
  include('../database/add/acc_pengajuan.php');
}

  else if($_GET['page']=='tambah-pelanggan'){
    //Tambahan Pelanggan
    include('../database/add/pelanggan_baru.php');
  }
  else if($_GET['page']=='edit-pelanggan'){
    include('../database/edit/edit_pelanggan.php');
  }
  else if($_GET['page']=='ubah-paket-pelanggan'){
    include('../database/edit/ubah_paket_pelanggan.php');
  }
  else if($_GET['page']=='update-pelanggan'){
    include('../database/update/update_pelanggan.php');
  }
  else if($_GET['page']=='update-paket-pelanggan'){
    include('../database/update/update_paket_pelanggan.php');
  }
  else if($_GET['page']=='buat-terminasi'){
  //Terima pengajuan
  include('../database/add/add_terminasi.php');
}
  // else if($_GET['page']=='edit-data'){
  //   include('edit/edit_data.php');
  // }
  
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
