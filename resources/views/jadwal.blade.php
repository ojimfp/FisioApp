<!DOCTYPE html>
<html lang="en">


<!-- appointments23:19-->

<?php header("refresh: 60"); ?>

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
                    <div class="col-sm-4 col-3">
                        <h4 class="page-title">Jadwal Janji Pasien</h4>
                    </div>
                    <div class="col-sm-8 col-9 text-right m-b-20">
                        <a href="{{ route('jadwal.create') }}" class="btn btn btn-primary btn-rounded float-right"><i class="fa fa-plus"></i> Tambah Jadwal</a>
                    </div>
                </div>
                <div class="row filter-row">
                    <form action="{{ route('jadwal.search') }}" method="GET">
                        <div class="col-sm-6 col-md-5 col-lg-6 col-xl-6" style="float: left">
                            <div class="form-group form-focus">
                                <label class="focus-label">Cari terapis</label>
                                <input type="text" class="form-control floating" name="keyword" autocomplete="off">
                            </div>
                        </div>
                        <!-- <div class="col-sm-6 col-md-4 col-lg-3 col-xl-3">
                                <div class="form-group form-focus">
                                    <label class="focus-label">Dari Tanggal</label>
                                    <div class="cal-icon">
                                        <input class="form-control floating datetimepicker" type="text" name="start_date">
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-4 col-lg-3 col-xl-3">
                                <div class="form-group form-focus">
                                    <label class="focus-label">Sampai Tanggal</label>
                                    <div class="cal-icon">
                                        <input class="form-control floating datetimepicker" type="text" name="end_date">
                                    </div>
                                </div>
                            </div> -->
                        <div class="col-sm-4 col-md-4 col-lg-4 col-xl-4 m-b-20" style="float: left">
                            <button class="btn btn-success submit-btn">Cari Terapis</button>
                        </div>
                        <div class="col-sm-4 col-md-1 col-lg-2 col-xl-2 m-b-10" style="float: left">
                            <a href="{{ route('jadwal.index') }}" class="btn btn-success submit-btn">Reset</a>
                        </div>
                    </form>
                </div>
                <div class="profile-tabs">
                    <ul class="nav nav-tabs nav-tabs-bottom" id="myTab">
                        <li class="nav-item"><a class="nav-link active" href="#pagi" data-toggle="tab">Pagi</a></li>
                        <li class="nav-item"><a class="nav-link" href="#siang" data-toggle="tab">Siang</a></li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane show active" id="pagi">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="table-responsive">
                                        <table class="table table-border table-striped custom-table datatable mb-0">
                                            <thead>
                                                <tr>
                                                    <th>Nama Fisioterapis</th>
                                                    <th>Nama Pasien</th>
                                                    <th>No. Regis. Pasien</th>
                                                    <th>Umur Pasien</th>
                                                    <th>Tanggal Tindakan</th>
                                                    <th>Jam Tindakan</th>
                                                    <th class="text-right">Opsi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($jadwal_pg as $pg)
                                                <tr>
                                                    <td>{{ $pg->users->name }}</td>
                                                    <td><a href="{{ route('rekam-medis.index', $pg->pasien->id) }}">{{ $pg->pasien->nama }}</a></td>
                                                    <td>{{ sprintf('%04d', $pg->pasien->id) }}</td>
                                                    <td>{{ $today->diff(new DateTime($pg->pasien->tgl_lahir))->y }} tahun</td>
                                                    <td>{{ $pg->tgl_tindakan }}</td>
                                                    <td>{{ $pg->jam_tindakan }}</td>
                                                    <td class="text-right">
                                                        <div class="dropdown dropdown-action">
                                                            <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
                                                            <div class="dropdown-menu dropdown-menu-right">
                                                                <a class="dropdown-item" href="{{ route('jadwal.edit', ['jadwal' => $pg->id]) }}"><i class="fa fa-pencil m-r-5"></i> Edit</a>
                                                                <a class="dropdown-item" href="javascript:;" data-toggle="modal" onclick="deleteDataPagi('{{ $pg->id }}')" data-target="#delete_pg"><i class="fa fa-trash-o m-r-5"></i> Hapus</a>
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
                        <div id="delete_pg" class="modal fade delete-modal" role="dialog">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <form action="" id="deleteForm_pg" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <div class="modal-body text-center">
                                            <img src="{{ asset('assets/img/sent.png') }}" alt="" width="50" height="46">
                                            <h3>Apakah Anda yakin ingin menghapus jadwal ini?</h3>
                                            <div class="m-t-20">
                                                <button class="btn btn-white" data-dismiss="modal">Tidak</button>
                                                <button type="submit" class="btn btn-danger" onclick="formSubmitPagi()">Hapus</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane" id="siang">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="table-responsive">
                                        <table class="table table-border table-striped custom-table datatable mb-0">
                                            <thead>
                                                <tr>
                                                    <th>Nama Fisioterapis</th>
                                                    <th>Nama Pasien</th>
                                                    <th>No. Regis. Pasien</th>
                                                    <th>Umur Pasien</th>
                                                    <th>Tanggal Tindakan</th>
                                                    <th>Jam Tindakan</th>
                                                    <th class="text-right">Opsi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($jadwal_sg as $sg)
                                                <tr>
                                                    <td>{{ $sg->users->name }}</td>
                                                    <td><a href="{{ route('rekam-medis.index', $sg->pasien->id) }}">{{ $sg->pasien->nama }}</a></td>
                                                    <td>{{ sprintf('%04d', $sg->pasien->id) }}</td>
                                                    <td>{{ $today->diff(new DateTime($sg->pasien->tgl_lahir))->y }} tahun</td>
                                                    <td>{{ $sg->tgl_tindakan }}</td>
                                                    <td>{{ $sg->jam_tindakan }}</td>
                                                    <td class="text-right">
                                                        <div class="dropdown dropdown-action">
                                                            <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
                                                            <div class="dropdown-menu dropdown-menu-right">
                                                                <a class="dropdown-item" href="{{ route('jadwal.edit', ['jadwal' => $sg->id]) }}"><i class="fa fa-pencil m-r-5"></i> Edit</a>
                                                                <a class="dropdown-item" href="javascript:;" data-toggle="modal" onclick="deleteDataSiang('{{ $sg->id }}')" data-target="#delete_sg"><i class="fa fa-trash-o m-r-5"></i> Hapus</a>
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
                        <div id="delete_sg" class="modal fade delete-modal" role="dialog">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <form action="" id="deleteForm_sg" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <div class="modal-body text-center">
                                            <img src="{{ asset('assets/img/sent.png') }}" alt="" width="50" height="46">
                                            <h3>Apakah Anda yakin ingin menghapus jadwal ini?</h3>
                                            <div class="m-t-20">
                                                <button class="btn btn-white" data-dismiss="modal">Tidak</button>
                                                <button type="submit" class="btn btn-danger" onclick="formSubmitSiang()">Hapus</button>
                                            </div>
                                        </div>
                                    </form>
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

    <script>
        $(document).ready(function() {
            $('a[data-toggle="tab"]').on('show.bs.tab', function(e) {
                localStorage.setItem('activeTab', $(e.target).attr('href'));
            });
            var activeTab = localStorage.getItem('activeTab');
            if (activeTab) {
                $('#myTab a[href="' + activeTab + '"]').tab('show');
            }
        });
    </script>
    <script>
        $(function() {
            $('#datetimepicker3').datetimepicker({
                format: 'LT'
            });
            $('#datetimepicker4').datetimepicker({
                format: 'LT'
            });
        });
    </script>
    <!-- Script modal konfirmasi hapus jadwal pagi -->
    <script type="text/javascript">
        function deleteDataPagi(id) {
            var id = id;
            var url = '{{ route("jadwal.destroy", ":id") }}';
            url = url.replace(':id', id);
            $("#deleteForm_pg").attr('action', url);
        }

        function formSubmitPagi() {
            $("#deleteForm_pg").submit();
        }
    </script>
    <!-- Script modal konfirmasi hapus jadwal siang -->
    <script type="text/javascript">
        function deleteDataSiang(id) {
            var id = id;
            var url = '{{ route("jadwal.destroy", ":id") }}';
            url = url.replace(':id', id);
            $("#deleteForm_sg").attr('action', url);
        }

        function formSubmitSiang() {
            $("#deleteForm_sg").submit();
        }
    </script>
</body>


<!-- appointments23:20-->

</html>