<?php
$id_pelanggan = $_GET['id'];

$query = mysqli_query($koneksi, "
    SELECT p.id_pelanggan, p.id_pengajuan, peng.*
    FROM tb_pelanggan p
    JOIN tb_pengajuan peng ON p.id_pengajuan = peng.id_pengajuan
    WHERE p.id_pelanggan = '$id_pelanggan'
");

$pelanggan = mysqli_fetch_array($query);
?>


<section class="content">
<div class="container-fluid">
    <div class="card card-warning">
        <div class="card-header">
            <h3 class="card-title">Edit Data Pelanggan</h3>
        </div>
        <div class="card-body">
            <form method="POST" action="database/update/update_pelanggan.php">
    <!-- Dikirim ke update_pengajuan -->
    <input type="hidden" name="id_pengajuan" value="<?php echo $pelanggan['id_pengajuan']; ?>">
    <input type="hidden" name="id_pelanggan" value="<?php echo $pelanggan['id_pelanggan']; ?>">

      <div class="form-group">
        <label>Nama Lengkap</label>
        <input type="text" name="nama_lengkap" class="form-control" placeholder="Nama Lengkap" value = "<?php echo $pelanggan['Nama_Lengkap'];?>">
      </div>

      <div class="form-group">
        <label>Nomor Identitas/KTP</label>
        <input type="text" name="nik" class="form-control" placeholder="Nomor Identitas/KTP" value = "<?php echo $pelanggan['Nomor_Identitas_KTP'];?>">
      </div>

        <div class="form-group">
        <label>Alamat Pemasangan</label>
        <textarea class="form-control" rows="3" name="alamat_pemasangan" placeholder="Alamat Pemasangan"><?php echo $pelanggan['Alamat_Pemasangan'];?></textarea>
        </div>

        <div class="form-group">
        <label>Latitude</label>
        <input type="text" name="latitude" class="form-control" placeholder="latitude" value = "<?php echo $pelanggan['latitude'];?>">
        </div>

        <div class="form-group">
        <label>Longitude</label>
        <input type="text" name="longitude" class="form-control" placeholder="longitude" value = "<?php echo $pelanggan['longitude'];?>">
        </div>

        <div class="form-group">
        <label>Email</label>
        <input type="email" name="email" class="form-control" placeholder="email" value = "<?php echo $pelanggan['Email'];?>">
        </div>

        <div class="form-group">
        <label>Nomor HP 1</label>
        <input type="text" name="no_hp1" class="form-control" placeholder="Nomor HP 1" value = "<?php echo $pelanggan['Nomor_Hp_1'];?>">
        </div>

        <div class="form-group">
        <label>Nomor HP 2</label>
        <input type="text" name="no_hp2" class="form-control" placeholder="Nomor HP 2" value = "<?php echo $pelanggan['Nomor_Hp_2'];?>">
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
      <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
  </div>
</form>

        </div>
    </div>
</div>
</section>
