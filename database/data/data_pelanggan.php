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
              <button type="button" class="btn btn-info" data-toggle="modal" data-target="#modal-lg">
                  Tambah Pelanggan
                </button>
                <br></br>
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>No</th>
                    <th>ID Pelanggan</th>
                    <th>Nama Lengkap</th>
                    <th>Nomor Telepon</th>
                    <th>Status</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php
                    $no = 0; 
                    $query = mysqli_query($koneksi, "SELECT * FROM tb_pelanggan");
                    while($mhs = mysqli_fetch_array($query)){
                      $no++
                    ?>
                  <tr>
                    <td width = 5%><?php echo $no?></td>
                    <td><!-- <?php echo $mhs ['id_pelanggan'];?> -->
                    <a href="index.php?page=profil-pelanggan"</a> <?php echo $mhs ['id_pelanggan'];?>
                    </td>
                    <td><?php echo $mhs ['Nama_Lengkap'];?></td>
                    <td><?php echo $mhs ['Nomor_Hp_1'];?></td>
                    <td><?php echo $mhs ['Alamat_Pemasangan'];?></td>
                    <td>
                     <!-- Toggle Switch untuk Status -->
                    <select onchange="ubahStatus(<?php echo $mhs['id_pelanggan']; ?>, this.value)">
                      <option value="1" <?php echo $mhs['status'] == '1' ? 'selected' : ''; ?>>Aktif</option>
                      <option value="0" <?php echo $mhs['status'] == '0' ? 'selected' : ''; ?>>Nonaktif</option>
                    </select>
                  </td>
                    <td>
                      <a onclick="hapus_data(<?php echo $mhs ['id_pelanggan'];?>)" class="btn btn-sm btn-danger">Hapus</a>
                      <a href="index.php?page=edit-data&&id=<?php echo $mhs ['id_pelanggan'];?>" class="btn btn-sm btn-success">Edit</a>
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
                    <th>action</th>
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
      <Script>
        function hapus_data(data_id){
          alert("Data berhasil dihapus");
          window.location=("delete/hapus_data.php?id="+data_id);
          Swal.fire(
            'Hapus Data',
            'Data berhasil dihapus',
           'success'
          )
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
      <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
  // Fungsi untuk Mengupdate Status
  function ubahStatus(id_pelanggan, status) {
  console.log("Mengirim status:", id_pelanggan, status); // Debug log untuk mengecek data yang dikirim
  const xhr = new XMLHttpRequest();
  xhr.open("POST", "http://localhost/BackEndpk/database/data/update.php", true);
  xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
  xhr.onreadystatechange = function () {
    if (xhr.readyState === 4) {
      console.log("Response:", xhr.responseText); // Log respons dari server untuk debugging
      if (xhr.status === 200) {
        Swal.fire('Berhasil!', 'Status berhasil diperbarui.', 'success');
      } else {
        Swal.fire('Gagal!', 'Tidak dapat memperbarui status.', 'error');
      }
    }
  };
  xhr.send("id_pelanggan=" + id_pelanggan + "&status=" + status);
}

</script>