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
                        <h4 class="page-title">Pembayaran untuk Rekam Medis {{ $rekam_medis->id }}</h4>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <form name="kasir" action="{{ route('pembayaran.store') }}" method="POST">
                            @csrf
                            <div class="row">
                                <input class="form-control" type="text" name="id_rekam_medis" value="{{ $rekam_medis->id }}" hidden>
                                <div class="col-sm-6 col-md-3">
                                    <div class="form-group">
                                        <label>No. Registrasi Pasien<span class="text-danger"></span></label>
                                        <input class="form-control" type="text" name="id_pasien" value="{{ $rekam_medis->pasien->id }}" readonly>
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
                                        <textarea class="form-control" rows="3" readonly>{{ $rekam_medis->pasien->alamat }}</textarea>
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
                                        <label>Nama Terapis</label>
                                        <input class="form-control" type="text" name="id_terapis" value="{{ $rekam_medis->dokter->id }}" hidden>
                                        <input class="form-control" type="text" name="nama_terapis" value="{{ $rekam_medis->dokter->nama_dokter }}" readonly>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-md-3">
                                    <div class="form-group">
                                        <label>Tanggal Periksa <span class="text-danger">*</span></label>
                                        <div class="cal-icon">
                                            <input class="form-control datetimepicker" type="text" value="{{ $rekam_medis->created_at->format('d/m/Y') }}">
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
                                                    <th style="width: 20px" hidden>ID Tindakan</th>
                                                    <th class="col-sm-2">Kode Tindakan</th>
                                                    <th class="col-md-8">Nama Tindakan</th>
                                                    <th>Biaya</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($rekam_medis->tindakan as $tindakan)
                                                <tr name="harga">
                                                    <td hidden>
                                                        <input class="form-control" type="text" name="tindakan[]" style="min-width:150px" value="{{ $tindakan->id }}" hidden>
                                                    </td>
                                                    <td>
                                                        <input class="form-control" type="text" style="min-width:150px" value="{{ $tindakan->kode_tindakan }}" readonly>
                                                    </td>
                                                    <td>
                                                        <input class="form-control" type="text" style="min-width:150px" value="{{ $tindakan->nama_tindakan }}" readonly>
                                                    </td>
                                                    <td>
                                                        <input class="form-control form-amt text-right" type="text" id="harga" name="harga" style="width:150px; padding-right: 12px" value="{{ number_format($tindakan->harga_jual) }}" readonly>
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
                                                    <td class="text-right">Total Rp</td>
                                                    <td>
                                                        <input type="text" class="form-control text-right input" id="total" name="total" jAutoCalc="SUM({harga})">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="text-right">Diskon %</td>
                                                    <td style="text-align: right; padding-right: 12px;width: 175px">
                                                        <input class="form-control text-right input" id="diskon_persen" name="diskon_persen" type="text" autocomplete="off">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="text-right">Diskon Rp</td>
                                                    <td style="text-align: right; padding-right: 12px;width: 175px">
                                                        <input class="form-control text-right input" id="diskon_rupiah" name="diskon_rupiah" type="text" autocomplete="off">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td style="text-align: right; font-weight: bold">Grand Total Rp</td>
                                                    <td style="text-align: right; padding-right: 12px; width: 175px">
                                                        <input type="text" class="form-control text-right input" id="grand_total" name="grand_total" style="font-weight: bold" readonly>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="text-right">Tipe Pembayaran</td>
                                                    <td style="text-align: right; padding-right: 12px;width: 175px">
                                                        <select class="select" name="tipe_pembayaran">
                                                            <option>-- Pilih Tipe Pembayaran --</option>
                                                            <option>Tunai</option>
                                                            <option>Debit</option>
                                                            <option>Internet Banking</option>
                                                        </select>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Catatan</label>
                                                <textarea class="form-control"></textarea>
                                                <input type="text" class="form-control" name="admin" value="{{ Auth::user()->id }}" hidden>
                                            </div>
                                        </div>
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