<section class="content">
    <div class="container">
        <div class="card card-primary card-outline card-outline-tabs">
            <div class="card-body">
                <div class="tab-content">
                    <div class="tab-pane active" >
                        <div class="row">
                            <form method="get" action="../database/add/add_pelanggan.php" autocomplete="off" enctype="multipart/form-data">
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-12 mt-3">
                                            <fieldset class="well bg-light">
                                                <legend class="well-legend bg-light"><strong>Data Pelanggan</strong></legend>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="font-weight-normal">Nama Lengkap</label>
                                                            <input type="text" class="form-control text-sm"
                                                                name="name" id="name" maxlength="64" value="">
                                                        </div>
                                                    </div>
                                                    <!-- <div class="col-md-3">
                                                        <div class="form-group">
                                                            <label class="font-weight-normal">Tanggal Lahir</label>
                                                            <div class="input-group mb-3">
                                                                <div class="input-group-prepend"><span class="input-group-text"><i class="far fa-calendar-alt"></i></span></div>
                                                                <input type="text" class="form-control text-sm bg-white"
                                                                    name="birthdate" id="birthdate" value="" readonly>
                                                            </div>
                                                        </div>
                                                    </div> -->
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="font-weight-normal">Nomor Identitas (KTP)</label>
                                                            <input type="text" class="form-control text-sm numeric"
                                                                name="nik" id="nik" maxlength="18" value="">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="font-weight-normal">Alamat Email</label>
                                                            <input type="text" class="form-control text-sm"
                                                                name="email" id="email" maxlength="128" value="">
                                                        </div>
                                                    </div>

                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <label class="font-weight-normal">No Telepon Seluler (HP1)</label>
                                                            <input type="text" class="form-control text-sm phonehp"
                                                                name="hp1" id="hp2" maxlength="16" value="">
                                                        </div>
                                                    </div>

                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <label class="font-weight-normal">No Telepon Seluler (HP2)</label>
                                                            <input type="text" class="form-control text-sm phonehp"
                                                                name="homephone" id="homephone" maxlength="16" value="">
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
                                                                            <label class="font-weight-normal">Alamat</label>
                                                                            <input type="text" class="form-control text-sm" maxlength="128" value="">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label class="font-weight-normal">Provinsi</label>
                                                                            <select class="form-control"> 
                                                                                <option></option>  
                                                                                <option>Jawa Barat</option>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label class="font-weight-normal">Kota/Kabupaten</label>
                                                                            <select class="form-control">
                                                                                <option></option>  
                                                                                <option>Cirebon</option>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                    <hr class="bg-light col-md-11">
                                                                </div>
                                                            </fieldset>
                                                        </div>
                                                        <div class="col-md-6">
                                            <fieldset class="well bg-light">
                                                <legend class="well-legend bg-light"><strong>Data Maps Alamat Pemasangan</strong></legend>
                                                    <div class="col-md-12 mt-3 mt-md-0">
                                                        <div class="form-group">
                                                            <label>Latitude:</label>
                                                            <input type="text" class="form-control form-control-sm"/>
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Longitude:</label>
                                                            <input type="text" class="form-control form-control-sm" />
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
                                                        <select class="form-control">
                                                            <option>Pilih</option>
                                                            <option> 30 mbps </option>
                                                            <option> 50 mbps </option>
                                                            <option> 100 mbps </option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <hr/>
                                            </fieldset>
                                            </>



                                                    </div>
                                                </div>
                                            </div>
                                        </div>
 
                                        <div class="col-md-12 mt-3">
                                            <div class="row">
                                            <div class="row">
                                                <!-- Foto KTP -->
                                                <div class="col-md-6">
                                                    <fieldset class="well bg-light">
                                                        <legend class="well-legend bg-light"><strong>Foto KTP</strong></legend>
                                                        <div class="mt-2 mb-3 ml-1 mr-1">
                                                            <div class="input-group input-group-sm">
                                                                <label class="form-label" for="fotoKTPInput">Upload Foto KTP:</label>
                                                                <input type="file" name="fotoktp" class="form-control" id="fotoKTPInput" accept="image/*" multiple />
                                                            </div>
                                                            <div id="ktpPreviewContainer" style="display: flex; gap: 10px; margin-top: 10px;"></div>
                                                        </div>
                                                    </fieldset>
                                                </div>

                                                <!-- Foto Depan Rumah -->
                                                <div class="col-md-6">
                                                    <fieldset class="well bg-light">
                                                        <legend class="well-legend bg-light"><strong>Foto Depan Rumah</strong></legend>
                                                        <div class="mt-2 mb-3 ml-1 mr-1">
                                                            <div class="input-group input-group-sm">
                                                                <label class="form-label" for="depanRumahInput">Upload Foto Depan Rumah:</label>
                                                                <input type="file" name="fotodepanrumah" class="form-control" id="depanRumahInput" accept="image/*" multiple />
                                                            </div>
                                                            <div id="depanRumahPreviewContainer" style="display: flex; gap: 10px; margin-top: 10px;"></div>
                                                        </div>
                                                    </fieldset>
                                                </div>
                                            </div>
                                            </div>
                                            <div class="col-md-12">
                                                <button style="width: 80px"  class="btn bg-info float-right btn-sm mb-1 mt-1"><i class="fa fa-save"></i>Tambah Pelanggan</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        <!-- batas akhir tab -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script>
    // Fungsi untuk membuat pratinjau gambar
    function handleFileInput(inputElement, previewContainerId) {
        const files = inputElement.files;
        const previewContainer = document.getElementById(previewContainerId);

        // Hapus pratinjau sebelumnya
        previewContainer.innerHTML = '';

        Array.from(files).forEach(file => {
            if (file && file.type.startsWith('image/')) {
                const reader = new FileReader();
                reader.onload = function (e) {
                    const img = document.createElement('img');
                    img.src = e.target.result;
                    img.alt = 'Preview Gambar';
                    img.style.maxWidth = '150px';
                    img.style.maxHeight = '150px';
                    img.style.border = '1px solid #ddd';
                    img.style.borderRadius = '5px';
                    img.style.padding = '5px';
                    previewContainer.appendChild(img);
                };
                reader.readAsDataURL(file);
            }
        });
    }

    // Event listener untuk Foto KTP
    document.getElementById('fotoKTPInput').addEventListener('change', function () {
        handleFileInput(this, 'ktpPreviewContainer');
    });

    // Event listener untuk Foto Depan Rumah
    document.getElementById('depanRumahInput').addEventListener('change', function () {
        handleFileInput(this, 'depanRumahPreviewContainer');
    });
</script>