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
                     <!-- Toggle Switch untuk Status -->
                    <select onchange="ubahStatus(<?php echo $pelanggan['id_pelanggan']; ?>, this.value)">
                      <option value="1" <?php echo $pelanggan['status'] == '1' ? 'selected' : ''; ?>>Aktif</option>
                      <option value="0" <?php echo $pelanggan['status'] == '0' ? 'selected' : ''; ?>>Nonaktif</option>
                    </select>
                  </td>
                    <td>
                      <a onclick="hapus_data(<?php echo $pelanggan ['id_pelanggan'];?>)" class="btn btn-sm btn-danger">Hapus</a>
                      <a href="index.php?page=edit-data&&id=<?php echo $pelanggan ['id_pelanggan'];?>" class="btn btn-sm btn-success">Edit</a>

                      <a onclick="tagihan(<?php echo $pelanggan ['id_pelanggan'];?>)" class="btn btn-sm btn-danger">Buat Tagihan</a>
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

    <script>
  function tagihan(id_pelanggan) {
    // Konfirmasi sebelum membuat tagihan
    if (confirm("Apakah Anda yakin ingin membuat tagihan untuk pelanggan ini?")) {
      // Arahkan ke halaman PHP dengan parameter id_pelanggan
      window.location = "tagihan/tagihan.php?id="+id_pelanggan;
    }
  }
</script>

      <Script>
        function hapus_data(data_id){
          alert("Data berhasil dihapus");
          window.location=("delete/delete_pelanggan.php?id="+data_id);
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
    window.location=("delete/delete_pelanggan.php?id="+data_id);
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