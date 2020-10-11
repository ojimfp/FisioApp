<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Facade\Ignition\Tabs\Tab;
use DateTime;
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
        // $jadwal = Jadwal::all();
        $jadwal_pg = Jadwal::all()->where('shift', '1');
        $jadwal_sg = Jadwal::all()->where('shift', '2');
        $today = new DateTime('today');

        $result = [
            'meta' => [
                'title'         => config('app.name').' - '.'List Jadwal Pasien',
                'side_active'   => 'jadwal'
            ],
            'jadwal_pg' => $jadwal_pg,
            'jadwal_sg' => $jadwal_sg,
            'pasien' => $pasien,
            'dokter' => $dokter,
            'today' => $today
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

        $jadwal = new Jadwal;

        $jadwal->pasien()->associate($request->pasien_id);
        $jadwal->dokter()->associate($request->dokter_id);
        $jadwal->tgl_tindakan = $request->tgl_tindakan;
        $jadwal->shift = $request->shift;
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
        $dokter = Dokter::all();
        $pasien = Pasien::findOrFail($jadwal->pasien_id);
        $today = new DateTime('today');
        $tgl = new DateTime($pasien->tgl_lahir);
        $umur = $today->diff($tgl)->y;

        $result = [
            'meta' => [
                'title'         => config('app.name').' - '.'Ubah Jadwal Pasien',
                'side_active'   => 'jadwal'
            ],
            'jadwal' => $jadwal,
            'dokter' => $dokter,
            'pasien' => $pasien,
            'umur' => $umur
        ];
        // return $result;
        return view('edit_jadwal', $result);
    }

    // Update jadwal yg sudah di-edit
    public function update(Request $request, $id)
    {
        // DB::table('jadwal')->where('id', $request->id)->update([
        //     'pasien_id' => $request->pasien_id,
        //     'dokter_id' => $request->dokter_id,
        //     'tgl_tindakan' => $request->tgl_tindakan,
        //     'shift' => $request->shift,
        //     'jam_tindakan' => $request->jam_tindakan,
        //     'status' => $request->status
        // ]);

        // return redirect()->route('jadwal.index');
        $jadwal = Jadwal::findOrFail($id);

        $jadwal->dokter()->associate($request->nama_dokter);
        $jadwal->tgl_tindakan = $request->tgl_tindakan;
        $jadwal->shift = $request->shift;
        $jadwal->jam_tindakan = $request->jam_tindakan;
        $jadwal->status = $request->status;
        $jadwal->update();

        return redirect()->route('jadwal.index', $jadwal->pasien->id);
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
