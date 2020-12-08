<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\RekamMedis;
use App\Pasien;
use App\Tindakan;
use App\Pembayaran;

class RekamMedisController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $pasien = Pasien::findOrFail($id);
        $rekam_medis = RekamMedis::all()->where('pasien_id', $id);
        $pembayaran = Pembayaran::all()->where('pasien_id', $id);

        $result = [
            'meta' => [
                'title'         => config('app.name') . ' - ' . 'Riwayat Pasien',
                'side_active'   => 'pembayaran'
            ],
            'pasien' => $pasien,
            'rekam_medis' => $rekam_medis,
            'pembayaran' => $pembayaran
        ];

        return view('riwayat_pasien', $result);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $pasien = Pasien::findOrFail($id);
        // $dokter = Dokter::all();
        $tindakan = Tindakan::all();

        $result = [
            'meta' => [
                'title'         => config('app.name') . ' - ' . 'Tambah Rekam Medis',
                'side_active'   => 'pasien'
            ],
            'pasien' => $pasien,
            'tindakan' => $tindakan
        ];

        return view('tambah_rekam_medis', $result);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $pasien = Pasien::findOrFail($request->id_pasien);

        $rekam_medis = new RekamMedis;

        $rekam_medis->pasien()->associate($request->id_pasien);
        $rekam_medis->users()->associate($request->id_user);

        if ($request->aps_dokter == 'APS') {
            $rekam_medis->aps_dokter = $request->aps_dokter;
        } else if ($request->aps_dokter == 'Dokter') {
            $rekam_medis->aps_dokter = $request->nama_dokter;
        }

        $rekam_medis->diagnosa_dokter = $request->diagnosa_dokter;
        $rekam_medis->nama_terapis = $request->nama_terapis;
        $rekam_medis->anamnesa = $request->anamnesa;
        $rekam_medis->pemeriksaan = $request->pemeriksaan;
        $rekam_medis->diagnosa_terapis = $request->diagnosa_terapis;
        $rekam_medis->save();

        $rekam_medis->tindakan()->sync($request->id_tindakan);

        return redirect()->route('rekam-medis.index', $pasien);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $rekam_medis = RekamMedis::findOrFail($id);
        $tindakan = Tindakan::all();

        $result = [
            'meta' => [
                'title'         => config('app.name') . ' - ' . 'Edit Rekam Medis',
                'side_active'   => 'pasien'
            ],
            'rekam_medis' => $rekam_medis,
            'tindakan' => $tindakan
        ];

        return view('edit_rekam_medis', $result);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $rekam_medis = RekamMedis::findOrFail($id);

        if ($request->aps_dokter == 'APS') {
            $rekam_medis->aps_dokter = $request->aps_dokter;
        } else if ($request->aps_dokter == 'Dokter') {
            $rekam_medis->aps_dokter = $request->nama_dokter;
        }

        $rekam_medis->diagnosa_dokter = $request->diagnosa_dokter;
        $rekam_medis->anamnesa = $request->anamnesa;
        $rekam_medis->pemeriksaan = $request->pemeriksaan;
        $rekam_medis->diagnosa_terapis = $request->diagnosa_terapis;
        $rekam_medis->tindakan()->sync($request->tindakan);
        $rekam_medis->update();

        return redirect()->route('rekam-medis.index', $rekam_medis->pasien->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $rekam_medis = RekamMedis::findOrFail($id);

        $rekam_medis->delete();

        return redirect()->route('rekam-medis.index', $rekam_medis->pasien->id);
    }

    public function getTindakan(Request $request)
    {
        $search = $request->search;

        if ($search == '') {
            $tindakan = Tindakan::orderBy('nama_tindakan', 'asc')->select('id', 'nama_tindakan')->limit(5)->get();
        } else {
            $tindakan = Tindakan::orderBy('nama_tindakan', 'asc')->select('id', 'nama_tindakan')
                ->where('nama_tindakan', 'LIKE', '%' . $search . '%')->limit(5)->get();
        }

        $response = array();
        foreach ($tindakan as $t) {
            $response[] = array("value" => $t->id, "label" => $t->nama_tindakan);
        }

        return response()->json($response);
    }
}
