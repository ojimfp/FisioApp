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
                                        <label>Nama Pasien<span class="text-danger">*</span></label>
                                        <input class="form-control" type="text" name="nama" required value="{{ $jadwal->pasien->nama }}" readonly>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Nama Terapis<span class="text-danger">*</span></label>
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
                                        <label>Tanggal Tindakan<span class="text-danger">*</span></label>
                                        <div class="cal-icon">
                                            <input type="text" name="tgl_tindakan" class="form-control datetimepicker" value="{{ $jadwal->tgl_tindakan }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Jam Tindakan<span class="text-danger">*</span></label>
                                        <div class="time-icon">
                                            <input type="text" name="jam_tindakan" class="form-control" id="datetimepicker3" name="jam_tindakan" value="{{ $jadwal->jam_tindakan }}">
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
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="display-block">Status Jadwal <span class="text-danger">*</span></label>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="status" id="product_active" value="Active" @if ($jadwal->status == 'Active') checked @endif>
                                            <label class="form-check-label" for="product_active">
                                                Active
                                            </label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="status" id="product_inactive" value="Inactive" @if ($jadwal->status == 'Inactive') checked @endif>
                                            <label class="form-check-label" for="product_inactive">
                                                Inactive
                                            </label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="status" id="product_lainnya" value="Lainnya" @if ($jadwal->status == 'Lainnya') checked @endif>
                                            <label class="form-check-label" for="product_lainnya">
                                                Lainnya
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <!-- <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Keterangan Status<span class="text-danger">*</span></label>
                                        <input class="form-control" type="text" name="ket_status" required value="">
                                    </div>
                                </div> -->
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
</body>


<!-- edit-patient24:07-->

</html>