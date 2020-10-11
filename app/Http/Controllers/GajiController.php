<?php

namespace App\Http\Controllers;

use App\Gaji;
use App\Dokter;
use Illuminate\Http\Request;

class GajiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $dokter = Dokter::findOrFail($id);
        $result = [
            'meta' => [
                'title'         => config('app.name').' - '.'Gaji Karyawan',
                'side_active'   => 'gaji'
            ],
            'dokter' => $dokter
        ];
        return view('gaji', $result);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $dokter = Dokter::all();

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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Gaji  $gaji
     * @return \Illuminate\Http\Response
     */
    public function show(Gaji $gaji)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Gaji  $gaji
     * @return \Illuminate\Http\Response
     */
    public function edit(Gaji $gaji)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Gaji  $gaji
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Gaji $gaji)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Gaji  $gaji
     * @return \Illuminate\Http\Response
     */
    public function destroy(Gaji $gaji)
    {
        //
    }
}
