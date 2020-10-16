<?php

namespace App\Http\Controllers;

use App\Pembayaran;
use App\RekamMedis;
use App\Pasien;
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
                'title'         => config('app.name') . ' - ' . 'Tambah Pembayaran',
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
        $pasien = Pasien::findOrFail($request->id_pasien);

        $pembayaran = new Pembayaran;

        $pembayaran->rekam_medis()->associate($request->id_rekam_medis);
        $pembayaran->pasien()->associate($request->id_pasien);
        $pembayaran->dokter()->associate($request->id_terapis);
        $pembayaran->subtotal = $request->total;
        $pembayaran->diskon_persen = $request->diskon_persen;
        $pembayaran->diskon_rupiah = $request->diskon_rupiah;
        $pembayaran->total_biaya = $request->grand_total;
        $pembayaran->tipe_pembayaran = $request->tipe_pembayaran;
        $pembayaran->users()->associate($request->admin);
        $pembayaran->save();

        $pembayaran->tindakan()->sync($request->tindakan);

        return redirect()->route('invoice', $pembayaran->id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Pembayaran  $pembayaran
     * @return \Illuminate\Http\Response
     */
    public function editFromPembayaran($id)
    {
        $pembayaran = Pembayaran::with('tindakan')->findOrFail($id);
        $result = [
            'meta' => [
                'title'         => config('app.name') . ' - ' . 'Edit Pembayaran',
                'side_active'   => 'pembayaran'
            ],
            'pembayaran' => $pembayaran
        ];

        return view('edit_pembayaran_p', $result);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Pembayaran  $pembayaran
     * @return \Illuminate\Http\Response
     */
    public function editFromRekamMedis($id)
    {
        $pembayaran = Pembayaran::with('tindakan')->findOrFail($id);
        $result = [
            'meta' => [
                'title'         => config('app.name') . ' - ' . 'Edit Pembayaran',
                'side_active'   => 'pembayaran'
            ],
            'pembayaran' => $pembayaran
        ];

        return view('edit_pembayaran_rm', $result);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Pembayaran  $pembayaran
     * @return \Illuminate\Http\Response
     */
    public function updateFromPembayaran(Request $request, $id)
    {
        $pembayaran = Pembayaran::findOrFail($id);

        $pembayaran->diskon_persen = $request->diskon_persen;
        $pembayaran->diskon_rupiah = $request->diskon_rupiah;
        $pembayaran->total_biaya = $request->grand_total;
        $pembayaran->tipe_pembayaran = $request->tipe_pembayaran;
        $pembayaran->tindakan()->sync($request->tindakan);
        $pembayaran->update();

        return redirect()->route('pembayaran.index');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Pembayaran  $pembayaran
     * @return \Illuminate\Http\Response
     */
    public function updateFromRekamMedis(Request $request, $id)
    {
        $pembayaran = Pembayaran::findOrFail($id);

        $pembayaran->diskon_persen = $request->diskon_persen;
        $pembayaran->diskon_rupiah = $request->diskon_rupiah;
        $pembayaran->total_biaya = $request->grand_total;
        $pembayaran->tipe_pembayaran = $request->tipe_pembayaran;
        $pembayaran->tindakan()->sync($request->tindakan);
        $pembayaran->update();

        return redirect()->route('rekam-medis.index', $pembayaran->pasien->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Pembayaran  $pembayaran
     * @return \Illuminate\Http\Response
     */
    public function destroyFromPembayaran($id)
    {
        $pembayaran = Pembayaran::findOrFail($id);

        $pembayaran->delete();

        return redirect()->route('pembayaran.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Pembayaran  $pembayaran
     * @return \Illuminate\Http\Response
     */
    public function destroyFromRekamMedis($id)
    {
        $pembayaran = Pembayaran::findOrFail($id);

        $pembayaran->delete();

        return redirect()->route('rekam-medis.index', $pembayaran->pasien->id);
    }

    public function invoice($id)
    {
        $pembayaran = Pembayaran::with('tindakan')->findOrFail($id);
        $result = [
            'meta' => [
                'title'         => config('app.name') . ' - ' . 'Invoice',
                'side_active'   => 'pembayaran'
            ],
            'pembayaran' => $pembayaran
        ];

        return view('invoice', $result);
    }
}
