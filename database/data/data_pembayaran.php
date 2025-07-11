<!-- Main content -->
<section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">

              <div class="card-header">
                <h3 class="card-title">Data Pembayaran</h3>
              </div>
              <!-- /.card-header -->
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
                    <!-- <th>Bukti Pembayaran</th> -->
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
                      $query = mysqli_query($koneksi, "
                        SELECT 
                            pb.*, 
                            pl.Nama_Lengkap
                        FROM tb_pembayaran pb
                        JOIN tb_tagihan tg ON pb.id_tagihan = tg.id_tagihan
                        JOIN tb_pelanggan pl ON tg.id_pelanggan = pl.id_pelanggan
                        WHERE pb.dibuat_pada_ BETWEEN '$dari_tgl' AND '$sampai_tgl'
                    ");
                    }else{
                    $query = mysqli_query($koneksi, "
                      SELECT 
                          pb.*, 
                          pl.Nama_Lengkap
                      FROM tb_pembayaran pb
                      JOIN tb_tagihan tg ON pb.id_tagihan = tg.id_tagihan
                      JOIN tb_pelanggan pl ON tg.id_pelanggan = pl.id_pelanggan
                  ");
                    }
                    while($pembayaran = mysqli_fetch_array($query)){
                      $no++
                    ?>
                  <tr>
                    <td width = 5%><?php echo $no?></td>
                     <td><a href="index.php?page=profil-pembayaran&id_pembayaran=<?php echo $pembayaran['id_pembayaran']; ?>"><?php echo $pembayaran['id_pembayaran']; ?></a></td>
                    <td><?php echo $pembayaran['Nama_Lengkap']; ?></td>

                    <!-- <td>
                    <img src="../database/android/pelanggan/<?= htmlspecialchars($pembayaran['bukti_pembayaran']) ?>" alt="Bukti Pembayaran" style="max-width: 30%; height: 30%; border: 1px solid #ccc; border-radius: 5px;">   
                    </td> -->
                    <!-- <td><?php echo $pembayaran ['bukti_pembayaran'];?></td> -->
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
                  <!-- <tfoot>
                  <tr>
                    <th>Rendering engine</th>
                    <th>Browser</th>
                    <th>Platform(s)</th>
                    <th>Engine version</th>
                    <th>CSS grade</th>
                  <th>fdfd</th>
                  <th>fdgdf</th>
                  </tr>
                  </tfoot> -->
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