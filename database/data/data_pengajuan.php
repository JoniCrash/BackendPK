<!-- Main content -->
<section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-30">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Data Pengajuan Pemasangan Baru</h3>
              </div>
              <!-- /.card-header -->
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
                  <table id="example1" class="table table-bordered table-striped"
                  data-title="Laporan Data Pengajuan"
                  data-dari="<?= isset($_POST['filter']) ? htmlspecialchars($_POST['dari_tgl']) : '' ?>"
                  data-sampai="<?= isset($_POST['filter']) ? htmlspecialchars($_POST['sampai_tgl']) : '' ?>">
                  <thead>
                  <tr>
                    <th>No</th>
                    <th>ID Pengajuan</th>
                    <th>Nama Lengkap</th>
                    <th>Alamat Pemasangan</th>
                    <th>Email</th>
                    <th>Nomor Telepon</th>
                    <th>Paket</th>
                    <th>Status</th>
                    <th class="noExport">Action</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php
                    $no = 0;

                    if (isset($_POST['filter'])) {
                        $dari_tgl = mysqli_real_escape_string($koneksi, $_POST['dari_tgl']);
                        $sampai_tgl = mysqli_real_escape_string($koneksi, $_POST['sampai_tgl']);

                        $query = mysqli_query($koneksi, "
                            SELECT pj.*, us.username, us.email, pk.nama_paket, pk.kecepatan, pk.harga
                            FROM tb_pengajuan pj
                            INNER JOIN user_app us ON pj.id_user = us.id_user
                            INNER JOIN paket pk ON pj.id_paket = pk.id_paket
                            WHERE pj.dibuat_pada_ BETWEEN '$dari_tgl' AND '$sampai_tgl'
                            ORDER BY pj.dibuat_pada_ DESC
                        ");
                    } else {
                        $query = mysqli_query($koneksi, "
                            SELECT pj.*, us.username, us.email, pk.nama_paket, pk.kecepatan, pk.harga
                            FROM tb_pengajuan pj
                            INNER JOIN user_app us ON pj.id_user = us.id_user
                            INNER JOIN paket pk ON pj.id_paket = pk.id_paket
                            ORDER BY pj.dibuat_pada_ DESC
                        ");
                    }
                    while ($pengajuan = mysqli_fetch_array($query)) {
                        $no++;
                    ?>
                  <tr>
                    <td width = 5%><?= $no?></td>
                    <td><a href="index.php?page=profil-pengajuan&id_pengajuan=<?php echo $pengajuan['id_pengajuan']; ?>"><?php echo $pengajuan['id_pengajuan']; ?></a></td>
                    <td><?= $pengajuan ['Nama_Lengkap'];?></td>
                    <td><?= $pengajuan ['Alamat_Pemasangan'];?></td>
                    <td><?= $pengajuan ['Email'];?></td>
                    <td><?= $pengajuan ['Nomor_Hp_1'];?></td>
                    <td><?= $pengajuan ['kecepatan'];?></td>
                    <!-- <td><?= $pengajuan ['status'];?></td> -->

                    <td>
                    <select
                        onchange="ubahStatusPengajuan(<?php echo $pengajuan ['id_pengajuan'];?>, this.value)">
                        <option value="Menunggu" <?php echo ($pengajuan['status'] == 'Menunggu') ? 'selected' : ''; ?>>Menunggu</option>
                        <option value="Di Tolak" <?php echo ($pengajuan['status'] == 'Di Tolak') ? 'selected' : ''; ?>>Di Tolak</option>
                        <option value="Di Terima" <?php echo ($pengajuan['status'] == 'Di Terima') ? 'selected' : ''; ?>>Di Terima</option>
                    </select>
                    </td>

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