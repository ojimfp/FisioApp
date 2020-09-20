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
                        <h4 class="page-title">Edit Pasien</h4>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-8 offset-lg-2">
                        @foreach($pasien as $p)
                        <form action="{{ route('pasien.update', ['pasien' => $p->id]) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <input class="form-control" type="hidden" name="id" value="{{ $p->id }}">
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label>Nama Lengkap <span class="text-danger">*</span></label>
                                        <input class="form-control" type="text" name="nama" value="{{ $p->nama }}" required>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label>Alamat</label>
                                                <input type="text" class="form-control" name="alamat" value="{{ $p->alamat }}">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Tanggal Lahir</label>
                                        <div class="cal-icon">
                                            <input type="date" class="form-control" name="tgl_lahir" value="{{ $p->tgl_lahir }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>No. Telepon/HP</label>
                                        <input class="form-control" type="text" name="no_telp" value="{{ $p->no_telp }}">
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
