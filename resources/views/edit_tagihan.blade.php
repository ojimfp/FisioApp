<!DOCTYPE html>
<html lang="en">


<!-- patients23:17-->

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/img/favicon.ico') }}">
    <title>FisioApp - List Pasien</title>
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
                            <a href="{{ route('dokter.index') }}"><i class="fa fa fa-user-md"></i> <span>List Dokter</span></a>
                        </li>
                        <li>
                            <a href="{{ route('jadwal.index') }}"><i class="fa fa-calendar"></i> <span>Jadwal Janji Pasien</span></a>
                        </li>
                        <li class="submenu">
                            <a href="#"><i class="fa fa-money"></i> <span> Kasir </span> <span class="menu-arrow"></span></a>
                            <ul style="display: none;">
                                <li><a href="{{ route('tindakan.index') }}">Tindakan</a></li>
                                <li><a href="{{ route('kasir.index') }}">Riwayat Pembayaran</a></li>
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
                <div class="col-sm-12">
                        <h4 class="page-title">Ubah Pembayaran</h4>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <form>
                            <div class="row">
                                <div class="col-sm-6 col-md-3">
                                    <div class="form-group">
                                        <label>Nama Pasien <span class="text-danger">*</span></label>
                                        <input class="form-control" value="charlesortega" readonly>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-md-3">
                                    <div class="form-group">
                                        <label>Department <span class="text-danger">*</span></label>
                                        <select class="select">
                                            <option>Select Department</option>
                                            <option selected>Dentists</option>
                                            <option>Neurology</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-md-3">
                                    <div class="form-group">
                                        <label>Email</label>
                                        <input class="form-control" type="email" value="charlesortega@example.com">
                                    </div>
                                </div>
                                <div class="col-sm-6 col-md-3">
                                    <div class="form-group">
                                        <label>Tax</label>
                                        <select class="select">
                                            <option>Select Tax</option>
                                            <option>VAT</option>
                                            <option selected>GST</option>
                                            <option>No Tax</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-md-3">
                                    <div class="form-group">
                                        <label>Client Address</label>
                                        <textarea class="form-control" rows="3">5754 Airport Rd, Coosada, AL, 36020</textarea>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-md-3">
                                    <div class="form-group">
                                        <label>Billing Address</label>
                                        <textarea class="form-control" rows="3">5754 Airport Rd, Coosada, AL, 36020</textarea>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-md-3">
                                    <div class="form-group">
                                        <label>Invoice date <span class="text-danger">*</span></label>
                                        <div class="cal-icon">
                                            <input class="form-control datetimepicker" type="text" value="01/08/2018">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-md-3">
                                    <div class="form-group">
                                        <label>Due Date <span class="text-danger">*</span></label>
                                        <div class="cal-icon">
                                            <input class="form-control datetimepicker" type="text" value="07/08/2018">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 col-sm-12">
                                    <div class="table-responsive">
                                        <table class="table table-hover table-white">
                                            <thead>
                                                <tr>
                                                    <th style="width: 20px">#</th>
                                                    <th class="col-sm-2">Item</th>
                                                    <th class="col-md-6">Description</th>
                                                    <th style="width:100px;">Unit Cost</th>
                                                    <th style="width:80px;">Qty</th>
                                                    <th>Amount</th>
                                                    <th></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>1</td>
                                                    <td>
                                                        <input class="form-control" type="text" value="Full body checkup" style="min-width:150px">
                                                    </td>
                                                    <td>
                                                        <input class="form-control" type="text" value="Lorem ipsum dolor sit amet, consectetur adipiscing elit" style="min-width:150px">
                                                    </td>
                                                    <td>
                                                        <input class="form-control" style="width:100px" type="text" value="150">
                                                    </td>
                                                    <td>
                                                        <input class="form-control" style="width:80px" type="text" value="1">
                                                    </td>
                                                    <td>
                                                        <input class="form-control form-amt" readonly="" style="width:120px" type="text" value="150">
                                                    </td>
                                                    <td><a href="javascript:void(0)" class="text-success font-18" title="Add"><i class="fa fa-plus"></i></a></td>
                                                </tr>
                                                <tr>
                                                    <td>2</td>
                                                    <td>
                                                        <input class="form-control" type="text" value="Blood Test" style="min-width:150px">
                                                    </td>
                                                    <td>
                                                        <input class="form-control" type="text" value="Lorem ipsum dolor sit amet, consectetur adipiscing elit" style="min-width:150px">
                                                    </td>
                                                    <td>
                                                        <input class="form-control" style="width:100px" type="text" value="12">
                                                    </td>
                                                    <td>
                                                        <input class="form-control" style="width:80px" type="text" value="1">
                                                    </td>
                                                    <td>
                                                        <input class="form-control form-amt" readonly="" style="width:120px" type="text" value="12">
                                                    </td>
                                                    <td><a href="javascript:void(0)" class="text-danger font-18" title="Remove"><i class="fa fa-trash-o"></i></a></td>
                                                </tr>
												<tr>
                                                    <td>3</td>
                                                    <td>
                                                        <input class="form-control" type="text" value="General checkup" style="min-width:150px">
                                                    </td>
                                                    <td>
                                                        <input class="form-control" type="text" value="Lorem ipsum dolor sit amet, consectetur adipiscing elit" style="min-width:150px">
                                                    </td>
                                                    <td>
                                                        <input class="form-control" style="width:100px" type="text" value="100">
                                                    </td>
                                                    <td>
                                                        <input class="form-control" style="width:80px" type="text" value="1">
                                                    </td>
                                                    <td>
                                                        <input class="form-control form-amt" readonly="" style="width:120px" type="text" value="100">
                                                    </td>
                                                    <td><a href="javascript:void(0)" class="text-danger font-18" title="Remove"><i class="fa fa-trash-o"></i></a></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="table-responsive">
                                        <table class="table table-hover table-white">
                                            <tbody>
                                                <tr>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td class="text-right">Total</td>
                                                    <td style="text-align: right; width: 230px">262</td>
                                                </tr>
                                                <tr>
                                                    <td colspan="5" style="text-align: right">Tax</td>
                                                    <td style="text-align: right;width: 230px">
                                                        <input class="form-control text-right form-amt" value="0" readonly="" type="text">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td colspan="5" style="text-align: right">
                                                        Discount %
                                                    </td>
                                                    <td style="text-align: right; width: 230px">
                                                        <input class="form-control text-right" value="26.2" type="text">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td colspan="5" style="text-align: right; font-weight: bold">
                                                        Grand Total
                                                    </td>
                                                    <td style="text-align: right; font-weight: bold; font-size: 16px;width: 230px">
                                                        $ 288.2
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Other Information</label>
                                                <textarea class="form-control" rows="4"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="text-center m-t-20">
                                <button class="btn btn-primary submit-btn">Save Invoice</button>
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
    <script src="{{ asset('assets/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('assets/js/moment.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap-datetimepicker.min.js') }}"></script>
    <script src="{{ asset('assets/js/app.js') }}"></script>

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
</body>


<!-- patients23:19-->

</html>