<!-- Main content -->
<section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">

              <div class="card-header">
                <h3 class="card-title">Data Paket</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
              <button type="button" class="btn btn-info" data-toggle="modal" data-target="#modal-lg">
                  Tambah Paket
                </button>
                <br>
                <!-- <form method="post">
                  <table>
                    <tr>
                      <td>Dari Tanggal</td>
                      <td><input type="date" name="dari_tgl" required="required"></td>
                      <td>Sampai Tanggal</td>
                      <td><input type="date" name="sampai_tgl" required="required"></td>
                      <td><button type="submit" class="btn btn-info" name="filter" value="Filter">Filter</button>
                    </tr>
                  </table>
                </form> -->
                <?php
                // if (isset($_POST['filter'])) {
                //   $dari_tgl = mysqli_real_escape_string($koneksi,$_POST['dari_tgl']);
                //   $sampai_tgl = mysqli_real_escape_string($koneksi,$_POST['sampai_tgl']);
                //   echo " Dari Tanggal  " . $dari_tgl . " Sampai Tanggal  " . $sampai_tgl ;
                // }
              ?>
              <br><br>
                <table id="example1" class="table table-bordered table-striped" data-title="Laporan Data Paket">
                  <thead>
                  <tr>
                    <th>No</th>
                    <!-- <th>Id Paket</th> -->
                    <th>Paket</th>
                    <th>Kecepatan</th>
                    <th>Harga</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php
                    $no = 0;
                    $query = mysqli_query($koneksi, "SELECT * FROM paket");
                    
                    while($paket = mysqli_fetch_array($query)){
                      $no++
                    ?>
                  <tr>
                    <td width = 5%><?php echo $no?></td>
                    <!-- <td><?php echo $paket ['id_paket'];?></td> -->
                    <td><?php echo $paket ['nama_paket'];?></td>
                    <td><?php echo $paket ['kecepatan'];?></td>
                    <td>Rp <?php echo number_format($paket['harga'], 0, ',', '.'); ?></td>
                    <!-- <td><?php echo $paket ['harga'];?></td> -->
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