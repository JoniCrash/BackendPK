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
                </button> -->
                <!-- <br></br> -->
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
                    <th class="noExport">Action</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php
                    $no = 0; 
                    if (isset($_POST['filter'])) {
                      $dari_tgl = mysqli_real_escape_string($koneksi,$_POST ['dari_tgl']) ;
                      $sampai_tgl = mysqli_real_escape_string($koneksi,$_POST ['sampai_tgl']) ;
                      $query = mysqli_query($koneksi, "
                      SELECT p.*, 
                             pj.*, 
                             pk.*
                      FROM tb_pelanggan p
                      INNER JOIN tb_pengajuan pj ON p.id_pengajuan = pj.id_pengajuan
                      INNER JOIN paket pk ON p.id_paket = pk.id_paket
                      WHERE pj.dibuat_pada_ BETWEEN '$dari_tgl' AND '$sampai_tgl'
                    ");
                    }else{
                    $query = mysqli_query($koneksi, "
                      SELECT p.*, 
                             pj.*, 
                             pk.*
                      FROM tb_pelanggan p
                      INNER JOIN tb_pengajuan pj ON p.id_pengajuan = pj.id_pengajuan
                      INNER JOIN paket pk ON p.id_paket = pk.id_paket
                  ");
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
                    <td class="noExport">
                    <a href="index.php?page=ubah-paket-pelanggan&id=<?php echo $paket ['id_pelanggan'];?>" class="btn btn-sm btn-success">Ubah Paket</a>
                    </td>
                  </tr>
                  <?php }?>
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