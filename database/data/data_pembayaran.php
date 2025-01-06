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
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>No</th>
                    <th>ID</th>
                    <th>Nama</th>
                    <!-- <th>ID Tagihan</th> -->
                    <th>Bukti Pembayaran</th>
                    <th>Periode</th>
                    <th>Status</th>
                    <th>Di Buat Pada</th>
                    <th>Actions</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php
                    $no = 0; 
                    $query = mysqli_query($koneksi, "SELECT * FROM tb_pembayaran");
                    while($pembayaran = mysqli_fetch_array($query)){
                      $no++
                    ?>
                  <tr>
                    <td width = 5%><?php echo $no?></td>
                     <td><a href="index.php?page=profil-pembayaran&id_pembayaran=<?php echo $pembayaran['id_pembayaran']; ?>"><?php echo $pembayaran['id_pembayaran']; ?></a></td>
                    <td><?php echo $pembayaran['Nama_Lengkap']; ?></td>
                    <!-- <td><?php echo $pembayaran ['id_tagihan'];?></td> -->
                    <td><?php echo $pembayaran ['bukti_pembayaran'];?></td>
                    <td><?php echo $pembayaran ['periode'];?></td>
                    <td>
                    <select
                        onchange="ubahStatusPembayaran(<?php echo $pembayaran ['id_pembayaran'];?>, this.value)">
                        <option value="Lunas" <?php echo ($pembayaran['Status'] == 'Lunas') ? 'selected' : ''; ?>>Lunas</option>
                        <option value="Belum Lunas" <?php echo ($pembayaran['Status'] == 'Belum Lunas') ? 'selected' : ''; ?>>Belum Lunas</option>
                        
                    </select>
                  
                  </td>
                    <td><?php echo $pembayaran ['dibuat_pada_'];?></td>
                    <td>
                      <a onclick="hapus_data_pembayaran(<?php echo $pembayaran ['id_pembayaran'];?>)" class="btn btn-sm btn-danger">Hapus</a>
                    </td>
                  </tr>
                  <?php }?>
                  </tbody>
                  <tfoot>
                  <tr>
                    <th>Rendering engine</th>
                    <th>Browser</th>
                    <th>Platform(s)</th>
                    <th>Engine version</th>
                    <th>CSS grade</th>
                  <th>fdfd</th>
                  <th>fdgdf</th>
                  <th>dgdgf</th>
                  </tr>
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