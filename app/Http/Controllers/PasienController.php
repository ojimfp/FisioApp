<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Facade\Ignition\Tabs\Tab;

class PasienController extends Controller
{
    // Menampilkan halaman utama pasien
    public function index()
    {
        $pasien = DB::table('pasien')->get();

        return view('pasien', ['pasien' => $pasien]);
    }

    // Menampilkan view form tambah pasien
    public function tambahPasien()
    {
        return view('tambah_pasien');
    }

    // Menyimpan data ke dalam table pasien
    public function simpanPasien(Request $request)
    {
        DB::table('pasien')->insert([
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'tgl_lahir' => $request->tgl_lahir,
            'no_telp' => $request->no_telp
        ]);

        return redirect('/pasien');
    }

    // Meng-edit data pasien
    public function editPasien($id)
    {
        $pasien = DB::table('pasien')->where('id', $id)->get();

        return view('edit_pasien', ['pasien' => $pasien]);
    }

    // Update data pasien yg sudah di-edit
    public function updatePasien(Request $request)
    {
        DB::table('pasien')->where('id', $request->id)->update([
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'tgl_lahir' => $request->tgl_lahir,
            'no_telp' => $request->no_telp
        ]);

        return redirect('/pasien');
    }

    //Menghapus data pasien
    public function hapusPasien($id)
    {
        DB::table('pasien')->where('id', $id)->delete();

        return redirect('/pasien');
    }

    //Mencari data pasien
    public function cariPasien(Request $request)
    {
        $cari = $request->cari;

        if ($request->has('cari')) {
            $pasien = DB::table('pasien')
                ->where('id', 'LIKE', "%" . $cari . "%")
                ->orWhere('nama', 'LIKE', "%" . $cari . "%")
                ->orWhere('alamat', 'LIKE', "%" . $cari . "%")
                ->get();
        } else {
            $pasien = DB::table('pasien')->get();
        }

        return view('pasien', ['pasien' => $pasien]);
    }
}
