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
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label>Gaji Pokok<span class="text-danger">*</span></label>
                                        <input class="form-control" type="text" name="gaji_pokok" value="{{ $dokter->gaji_pokok }}" readonly>
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
                            <div class="text-center m-t-20">
                                <!-- <button class="btn btn-grey submit-btn m-r-10">Save & Send</button> -->
                                <button class="btn btn-primary submit-btn">Bayar</button>
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
