<!-- Main content -->
<section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">

              <div class="card-header">
                <h3 class="card-title">User Aplikasi</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
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
                <br>
                <?php
                if (isset($_POST['filter'])) {
                  $dari_tgl = mysqli_real_escape_string($koneksi,$_POST['dari_tgl']);
                  $sampai_tgl = mysqli_real_escape_string($koneksi,$_POST['sampai_tgl']);
                  echo " Dari Tanggal  " . $dari_tgl . " Sampai Tanggal  " . $sampai_tgl ;
                }
              ?>
              <br><br>
                  <table id="example1" class="table table-bordered table-striped"
                  data-title="Laporan Data User"
                  data-dari="<?= isset($_POST['filter']) ? htmlspecialchars($_POST['dari_tgl']) : '' ?>"
                  data-sampai="<?= isset($_POST['filter']) ? htmlspecialchars($_POST['sampai_tgl']) : '' ?>">
                <!-- <table id="example1" class="table table-bordered table-striped" data-title="Laporan Data User"> -->
                  <thead>
                  <tr>
                    <th>No</th>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Password</th>
                    <th>Dibuat</th>
                    <th class="noExport">Action</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php
                    $no = 0; 
                    if (isset($_POST['filter'])) {
                      $dari_tgl = mysqli_real_escape_string($koneksi,$_POST ['dari_tgl']) ;
                      $sampai_tgl = mysqli_real_escape_string($koneksi,$_POST ['sampai_tgl']) ;
                      $query = mysqli_query ($koneksi, "SELECT * FROM user_app WHERE dibuat_pada_ BETWEEN '$dari_tgl' AND '$sampai_tgl'");
                    }else{

                    $query = mysqli_query($koneksi, "SELECT * FROM user_app");
                    }
                    while($user = mysqli_fetch_array($query)){
                      $no++
                    ?>
                  <tr>
                    <td width = 5%><?php echo $no?></td>
                    <td><?php echo $user ['username'];?></td>
                    <td><?php echo $user ['email'];?></td>
                    <td><?php echo $user ['pass'];?></td>
                    <td><?php echo $user ['dibuat_pada_'];?></td>
                    <td class="noExport">
                      <a onclick="hapus_data_user(<?php echo $user ['id_user'];?>)" class="btn btn-sm btn-danger">Hapus</a>
                    </td>
                  </tr>
                  <?php }?>
                  </tbody>    
                  <!-- <tfoot>
                    <th>Rendering engine</th>
                  </tr>
                  </tfoot> -->
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