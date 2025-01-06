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
              <a href="index.php?page=tambah-pelanggan">
              <button type="button" class="btn btn-info">Tambah Pelanggan</button>
              </a>
                <br></br>
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>No</th>
                    <th>ID Pelanggan</th>
                    <th>Nama Lengkap</th>
                    <th>Nomor Telepon</th>
                    <th>Alamat </th>
                    <th>Status</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php
                    $no = 0; 
                    $query = mysqli_query($koneksi, "SELECT * FROM tb_pelanggan");
                    while($pelanggan = mysqli_fetch_array($query)){
                      $no++
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
                    <td>
                      <a onclick="hapus_data_pelanggan(<?php echo $pelanggan ['id_pelanggan'];?>)" class="btn btn-sm btn-danger">Hapus</a>
                      <a href="index.php?page=edit-data&&id=<?php echo $pelanggan ['id_pelanggan'];?>" class="btn btn-sm btn-success">Edit</a>

                      <a onclick="buatTagihan(<?php echo $pelanggan ['id_pelanggan'];?>)" class="btn btn-sm btn-primary">Buat Tagihan</a>
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

