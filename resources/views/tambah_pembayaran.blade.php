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
        <!-- END HEADER -->
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
                        <form action="{{ route('pembayaran.store') }}" method="POST">
                            @csrf
                            <div class="row">
                                <input class="form-control" type="text" name="id_rekam_medis" value="{{ $rekam_medis->id }}" hidden>
                                <div class="col-sm-6 col-md-3">
                                    <div class="form-group">
                                        <label>No. Registrasi Pasien</label>
                                        <input class="form-control" type="text" name="id_pasien" value="{{ $rekam_medis->pasien->id }}" readonly>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-md-3">
                                    <div class="form-group">
                                        <label>Nama Pasien</label>
                                        <input class="form-control" type="text" value="{{ $rekam_medis->pasien->nama }}" readonly>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-md-3">
                                    <div class="form-group">
                                        <label>Tanggal Lahir</label>
                                        <input class="form-control" type="text" value="{{ Carbon\Carbon::parse($rekam_medis->pasien->tgl_lahir)->format('d/m/Y') }}" readonly>
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
                                        <input class="form-control" type="text" name="id_terapis" value="{{ $rekam_medis->users->id }}" hidden>
                                        <input class="form-control" type="text" name="nama_terapis" value="{{ $rekam_medis->users->name }}" readonly>
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
                                                    <th hidden>ID Tindakan</th>
                                                    <th class="col-xs-3">Nama Tindakan</th>
                                                    <th style="width:250px;">Biaya</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($rekam_medis->tindakan as $tindakan)
                                                <tr>
                                                    <td hidden>
                                                        <input class="form-control" type="text" name="tindakan[]" value="{{ $tindakan->id }}" readonly>
                                                    </td>
                                                    <td>
                                                        <input class="form-control" type="text" style="min-width: 150px" value="{{ $tindakan->nama_tindakan }}" readonly>
                                                    </td>
                                                    <td>
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text">Rp</span>
                                                            </div>
                                                            <input class="form-control text-right harga" type="text" style="width:50px" id="harga" name="harga" value="{{ $tindakan->harga_jual }}" readonly>
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
                                                            <input type="text" class="form-control text-right input" id="total" name="total" readonly>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="text-right">Diskon (Rp) <span class="text-danger">*</span></td>
                                                    <td style="text-align: right; padding-right: 12px;width: 240px">
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text">Rp</span>
                                                            </div>
                                                            <input class="form-control text-right input" id="diskon_rupiah" name="diskon_rupiah" type="text" autocomplete="off" required>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="text-right">Diskon (%) <span class="text-danger">*</span></td>
                                                    <td style="text-align: right; padding-right: 12px;width: 240px">
                                                        <div class="input-group">
                                                            <input class="form-control text-right input" id="diskon_persen" name="diskon_persen" type="text" autocomplete="off" required>
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
                                                            <input type="text" class="form-control text-right input" id="grand_total" name="grand_total" style="font-weight: bold" readonly>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="text-right">Tipe Pembayaran <span class="text-danger">*</span></td>
                                                    <td style="text-align: right; padding-right: 12px;width: 240px">
                                                        <select class="select" id="tipe_pembayaran" name="tipe_pembayaran" onchange="setTipePembayaran()" required>
                                                            <option>-- Pilih tipe pembayaran --</option>
                                                            <option value="Tunai">Tunai</option>
                                                            <option value="Debit">Debit</option>
                                                            <option value="Internet Banking">Internet Banking</option>
                                                        </select>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="text-right">Hari Besar? <span class="text-danger">*</span></td>
                                                    <td>
                                                        <div class="form-group">
                                                            <div class="form-check form-check-inline radio">
                                                                <input class="form-check-input input" type="radio" name="hari_besar" id="ya" value="Ya" onclick="yesNoCheck()" required>
                                                                <label class="form-check-label" for="ya">Ya</label>
                                                            </div>
                                                            <div class="form-check form-check-inline radio">
                                                                <input class="form-check-input input" type="radio" name="hari_besar" id="tidak" value="Tidak" onclick="yesNoCheck()" required>
                                                                <label class="form-check-label" for="tidak">Tidak</label>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr id="jml_krywn" hidden>
                                                    <td class="text-right">Jumlah Karyawan di Hari Besar <span class="text-danger">*</span></td>
                                                    <td style="text-align: right; padding-right: 12px; width: 240px">
                                                        <input class="form-control text-right input" id="krywn_hari_besar" name="krywn_hari_besar" type="text" autocomplete="off">
                                                    </td>
                                                </tr>
                                                <tr hidden>
                                                    <td class="text-right">Total Hari Besar</td>
                                                    <td style="text-align: right; padding-right: 12px; width: 240px">
                                                        <input class="form-control text-right input" id="total_hari_besar" name="total_hari_besar" type="text" autocomplete="off" readonly>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="text-right" id="pembayaran">Tunai <span class="text-danger">*</span></td>
                                                    <td style="text-align: right; padding-right: 12px; width: 240px">
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text">Rp</span>
                                                            </div>
                                                            <input class="form-control text-right input" id="jml_bayar" name="jml_bayar" type="text" autocomplete="off" required>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="text-right">Kembali</td>
                                                    <td style="text-align: right; padding-right: 12px; width: 240px">
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text">Rp</span>
                                                            </div>
                                                            <input class="form-control text-right input" id="kembali" name="kembali" type="text" autocomplete="off" readonly>
                                                        </div>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Catatan</label>
                                                <textarea class="form-control" name="catatan"></textarea>
                                                <input type="text" class="form-control" name="id_admin" value="{{ Auth::user()->id }}" hidden>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="text-center m-t-20">
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

    <!-- penghitungan pembayaran -->
    <script src="{{ asset('assets/js/pembayaran.js') }}"></script>

    <!-- show/hide input jumlah karyawan di hari besar -->
    <script>
        function yesNoCheck() {
            if (document.getElementById("ya").checked) {
                document.getElementById("jml_krywn").hidden = false;
                document.getElementById("krywn_hari_besar").required = true;
            } else {
                document.getElementById("krywn_hari_besar").required = false;
                document.getElementById("jml_krywn").hidden = true;
            }
        }
    </script>

    <!-- mengubah label jumlah uang yg dibayarkan pasien (tunai/non-tunai) -->
    <script>
        function setTipePembayaran() {
            var tipe = document.getElementById('tipe_pembayaran');
            var selectedOption = tipe.options[tipe.selectedIndex];
            var tipeValue = selectedOption.getAttribute('value');
            var pembayaran = document.getElementById('pembayaran');

            if (tipeValue == "Tunai") {
                pembayaran.innerHTML = 'Tunai <span class="text-danger">*</span>';
            } else {
                pembayaran.innerHTML = 'Non-Tunai <span class="text-danger">*</span>';
            }
        }
    </script>
</body>


<!-- create-invoice24:07-->

</html>