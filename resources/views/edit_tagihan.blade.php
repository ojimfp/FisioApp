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
                    <div class="col-sm-12">
                        <h4 class="page-title">Tagihan untuk Rekam Medis {{ $rekam_medis->id }}</h4>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <form>
                            <div class="row">
                                <div class="col-sm-6 col-md-3">
                                    <div class="form-group">
                                        <label>No. Registrasi Pasien<span class="text-danger"></span></label>
                                        <input class="form-control" type="text" value="{{ $rekam_medis->pasien->id }}" readonly>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-md-3">
                                    <div class="form-group">
                                        <label>Nama Pasien<span class="text-danger"></span></label>
                                        <input class="form-control" type="text" value="{{ $rekam_medis->pasien->nama }}" readonly>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-md-3">
                                    <div class="form-group">
                                        <label>Tanggal Lahir</label>
                                        <input class="form-control" type="text" value="{{ $rekam_medis->pasien->tgl_lahir }}" readonly>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-md-3">
                                    <div class="form-group">
                                        <label>No. Telepon/HP</label>
                                        <input class="form-control" type="text" value="{{ $rekam_medis->pasien->no_telp }}" readonly>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-md-3">
                                    <div class="form-group">
                                        <label>Alamat Pasien</label>
                                        <textarea class="form-control" rows="3" value="{{ $rekam_medis->pasien->alamat }}" readonly></textarea>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-md-3">
                                    <div class="form-group">
                                        <label>Kota</label>
                                        <input class="form-control" type="text" value="{{ $rekam_medis->pasien->kota }}" readonly>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-md-3">
                                    <div class="form-group">
                                        <label>Tipe Pembayaran</label>
                                        <select class="select">
                                            <option></option>
                                            <option>Tunai</option>
                                            <option>Debit</option>
                                            <option>Internet Banking</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-md-3">
                                    <div class="form-group">
                                        <label>Tanggal Periksa <span class="text-danger">*</span></label>
                                        <div class="cal-icon">
                                            <input class="form-control datetimepicker" type="text">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 col-sm-12">
                                    <div class="table-responsive">
                                        <table class="table table-hover table-white">
                                            <thead>
                                                <tr>
                                                    <th style="width: 20px">#</th>
                                                    <th class="col-sm-2">Kode Tindakan</th>
                                                    <th class="col-md-8">Nama Tindakan</th>
                                                    <th>Biaya</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($rekam_medis->tindakan as $tindakan)
                                                <tr>
                                                    <td>1</td>
                                                    <td>
                                                        <input class="form-control" type="text" style="min-width:150px" value="{{ $tindakan->kode_tindakan }}">
                                                    </td>
                                                    <td>
                                                        <input class="form-control" type="text" style="min-width:150px" value="{{ $tindakan->nama_tindakan }}">
                                                    </td>
                                                    <td>
                                                        <input class="form-control form-amt" readonly="" style="width:120px; text-align:right; padding-right: 16px" type="text" value="{{ $tindakan->harga_jual }}">
                                                    </td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="table-responsive">
                                        <table class="table table-hover table-white">
                                            <tbody>
                                                <tr>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td class="text-right">Total</td>
                                                    <td style="text-align: right; padding-right: 30px;width: 230px">0</td>
                                                </tr>
                                                <tr>
                                                    <td colspan="5" class="text-right">Tax</td>
                                                    <td style="text-align: right; padding-right: 30px;width: 230px">
                                                        <input class="form-control text-right form-amt" value="10%" readonly="" type="text">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td colspan="5" class="text-right">
                                                        Diskon %
                                                    </td>
                                                    <td style="text-align: right; padding-right: 30px;width: 230px">
                                                        <input class="form-control text-right" type="text">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td colspan="5" style="text-align: right; font-weight: bold">
                                                        Grand Total
                                                    </td>
                                                    <td style="text-align: right; padding-right: 30px; font-weight: bold; font-size: 16px;width: 230px">
                                                        Rp
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Informasi Lain</label>
                                                <textarea class="form-control"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="text-center m-t-20">
                                <button class="btn btn-grey submit-btn m-r-10">Save & Send</button>
                                <button class="btn btn-primary submit-btn">Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="sidebar-overlay" data-reff=""></div>
    <script src="{{ asset('assets/js/jquery-3.2.1.min.js') }}"></script>
    <script src="{{ asset('assets/js/popper.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.slimscroll.js') }}"></script>
    <script src="{{ asset('assets/js/moment.min.js') }}"></script>
    <script src="{{ asset('assets/js/select2.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap-datetimepicker.min.js') }}"></script>
    <script src="{{ asset('assets/js/app.js') }}"></script>
</body>


<!-- create-invoice24:07-->

</html>