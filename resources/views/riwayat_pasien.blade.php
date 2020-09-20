<!DOCTYPE html>
<html lang="en">


<!-- profile22:59-->

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/img/favicon.ico') }}">
    <title>FisioApp - Riwayat Pasien</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/font-awesome.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/select2.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/bootstrap-datetimepicker.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/style.css') }}">
    <!--[if lt IE 9]>
		<script src="assets/js/html5shiv.min.js"></script>
		<script src="assets/js/respond.min.js"></script>
	<![endif]-->
</head>

<body>
    <div class="main-wrapper">
        <div class="header">
            <div class="header-left">
                <a href="index-2.html" class="logo">
                    <img src="{{ asset('assets/img/logo.png') }}" width="35" height="35" alt=""> <span>FisioApp</span>
                </a>
            </div>
            <a id="toggle_btn" href="javascript:void(0);"><i class="fa fa-bars"></i></a>
            <a id="mobile_btn" class="mobile_btn float-left" href="#sidebar"><i class="fa fa-bars"></i></a>
            <ul class="nav user-menu float-right">
                <li class="nav-item dropdown has-arrow">
                    <a href="#" class="dropdown-toggle nav-link user-link" data-toggle="dropdown">
                        <span class="user-img"><img class="rounded-circle" src="{{ asset('assets/img/user.jpg') }}" width="40" alt="Admin">
                            <span class="status online"></span></span>
                        <span>{{ Auth::user()->name }}</span>
                    </a>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="{{ route('user.password') }}">Ganti Password</a>
                        @can('manage-users')
                        <a class="dropdown-item" href="{{ route('user.index') }}">User Management</a>
                        @endcan
                        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                            Logout
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div>
                </li>
            </ul>
            <div class="dropdown mobile-user-menu float-right">
                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
                <div class="dropdown-menu dropdown-menu-right">
                    <a class="dropdown-item" href="profile.html">My Profile</a>
                    <a class="dropdown-item" href="edit-profile.html">Edit Profile</a>
                    <a class="dropdown-item" href="settings.html">Settings</a>
                    <a class="dropdown-item" href="login.html">Logout</a>
                </div>
            </div>
        </div>
        <div class="sidebar" id="sidebar">
            <div class="sidebar-inner slimscroll">
                <div id="sidebar-menu" class="sidebar-menu">
                    <ul>
                        <li class="menu-title">Menu</li>
                        <li>
                        <li class="active">
                            <a href="/pasien"><i class="fa fa-wheelchair"></i> <span>List Pasien</span></a>
                        </li>
                        <li>
                            <a href="jadwal"><i class="fa fa-calendar"></i> <span>Jadwal Janji Pasien</span></a>
                        </li>
                        <li class="submenu">
                            <a href="#"><i class="fa fa-money"></i> <span> Kasir </span> <span class="menu-arrow"></span></a>
                            <ul style="display: none;">
                                <li><a href="invoices.html">Invoices</a></li>
                                <li><a href="payments.html">Payments</a></li>
                                <li><a href="expenses.html">Expenses</a></li>
                                <li><a href="taxes.html">Taxes</a></li>
                                <li><a href="provident-fund.html">Provident Fund</a></li>
                            </ul>
                        </li>
                        <li class="submenu">
                            <a href="#"><i class="fa fa-book"></i> <span> Daftar Gaji </span> <span class="menu-arrow"></span></a>
                            <ul style="display: none;">
                                <li><a href="salary.html"> Employee Salary </a></li>
                                <li><a href="salary-view.html"> Payslip </a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="page-wrapper">
            <div class="content">
                <div class="row">
                    <div class="col-sm-4 col-3">
                        <h4 class="page-title">Riwayat Pasien</h4>
                    </div>
                    <div class="col-sm-8 col-9 text-right m-b-20">
                        <a href="{{ route('rekam-medis.create', $pasien->id) }}" class="btn btn btn-primary btn-rounded float-right"><i class="fa fa-plus"></i> Tambah Rekam Medis</a>
                    </div>
                </div>
                <div class="card-box profile-header">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="profile-view">
                                <div>
                                    <div class="row">
                                        <div class="col-md-7">
                                            <ul class="personal-info">
                                                <h3 class="user-name m-t-0 mb-0">{{ $pasien->nama }}</h3></br>
                                                <li>
                                                    <span class="title">No. Registrasi:</span>
                                                    <span class="text">{{ sprintf('%04d', $pasien->id) }}</a></span>
                                                </li>
                                                <li>
                                                    <span class="title">Alamat:</span>
                                                    <span class="text">{{ $pasien->alamat }}</span>
                                                </li>
                                                <li>
                                                    <span class="title">No. Telepon:</span>
                                                    <span class="text">{{ $pasien->no_telp }}</span>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="profile-tabs">
                    <ul class="nav nav-tabs nav-tabs-bottom">
                        <li class="nav-item"><a class="nav-link active" href="#rekam-medis" data-toggle="tab">Rekam Medis</a></li>
                        <li class="nav-item"><a class="nav-link" href="#rekam-kasir" data-toggle="tab">Riwayat Pembayaran</a></li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane show active" id="rekam-medis">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="table-responsive">
                                        <table class="table table-border table-striped custom-table datatable mb-0">
                                            <thead>
                                                <tr>
                                                    <th>Tanggal Terapi</th>
                                                    <th>Nama Terapis</th>
                                                    <th>Anamnesa</th>
                                                    <th>Pemeriksaan</th>
                                                    <th>Diagnosa</th>
                                                    <th>Tindakan</th>
                                                    <th class="text-right">Opsi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($rekam_medis as $rm)
                                                <tr>
                                                    <td>{{ $rm->created_at->format('d/m/Y H:i:s') }}</td>
                                                    <td>{{ $rm->dokter_id }}</td>
                                                    <td>{{ $rm->anamnesa }}</td>
                                                    <td>{{ $rm->pemeriksaan }}</td>
                                                    <td>{{ $rm->diagnosa }}</td>
                                                    <td>{{ implode(', ', $rm->tindakan()->get()->pluck('nama_tindakan')->toArray()) }}</td>
                                                    <td class="text-right">
                                                        <div class="dropdown dropdown-action">
                                                            <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
                                                            <div class="dropdown-menu dropdown-menu-right">
                                                                <a class="dropdown-item" href="{{ route('pembayaran.create') }}"><i class="fa fa-pencil m-r-5"></i> Tambah Pembayaran</a>
                                                                <a class="dropdown-item" href="{{ route('rekam-medis.edit', $rm->id) }}"><i class="fa fa-pencil m-r-5"></i> Edit</a>
                                                                <a class="dropdown-item" href="javascript:;" data-toggle="modal" onclick="deleteData('{{ $rm->id }}')" data-target="#delete_rm"><i class="fa fa-trash-o m-r-5"></i> Hapus</a>
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
                        <div id="delete_rm" class="modal fade delete-modal" role="dialog">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <form action="" id="deleteForm" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <div class="modal-body text-center">
                                            <img src="{{ asset('assets/img/sent.png') }}" alt="" width="50" height="46">
                                            <h3>Apakah Anda yakin ingin menghapus rekam medis ini?</h3>
                                            <div class="m-t-20">
                                                <button class="btn btn-white" data-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-danger" onclick="formSubmit()">Delete</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane" id="rekam-kasir">
                            <div class="tab-content">
                                <div class="tab-pane show active" id="rekam-medis">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="table-responsive">
                                                <table class="table table-border table-striped custom-table datatable mb-0">
                                                    <thead>
                                                        <tr>
                                                            <th>#</th>
                                                            <th>No. Tagihan</th>
                                                            <th>Nama Pasien</th>
                                                            <th>Tanggal Tagihan</th>
                                                            <th>Tanggal Pembayaran</th>
                                                            <th>Tipe Pembayaran </th>
                                                            <th>Total Biaya</th>
                                                            <th>Status</th>
                                                            <th class="text-right">Opsi</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td>1</td>
                                                            <td><a href="invoice-view.html">#INV-0001</a></td>
                                                            <td>Charles Ortega</td>
                                                            <td>1 Aug 2018</td>
                                                            <td>7 Aug 2018</td>
                                                            <td>Tunai</td>
                                                            <td>$20</td>
                                                            <td><span class="custom-badge status-green">Paid</span></td>
                                                            <td class="text-right">
                                                                <div class="dropdown dropdown-action">
                                                                    <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
                                                                    <div class="dropdown-menu dropdown-menu-right">
                                                                        <a class="dropdown-item" href="edit-invoice.html"><i class="fa fa-pencil m-r-5"></i> Edit</a>
                                                                        <a class="dropdown-item" href="invoice-view.html"><i class="fa fa-eye m-r-5"></i> View</a>
                                                                        <a class="dropdown-item" href="#"><i class="fa fa-file-pdf-o m-r-5"></i> Download</a>
                                                                        <a class="dropdown-item" href="#" data-toggle="modal" data-target="#delete_invoice"><i class="fa fa-trash-o m-r-5"></i> Delete</a>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>2</td>
                                                            <td><a href="invoice-view.html">#INV-0002</a></td>
                                                            <td>Denise Stevens</td>
                                                            <td>24 Aug 2018</td>
                                                            <td>24 Aug 2018</td>
                                                            <td>Kartu</td>
                                                            <td>$6</td>
                                                            <td><span class="custom-badge status-blue">Sent</span></td>
                                                            <td class="text-right">
                                                                <div class="dropdown dropdown-action">
                                                                    <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
                                                                    <div class="dropdown-menu dropdown-menu-right">
                                                                        <a class="dropdown-item" href="edit-invoice.html"><i class="fa fa-pencil m-r-5"></i> Edit</a>
                                                                        <a class="dropdown-item" href="invoice-view.html"><i class="fa fa-eye m-r-5"></i> View</a>
                                                                        <a class="dropdown-item" href="#"><i class="fa fa-file-pdf-o m-r-5"></i> Download</a>
                                                                        <a class="dropdown-item" href="#" data-toggle="modal" data-target="#delete_invoice"><i class="fa fa-trash-o m-r-5"></i> Delete</a>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>3</td>
                                                            <td><a href="invoice-view.html">#INV-0003</a></td>
                                                            <td>Dennis Salazar</td>
                                                            <td>1 Sep 2018</td>
                                                            <td>7 Sep 2018</td>
                                                            <td>Tunai</td>
                                                            <td>$20</td>
                                                            <td><span class="custom-badge status-orange">Partially Paid</span></td>
                                                            <td class="text-right">
                                                                <div class="dropdown dropdown-action">
                                                                    <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
                                                                    <div class="dropdown-menu dropdown-menu-right">
                                                                        <a class="dropdown-item" href="edit-invoice.html"><i class="fa fa-pencil m-r-5"></i> Edit</a>
                                                                        <a class="dropdown-item" href="invoice-view.html"><i class="fa fa-eye m-r-5"></i> View</a>
                                                                        <a class="dropdown-item" href="#"><i class="fa fa-file-pdf-o m-r-5"></i> Download</a>
                                                                        <a class="dropdown-item" href="#"><i class="fa fa-trash-o m-r-5"></i> Delete</a>
                                                                        <a class="dropdown-item" href="#" data-toggle="modal" data-target="#delete_invoice"><i class="fa fa-trash-o m-r-5"></i> Delete</a>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="sidebar-overlay" data-reff=""></div>
    <script src="{{ asset('assets/js/jquery-3.2.1.min.js') }}"></script>
    <script src="{{ asset('assets/js/popper.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.slimscroll.js') }}"></script>
    <script src="{{ asset('assets/js/select2.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('assets/js/moment.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap-datetimepicker.min.js') }}"></script>
    <script src="{{ asset('assets/js/app.js') }}"></script>

    <!-- Script modal konfirmasi hapus rekam medis -->
    <script type="text/javascript">
        function deleteData(id) {
            var id = id;
            var url = '{{ route("rekam-medis.destroy", ":id") }}';
            url = url.replace(':id', id);
            $("#deleteForm").attr('action', url);
        }

        function formSubmit() {
            $("#deleteForm").submit();
        }
    </script>
</body>


<!-- profile23:03-->

</html>