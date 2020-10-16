<!DOCTYPE html>
<html lang="en">


<!-- create-invoice24:07-->

<head>
    @include('_part.meta')
    @include('_part.style')
    <!-- <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/font-awesome.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/select2.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/bootstrap-datetimepicker.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/style.css') }}"> -->
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
                        <h4 class="page-title">Tambah Gaji a.n. {{ $dokter->nama_dokter }}</h4>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-8 offset-lg-2">
                        <form name="gaji" action="#" method="POST">
                            @csrf
                            <div class="row">
                                {{-- <input class="form-control" type="text" name="id_gaji" value="{{ $gaji->id }}" hidden> --}}
                                <div class="col-sm-8">
                                    <div class="form-group">
                                        <label>Gaji Pokok<span class="text-danger">*</span></label>
                                        <input class="form-control" type="text" name="gaji_pokok" value="{{ $dokter->gaji_pokok }}" readonly>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>Bulan</label>
                                        <select class="select" name="bulan" required autocomplete="off">
                                            <option>Januari</option>
                                            <option>Februari</option>
                                            <option>Maret</option>
                                            <option>April</option>
                                            <option>Mei</option>
                                            <option>Juni</option>
                                            <option>Juli</option>
                                            <option>Agustus</option>
                                            <option>September</option>
                                            <option>Oktober</option>
                                            <option>November</option>
                                            <option>Desember</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-2">
                                    <div class="form-group">
                                        <label>Hari Kerja<span class="text-danger">*</span></label>
                                        <input class="form-control" type="text" name="hari_kerja" value="" required autocomplete="off">
                                    </div>
                                </div>
                                <div class="col-sm-2">
                                    <div class="form-group">
                                        <label>Hari Masuk<span class="text-danger">*</span></label>
                                        <input class="form-control" type="text" name="hari_masuk" value="" required autocomplete="off">
                                    </div>
                                </div>
                                <div class="col-sm-8">
                                    <div class="form-group">
                                        <label>Gaji Karyawan<span class="text-danger">*</span></label>
                                        <input class="form-control" type="text" name="gaji_bersih" value="" required autocomplete="off">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label>Insentif Koordinator</label>
                                        <input class="form-control" type="text" name="uang_koor" value="">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label style="margin-bottom: 0%">Total Biaya Tindakan</label>
                                        <input class="form-control" type="text" name="biaya_tindakan" value="">
                                    </div>
                                </div>
                                <div class="col-sm-2" style="text-align: right; padding-right: 12px;width: 240px">
                                    <div class="input-group">
                                        <label>Prosentase</label>
                                        <input class="form-control" type="text" name="pros_tindakan" value="10" readonly>
                                        <div class="input-group-append">
                                            <span class="input-group-text">%</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Total Insentif per Tindakan per Bulan</label>
                                        <input class="form-control" type="text" name="ins_tindakan" value="">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>Total Biaya Exercise</label>
                                        <input class="form-control" type="text" name="biaya_exe" value="">
                                    </div>
                                </div>
                                <div class="col-sm-2" style="text-align: right; padding-right: 12px;width: 240px">
                                    <div class="input-group">
                                        <label>Prosentase</label>
                                        <input class="form-control" type="text" name="pros_exe" value="20" readonly>
                                        <div class="input-group-append">
                                            <span class="input-group-text">%</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Total Insentif per Exercise per Bulan</label>
                                        <input class="form-control" type="text" name="ins_exe" value="">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>Biaya Tindakan Minggu</label>
                                        <input class="form-control" type="text" name="biaya_minggu" value="">
                                    </div>
                                </div>
                                <div class="col-sm-2" style="text-align: right; padding-right: 12px;width: 240px">
                                    <div class="input-group">
                                        <label>Prosentase</label>
                                        <input class="form-control" type="text" name="pros_minggu" value="50" readonly>
                                        <div class="input-group-append">
                                            <span class="input-group-text">%</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-2">
                                    <div class="form-group">
                                        <label>Jml Krywan</label>
                                        <input class="form-control" type="text" name="jml_karyawan" value="">
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>Total Insentif Minggu</label>
                                        <input class="form-control" type="text" name="ins_minggu" value="">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label>Bonus Insentif</label>
                                        <input class="form-control" type="text" name="bonus" value="">
                                    </div>
                                </div>
                            </div>
                            <div class="text-center m-t-20">
                                <!-- <button class="btn btn-grey submit-btn m-r-10">Save & Send</button> -->
                                <button class="btn btn-primary submit-btn">Tambah</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- FOOTER -->
    @include('_part.footer')

    <script src="{{ asset('assets/js/jautocalc.min.js') }}"></script>
    <script src="{{ asset('assets/js/calc.js') }}"></script>
</body>


<!-- create-invoice24:07-->

</html>
