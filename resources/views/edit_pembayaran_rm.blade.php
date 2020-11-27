<!DOCTYPE html>
<html lang="en">


<!-- create-invoice24:07-->

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
                    <div class="col-sm-12">
                        <h4 class="page-title">Edit Pembayaran untuk Rekam Medis {{ $pembayaran->rekam_medis->id }}</h4>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <form name="kasir" action="{{ route('pembayaran.update.rm', $pembayaran->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-sm-6 col-md-3">
                                    <div class="form-group">
                                        <label>No. Registrasi Pasien<span class="text-danger"></span></label>
                                        <input class="form-control" type="text" value="{{ $pembayaran->pasien->id }}" readonly>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-md-3">
                                    <div class="form-group">
                                        <label>Nama Pasien<span class="text-danger"></span></label>
                                        <input class="form-control" type="text" value="{{ $pembayaran->pasien->nama }}" readonly>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-md-3">
                                    <div class="form-group">
                                        <label>Tanggal Lahir</label>
                                        <input class="form-control" type="text" value="{{ $pembayaran->pasien->tgl_lahir }}" readonly>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-md-3">
                                    <div class="form-group">
                                        <label>No. Telepon/HP</label>
                                        <input class="form-control" type="text" value="{{ $pembayaran->pasien->no_telp }}" readonly>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-md-3">
                                    <div class="form-group">
                                        <label>Alamat Pasien</label>
                                        <textarea class="form-control" rows="3" readonly>{{ $pembayaran->pasien->alamat }}</textarea>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-md-3">
                                    <div class="form-group">
                                        <label>Kota</label>
                                        <input class="form-control" type="text" value="{{ $pembayaran->pasien->kota }}" readonly>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-md-3">
                                    <div class="form-group">
                                        <label>Nama Terapis</label>
                                        <!-- <input class="form-control" type="text" name="id_terapis" value="" hidden> -->
                                        <input class="form-control" type="text" name="nama_terapis" value="{{ $pembayaran->users->name }}" readonly>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-md-3">
                                    <div class="form-group">
                                        <label>Tanggal Periksa <span class="text-danger">*</span></label>
                                        <div class="cal-icon">
                                            <input class="form-control datetimepicker" type="text" value="{{ $pembayaran->created_at->format('d/m/Y') }}">
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
                                                    <th hidden>ID Tindakan</th>
                                                    <th class="col-sm-1">Kode Tindakan</th>
                                                    <th class="col-md-8">Nama Tindakan</th>
                                                    <th class="col-sm-3">Biaya</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($pembayaran->tindakan as $tindakan)
                                                <tr name="harga">
                                                    <td hidden>
                                                        <input class=" form-control" type="text" name="tindakan[]" style="min-width:150px" value="{{ $tindakan->id }}" hidden>
                                                    </td>
                                                    <td>
                                                        <input class="form-control" type="text" style="min-width:150px" value="{{ $tindakan->kode_tindakan }}" readonly>
                                                    </td>
                                                    <td>
                                                        <input class="form-control" type="text" style="min-width:150px" value="{{ $tindakan->nama_tindakan }}" readonly>
                                                    </td>
                                                    <td>
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text">Rp</span>
                                                            </div>
                                                            <input class="form-control text-right harga" type="text" id="harga" name="harga" value="{{ $tindakan->harga_jual }}" style="width:50px; padding-right: 16px" readonly>
                                                        </div>
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
                                                    <td class="text-right">Total</td>
                                                    <td>
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text">Rp</span>
                                                            </div>
                                                            <input type="text" class="form-control text-right input" id="total" name="total" value="{{ $pembayaran->subtotal }}">
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="text-right">Diskon (Rp)</td>
                                                    <td style="text-align: right; padding-right: 12px;width: 240px">
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text">Rp</span>
                                                            </div>
                                                            <input class="form-control text-right input" id="diskon_rupiah" name="diskon_rupiah" type="text" autocomplete="off" value="{{ $pembayaran->diskon_rupiah }}">
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="text-right">Diskon (%)</td>
                                                    <td style="text-align: right; padding-right: 12px;width: 240px">
                                                        <div class="input-group">
                                                            <input class="form-control text-right input" id="diskon_persen" name="diskon_persen" type="text" autocomplete="off" value="{{ $pembayaran->diskon_persen }}">
                                                            <div class="input-group-append">
                                                                <span class="input-group-text">%</span>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td style="text-align: right; font-weight: bold">Grand Total</td>
                                                    <td style="text-align: right; padding-right: 12px; width: 240px">
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text">Rp</span>
                                                            </div>
                                                            <input type="text" class="form-control text-right input" id="grand_total" name="grand_total" style="font-weight: bold" value="{{ $pembayaran->total_biaya }}" readonly>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="text-right">Tipe Pembayaran</td>
                                                    <td style="text-align: right; padding-right: 12px;width: 240px">
                                                        <select class="select" name="tipe_pembayaran">
                                                            <option {{ $pembayaran->tipe_pembayaran == 'Tunai' ? 'selected' : '' }}>Tunai</option>
                                                            <option {{ $pembayaran->tipe_pembayaran == 'Debit' ? 'selected' : '' }}>Debit</option>
                                                            <option {{ $pembayaran->tipe_pembayaran == 'Internet Banking' ? 'selected' : '' }}>Internet Banking</option>
                                                        </select>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        </table>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Catatan</label>
                                                <textarea class="form-control">{{ $pembayaran->catatan }}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="text-center m-t-20">
                                <!-- <button class="btn btn-grey submit-btn m-r-10">Save & Send</button> -->
                                <button class="btn btn-primary submit-btn">Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- FOOTER -->
    @include('_part.footer')

    <script src="{{ asset('assets/js/pembayaran.js') }}"></script>
</body>


<!-- create-invoice24:07-->

</html>