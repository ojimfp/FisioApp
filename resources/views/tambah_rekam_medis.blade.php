<!DOCTYPE html>
<html lang="en">


<!-- add-patient24:06-->

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/img/favicon.ico') }}">
    <title>FisioApp - Tambah Rekam Medis</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/font-awesome.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/select2.min.css') }}">
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
                <a href="{{ route('pasien.index') }}" class="logo">
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
                            <a href="{{ route('pasien.index') }}"><i class="fa fa-wheelchair"></i> <span>List Pasien</span></a>
                        </li>
                        <li>
                            <a href="{{ route('jadwal.index') }}"><i class="fa fa-calendar"></i> <span>Jadwal Janji Pasien</span></a>
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
                    <div class="col-lg-8 offset-lg-2">
                        <h4 class="page-title">Tambah Rekam Medis a.n. (nama pasien)</h4>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-8 offset-lg-2">
                        <form action="#" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label>Anamnesa <span class="text-danger">*</span></label></br>
                                        <textarea name="anamnesa" id="" cols="88" rows="4"></textarea>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label>Pemeriksaan <span class="text-danger">*</span></label></br>
                                        <textarea name="anamnesa" id="" cols="88" rows="4"></textarea>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label>Diagnosa <span class="text-danger">*</span></label></br>
                                        <textarea name="anamnesa" id="" cols="88" rows="4"></textarea>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <label for="checkbox">Tindakan</label>
                                    <div class="checkbox">
                                        <input type="checkbox" name="tindakan" value="">
                                        <label>Pijet</label>
                                        <input type="checkbox" name="tindakan" value="">
                                        <label>Pijet</label>
                                        <input type="checkbox" name="tindakan" value="">
                                        <label>Pijet</label>
                                    </div>
                                </div>
                            </div>
                            <div class="m-t-20 text-center">
                                <button class="btn btn-primary submit-btn">Tambah Rekam Medis</button>
                            </div>
                        </form>
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
    <script src="{{ asset('assets/js/moment.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap-datetimepicker.min.js') }}"></script>
    <script src="{{ asset('assets/js/app.js') }}"></script>

</body>

<!-- add-patient24:07-->

</html>