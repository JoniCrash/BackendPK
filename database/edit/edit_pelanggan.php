<?php
$id_pelanggan = $_GET['id'];
$query = mysqli_query($koneksi," SELECT * FROM tb_pelanggan WHERE id_pelanggan='$id_pelanggan'");
$view = mysqli_fetch_array($query);
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
                <form method='post' action='..update/update_pelanggan.php' enctype="multipart/form-data">
                  <div class="row">
                    <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">

                        <label>Nama Lengkap</label>
                        <input type="text" name="username" class="form-control" placeholder="Nama Lengkap" value = "<?php echo $view['Nama_Lengkap'];?>">
                        <input type="text" name="id_pelanggan" class="form-control" placeholder="Nama Lengkap" value = "<?php echo $view['id_pelanggan'];?>" hidden>
                      </div>

                      <div class="form-group">
                        <label>Nomor Identitas/KTP</label>
                        <input type="text" name="no_identitas" class="form-control" placeholder="Nomor Identitas/KTP" value = "<?php echo $view['Nomor_Identitas/KTP'];?>">
                        <input type="text" name="id_pelanggan" class="form-control" placeholder="Nomor Identitas/KTP" value = "<?php echo $view['id_pelanggan'];?>" hidden>
                      </div>

                      <div class="form-group">
                        <label>Alamat Sesuai KTP</label>
                        <textarea class="form-control" rows="3" name="alamat_ktp" placeholder="Alamat Sesuai KTP"><?php echo $view['Alamat_Sesuai_KTP'];?></textarea>
                        <input type="text" name="id_pelanggan" class="form-control" placeholder="Alamat Sesuai KTP" value = "<?php echo $view['id_pelanggan'];?>" hidden>
                        </div>

                        <div class="form-group">
                        <label>Alamat Pemasangan</label>
                        <textarea class="form-control" rows="3" name="alamat_pemasangan" placeholder="Alamat Pemasangan"><?php echo $view['Alamat_Pemasangan'];?></textarea>
                        <input type="text" name="id_pelanggan" class="form-control" placeholder="Alamat Pemasangan" value = "<?php echo $view['id_pelanggan'];?>" hidden>
                        </div>

                        <div class="form-group">
                        <label>Titik Kordinat</label>
                        <input type="text" name="titik_kordinat" class="form-control" placeholder="Titik Kordinat" value = "<?php echo $view['Titik_kordinat'];?>">
                        <input type="text" name="id_pelanggan" class="form-control" placeholder="Titik Kordinat" value = "<?php echo $view['id_pelanggan'];?>" hidden>
                        </div>

                        <div class="form-group">
                        <label>Email</label>
                        <input type="email" name="email" class="form-control" placeholder="email" value = "<?php echo $view['Email'];?>">
                        <input type="text" name="id_pelanggan" class="form-control" placeholder="email" value = "<?php echo $view['id_pelanggan'];?>" hidden>
                        </div>

                        <div class="form-group">
                        <label>Nomor HP 1</label>
                        <input type="text" name="no_hp1" class="form-control" placeholder="Nomor HP 1" value = "<?php echo $view['Nomor_Hp_1'];?>">
                        <input type="text" name="id_pelanggan" class="form-control" placeholder="Nomor HP 1" value = "<?php echo $view['id_pelanggan'];?>" hidden>
                        </div>

                        <div class="form-group">
                        <label>Nomor HP 2</label>
                        <input type="text" name="no_hp1" class="form-control" placeholder="Nomor HP 2" value = "<?php echo $view['Nomor_Hp_2'];?>">
                        <input type="text" name="id_pelanggan" class="form-control" placeholder="Nomor HP 2" value = "<?php echo $view['id_pelanggan'];?>" hidden>
                        </div>

                        <div class="form-group">
                        <label>ID Paket</label>
                        <select class="custom-select" name = "id_paket" required >
                        <option value="<?php echo $view['id_paket'];?>" selected><?php echo $view['id_paket'];?></option>
                        <option value="30MBPS">Paket 30 MBPS</option>
                        <option value="50MBPS">Paket 50 MBPS</option>
                        <option value="50MBPS">Paket 100 MBPS</option>
                        </select>
                        </div>

                        <div class="form-group">
                        <label>Foto KTP</label>
                        <img id="preview1" src="foto/<?php echo $view['foto_ktp'];?>" class="mt-2 img-fluid rounded mx-auto d-block" alt="KTP" title="KTP" style="max-height: 200px;">
                        <div class="mt-2 mb-3 ml-1 mr-1"></div>
                        <div class="input-group input-group-sm">
                          <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroupFileAddon03">Upload</span>
                          </div>
                          <div class="custom-file">
                            <input type="file" class="custom-file-input" id="inputGroupFile03" name="foto_ktp" aria-describedby="inputGroupFileAddon03">
                            <label class="custom-file-label" for="inputGroupFile03">Choose file</label>
                          </div>
                        </div>
                        </div>

                        <div class="form-group">
                        <label>Foto Depan Rumah</label>
                        <img id="preview2" src="foto/<?php echo $view['foto_depan_rumah'];?>" class="mt-2 img-fluid rounded mx-auto d-block" alt="Foto Depan Rumah" title="Foto Depan Rumah" style="max-height: 200px;">
                        <div class="mt-2 mb-3 ml-1 mr-1"></div>
                        <div class="input-group input-group-sm">
                          <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroupFileAddon02">Upload</span>
                          </div>
                        </div>
                        <div class="custom-file">
                          <input type="file" class="custom-file-input" id="inputGroupFile02" name="foto_depan_rumah" aria-describedby="inputGroupFileAddon02">
                          <label class="custom-file-label" for="inputGroupFile02">Choose file</label>
                        </div>
                        </div>
                    </div>
                    <!-- <div class="col-sm-6">
                      <div class="form-group">
                        <label>Nim</label>
                        <input type="text" name = "nim" class="form-control" placeholder="Nim" value = "<?php echo $view['nim'];?>">
                      </div>
                    </div> -->
                  </div>
                  <div class="row">
                    <div class="col-sm-6">
                    <label class="from-label" for="customFile">Upload Foto</label>
                    <input type="file" name="foto" class="form-control" id="customFile"/>
                    </div>
                  </div>
                  <div class="row"> 
                  <div class="col-sm-12">
                    <!-- folder naro foto -->
                  <img src="foto/<?php echo $view['foto'];?>" width="100px" class="rounded">
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