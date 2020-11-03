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
                                        <label>Gaji Pokok</label>
                                        <input class="form-control" id="gaji_pokok" type="text" name="gaji_pokok" value="{{ $dokter->gaji_pokok }}" readonly>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>Bulan</label>
                                        <select class="select" id="bulan" name="bulan" onchange="myFunction()" required autocomplete="off">
                                            <option value="1">Januari</option>
                                            <option value="2">Februari</option>
                                            <option value="3">Maret</option>
                                            <option value="4">April</option>
                                            <option value="5">Mei</option>
                                            <option value="6">Juni</option>
                                            <option value="7">Juli</option>
                                            <option value="8">Agustus</option>
                                            <option value="9">September</option>
                                            <option value="10">Oktober</option>
                                            <option value="11">November</option>
                                            <option value="12">Desember</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-2">
                                    <div class="form-group">
                                        <label>Hari Kerja<span class="text-danger"> *</span></label>
                                        <input class="form-control hari" id="hari_kerja" type="text" name="hari_kerja" value="" required autocomplete="off">
                                    </div>
                                </div>
                                <div class="col-sm-2">
                                    <div class="form-group">
                                        <label>Hari Masuk<span class="text-danger"> *</span></label>
                                        <input class="form-control hari" id="hari_masuk" type="text" name="hari_masuk" value="" required autocomplete="off">
                                    </div>
                                </div>
                                <div class="col-sm-8">
                                    <div class="form-group">
                                        <label>Gaji Karyawan<span class="text-danger"> *</span></label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">Rp</span>
                                            </div>
                                            <input class="form-control hari" id="gaji_bersih" type="text" name="gaji_bersih" value="" required autocomplete="off">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label>Insentif Koordinator</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">Rp</span>
                                            </div>
                                            <input class="form-control" type="text" name="uang_koor" value="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>Total Biaya Tindakan</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">Rp</span>
                                            </div>
                                            <input class="form-control" id="biaya_tindakan" type="text" name="biaya_tindakan" value="">
                                        </div>
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
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">Rp</span>
                                            </div>
                                            <input class="form-control" id="ins_tindakan" type="text" name="ins_tindakan" value="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>Total Biaya Exercise</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">Rp</span>
                                            </div>
                                            <input class="form-control" id="biaya_exe" type="text" name="biaya_exe" value="">
                                        </div>
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
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">Rp</span>
                                            </div>
                                            <input class="form-control" id="ins_exe" type="text" name="ins_exe" value="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>Biaya Tindakan Minggu</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">Rp</span>
                                            </div>
                                            <input class="form-control" id="biaya_minggu" type="text" name="biaya_minggu" value="">
                                        </div>
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
                                        <input class="form-control" id="jml_karyawan" type="text" name="jml_karyawan" value="">
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>Total Insentif Minggu</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">Rp</span>
                                            </div>
                                            <input class="form-control" id="ins_minggu" type="text" name="ins_minggu" value="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label>Bonus Insentif</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">Rp</span>
                                            </div>
                                            <input class="form-control" type="text" name="bonus" value="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label style="font-weight: bold;">Total Gaji Bulan Ini</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">Rp</span>
                                            </div>
                                            <input class="form-control" type="text" name="total_gaji" value="">
                                        </div>
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
    <script>
        function myFunction() {
            document.getElementById("hari_masuk").value = <?php echo json_encode($hari_masuk) ?>;
            document.getElementById("biaya_tindakan").value = <?php echo json_encode($total_tindakan) ?>;
            document.getElementById("biaya_exe").value = <?php echo json_encode($total_exercise) ?>;
            document.getElementById("biaya_minggu").value = <?php echo json_encode($total_minggu) ?>;
            document.getElementById("jml_karyawan").value = <?php echo json_encode($jml_karyawan) ?>;

            var x = parseInt(document.getElementById("biaya_tindakan").value);
            document.getElementById("ins_tindakan").value = x * 0.1;

            var y = parseInt(document.getElementById("biaya_exe").value);
            document.getElementById("ins_exe").value = y * 0.2;

            var z = parseInt(document.getElementById("biaya_minggu").value);
            var a = parseInt(document.getElementById("jml_karyawan").value);
            document.getElementById("ins_minggu").value = z * 0.5 / a;
        }
    </script>
    <script>
        var count = 1;

        function dynamic_field(number) {

        }
    </script>
    <script src="{{ asset('assets/js/gaji.js') }}"></script>
</body>


<!-- create-invoice24:07-->

</html>