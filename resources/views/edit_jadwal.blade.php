<!DOCTYPE html>
<html lang="en">


<!-- edit-patient24:07-->

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
                    <div class="col-lg-8 offset-lg-2">
                        <h4 class="page-title">Edit Jadwal a.n. {{ $jadwal->pasien->nama }}</h4>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-8 offset-lg-2">
                        <form action="{{ route('jadwal.update', $jadwal->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Nama Pasien <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" list="pasien_list" name="nama_pasien" id="nama_pasien" value="{{ $jadwal->pasien->nama }}" required autocomplete="off">
                                        <datalist id="pasien_list">
                                            @foreach($pasien as $p)
                                            <option value="{{ $p->id }}">{{ $p->nama }}</option>
                                            @endforeach
                                        </datalist>
                                        <input type="hidden" name="pasien_id" id="nama_pasien-hidden" value="{{ $jadwal->pasien->id }}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Nama Terapis <span class="text-danger">*</span></label>
                                        <select class="select" name="nama_terapis" required autocomplete="off">
                                            @foreach($users as $user)
                                            <option value="{{ $user->id }}" @if($user->id == $jadwal->users_id) selected @endif>{{ $user->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Tanggal Tindakan <span class="text-danger">*</span></label>
                                        <div class="cal-icon">
                                            <input type="text" name="tgl_tindakan" class="form-control datetimepicker" value="{{ $jadwal->tgl_tindakan }}" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Jam Tindakan <span class="text-danger">*</span></label>
                                        <div class="time-icon">
                                            <input type="text" name="jam_tindakan" class="form-control" id="datetimepicker3" value="{{ $jadwal->jam_tindakan }}" required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Shift <span class="text-danger">*</span></label>
                                        <select class="select" name="shift" required autocomplete="off">
                                            <option @if ($jadwal->shift == '1') selected @endif value='1'>Pagi</option>
                                            <option @if ($jadwal->shift == '2') selected @endif value='2'>Siang</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="m-t-20 text-center">
                                <button class="btn btn-primary submit-btn">Simpan Perubahan Jadwal</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- FOOTER -->
    @include('_part.footer')

    <!-- UI input jam -->
    <script>
        $(function() {
            $('#datetimepicker3').datetimepicker({
                format: 'HH:mm',
                icons: {
                    time: "fa fa-clock-o",
                    date: "fa fa-calendar",
                    up: "fa fa-arrow-up",
                    down: "fa fa-arrow-down",
                    previous: "fa fa-chevron-left",
                    next: "fa fa-chevron-right",
                    today: "fa fa-clock-o",
                    clear: "fa fa-trash-o"
                },
                stepping: 5
            });
        });
    </script>

    <!-- autocomplete pasien -->
    <script>
        document.querySelector('#nama_pasien').addEventListener('input', function(e) {
            var input = e.target,
                list = input.getAttribute('list'),
                options = document.querySelectorAll('#' + list + ' option[value="' + input.value + '"]'),
                hiddenInput = document.getElementById(input.getAttribute('id') + '-hidden');

            if (options.length > 0) {
                hiddenInput.value = input.value;
                input.value = options[0].innerText;
            }
        });
    </script>
</body>


<!-- edit-patient24:07-->

</html>