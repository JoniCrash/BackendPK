<?php
// Ambil ID pembayaran dari parameter URL
$id_pembayaran = isset($_GET['id_pembayaran']) ? intval($_GET['id_pembayaran']) : 0;

if ($id_pembayaran > 0) {
    // Query untuk mendapatkan data pembayaran berdasarkan ID
    $sql = "
    SELECT 
        pb.id_pembayaran,pb.Status,pb.bukti_pembayaran,
        tg.id_tagihan,tg.periode,
        pl.id_pelanggan,
        pj.Nama_Lengkap
    FROM tb_pembayaran pb
    JOIN tb_tagihan tg ON pb.id_tagihan = tg.id_tagihan
    JOIN tb_pelanggan pl ON tg.id_pelanggan = pl.id_pelanggan
    JOIN tb_pengajuan pj ON pl.id_pengajuan = pj.id_pengajuan
    WHERE pb.id_pembayaran = ?
    ";

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
$stmt->close();
$koneksi->close();
?>
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
                                <div class="w-100 mb-1"></div>
                                <div style="width: 150px">ID pembayaran</div>
                                <div style="width: 220px"><input class="form-control text-sm bg-light"
                                        style="height: 30px" type="text" value= <?php echo $pembayaran['id_pembayaran'];?>
                                        readonly>
                                </div>
                                <div class="w-100 mb-1"></div>
                                <div style="width: 150px">Nama Pelanggan</div>
                                <div style="width: 220px">
                                    <input class="form-control text-sm bg-light"
                                        style="height: 30px" type="text" value="<?php echo htmlspecialchars($pembayaran['Nama_Lengkap']); ?>" readonly>
                                </div>
                                <div class="w-100 mb-1"></div>
                                <div style="width: 150px">Status Pembayaran</div>
                                <div style="width: 220px">
                                <input class="form-control text-sm bg-light"
                                style="height: 30px" type="text" value= <?php echo $pembayaran['Status'];?> readonly>
                                </div>
                                <div class="w-100 mb-1"></div>
                                <div style="width: 150px">Periode</div>
                                <div style="width: 220px">
                                <input class="form-control text-sm bg-light"
                                style="height: 30px" type="text" value= "<?php echo $pembayaran['periode'];?>" readonly>
                                </div>
                                        <div class="col-md-12 mt-3">
                                        <div class="row">
                                        <!-- Foto KTP -->
                                                <div class="col-md-6">
                                                    <fieldset class="well bg-light">
                                                        <legend class="well-legend bg-light"><strong>Foto Bukti Pembayaran</strong></legend>
                                                        <div class="mt-2 mb-3 ml-1 mr-1">
                                                        <div class="input-group input-group-sm">
                                                       
                                                        <img src="../database/android/pelanggan/bukti_pembayaran/<?= htmlspecialchars($pembayaran['bukti_pembayaran']) ?>" alt="Bukti Pembayaran" style="max-width: 100%; height: auto; border: 1px solid #ccc; border-radius: 5px;">                           
                                                        <!-- <?php echo "Path gambar: image/foto_ktp/" . $pembayaran['Foto_KTP']; // Debugging?> -->

                                                        </div>
                                                        <!-- <div id="ktpPreviewContainer" style="display: flex; gap: 10px; margin-top: 10px;"></div> -->
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