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
                        <h4 class="page-title">Tambah Gaji Bulan Lalu</h4>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-8 offset-lg-2">
                        <form action="{{ route('gaji.store') }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Nama Karyawan <span class="text-danger">*</span></label>
                                        <select class="select" name="users_id" id="users_id" required>
                                            <option>Select</option>
                                            @foreach($users as $user)
                                            <option value="{{ $user->id }}">{{ $user->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-6">
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
                                <!-- <div class="col-sm-4">
                                    <div class="form-group">
                                        <div class="m-t-30">
                                            <button type="button" class="btn btn-primary btn-lg" onclick="myFunction()">Hitung Gaji Bulan Lalu</button>
                                        </div>
                                    </div>
                                </div> -->
                            </div>
                            <div class="row">
                                <div class="col-sm-2">
                                    <div class="form-group">
                                        <label>Hari Kerja<span class="text-danger"> *</span></label>
                                        <input class="form-control hari" id="hari_kerja" type="text" name="hari_kerja" required autocomplete="off" onkeypress="return event.charCode >= 48 && event.charCode <=57">
                                    </div>
                                </div>
                                <div class="col-sm-2">
                                    <div class="form-group">
                                        <label>Hari Masuk</label>
                                        <input class="form-control hari" id="hari_masuk" type="text" name="hari_masuk" readonly>
                                    </div>
                                </div>
                                <div class="col-sm-8">
                                    <div class="form-group">
                                        <label>Gaji Karyawan</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">Rp</span>
                                            </div>
                                            <input class="form-control hari" id="gaji_bersih" type="text" name="gaji_bersih" readonly>
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
                                            <input class="form-control hari" id="ins_koor" type="text" name="ins_koor" required autocomplete="off" onkeypress="return event.charCode >= 48 && event.charCode <=57">
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
                                            <input class="form-control hari" id="ins_tindakan" type="text" name="ins_tindakan" value="" readonly>
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
                                            <input class="form-control hari" id="ins_exe" type="text" name="ins_exe" value="" readonly>
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
                                            <input class="form-control" id="tindakan_minggu_satu" type="text" name="tindakan_minggu_satu" value="" readonly>
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
                                            <input class="form-control hari" id="ins_minggu_satu" type="text" name="ins_minggu_satu" value="" readonly>
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
                                            <input class="form-control" id="tindakan_minggu_dua" type="text" name="tindakan_minggu_dua" value="" readonly>
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
                                            <input class="form-control hari" id="ins_minggu_dua" type="text" name="ins_minggu_dua" value="" readonly>
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
                                            <input class="form-control" id="tindakan_minggu_tiga" type="text" name="tindakan_minggu_tiga" value="" readonly>
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
                                            <input class="form-control hari" id="ins_minggu_tiga" type="text" name="ins_minggu_tiga" value="" readonly>
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
                                            <input class="form-control" id="tindakan_minggu_empat" type="text" name="tindakan_minggu_empat" value="" readonly>
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
                                            <input class="form-control hari" id="ins_minggu_empat" type="text" name="ins_minggu_empat" value="" readonly>
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
                                            <input class="form-control" id="tindakan_minggu_lima" type="text" name="tindakan_minggu_lima" value="" readonly>
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
                                            <input class="form-control hari" id="ins_minggu_lima" type="text" name="ins_minggu_lima" value="" readonly>
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
                                            <input class="form-control hari" id="bonus" type="text" name="bonus" required autocomplete="off" onkeypress="return event.charCode >= 48 && event.charCode <=57">
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
                                            <input class="form-control hari" id="total_gaji" type="text" name="total_gaji" value="" readonly>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row" hidden>
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <input class="form-control" id="bulan_gajian" type="text" name="bulan_gajian" value="{{ \Carbon\Carbon::parse('last day of previous month')->format('Y/m/d H:i:s') }}">
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
    <script>
        $('#users_id').change(function() {
            var id = $(this).val();
            var url = '{{ route("getData", ":id") }}';
            url = url.replace(':id', id);

            $.ajax({
                url: url,
                type: 'get',
                dataType: 'json',
                success: function(response) {
                    if (response != null) {
                        $('#gaji_pokok').val(response['gaji_pokok']);
                        $('#hari_masuk').val(response['hari_masuk']);
                        $('#biaya_tindakan').val(response['biaya_tindakan']);
                        $('#ins_tindakan').val(parseInt(document.getElementById("biaya_tindakan").value) * 0.1);
                        $('#biaya_exe').val(response['biaya_exe']);
                        $('#ins_exe').val(parseInt(document.getElementById("biaya_exe").value) * 0.2);
                        $('#tindakan_minggu_satu').val(response['tindakan_minggu_satu']);
                        $('#jml_karyawan_satu').val(response['jml_karyawan_satu']);
                        $('#ins_minggu_satu').val(parseInt(document.getElementById("tindakan_minggu_satu").value * 0.5 / document.getElementById("jml_karyawan_satu").value) || 0);
                        $('#tindakan_minggu_dua').val(response['tindakan_minggu_dua']);
                        $('#jml_karyawan_dua').val(response['jml_karyawan_dua']);
                        $('#ins_minggu_dua').val(parseInt(document.getElementById("tindakan_minggu_dua").value * 0.5 / document.getElementById("jml_karyawan_dua").value) || 0);
                        $('#tindakan_minggu_tiga').val(response['tindakan_minggu_tiga']);
                        $('#jml_karyawan_tiga').val(response['jml_karyawan_tiga']);
                        $('#ins_minggu_tiga').val(parseInt(document.getElementById("tindakan_minggu_tiga").value * 0.5 / document.getElementById("jml_karyawan_tiga").value) || 0);
                        $('#tindakan_minggu_empat').val(response['tindakan_minggu_empat']);
                        $('#jml_karyawan_empat').val(response['jml_karyawan_empat']);
                        $('#ins_minggu_empat').val(parseInt(document.getElementById("tindakan_minggu_empat").value * 0.5 / document.getElementById("jml_karyawan_empat").value) || 0);
                        $('#tindakan_minggu_lima').val(response['tindakan_minggu_lima']);
                        $('#jml_karyawan_lima').val(response['jml_karyawan_lima']);
                        $('#ins_minggu_lima').val(parseInt(document.getElementById("tindakan_minggu_lima").value * 0.5 / document.getElementById("jml_karyawan_lima").value) || 0);
                    }
                }
            });
        });
    </script>
    <script src="{{ asset('assets/js/gaji.js') }}"></script>
</body>


<!-- create-invoice24:07-->

</html>
