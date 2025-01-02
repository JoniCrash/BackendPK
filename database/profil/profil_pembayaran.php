<!-- 
<?php
// Ambil ID pembayaran dari parameter URL
$id_pembayaran = isset($_GET['id_pembayaran']) ? intval($_GET['id_pembayaran']) : 0;

if ($id_pembayaran > 0) {
    // Query untuk mendapatkan data pembayaran berdasarkan ID
    $sql = "SELECT * FROM tb_pembayaran WHERE id_pembayaran = ?";
    $stmt = $koneksi->prepare($sql);
    $stmt->bind_param("i", $id_pembayaran);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // Ambil data pembayaran
        $pembayaran = $result->fetch_assoc();

    } else {
        echo "Data pembayaran tidak ditemukan.";
        exit;
    }
} else {
    echo "ID pembayaran tidak valid.";
    exit;
}



// $stmt->close();
// $koneksi->close();
?> -->

<style>
        .profile-container {
            max-width: 600px;
            margin: 0 auto;
            text-align: center;
            font-family: Arial, sans-serif;
        }
        .profile-image {
            width: 150px;
            height: 150px;
            border-radius: 50%;
            object-fit: cover;
        }
        .profile-info {
            margin-top: 20px;
        }
    </style>


<section class="content">
    <div class="container">
        <div class="card card-primary card-outline card-outline-tabs">
            <div class="card-body">


                <div class="tab-content">
                    <div class="tab-pane active" >
                    <div class="container row text-sm">
                                <div style="width: 110px">ID pembayaran</div>
                                <div style="width: 220px"><input class="form-control text-sm bg-light"
                                        style="height: 30px" type="text" value= <?php echo $pembayaran['id_pembayaran'];?>
                                        readonly></div>
                                <div class="w-100 mb-1"></div>
                                <div style="width: 110px">Nama pembayaran</div>
                                <div style="width: 220px"><input class="form-control text-sm bg-light"
                                        style="height: 30px" type="text" value= <?php echo $pembayaran['Nama_Lengkap'];?> readonly>
                                </div>
                                <!-- <div class="w-100 mb-1"></div>
                                <div style="width: 110px">Status Layanan</div>
                                <div style="width: 220px">
                                    <span
                                        class="badge bg-warning">
                                        &nbsp;&nbsp;REGISTRASI&nbsp;&nbsp;</span>
                                </div> -->
                    </div>
                        <div class="row">
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-12 mt-3">
                                            <fieldset class="well bg-light">
                                                <legend class="well-legend bg-light"><strong>Data pembayaran</strong></legend>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="font-weight-normal">Nama Lengkap</label>
                                                            <input type="text" class="form-control text-sm bg-light" value= <?php echo $pembayaran['Nama_Lengkap'];?> readonly>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="font-weight-normal">Nomor Identitas (KTP)</label>
                                                            <input type="text" class="form-control text-sm bg-light" value  = <?php echo $pembayaran['Nomor_Identitas_KTP'];?> readonly>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="font-weight-normal">Alamat Email</label>
                                                            <input type="text" class="form-control text-sm bg-light"  value="<?php echo $pembayaran['Email'];?>" readonly>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <label class="font-weight-normal">No Telepon Seluler (HP1)</label>
                                                            <input type="text" class="form-control text-sm phonehp bg-light" value=<?php echo $pembayaran['Nomor_Hp_1'];?> readonly>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <label class="font-weight-normal">No Telepon Seluler (HP2)</label>
                                                            <input type="text" class="form-control text-sm phonehp bg-light" value="<?php echo $pembayaran['Nomor_Hp_2'];?>" readonly>
                                                        </div>
                                                    </div>
                                                </div>
                                            </fieldset>
                                        </div>
                                        <div class="col-md-12 mt-3">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <fieldset class="well bg-light">
                                                                <legend class="well-legend bg-light"><strong>Data Alamat Pemasangan</strong></legend>
                                                                <div class="row">
                                                                    <div class="col-md-12">
                                                                        <div class="form-group">
                                                                            <label class="font-weight-normal">Alamat Lengkap</label>
                                                                            <input type="text" class="form-control bg-light" value="<?php echo $pembayaran['Alamat_Pemasangan'];?>" readonly >
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label class="font-weight-normal">Provinsi</label>
                                                                            <input type="text" class="form-control text-sm bg-light" value="<?php echo $pembayaran['provinsi'];?>" readonly>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label class="font-weight-normal">Kota/Kabupaten</label>
                                                                            <input type="text" class="form-control text-sm bg-light" value="<?php echo $pembayaran['kota'];?>" readonly>
                                                                        </div>
                                                                    </div>
                                                                    <hr class="bg-light col-md-11">
                                                                </div>
                                                            </fieldset>
                                                        </div>
                                                        <div class="col-md-6">
                                            <fieldset class="well bg-light">
                                                <legend class="well-legend bg-light"><strong>Data Maps Alamat Pemasangan</strong></legend>
                                                    <div class="col-md-6 mt-3 mt-md-0">
                                                        <div class="form-group">
                                                            <label>Latitude:</label>
                                                            <input type="text" class="form-control form-control-sm bg-light" value="<?php echo $pembayaran['latitude'];?>" readonly/>
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Longitude:</label>
                                                            <input type="text" class="form-control form-control-sm bg-light" value="<?php echo $pembayaran['longitude'];?>" readonly/>
                                                        </div>
                                                    </div>
                                                    <hr class="bg-light col-md-11">
                                            </fieldset>
                                            
                                        </div> 
                                        <div class="col-md-12">
                                        <fieldset class="well bg-light">
                                                <legend class="well-legend bg-light"><strong>Data Layanan</strong></legend>
                                                
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label class="font-weight-normal">Paket Layanan</label>
                                                        <input type="text" class="form-control text-sm numeric bg-light" value="<?php echo $pembayaran['nama_paket'];?>" readonly>
                                                    </div>
                                                </div>
                                                <hr />
                                            </fieldset>  
                                            </div>
                                            <div class="col-md-12">
                                        <fieldset class="well bg-light">
                                                <legend class="well-legend bg-light"><strong>Data Status</strong></legend>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label class="font-weight-normal">Status</label>
                                                        <input type="text" class="form-control text-sm numeric bg-light" value="<?php echo $pembayaran['Status'];?>" readonly>
                                                    </div>
                                                </div>
                                                <hr/>
                                            </fieldset>
                                                    </div>
                                        </div>
                                        
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        
                                       
                                        
                                        <div class="col-md-12 mt-3">
                                        <div class="row">
                                        <!-- Foto KTP -->
                                                <div class="col-md-6">
                                                    <fieldset class="well bg-light">
                                                        <legend class="well-legend bg-light"><strong>Foto KTP</strong></legend>
                                                        <div class="mt-2 mb-3 ml-1 mr-1">
                                                        <div class="input-group input-group-sm">
                                                       
                                                        <img src="../database/image/foto_ktp/<?= htmlspecialchars($pembayaran['Foto_KTP']) ?>" alt="Foto KTP" style="max-width: 100%; height: auto; border: 1px solid #ccc; border-radius: 5px;">                           
                                                        <!-- <?php echo "Path gambar: image/foto_ktp/" . $pembayaran['Foto_KTP']; // Debugging?> -->

                                                        </div>
                                                        <!-- <div id="ktpPreviewContainer" style="display: flex; gap: 10px; margin-top: 10px;"></div> -->
                                                        </div>
                                                    </fieldset>
                                                </div>

                                                <!-- Foto Depan Rumah -->
                                                <div class="col-md-6">
                                                    <fieldset class="well bg-light">
                                                        <legend class="well-legend bg-light"><strong>Foto Depan Rumah</strong></legend>
                                                        <div class="mt-2 mb-3 ml-1 mr-1">
                                                        <div class="input-group input-group-sm">
                                                       
                                                       <img src="../database/image/foto_depan_rumah/<?= htmlspecialchars($pembayaran['Foto_Depan_Rumah']) ?>" alt="Foto KTP" style="max-width: 100%; height: auto; border: 1px solid #ccc; border-radius: 5px;">                           
                                                       <!-- <?php echo "image/foto_ktp/" . $pembayaran['Foto_KTP']; // Debugging?> -->

                                                       </div>                                                           
                                                        </div>
                                                    </fieldset>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                        <!-- batas akhir tab -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>