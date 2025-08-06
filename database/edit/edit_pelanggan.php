<?php
$id_pelanggan = $_GET['id'];
$query = mysqli_query($koneksi,"SELECT * FROM tb_pelanggan WHERE id_pelanggan='$id_pelanggan'");
$pelanggan = mysqli_fetch_array($query);
?>

<section class="content">
<div class="container-fluid">
    <div class="card card-warning">
        <div class="card-header">
            <h3 class="card-title">Edit Data Pelanggan</h3>
        </div>
        <div class="card-body">
            <form method='POST' action='../update/update_pelanggan.php' enctype="multipart/form-data">
                <!-- Kirim ID pelanggan -->
                <input type="hidden" name="id_pelanggan" value="<?php echo $pelanggan['id_pelanggan']; ?>">

                <div class="row">
                    <div class="col-sm-6">
                        <!-- Nama Lengkap -->
                        <div class="form-group">
                            <label>Nama Lengkap</label>
                            <input type="text" name="nama_lengkap" class="form-control" 
                                   value="<?php echo $pelanggan['Nama_Lengkap']; ?>" placeholder="Nama Lengkap">
                        </div>

                        <!-- NIK -->
                        <div class="form-group">
                            <label>Nomor Identitas/KTP</label>
                            <input type="text" name="nik" class="form-control" 
                                   value="<?php echo $pelanggan['Nomor_Identitas_KTP']; ?>" placeholder="Nomor Identitas/KTP">
                        </div>

                        <!-- Alamat -->
                        <div class="form-group">
                            <label>Alamat Pemasangan</label>
                            <textarea class="form-control" rows="3" name="alamat_pemasangan"
                                      placeholder="Alamat Pemasangan"><?php echo $pelanggan['Alamat_Pemasangan']; ?></textarea>
                        </div>

                        <!-- Email -->
                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" name="email" class="form-control" 
                                   value="<?php echo $pelanggan['Email']; ?>" placeholder="Email">
                        </div>

                        <!-- Nomor HP 1 -->
                        <div class="form-group">
                            <label>Nomor HP 1</label>
                            <input type="text" name="nomor_hp_1" class="form-control" 
                                   value="<?php echo $pelanggan['Nomor_Hp_1']; ?>" placeholder="Nomor HP 1">
                        </div>

                        <!-- Nomor HP 2 -->
                        <div class="form-group">
                            <label>Nomor HP 2</label>
                            <input type="text" name="nomor_hp_2" class="form-control" 
                                   value="<?php echo $pelanggan['Nomor_Hp_2']; ?>" placeholder="Nomor HP 2">
                        </div>

                        <!-- Latitude -->
                        <div class="form-group">
                            <label>Latitude</label>
                            <input type="text" name="latitude" class="form-control" 
                                   value="<?php echo $pelanggan['latitude']; ?>" placeholder="Latitude">
                        </div>

                        <!-- Longitude -->
                        <div class="form-group">
                            <label>Longitude</label>
                            <input type="text" name="longitude" class="form-control" 
                                   value="<?php echo $pelanggan['longitude']; ?>" placeholder="Longitude">
                        </div>

                        <!-- ID Paket -->
                        <div class="form-group">
                            <label>ID Paket</label>
                            <input type="text" name="id_paket" class="form-control" 
                                   value="<?php echo $pelanggan['id_paket']; ?>" placeholder="ID Paket">
                        </div>

                        <!-- Nama Paket -->
                        <div class="form-group">
                            <label>Nama Paket</label>
                            <input type="text" name="nama_paket" class="form-control" 
                                   value="<?php echo $pelanggan['nama_paket']; ?>" placeholder="Nama Paket">
                        </div>

                        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
</section>
