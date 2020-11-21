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
        <!-- END HEADER -->
        <!-- SIDEBAR -->
        @include('_part.sidebar')
        <!-- END SIDEBAR -->
        <div class="page-wrapper">
            <div class="content">
                <div class="row">
                    <div class="col-sm-4 col-5">
                        <h4 class="page-title">Gaji Karyawan</h4>
                    </div>
                    @can('manage-users')
                    <div class="col-sm-8 col-7 text-right m-b-30">
                        <a href="{{ route('gaji.create') }}" class="btn btn-primary btn-rounded float-right"><i class="fa fa-plus"></i> Masukkan Gaji</a>
                    </div>
                    @endcan
                </div>
                <div class="row filter-row">
                    <form action="{{ route('gaji.search') }}" method="GET">
                        <div class="col-sm-6 col-md-3 col-lg-3 col-xl-4 col-12" style="float: left;">
                            <div class="form-group form-focus">
                                <label class="focus-label">Nama/ID Karyawan</label>
                                <input type="text" class="form-control floating" name="keyword" autocomplete="off">
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-3 col-lg-3 col-xl-4 col-12" style="float: left;">
                            <div class="form-group">
                                <select class="select" name="bulan_gajian" required autocomplete="off">
                                    <option>Pilih Bulan</option>
                                    <option value="10">Oktober</option>
                                    <option value="11">November</option>
                                    <option value="12">Desember</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-3 col-lg-3 col-xl-3 col-12" style="float: left;">
                            <button class="btn btn-success submit-btn">Cari Gaji</button>
                        </div>
                    </form>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="table-responsive">
                            <table class="table table-striped custom-table datatable">
                                <thead>
                                    <tr>
                                        <th>Nama Karyawan</th>
                                        <th>ID Karyawan</th>
                                        <th>Bulan</th>
                                        <th>Hari Kerja</th>
                                        <th>Hari Masuk</th>
                                        <th>Gaji Bersih</th>
                                        <th>Gaji Total</th>
                                        <th class="text-right">Opsi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($gaji as $g)
                                    <tr>
                                        <td>{{ $g->dokter->nama_dokter }}</td>
                                        <td>{{ $g->dokter->id }}</td>
                                        <td>{{ $g->created_at->subMonth()->locale('id_ID')->isoFormat('MMMM YYYY') }}</td>
                                        <td>{{ $g->hari_kerja }}</td>
                                        <td>{{ $g->hari_masuk }}</td>
                                        <td>Rp {{ number_format($g->gaji_bersih) }}</td>
                                        <td>Rp {{ number_format($g->total_gaji) }}</td>
                                        <td class="text-right">
                                            <div class="dropdown dropdown-action">
                                                <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
                                                <div class="dropdown-menu dropdown-menu-right">
                                                    <a class="dropdown-item" href="{{ route('slip.gaji', $g->id) }}"><i class="fa fa-book m-r-5"></i> Slip Gaji</a>
                                                    <a class="dropdown-item" href="{{ route('gaji.edit', $g->id) }}"><i class="fa fa-pencil m-r-5"></i> Edit</a>
                                                    <a class="dropdown-item" href="javascript:;" data-toggle="modal" onclick="deleteData('{{ $g->id }}')" data-target="#delete_gaji"><i class="fa fa-trash-o m-r-5"></i> Hapus</a>
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
        <div id="delete_gaji" class="modal fade delete-modal" role="dialog">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <form action="" id="deleteForm" method="POST">
                        @csrf
                        @method('DELETE')
                        <div class="modal-body text-center">
                            <img src="{{ asset('assets/img/sent.png') }}" alt="" width="50" height="46">
                            <h3>Apakah Anda yakin ingin menghapus gaji karyawan ini?</h3>
                            <div class="m-t-20">
                                <button class="btn btn-white" data-dismiss="modal">Tidak</button>
                                <button type="submit" class="btn btn-danger" onclick="formSubmit()">Hapus</button>
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
            var url = '{{ route("gaji.destroy", ":id") }}';
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