<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Facade\Ignition\Tabs\Tab;
use App\Jadwal;
use App\Pasien;
use App\Dokter;

class JadwalController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $pasien = Pasien::all();
        $dokter = Dokter::all();
        $jadwal = Jadwal::all();
        $result = [
            'meta' => [
                'title'         => config('app.name').' - '.'List Jadwal Pasien',
                'side_active'   => 'jadwal'
            ],
            'jadwal' => $jadwal,
            'pasien' => $pasien,
            'dokter' => $dokter
        ];
        return view('jadwal', $result);
    }

    // Menampilkan view form tambah jadwal
    public function create()
    {
        $pasien = Pasien::all();
        $dokter = Dokter::all();
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
        // DB::table('jadwal')->insert([
        //     'pasien_id' => $request->pasien_id,
        //     'umur_pasien' => $request->umur_pasien,
        //     'dokter_id' => $request->dokter_id,
        //     'tgl_tindakan' => $request->tgl_tindakan,
        //     'jam_tindakan' => $request->jam_tindakan,
        //     'status' => $request->status,
        //     // 'ket_status' => $request->ket_status
        // ]);

        $jadwal = new Jadwal;

        $jadwal->pasien()->associate($request->pasien_id);
        $jadwal->dokter()->associate($request->dokter_id);
        $jadwal->umur_pasien = $request->umur_pasien;
        $jadwal->tgl_tindakan = $request->tgl_tindakan;
        $jadwal->jam_tindakan = $request->jam_tindakan;
        $jadwal->status = $request->status;
        $jadwal->save();

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
        $jadwal = Jadwal::findOrFail($id);
        $pasien = Pasien::all();
        $dokter = Dokter::all();

        $jadwal->pasien()->associate($request->pasien_id);
        $jadwal->dokter()->associate($request->dokter_id);

        $result = [
            'meta' => [
                'title'         => config('app.name').' - '.'Ubah Jadwal Pasien',
                'side_active'   => 'jadwal'
            ],
            'jadwal' => $jadwal,
            'dokter' => $dokter,
            'pasien' => $pasien
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
