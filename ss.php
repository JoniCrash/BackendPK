<?php
$host		= "localhost"; 
$username	= "root"; 
$password	= ""; 
$database	= "cometservice"; 
$koneksi = mysqli_connect($host,$username,$password,$database);

if(!$koneksi){die("Koneksi Gagal: ". mysqli_connect_error());}else{echo"Koneksi Berhasil";}
?>
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


}else if($username ==''|| $password ==''){header('Location: ../index.php?eror=2');}else{
echo "<script>alert('Username atau Password Salah')</script>";
header('Location: ../index.php?eror=1');}

?>
<!DOCTYPE html>
<?php
header("Cache-Control: no-cache, must-revalidate");
header("Pragma: no-cache");
header("Expires: 0");
?>

<html lang="en">
<?php
session_start();
if(!$_SESSION ['nama']){header('Location: ../index.php?session=pageExpired');}
include('../conf/config.php');

?>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <?php include('logo.php');?>
    <?php include('sidebar.php');?>
  </aside>
  <div class="content-wrapper">
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
  }elseif($_GET['page']=='data-paket-pelanggan'){
    //Data Paket Pelanggan
    include('content-header/content_header_data_paket_pelanggan.php');
  }elseif($_GET['page']=='data-pengajuan'){
    //Data Pengajuan
    include('content-header/content_header_pengajuan.php');
  }elseif($_GET['page']=='data-pembayaran'){
    //Data Pembayaran
    include('content-header/content_header_pembayaran.php');
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
    //Profil Pngajuan
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

  else{
    include('content-header/content_header_dashboard.php');
  }
}else{
  include('content-header/content_header_dashboard.php');
}
?>
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
  else{
    include('not-found.php');
  }
 }else{
  include('dashboard.php');
}
?>
 </div>
<?php include('footer.php');?>
  <aside class="control-sidebar control-sidebar-dark">
  </aside>
</div>
</body>
</html>
<?php
include('../conf/config.php');
$query = "
    SELECT 
	(SELECT COUNT(*) FROM user_app) as totaluser,
	(SELECT COUNT(*) FROM tb_pengajuan) as totalPengajuan,
	(SELECT COUNT(*) FROM tb_pelanggan) as totalPelanggan,
	(SELECT COUNT(*) FROM tb_tagihan) as totalTagihan,
	(SELECT COUNT(*) FROM tb_pembayaran) as totalPembayaran	
";
$result = $koneksi->query($query);

if ($result) {
    $data = $result->fetch_assoc();
	$totaluser = $data['totaluser'];
    $totalPelanggan = $data['totalPelanggan'];
    $totalTagihan = $data['totalTagihan'];
    $totalPembayaran = $data['totalPembayaran'];
    $totalPengajuan = $data['totalPengajuan'];
} else {
    $totaluser = $totalPelanggan = $totalTagihan = $totalPembayaran = $totalPengajuan = 0;
}
?>
<section class="content">
			<div class="container-fluid">
				<div class="row">
					<div class="col-lg-3 col-6">
						<div class="small-box bg-info">
							<div class="inner">
								<h3><?php echo $totaluser; ?></h3>
								<p>Total User</p>
							</div>
							<div class="icon">
                            <i class="ion ion-person"></i>
                        </div>
                        <a href="index.php?page=data-user" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
					</div>
					</div>
					<div class="col-lg-3 col-6">
						<div class="small-box bg-success">
							<div class="inner">
								<h3><?php echo $totalPengajuan; ?><sup style="font-size: 20px"></sup></h3>

								<p>Total Pengajuan</p>
							</div>
							<div class="icon">
								<i class="ion ion-person-add"></i>
							</div>
							<a href="index.php?page=data-pengajuan" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
						</div>
					</div>
					<div class="col-lg-3 col-6">
						<div class="small-box bg-warning">
							<div class="inner">
								<h3><?php echo $totalPelanggan; ?></h3>

								<p>Total Pelanggan</p>
							</div>
							<div class="icon">
								<i class="ion ion-person"></i>
							</div>
							<a href="index.php?page=data-pelanggan" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
						</div>
					</div>
					<div class="col-lg-3 col-6">
						<div class="small-box bg-danger">
							<div class="inner">
								<h3><?php echo $totalTagihan; ?></h3>

								<p>Total Tagihan</p>
							</div>
							<div class="icon">
								<i class="ion ion-cash"></i>
							</div>
							<a href="index.php?page=data-tagihan" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
						</div>
					</div>
					<div class="col-lg-3 col-6">
						<div class="small-box bg-secondary">
							<div class="inner">
								<h3><?php echo $totalPembayaran; ?></h3>

								<p>total Pembayaran</p>
							</div>
							<div class="icon">
								<i class="ion ion-cash"></i>
							</div>
							<a href="index.php?page=data-pembayaran" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
						</div>
					</div>
				</div>
			</div>
		</section>
<section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Data Paket Pelanggan</h3>
              </div>
              <div class="card-body">
              <button type="button" class="btn btn-info" data-toggle="modal" data-target="#modal-lg">
                  Tambah Data
                </button>
                <br></br>
                <form method="post">
                  <table>
                    <tr>
                      <td>Dari Tanggal</td>
                      <td><input type="date" name="dari_tgl" required="required"></td>
                      <td>Sampai Tanggal</td>
                      <td><input type="date" name="sampai_tgl" required="required"></td>
                      <td><button type="submit" class="btn btn-info" name="filter" value="Filter">Filter</button>
                    </tr>
                  </table>
                </form>
                <?php
                if (isset($_POST['filter'])) {
                  $dari_tgl = mysqli_real_escape_string($koneksi,$_POST['dari_tgl']);
                  $sampai_tgl = mysqli_real_escape_string($koneksi,$_POST['sampai_tgl']);
                  echo " Dari Tanggal  " . $dari_tgl . " Sampai Tanggal  " . $sampai_tgl ;
                }
              ?>
              <br><br>
                <table id="example1" class="table table-bordered table-striped" data-title="Laporan Data Paket Pelanggan">
                  <thead>
                  <tr>
                    <th>No</th>
                    <th>Id Pelanggan</th>
                    <th>Nama Pelanggan</th>
                    <th>Paket</th>
                    <th>Kecepatan</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php
                    $no = 0; 
                    if (isset($_POST['filter'])) {
                      $dari_tgl = mysqli_real_escape_string($koneksi,$_POST ['dari_tgl']) ;
                      $sampai_tgl = mysqli_real_escape_string($koneksi,$_POST ['sampai_tgl']) ;
                      $query = mysqli_query ($koneksi, "SELECT * FROM tb_pelanggan WHERE dibuat_pada_ BETWEEN '$dari_tgl' AND '$sampai_tgl'");
                    }else{
                    $query = mysqli_query($koneksi, "SELECT * FROM tb_pelanggan");
                    }
                    while($paket = mysqli_fetch_array($query)){
                      $no++
                    ?>
                  <tr>
                    <td width = 5%><?php echo $no?></td>
                    <td><?php echo $paket ['id_pelanggan'];?></td>
                    <td><?php echo $paket ['Nama_Lengkap'];?></td>
                    <td><?php echo $paket ['nama_paket'];?></td>
                    <td><?php echo $paket ['kecepatan'];?></td>
                    <td>
                    <a href="index.php?page=ubah-paket-pelanggan&id=<?php echo $paket ['id_pelanggan'];?>" class="btn btn-sm btn-success">Ubah Paket</a>
                    </td>
                  </tr>
                  <?php }?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
      <Script>
        function hapus_data(data_id){
          alert("Data berhasil dihapus");
          window.location=("delete/hapus_data.php?id="+data_id);
          Swal.fire(
            'Hapus Data',
            'Data berhasil dihapus',
           'success'
          )
          Swal.fire({
  title: 'Apakah anda yakin ingin menghapus data?',
  //showDenyButton: false,
  showCancelButton: true,
  confirmButtonText: 'Hapus Data',
  confirmButtonColor:'red',
  //denyButtonText: 'No',
  customClass: {
    actions: 'my-actions',
    cancelButton: 'order-1 right-gap',
    confirmButton: 'order-2',
    denyButton: 'order-3',
  },
}).then((result) => {
  if (result.isConfirmed) {
    window.location=("delete/hapus_data.php?id="+data_id);
  } 
})
        }
      </Script>
<section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">

              <div class="card-header">
                <h3 class="card-title">Data Paket</h3>
              </div>
              <div class="card-body">
              <button type="button" class="btn btn-info" data-toggle="modal" data-target="#modal-lg">
                  Tambah Paket
                </button>
                <br>
              <br><br>
                <table id="example1" class="table table-bordered table-striped" data-title="Laporan Data Paket">
                  <thead>
                  <tr>
                    <th>No</th>
                    <th>Paket</th>
                    <th>Kecepatan</th>
                    <th>Harga</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php
                    $no = 0;
                    $query = mysqli_query($koneksi, "SELECT * FROM paket");
                    
                    while($paket = mysqli_fetch_array($query)){
                      $no++
                    ?>
                  <tr>
                    <td width = 5%><?php echo $no?></td>
                    <td><?php echo $paket ['nama_paket'];?></td>
                    <td><?php echo $paket ['kecepatan'];?></td>
                    <td><?php echo $paket ['harga'];?></td>
                  </tr>
                  <?php }?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
      <Script>
        function hapus_data(data_id){
          alert("Data berhasil dihapus");
          window.location=("delete/hapus_data.php?id="+data_id);
          Swal.fire(
            'Hapus Data',
            'Data berhasil dihapus',
           'success'
          )
          Swal.fire({
  title: 'Apakah anda yakin ingin menghapus data?',
  showCancelButton: true,
  confirmButtonText: 'Hapus Data',
  confirmButtonColor:'red',
  customClass: {
    actions: 'my-actions',
    cancelButton: 'order-1 right-gap',
    confirmButton: 'order-2',
    denyButton: 'order-3',
  },
}).then((result) => {
  if (result.isConfirmed) {
    window.location=("delete/hapus_data.php?id="+data_id);
  } 
})
        }
      </Script>
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">

              <div class="card-header">
                <h3 class="card-title">Data Pelanggan</h3>
              </div>
              <div class="card-body">
              <a href="index.php?page=tambah-pelanggan">
              <button type="button" class="btn btn-info">Tambah Pelanggan</button>
              </a>
                <br></br>
                <form method="post">
                  <table>
                    <tr>
                      <td>Dari Tanggal</td>
                      <td><input type="date" name="dari_tgl" required="required"></td>
                      <td>Sampai Tanggal</td>
                      <td><input type="date" name="sampai_tgl" required="required"></td>
                      <td><button type="submit" class="btn btn-info" name="filter" value="Filter">Filter</button>
                    </tr>
                  </table>
                </form>
                <?php
                if (isset($_POST['filter'])) {
                  $dari_tgl = mysqli_real_escape_string($koneksi,$_POST['dari_tgl']);
                  $sampai_tgl = mysqli_real_escape_string($koneksi,$_POST['sampai_tgl']);
                  echo " Dari Tanggal  " . $dari_tgl . " Sampai Tanggal  " . $sampai_tgl ;
                }
              ?>
              <br><br>
                <table id="example1" class="table table-bordered table-striped" data-title="Laporan Data Pelanggan">
                  <thead>
                  <tr>
                    <th>No</th>
                    <th>ID Pelanggan</th>
                    <th>Nama Lengkap</th>
                    <th>Nomor Telepon</th>
                    <th>Alamat </th>
                    <th>Status</th>
                    <th class="noExport">Action</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php
                    $no = 0; 
                    if (isset($_POST['filter'])) {
                      $dari_tgl = mysqli_real_escape_string($koneksi,$_POST ['dari_tgl']) ;
                      $sampai_tgl = mysqli_real_escape_string($koneksi,$_POST ['sampai_tgl']) ;
                      $query = mysqli_query ($koneksi, "SELECT * FROM tb_pelanggan WHERE dibuat_pada_ BETWEEN '$dari_tgl' AND '$sampai_tgl'");
                    }else{
                    $query = mysqli_query($koneksi, "SELECT * FROM tb_pelanggan");
                    }
                    while($pelanggan = mysqli_fetch_array($query)){
                      $no++
                    ?>
                  <tr>
                    <td width = 5%><?php echo $no?></td>

                    <td><a href="index.php?page=profil-pelanggan&id_pelanggan=<?php echo $pelanggan['id_pelanggan']; ?>"><?php echo $pelanggan['id_pelanggan']; ?></a></td>
                    <td><?php echo $pelanggan ['Nama_Lengkap'];?></td>
                    <td><?php echo $pelanggan ['Nomor_Hp_1'];?></td>
                    <td><?php echo $pelanggan ['Alamat_Pemasangan'];?></td>
                    <td>
                    <select
                        onchange="ubahStatusPelanggan(<?php echo $pelanggan ['id_pelanggan'];?>, this.value)">
                        <option value="Nonaktif" <?php echo ($pelanggan['Status'] == 'Nonaktif') ? 'selected' : ''; ?>>Nonaktif</option>
                        <option value="Aktif" <?php echo ($pelanggan['Status'] == 'Aktif') ? 'selected' : ''; ?>>Aktif</option>
                    </select>
                    </td>
                    <td class="noExport">
                      <a onclick="hapus_data_pelanggan(<?php echo $pelanggan ['id_pelanggan'];?>)" class="btn btn-sm btn-danger">Hapus</a>
                      <a href="index.php?page=edit-pelanggan&id=<?php echo $pelanggan ['id_pelanggan'];?>" class="btn btn-sm btn-success">Edit</a>

                      <a onclick="buatTagihan(<?php echo $pelanggan ['id_pelanggan'];?>)" class="btn btn-sm btn-primary">Buat Tagihan</a>
                    </td>
                  </tr>
                  <?php }?>
                  </tbody>
                  <tfoot>
                  </tfoot>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
<section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">

              <div class="card-header">
                <h3 class="card-title">Data Pembayaran</h3>
              </div>
              <div class="card-body">
              <button type="button" class="btn btn-info" data-toggle="modal" data-target="#modal-lg">
                  Tambah Data
                </button>
                <br></br>
                <form method="post">
                  <table>
                    <tr>
                      <td>Dari Tanggal</td>
                      <td><input type="date" name="dari_tgl" required="required"></td>
                      <td>Sampai Tanggal</td>
                      <td><input type="date" name="sampai_tgl" required="required"></td>
                      <td><button type="submit" class="btn btn-info" name="filter" value="Filter">Filter</button>
                    </tr>
                  </table>
                </form>
                <?php
                if (isset($_POST['filter'])) {
                  $dari_tgl = mysqli_real_escape_string($koneksi,$_POST['dari_tgl']);
                  $sampai_tgl = mysqli_real_escape_string($koneksi,$_POST['sampai_tgl']);
                  echo " Dari Tanggal  " . $dari_tgl . " Sampai Tanggal  " . $sampai_tgl ;
                }
              ?>
              <br><br>
                <table id="example1" class="table table-bordered table-striped" data-title="Laporan Data Pembayaran">
                  <thead>
                  <tr>
                    <th>No</th>
                    <th>ID Pembayaran</th>
                    <th>Nama</th>
                    <th>Periode</th>
                    <th>Status</th>
                    <th class="noExport">Actions</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php
                    $no = 0; 
                    if (isset($_POST['filter'])) {
                      $dari_tgl = mysqli_real_escape_string($koneksi,$_POST ['dari_tgl']) ;
                      $sampai_tgl = mysqli_real_escape_string($koneksi,$_POST ['sampai_tgl']) ;
                      $query = mysqli_query ($koneksi, "SELECT * FROM tb_pembayaran WHERE dibuat_pada_ BETWEEN '$dari_tgl' AND '$sampai_tgl'");
                    }else{
                    $query = mysqli_query($koneksi, "SELECT * FROM tb_pembayaran");
                    }
                    while($pembayaran = mysqli_fetch_array($query)){
                      $no++
                    ?>
                  <tr>
                    <td width = 5%><?php echo $no?></td>
                     <td><a href="index.php?page=profil-pembayaran&id_pembayaran=<?php echo $pembayaran['id_pembayaran']; ?>"><?php echo $pembayaran['id_pembayaran']; ?></a></td>
                    <td><?php echo $pembayaran['Nama_Lengkap']; ?></td>
                    <td><?php echo $pembayaran ['periode'];?></td>
                    <td>
                    <select
                        onchange="ubahStatusPembayaran(<?php echo $pembayaran ['id_pembayaran'];?>, this.value)">
                        <option value="Lunas" <?php echo ($pembayaran['Status'] == 'Lunas') ? 'selected' : ''; ?>>Lunas</option>
                        <option value="BelumLunas" <?php echo ($pembayaran['Status'] == 'BelumLunas') ? 'selected' : ''; ?>>Belum Lunas</option>
                    </select>
                  </td>
                    <td class="noExport">
                      <a onclick="hapus_data_pembayaran(<?php echo $pembayaran ['id_pembayaran'];?>)" class="btn btn-sm btn-danger">Hapus</a>
                    </td>
                  </tr>
                  <?php }?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
<section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-30">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Data Pengajuan Pemasangan Baru</h3>
              </div>
              <div class="card-body">
                <form method="post">
                  <table>
                    <tr>
                      <td>Dari Tanggal</td>
                      <td><input type="date" name="dari_tgl" required="required"></td>
                      <td>Sampai Tanggal</td>
                      <td><input type="date" name="sampai_tgl" required="required"></td>
                      <td><button type="submit" class="btn btn-info" name="filter" value="Filter">Filter</button>
                    </tr>
                  </table>
                </form>
                <?php
                if (isset($_POST['filter'])) {
                  $dari_tgl = mysqli_real_escape_string($koneksi,$_POST['dari_tgl']);
                  $sampai_tgl = mysqli_real_escape_string($koneksi,$_POST['sampai_tgl']);
                  echo " Dari Tanggal  " . $dari_tgl . " Sampai Tanggal  " . $sampai_tgl ;
                }
              ?>
              <br><br>
                <table id="example1" class="table table-bordered table-striped" data-title="Laporan Data Pengajuan">
                  <thead>
                  <tr>
                    <th>No</th>
                    <th>ID Pengajuan</th>
                    <th>ID User</th>
                    <th>Nama Lengkap</th>
                    <th>NIK</th>
                    <th>Alamat Pemasangan</th>
                    <th>Email</th>
                    <th>Nomor Telepon</th>
                    <th>Paket</th>
                    <th class="noExport">Action</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php
                    $no = 0; 
                    if (isset($_POST['filter'])) {
                      $dari_tgl = mysqli_real_escape_string($koneksi,$_POST ['dari_tgl']) ;
                      $sampai_tgl = mysqli_real_escape_string($koneksi,$_POST ['sampai_tgl']) ;
                      $query = mysqli_query ($koneksi, "SELECT * FROM tb_pengajuan WHERE dibuat_pada_ BETWEEN '$dari_tgl' AND '$sampai_tgl'");
                    }else{
                    $query = mysqli_query($koneksi, "SELECT * FROM tb_pengajuan");
                    }
                    while($pengajuan = mysqli_fetch_array($query)){
                      $no++
                    ?>
                  <tr>
                    <td width = 5%><?= $no?></td>
                    <td><a href="index.php?page=profil-pengajuan&id_pengajuan=<?php echo $pengajuan['id_pengajuan']; ?>"><?php echo $pengajuan['id_pengajuan']; ?></a></td>
                    <td><?php echo $pengajuan['id_user']; ?></td>
                    <td><?= $pengajuan ['Nama_Lengkap'];?></td>
                    <td><?= $pengajuan ['Nomor_Identitas_KTP'];?></td>
                    <td><?= $pengajuan ['Alamat_Pemasangan'];?></td>
                    <td><?= $pengajuan ['Email'];?></td>
                    <td><?= $pengajuan ['Nomor_Hp_1'];?></td>
                    <td><?= $pengajuan ['nama_paket'];?></td>
                    <td class="noExport">
                      <a onclick="hapus_data_pengajuan(<?= $pengajuan ['id_pengajuan'];?>)" class="btn btn-sm btn-danger">Hapus</a>
                      
                    <form action="index.php?page=terima-pengajuan" method="POST" style="display:inline;">
                        <input type="hidden" name="id_pengajuan" value="<?= $pengajuan['id_pengajuan']; ?>">
                        <button type="submit" class="btn btn-sm btn-success">Terima</button>
                    </form>

                    
                    </td>
                  </tr>
                  <?php }?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
      </section>
<section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">

              <div class="card-header">
                <h3 class="card-title">Data Tagihan</h3>
              </div>
              <div class="card-body">
              <a href="index.php?page=tambah-pelanggan">
              <button type="button" class="btn btn-info">Tambah Tagihan</button>
              </a>
                <br></br>
                <form method="post">
                  <table>
                    <tr>
                      <td>Dari Tanggal</td>
                      <td><input type="date" name="dari_tgl" required="required"></td>
                      <td>Sampai Tanggal</td>
                      <td><input type="date" name="sampai_tgl" required="required"></td>
                      <td><button type="submit" class="btn btn-info" name="filter" value="Filter">Filter</button>
                    </tr>
                  </table>
                </form>
                <?php
                if (isset($_POST['filter'])) {
                  $dari_tgl = mysqli_real_escape_string($koneksi,$_POST['dari_tgl']);
                  $sampai_tgl = mysqli_real_escape_string($koneksi,$_POST['sampai_tgl']);
                  echo " Dari Tanggal  " . $dari_tgl . " Sampai Tanggal  " . $sampai_tgl ;
                }
              ?>
              <br><br>
                <table id="example1" class="table table-bordered table-striped" data-title="Laporan Data Tagihan">
                  <thead>
                  <tr>
                    <th>No</th>
                    <th>Nama Lengkap</th>
                    <th>ID Tagihan</th>
                    <th>ID Pelanggan</th>
                    <th>Paket</th>
                    <th>Kecepatan</th>
                    <th>Total Harga</th>
                    <th>Status</th>
                    <th class="noExport">Action</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php
                    $no = 0; 
                    if (isset($_POST['filter'])) {
                      $dari_tgl = mysqli_real_escape_string($koneksi,$_POST ['dari_tgl']) ;
                      $sampai_tgl = mysqli_real_escape_string($koneksi,$_POST ['sampai_tgl']) ;
                      $query = mysqli_query ($koneksi, "SELECT * FROM tb_tagihan WHERE dibuat_pada_ BETWEEN '$dari_tgl' AND '$sampai_tgl'");
                    }else{
                    $query = mysqli_query($koneksi, "SELECT * FROM tb_tagihan");
                    }
                    while($tagihan = mysqli_fetch_array($query)){
                      $no++
                    ?>
                  <tr>
                    <td width = 5%><?php echo $no?></td>
                    <td><?php echo $tagihan['Nama_Lengkap']; ?></td>
                    <td><?php echo $tagihan['id_tagihan']; ?></td>
                    <td><?php echo $tagihan ['id_pelanggan'];?></td>
                    <td><?php echo $tagihan ['nama_paket'];?></td>
                    <td><?php echo $tagihan ['kecepatan'];?></td>
                    <td><?php echo $tagihan ['total_harga'];?></td>
                    <td>
                    <select
                        onchange="ubahStatusTagihan(<?php echo $tagihan ['id_tagihan'];?>, this.value)">
                        <option value="Lunas" <?php echo ($tagihan['status'] == 'Lunas') ? 'selected' : ''; ?>>Lunas</option>
                        <option value="Belum Lunas" <?php echo ($tagihan['status'] == 'Belum Lunas') ? 'selected' : ''; ?>>Belum Lunas</option>
                    </select>
                    </td>
                    <td class="noExport"><a onclick="hapus_data_tagihan(<?php echo $tagihan ['id_tagihan'];?>)" class="btn btn-sm btn-danger">Hapus</a></td>
                  </tr>
                  <?php }?>
                  </tbody>
                  <tfoot>
                  </tfoot>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
      <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
  function ubahStatus(id_pelanggan, status) {
  console.log("Mengirim status:", id_pelanggan, status);
  const xhr = new XMLHttpRequest();
  xhr.open("POST", "http://localhost/BackEndpk/database/data/update.php", true);
  xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
  xhr.onreadystatechange = function () {
    if (xhr.readyState === 4) {
      console.log("Response:", xhr.responseText);
      if (xhr.status === 200) {
        Swal.fire('Berhasil!', 'Status berhasil diperbarui.', 'success');
      } else {
        Swal.fire('Gagal!', 'Tidak dapat memperbarui status.', 'error');
      }
    }
  };
  xhr.send("id_pelanggan=" + id_pelanggan + "&status=" + status);
}
</script>
