<?php

namespace App\Http\Controllers;

use App\Gaji;
use App\Dokter;
use App\Pembayaran;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Carbon\Carbon;

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
        // $gaji = Gaji::all()->where('dokter_id', $id);
        $result = [
            'meta' => [
                'title'         => config('app.name') . ' - ' . 'Gaji Karyawan',
                'side_active'   => 'gaji'
            ],
            'dokter' => $dokter
            // 'gaji' => $gaji
        ];
        return view('gaji', $result);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $dokter = Dokter::findOrFail($id);
        $hari_masuk = Pembayaran::where('dokter_id', $id)->whereMonth('created_at', Carbon::now()->month)->count('dokter_id');
        $total_tindakan = Pembayaran::where('dokter_id', $id)->whereMonth('created_at', Carbon::now()->month)
            ->whereHas('tindakan', function ($qy) {
                $qy->where('nama_tindakan', 'NOT LIKE', '%Exercise%');
            })->sum('total_biaya');
        $total_exercise = Pembayaran::where('dokter_id', $id)->whereMonth('created_at', Carbon::now()->month)
            ->whereHas('tindakan', function ($q) {
                $q->where('nama_tindakan', 'LIKE', '%Exercise%');
            })->sum('total_biaya');
        $total_minggu = Pembayaran::where('dokter_id', $id)->whereMonth('created_at', Carbon::now()->month)
            ->whereRaw('WEEKDAY(pembayaran.created_at) = 6')->sum('total_biaya');
        $jml_karyawan = Pembayaran::whereMonth('created_at', Carbon::now()->month)
            ->whereRaw('WEEKDAY(pembayaran.created_at) = 6')->count('dokter_id');

        $result = [
            'meta' => [
                'title'         => config('app.name') . ' - ' . 'Tambah Gaji',
                'side_active'   => 'pasien'
            ],
            'dokter' => $dokter,
            'hari_masuk' => $hari_masuk,
            'total_tindakan' => $total_tindakan,
            'total_exercise' => $total_exercise,
            'total_minggu' => $total_minggu,
            'jml_karyawan' => $jml_karyawan
        ];

        return view('tambah_gaji', $result);
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
