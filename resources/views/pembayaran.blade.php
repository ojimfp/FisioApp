<!DOCTYPE html>
<html lang="en">


<!-- patients23:17-->

<head>
    @include('_part.meta')
    @include('_part.style')
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
                        <h4 class="page-title">Riwayat Pembayaran</h4>
                    </div>
                    <div class="col-sm-7 col-8 text-right m-b-30">
                        <!-- <button class="btn btn-white btn-lg"><a href="{{ route('pembayaran.download') . '?start_date=' . $start_date . '&end_date=' . $end_date  . '&start_time=' . $start_time . '&end_time=' . $end_time }}">PDF</a></button> -->
                        <!-- <button class="btn btn-white"><a href="{{ route('pembayaran.print') . '?start_date=' . $start_date . '&end=' . $end_date }}"></a></button> -->
                        <a href="{{ route('pembayaran.print') . '?start_date=' . $start_date . '&end_date=' . $end_date . '&start_time=' . $start_time . '&end_time=' . $end_time }}" class="btn btn-white"><i class="fa fa-print fa-lg"></i> Print</a>
                    </div>
                </div>
                <div class="row filter-row">
                    <form action="{{ route('pembayaran.search') }}" method="GET">
                        <div class="row">
                            <div class="col-sm-6 col-md-3 col-lg-3 col-xl-3">
                                <div class="form-group form-focus">
                                    <label class="focus-label">Dari Tanggal</label>
                                    <div class="cal-icon">
                                        <input class="form-control floating datetimepicker" type="text" name="start_date" required>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-3 col-lg-3 col-xl-3">
                                <div class="form-group form-focus">
                                    <label class="focus-label">Sampai Tanggal</label>
                                    <div class="cal-icon">
                                        <input class="form-control floating datetimepicker" type="text" name="end_date" required>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-3 col-lg-3 col-xl-3">
                                <div class="form-group form-focus">
                                    <label class="focus-label">Dari Jam</label>
                                    <div class="time-icon">
                                        <input type="text" name="start_time" class="form-control" id="datetimepicker3">
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-3 col-lg-3 col-xl-3">
                                <div class="form-group form-focus">
                                    <label class="focus-label">Sampai Jam</label>
                                    <div class="time-icon">
                                        <input type="text" name="end_time" class="form-control" id="datetimepicker2">
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 m-b-20" style="float: left">
                                <button class="btn btn-success submit-btn" style="display: inline-block; margin-right: 20px">Cari Pembayaran</button>
                                <a href="{{ route('pembayaran.index') }}" class="btn btn-success submit-btn" style="display: inline-block; margin-right: 20px">Reset</a>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="table-responsive">
                            <table class="table table-striped custom-table datatable mb-0" id="tabel-pembayaran">
                                <thead>
                                    <tr>
                                        <th>No. Tagihan</th>
                                        <th>Tanggal Pembayaran</th>
                                        <th>Nama Pasien</th>
                                        <th>Tindakan</th>
                                        <th>Total Biaya</th>
                                        <th>Tipe Pembayaran</th>
                                        <th>Nama Terapis</th>
                                        <th>Catatan</th>
                                        <th class="text-right">Opsi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                    $no = 1;
                                    @endphp
                                    @foreach($pembayaran as $bayar)
                                    <tr>
                                        <td>{{ $no }}</td>
                                        <td>{{ $bayar->created_at->format('d/m/Y H:i') }}</td>
                                        <td>{{ $bayar->pasien->nama }}</td>
                                        <td>{{ implode(', ', $bayar->tindakan()->get()->pluck('nama_tindakan')->toArray()) }}</td>
                                        <td>Rp {{ number_format($bayar->total_biaya) }}</td>
                                        <td>{{ $bayar->tipe_pembayaran }}</td>
                                        <td>{{ $bayar->users->name }}</td>
                                        <td>{{ $bayar->catatan }}</td>
                                        <td class="text-right">
                                            <div class="dropdown dropdown-action">
                                                <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
                                                <div class="dropdown-menu dropdown-menu-right">
                                                    <a class="dropdown-item" href="{{ route('pembayaran.edit.p', $bayar->id) }}"><i class="fa fa-pencil m-r-5"></i> Edit</a>
                                                    <a class="dropdown-item" href="{{ route('invoice', $bayar->id) }}"><i class="fa fa-eye m-r-5"></i> Lihat Nota</a>
                                                    <a class="dropdown-item" href="{{ route('invoice.download', $bayar->id) }}"><i class="fa fa-file-pdf-o m-r-5"></i> Unduh Nota</a>
                                                    @can('manage-users')
                                                    <a class="dropdown-item" href="javascript:;" data-toggle="modal" onclick="deleteData('{{ $bayar->id }}')" data-target="#delete_inv"><i class="fa fa-trash-o m-r-5"></i> Hapus</a>
                                                    @endcan
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    @php
                                    $no++;
                                    @endphp
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div id="delete_inv" class="modal fade delete-modal" role="dialog">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <form action="" id="deleteForm" method="POST">
                            @csrf
                            @method('DELETE')
                            <div class="modal-body text-center">
                                <img src="{{ asset('assets/img/sent.png') }}" alt="" width="50" height="46">
                                <h3>Apakah Anda yakin ingin menghapus riwayat pembayaran ini?</h3>
                                <div class="m-t-20">
                                    <button class="btn btn-white" data-dismiss="modal">Tidak</button>
                                    <button type="submit" class="btn btn-danger" onclick="formSubmit()">Hapus</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- FOOTER -->
        @include('_part.footer')

        <!-- Script modal konfirmasi hapus riwayat pembayaran -->
        <script type="text/javascript">
            function deleteData(id) {
                var id = id;
                var url = '{{ route("pembayaran.destroy.p", ":id") }}';
                url = url.replace(':id', id);
                $("#deleteForm").attr('action', url);
            }

            function formSubmit() {
                $("#deleteForm").submit();
            }
        </script>
        <script>
            $(function() {
                $('#datetimepicker3').datetimepicker({
                    format: 'HH:mm',
                    icons: {
                        time: "fa fa-clock-o",
                        date: "fa fa-calendar",
                        up: "fa fa-arrow-up",
                        down: "fa fa-arrow-down",
                        previous: "fa fa-chevron-left",
                        next: "fa fa-chevron-right",
                        today: "fa fa-clock-o",
                        clear: "fa fa-trash-o"
                    },
                    stepping: 5
                });
                $('#datetimepicker2').datetimepicker({
                    format: 'HH:mm',
                    icons: {
                        time: "fa fa-clock-o",
                        date: "fa fa-calendar",
                        up: "fa fa-arrow-up",
                        down: "fa fa-arrow-down",
                        previous: "fa fa-chevron-left",
                        next: "fa fa-chevron-right",
                        today: "fa fa-clock-o",
                        clear: "fa fa-trash-o"
                    },
                    stepping: 5
                });
            });
        </script>
</body>

<!-- patients23:19-->

</html>