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
                    <div class="col-sm-4 col-3">
                        <h4 class="page-title">List Karyawan</h4>
                    </div>
                </div>
                <div class="row filter-row">
                    <form action="{{ route('karyawan.search') }}" method="GET">
                        <div class="col-sm-6 col-md-3 col-lg-3 col-xl-12 col-12">
                            <div class="form-group form-focus">
                                <label class="focus-label">Cari karyawan</label>
                                <input type="text" class="form-control floating" name="keyword" autocomplete="off">
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
                                        <th>Nama</th>
                                        <th>ID Karyawan</th>
                                        <th>Email</th>
                                        <th>No. Telepon/HP</th>
                                        <th>Pekerjaan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($users as $user)
                                    <tr>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ sprintf('%04d', $user->id) }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>{{ $user->no_hp }}</td>
                                        <td>{{ $user->pekerjaan }}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- FOOTER -->
    @include('_part.footer')
</body>


<!-- patients23:19-->

</html>