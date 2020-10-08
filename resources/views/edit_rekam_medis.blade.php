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
                        <h4 class="page-title">Edit Rekam Medis a.n. {{ $rekam_medis->pasien->nama }}</h4>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-8 offset-lg-2">
                        <form action="{{ route('rekam-medis.update', $rekam_medis->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label>Nama Terapis<span class="text-danger">*</span></label>
                                        <select class="select" name="nama_dokter" required autocomplete="off">
                                            @foreach($dokter as $d)
                                            <option value="{{ $d->id }}" @if($d->id == $rekam_medis->dokter_id) selected @endif>{{ $d->nama_dokter }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label>Anamnesa <span class="text-danger">*</span></label></br>
                                        <textarea class="form-control" name="anamnesa" id="" cols="88" rows="4">{{ $rekam_medis->anamnesa }}</textarea>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label>Pemeriksaan <span class="text-danger">*</span></label></br>
                                        <textarea class="form-control" name="pemeriksaan" id="" cols="88" rows="4">{{ $rekam_medis->pemeriksaan }}</textarea>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label>Diagnosa <span class="text-danger">*</span></label></br>
                                        <textarea class="form-control" name="diagnosa" id="" cols="88" rows="4">{{ $rekam_medis->diagnosa }}</textarea>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Tindakan</label>
                                        @foreach($tindakan as $t)
                                        <div class="checkbox">
                                            <input type="checkbox" name="tindakan[]" value="{{ $t->id }}" @if($rekam_medis->tindakan->pluck('id')->contains($t->id)) checked @endif>
                                            <label>{{ $t->nama_tindakan }}</label>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            <div class="m-t-20 text-center">
                                <button class="btn btn-primary submit-btn">Simpan</button>
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