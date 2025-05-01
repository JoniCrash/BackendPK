<?php
$id_pelanggan = $_GET['id'];
$query = mysqli_query($koneksi," SELECT * FROM tb_pelanggan WHERE id_pelanggan='$id_pelanggan'");
$paket= mysqli_fetch_array($query);
?>

<section class = "content">
<div class="container-fluid">
           <!-- general form elements disabled -->
    <div class="card card-warning">
        <div class="card-header">
            <h3 class="card-title">Ubah Paket Pelanggan</h3>
        </div>
              <!-- /.card-header -->
            <div class="card-body">
            <form method='POST' action='index.php?page=update-paket-pelanggan'>
  <input type="hidden" name="id_pelanggan" value="<?php echo $paket['id_pelanggan']; ?>">

  <div class="form-group">
    <label>Ubah Paket</label>
    <select name="paket" id="paket" class="form-control" onchange="setPaketID()">
      <option value="">Pilih</option>
      <option value="1">Lite</option>
      <option value="2">Family</option>
      <option value="3">Max</option>
    </select>
  </div>

  <div class="form-group">
    <label>Kecepatan</label>
    <input type="text" id="kecepatan_display" class="form-control" readonly>
    <input type="hidden" name="kecepatan" id="kecepatan">
  </div>

  <div class="form-group">
    <label>ID Paket</label>
    <input type="text" id="id_paket_display" class="form-control" readonly>
    <input type="hidden" name="id_paket" id="id_paket">
  </div>

  <input type="hidden" name="nama_paket" id="nama_paket">

  <button type="submit" class="btn btn-info">Simpan</button>
</form>

            </div>
              <!-- /.card-body -->
    </div>
            <!-- /.card -->
            <!-- general form elements disabled -->
</div>
</section>