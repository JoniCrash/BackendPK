
<section class="content">
    <div class="container">
        <div class="card card-primary card-outline card-outline-tabs">
            <div class="card-body">
                <div class="tab-content">
                    <div class="tab-pane active" role="tabpanel">
                        <div class="row">
                            <form method="post" action="" name="tform" id="tform" autocomplete="off" enctype="multipart/form-data">
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
                                                                name="identity" id="identity" maxlength="18" value="">
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
                                                            <label class="font-weight-normal">No Telepon Seluler (HP)</label>
                                                            <input type="text" class="form-control text-sm phonehp"
                                                                name="cellphone" id="cellphone" maxlength="16" value="">
                                                        </div>
                                                    </div>

                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <label class="font-weight-normal">No Telepon Rumah</label>
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
                                                                <legend class="well-legend bg-light"><strong>Data Alamat Sesuai KTP</strong></legend>
                                                                <div class="row">
                                                                    <div class="col-md-12">
                                                                        <div class="form-group">
                                                                            <label class="font-weight-normal">Alamat</label>
                                                                            <input type="text"
                                                                                class="form-control text-sm"
                                                                                name="address1" maxlength="128"
                                                                                value="">
                                                                        </div>
                                                                    </div>

                                                                    <div class="col-md-4">
                                                                        <div class="form-group">
                                                                            <label class="font-weight-normal">RT</label>
                                                                            <input type="text"
                                                                                class="form-control text-sm numeric"
                                                                                name="address_rt1" maxlength="3"
                                                                                value="">
                                                                        </div>
                                                                    </div>

                                                                    <div class="col-md-4">
                                                                        <div class="form-group">
                                                                            <label class="font-weight-normal">RW</label>
                                                                            <input type="text"
                                                                                class="form-control text-sm numeric"
                                                                                name="address_rw1" maxlength="3"
                                                                                value="">
                                                                        </div>
                                                                    </div>

                                                                    <div class="col-md-4">
                                                                        <div class="form-group">
                                                                            <label class="font-weight-normal">Kode Pos</label>
                                                                            <!--// hidden -->
                                                                            <div class="d-none">
                                                                                <select class="select2bs4"
                                                                                    id="postalcode1"
                                                                                    name="postalcode1">
                                                                                                                                                                        </select>
                                                                            </div>
                                                                            <!--\\ hidden -->


                                                                                                                                                            <input type="text"
                                                                                class="form-control text-sm bg-light"
                                                                                id="postcode1" name="postcode1"
                                                                                readonly="readonly">
                                                                            
                                                                        </div>
                                                                    </div>

                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label class="font-weight-normal">Provinsi</label>
                                                                            <select class="form-control select2bs4"
                                                                                id="province1" name="province1"
                                                                                data-live-search="true">
                                                                                <option></option>
                                                                                                                                                                    <option
                                                                                    value="11"
                                                                                    >
                                                                                    Aceh (NAD)                                                                                    </option>
                                                                                                                                                                    <option
                                                                                    value="12"
                                                                                    >
                                                                                    Sumatera Utara                                                                                    </option>
                                                                                                                                                                    <option
                                                                                    value="13"
                                                                                    >
                                                                                    Sumatera  Barat                                                                                    </option>
                                                                                                                                                                    <option
                                                                                    value="14"
                                                                                    >
                                                                                    Riau                                                                                    </option>
                                                                                                                                                                    <option
                                                                                    value="15"
                                                                                    >
                                                                                    Jambi                                                                                    </option>
                                                                                                                                                                    <option
                                                                                    value="16"
                                                                                    >
                                                                                    Sumatera Selatan                                                                                    </option>
                                                                                                                                                                    <option
                                                                                    value="17"
                                                                                    >
                                                                                    Bengkulu                                                                                    </option>
                                                                                                                                                                    <option
                                                                                    value="18"
                                                                                    >
                                                                                    Lampung                                                                                    </option>
                                                                                                                                                                    <option
                                                                                    value="19"
                                                                                    >
                                                                                    Kepulauan Bangka Belitung                                                                                    </option>
                                                                                                                                                                    <option
                                                                                    value="21"
                                                                                    >
                                                                                    Kepulauan Riau                                                                                    </option>
                                                                                                                                                                    <option
                                                                                    value="31"
                                                                                    >
                                                                                    DKI Jakarta                                                                                    </option>
                                                                                                                                                                    <option
                                                                                    value="32"
                                                                                    >
                                                                                    Jawa Barat                                                                                    </option>
                                                                                                                                                                    <option
                                                                                    value="33"
                                                                                    >
                                                                                    Jawa Tengah                                                                                    </option>
                                                                                                                                                                    <option
                                                                                    value="34"
                                                                                    >
                                                                                    DI Yogyakarta                                                                                    </option>
                                                                                                                                                                    <option
                                                                                    value="35"
                                                                                    >
                                                                                    Jawa Timur                                                                                    </option>
                                                                                                                                                                    <option
                                                                                    value="36"
                                                                                    >
                                                                                    Banten                                                                                    </option>
                                                                                                                                                                    <option
                                                                                    value="51"
                                                                                    >
                                                                                    Bali                                                                                    </option>
                                                                                                                                                                    <option
                                                                                    value="52"
                                                                                    >
                                                                                    Nusa Tenggara Barat (NTB)                                                                                    </option>
                                                                                                                                                                    <option
                                                                                    value="53"
                                                                                    >
                                                                                    Nusa Tenggara Timur (NTT)                                                                                    </option>
                                                                                                                                                                    <option
                                                                                    value="61"
                                                                                    >
                                                                                    Kalimantan Barat                                                                                    </option>
                                                                                                                                                                    <option
                                                                                    value="62"
                                                                                    >
                                                                                    Kalimantan Tengah                                                                                    </option>
                                                                                                                                                                    <option
                                                                                    value="63"
                                                                                    >
                                                                                    Kalimantan Selatan                                                                                    </option>
                                                                                                                                                                    <option
                                                                                    value="64"
                                                                                    >
                                                                                    Kalimantan Timur                                                                                    </option>
                                                                                                                                                                    <option
                                                                                    value="65"
                                                                                    >
                                                                                    Kalimantan Utara                                                                                    </option>
                                                                                                                                                                    <option
                                                                                    value="73"
                                                                                    >
                                                                                    Sulawesi Selatan                                                                                    </option>
                                                                                                                                                                    <option
                                                                                    value="75"
                                                                                    >
                                                                                    Gorontalo                                                                                    </option>
                                                                                                                                                                    <option
                                                                                    value="76"
                                                                                    >
                                                                                    Sulawesi Barat                                                                                    </option>
                                                                                                                                                                    <option
                                                                                    value="81"
                                                                                    >
                                                                                    Maluku                                                                                    </option>
                                                                                                                                                                    <option
                                                                                    value="82"
                                                                                    >
                                                                                    Maluku Utara                                                                                    </option>
                                                                                                                                                                    <option
                                                                                    value="92"
                                                                                    >
                                                                                    Papua Barat                                                                                    </option>
                                                                                                                                                                </select>
                                                                        </div>
                                                                    </div>

                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label class="font-weight-normal">Kota/Kabupaten</label>
                                                                            <select class="form-control select2bs4"
                                                                                id="district1" name="district1"
                                                                                data-live-search="true">
                                                                                <option></option>
                                                                                                                                                                </select>
                                                                        </div>
                                                                    </div>


                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label class="font-weight-normal">Kecamatan</label>
                                                                            <select class="form-control select2bs4"
                                                                                id="sub_district1"
                                                                                name="sub_district1"
                                                                                data-live-search="true">
                                                                                <option></option>
                                                                                                                                                                </select>
                                                                        </div>
                                                                    </div>

                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label class="font-weight-normal">Kelurahan</label>
                                                                            <select class="form-control select2bs4"
                                                                                id="village1" name="village1"
                                                                                data-live-search="true">
                                                                                <option></option>
                                                                                                                                                                </select>
                                                                        </div>
                                                                    </div>
                                                                    
                                                                    <hr class="bg-light col-md-11">
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label class="font-weight-normal">Tipe</label>
                                                                            <select class="form-control select2bs4"
                                                                                id="hometype1" name="hometype1"
                                                                                data-live-search="true">
                                                                                <option></option>
                                                                                                                                                                    <option
                                                                                    value="3"
                                                                                    >
                                                                                    APARTMENT                                                                                    </option>
                                                                                                                                                                    <option
                                                                                    value="5"
                                                                                    >
                                                                                    KANTOR                                                                                    </option>
                                                                                                                                                                    <option
                                                                                    value="4"
                                                                                    >
                                                                                    KOST                                                                                    </option>
                                                                                                                                                                    <option
                                                                                    value="1"
                                                                                    >
                                                                                    LAINNYA                                                                                    </option>
                                                                                                                                                                    <option
                                                                                    value="2"
                                                                                    >
                                                                                    RUMAH TINGGAL                                                                                    </option>
                                                                                                                                                                </select>
                                                                        </div>
                                                                    </div>

                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label class="font-weight-normal">Status</label>
                                                                            <select class="form-control select2bs4"
                                                                                id="homestatus1" name="homestatus1"
                                                                                data-live-search="true">
                                                                                <option></option>
                                                                                                                                                                    <option
                                                                                    value="1"
                                                                                    >
                                                                                    LAINNYA                                                                                    </option>
                                                                                                                                                                    <option
                                                                                    value="3"
                                                                                    >
                                                                                    MILIK ORANGTUA                                                                                    </option>
                                                                                                                                                                    <option
                                                                                    value="4"
                                                                                    >
                                                                                    MILIK PERUSAHAAN                                                                                    </option>
                                                                                                                                                                    <option
                                                                                    value="2"
                                                                                    >
                                                                                    MILIK SENDIRI                                                                                    </option>
                                                                                                                                                                    <option
                                                                                    value="5"
                                                                                    >
                                                                                    SEWA KONTRAK                                                                                    </option>
                                                                                                                                                                </select>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                

                                                                
                                                                
                                                            </fieldset>
                                                        </div>
                                                    

                                                        <div class="col-md-6">
                                                            <fieldset class="well bg-light">
                                                                <legend class="well-legend bg-light"><strong>Data Alamat Instalasi</strong></legend>
                                                                <div class="row">
                                                                    <div class="col-md-12">
                                                                        <div class="form-group">
                                                                            <label class="font-weight-normal">Alamat</label>
                                                                            <input type="text" class="form-control text-sm"
                                                                                name="address2" id="address2" maxlength="128"
                                                                                value="">
                                                                        </div>
                                                                    </div>

                                                                    <div class="col-md-4">
                                                                        <div class="form-group">
                                                                            <label class="font-weight-normal">RT</label>
                                                                            <input type="text" class="form-control text-sm numeric"
                                                                                name="address_rt2" id="address_rt2" maxlength="3"
                                                                                value="">
                                                                        </div>
                                                                    </div>

                                                                    <div class="col-md-4">
                                                                        <div class="form-group">
                                                                            <label class="font-weight-normal">RW</label>
                                                                            <input type="text" class="form-control text-sm numeric"
                                                                                name="address_rw2" id="address_rw2" maxlength="3"
                                                                                value="">
                                                                        </div>
                                                                    </div>

                                                                    <div class="col-md-4">
                                                                        <div class="form-group">
                                                                            <label class="font-weight-normal">Kode Pos</label>
                                                                            <!--// hidden -->
                                                                            <div class="d-none">
                                                                                <select class="select2bs4" id="postalcode2"
                                                                                    name="postalcode2">
                                                        
                                                                                                                                                                        </select>
                                                                            </div>
                                                                            <!--\\ hidden -->

                                                                                                                                                            <input type="text" class="form-control text-sm bg-light"
                                                                                id="postcode2" name="postcode2" >
                                                                            
                                                                        </div>
                                                                    </div>

                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label class="font-weight-normal">Provinsi</label>
                                                                            <select class="form-control select2bs4" id="province2"
                                                                                name="province2" data-live-search="true">
                                                                                <option></option>
                                                                                                                                                                    <option
                                                                                    value="11"
                                                                                    >
                                                                                    Aceh (NAD)                                                                                    </option>
                                                                                                                                                                    <option
                                                                                    value="12"
                                                                                    >
                                                                                    Sumatera Utara                                                                                    </option>
                                                                                                                                                                    <option
                                                                                    value="13"
                                                                                    >
                                                                                    Sumatera  Barat                                                                                    </option>
                                                                                                                                                                    <option
                                                                                    value="14"
                                                                                    >
                                                                                    Riau                                                                                    </option>
                                                                                                                                                                    <option
                                                                                    value="15"
                                                                                    >
                                                                                    Jambi                                                                                    </option>
                                                                                                                                                                    <option
                                                                                    value="16"
                                                                                    >
                                                                                    Sumatera Selatan                                                                                    </option>
                                                                                                                                                                    <option
                                                                                    value="17"
                                                                                    >
                                                                                    Bengkulu                                                                                    </option>
                                                                                                                                                                    <option
                                                                                    value="18"
                                                                                    >
                                                                                    Lampung                                                                                    </option>
                                                                                                                                                                    <option
                                                                                    value="19"
                                                                                    >
                                                                                    Kepulauan Bangka Belitung                                                                                    </option>
                                                                                                                                                                    <option
                                                                                    value="21"
                                                                                    >
                                                                                    Kepulauan Riau                                                                                    </option>
                                                                                                                                                                    <option
                                                                                    value="31"
                                                                                    >
                                                                                    DKI Jakarta                                                                                    </option>
                                                                                                                                                                    <option
                                                                                    value="32"
                                                                                    >
                                                                                    Jawa Barat                                                                                    </option>
                                                                                                                                                                    <option
                                                                                    value="33"
                                                                                    >
                                                                                    Jawa Tengah                                                                                    </option>
                                                                                                                                                                    <option
                                                                                    value="34"
                                                                                    >
                                                                                    DI Yogyakarta                                                                                    </option>
                                                                                                                                                                    <option
                                                                                    value="35"
                                                                                    >
                                                                                    Jawa Timur                                                                                    </option>
                                                                                                                                                                    <option
                                                                                    value="36"
                                                                                    >
                                                                                    Banten                                                                                    </option>
                                                                                                                                                                    <option
                                                                                    value="51"
                                                                                    >
                                                                                    Bali                                                                                    </option>
                                                                                                                                                                    <option
                                                                                    value="52"
                                                                                    >
                                                                                    Nusa Tenggara Barat (NTB)                                                                                    </option>
                                                                                                                                                                    <option
                                                                                    value="53"
                                                                                    >
                                                                                    Nusa Tenggara Timur (NTT)                                                                                    </option>
                                                                                                                                                                    <option
                                                                                    value="61"
                                                                                    >
                                                                                    Kalimantan Barat                                                                                    </option>
                                                                                                                                                                    <option
                                                                                    value="62"
                                                                                    >
                                                                                    Kalimantan Tengah                                                                                    </option>
                                                                                                                                                                    <option
                                                                                    value="63"
                                                                                    >
                                                                                    Kalimantan Selatan                                                                                    </option>
                                                                                                                                                                    <option
                                                                                    value="64"
                                                                                    >
                                                                                    Kalimantan Timur                                                                                    </option>
                                                                                                                                                                    <option
                                                                                    value="65"
                                                                                    >
                                                                                    Kalimantan Utara                                                                                    </option>
                                                                                                                                                                    <option
                                                                                    value="73"
                                                                                    >
                                                                                    Sulawesi Selatan                                                                                    </option>
                                                                                                                                                                    <option
                                                                                    value="75"
                                                                                    >
                                                                                    Gorontalo                                                                                    </option>
                                                                                                                                                                    <option
                                                                                    value="76"
                                                                                    >
                                                                                    Sulawesi Barat                                                                                    </option>
                                                                                                                                                                    <option
                                                                                    value="81"
                                                                                    >
                                                                                    Maluku                                                                                    </option>
                                                                                                                                                                    <option
                                                                                    value="82"
                                                                                    >
                                                                                    Maluku Utara                                                                                    </option>
                                                                                                                                                                    <option
                                                                                    value="92"
                                                                                    >
                                                                                    Papua Barat                                                                                    </option>
                                                                                                                                                                </select>
                                                                        </div>
                                                                    </div>

                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label class="font-weight-normal">Kota/Kabupaten</label>
                                                                            <select class="form-control select2bs4" id="district2"
                                                                                name="district2" data-live-search="true">
                                                                                <option></option>
                                                                                                                                                                </select>
                                                                        </div>
                                                                    </div>

                                                                    
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label class="font-weight-normal">Kecamatan</label>
                                                                            <select class="form-control select2bs4"
                                                                                id="sub_district2" name="sub_district2"
                                                                                data-live-search="true">
                                                                                <option></option>
                                                                                                                                                                </select>
                                                                        </div>
                                                                    </div>

                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label class="font-weight-normal">Kelurahan</label>
                                                                            <select class="form-control select2bs4" id="village2"
                                                                                name="village2" data-live-search="true">
                                                                                <option></option>
                                                                                                                                                                </select>
                                                                        </div>
                                                                    </div>

                                                                    <hr class="bg-light col-md-11">
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label class="font-weight-normal">Tipe</label>
                                                                            <select class="form-control select2bs4"
                                                                                id="hometype2" name="hometype2"
                                                                                data-live-search="true">
                                                                                <option></option>
                                                                                                                                                                    <option
                                                                                    value="3"
                                                                                    >
                                                                                    APARTMENT                                                                                    </option>
                                                                                                                                                                    <option
                                                                                    value="5"
                                                                                    >
                                                                                    KANTOR                                                                                    </option>
                                                                                                                                                                    <option
                                                                                    value="4"
                                                                                    >
                                                                                    KOST                                                                                    </option>
                                                                                                                                                                    <option
                                                                                    value="1"
                                                                                    >
                                                                                    LAINNYA                                                                                    </option>
                                                                                                                                                                    <option
                                                                                    value="2"
                                                                                    >
                                                                                    RUMAH TINGGAL                                                                                    </option>
                                                                                                                                                                </select>
                                                                        </div>
                                                                    </div>

                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label class="font-weight-normal">Status</label>
                                                                            <select class="form-control select2bs4"
                                                                                id="homestatus2" name="homestatus2"
                                                                                data-live-search="true">
                                                                                <option></option>
                                                                                                                                                                    <option
                                                                                    value="1"
                                                                                    >
                                                                                    LAINNYA                                                                                    </option>
                                                                                                                                                                    <option
                                                                                    value="3"
                                                                                    >
                                                                                    MILIK ORANGTUA                                                                                    </option>
                                                                                                                                                                    <option
                                                                                    value="4"
                                                                                    >
                                                                                    MILIK PERUSAHAAN                                                                                    </option>
                                                                                                                                                                    <option
                                                                                    value="2"
                                                                                    >
                                                                                    MILIK SENDIRI                                                                                    </option>
                                                                                                                                                                    <option
                                                                                    value="5"
                                                                                    >
                                                                                    SEWA KONTRAK                                                                                    </option>
                                                                                                                                                                </select>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                
                                                            </fieldset>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>

                                        <div class="col-md-12 mt-3">
                                            <fieldset class="well bg-light">
                                                <legend class="well-legend bg-light"><strong>Data Maps Alamat Instalasi</strong></legend>
                                                <div class="row mt-0 mb-2">
                                                    <div class="col-md-6">
                                                        <table class="w-100 border">
                                                        <tr><td>
                                                            <input  type="text" id="map_place" class="form-control form-control-sm border-bottom-0 border-light rounded-0"  />      
                                                            <div id="map_canvas" style="width:100%; height:240px;"></div>  
                                                        </td></tr>
                                                        </table>
                                                    </div>  
                                                    <div class="col-md-6 mt-3 mt-md-0">
                                                        <div class="form-group">
                                                            <label>Lokasi Maps:</label>
                                                            <input  type="text" id="map_address" name="map_address" class="form-control form-control-sm bg-light" readonly  />   
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Latitude:</label>
                                                            <input  type="text" id="map_latitude" name="map_latitude" class="form-control form-control-sm"  />     
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Longitude:</label>
                                                            <input  type="text" id="map_longitude" name="map_longitude" class="form-control form-control-sm"  />     
                                                        </div>
                                                        <button type="button" class="btn bg-success float-left btn-sm" id="map_current"><i class="fas fa-map-marker-alt"></i> Lokasi saat ini</button>
                                                        <button type="button" class="btn bg-gray  float-right btn-sm  mt-2 mt-md-0" id="map_button"><i class="fas fa-map"></i> Perbarui lokasi di Maps</button>
                                                        <span id="map_info" class="float-left badge bg-danger font-weight-normal mt-2"></span>
                                                    </div>                             
                                                </div> 
                                            </fieldset>                              
                                        </div> 

                                        <div class="col-md-12 mt-3">
                                            <fieldset class="well bg-light">
                                                <legend class="well-legend bg-light"><strong>Data Layanan</strong></legend>

                                                <div class="col-md-6" id="datalayanan1">
                                                    <div class="form-group">
                                                        <label class="font-weight-normal">Paket Layanan</label>
                                                        <select class="form-control select2bs4" id="_ref_service"
                                                            name="_ref_service" data-live-search="true">
                                                            <option value="" disabled selected>Pilih
                                                                                                                                <option value="96" data-type="2">
                                                                MAX-CBN-BASIC - INTERNET UP TO 100 MBPS                                                                    </option>
                                                                                                                                <option value="97" data-type="2">
                                                                FAMILY-CBN-BASIC - Internet Up To 50 Mbps                                                                    </option>
                                                                                                                                <option value="98" data-type="2">
                                                                LITE-CBN-BASIC - Internet Up To 30 Mbps                                                                    </option>
                                                                                                                                <option value="202" data-type="2">
                                                                CBN-VALUE-15-MBPS-DISC-15%-3BLN - Internet up to 15 mbps                                                                    </option>
                                                                                                                                <option value="203" data-type="2">
                                                                CBN-LITE-30-MBPS-DISC-10%-6BLN - Internet up to 30 mbps                                                                    </option>
                                                                                                                                <option value="204" data-type="2">
                                                                CBN-FAMILY-50-MBPS-DISC-20%-12BLN - Internet up to 50 mbps                                                                    </option>
                                                                                                                                <option value="205" data-type="2">
                                                                CBN-MAX-100-MBPS-DISC-20%-12BLN - Internet up to 100 mbps                                                                    </option>
                                                                                                                        </select>
                                                    </div>
                                                    <div class="form-group d-none">
                                                        <label class="font-weight-normal">Frekuensi Layanan</label>
                                                        <select class="form-control select2bs4" id="_ref_subscribe"
                                                            name="_ref_subscribe" data-minimum-results-for-search="Infinity">
                                                            <option value="1">Per 1 Bulan</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group d-none" id="tvcountdiv">
                                                        <label class="font-weight-normal">Jumlah Penambahan TV</label>
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text text-sm">Penambahan TV</span>
                                                            </div> 
                                                            <input class="form-control" name="_tvcount" id="_tvcount" value="">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="font-weight-normal">Keterangan Lain</label>
                                                        <textarea class="form-control" name="_service_info1"></textarea>
                                                    </div>

                                                </div>

                                                <div class="col-md-12" id="datalayanan2">
                                                    <div class="row">
                                                        <div class="col-md-8">
                                                            <div class="row">
                                                                <div class="col-md-3">
                                                                    <div class="form-group">
                                                                        <label class="font-weight-normal">Total Harga Perbulan</label>
                                                                        <div class="input-group">
                                                                            <div class="input-group-prepend"><span class="input-group-text text-sm text-bold">Rp</span></div>
                                                                            <input class="form-control" name="_tvprice" id="_tvprice" type="text" value="" size="15" />
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <div class="form-group float-md-right">
                                                                        <label class="font-weight-normal ml-1">Gunakan PPN</label>
                                                                        <div class="input-group mt-1">
                                                                        <input type="checkbox" name="_tax"
                                                                            data-on-text="&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;YA&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"
                                                                            data-off-text="&nbsp;&nbsp;&nbsp;TIDAK&nbsp;&nbsp;&nbsp;"
                                                                            data-off-color="danger" data-on-color="success"
                                                                            data-bootstrap-switch>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <div class="form-group float-md-right">
                                                                        <label class="font-weight-normal ml-1">Gunakan Faktur Pajak</label>
                                                                        <div class="input-group mt-1">
                                                                        <input type="checkbox" name="_tax_inv"
                                                                            data-on-text="&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;YA&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"
                                                                            data-off-text="&nbsp;&nbsp;&nbsp;TIDAK&nbsp;&nbsp;&nbsp;"
                                                                            data-off-color="danger" data-on-color="success"
                                                                            data-bootstrap-switch>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                       
                                                        <div class="col-md-7">

                                                            <div class="form-group">
                                                                <label class="font-weight-normal">Nama Paket / Keterangan pada Tagihan</label>
                                                                <input class="form-control alphanumeric" name="_packname" id="_packname" type="text" value="" size="50" />
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="font-weight-normal">Tipe Pelanggan</label>
                                                                <select class="form-control select2bs4" id="nonRegCustType" name="nonRegCustType">
                                                                        <option></option>
                                                                        <option value="HOME">HOME</option>
                                                                        <option value="SOHO">SOHO</option>
                                                                    </select>
                                                                </div>
                                                            <div class="form-group">
                                                                <label class="font-weight-normal">Keterangan Lain</label>
                                                                <textarea class="form-control" name="_service_info2"></textarea>
                                                            </div>
                                                        </div>
                                                        
                                                    </div>

                                                </div>

                                            </fieldset>
                                        </div>


                                        <div class="col-md-12 mt-3">
                                            <fieldset class="well bg-light">
                                            <legend class="well-legend bg-light"><strong>Berkas Registrasi</strong></legend>  
                                            <div class="row">                    
                                                <div class="col-md-6">
                                                    
                                                          
                                                        <div class="mt-2 mb-3 ml-1 mr-1">
                                                            <div class="input-group input-group-sm">
                                                                <div class="input-group-prepend">
                                                                    <span class="input-group-text" id="inputGroupFileAddonRegister">Upload</span>
                                                                </div>
                                                                <div class="custom-file">
                                                                    <input type="file" name="image_register" class="custom-file-input" id="inputGroupFileRegister" aria-describedby="inputGroupFileAddonRegister" accept=".png, .jpg, .jpeg, .bmp">
                                                                    <label class="custom-file-label imgLabel1" for="inputGroupFileRegister" id="labelGroupFileRegister">Pilih berkas registrasi</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        
                                                                                                                    
                                                    
                                                </div>
                                            </div>
                                            </fieldset>
                                        </div>
                                        <div class="col-md-12 mt-3">
                                
                                        <div class="row">                    
                                            <div class="col-md-6">
                                                <fieldset class="well bg-light">
                                                <legend class="well-legend bg-light"><strong>Foto KTP</strong></legend>        
                                                    <img id="preview1" src="https://crm.comet.net.id/customer/image?id=&type=ktp" class="mt-2 img-fluid rounded mx-auto d-block" alt="KTP" title="KTP" style="max-height: 200px;">
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
                                            </div>
                                            <div class="col-md-6">
                                                <fieldset class="well bg-light">
                                                    <legend class="well-legend bg-light"><strong>Foto Rumah</strong></legend>   
                                                    <img id="preview3" src="https://crm.comet.net.id/customer/image?id=&type=rumah" class="mt-2 img-fluid rounded mx-auto d-block" alt="Rumah" title="Rumah" style="max-height: 200px;">
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
                                            <div class="col-md-6">
                                                <fieldset class="well bg-light">
                                                    <legend class="well-legend bg-light"><strong>Foto Validasi</strong></legend>   
                                                    <img id="preview4" src="https://crm.comet.net.id/customer/image?id=&type=validasi" class="mt-2 img-fluid rounded mx-auto d-block" alt="Validasi" title="Validasi" style="max-height: 200px;">
                                                    <div class="mt-2 mb-3 ml-1 mr-1">
                                                        <div class="input-group input-group-sm">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text" id="inputGroupFileAddon04">Upload</span>
                                                            </div>
                                                            <div class="custom-file">
                                                                <input type="file" name="image_validasi" class="custom-file-input" id="inputGroupFile04" aria-describedby="inputGroupFileAddon04" accept=".png, .jpg, .jpeg, .bmp">
                                                                <label class="custom-file-label imgLabel4" for="inputGroupFile04" id="labelGroupFile04">Pilih berkas foto</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </fieldset>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <button style="width: 80px" disabled                                                    class="btn bg-info float-right btn-sm mb-1 mt-1"><i class="fa fa-save"></i> Simpan</button>
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
$(function() {

$.validator.addMethod(
    "emailFormat",
    function(value, element) {
        var check = false;
        if (value.trim()) {
            var re = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if (re.test(value)) {
                check = true;
            } else {
                check = false;
            }
        }
        else check = true;

        return this.optional(element) || check;
    },
    "Wrong email format"
);

$.validator.addMethod(
    "serType1",
    function(value, element) {
        var check = false;
        if ($('#sertype1').prop("checked") || $('#sertype3').prop("checked")) {
            //var selected = $('#_ref_service option:selected');
            //if (selected.val() === "")
            if (value)
                check = true; 
            else
                check = false;
        
        } else {
            check = true;
        }

        return check;
    },
    "This field is required"
);

$.validator.addMethod(
    "serType2",
    function(value, element) {
        var check = false;
        if ($('#sertype2').prop("checked")) {
            if (value.trim()  === ""  || value.trim()  == "0")
                //empty or zero
                check = false; 
            else
                check = true;
        
        } else {
            check = true;
        }

        return check;
    },
    "This field is required"
);

$.validator.addMethod(
    "setBranch",
    function(value, element) {
        var check = false;
        if ($('#_branch').hasClass("d-none")) {
            check = true;
        } else {
            if (value.trim()  === ""  || value.trim()  == "0")
                //empty or zero
                check = false; 
            else
                check = true;
        }

        return check;
    },
    "This field is required"
);



$('#tform').validate({
    rules: {
        regdate: {
            required: true,
        },
        _branch: {
            setBranch: true,
        },
        ref_marketer: {
            required: true,
        },
        name: {
            required: true,
        },
        identity: {
            required: true,
        },
        email: {
            required: true,
            emailFormat: true,
        },
        cellphone: {
            required: true,
            minlength: 10
        },
        address1: {
            required: true,
        },
        address_rt1: {
            required: true,
        },
        address_rw1: {
            required: true,
        },
        province1: {
            required: true,
        },
        district1: {
            required: true
        },
        sub_district1: {
            required: true,
        },
        village1: {
            required: true,
        },
        address2: {
            required: true,
        },
        address_rt2: {
            required: true,
        },
        address_rw2: {
            required: true,
        },
        province2: {
            required: true,
        },
        district2: {
            required: true
        },
        sub_district2: {
            required: true,
        },
        village2: {
            required: true,
        },
        hometype1: {
            required: true,
        },
        homestatus1: {
            required: true,
        },
        hometype2: {
            required: true,
        },
        homestatus2: {
            required: true,
        },
        map_latitude: {
            required: true,
        },
        map_longitude: {
            required: true,
        },
        _ref_service: {
            serType1: true,
        },
        _ref_subscribe: {
            serType1: true,
        },
        _tvprice: {
            serType2: true,
        },
        _packname: {
            serType2: true,
        },
        nonRegCustType: {
            serType2: true, 
        }
    },
    messages: {
        regdate: {
            required: "Silakan mengisi Tanggal Registrasi"
        },
        _branch: {
            setBranch: "Silakan mengisi Cabang",
        },
        ref_marketer: {
            required: "Silakan memilih Kode Sales"
        },
        name: {
            required: "Silakan mengisi Nama Lengkap"
        },
        identity: {
            required: "Silakan mengisi Nomor Identitas"
        },
        email: {
            required: "Silakan mengisi Alamat Email",
            emailFormat: "Format Email tidak valid"
        },
        cellphone: {
            required: "Silakan mengisi No Telepon Seluler",
            minlength: "No Telepon Seluler minimal 10 karakter",
        },
        address1: {
            required: "Silakan mengisi Alamat Sesuai KTP",
        },
        address_rt1: {
            required: "Silakan mengisi RT Sesuai KTP",
        },
        address_rw1: {
            required: "Silakan mengisi RW Sesuai KTP",
        },
        province1: {
            required: "Silakan mengisi Provinsi Sesuai KTP",
        },
        district1: {
            required: "Silakan mengisi Kota/Kabupaten Sesuai KTP",
        },
        sub_district1: {
            required: "Silakan mengisi Kecamatan Sesuai KTP",
        },
        village1: {
            required: "Silakan mengisi Kelurahan Sesuai KTP",
        },
        address2: {
            required: "Silakan mengisi Alamat Instalasi",
        },
        address_rt2: {
            required: "Silakan mengisi RT Sesuai KTP",
        },
        address_rw2: {
            required: "Silakan mengisi RW Sesuai KTP",
        },
        province2: {
            required: "Silakan mengisi Provinsi Sesuai KTP",
        },
        district2: {
            required: "Silakan mengisi Kota/Kabupaten Sesuai KTP",
        },
        sub_district2: {
            required: "Silakan mengisi Kecamatan Sesuai KTP",
        },
        village2: {
            required: "Silakan mengisi Kelurahan Sesuai KTP",
        },
        hometype1: {
            required: "Silakan mengisi Tipe Alamat Sesuai KTP",
        },
        homestatus1: {
            required: "Silakan mengisi Status Alamat Instalasi",
        },
        hometype2: {
            required: "Silakan mengisi Tipe Alamat Sesuai KTP",
        },
        homestatus2: {
            required: "Silakan mengisi Status Alamat Instalasi",
        },
        map_latitude: {
            required: "Silakan mengisi Koordinat Latitude",
        },
        map_longitude: {
            required: "Silakan mengisi Koordinat Longitude",
        },
        _ref_service: {
            serType1: "Silakan mengisi Paket Layanan",
        },
        _ref_subscribe: {
            serType1: "Silakan mengisi Frekuensi Layanan",
        },
        _tvprice: {
            serType2: "Silakan mengisi Total Harga Perbulan",
        },
        _packname: {
            serType2: "Silakan mengisi Nama Paket / Keterangan pada Tagihan",
        },
        nonRegCustType: {
            serType2: "Silakan mengisi Tipe Pelanggan", 
        }
        
    
    },
    errorElement: 'span',
    errorPlacement: function(error, element) {
        error.addClass('invalid-feedback');
        element.closest('.form-group').append(error);
    },
    highlight: function(element, errorClass, validClass) {
        $(element).addClass('is-invalid');
    },
    unhighlight: function(element, errorClass, validClass) {
        $(element).removeClass('is-invalid');
    }
});
});

$('.select2bs4').select2({
    language: "id",
    theme: 'bootstrap4',
    placeholder: "Pilih"
}).on('change', function() {
    // normalise select2 after errorPlacement
    $(this).valid();
});
$("#regdate").datepicker({
        onSelect: function() {
            $(this).valid();
        }
    });
</script>