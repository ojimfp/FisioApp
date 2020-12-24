<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Facade\Ignition\Tabs\Tab;
use DateTime;
use App\Jadwal;
use App\Pasien;
use App\Dokter;
use App\User;

class JadwalController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $pasien = Pasien::all();
        $users = User::all();
        $jadwal_pg = Jadwal::all()->where('shift', '1');
        $jadwal_sg = Jadwal::all()->where('shift', '2');
        $today = new DateTime('today');

        $result = [
            'meta' => [
                'title'         => config('app.name') . ' - ' . 'List Jadwal Pasien',
                'side_active'   => 'jadwal'
            ],
            'jadwal_pg' => $jadwal_pg,
            'jadwal_sg' => $jadwal_sg,
            'pasien' => $pasien,
            'users' => $users,
            'today' => $today
        ];
        return view('jadwal', $result);
    }

    // Menampilkan view form tambah jadwal
    public function create()
    {
        $pasien = Pasien::all();
        $users = User::all()->where('pekerjaan', '=', 'Fisioterapis');
        $result = [
            'meta' => [
                'title'         => config('app.name') . ' - ' . 'Tambah Jadwal Pasien',
                'side_active'   => 'jadwal'
            ],
            'pasien' => $pasien,
            'users' => $users
        ];
        return view('tambah_jadwal', $result);
    }

    // Menyimpan data ke dalam table jadwal
    public function store(Request $request)
    {

        $jadwal = new Jadwal;

        $jadwal->pasien()->associate($request->pasien_id);
        $jadwal->users()->associate($request->users_id);
        $jadwal->tgl_tindakan = $request->tgl_tindakan;
        $jadwal->shift = $request->shift;
        $jadwal->jam_tindakan = $request->jam_tindakan;
        $jadwal->status = $request->status;
        $jadwal->nama_admin = $request->nama_admin;
        $jadwal->save();

        return redirect()->route('jadwal.index');
    }

    // Meng-edit data jadwal
    public function edit($id)
    {
        $jadwal = Jadwal::findOrFail($id);
        $users = User::all()->where('pekerjaan', '=', 'Fisioterapis');
        $pasien = Pasien::findOrFail($jadwal->pasien_id);
        $today = new DateTime('today');
        $tgl = new DateTime($pasien->tgl_lahir);
        $umur = $today->diff($tgl)->y;

        $result = [
            'meta' => [
                'title'         => config('app.name') . ' - ' . 'Ubah Jadwal Pasien',
                'side_active'   => 'jadwal'
            ],
            'jadwal' => $jadwal,
            'users' => $users,
            'pasien' => $pasien,
            'umur' => $umur
        ];
        // return $result;
        return view('edit_jadwal', $result);
    }

    // Update jadwal yg sudah di-edit
    public function update(Request $request, $id)
    {
        $jadwal = Jadwal::findOrFail($id);

        $jadwal->users()->associate($request->nama_terapis);
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
        $jadwal = Jadwal::findOrFail($id);

        $jadwal->delete();

        return redirect()->route('jadwal.index');
    }

    public function getDataPasien(Request $request)
    {
        $id = $request->id;
        $datapasien = DB::table('pasien')->where('id', $id)->get();

        return response()->json([
            'datapasien' => $datapasien
        ]);
    }
}
