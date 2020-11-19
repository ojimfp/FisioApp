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
                        <h4 class="page-title">Tambah Gaji a.n. {{ $gaji->dokter->nama_dokter }}</h4>
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
                                            <input class="form-control" id="gaji_pokok" type="text" name="gaji_pokok" value="{{ $gaji->dokter->gaji_pokok }}" readonly>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-2">
                                    <div class="form-group">
                                        <label>Hari Kerja<span class="text-danger"> *</span></label>
                                        <input class="form-control hari" id="hari_kerja" type="text" name="hari_kerja" value="{{ $gaji->hari_kerja }}" required autocomplete="off">
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
                                            <input class="form-control hari" id="ins_koor" type="text" name="ins_koor" value="{{ $gaji->ins_koor }}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>Total Biaya Tindakan</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">Rp</span>
                                            </div>
                                            <input class="form-control" id="biaya_tindakan" type="text" name="biaya_tindakan" value="" readonly>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-2" style="text-align: right; padding-right: 12px;width: 240px">
                                    <div class="input-group">
                                        <label>Prosentase</label>
                                        <input class="form-control" type="text" name="pros_tindakan" value="10" readonly>
                                        <div class="input-group-append">
                                            <span class="input-group-text">%</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
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
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>Total Biaya Exercise</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">Rp</span>
                                            </div>
                                            <input class="form-control" id="biaya_exe" type="text" name="biaya_exe" value="" readonly>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-2" style="text-align: right; padding-right: 12px;width: 240px">
                                    <div class="input-group">
                                        <label>Prosentase</label>
                                        <input class="form-control" type="text" name="pros_exe" value="20" readonly>
                                        <div class="input-group-append">
                                            <span class="input-group-text">%</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
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
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>Biaya Tindakan Minggu Pertama</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">Rp</span>
                                            </div>
                                            <input class="form-control" id="biaya_minggu_satu" type="text" name="biaya_minggu_satu" value="" readonly>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-2" style="text-align: right; padding-right: 12px;width: 240px">
                                    <div class="input-group">
                                        <label>Prosentase</label>
                                        <input class="form-control" type="text" name="pros_minggu" value="50" readonly>
                                        <div class="input-group-append">
                                            <span class="input-group-text">%</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-2">
                                    <div class="form-group">
                                        <label>Jml Krywan</label>
                                        <input class="form-control" id="jml_karyawan_satu" type="text" name="jml_karyawan_satu" value="" readonly>
                                    </div>
                                </div>
                                <div class="col-sm-4">
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
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>Biaya Tindakan Minggu Kedua</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">Rp</span>
                                            </div>
                                            <input class="form-control" id="biaya_minggu_dua" type="text" name="biaya_minggu_dua" value="" readonly>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-2" style="text-align: right; padding-right: 12px;width: 240px">
                                    <div class="input-group">
                                        <label>Prosentase</label>
                                        <input class="form-control" type="text" name="pros_minggu" value="50" readonly>
                                        <div class="input-group-append">
                                            <span class="input-group-text">%</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-2">
                                    <div class="form-group">
                                        <label>Jml Krywan</label>
                                        <input class="form-control" id="jml_karyawan_dua" type="text" name="jml_karyawan_dua" value="" readonly>
                                    </div>
                                </div>
                                <div class="col-sm-4">
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
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>Biaya Tindakan Minggu Ketiga</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">Rp</span>
                                            </div>
                                            <input class="form-control" id="biaya_minggu_tiga" type="text" name="biaya_minggu_tiga" value="" readonly>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-2" style="text-align: right; padding-right: 12px;width: 240px">
                                    <div class="input-group">
                                        <label>Prosentase</label>
                                        <input class="form-control" type="text" name="pros_minggu" value="50" readonly>
                                        <div class="input-group-append">
                                            <span class="input-group-text">%</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-2">
                                    <div class="form-group">
                                        <label>Jml Krywan</label>
                                        <input class="form-control" id="jml_karyawan_tiga" type="text" name="jml_karyawan_tiga" value="" readonly>
                                    </div>
                                </div>
                                <div class="col-sm-4">
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
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>Biaya Tindakan Minggu Keempat</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">Rp</span>
                                            </div>
                                            <input class="form-control" id="biaya_minggu_empat" type="text" name="biaya_minggu_empat" value="" readonly>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-2" style="text-align: right; padding-right: 12px;width: 240px">
                                    <div class="input-group">
                                        <label>Prosentase</label>
                                        <input class="form-control" type="text" name="pros_minggu" value="50" readonly>
                                        <div class="input-group-append">
                                            <span class="input-group-text">%</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-2">
                                    <div class="form-group">
                                        <label>Jml Krywan</label>
                                        <input class="form-control" id="jml_karyawan_empat" type="text" name="jml_karyawan_empat" value="" readonly>
                                    </div>
                                </div>
                                <div class="col-sm-4">
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
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>Biaya Tindakan Minggu Kelima</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">Rp</span>
                                            </div>
                                            <input class="form-control" id="biaya_minggu_lima" type="text" name="biaya_minggu_lima" value="" readonly>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-2" style="text-align: right; padding-right: 12px;width: 240px">
                                    <div class="input-group">
                                        <label>Prosentase</label>
                                        <input class="form-control" type="text" name="pros_minggu" value="50" readonly>
                                        <div class="input-group-append">
                                            <span class="input-group-text">%</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-2">
                                    <div class="form-group">
                                        <label>Jml Krywan</label>
                                        <input class="form-control" id="jml_karyawan_lima" type="text" name="jml_karyawan_lima" value="" readonly>
                                    </div>
                                </div>
                                <div class="col-sm-4">
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
                                        <label>Bonus Insentif <span class="text-danger">*</span></label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">Rp</span>
                                            </div>
                                            <input class="form-control hari" id="bonus" type="text" name="bonus" value="{{ $gaji->bonus }}" autocomplete="off">
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
            var count = 1;

            dynamic_field(count);

            function dynamic_field(number) {
                html = '<div class="row dynamic">';
                html += '<div class="col-sm-4">\n' +
                    '<div class="form-group">\n' +
                    '<label>Biaya Tindakan Minggu ' + count + '</label>\n' +
                    '<div class="input-group">\n' +
                    '<div class="input-group-prepend">\n' +
                    '<span class="input-group-text">Rp</span>\n' +
                    '</div>\n' +
                    '<input class="form-control" id="biaya_minggu-' + count + '" type="text" name="biaya_minggu" value="">\n' +
                    '</div>\n' +
                    '</div>\n' +
                    '</div>';
                html += '<div class="col-sm-2" style="text-align: right; padding-right: 12px;width: 240px">\n' +
                    '<div class="input-group">\n' +
                    '<label>Prosentase</label>\n' +
                    '<input class="form-control" id="pros_minggu-' + count + '" type="text" name="pros_minggu" value="50" readonly>\n' +
                    '<div class="input-group-append">\n' +
                    '<span class="input-group-text">%</span>\n' +
                    '</div>\n' +
                    '</div>\n' +
                    '</div>';
                html += '<div class="col-sm-2">\n' +
                    '<div class="form-group">\n' +
                    '<label>Jml Krywan</label>\n' +
                    '<input class="form-control" id="jml_karyawan-' + count + '" type="text" name="jml_karyawan" value="">\n' +
                    '</div>\n' +
                    '</div>';
                html += '<div class="col-sm-4">\n' +
                    '<div class="form-group">\n' +
                    '<label>Total Insentif Minggu</label>\n' +
                    '<div class="input-group">\n' +
                    '<div class="input-group-prepend">\n' +
                    '<span class="input-group-text">Rp</span>\n' +
                    '</div>\n' +
                    '<input class="form-control" id="ins_minggu-' + count + '" type="text" name="ins_minggu" value="">\n' +
                    '</div>\n' +
                    '</div>\n' +
                    '</div>';

                if (number > 1) {
                    html += '   <div class="col-sm-12" style="margin-bottom: 10px">\n' +
                        '<div class="text-right">\n' +
                        '<button type="button" name="remove" class="btn btn-danger remove" id="">Hapus</button>\n' +
                        '</div>\n' +
                        '</div>\n' +
                        '</div>';
                    $('.minggu').append(html);
                } else {
                    html += '   <div class="col-sm-12" style="margin-bottom: 10px">\n' +
                        '<div class="text-right">\n' +
                        '<button type="button" name="add" class="btn btn-success" id="add">Tambah</button>\n' +
                        '</div>\n' +
                        '</div>\n' +
                        '</div>';
                    $('.minggu').html(html);
                }
            }

            $(document).on('click', '#add', function() {
                count++;
                dynamic_field(count);
            });

            $(document).on('click', '.remove', function() {
                count--;
                $(this).closest('.dynamic').remove();
            });
        });
    </script> -->
    <script src="{{ asset('assets/js/gaji.js') }}"></script>
</body>


<!-- create-invoice24:07-->

</html>