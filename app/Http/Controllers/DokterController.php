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

        return view('dokter', ['dokter' => $dokter]);
    }

    // Menampilkan view form tambah dokter
    public function create()
    {
        return view('tambah_dokter');
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

        return view('edit_dokter', ['dokter' => $dokter]);
    }

    // Update data dokter yg sudah di-edit
    public function update(Request $request)
    {
        DB::table('dokter')->where('id', $request->id)->update([
            'nama_dokter' => $request->nama_dokter,
            'spesialisasi' => $request->spesialisasi
        ]);

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
