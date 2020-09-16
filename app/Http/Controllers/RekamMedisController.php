<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\RekamMedis;
use App\Pasien;
use App\Tindakan;

class RekamMedisController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $pasien = Pasien::find($id);
        $rekam_medis = RekamMedis::all();

        return view('riwayat_pasien', [
            'pasien' => $pasien,
            'rekam_medis' => $rekam_medis
        ]);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $pasien = Pasien::find($id);
        $tindakan = Tindakan::all();

        return view('tambah_rekam_medis', [
            'pasien' => $pasien,
            'tindakan' => $tindakan
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // DB::table('rekam_medis')->insert([
        //     'anamnesa' => $request->anamnesa,
        //     'pemeriksaan' => $request->pemeriksaan,
        //     'diagnosa' => $request->diagnosa,
        //     'tindakan' => $request->tindakan,
        //     'nama_terapis' => $request->nama_terapis
        // ]);
        $rekam_medis = new RekamMedis;

        $rekam_medis->pasien()->associate($request->id_pasien);
        $rekam_medis->nama_terapis = $request->nama_terapis;
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
