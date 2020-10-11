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
                        <h4 class="page-title">List Karyawan</h4>
                    </div>
                    <div class="col-sm-8 col-9 text-right m-b-20">
                        <a href="{{ route('dokter.create') }}" class="btn btn btn-primary btn-rounded float-right"><i class="fa fa-plus"></i> Tambah Karyawan Baru</a>
                    </div>
                </div>
                <h9 class="text-danger">cari berdasarkan nama/no hp</h9>
                <div class="row filter-row">
                    <form action="{{ route('dokter.search') }}" method="GET">
                        <div class="col-sm-6 col-md-3 col-lg-3 col-xl-12 col-12">
                            <div class="form-group form-focus">
                                <label class="focus-label">Cari Karyawan</label>
                                <input type="text" class="form-control floating" name="keyword">
                                <div class="col-sm-6 col-md-3 col-lg-3 col-xl-1 col-12">
                                    <button class="btn btn-success submit-btn">Cari Karyawan</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="table-responsive">
                            <table class="table table-border table-striped custom-table datatable mb-0">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Nama Karyawan</th>
                                        <th>No HP</th>
                                        <th>Gaji Pokok</th>
                                        <th class="text-right">Opsi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($dokter as $d)
                                    <tr>
                                        <td>{{ $d->id }}</td>
                                        <td>{{ $d->nama_dokter }}</td>
                                        <td>{{ $d->hp }}</td>
                                        <td>{{ $d->gaji_pokok }}</td>
                                        <td class="text-right">
                                            <div class="dropdown dropdown-action">
                                                <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
                                                <div class="dropdown-menu dropdown-menu-right">
                                                    <a class="dropdown-item" href="{{ route('gaji.index', $d->id) }}"><i class="fa fa-history m-r-5"></i> Riwayat Gaji</a>
                                                    <a class="dropdown-item" href="{{ route('dokter.edit', ['dokter' => $d->id]) }}"><i class="fa fa-pencil m-r-5"></i> Edit</a>
                                                    <a class="dropdown-item" href="javascript:;" data-toggle="modal" onclick="deleteData('{{ $d->id }}')" data-target="#delete_dokter"><i class="fa fa-trash-o m-r-5"></i> Hapus</a>
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
        <div id="delete_dokter" class="modal fade delete-modal" role="dialog">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <form action="" id="deleteForm" method="POST">
                        @csrf
                        @method('DELETE')
                        <div class="modal-body text-center">
                            <img src="{{ asset('assets/img/sent.png') }}" alt="" width="50" height="46">
                            <h3>Apakah Anda yakin ingin menghapus fisioterapis ini?</h3>
                            <div class="m-t-20">
                                <button class="btn btn-white" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-danger" onclick="formSubmit()">Delete</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div> -->
    </div>
    <!-- FOOTER -->
    @include('_part.footer')
    <!-- Script modal konfirmasi hapus dokter -->
    <script type="text/javascript">
        function deleteData(id) {
            var id = id;
            var url = '{{ route("dokter.destroy", ":id") }}';
            url = url.replace(':id', id);
            $("#deleteForm").attr('action', url);
        }

        function formSubmit() {
            $("#deleteForm").submit();
        }
    </script>
</body>


<!-- patients23:19-->

</html>
