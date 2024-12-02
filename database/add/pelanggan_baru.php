<section class="content">
    <div class="container">
        <div class="card card-primary card-outline card-outline-tabs">
            <div class="card-body">
                <div class="tab-content">
                    <div class="tab-pane active" >
                        <div class="row">
                            <form method="post" action="add_pelanggan.php" autocomplete="off" enctype="multipart/form-data">
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
                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <label class="font-weight-normal">Tanggal Lahir</label>
                                                            <div class="input-group mb-3">
                                                                <div class="input-group-prepend"><span class="input-group-text"><i class="far fa-calendar-alt"></i></span></div>
                                                                <input type="text" class="form-control text-sm bg-white"
                                                                    name="birthdate" id="birthdate" value="" readonly>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
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
                                                                    <div class="col-md-4">
                                                                        <div class="form-group">
                                                                            <label class="font-weight-normal">RT</label>
                                                                            <input type="text" class="form-control text-sm numeric" maxlength="3"
                                                                            value="">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-4">
                                                                        <div class="form-group">
                                                                            <label class="font-weight-normal">RW</label>
                                                                            <input type="text" class="form-control text-sm numeric" maxlength="3"
                                                                            value="">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-4">
                                                                        <div class="form-group">
                                                                            <label class="font-weight-normal">Kode Pos</label>
                                                                            <input type="text" class="form-control text-sm">
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
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label class="font-weight-normal">Kecamatan</label>
                                                                            <input type="text" value="" class="form-control text-sm">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label class="font-weight-normal">Kelurahan</label>
                                                                            <input type="text" value="" class="form-control text-sm">
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
                                                            <label>Lokasi Maps:</label>
                                                            <input type="text" class="form-control form-control-sm"/>
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Latitude:</label>
                                                            <input type="text" class="form-control form-control-sm"/>
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Longitude:</label>
                                                            <input type="text" class="form-control form-control-sm" />
                                                        </div>
                                                    </div>
                                            </fieldset>
                                            <fieldset class="well bg-light">
                                                <legend class="well-legend bg-light"><strong>Data Layanan</strong></legend>
                                                <div class="col-md-6">
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
                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
 
                                        <div class="col-md-12 mt-3">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <fieldset class="well bg-light">
                                                        <legend class="well-legend bg-light"><strong>Foto KTP</strong></legend>
                                                        <img id="preview1" src="/customer/image?id=&type=ktp" class="mt-2 img-fluid rounded mx-auto d-block" alt="KTP" title="KTP" style="max-height: 200px;">
                                                        <div class="mt-2 mb-3 ml-1 mr-1">
                                                            <div class="input-group input-group-sm">
                                                                <div class="input-group-prepend">
                                                                    <span class="input-group-text" id="inputGroupFileAddon01">Upload</span>
                                                                </div>
                                                                <div class="custom-file">
                                                                    <input type="file" name="image_ktp" class="custom-file-input" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01" accept=".png, .jpg, .jpeg, .bmp">
                                                                    <label class="custom-file-label imgLabel1" for="inputGroupFile01" id="labelGroupFile01">Pilih berkas foto</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </fieldset>
                                                </div>
                                                <div class="col-md-6">
                                                    <fieldset class="well bg-light">
                                                        <legend class="well-legend bg-light"><strong>Foto Depan Rumah</strong></legend>
                                                        <img id="preview3" src="customer/image?id=&type=rumah" class="mt-2 img-fluid rounded mx-auto d-block" alt="Rumah" title="Rumah" style="max-height: 200px;">
                                                        <div class="mt-2 mb-3 ml-1 mr-1">
                                                            <div class="input-group input-group-sm">
                                                                <div class="input-group-prepend">
                                                                    <span class="input-group-text" id="inputGroupFileAddon03">Upload</span>
                                                                </div>
                                                                <div class="custom-file">
                                                                    <input type="file" name="image_rumah" class="custom-file-input" id="inputGroupFile03" aria-describedby="inputGroupFileAddon03" accept=".png, .jpg, .jpeg, .bmp">
                                                                    <label class="custom-file-label imgLabel3" for="inputGroupFile03" id="labelGroupFile03">Pilih berkas foto</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </fieldset>
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