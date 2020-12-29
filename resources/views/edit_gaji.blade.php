<!DOCTYPE html>
<html lang="en">


<!-- create-invoice24:07-->

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
                        <h4 class="page-title">Edit Gaji a.n. {{ $gaji->users->name }}</h4>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-8 offset-lg-2">
                        <form action="{{ route('gaji.update', $gaji->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label>Gaji Pokok</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">Rp</span>
                                            </div>
                                            <input class="form-control" id="gaji_pokok" type="text" name="gaji_pokok" value="{{ $gaji->users->gaji_pokok }}" readonly>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-2">
                                    <div class="form-group">
                                        <label>Hari Kerja <span class="text-danger">*</span></label>
                                        <input class="form-control hari" id="hari_kerja" type="text" name="hari_kerja" value="{{ $gaji->hari_kerja }}" required autocomplete="off" onkeypress="return event.charCode >= 48 && event.charCode <=57">
                                    </div>
                                </div>
                                <div class="col-sm-2">
                                    <div class="form-group">
                                        <label>Hari Masuk</label>
                                        <input class="form-control hari" id="hari_masuk" type="text" name="hari_masuk" value="{{ $gaji->hari_masuk }}" readonly autocomplete="off">
                                    </div>
                                </div>
                                <div class="col-sm-8">
                                    <div class="form-group">
                                        <label>Gaji Karyawan</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">Rp</span>
                                            </div>
                                            <input class="form-control hari" id="gaji_bersih" type="text" name="gaji_bersih" value="{{ $gaji->gaji_bersih }}" readonly autocomplete="off">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label>Insentif Koordinator <span class="text-danger">*</span></label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">Rp</span>
                                            </div>
                                            <input class="form-control hari" id="ins_koor" type="text" name="ins_koor" value="{{ $gaji->ins_koor }}" required onkeypress="return event.charCode >= 48 && event.charCode <=57">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label>Total Insentif per Tindakan per Bulan</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">Rp</span>
                                            </div>
                                            <input class="form-control hari" id="ins_tindakan" type="text" name="ins_tindakan" value="{{ $gaji->ins_tindakan }}" readonly>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label>Total Insentif per Exercise per Bulan</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">Rp</span>
                                            </div>
                                            <input class="form-control hari" id="ins_exe" type="text" name="ins_exe" value="{{ $gaji->ins_exe }}" readonly>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label>Total Insentif Minggu Pertama</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">Rp</span>
                                            </div>
                                            <input class="form-control hari" id="ins_minggu_satu" type="text" name="ins_minggu_satu" value="{{ $gaji->ins_minggu_satu }}" readonly>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label>Total Insentif Minggu Kedua</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">Rp</span>
                                            </div>
                                            <input class="form-control hari" id="ins_minggu_dua" type="text" name="ins_minggu_dua" value="{{ $gaji->ins_minggu_dua }}" readonly>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label>Total Insentif Minggu Ketiga</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">Rp</span>
                                            </div>
                                            <input class="form-control hari" id="ins_minggu_tiga" type="text" name="ins_minggu_tiga" value="{{ $gaji->ins_minggu_tiga }}" readonly>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label>Total Insentif Minggu Keempat</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">Rp</span>
                                            </div>
                                            <input class="form-control hari" id="ins_minggu_empat" type="text" name="ins_minggu_empat" value="{{ $gaji->ins_minggu_empat }}" readonly>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label>Total Insentif Minggu Kelima</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">Rp</span>
                                            </div>
                                            <input class="form-control hari" id="ins_minggu_lima" type="text" name="ins_minggu_lima" value="{{ $gaji->ins_minggu_lima }}" readonly>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label>Total Insentif Tindakan Hari Besar</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">Rp</span>
                                            </div>
                                            <input class="form-control hari" id="ins_hari_besar" type="text" name="ins_hari_besar" value="{{ $gaji->ins_hari_besar }}" readonly autocomplete="off">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label>Bonus Insentif <span class="text-danger">*</span></label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">Rp</span>
                                            </div>
                                            <input class="form-control hari" id="bonus" type="text" name="bonus" value="{{ $gaji->bonus }}" autocomplete="off" onkeypress="return event.charCode >= 48 && event.charCode <=57">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label style="font-weight: bold;">Total Gaji Bulan Lalu</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">Rp</span>
                                            </div>
                                            <input class="form-control hari" id="total_gaji" type="text" name="total_gaji" value="{{ $gaji->total_gaji }}" readonly>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="text-center m-t-20">
                                <button class="btn btn-primary submit-btn">Edit Gaji</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- FOOTER -->
    @include('_part.footer')
    <!-- <script>
        $(document).ready(function() {
            $('#users_id').on('load', function() {
                var id = $(this).val();
                var url = '{{ route("getData", ":id") }}';
                url = url.replace(':id', id);

                $.ajax({
                    url: url,
                    type: 'get',
                    dataType: 'json',
                    success: function(response) {
                        if (response != null) {
                            $('#biaya_tindakan').val(response['biaya_tindakan']);
                            $('#biaya_exe').val(response['biaya_exe']);
                            $('#tindakan_minggu_satu').val(response['tindakan_minggu_satu']);
                            $('#jml_karyawan_satu').val(response['jml_karyawan_satu']);
                            $('#tindakan_minggu_dua').val(response['tindakan_minggu_dua']);
                            $('#jml_karyawan_dua').val(response['jml_karyawan_dua']);
                            $('#tindakan_minggu_tiga').val(response['tindakan_minggu_tiga']);
                            $('#jml_karyawan_tiga').val(response['jml_karyawan_tiga']);
                            $('#tindakan_minggu_empat').val(response['tindakan_minggu_empat']);
                            $('#jml_karyawan_empat').val(response['jml_karyawan_empat']);
                            $('#tindakan_minggu_lima').val(response['tindakan_minggu_lima']);
                            $('#jml_karyawan_lima').val(response['jml_karyawan_lima']);
                        }
                    }
                });
            });
        });
    </script> -->
    <script src="{{ asset('assets/js/gaji.js') }}"></script>
</body>


<!-- create-invoice24:07-->

</html>