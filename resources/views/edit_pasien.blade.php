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
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label>Nama Lengkap <span class="text-danger">*</span></label>
                                        <input class="form-control" type="text" name="nama" value="{{ $p->nama }}" required onkeypress="return event.charCode < 48 || event.charCode  >57">
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>Alamat</label>
                                                <input type="text" class="form-control" name="alamat" value="{{ $p->alamat }}" required>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>Kota <span class="text-danger">*</span></label>
                                                <input type="text" class="form-control" name="kota" value="{{ $p->kota }}" required autocomplete="off" onkeypress="return event.charCode < 48 || event.charCode  >57">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label class="display-block">Jenis Kelamin <span class="text-danger">*</span></label>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="jenis_kelamin" id="jns_pria" value="Pria"  @if ($p->jenis_kelamin == 'Pria') checked @endif>
                                                    <label class="form-check-label" for="jns_pria">
                                                        Pria
                                                    </label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="jenis_kelamin" id="jns_wanita" value="Wanita"  @if ($p->jenis_kelamin == 'Wanita') checked @endif>
                                                    <label class="form-check-label" for="jns_wanita">
                                                        Wanita
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            {{-- <div class="form-group">
                                                <label>Status Perkawinan <span class="text-danger">*</span></label>
                                                <select class="select" name="status_perkawinan" required autocomplete="off">
                                                    <option value="Belum Kawin"  @if ($p->status_perkawinan == 'Belum Kawin') selected @endif>Belum Kawin</option>
                                                    <option value="Kawin" @if ($p->status_perkawinan == 'Kawin') selected @endif>Kawin</option>
                                                    <option value="Cerai Hidup" @if ($p->status_perkawinan == 'Cerai Hidup') selected @endif>Cerai Hidup</option>
                                                    <option value="Cerai Mati" @if ($p->status_perkawinan == 'Cerai Mati') selected @endif>Cerai Mati</option>
                                                </select>
                                            </div> --}}
                                            <div class="form-group">
                                                <label>Pekerjaan</label>
                                            <input class="form-control" type="text" name="pekerjaan" autocomplete="off" value="{{ $p->pekerjaan}}" required>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>Tempat Lahir</label>
                                                <input type="text" class="form-control" name="tempat_lahir" autocomplete="off" required value="{{ $p->tempat_lahir}}" onkeypress="return event.charCode < 48 || event.charCode  >57">
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>Tanggal Lahir <span class="text-danger">*</span></label>
                                                <div class="cal-icon">
                                                <input type="date" class="form-control" name="tgl_lahir" required autocomplete="off" value="{{ $p->tgl_lahir}}">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>No. Telepon/HP <span class="text-danger">*</span></label>
                                            <input class="form-control" type="text" name="no_telp" required autocomplete="off" value="{{ $p->no_telp }}" onkeypress="return event.charCode >= 48 && event.charCode <=57">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label>Alergi Obat</label>
                                        <textarea class="form-control" name="alergi_obat" autocomplete="off">{{ $p->alergi_obat }}</textarea>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label>Masalah Kulit</label>
                                        <textarea class="form-control" name="masalah_kulit" autocomplete="off">{{ $p->masalah_kulit }}</textarea>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label>Catatan</label>
                                        <textarea class="form-control" name="catatan" autocomplete="off">{{ $p->catatan }}</textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="m-t-20 text-center">
                                <button class="btn btn-primary submit-btn">Simpan Perubahan</button>
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
