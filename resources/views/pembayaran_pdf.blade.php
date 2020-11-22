<!DOCTYPE html>
<html lang="en">


<!-- invoice-view24:07-->

<head>
    @include('_part.meta')
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/select2.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/style.css') }}">
</head>

<body>
    <div class="content">
        <div class="row">
            <div class="col-sm-5 col-4">
                <h4 class="page-title" style="font-size: 20px;">Riwayat Pembayaran</h4>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="table-responsive">
                    <table class="table table-striped custom-table datatable mb-0">
                        <thead>
                            <tr>
                                <th>No. Tagihan</th>
                                <th>Tanggal Pembayaran</th>
                                <th>Nama Pasien</th>
                                <th>Tindakan</th>
                                <th>Total Biaya</th>
                                <th>Tipe Pembayaran</th>
                                <th>Nama Terapis</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($pembayaran as $bayar)
                            <tr>
                                <td>{{ $bayar->id }}</td>
                                <td>{{ $bayar->created_at->format('d/m/Y H:i') }}</td>
                                <td>{{ $bayar->pasien->nama }}</td>
                                <td>{{ implode(', ', $bayar->tindakan()->get()->pluck('nama_tindakan')->toArray()) }}</td>
                                <td>Rp {{ number_format($bayar->total_biaya) }}</td>
                                <td>{{ $bayar->tipe_pembayaran }}</td>
                                <td>{{ $bayar->dokter->nama_dokter }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</body>


<!-- invoice-view24:07-->

</html>
<script src="{{ asset('assets/js/jquery-3.2.1.min.js') }}"></script>
<script>
    $(document).ready(function(){
        window.print();
    });
</script>

