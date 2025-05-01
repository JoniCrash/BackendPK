<?php
$id_pelanggan = $_GET['id'];
$query = mysqli_query($koneksi," SELECT * FROM tb_pelanggan WHERE id_pelanggan='$id_pelanggan'");
$pelanggan= mysqli_fetch_array($query);
?>

<section class = "content">
<div class="container-fluid">
           <!-- general form elements disabled -->
    <div class="card card-warning">
        <div class="card-header">
            <h3 class="card-title">Edit Data Pelanggan</h3>
        </div>
              <!-- /.card-header -->
            <div class="card-body">
                <form method='POST' action='../update/update_pelanggan.php' enctype="multipart/form-data">
                  <div class="row">
                    <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Nama Lengkap</label>
                        <input type="text" name="nama_lengkap" class="form-control" placeholder="Nama Lengkap" value = "<?php echo $pelanggan['Nama_Lengkap'];?>">
                        <input type="text" name="nama_lengkap" class="form-control" placeholder="Nama Lengkap" value = "<?php echo $pelanggan['Nama_Lengkap'];?>" hidden>
                      </div>

                      <div class="form-group">
                        <label>Nomor Identitas/KTP</label>
                        <input type="text" name="nik" class="form-control" placeholder="Nomor Identitas/KTP" value = "<?php echo $pelanggan['Nomor_Identitas_KTP'];?>">
                        <input type="text" name="nik" class="form-control" placeholder="Nomor Identitas/KTP" value = "<?php echo $pelanggan['Nomor_Identitas_KTP'];?>" hidden>
                      </div>

                        <div class="form-group">
                        <label>Alamat Pemasangan</label>
                        <textarea class="form-control" rows="3" name="alamat_pemasangan" placeholder="Alamat Pemasangan"><?php echo $pelanggan['Alamat_Pemasangan'];?></textarea>
                        <input type="text" name="alamat_pemasangan" class="form-control" placeholder="Alamat Pemasangan" value = "<?php echo $pelanggan['Alamat_Pemasangan'];?>" hidden>
                        </div>

                        <div class="form-group">
                        <label>Latitude</label>
                        <input type="text" name="latitude" class="form-control" placeholder="latitude" value = "<?php echo $pelanggan['latitude'];?>">
                        <input type="text" name="latitude" class="form-control" placeholder="latitude" value = "<?php echo $pelanggan['latitude'];?>" hidden>
                        </div>

                        <div class="form-group">
                        <label>Longitude</label>
                        <input type="text" name="longitude" class="form-control" placeholder="longitude" value = "<?php echo $pelanggan['longitude'];?>">
                        <input type="text" name="longitude" class="form-control" placeholder="longitude" value = "<?php echo $pelanggan['longitude'];?>" hidden>
                        </div>

                        <div class="form-group">
                        <label>Email</label>
                        <input type="email" name="email" class="form-control" placeholder="email" value = "<?php echo $pelanggan['Email'];?>">
                        <input type="text" name="email" class="form-control" placeholder="email" value = "<?php echo $pelanggan['Email'];?>" hidden>
                        </div>

                        <div class="form-group">
                        <label>Nomor HP 1</label>
                        <input type="text" name="no_hp1" class="form-control" placeholder="Nomor HP 1" value = "<?php echo $pelanggan['Nomor_Hp_1'];?>">
                        <input type="text" name="no_hp1" class="form-control" placeholder="Nomor HP 1" value = "<?php echo $pelanggan['Nomor_Hp_1'];?>" hidden>
                        </div>

                        <div class="form-group">
                        <label>Nomor HP 2</label>
                        <input type="text" name="no_hp2" class="form-control" placeholder="Nomor HP 2" value = "<?php echo $pelanggan['Nomor_Hp_2'];?>">
                        <input type="text" name="no_hp2" class="form-control" placeholder="Nomor HP 2" value = "<?php echo $pelanggan['Nomor_Hp_2'];?>" hidden>
                        </div>

                        <div class="form-group">
                        <label>Paket</label>
                        <input type="text" class="form-control text-sm numeric bg-light" value="<?php echo $pelanggan['nama_paket'];?>" readonly>
                        <select name="paket" id="paket" class="form-control" onchange="setPaketID()">
                          <option>Pilih</option>
                          <option value="1">30 mbps</option>
                          <option value="2">50 mbps</option>
                          <option value="3">100 mbps</option>
                      </select>
                        </div>

                        <div class="form-group">
                        <label class="font-weight-normal">ID Paket</label>
                          <input type="text" name="id_paket" id="id_paket" class="form-control" readonly />
                          <input type="hidden" id="nama_paket" name="nama_paket"/>
                        </div>
                    </div>
                  </div>
                  <div class="row">
                      <button type="submit" class="btn btn-info">Simpan</button>
                  </div>
                </form>
            </div>
              <!-- /.card-body -->
    </div>
            <!-- /.card -->
            <!-- general form elements disabled -->
</div>
</section>