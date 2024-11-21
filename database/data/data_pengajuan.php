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
              <button type="button" class="btn btn-info" data-toggle="modal" data-target="#modal-lg">
                  Tambah Data
                </button>
                <br></br>
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>No</th>
                    <th>Id</th>
                    <th>Nama Lengkap</th>
                    <th>NIK</th>
                    <th>Alamat KTP</th>
                    <th>Alamat Pemasangan</th>
                    <th>Titik Kordinat</th>
                    <th>Email</th>
                    <th>Nomor Hp 1</th>
                    <th>Nomor Hp 2</th>
                    <th>Paket</th>
                    <th>Foto KTP</th>
                    <th>Foto Depan Rumah</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php
                    $no = 0; 
                    $query = mysqli_query($koneksi, "SELECT * FROM tb_pengajuan");
                    while($pengajuan = mysqli_fetch_array($query)){
                      $no++
                    ?>
                  <tr>
                    <td width = 5%><?= $no?></td>
                    <td><?= $pengajuan ['id_pengajuan'];?></td>
                    <td><?= $pengajuan ['Nama Lengkap'];?></td>
                    <td><?= $pengajuan ['Nomor Identitas / KTP'];?></td>
                    <td><?= $pengajuan ['Alamat Sesuai KTP'];?></td>
                    <td><?= $pengajuan ['Alamat Pemasangan'];?></td>
                    <td><?= $pengajuan ['Titik Kordinat'];?></td>
                    <td><?= $pengajuan ['Email'];?></td>
                    <td><?= $pengajuan ['Nomor Hp 1'];?></td>
                    <td><?= $pengajuan ['Nomor Hp 2'];?></td>
                    <td><?= $pengajuan ['Paket'];?></td>
                    <td><?= $pengajuan ['Foto KTP'];?></td>
                    <td><?= $pengajuan ['Foto Depan Rumah'];?></td>
                    <td>
                      <a onclick="hapus_data(<?= $pengajuan ['id_pengajuan'];?>)" class="btn btn-sm btn-danger">Hapus</a>
                      <a href="index.php?page=edit-data&&id=<?= $pengajuan ['id_pengajuan'];?>" class="btn btn-sm btn-success">Edit</a>
                    
                    </td>
                  </tr>
                  <?php }?>
                  </tbody>
                  <tfoot>
                  <!-- <tr>
                    <th>Rendering engine</th>
                    <th>Browser</th>
                    <th>Platform(s)</th>
                    <th>Engine version</th>
                    <th>CSS grade</th>
                  </tr> -->
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
    <div class="modal fade" id="modal-lg">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Large Modal</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form class="form-horizontal" method = "get" action="add/tambah_data.php">
            <div class="modal-body">
              
                <div class="form-group">
                  <label class="control-label col-sm-2" for="username">Nama Lengkap:</label>
                  <div class="col-sm-10">
                    <input type="text" name = "username" class="form-control" id="username" placeholder="Masukan username" required >
                  </div>
                </div>




                <div class="form-group">
                  <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" class="btn btn-default">Submit</button>
                  </div>
                </div>
              
              <p>One fine body&hellip;</p>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button>
              <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
            </form>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <Script>
        function hapus_data(data_id){
          //alert("Data berhasil dihapus");
          //window.location=("delete/hapus_data.php?id="+data_id);
          // Swal.fire(
          //   'Hapus Data',
          //   'Data berhasil dihapus',
          //  'success'
          // )
          Swal.fire({
  title: 'Apakah anda yakin ingin menghapus data?',
  //showDenyButton: false,
  showCancelButton: true,
  confirmButtonText: 'Hapus Data',
  confirmButtonColor:'red',
  //denyButtonText: 'No',
  customClass: {
    actions: 'my-actions',
    cancelButton: 'order-1 right-gap',
    confirmButton: 'order-2',
    denyButton: 'order-3',
  },
}).then((result) => {
  if (result.isConfirmed) {
    window.location=("delete/hapus_data.php?id="+data_id);
  } 
})
        }
      </Script>