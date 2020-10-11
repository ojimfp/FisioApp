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
                        <h4 class="page-title">Edit Fisioterapis</h4>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-8 offset-lg-2">
                        @foreach($dokter as $d)
                        <form action="{{ route('dokter.update', ['dokter' => $d->id]) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label>Nama Karyawan <span class="text-danger">*</span></label>
                                        <input class="form-control" type="text" name="nama_dokter" value="{{ $d->nama_dokter }}" required readonly>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label>No HP</label>
                                                <input type="text" class="form-control" name="hp" value="{{ $d->hp }}">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label>Gaji Pokok</label>
                                                <input type="text" class="form-control" name="gaji_pokok" value="{{ $d->gaji_pokok }}">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="m-t-20 text-center">
                                <button class="btn btn-primary submit-btn">Simpan</button>
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
