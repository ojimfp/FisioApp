<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Facade\Ignition\Tabs\Tab;
use App\Dokter;

class DokterController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    // Menampilkan halaman utama dokter
    public function index()
    {
        $dokter = DB::table('dokter')->get();
        $result = [
            'meta' => [
                'title'         => config('app.name').' - '.'List Fisioterapis',
                'side_active'   => 'dokter'
            ],
            'dokter' => $dokter
        ];
        return view('dokter', $result);
    }

    // Menampilkan view form tambah dokter
    public function create()
    {
        $result = [
            'meta' => [
                'title'         => config('app.name').' - '.'Tambah Fisioterapis',
                'side_active'   => 'dokter'
            ],
        ];
        return view('tambah_dokter',$result);
    }

    // Menyimpan data ke dalam table dokter
    public function store(Request $request)
    {
        DB::table('dokter')->insert([
            'nama_dokter' => $request->nama_dokter,
            'spesialisasi' => $request->spesialisasi
        ]);

        return redirect()->route('dokter.index');
    }

    // Meng-edit data dokter
    public function edit($id)
    {
        $dokter = DB::table('dokter')->where('id', $id)->get();
        $result = [
            'meta' => [
                'title'         => config('app.name').' - '.'Ubah Fisioterapis',
                'side_active'   => 'dokter'
            ],
            'dokter' => $dokter
        ];
        return view('edit_dokter', $result);
    }

    // Update data dokter yg sudah di-edit
    public function update(Request $request, $id)
    {
        $dokter = Dokter::findOrFail($id);

        $dokter->nama_dokter = $request->nama_dokter;
        $dokter->spesialisasi = $request->spesialisasi;
        $dokter->update();

        return redirect()->route('dokter.index');
    }

    //Menghapus data dokter
    public function destroy($id)
    {
        DB::table('dokter')->where('id', $id)->delete();

        return redirect()->route('dokter.index');
    }

    //Mencari data dokter
    public function search(Request $request)
    {
        $keyword = $request->keyword;

        if ($request->has('keyword')) {
            $dokter = DB::table('dokter')
                ->where('id', 'LIKE', "%" . $keyword . "%")
                ->orWhere('nama_dokter', 'LIKE', "%" . $keyword . "%")
                ->orWhere('spesialisasi', 'LIKE', "%" . $keyword . "%")
                ->get();
        } else {
            $dokter = DB::table('dokter')->get();
        }

        return view('dokter', ['dokter' => $dokter]);
    }
}
