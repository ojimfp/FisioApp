<?php

namespace App\Http\Controllers;

use App\Pembayaran;
use App\RekamMedis;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Facade\Ignition\Tabs\Tab;

class PembayaranController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    // Menampilkan halaman utama pembayaran
    public function index()
    {
        $pembayaran = Pembayaran::all();

        $result = [
            'meta' => [
                'title'         => config('app.name') . ' - ' . 'Riwayat Pembayaran',
                'side_active'   => 'pembayaran'
            ],
            'pembayaran' => $pembayaran
        ];

        return view('pembayaran', $result);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $rekam_medis = RekamMedis::with('tindakan')->findOrFail($id);
        $result = [
            'meta' => [
                'title'         => config('app.name') . ' - ' . 'Riwayat Pembayaran',
                'side_active'   => 'pembayaran'
            ],
            'rekam_medis' => $rekam_medis
        ];

        return view('tambah_pembayaran', $result);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $pembayaran = new Pembayaran;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Pembayaran  $pembayaran
     * @return \Illuminate\Http\Response
     */
    public function show(Pembayaran $pembayaran)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Pembayaran  $pembayaran
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        return view('edit_tagihan');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Pembayaran  $pembayaran
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pembayaran $pembayaran)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Pembayaran  $pembayaran
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pembayaran $pembayaran)
    {
        //
    }
}
