<!DOCTYPE html>
<html lang="en">


<!-- profile22:59-->

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
                    <div class="col-sm-4 col-3">
                        <h4 class="page-title">Riwayat Pasien</h4>
                    </div>
                    <div class="col-sm-8 col-9 text-right m-b-20">
                        <a href="{{ route('rekam-medis.create', $pasien->id) }}" class="btn btn btn-primary btn-rounded float-right"><i class="fa fa-plus"></i> Tambah Rekam Medis</a>
                    </div>
                </div>
                <div class="card-box profile-header">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="profile-view">
                                <div>
                                    <div class="row">
                                        <div class="col-md-7">
                                            <ul class="personal-info">
                                                <h3 class="user-name m-t-0 mb-0">{{ $pasien->nama }}</h3></br>
                                                <li>
                                                    <span class="title">No. Registrasi:</span>
                                                    <span class="text">{{ sprintf('%04d', $pasien->id) }}</a></span>
                                                </li>
                                                <li>
                                                    <span class="title">Alamat:</span>
                                                    <span class="text">{{ $pasien->alamat }}</span>
                                                </li>
                                                <li>
                                                    <span class="title">No. Telepon:</span>
                                                    <span class="text">{{ $pasien->no_telp }}</span>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="profile-tabs">
                    <ul class="nav nav-tabs nav-tabs-bottom">
                        <li class="nav-item"><a class="nav-link active" href="#rekam-medis" data-toggle="tab">Rekam Medis</a></li>
                        <li class="nav-item"><a class="nav-link" href="#riwayat-pembayaran" data-toggle="tab">Riwayat Pembayaran</a></li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane show active" id="rekam-medis">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="table-responsive">
                                        <table class="table table-border table-striped custom-table datatable mb-0">
                                            <thead>
                                                <tr>
                                                    <th>Tanggal Terapi</th>
                                                    <th>APS/Dokter</th>
                                                    <th>Diagnosa Dokter</th>
                                                    <th>Nama Terapis</th>
                                                    <th>Anamnesa</th>
                                                    <th>Pemeriksaan</th>
                                                    <th>Diagnosa Terapis</th>
                                                    <th>Tindakan</th>
                                                    <th class="text-right">Opsi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($rekam_medis as $rm)
                                                <tr>
                                                    <td>{{ $rm->created_at->format('d/m/Y H:i') }}</td>
                                                    <td>{{ $rm->aps_dokter }}</td>
                                                    <td>{{ $rm->diagnosa_dokter }}</td>
                                                    <td>{{ $rm->users->name }}</td>
                                                    <td>{{ $rm->anamnesa }}</td>
                                                    <td>{{ $rm->pemeriksaan }}</td>
                                                    <td>{{ $rm->diagnosa_terapis }}</td>
                                                    <td>{{ implode(', ', $rm->tindakan()->get()->pluck('nama_tindakan')->toArray()) }}</td>
                                                    <td class="text-right">
                                                        <div class="dropdown dropdown-action">
                                                            <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
                                                            <div class="dropdown-menu dropdown-menu-right">
                                                                <a class="dropdown-item" href="{{ route('pembayaran.create', $rm->id) }}"><i class="fa fa-money m-r-5"></i> Tambah Pembayaran</a>
                                                                <a class="dropdown-item" href="{{ route('rekam-medis.edit', $rm->id) }}"><i class="fa fa-pencil m-r-5"></i> Edit</a>
                                                                <a class="dropdown-item" href="javascript:;" data-toggle="modal" onclick="deleteDataRM('{{ $rm->id }}')" data-target="#delete_rm"><i class="fa fa-trash-o m-r-5"></i> Hapus</a>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="delete_rm" class="modal fade delete-modal" role="dialog">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <form action="" id="deleteForm_rm" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <div class="modal-body text-center">
                                            <img src="{{ asset('assets/img/sent.png') }}" alt="" width="50" height="46">
                                            <h3>Apakah Anda yakin ingin menghapus rekam medis ini?</h3>
                                            <div class="m-t-20">
                                                <button class="btn btn-white" data-dismiss="modal">Tidak</button>
                                                <button type="submit" class="btn btn-danger" onclick="formSubmitRM()">Hapus</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane" id="riwayat-pembayaran">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="table-responsive">
                                        <table class="table table-border table-striped custom-table datatable mb-0">
                                            <thead>
                                                <tr>
                                                    <th>No. Tagihan</th>
                                                    <th>Tanggal Pembayaran</th>
                                                    <th>Tindakan</th>
                                                    <th>Total Biaya</th>
                                                    <th>Tipe Pembayaran</th>
                                                    <th>Nama Terapis</th>
                                                    <th class="text-right">Opsi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($pembayaran as $bayar)
                                                <tr>
                                                    <td>{{ $bayar->id }}</td>
                                                    <td>{{ $bayar->created_at->format('d/m/Y H:i') }}</td>
                                                    <td>{{ implode(', ', $bayar->tindakan()->get()->pluck('nama_tindakan')->toArray()) }}</td>
                                                    <td>Rp {{ $bayar->total_biaya }}</td>
                                                    <td>{{ $bayar->tipe_pembayaran }}</td>
                                                    <td>{{ $bayar->users->name }}</td>
                                                    <td class="text-right">
                                                        <div class="dropdown dropdown-action">
                                                            <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
                                                            <div class="dropdown-menu dropdown-menu-right">
                                                                <a class="dropdown-item" href="{{ route('pembayaran.edit.rm', $bayar->id) }}"><i class="fa fa-pencil m-r-5"></i> Edit</a>
                                                                <a class="dropdown-item" href="{{ route('invoice', $bayar->id) }}"><i class="fa fa-eye m-r-5"></i> View</a>
                                                                <a class="dropdown-item" href="{{ route('invoice.download', $bayar->id) }}"><i class="fa fa-file-pdf-o m-r-5"></i> Download</a>
                                                                @can('manage-users')
                                                                <a class="dropdown-item" href="javascript:;" data-toggle="modal" onclick="deleteDataP('{{ $bayar->id }}')" data-target="#delete_invoice"><i class="fa fa-trash-o m-r-5"></i> Delete</a>
                                                                @endcan
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="delete_invoice" class="modal fade delete-modal" role="dialog">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <form action="" id="deleteForm_inv" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <div class="modal-body text-center">
                                            <img src="{{ asset('assets/img/sent.png') }}" alt="" width="50" height="46">
                                            <h3>Apakah Anda yakin ingin menghapus riwayat pembayaran ini?</h3>
                                            <div class="m-t-20">
                                                <button class="btn btn-white" data-dismiss="modal">Tidak</button>
                                                <button type="submit" class="btn btn-danger" onclick="formSubmitP()">Hapus</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- FOOTER -->
        @include('_part.footer')

        <!-- Script modal konfirmasi hapus rekam medis -->
        <script type="text/javascript">
            function deleteDataRM(id) {
                var id = id;
                var url = '{{ route("rekam-medis.destroy", ":id") }}';
                url = url.replace(':id', id);
                $("#deleteForm_rm").attr('action', url);
            }

            function formSubmitRM() {
                $("#deleteForm_rm").submit();
            }
        </script>

        <!-- Script modal konfirmasi hapus riwayat pembayaran -->
        <script type="text/javascript">
            function deleteDataP(id) {
                var id = id;
                var url = '{{ route("pembayaran.destroy.rm", ":id") }}';
                url = url.replace(':id', id);
                $("#deleteForm_inv").attr('action', url);
            }

            function formSubmitP() {
                $("#deleteForm_inv").submit();
            }
        </script>
</body>


<!-- profile23:03-->

</html>