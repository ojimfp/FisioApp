<?php

namespace App\Http\Controllers;

use App\Pembayaran;
use App\RekamMedis;
use App\Pasien;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Facade\Ignition\Tabs\Tab;
use PDF;
use DateTime;
use View;

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
            'pembayaran' => $pembayaran,
            'start_date' => '',
            'end_date'  => ''
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

    public function search(Request $request)
    {
        if ($request->end_date) {
            $end_date = \DateTime::createFromFormat('d/m/Y', $request->end_date);
            $end_date = $end_date->format('Y-m-d');
        }else{
            $end_date = new DateTime('today');
            $end_date = $end_date->format('Y-m-d');
        }
        if ($request->start_date) {
            $start_date = \DateTime::createFromFormat('d/m/Y', $request->start_date);
            $start_date = $start_date->format('Y-m-d');
        }else{
            $start_date = new DateTime('today');
            $start_date = $start_date->format('Y-m-d');
        }

        $pembayaran = Pembayaran::whereBetween('created_at', [$start_date, $end_date])->get();
        $result = [
            'meta' => [
                'title'         => config('app.name') . ' - ' . 'Pembayaran',
                'side_active'   => 'pembayaran'
            ],
            'pembayaran' => $pembayaran,
            'start_date'         => $start_date,
            'end_date'           => $end_date
        ];

        return view('pembayaran', $result);
    }
    public static function download(Request $request)
    {
        $start_date = $request->start ? $request->start : '';
        $end_date = $request->end ? $request->end : '';

        if ($start_date && $end_date) {
            $pembayaran = Pembayaran::whereBetween('created_at', [$start_date, $end_date])->get();
        } else {
            $pembayaran = Pembayaran::all();
        }

        $pdf = PDF::loadview('pembayaran_pdf',  ['pembayaran' => $pembayaran])->setPaper('A4','landscape');
        return $pdf->stream();
        // return $pdf->download('invoice_pdf');

        // $pdf = SnappyPdf::loadview('invoice_pdf', ['pembayaran' => $pembayaran]);
        // return $pdf->download('invoice.pdf');
        // return view('invoice', $result);
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

    public static function invoicePDF($id)
    {
        $pembayaran = Pembayaran::with('tindakan')->findOrFail($id);
        return view('invoice_pdf', ['pembayaran' => $pembayaran]);
        // $pembayaran = Pembayaran::with('tindakan')->findOrFail($id);
        // $pdf = PDF::loadview('invoice_pdf',  ['pembayaran' => $pembayaran])->setPaper('A4','potrait');
        // return $pdf->stream();
        // return $pdf->download('invoice_pdf');

        // $pdf = SnappyPdf::loadview('invoice_pdf', ['pembayaran' => $pembayaran]);
        // return $pdf->download('invoice.pdf');
        // return view('invoice', $result);
    }

}
