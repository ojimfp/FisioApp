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
                        <h4 class="page-title">Edit Jadwal</h4>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-8 offset-lg-2">
                        @foreach($jadwal as $j)
                        <form action="{{ route('jadwal.update', ['jadwal' => $j->id]) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <input class="form-control" type="hidden" name="id" value="{{ $j->id }}">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Nama Pasien<span class="text-danger">*</span></label>
                                        <input class="form-control" name="pasien_id" required value="{{ $j->pasien_id }}">
                                        <!-- <select class="select" name="pasien_id" required value>
                                            <option>Select</option>
                                            @foreach($jadwal as $j)
                                            <option>{{ $j->pasien_id }}</option>
                                            @endforeach
                                        </select> -->
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Umur Pasien<span class="text-danger">*</span></label>
                                        <input class="form-control" type="text" name="umur_pasien" required value="{{ $j->umur_pasien }}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Nama Dokter<span class="text-danger">*</span></label>
                                        <input class="form-control" name="dokter_id" required value="{{ $j->dokter_id }}">
                                        <!-- <select class="select" name="dokter_id" required autocomplete="off">
                                            <option>Select</option>
                                            @foreach($jadwal as $j)
                                            <option>{{ $j->dokter_id }}</option>
                                            @endforeach
                                        </select> -->
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Tanggal Tindakan<span class="text-danger">*</span></label>
                                        <div class="cal-icon">
                                            <input type="text" name="tgl_tindakan" class="form-control datetimepicker" value="{{ $j->tgl_tindakan }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Jam Tindakan<span class="text-danger">*</span></label>
                                        <div class="time-icon">
                                            <input type="text" name="jam_tindakan" class="form-control" id="datetimepicker3" name="jam_tindakan" value="{{ $j->jam_tindakan }}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Patient Email</label>
                                        <input class="form-control" type="email">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Patient Phone Number</label>
                                        <input class="form-control" type="text">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Message</label>
                                <textarea cols="30" rows="4" class="form-control"></textarea>
                            </div> -->
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="display-block">Status Jadwal<span class="text-danger">*</span></label>
                                        <input type="text" name="status" class="form-control" name="status" value="{{ $j->status }}">
                                        <!-- <div class="form-check form-check-inline">
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
                                    </div> -->
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
                                <button class="btn btn-primary submit-btn">Simpan Jadwal</button>
                            </div>
                        </form>
                        @endforeach
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
