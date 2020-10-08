<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\RekamMedis;
use App\Pasien;
use App\Dokter;
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
                'title'         => config('app.name') . ' - ' . 'Riwayat Pembayaran',
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
        $dokter = Dokter::all();
        $tindakan = Tindakan::all();

        $result = [
            'meta' => [
                'title'         => config('app.name') . ' - ' . 'Tambah Rekam Medis',
                'side_active'   => 'pasien'
            ],
            'pasien' => $pasien,
            'tindakan' => $tindakan,
            'dokter' => $dokter
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
        $rekam_medis = new RekamMedis;

        $rekam_medis->pasien()->associate($request->id_pasien);
        $rekam_medis->dokter()->associate($request->nama_dokter);
        $rekam_medis->anamnesa = $request->anamnesa;
        $rekam_medis->pemeriksaan = $request->pemeriksaan;
        $rekam_medis->diagnosa = $request->diagnosa;
        $rekam_medis->save();

        $rekam_medis->tindakan()->sync($request->tindakan);

        return redirect()->route('rekam-medis.index');
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
        $dokter = Dokter::all();
        $tindakan = Tindakan::all();

        $result = [
            'meta' => [
                'title'         => config('app.name') . ' - ' . 'Edit Rekam Medis',
                'side_active'   => 'pasien'
            ],
            'rekam_medis' => $rekam_medis,
            'tindakan' => $tindakan,
            'dokter' => $dokter
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

        $rekam_medis->dokter()->associate($request->nama_dokter);
        $rekam_medis->anamnesa = $request->anamnesa;
        $rekam_medis->pemeriksaan = $request->pemeriksaan;
        $rekam_medis->tindakan()->sync($request->tindakan);
        $rekam_medis->update();

        return redirect()->route('rekam-medis.index');
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

        return redirect()->route('rekam-medis.index');
    }
}
