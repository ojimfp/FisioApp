<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Facade\Ignition\Tabs\Tab;
use App\Pasien;
use Carbon\Carbon;

class PasienController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    // Menampilkan halaman utama pasien
    public function index()
    {
        $pasien = Pasien::all();
        $result = [
            'meta' => [
                'title'         => config('app.name') . ' - ' . 'List Pasien',
                'side_active'   => 'pasien'
            ],
            'pasien' => $pasien
        ];

        return view('pasien', $result);
    }

    // Menampilkan view form tambah pasien
    public function create()
    {
        $result = [
            'meta' => [
                'title'         => config('app.name') . ' - ' . 'Tambah Pasien',
                'side_active'   => 'pasien'
            ],
        ];
        return view('tambah_pasien', $result);
    }

    // Menyimpan data ke dalam table pasien
    public function store(Request $request)
    {
        $pasien = new Pasien;

        $pasien->nama = $request->nama;
        $pasien->alamat = $request->alamat;
        $pasien->kota = $request->kota;
        $pasien->jenis_kelamin = $request->jenis_kelamin;
        $pasien->pekerjaan = $request->pekerjaan;
        $pasien->tempat_lahir = $request->tempat_lahir;
        $pasien->tgl_lahir = Carbon::createFromFormat('d/m/Y', $request->tgl_lahir)->format('Y-m-d');
        $pasien->no_telp = $request->no_telp;
        $pasien->alergi_obat = $request->alergi_obat;
        $pasien->masalah_kulit = $request->masalah_kulit;
        $pasien->catatan = $request->catatan;
        $pasien->save();

        return redirect()->route('pasien.index');
    }

    // Masuk ke form edit pasien
    public function edit($id)
    {
        $pasien = DB::table('pasien')->where('id', $id)->get();
        $result = [
            'meta' => [
                'title'         => config('app.name') . ' - ' . 'Edit Pasien',
                'side_active'   => 'pasien'
            ],
            'pasien' => $pasien
        ];
        return view('edit_pasien', $result);
    }

    // Update data pasien yg sudah di-edit
    public function update(Request $request, $id)
    {
        $pasien = Pasien::findOrFail($id);

        $pasien->nama               = $request->nama;
        $pasien->alamat             = $request->alamat;
        $pasien->kota               = $request->kota;
        $pasien->jenis_kelamin      = $request->jenis_kelamin;
        $pasien->pekerjaan          = $request->pekerjaan;
        $pasien->tempat_lahir       = $request->tempat_lahir;
        $pasien->tgl_lahir          = Carbon::createFromFormat('d/m/Y', $request->tgl_lahir)->format('Y-m-d');
        $pasien->no_telp            = $request->no_telp;
        $pasien->alergi_obat        = $request->alergi_obat;
        $pasien->masalah_kulit      = $request->masalah_kulit;
        $pasien->catatan            = $request->catatan;
        $pasien->update();

        return redirect()->route('pasien.index');
    }

    //Menghapus data pasien
    public function destroy($id)
    {
        DB::table('pasien')->where('id', $id)->delete();

        return redirect()->route('pasien.index');
    }

    //Mencari data pasien
    public function search(Request $request)
    {
        $keyword = $request->keyword;

        if ($request->has('keyword')) {
            $pasien = DB::table('pasien')
                ->where('id', 'LIKE', "%" . $keyword . "%")
                ->orWhere('nama', 'LIKE', "%" . $keyword . "%")
                ->orWhere('alamat', 'LIKE', "%" . $keyword . "%")
                ->orWhere('tgl_lahir', 'LIKE', "%" . $keyword . "%")
                ->orWhere('no_telp', 'LIKE', "%" . $keyword . "%")
                ->get();
            $result = [
                'meta' => [
                    'title'         => config('app.name') . ' - ' . 'List Pasien',
                    'side_active'   => 'pasien'
                ],
                'pasien' => $pasien
            ];
        } else {
            $pasien = DB::table('pasien')->get();
            $result = [
                'meta' => [
                    'title'         => config('app.name') . ' - ' . 'List Pasien',
                    'side_active'   => 'pasien'
                ],
                'pasien' => $pasien
            ];
        }

        return view('pasien', $result);
    }
}
