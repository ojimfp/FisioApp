<!DOCTYPE html>
<html lang="en">


<!-- invoice-view24:07-->

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
                    <div class="col-sm-5 col-4">
                        <h4 class="page-title">Invoice</h4>
                    </div>
                    <div class="col-sm-7 col-8 text-right m-b-30">
                        <!-- <a href="{{ route('invoice.print', $pembayaran->id) }}">Print Invoice</a> -->
                        <a href="{{ route('print.test') }}" class="btn btn-white"><i class="fa fa-print fa-lg"></i> Print</a>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="row custom-invoice">
                                    <div class="col-6 col-sm-6 m-b-20">
                                        <img src="{{ asset('assets/img/logo-dark.png') }}" class="inv-logo" alt="">
                                        <ul class="list-unstyled">
                                            <li>Klinik Fisioterapi Niniek Soetini, M.Fis</li>
                                            <li>Jl. Mulyosari Timur no. 69, Surabaya</li>
                                            <li>Tlp. 031 5936394, WA 082230495969</li>
                                        </ul>
                                    </div>
                                    <div class="col-6 col-sm-6 m-b-20">
                                        <div class="invoice-details">
                                            <h3 class="text-uppercase">Invoice {{ $pembayaran->id }}</h3>
                                            <ul class="list-unstyled">
                                                <li>{{ $pembayaran->created_at->format('d/m/Y, H:i') }}</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6 col-lg-6 m-b-20">
                                        <h5>Invoice untuk:</h5>
                                        <ul class="list-unstyled">
                                            <li>
                                                <h5><strong>{{ $pembayaran->pasien->nama }}</strong></h5>
                                            </li>
                                            <li>{{ $pembayaran->pasien->alamat }}</li>
                                            <li>{{ $pembayaran->pasien->kota }}</li>
                                            <li>{{ $pembayaran->pasien->no_telp }}</li>
                                            <li>{{ $pembayaran->users->name }}</li>
                                        </ul>

                                    </div>
                                </div>
                                <div class="table-responsive">
                                    <table class="table table-striped table-hover">
                                        <thead>
                                            <tr>
                                                <th hidden>ID TINDAKAN</th>
                                                <th>NAMA TINDAKAN</th>
                                                <th class="text-right">BIAYA</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($pembayaran->tindakan as $tindakan)
                                            <tr>
                                                <td name="tindakan[]" hidden>{{ $tindakan->id }}</td>
                                                <td>{{ $tindakan->nama_tindakan }}</td>
                                                <td class="text-right">Rp {{ number_format($tindakan->harga_jual) }}</td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <div>
                                    <div class="row invoice-payment">
                                        <div class="col-sm-7">
                                        </div>
                                        <div class="col-sm-5">
                                            <div class="m-b-20">
                                                <h6>Total biaya</h6>
                                                <div class="table-responsive no-border">
                                                    <table class="table mb-0">
                                                        <tbody>
                                                            <tr>
                                                                <th>Subtotal:</th>
                                                                <td class="text-right">Rp {{ number_format($pembayaran->subtotal) }}</td>
                                                            </tr>
                                                            <tr>
                                                                <th>Diskon (Rp)</th>
                                                                <td class="text-right">Rp {{ number_format($pembayaran->diskon_rupiah) }}</td>
                                                            </tr>
                                                            <tr>
                                                                <th>Diskon (%)</th>
                                                                <td class="text-right">{{ $pembayaran->diskon_persen }}%</td>
                                                            </tr>
                                                            <tr>
                                                                <th>Total:</th>
                                                                <td class="text-right text-primary">
                                                                    <h5>Rp {{ number_format($pembayaran->total_biaya) }}</h5>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="invoice-info">
                                        <h5>Catatan:</h5>
                                        <p class="text-muted">{{ $pembayaran->catatan }}</p></br>
                                        <h5 class="text-center">-- Kasir: {{ $pembayaran->admin->name }} --</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- FOOTER -->
    @include('_part.footer')
</body>


<!-- invoice-view24:07-->

</html>