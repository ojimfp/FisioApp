<!DOCTYPE html>
<html lang="en">


<!-- add-patient24:06-->

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
                        <h4 class="page-title">Tambah Tindakan</h4>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-8 offset-lg-2">
                        <form action="{{ route('tindakan.store') }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label>Kode Tindakan <span class="text-danger">*</span></label>
                                        <input class="form-control" type="text" name="kode_tindakan" required autocomplete="off" placeholder="Contoh : US 10x">
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label>Nama Tindakan</label>
                                                <input type="text" class="form-control" name="nama_tindakan" autocomplete="off" placeholder="Harap diawal dengan huruf kapital">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Harga Jual</label>
                                        <input type="form_control" class="form-control" name="harga_jual" autocomplete="off" onkeypress="return event.charCode >= 48 && event.charCode <=57">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Komisi Tindakan</label>
                                        <input class="form-control" type="text" name="komisi_tindakan" autocomplete="off" onkeypress="return event.charCode >= 48 && event.charCode <=57">
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label>Keterangan</label>
                                        <input class="form-control" type="text" name="keterangan" autocomplete="off">
                                    </div>
                                </div>
                            </div>
                            <div class="m-t-20 text-center">
                                <button class="btn btn-primary submit-btn">Tambah Tindakan</button>
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

<!-- add-patient24:07-->

</html>