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

        $pembayaran->rekam_medis()->associate($request->rekam_medis_id);
        $pembayaran->pasien()->associate($request->id_pasien);
        $pembayaran->tipe_pembayaran = $request->tipe_pembayaran;
        $pembayaran->diskon_persen = $request->diskon_persen;
        $pembayaran->diskon_rupiah = $request->diskon_rupiah;
        $pembayaran->total_biaya = $request->grand_total;
        $pembayaran->save();

        $pembayaran->tindakan()->sync($request->tindakan);

        return redirect()->route('rekam-medis.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Pembayaran  $pembayaran
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pembayaran = Pembayaran::with('tindakan')->findOrFail($id);
        $result = [
            'meta' => [
                'title'         => config('app.name') . ' - ' . 'Riwayat Pembayaran',
                'side_active'   => 'pembayaran'
            ],
            'pembayaran' => $pembayaran
        ];

        return view('edit_pembayaran', $result);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Pembayaran  $pembayaran
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $pembayaran = Pembayaran::findOrFail($id);

        $pembayaran->tipe_pembayaran = $request->tipe_pembayaran;
        $pembayaran->diskon_persen = $request->diskon_persen;
        $pembayaran->diskon_rupiah = $request->diskon_rupiah;
        $pembayaran->total_biaya = $request->grand_total;
        $pembayaran->tindakan()->sync($request->tindakan);
        $pembayaran->update();

        return redirect()->route('rekam-medis.index');
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
