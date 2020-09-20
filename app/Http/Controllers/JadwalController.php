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
        $result = [
            'meta' => [
                'title'         => config('app.name').' - '.'List Jadwal Pasien',
                'side_active'   => 'jadwal'
            ],
            'jadwal' => $jadwal
        ];
        return view('jadwal', $result);
    }

    // Menampilkan view form tambah jadwal
    public function create()
    {
        $pasien = DB::table('pasien')->get();
        $dokter = DB::table('dokter')->get();
        $result = [
            'meta' => [
                'title'         => config('app.name').' - '.'Tambah Jadwal Pasien',
                'side_active'   => 'jadwal'
            ],
            'pasien' => $pasien,
            'dokter' => $dokter
        ];
        return view('tambah_jadwal',$result);
    }

    // Menyimpan data ke dalam table jadwal
    public function store(Request $request)
    {
        DB::table('jadwal')->insert([
            'pasien_id' => $request->pasien_id,
            'umur_pasien' => $request->umur_pasien,
            'dokter_id' => $request->dokter_id,
            'tgl_tindakan' => $request->tgl_tindakan,
            'jam_tindakan' => $request->jam_tindakan,
            'status' => $request->status,
            // 'ket_status' => $request->ket_status
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
        $result = [
            'meta' => [
                'title'         => config('app.name').' - '.'Ubah Jadwal Pasien',
                'side_active'   => 'jadwal'
            ],
            'jadwal' => $jadwal
        ];
        return view('edit_jadwal', $result);
    }

    // Update jadwal yg sudah di-edit
    public function update(Request $request)
    {
        DB::table('jadwal')->where('id', $request->id)->update([
            'pasien_id' => $request->pasien_id,
            'umur_pasien' => $request->umur_pasien,
            'dokter_id' => $request->dokter_id,
            'tgl_tindakan' => $request->tgl_tindakan,
            'jam_tindakan' => $request->jam_tindakan,
            'status' => $request->status,
            // 'ket_status' => $request->ket_status
        ]);

        return redirect()->route('jadwal.index');
    }

    //Menghapus data jadwal
    public function destroy($id)
    {
        DB::table('jadwal')->where('id', $id)->delete();

        return redirect()->route('jadwal.index');
    }

    public function getDataPasien(Request $request)
    {
        $id = $request->id;
        $datapasien = DB::table('pasien')->where('id',$id)->get();

        return response()->json([
            'datapasien' => $datapasien
        ]);
    }
}
