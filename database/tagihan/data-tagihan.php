<!-- Main content -->
<section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">

              <div class="card-header">
                <h3 class="card-title">Data Tagihan</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
              <a href="index.php?page=tambah-pelanggan">
              <button type="button" class="btn btn-info">Tambah Tagihan</button>
              </a>
                <br></br>
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>No</th>
                    <th>ID Tagihan</th>
                    <th>ID Pelanggan</th>
                    <th>ID Paket</th>
                    <th>Total Harga</th>
                    <th>Status</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php
                    $no = 0; 
                    $query = mysqli_query($koneksi, "SELECT * FROM tb_tagihan");
                    while($tagihan = mysqli_fetch_array($query)){
                      $no++
                    ?>
                  <tr>
                    <td width = 5%><?php echo $no?></td>
                    <td><?php echo $tagihan['id_tagihan']; ?></td>
                    <td><?php echo $tagihan ['id_pelanggan'];?></td>
                    <td><?php echo $tagihan ['id_paket'];?></td>
                    <td><?php echo $tagihan ['total_harga'];?></td>
                    <td><?php echo $tagihan ['status'];?></td>
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