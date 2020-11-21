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
                        <h4 class="page-title">Tambah Gaji</h4>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-8 offset-lg-2">
                        <form action="{{ route('gaji.store') }}" method="POST">
                            @csrf
                            <div class="row">
                                <input class="form-control" type="text" name="dokter_id" value="" hidden>
                                <div class="col-sm-8">
                                    <div class="form-group">
                                        <label>Gaji Pokok</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">Rp</span>
                                            </div>
                                            <input class="form-control" id="gaji_pokok" type="text" name="gaji_pokok" value="" readonly>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <div class="m-t-30">
                                            <button type="button" class="btn btn-primary btn-lg" onclick="myFunction()">Hitung Gaji Bulan Lalu</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-2">
                                    <div class="form-group">
                                        <label>Hari Kerja<span class="text-danger"> *</span></label>
                                        <input class="form-control hari" id="hari_kerja" type="text" name="hari_kerja" required autocomplete="off">
                                    </div>
                                </div>
                                <div class="col-sm-2">
                                    <div class="form-group">
                                        <label>Hari Masuk</label>
                                        <input class="form-control hari" id="hari_masuk" type="text" name="hari_masuk" autocomplete="off">
                                    </div>
                                </div>
                                <div class="col-sm-8">
                                    <div class="form-group">
                                        <label>Gaji Karyawan</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">Rp</span>
                                            </div>
                                            <input class="form-control hari" id="gaji_bersih" type="text" name="gaji_bersih" autocomplete="off">
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
                                            <input class="form-control hari" id="ins_koor" type="text" name="ins_koor" value="">
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
                                            <input class="form-control" id="biaya_tindakan" type="text" name="biaya_tindakan" value="">
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
                                            <input class="form-control hari" id="ins_tindakan" type="text" name="ins_tindakan" value="">
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
                                            <input class="form-control" id="biaya_exe" type="text" name="biaya_exe" value="">
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
                                            <input class="form-control hari" id="ins_exe" type="text" name="ins_exe" value="">
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
                                            <input class="form-control" id="biaya_minggu_satu" type="text" name="biaya_minggu_satu" value="">
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
                                        <input class="form-control" id="jml_karyawan_satu" type="text" name="jml_karyawan_satu" value="">
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>Total Insentif Minggu Pertama</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">Rp</span>
                                            </div>
                                            <input class="form-control hari" id="ins_minggu_satu" type="text" name="ins_minggu_satu" value="">
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
                                            <input class="form-control" id="biaya_minggu_dua" type="text" name="biaya_minggu_dua" value="">
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
                                        <input class="form-control" id="jml_karyawan_dua" type="text" name="jml_karyawan_dua" value="">
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>Total Insentif Minggu Kedua</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">Rp</span>
                                            </div>
                                            <input class="form-control hari" id="ins_minggu_dua" type="text" name="ins_minggu_dua" value="">
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
                                            <input class="form-control" id="biaya_minggu_tiga" type="text" name="biaya_minggu_tiga" value="">
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
                                        <input class="form-control" id="jml_karyawan_tiga" type="text" name="jml_karyawan_tiga" value="">
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>Total Insentif Minggu Ketiga</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">Rp</span>
                                            </div>
                                            <input class="form-control hari" id="ins_minggu_tiga" type="text" name="ins_minggu_tiga" value="">
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
                                            <input class="form-control" id="biaya_minggu_empat" type="text" name="biaya_minggu_empat" value="">
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
                                        <input class="form-control" id="jml_karyawan_empat" type="text" name="jml_karyawan_empat" value="">
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>Total Insentif Minggu Keempat</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">Rp</span>
                                            </div>
                                            <input class="form-control hari" id="ins_minggu_empat" type="text" name="ins_minggu_empat" value="">
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
                                            <input class="form-control" id="biaya_minggu_lima" type="text" name="biaya_minggu_lima" value="">
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
                                        <input class="form-control" id="jml_karyawan_lima" type="text" name="jml_karyawan_lima" value="">
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>Total Insentif Minggu Kelima</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">Rp</span>
                                            </div>
                                            <input class="form-control hari" id="ins_minggu_lima" type="text" name="ins_minggu_lima" value="">
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
                                            <input class="form-control hari" id="bonus" type="text" name="bonus" value="">
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
                                            <input class="form-control hari" id="total_gaji" type="text" name="total_gaji" value="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row" hidden>
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <input class="form-control" id="bulan_gajian" type="text" name="bulan_gajian" value="">
                                    </div>
                                </div>
                            </div>
                            <div class="text-center m-t-20">
                                <button class="btn btn-primary submit-btn">Tambah</button>
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
        function myFunction() {
            document.getElementById("hari_masuk").value = <?php /*echo json_encode($hari_masuk)*/ ?>;
            document.getElementById("biaya_tindakan").value = <?php /*echo json_encode($total_tindakan)*/ ?>;
            document.getElementById("biaya_exe").value = <?php /*echo json_encode($total_exercise)*/ ?>;
            document.getElementById("biaya_minggu_satu").value = <?php /*echo json_encode($total_minggu_satu)*/ ?>;
            document.getElementById("jml_karyawan_satu").value = <?php /*echo json_encode($jml_karyawan_satu)*/ ?>;
            document.getElementById("biaya_minggu_dua").value = <?php /*echo json_encode($total_minggu_dua)*/ ?>;
            document.getElementById("jml_karyawan_dua").value = <?php /*echo json_encode($jml_karyawan_dua)*/ ?>;
            document.getElementById("biaya_minggu_tiga").value = <?php /*echo json_encode($total_minggu_tiga)*/ ?>;
            document.getElementById("jml_karyawan_tiga").value = <?php /*echo json_encode($jml_karyawan_tiga)*/ ?>;
            document.getElementById("biaya_minggu_empat").value = <?php /*echo json_encode($total_minggu_empat)*/ ?>;
            document.getElementById("jml_karyawan_empat").value = <?php /*echo json_encode($jml_karyawan_empat)*/ ?>;
            document.getElementById("biaya_minggu_lima").value = <?php /*echo json_encode($total_minggu_lima)*/ ?>;
            document.getElementById("jml_karyawan_lima").value = <?php /*echo json_encode($jml_karyawan_lima)*/ ?>;

            var bt = parseInt(document.getElementById("biaya_tindakan").value);
            document.getElementById("ins_tindakan").value = bt * 0.1;

            var be = parseInt(document.getElementById("biaya_exe").value);
            document.getElementById("ins_exe").value = be * 0.2;

            var bma = parseInt(document.getElementById("biaya_minggu_satu").value);
            var jka = parseInt(document.getElementById("jml_karyawan_satu").value);
            document.getElementById("ins_minggu_satu").value = parseInt(bma * 0.5 / jka) || 0;

            var bmb = parseInt(document.getElementById("biaya_minggu_dua").value);
            var jkb = parseInt(document.getElementById("jml_karyawan_dua").value);
            document.getElementById("ins_minggu_dua").value = parseInt(bmb * 0.5 / jkb) || 0;

            var bmc = parseInt(document.getElementById("biaya_minggu_tiga").value);
            var jkc = parseInt(document.getElementById("jml_karyawan_tiga").value);
            document.getElementById("ins_minggu_tiga").value = parseInt(bmc * 0.5 / jkc) || 0;

            var bmd = parseInt(document.getElementById("biaya_minggu_empat").value);
            var jkd = parseInt(document.getElementById("jml_karyawan_empat").value);
            document.getElementById("ins_minggu_empat").value = parseInt(bmd * 0.5 / jkd) || 0;

            var bme = parseInt(document.getElementById("biaya_minggu_lima").value);
            var jke = parseInt(document.getElementById("jml_karyawan_lima").value);
            document.getElementById("ins_minggu_lima").value = parseInt(bme * 0.5 / jke) || 0;
        }
    </script> -->
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