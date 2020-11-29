<!DOCTYPE html>
<html lang="en">


<!-- add-appointment24:07-->

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
                    <div class="col-lg-8 offset-lg-2">
                        <h4 class="page-title">Tambah Jadwal</h4>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-8 offset-lg-2">
                        <form action="{{ route('jadwal.store') }}" method="POST">
                            @csrf
                            <div class="row">
                                <!-- <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Appointment ID <span class="text-danger">*</span></label>
                                        <input class="form-control" type="text" value="APT-0001" readonly="">
                                    </div>
                                </div> -->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Nama Pasien <span class="text-danger">*</span></label>
                                        <select class="select nama-pasien" name="pasien_id" required autocomplete="off">
                                            <option>Select</option>
                                            @foreach($pasien as $p)
                                            <option value="{{ $p->id }}">{{ $p->nama }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Nama Fisioterapis <span class="text-danger">*</span></label>
                                        <select class="select" name="users_id" required autocomplete="off">
                                            <option>Select</option>
                                            @foreach($users as $user)
                                            <option value="{{ $user->id }}">{{ $user->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                {{-- <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>No. HP Pasien <span class="text-danger">*</span></label>
                                        <input class="form-control" type="text" name="no_hp" onkeypress="return event.charCode >= 48 && event.charCode <= 57" required autocomplete="off">
                                    </div>
                                </div> --}}
                                {{-- <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Umur Pasien <span class="text-danger">*</span></label>
                                        <input class="form-control" type="text" name="umur_pasien" maxlength="2" onkeypress="return event.charCode >= 48 && event.charCode <= 57" required autocomplete="off">
                                    </div>
                                </div> --}}

                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Tanggal Tindakan <span class="text-danger">*</span></label>
                                        <div class="cal-icon">
                                            <input type="text" name="tgl_tindakan" class="form-control datetimepicker">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Jam Tindakan <span class="text-danger">*</span></label>
                                        <div class="time-icon">
                                            <input type="text" name="jam_tindakan" class="form-control" id="datetimepicker3">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Shift<span class="text-danger">*</span></label>
                                        <select class="select" name="shift" required autocomplete="off">
                                            <option value="1">Pagi</option>
                                            <option value="2">Siang</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="display-block">Status Jadwal<span class="text-danger">*</span></label>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="status" id="product_active" value="Active" checked>
                                            <label class="form-check-label" for="product_active">
                                                Active
                                            </label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="status" id="product_inactive" value="Inactive">
                                            <label class="form-check-label" for="product_inactive">
                                                Inactive
                                            </label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="status" id="product_lainnya" value="Lainnya">
                                            <label class="form-check-label" for="product_lainnya">
                                                Lainnya
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row" hidden>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="nama_admin" value="{{ Auth::user()->name }}">
                                    </div>
                                </div>
                            </div>
                            <div class="m-t-20 text-center">
                                <button class="btn btn-primary submit-btn">Simpan Jadwal</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- FOOTER -->
    @include('_part.footer')

    <script src="{{ asset('assets/js/additional/jadwal.js') }}"></script>
    <script>
        // $('.datetimepicker').datetimepicker({
        //     format: 'DD/MM/YYYY',
        //     showTodayButton: true,
        //     showClear: true,
        //     toolbarPlacement: 'bottom',
        //     sideBySide: true,
        //     icons: {
        //         time: "fa fa-clock-o",
        //         date: "fa fa-calendar",
        //         up: "fa fa-arrow-up",
        //         down: "fa fa-arrow-down",
        //         previous: "fa fa-chevron-left",
        //         next: "fa fa-chevron-right",
        //         today: "fa fa-clock-o",
        //         clear: "fa fa-trash-o"
        //     }
        // });
        $(function() {
            $('#datetimepicker3').datetimepicker({
                format: 'LT'

            });
        });
    </script>
</body>


<!-- add-appointment24:07-->

</html>