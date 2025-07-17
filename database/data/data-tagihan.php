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
                <table id="example1" class="table table-bordered table-striped" data-title="Laporan Data Tagihan">
                  <thead>
                  <tr>
                    <th>No</th>
                    <th>Nama Lengkap</th>
                    <th>ID Tagihan</th>
                    <th>Paket</th>
                    <th>Periode</th>
                    <th>Total Harga</th>
                    <th>Status</th>
                    <th class="noExport">Action</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php
                      $no = 0; 
                      if (isset($_POST['filter'])) {
                          $dari_tgl = mysqli_real_escape_string($koneksi, $_POST['dari_tgl']);
                          $sampai_tgl = mysqli_real_escape_string($koneksi, $_POST['sampai_tgl']);
                          
                          $query = mysqli_query($koneksi, "
                              SELECT 
                                  t.*,             -- Data tagihan
                                  p.*,             -- Data pelanggan
                                  pj.*,            -- Data pengajuan
                                  pk.*  -- Ambil kolom penting dari paket
                              FROM tb_tagihan t
                              INNER JOIN tb_pelanggan p ON t.id_pelanggan = p.id_pelanggan
                              INNER JOIN tb_pengajuan pj ON p.id_pengajuan = pj.id_pengajuan
                              INNER JOIN paket pk ON p.id_paket = pk.id_paket
                              WHERE t.dibuat_pada_ BETWEEN '$dari_tgl' AND '$sampai_tgl'
                          ");
                      } else {
                          $query = mysqli_query($koneksi, "
                              SELECT 
                                  t.*, 
                                  p.*, 
                                  pj.*, 
                                  pk.*
                              FROM tb_tagihan t
                              INNER JOIN tb_pelanggan p ON t.id_pelanggan = p.id_pelanggan
                              INNER JOIN tb_pengajuan pj ON p.id_pengajuan = pj.id_pengajuan
                              INNER JOIN paket pk ON p.id_paket = pk.id_paket
                          ");
                      }

                      while($tagihan = mysqli_fetch_array($query)){
                          $no++;
                      ?>
                  <tr>
                    <td width = 5%><?php echo $no?></td>
                    <td><?php echo $tagihan['Nama_Lengkap']; ?></td>
                    <td><?php echo $tagihan['id_tagihan']; ?></td>
                    <td><?php echo $tagihan ['kecepatan'];?></td>
                    <td><?php echo $tagihan ['periode'];?></td>
                    <td><?php echo $tagihan ['total_harga'];?></td>
                    <td>
                    <select
                        onchange="ubahStatusTagihan(<?php echo $tagihan ['id_tagihan'];?>, this.value)">
                        <option value="Lunas" <?php echo ($tagihan['status'] == 'Lunas') ? 'selected' : ''; ?>>Lunas</option>
                        <option value="Belum Lunas" <?php echo ($tagihan['status'] == 'Belum Lunas') ? 'selected' : ''; ?>>Belum Lunas</option>
                    </select>
                      <!-- <?php echo $tagihan ['status'];?> -->
                    </td>
                    <td class="noExport"><a onclick="hapus_data_tagihan(<?php echo $tagihan ['id_tagihan'];?>)" class="btn btn-sm btn-danger">Hapus</a></td>
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

    <!-- <Script>
        function hapus_data(data_id){
          alert("Data berhasil dihapus");
          window.location=("delete/delete_tagihan.php?id="+data_id);
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
    window.location=("delete/delete_tagihan.php?id="+data_id);
  } 
})
        }
      </Script> -->
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