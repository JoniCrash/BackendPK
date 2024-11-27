<?php

// Mendapatkan id_pengajuan dari parameter URL
$id_pengajuan = isset($_GET['id_pengajuan']) ? (int)$_GET['id_pengajuan'] : 0;

// Validasi id_pengajuan
if ($id_pengajuan > 0) {
    // Query untuk mengambil data pengajuan berdasarkan id_pengajuan
    $sql = "SELECT * FROM pengajuan WHERE id_pengajuan = ?";
    $stmt = $koneksi->prepare($sql);
    $stmt->bind_param("i", $id_pengajuan);
    $stmt->execute();
    $result = $stmt->get_result();

    // Memeriksa apakah data ditemukan
    if ($result->num_rows > 0) {
        // Mengambil data hasil query
        $pengajuan = $result->fetch_assoc();
    } else {
        die("Data dengan id_pengajuan tersebut tidak ditemukan.");
    }
} else {
    die("ID pengajuan tidak valid.");
}
?>









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
                  Tambah Data
                </button>
                <br></br>
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>No</th>
                    <th>Id Pelanggan</th>
                    <th>Paket</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php
                    $no = 0; 
                    $query = mysqli_query($koneksi, "SELECT * FROM tb_paket");
                    while($paket = mysqli_fetch_array($query)){
                      $no++
                    ?>
                  <tr>
                    <td width = 5%><?php echo $no?></td>
                    <td><?php echo $paket ['id_pelanggan'];?></td>
                    <td><?php echo $paket ['paket'];?></td>
                    <td>
                      <a onclick="hapus_data(<?php echo $paket ['id'];?>)" class="btn btn-sm btn-danger">Hapus</a>
                      <!-- <a href="index.php?page=edit-data&&id=<?php echo $paket ['id'];?>" class="btn btn-sm btn-success">Edit</a> -->
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
<?php
// Menutup koneksi
$stmt->close();
$conn->close();
?>