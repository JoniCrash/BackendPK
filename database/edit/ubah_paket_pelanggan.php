<?php
$id_pelanggan = $_GET['id'];
$query = mysqli_query($koneksi, "SELECT * FROM tb_pelanggan WHERE id_pelanggan='$id_pelanggan'");
$pelanggan = mysqli_fetch_array($query);

// Ambil semua paket dari tb_paket
$paket_query = mysqli_query($koneksi, "SELECT * FROM paket");
?>

<section class="content">
  <div class="container-fluid">
    <div class="card card-warning">
      <div class="card-header">
        <h3 class="card-title">Ubah Paket Pelanggan</h3>
      </div>

      <div class="card-body">
        <form method='POST' action='index.php?page=update-paket-pelanggan'>
          <input type="hidden" name="id_pelanggan" value="<?php echo $pelanggan['id_pelanggan']; ?>">

          <div class="form-group">
            <label>Ubah Paket</label>
            <select name="id_paket" id="paket" class="form-control" onchange="setPaketInfo()">
              <option value="">Pilih Paket</option>
              <?php while ($paket = mysqli_fetch_array($paket_query)) : ?>
                <option 
                  value="<?= $paket['id_paket']; ?>" 
                  data-kecepatan="<?= $paket['kecepatan']; ?>" 
                  data-nama="<?= $paket['nama_paket']; ?>"
                  <?= ($paket['id_paket'] == $pelanggan['id_paket']) ? 'selected' : ''; ?>
                >
                  <?= $paket['nama_paket']; ?>
                </option>
              <?php endwhile; ?>
            </select>
          </div>

          <div class="form-group">
            <label>Kecepatan</label>
            <input type="text" id="kecepatan_display" class="form-control" readonly>
            <input type="hidden" name="kecepatan" id="kecepatan">
          </div>

          <div class="form-group">
            <label>Nama Paket</label>
            <input type="text" id="nama_paket_display" class="form-control" readonly>
            <input type="hidden" name="nama_paket" id="nama_paket">
          </div>

          <button type="submit" class="btn btn-info">Simpan</button>
        </form>
      </div>
    </div>
  </div>
</section>


