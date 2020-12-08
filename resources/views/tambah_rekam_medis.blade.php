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
                        <h4 class="page-title">Tambah Rekam Medis a.n. {{ $pasien->nama }}</h4>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-8 offset-lg-2">
                        <form action="{{ route('rekam-medis.store') }}" method="POST">
                            @csrf
                            <div class="row" id="dynamic_field">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <input class="form-control" name="id_pasien" value="{{ $pasien->id }}" hidden>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Dokter/APS <span class="text-danger">*</span></label></br>
                                        <div class="form-check form-check-inline radio">
                                            <input class="form-check-input" type="radio" name="aps_dokter" id="aps" value="APS" onchange="findSelected()">
                                            <label class="form-check-label" for="aps">APS (Atas Permintaan Sendiri)</label>
                                        </div>
                                        <div class="form-check form-check-inline radio">
                                            <input class="form-check-input" type="radio" name="aps_dokter" id="dokter" value="Dokter" onchange="findSelected()">
                                            <label class="form-check-label" for="dokter" style="margin-right: 7px;">Dokter</label>
                                            <input class="form-check-input" type="text" name="nama_dokter" id="nama_dokter" value="">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label>Diagnosa Dokter <span class="text-danger">*</span></label></br>
                                        <input class="form-control" name="diagnosa_dokter" value="" required autocomplete="off">
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label>Nama Terapis</label></br>
                                        <input class="form-control" name="id_user" value="{{ Auth::user()->id }}" hidden>
                                        <input class="form-control" name="nama_terapis" value="{{ Auth::user()->name }}" readonly>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label>Anamnesa <span class="text-danger">*</span></label></br>
                                        <textarea class="form-control" name="anamnesa" cols="88" rows="4"></textarea>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label>Pemeriksaan <span class="text-danger">*</span></label></br>
                                        <textarea class="form-control" name="pemeriksaan" cols="88" rows="4"></textarea>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label>Diagnosa Terapis <span class="text-danger">*</span></label></br>
                                        <textarea class="form-control" name="diagnosa_terapis" cols="88" rows="4"></textarea>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <!-- <div class="form-group">
                                        <label>Tindakan</label>
                                        @foreach($tindakan as $t)
                                        <div class="checkbox">
                                            <input type="checkbox" name="tindakan[]" value="{{ $t->id }}">
                                            <label>{{ $t->nama_tindakan }}</label>
                                        </div>
                                        @endforeach
                                    </div> -->
                                    <div class="form-group">
                                        <label>Tindakan <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control tindakan" name="tindakan[]" id="tindakan_1">
                                        <input type="text" class="form-control" name="id_tindakan[]" id="id_tindakan_1" hidden>
                                        <div class="m-t-10 text-right">
                                            <button type="button" class="btn btn-success btn-sm" id="tambah">Tambah Tindakan</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="m-t-20 text-center">
                                <button class="btn btn-primary submit-btn">Tambah Rekam Medis</button>
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
        function findSelected() {
            var result = document.querySelector('input[name="aps_dokter"]:checked').value;
            if (result == "APS") {
                document.getElementById("nama_dokter").setAttribute('disabled', true);
            } else {
                document.getElementById("nama_dokter").removeAttribute('disabled');
            }
        }
    </script>
    <!-- <script>
        $(document).ready(function() {
            $('#tindakan').autocomplete({
                source: function(request, response) {
                    $.ajax({
                        url: "{{ route('rekam-medis.getTindakan') }}",
                        type: 'post',
                        dataType: 'json',
                        data: {
                            _token: '{{ csrf_token() }}',
                            search: request.term
                        },
                        success: function(data) {
                            response(data);
                        }
                    });
                },
                select: function(event, ui) {
                    $('#tindakan').val(ui.item.label);
                    $('#id_tindakan').val(ui.item.value);
                    return false;
                }
            });
        });
    </script> -->
    <script>
        $(document).ready(function() {
            // var url = "{{ url('add-remove-input-fields') }}";
            var i = 1;
            $('#tambah').click(function() {
                i++;
                $('#dynamic_field').append('<div class="col-md-12" id="col_' + i + '">\n' +
                    '<div class="form-group">\n' +
                    '<label>Tindakan <span class="text-danger">*</span></label>\n' +
                    '<input type="text" class="form-control tindakan" name="tindakan[]" id="tindakan_' + i + '">\n' +
                    '<input type="text" class="form-control" name="id_tindakan[]" id="id_tindakan_' + i + '" hidden>\n' +
                    '<div class="m-t-10 text-right">\n' +
                    '<button type="button" class="btn btn-danger btn-sm hapus" id="' + i + '">Hapus Tindakan</button>\n' +
                    '</div>\n' +
                    '</div>\n' +
                    '</div>');
            });

            $(document).on('click', '.tindakan', function(e) {
                $(this).autocomplete({
                    source: function(request, response) {
                        $.ajax({
                            url: "{{ route('rekam-medis.getTindakan') }}",
                            type: 'post',
                            dataType: 'json',
                            data: {
                                _token: '{{ csrf_token() }}',
                                search: request.term
                            },
                            success: function(data) {
                                response(data);
                            }
                        });
                    },
                    select: function(event, ui) {
                        $(this).val(ui.item.label);
                        var str = this.id;
                        var a = str.indexOf("_");
                        var b = str.length;
                        var number = str.substring(a + 1, b);
                        $('#id_tindakan_' + number).val(ui.item.value);
                        return false;
                    }
                });
            });

            $(document).on('click', '.hapus', function() {
                var button_id = $(this).attr("id");
                $('#col_' + button_id + '').remove();
            });
        });
    </script>
</body>

<!-- add-patient24:07-->

</html>