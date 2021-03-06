<!DOCTYPE html>
<html lang="en">


<!-- add-patient24:06-->

<head>
    @include('_part.meta')
    @include('_part.style')
    <!--[if lt IE 9]>
		<script src="assets/js/html5shiv.min.js"></script>
		<script src="assets/js/respond.min.js"></script>
	<![endif]-->
</head>

<body>
    <div class="main-wrapper">
        <!-- HEADER -->
        @include('_part.header')
        <!-- SIDEBAR -->
        @include('_part.sidebar')
        <!-- END SIDEBAR -->
        <div class="page-wrapper">
            <div class="content">
                <div class="row">
                    <div class="col-lg-8 offset-lg-2">
                        <h4 class="page-title">Tambah Pasien</h4>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-8 offset-lg-2">
                        <form action="{{ route('pasien.store') }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label>Nama Lengkap <span class="text-danger">*</span></label>
                                        <input class="form-control" type="text" name="nama" required autocomplete="off" onkeypress="return event.charCode < 48 || event.charCode  >57" placeholder="Harap diawal dengan huruf kapital">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Alamat <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" name="alamat" required autocomplete="off" placeholder="Harap diawal dengan huruf kapital">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Kota <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" name="kota" required autocomplete="off" onkeypress="return event.charCode < 48 || event.charCode  >57" placeholder="Harap diawal dengan huruf kapital">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Tanggal Lahir <span class="text-danger">*</span></label>
                                        <div class="cal-icon">
                                            <input type="text" class="form-control floating datetimepicker" name="tgl_lahir" required autocomplete="off">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>No. Telepon/HP <span class="text-danger">*</span></label>
                                        <input class="form-control" type="tel" name="no_telp" required autocomplete="off" onkeypress="return event.charCode >= 48 && event.charCode <=57" placeholder="08xxxxxxx">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label class="display-block">Jenis Kelamin <span class="text-danger">*</span></label>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="jenis_kelamin" id="jns_pria" value="Pria" checked>
                                            <label class="form-check-label" for="jns_pria">
                                                Pria
                                            </label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="jenis_kelamin" id="jns_wanita" value="Wanita">
                                            <label class="form-check-label" for="jns_wanita">
                                                Wanita
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label>Alergi Obat</label>
                                        <textarea class="form-control" name="alergi_obat" autocomplete="off"></textarea>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label>Catatan</label>
                                        <textarea class="form-control" name="catatan" autocomplete="off"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="m-t-20 text-center">
                                <button class="btn btn-primary submit-btn">Tambah Pasien</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- FOOTER -->
    @include('_part.footer')

</body>

<!-- add-patient24:07-->

</html>