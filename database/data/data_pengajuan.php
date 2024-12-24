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
                    <th>Alamat Pemasangan</th>
                    <th>Latitude</th>
                    <th>Longitude</th>
                    <th>Email</th>
                    <th>Nomor Hp 1</th>
                    <th>Nomor Hp 2</th>
                    <th>ID Paket</th>
                    <th>Nama Paket</th>
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
                    <td><?= $pengajuan ['Nama_Lengkap'];?></td>
                    <td><?= $pengajuan ['Nomor_Identitas_KTP'];?></td>
                    <td><?= $pengajuan ['Alamat_Pemasangan'];?></td>
                    <td><?= $pengajuan ['latitude'];?></td>
                    <td><?= $pengajuan ['longitude'];?></td>
                    <td><?= $pengajuan ['Email'];?></td>
                    <td><?= $pengajuan ['Nomor_Hp_1'];?></td>
                    <td><?= $pengajuan ['Nomor_Hp_2'];?></td>
                    <td><?= $pengajuan ['id_paket'];?></td>
                    <td><?= $pengajuan ['nama_paket'];?></td>
                    <td><?= $pengajuan ['Foto_KTP'];?></td>
                    <td><?= $pengajuan ['Foto_Depan_Rumah'];?></td>
                    <td>
                      <a onclick="hapus_data(<?= $pengajuan ['id_pengajuan'];?>)" class="btn btn-sm btn-danger">Hapus</a>
                      <!-- <a href="index.php?page=edit-data&&id=<?= $pengajuan ['id_pengajuan'];?>" class="btn btn-sm btn-success">Edit</a> -->
                    
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
    window.location=("delete/delete_pengajuan.php?id="+data_id);
  } 
})
        }
      </Script>