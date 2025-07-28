<!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">

              <div class="card-header">
                <h3 class="card-title">Data Terminasi</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
              <!-- <a href="index.php?page=tambah-pelanggan">
              <button type="button" class="btn btn-info">Tambah Pelanggan</button>
              </a> -->
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
                <table id="example1" class="table table-bordered table-striped" data-title="Laporan Data Terminasi">
                  <thead>
                  <tr>
                    <th>No</th>
                    <th>ID Terminasi</th>
                    <th>ID Pelanggan</th>
                    <th>Nama Lengkap</th>
                    <th>Alasan</th>
                    <th>Tanggal</th>
                    <!-- <th class="noExport">Action</th> -->
                  </tr>
                  </thead>
                  <tbody>
                    <?php
                      $no = 0;
                      if (isset($_POST['filter'])) {
                          $dari_tgl = mysqli_real_escape_string($koneksi, $_POST['dari_tgl']);
                          $sampai_tgl = mysqli_real_escape_string($koneksi, $_POST['sampai_tgl']);

                          $query = mysqli_query($koneksi, "
                              SELECT 
                                  t.*, 
                                  p.*, 
                                  pj.*, 
                                  pk.*
                              FROM tb_terminasi t
                              INNER JOIN tb_pelanggan p ON t.id_pelanggan = p.id_pelanggan
                              INNER JOIN tb_pengajuan pj ON p.id_pengajuan = pj.id_pengajuan
                              INNER JOIN paket pk ON p.id_paket = pk.id_paket
                              WHERE t.dibuat_pada_ BETWEEN '$dari_tgl' AND '$sampai_tgl'
                          ");
                      } else {
                          $query = mysqli_query($koneksi, "
                              SELECT 
                                  t.*, 
                                  p.*, 
                                  pj.*, 
                                  pk.*
                              FROM tb_terminasi t
                              INNER JOIN tb_pelanggan p ON t.id_pelanggan = p.id_pelanggan
                              INNER JOIN tb_pengajuan pj ON p.id_pengajuan = pj.id_pengajuan
                              INNER JOIN paket pk ON p.id_paket = pk.id_paket
                          ");
                      }

                      while ($terminasi = mysqli_fetch_array($query)) {
                          $no++;
                      ?>
                  <tr>
                    <td width = 5%><?php echo $no?></td>
                    <td><a href="index.php?page=profil-terminasi&id_terminasi=<?php echo $terminasi['id_terminasi']; ?>"><?php echo $terminasi['id_terminasi']; ?></a></td>

                    <!-- </td> -->
                     <td><?php echo $terminasi ['id_pelanggan'];?></td>
                    <td><?php echo $terminasi ['Nama_Lengkap'];?></td>
                    <td><?php echo $terminasi ['alasan'];?></td>
                    <td><?php echo $terminasi ['dibuat_pada_'];?></td>
                    <!-- <td class="noExport">
                      <a onclick="hapus_data_terminasi(<?php echo $terminasi ['id_terminasi'];?>)" class="btn btn-sm btn-danger">Hapus</a>
                    </td> -->
                  </tr>
                  <?php }?>
                  </tbody>
                  <tfoot>
                  </tfoot>
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

