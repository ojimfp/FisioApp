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
                        <h4 class="page-title">Edit Tindakan</h4>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-8 offset-lg-2">
                        @foreach($tindakan as $t)
                        <form action="{{ route('tindakan.update', ['tindakan' => $t->id]) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label>Kode Tindakan <span class="text-danger">*</span></label>
                                    <input class="form-control" type="text" name="kode_tindakan" required autocomplete="off" value="{{ $t->kode_tindakan}}">
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label>Nama Tindakan</label>
                                                <input type="text" class="form-control" name="nama_tindakan" autocomplete="off" value="{{ $t->nama_tindakan}}">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Harga Jual</label>
                                        <input type="form_control" class="form-control" name="harga_jual" autocomplete="off"  value="{{ $t->harga_jual}}" onkeypress="return event.charCode >= 48 && event.charCode <=57">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Komisi Tindakan</label>
                                        <input class="form-control" type="text" name="komisi_tindakan" autocomplete="off"  value="{{ $t->komisi_tindakan}}" onkeypress="return event.charCode >= 48 && event.charCode <=57">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Kategori Tindakan<span class="text-danger">*</span></label>
                                        <select class="select" name="kategori_tindakan" required autocomplete="off">
                                            <option @if ($t->kategori_tindakan == 'Rendah') selected @endif>Rendah</option>
                                            <option @if ($t->kategori_tindakan == 'Medium') selected @endif>Medium</option>
                                            <option @if ($t->kategori_tindakan == 'Tinggi') selected @endif>Tinggi</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>Status Member</label>
                                        <select class="select" name="status_member" required autocomplete="off">
                                            <option  @if ($t->status_member == 'Ya') selected @endif>Ya</option>
                                            <option  @if ($t->status_member == 'Tidak') selected @endif>Tidak</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>Status Aktif</label>
                                        <select class="select" name="status_aktif" required autocomplete="off">
                                            <option  @if ($t->status_aktif == 'Ya') selected @endif>Ya</option>
                                            <option  @if ($t->status_aktif == 'Tidak') selected @endif>Tidak</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label>Keterangan</label>
                                        <input class="form-control" type="text" name="keterangan" autocomplete="off" value="{{ $t->komisi_tindakan}}">
                                    </div>
                                </div>
                            </div>
                            <div class="m-t-20 text-center">
                                <button class="btn btn-primary submit-btn">Simpan Perubahan Tindakan</button>
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
