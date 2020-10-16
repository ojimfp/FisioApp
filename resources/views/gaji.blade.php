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
                    <div class="col-sm-4 col-5">
                        <h4 class="page-title">Gaji Karyawan {{ $dokter->nama_dokter }}</h4>
                    </div>
                    <div class="col-sm-8 col-7 text-right m-b-30">
                        <a href="{{ route('gaji.create', $dokter->id) }}" class="btn btn-primary btn-rounded float-right"><i class="fa fa-plus"></i> Masukkan Gaji</a>
                    </div>
                </div>
                <div class="row filter-row">
                    <div class="col-sm-6 col-md-3 col-lg-3 col-xl-2 col-12">
                        <div class="form-group form-focus">
                            <label class="focus-label">Nama Karyawan</label>
                            <input type="text" class="form-control floating">
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-3 col-lg-3 col-xl-2 col-12">
                        <div class="form-group form-focus select-focus">
                            <label class="focus-label">Peran</label>
                            <select class="select floating">
                                <option> -- Select -- </option>
                                <option>Admin</option>
                                <option>Fisioterapis</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-3 col-lg-3 col-xl-2 col-12">
                        <div class="form-group form-focus select-focus">
                            <label class="focus-label">Leave Status</label>
                            <select class="select floating">
                                <option> -- Select -- </option>
                                <option> Pending </option>
                                <option> Approved </option>
                                <option> Rejected </option>
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-3 col-lg-3 col-xl-2 col-12">
                        <div class="form-group form-focus">
                            <label class="focus-label">Dari</label>
                            <div class="cal-icon">
                                <input class="form-control floating datetimepicker" type="text">
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-3 col-lg-3 col-xl-2 col-12">
                        <div class="form-group form-focus">
                            <label class="focus-label">Sampai</label>
                            <div class="cal-icon">
                                <input class="form-control floating datetimepicker" type="text">
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-3 col-lg-3 col-xl-2 col-12">
                        <a href="#" class="btn btn-success btn-block"> Cari </a>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="table-responsive">
                            <table class="table table-striped custom-table datatable">
                                <thead>
                                    <tr>
                                        <th style="width:25%;">Employee</th>
                                        <th>Employee ID</th>
                                        <th>Email</th>
                                        <th>Joining Date</th>
                                        <th>Role</th>
                                        <th>Salary</th>
                                        <th>Payslip</th>
                                        <th class="text-right">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
											<img class="rounded-circle" src="assets/img/user.jpg" height="28" width="28" alt=""> John Doe
                                        </td>
                                        <td>FT-0001</td>
                                        <td>johndoe@example.com</td>
                                        <td>1 Jan 2013</td>
                                        <td>
                                            <div class="dropdown">
                                                <a href="#" class="custom-badge status-grey dropdown-toggle" data-toggle="dropdown" aria-expanded="false">Nurse</a>
                                                <div class="dropdown-menu">
                                                    <a class="dropdown-item" href="#">Laboratorist</a>
                                                    <a class="dropdown-item" href="#">Pharmacist</a>
                                                    <a class="dropdown-item" href="#">Accountant</a>
                                                    <a class="dropdown-item" href="#">Receptionist</a>
                                                </div>
                                            </div>
                                        </td>
                                        <td>$59698</td>
                                        <td><a class="btn btn-sm btn-primary" href="salary-view.html">Generate Slip</a></td>
                                        <td class="text-right">
                                            <div class="dropdown dropdown-action">
                                                <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
                                                <div class="dropdown-menu dropdown-menu-right">
                                                    <a class="dropdown-item" href="edit-salary.html"><i class="fa fa-pencil m-r-5"></i> Edit</a>
                                                    <a class="dropdown-item" href="#" data-toggle="modal" data-target="#delete_salary"><i class="fa fa-trash-o m-r-5"></i> Delete</a>
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
