<?php
include('../conf/config.php');

// Query Gabungan
$query = "
    SELECT 
	(SELECT COUNT(*) FROM user_app) as totaluser,
	(SELECT COUNT(*) FROM tb_pengajuan) as totalPengajuan,
	(SELECT COUNT(*) FROM tb_pelanggan) as totalPelanggan,
	(SELECT COUNT(*) FROM tb_tagihan) as totalTagihan,
	(SELECT COUNT(*) FROM tb_pembayaran) as totalPembayaran,
	(SELECT COUNT(*) FROM tb_terminasi) as totalTerminasi
";
$result = $koneksi->query($query);

if ($result) {
    $data = $result->fetch_assoc();
	$totaluser = $data['totaluser'];
    $totalPelanggan = $data['totalPelanggan'];
    $totalTagihan = $data['totalTagihan'];
    $totalPembayaran = $data['totalPembayaran'];
    $totalPengajuan = $data['totalPengajuan'];
	$totalTerminasi = $data['totalTerminasi'];
} else {
    $totaluser = $totalPelanggan = $totalTagihan = $totalPembayaran = $totalPengajuan = $totalTerminasi= 0;
}




// $query = "SELECT COUNT(*) as total FROM tb_pelanggan";

// $result = $koneksi->query($query);

// if ($result) {
//     $row = $result->fetch_assoc();
//     $totalPelanggan = $row['total'];
// } else {
//     $totalPelanggan = 0;
// }
?>
<section class="content">
			<div class="container-fluid">
				<!-- Small boxes (Stat box) -->
				<div class="row">
					<div class="col-lg-3 col-6">
						<!-- small box -->
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
					<!-- ./col -->
					<div class="col-lg-3 col-6">
						<!-- small box -->
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
					<!-- ./col -->
					<div class="col-lg-3 col-6">
						<!-- small box -->
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
					<!-- ./col -->
					<div class="col-lg-3 col-6">
						<!-- small box -->
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
					<!-- ./col -->
					<div class="col-lg-3 col-6">
						<!-- small box -->
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
										<div class="col-lg-3 col-6">
						<!-- small box -->
						<div class="small-box bg-danger">
							<div class="inner">
								<h3><?php echo $totalTerminasi; ?></h3>

								<p>total Terminasi</p>
							</div>
							<div class="icon">
								<i class="ion ion-trash-outline"></i>
							</div>
							<a href="index.php?page=data-terminasi" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
						</div>
					</div>
				</div>
				<!-- /.row -->
				<!-- Main row -->
				<!-- /.row (main row) -->
			</div><!-- /.container-fluid -->
		</section>