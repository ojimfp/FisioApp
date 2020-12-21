<!DOCTYPE html>
<html lang="en">


<!-- patients23:17-->

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
                    <div class="col-sm-4 col-3">
                        <h4 class="page-title">List Pasien</h4>
                    </div>
                    <div class="col-sm-8 col-9 text-right m-b-20">
                        <a href="{{ route('pasien.create') }}" class="btn btn btn-primary btn-rounded float-right"><i class="fa fa-plus"></i> Tambah Pasien Baru</a>
                    </div>
                </div>
                <h9 class="text-danger">cari berdasarkan nama/alamat</h9>
                <div class="row filter-row">
                    <div class="col-md-12">
                        <form action="{{ route('pasien.search') }}" method="GET">
                            <div class="col-sm-6 col-md-4" style="float: left; padding-left: 0px">
                                <div class="form-group form-focus">
                                    <label class="focus-label">Cari pasien</label>
                                    <input type="text" class="form-control floating" name="keyword" autocomplete="off">
                                </div>
                            </div>
                            <div class="col-sm-4 col-md-2" style="float: left; padding-right:45px">
                                <button class="btn btn-success submit-btn">Cari Pasien</button>
                            </div>
                        </form>
                        <form action="{{ route('pasien.index') }}">
                            <div class="col-sm-4 col-md-2" style="float: left; padding-left:45px">
                                <button class="btn btn-success submit-btn">Reset</button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="table-responsive">
                            <table class="table table-border table-striped custom-table mb-0" id="tabel-pasien">
                                <thead>
                                    <tr>
                                        <th>No. Registrasi</th>
                                        <th>Nama</th>
                                        <th>Alamat</th>
                                        <th>Tanggal Lahir</th>
                                        <th>No. Telepon/HP</th>
                                        <th class="text-right">Opsi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($pasien as $p)
                                    <tr>
                                        <td>{{ sprintf('%04d', $p->id) }}</td>
                                        <td>{{ $p->nama }}</td>
                                        <td>{{ $p->alamat }}</td>
                                        <td>{{ Carbon\Carbon::parse($p->tgl_lahir)->format('d/m/Y') }}</td>
                                        <td>{{ $p->no_telp }}</td>
                                        <td class="text-right">
                                            <div class="dropdown dropdown-action">
                                                <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
                                                <div class="dropdown-menu dropdown-menu-right">
                                                    <a class="dropdown-item" href="{{ route('rekam-medis.index', $p->id) }}"><i class="fa fa-history m-r-5"></i> Riwayat Pasien</a>
                                                    <a class="dropdown-item" href="{{ route('pasien.edit', ['pasien' => $p->id]) }}"><i class="fa fa-pencil m-r-5"></i> Edit</a>
                                                    <a class="dropdown-item" href="javascript:;" data-toggle="modal" onclick="deleteData('{{ $p->id }}')" data-target="#delete_patient"><i class="fa fa-trash-o m-r-5"></i> Hapus</a>
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
        </div>
        <div id="delete_patient" class="modal fade delete-modal" role="dialog">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <form action="" id="deleteForm" method="POST">
                        @csrf
                        @method('DELETE')
                        <div class="modal-body text-center">
                            <img src="{{ asset('assets/img/sent.png') }}" alt="" width="50" height="46">
                            <h3>Apakah Anda yakin ingin menghapus pasien ini?</h3>
                            <div class="m-t-20">
                                <button class="btn btn-white" data-dismiss="modal">Tutup</button>
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

    <!-- Script modal konfirmasi hapus pasien -->
    <script type="text/javascript">
        function deleteData(id) {
            var id = id;
            var url = '{{ route("pasien.destroy", ":id") }}';
            url = url.replace(':id', id);
            $("#deleteForm").attr('action', url);
        }

        function formSubmit() {
            $("#deleteForm").submit();
        }
    </script>
    <!-- <script>
        $(document).ready(function() {
            $('#tabel-pasien').DataTable({
                language: {
                    "emptyTable": "Tidak ada data yang tersedia pada tabel ini",
                    "info": "Menampilkan _START_ sampai _END_ dari _TOTAL_ entri",
                    "infoEmpty": "Menampilkan 0 sampai 0 dari 0 entri",
                    "infoFiltered": "(disaring dari _MAX_ entri keseluruhan)",
                    "infoThousands": "'",
                    "lengthMenu": "Tampilkan _MENU_ entri",
                    "loadingRecords": "Sedang memuat...",
                    "processing": "Sedang memproses...",
                    "search": "Cari:",
                    "zeroRecords": "Tidak ditemukan data yang sesuai",
                    "thousands": "'",
                    "paginate": {
                        "first": "Pertama",
                        "last": "Terakhir",
                        "next": "Selanjutnya",
                        "previous": "Sebelumnya"
                    },
                },
                dom: 'Bfrtip',
                buttons: [{
                        extend: 'pdfHtml5',
                        exportOptions: {
                            columns: [0, 1, 2, 3, 4]
                        }
                    },
                    {
                        extend: 'print',
                        exportOptions: {
                            columns: [0, 1, 2, 3, 4]
                        }
                    }
                ]
            });
        });
    </script> -->
</body>


<!-- patients23:19-->

</html>