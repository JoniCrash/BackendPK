<!-- Main content -->
<section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">

              <div class="card-header">
                <h3 class="card-title">Data Paket Pelanggan</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
              <!-- <button type="button" class="btn btn-info" data-toggle="modal" data-target="#modal-lg">
                  Tambah Data
                </button>
                <br></br> -->
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
$no = 0;

if (isset($_POST['filter'])) {
  $dari_tgl = mysqli_real_escape_string($koneksi, $_POST['dari_tgl']);
  $sampai_tgl = mysqli_real_escape_string($koneksi, $_POST['sampai_tgl']);
  $query = mysqli_query($koneksi, "
    SELECT req.*, pj.Nama_Lengkap, pk.nama_paket, pk.kecepatan
    FROM tb_req_ubah_paket req
    INNER JOIN tb_pelanggan p ON req.id_pelanggan = p.id_pelanggan
    INNER JOIN tb_pengajuan pj ON p.id_pengajuan = pj.id_pengajuan
    INNER JOIN paket pk ON req.id_paket = pk.id_paket
    WHERE req.di_buat_pada BETWEEN '$dari_tgl' AND '$sampai_tgl'
    ORDER BY req.di_buat_pada DESC
  ");
} else {
  $query = mysqli_query($koneksi, "
    SELECT req.*, pj.Nama_Lengkap, pk.nama_paket, pk.kecepatan
    FROM tb_req_ubah_paket req
    INNER JOIN tb_pelanggan p ON req.id_pelanggan = p.id_pelanggan
    INNER JOIN tb_pengajuan pj ON p.id_pengajuan = pj.id_pengajuan
    INNER JOIN paket pk ON req.id_paket = pk.id_paket
    ORDER BY req.di_buat_pada DESC
  ");
}
?>

<br><br>
  <table id="example1" class="table table-bordered table-striped"
  data-title="Laporan Data Request Ubah Paket"
  data-dari="<?= isset($_POST['filter']) ? htmlspecialchars($_POST['dari_tgl']) : '' ?>"
  data-sampai="<?= isset($_POST['filter']) ? htmlspecialchars($_POST['sampai_tgl']) : '' ?>">
<!-- <table id="example1" class="table table-bordered table-striped" data-title="Laporan Data Request Ubah Paket"> -->
  <thead>
    <tr>
      <th>No</th>
      <th>ID Request</th>
      <th>ID Pelanggan</th>
      <th>Nama Pelanggan</th>
      <th>Paket Diajukan</th>
      <th>Kecepatan</th>
      <th>Status</th>
      <th>Tanggal Request</th>
    </tr>
  </thead>
  <tbody>
    <?php while ($paket = mysqli_fetch_array($query)) { $no++; ?>
      <tr>
        <td><?php echo $no; ?></td>
        <td><?php echo $paket['id_request']; ?></td>
        <td><?php echo $paket['id_pelanggan']; ?></td>
        <td><?php echo $paket['Nama_Lengkap']; ?></td>
        <td><?php echo $paket['nama_paket']; ?></td>
        <td><?php echo $paket['kecepatan']; ?></td>
        <!-- <td><?php echo ucfirst($paket['status']); ?></td> -->
        <td>
        <select
            onchange="ubahStatusReqPaket(<?php echo $pelanggan ['id_pelanggan'];?>, this.value)">
            <option value="Menunggu" <?php echo ($pelanggan['status'] == 'Menunggu') ? 'selected' : ''; ?>>Menunggu</option>
            <option value="Di Tolak" <?php echo ($pelanggan['status'] == 'Di Tolak') ? 'selected' : ''; ?>>Di Tolak</option>
            <option value="Di Setujui" <?php echo ($pelanggan['status'] == 'Di Setujui') ? 'selected' : ''; ?>>Di Setujui</option>
        </select>
        </td>
        <td><?php echo $paket['di_buat_pada']; ?></td>
      </tr>
    <?php } ?>
  </tbody>
</table>

              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->