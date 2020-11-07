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
                                <th class="text-right">Opsi</th>
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
                                <td class="text-right">
                                    <div class="dropdown dropdown-action">
                                        <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <a class="dropdown-item" href="{{ route('pembayaran.edit.p', $bayar->id) }}"><i class="fa fa-pencil m-r-5"></i> Edit</a>
                                            <a class="dropdown-item" href="{{ route('invoice', $bayar->id) }}"><i class="fa fa-eye m-r-5"></i> View</a>
                                            <a class="dropdown-item" href="{{ route('invoice.download', $bayar->id) }}"><i class="fa fa-file-pdf-o m-r-5"></i> Download</a>
                                            <a class="dropdown-item" href="javascript:;" data-toggle="modal" onclick="deleteData('{{ $bayar->id }}')" data-target="#delete_inv"><i class="fa fa-trash-o m-r-5"></i> Delete</a>
                                        </div>
                                    </div>
                                </td>
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
