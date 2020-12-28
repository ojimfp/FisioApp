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
            'pembayaran'    => $pembayaran,
            'start_date'    => '',
            'end_date'      => '',
            'start_time'    => '00:00:00',
            'end_time'      => '23:59:59'
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
        $pembayaran->users()->associate($request->id_terapis);
        $pembayaran->subtotal = $request->total;
        $pembayaran->diskon_persen = $request->diskon_persen;
        $pembayaran->diskon_rupiah = $request->diskon_rupiah;
        $pembayaran->total_biaya = $request->grand_total;
        $pembayaran->tipe_pembayaran = $request->tipe_pembayaran;
        $pembayaran->nama_admin = $request->nama_admin;
        $pembayaran->catatan = $request->catatan;
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
        $pembayaran->catatan = $request->catatan;
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
        $pembayaran->catatan = $request->catatan;
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

    private function getFormattedData($data)
    {
        // STORE DATE
        $end_date = \DateTime::createFromFormat('d/m/Y', $data->end_date);
        $end_date = $end_date->format('Y-m-d');
        $start_date = \DateTime::createFromFormat('d/m/Y', $data->start_date);
        $start_date = $start_date->format('Y-m-d');

        //STORE TIME
        $start_time = $data->start_time;
        $end_time = $data->end_time;

        return Pembayaran::whereBetween(DB::RAW('DATE(updated_at)'), [$start_date, $end_date])
            ->whereBetween(DB::RAW('TIME(updated_at)'), [$start_time, $end_time])->get();
    }

    public function search(Request $request)
    {
        // STORE DATE
        $end_date = \DateTime::createFromFormat('d/m/Y', $request->end_date);
        $end_date = $end_date->format('Y-m-d');
        $start_date = \DateTime::createFromFormat('d/m/Y', $request->start_date);
        $start_date = $start_date->format('Y-m-d');

        //STORE TIME
        $start_time = $request->start_time;
        $end_time = $request->end_time;

        $pembayaran = Pembayaran::whereBetween(DB::RAW('DATE(updated_at)'), [$start_date, $end_date])
            ->whereBetween(DB::RAW('TIME(updated_at)'), [$start_time, $end_time])->get();

        $result = [
            'meta' => [
                'title'         => config('app.name') . ' - ' . 'Pembayaran',
                'side_active'   => 'pembayaran'
            ],
            'pembayaran' => $pembayaran,
            'start_date'         => $start_date,
            'end_date'           => $end_date,
            'start_time'         => $start_time,
            'end_time'           => $end_time
        ];

        return view('pembayaran', $result);
    }

    public static function print(Request $request)
    {
        $start_date = $request->start_date ? $request->start_date : '';
        $end_date = $request->end_date ? $request->end_date : '';
        $start_time = $request->start_time ? $request->start_time : '00:00:00';
        $end_time = $request->end_time ? $request->end_time : '23:59:59';

        if ($start_date && $end_date) {
            $pembayaran = Pembayaran::whereBetween(DB::RAW('DATE(updated_at)'), [$start_date, $end_date])
                ->whereBetween(DB::RAW('TIME(updated_at)'), [$start_time, $end_time])->get();
        } else {
            $pembayaran = Pembayaran::all();
        }

        return view('pembayaran_pdf', ['pembayaran' => $pembayaran]);
        // $pdf = PDF::loadview('pembayaran_pdf',  ['pembayaran' => $pembayaran])->setPaper('A4','landscape');
        // return $pdf->stream();
        // return $pdf->download('invoice_pdf');

        // $pdf = SnappyPdf::loadview('invoice_pdf', ['pembayaran' => $pembayaran]);
        // return $pdf->download('invoice.pdf');
        // return view('invoice', $result);
    }
    public static function download(Request $request)
    {
        $start_date = $request->start_date ? $request->start_date : '';
        $end_date = $request->end_date ? $request->end_date : '';
        $start_time = $request->start_time ? $request->start_time : '00:00:00';
        $end_time = $request->end_time ? $request->end_time : '23:59:59';

        if ($start_date && $end_date) {
            $pembayaran = Pembayaran::whereBetween(DB::RAW('DATE(updated_at)'), [$start_date, $end_date])
                ->whereBetween(DB::RAW('TIME(updated_at)'), [$start_time, $end_time])->get();
            $filename = 'Pembayaran ' . $start_date . '-' . $end_date . '.pdf';
        } else {
            $pembayaran = Pembayaran::all();
            $filename = 'Catatan Pembayaran.pdf';
        }

        // return view('pembayaran_pdf', ['pembayaran' => $pembayaran]);
        $pdf = PDF::loadview('pembayaran_down',  ['pembayaran' => $pembayaran])->setPaper('A4', 'landscape');
        // return $pdf->stream();
        return $pdf->download($filename);

        // $pdf = SnappyPdf::loadview('pembayaran_print', ['pembayaran' => $pembayaran]);
        // return $pdf->download('pembayaran.pdf');
        // return view('pembayaran', $result);
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

    public static function printInvoice($id)
    {
        $pembayaran = Pembayaran::with('tindakan')->findOrFail($id);
        return view('invoice_pdf', ['pembayaran' => $pembayaran]);
    }

    public static function downloadInvoice($id)
    {
        $pembayaran = Pembayaran::with('tindakan')->findOrFail($id);
        $filename = 'Invoice_' . $id . '.pdf';

        $pdf = PDF::loadview('invoice_pdf',  ['pembayaran' => $pembayaran])->setPaper('A4', 'potrait');
        // return $pdf->stream();
        return $pdf->download($filename);
    }
}
