<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Facade\Ignition\Tabs\Tab;
use App\Jadwal;

class JadwalController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $jadwal = DB::table('jadwal')->get();

        return view('jadwal', ['jadwal' => $jadwal]);
    }

    // Menampilkan view form tambah jadwal
    public function create()
    {
        $pasien = DB::table('pasien')->get();
        $dokter = DB::table('dokter')->get();
        
        return view('tambah_jadwal', ['pasien' => $pasien, 'dokter' => $dokter]);
    }

    // Menyimpan data ke dalam table jadwal
    public function store(Request $request)
    {
        DB::table('jadwal')->insert([
            'nama_pasien' => $request->nama_pasien,
            'umur_pasien' => $request->umur_pasien,
            'nama_dokter' => $request->nama_dokter,
            'tgl_tindakan' => $request->tgl_tindakan,
            'jam_tindakan' => $request->jam_tindakan,
            'status' => $request->status,
            'ket_status' => $request->ket_status
        ]);

        return redirect()->route('jadwal.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    // Meng-edit data jadwal
    public function edit($id)
    {
        $jadwal = DB::table('jadwal')->where('id', $id)->get();

        return view('edit_jadwal', ['jadwal' => $jadwal]);
    }

    // Update jadwal yg sudah di-edit
    public function update(Request $request)
    {
        DB::table('jadwal')->where('id', $request->id)->update([
            'nama_pasien' => $request->nama_pasien,
            'umur_pasien' => $request->umur_pasien,
            'nama_dokter' => $request->nama_dokter,
            'tgl_tindakan' => $request->tgl_tindakan,
            'jam_tindakan' => $request->jam_tindakan,
            'status' => $request->status,
            'ket_status' => $request->ket_status
        ]);

        return redirect()->route('jadwal.index');
    }

    //Menghapus data jadwal
    public function destroy($id)
    {
        DB::table('jadwal')->where('id', $id)->delete();

        return redirect()->route('jadwal.index');
    }
}
