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
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>No</th>
                    <th>ID Pengajuan</th>
                    <th>Nama Lengkap</th>
                    <th>NIK</th>
                    <th>Alamat Pemasangan</th>
                    <th>Latitude</th>
                    <th>Longitude</th>
                    <th>Email</th>
                    <th>Nomor Hp 1</th>
                    <th>Nomor Hp 2</th>
                    <th>Nama Paket</th>
                    <!-- <th>Foto KTP</th>
                    <th>Foto Depan Rumah</th> -->
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php
                    $no = 0; 
                    if (isset($_POST['filter'])) {
                      $dari_tgl = mysqli_real_escape_string($koneksi,$_POST ['dari_tgl']) ;
                      $sampai_tgl = mysqli_real_escape_string($koneksi,$_POST ['sampai_tgl']) ;
                      $query = mysqli_query ($koneksi, "SELECT * FROM tb_penfajuan WHERE dibuat_pada_ BETWEEN '$dari_tgl' AND '$sampai_tgl'");
                    }else{
                    $query = mysqli_query($koneksi, "SELECT * FROM tb_pengajuan");
                    }
                    while($pengajuan = mysqli_fetch_array($query)){
                      $no++
                    ?>
                  <tr>
                    <td width = 5%><?= $no?></td>
                    <td><a href="index.php?page=profil-pengajuan&id_pengajuan=<?php echo $pengajuan['id_pengajuan']; ?>"><?php echo $pengajuan['id_pengajuan']; ?></a></td>
                    <td><?= $pengajuan ['Nama_Lengkap'];?></td>
                    <td><?= $pengajuan ['Nomor_Identitas_KTP'];?></td>
                    <td><?= $pengajuan ['Alamat_Pemasangan'];?></td>
                    <td><?= $pengajuan ['latitude'];?></td>
                    <td><?= $pengajuan ['longitude'];?></td>
                    <td><?= $pengajuan ['Email'];?></td>
                    <td><?= $pengajuan ['Nomor_Hp_1'];?></td>
                    <td><?= $pengajuan ['Nomor_Hp_2'];?></td>
                    <td><?= $pengajuan ['nama_paket'];?></td>
                    <!-- <td><?= $pengajuan ['Foto_KTP'];?></td>
                    <td><?= $pengajuan ['Foto_Depan_Rumah'];?></td> -->
                    <td>
                      <a onclick="hapus_data_pengajuan(<?= $pengajuan ['id_pengajuan'];?>)" class="btn btn-sm btn-danger">Hapus</a>
                    
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