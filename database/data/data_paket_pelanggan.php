<!-- Main content -->
<section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">

              <div class="card-header">
                <h3 class="card-title">Data Paket Pelanggan</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
              <button type="button" class="btn btn-info" data-toggle="modal" data-target="#modal-lg">
                  Tambah Data
                </button>
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
                <table id="example1" class="table table-bordered table-striped" data-title="Laporan Data Paket Pelanggan">
                  <thead>
                  <tr>
                    <th>No</th>
                    <th>Id Pelanggan</th>
                    <th>Nama Pelanggan</th>
                    <th>Paket</th>
                    <th>Kecepatan</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php
                    $no = 0; 
                    if (isset($_POST['filter'])) {
                      $dari_tgl = mysqli_real_escape_string($koneksi,$_POST ['dari_tgl']) ;
                      $sampai_tgl = mysqli_real_escape_string($koneksi,$_POST ['sampai_tgl']) ;
                      $query = mysqli_query ($koneksi, "SELECT * FROM tb_pelanggan WHERE dibuat_pada_ BETWEEN '$dari_tgl' AND '$sampai_tgl'");
                    }else{
                    $query = mysqli_query($koneksi, "SELECT * FROM tb_pelanggan");
                    }
                    while($paket = mysqli_fetch_array($query)){
                      $no++
                    ?>
                  <tr>
                    <td width = 5%><?php echo $no?></td>
                    <td><?php echo $paket ['id_pelanggan'];?></td>
                    <td><?php echo $paket ['Nama_Lengkap'];?></td>
                    <td><?php echo $paket ['nama_paket'];?></td>
                    <td><?php echo $paket ['kecepatan'];?></td>
                    <!-- <td>
                    <select
                        onchange="ubahPaket(<?php echo $paket ['id_pelanggan'];?>, this.value)">
                        <option value="30 MBPS" <?php echo ($paket['nama_paket'] == '30 MBPS') ? 'selected' : ''; ?>>30 MBPS</option>
                        <option value="50 MBPS" <?php echo ($paket['nama_paket'] == '50 MBPS') ? 'selected' : ''; ?>>50 MBPS</option>
                        <option value="100 MBPS" <?php echo ($paket['nama_paket'] == '100 MBPS') ? 'selected' : ''; ?>>100 MBPS</option>
                    </select>
                    </td> -->
                    <td>
                      <a onclick="hapus_data(<?php echo $paket ['id_pelanggan'];?>)" class="btn btn-sm btn-danger">Ubah Paket</a>
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