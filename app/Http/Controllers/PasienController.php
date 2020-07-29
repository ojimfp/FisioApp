<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Facade\Ignition\Tabs\Tab;
use App\Pasien;

class PasienController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    // Menampilkan halaman utama pasien
    public function index()
    {
        $pasien = DB::table('pasien')->get();

        return view('pasien', ['pasien' => $pasien]);
    }

    // Menampilkan view form tambah pasien
    public function create()
    {
        return view('tambah_pasien');
    }

    // Menyimpan data ke dalam table pasien
    public function store(Request $request)
    {
        DB::table('pasien')->insert([
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'tgl_lahir' => $request->tgl_lahir,
            'no_telp' => $request->no_telp
        ]);

        return redirect()->route('pasien.index');
    }

    // Meng-edit data pasien
    public function edit($id)
    {
        $pasien = DB::table('pasien')->where('id', $id)->get();

        return view('edit_pasien', ['pasien' => $pasien]);
    }

    // Update data pasien yg sudah di-edit
    public function update(Request $request)
    {
        DB::table('pasien')->where('id', $request->id)->update([
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'tgl_lahir' => $request->tgl_lahir,
            'no_telp' => $request->no_telp
        ]);

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
                ->get();
        } else {
            $pasien = DB::table('pasien')->get();
        }

        return view('pasien', ['pasien' => $pasien]);
    }
}
