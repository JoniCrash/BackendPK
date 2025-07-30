<!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">

              <div class="card-header">
                <h3 class="card-title">Data Pelanggan</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
              <!-- <a href="index.php?page=tambah-pelanggan">
              <button type="button" class="btn btn-info">Tambah Pelanggan</button>
              </a> -->
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
                <table id="example1" class="table table-bordered table-striped"
                  data-title="Laporan Data Pelanggan"
                  data-dari="<?= isset($_POST['filter']) ? htmlspecialchars($_POST['dari_tgl']) : '' ?>"
                  data-sampai="<?= isset($_POST['filter']) ? htmlspecialchars($_POST['sampai_tgl']) : '' ?>">

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
                            $dari_tgl = date('Y-m-d', strtotime($_POST['dari_tgl']));
                            $sampai_tgl = date('Y-m-d', strtotime($_POST['sampai_tgl']));

                            $query = mysqli_query($koneksi, "
                                SELECT p.*, 
                                      pj.*, 
                                      pk.*
                                FROM tb_pelanggan p
                                INNER JOIN tb_pengajuan pj ON p.id_pengajuan = pj.id_pengajuan
                                INNER JOIN paket pk ON p.id_paket = pk.id_paket
                                WHERE pj.dibuat_pada_ BETWEEN '$dari_tgl' AND '$sampai_tgl'
                            ");
                        } else {
                            $query = mysqli_query($koneksi, "
                                SELECT p.*, 
                                      pj.*, 
                                      pk.*
                                FROM tb_pelanggan p
                                INNER JOIN tb_pengajuan pj ON p.id_pengajuan = pj.id_pengajuan
                                INNER JOIN paket pk ON p.id_paket = pk.id_paket
                            ");
                        }

                        while ($pelanggan = mysqli_fetch_array($query)) {
                            $no++;
                        ?>
                  <tr>
                    <td width = 5%><?php echo $no?></td>

                    <td><a href="index.php?page=profil-pelanggan&id_pelanggan=<?php echo $pelanggan['id_pelanggan']; ?>"><?php echo $pelanggan['id_pelanggan']; ?></a></td>

                    <!-- </td> -->
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
                      <a href="index.php?page=edit-pelanggan&id=<?php echo $pelanggan ['id_pelanggan'];?>" class="btn btn-sm btn-success">Edit</a>
                      <a onclick="buatTagihan(<?php echo $pelanggan ['id_pelanggan'];?>)" class="btn btn-sm btn-primary">Buat Tagihan</a>
                        <form action="index.php?page=buat-terminasi" method="POST" style="display:inline;">
                        <input type="hidden" name="id_pelanggan" value="<?= $pelanggan['id_pelanggan']; ?>">
                        <button type="submit" class="btn btn-sm btn-danger">Terminasi</button>
                    </form>
                      
                    </td>
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

