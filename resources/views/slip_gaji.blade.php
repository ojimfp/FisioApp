<!DOCTYPE html>
<html lang="en">


{{-- <!-- salary-view23:28-->

<head>
    @include('_part.meta')
    @include('_part.style')
    <!--[if lt IE 9]>
		<script src="assets/js/html5shiv.min.js"></script>
		<script src="assets/js/respond.min.js"></script>
	<![endif]-->
</head> --}}
<head>
    @include('_part.meta')
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/select2.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/style.css') }}">
</head>

<body>
    {{-- <div class="main-wrapper">
        <!-- HEADER -->
        @include('_part.header')
        <!-- END HEADER -->
        <!-- SIDEBAR -->
        @include('_part.sidebar')
        <!-- END SIDEBAR -->
        <div class="page-wrapper"> --}}
            <div class="content">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card-box">
                            <h4 class="payslip-title">Gaji untuk Bulan {{ $gaji->created_at->subMonth()->locale('id_ID')->isoFormat('MMMM YYYY') }}</h4>
                            <div class="row">
                                <div class="col-sm-6 m-b-20">
                                    <img src="{{ asset('assets/img/logo-dark.png') }}" class="inv-logo" alt="">
                                    <ul class="list-unstyled mb-0">
                                        <li>Klinik Fisioterapi Niniek Soetini, M.Fis</li>
                                        <li>Jl. Mulyosari Timur no. 69,</li>
                                        <li>RT 12/RW 01, Kalisari, Kec. Mulyorejo,</li>
                                        <li>Surabaya</li>
                                    </ul>
                                </div>
                                <div class="col-sm-6 m-b-20">
                                    <div class="invoice-details">
                                    <h3 class="text-uppercase">Slip Gaji {{ $gaji->id }}</h3>
                                        <ul class="list-unstyled">
                                            <li>Bulan: <span>{{ $gaji->created_at->subMonth()->locale('id_ID')->isoFormat('MMMM YYYY') }}</span></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12 m-b-20">
                                    <ul class="list-unstyled">
                                        <li>
                                            <h5 class="mb-0"><strong>{{ $gaji->users->name }}</strong></h5>
                                        </li>
                                        <li><span>{{ $gaji->users->pekerjaan }}</span></li>
                                        <li>ID Karyawan: {{ $gaji->users_id }}</li>
                                    </ul>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div>
                                        <h4 class="m-b-10"><strong>Rincian Gaji</strong></h4>
                                        <table class="table table-bordered">
                                            <tbody>
                                                <tr>
                                                    <td><strong>Gaji Bersih</strong> <span class="float-right">Rp {{ number_format($gaji->gaji_bersih) }}</span></td>
                                                </tr>
                                                <tr>
                                                    <td><strong>Intensif per Tindakan per Bulan</strong> <span class="float-right">Rp {{ number_format($gaji->ins_tindakan) }}</span></td>
                                                </tr>
                                                <tr>
                                                    <td><strong>Insentif per Exercise per Bulan</strong> <span class="float-right">Rp {{ number_format($gaji->ins_exe) }}</span></td>
                                                </tr>
                                                <tr>
                                                    <td><strong>Insentif Koordinator</strong> <span class="float-right">Rp {{ number_format($gaji->ins_koor) }}</span></td>
                                                </tr>
                                                <tr>
                                                    <td><strong>Bonus</strong> <span class="float-right"><strong>Rp {{ number_format($gaji->bonus) }}</strong></span></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div>
                                        <h4 class="m-b-10"><strong>Insentif per Hari Minggu</strong></h4>
                                        <table class="m-b-10 table table-bordered">
                                            <tbody>
                                                <tr>
                                                    <td><strong>Insentif Hari Minggu Pertama</strong> <span class="float-right">Rp {{ number_format($gaji->ins_minggu_satu) }}</span></td>
                                                </tr>
                                                <tr>
                                                    <td><strong>Insentif Hari Minggu Kedua</strong> <span class="float-right">Rp {{ number_format($gaji->ins_minggu_dua) }}</span></td>
                                                </tr>
                                                <tr>
                                                    <td><strong>Insentif Hari Minggu Ketiga</strong> <span class="float-right">Rp {{ number_format($gaji->ins_minggu_tiga) }}</span></td>
                                                </tr>
                                                <tr>
                                                    <td><strong>Insentif Hari Minggu Keempat</strong> <span class="float-right">Rp {{ number_format($gaji->ins_minggu_empat) }}</span></td>
                                                </tr>
                                                <tr>
                                                    <td><strong>Insentif Hari Minggu Kelima</strong> <span class="float-right"><strong>Rp {{ number_format($gaji->ins_minggu_lima) }}</strong></span></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <p><strong>Total Gaji: Rp {{ number_format($gaji->total_gaji) }}</strong> ({{ $terbilang->format($gaji->total_gaji) }} rupiah.)</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        {{-- </div>
    </div>
    <!-- FOOTER -->
    @include('_part.footer') --}}
</body>


<!-- salary-view23:28-->

</html>
