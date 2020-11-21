<?php

namespace App\Http\Controllers;

use App\Gaji;
use App\Dokter;
use App\Pembayaran;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Carbon\Carbon;
use DateTime;
use NumberFormatter;

class GajiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $gaji = Gaji::all();

        $result = [
            'meta' => [
                'title'         => config('app.name') . ' - ' . 'Gaji Karyawan',
                'side_active'   => 'gaji'
            ],
            'gaji' => $gaji
        ];

        return view('gaji', $result);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexIndividu($id)
    {
        $dokter = Dokter::findOrFail($id);
        $gaji = Gaji::all()->where('dokter_id', $id);

        $result = [
            'meta' => [
                'title'         => config('app.name') . ' - ' . 'Gaji per Karyawan',
                'side_active'   => 'gaji'
            ],
            'dokter' => $dokter,
            'gaji' => $gaji
        ];

        return view('gaji_individu', $result);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $dokter = Dokter::findOrFail($id);
        // $hari_masuk = Pembayaran::where('dokter_id', $id)->whereMonth('created_at', Carbon::now()->subMonth())->count('dokter_id');
        // $total_tindakan = Pembayaran::where('dokter_id', $id)->whereMonth('created_at', Carbon::now()->subMonth())
        //     ->whereHas('tindakan', function ($q) {
        //         $q->where('nama_tindakan', 'NOT LIKE', '%Exercise%');
        //     })->sum('total_biaya');
        // $total_exercise = Pembayaran::where('dokter_id', $id)->whereMonth('created_at', Carbon::now()->subMonth())
        //     ->whereHas('tindakan', function ($q) {
        //         $q->where('nama_tindakan', 'LIKE', '%Exercise%');
        //     })->sum('total_biaya');
        // $total_minggu_satu = Pembayaran::where('dokter_id', $id)->whereDay('created_at', Carbon::parse('first sunday of previous month'))
        //     ->sum('total_biaya');
        // $jml_karyawan_satu = Pembayaran::whereDay('created_at', Carbon::parse('first sunday of previous month'))
        //     ->count('dokter_id');
        // $total_minggu_dua = Pembayaran::where('dokter_id', $id)->whereDay('created_at', Carbon::parse('second sunday of previous month'))
        //     ->sum('total_biaya');
        // $jml_karyawan_dua = Pembayaran::whereDay('created_at', Carbon::parse('second sunday of previous month'))
        //     ->count('dokter_id');
        // $total_minggu_tiga = Pembayaran::where('dokter_id', $id)->whereDay('created_at', Carbon::parse('third sunday of previous month'))
        //     ->sum('total_biaya');
        // $jml_karyawan_tiga = Pembayaran::whereDay('created_at', Carbon::parse('third sunday of previous month'))
        //     ->count('dokter_id');
        // $total_minggu_empat = Pembayaran::where('dokter_id', $id)->whereDay('created_at', Carbon::parse('fourth sunday of previous month'))
        //     ->sum('total_biaya');
        // $jml_karyawan_empat = Pembayaran::whereDay('created_at', Carbon::parse('fourth sunday of previous month'))
        //     ->count('dokter_id');
        // $total_minggu_lima = Pembayaran::where('dokter_id', $id)->whereDay('created_at', Carbon::parse('fifth sunday of previous month'))
        //     ->sum('total_biaya');
        // $jml_karyawan_lima = Pembayaran::whereDay('created_at', Carbon::parse('fifth sunday of previous month'))
        //     ->count('dokter_id');
        // $bulan_gajian = Pembayaran::whereDay('created_at', Carbon::parse('last day of previous month'));

        $result = [
            'meta' => [
                'title'         => config('app.name') . ' - ' . 'Tambah Gaji',
                'side_active'   => 'gaji'
            ],
            // 'dokter' => $dokter,
            // 'hari_masuk' => $hari_masuk,
            // 'total_tindakan' => $total_tindakan,
            // 'total_exercise' => $total_exercise,
            // 'total_minggu_satu' => $total_minggu_satu,
            // 'jml_karyawan_satu' => $jml_karyawan_satu,
            // 'total_minggu_dua' => $total_minggu_dua,
            // 'jml_karyawan_dua' => $jml_karyawan_dua,
            // 'total_minggu_tiga' => $total_minggu_tiga,
            // 'jml_karyawan_tiga' => $jml_karyawan_tiga,
            // 'total_minggu_empat' => $total_minggu_empat,
            // 'jml_karyawan_empat' => $jml_karyawan_empat,
            // 'total_minggu_lima' => $total_minggu_lima,
            // 'jml_karyawan_lima' => $jml_karyawan_lima
            // 'bulan_gajian' => $bulan_gajian
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
        $dokter = Dokter::findOrFail($request->dokter_id);

        $gaji = new Gaji;

        $gaji->dokter()->associate($request->dokter_id);
        $gaji->hari_kerja = $request->hari_kerja;
        $gaji->hari_masuk = $request->hari_masuk;
        $gaji->gaji_bersih = $request->gaji_bersih;
        $gaji->ins_koor = $request->ins_koor;
        $gaji->ins_tindakan = $request->ins_tindakan;
        $gaji->ins_exe = $request->ins_exe;
        $gaji->ins_minggu_satu = $request->ins_minggu_satu;
        $gaji->ins_minggu_dua = $request->ins_minggu_dua;
        $gaji->ins_minggu_tiga = $request->ins_minggu_tiga;
        $gaji->ins_minggu_empat = $request->ins_minggu_empat;
        $gaji->ins_minggu_lima = $request->ins_minggu_lima;
        $gaji->bonus = $request->bonus;
        $gaji->total_gaji = $request->total_gaji;
        // $gaji->bulan_gajian = $request->bulan_gajian;
        $gaji->save();

        return redirect()->route('slip.gaji', $dokter);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Gaji  $gaji
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $gaji = Gaji::findOrFail($id);

        $result = [
            'meta' => [
                'title'         => config('app.name') . ' - ' . 'Edit Gaji Karyawan',
                'side_active'   => 'gaji'
            ],
            'gaji' => $gaji
        ];

        return view('edit_gaji', $result);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Gaji  $gaji
     * @return \Illuminate\Http\Response
     */
    public function editIndividu($id)
    {
        $gaji = Gaji::findOrFail($id);

        $result = [
            'meta' => [
                'title'         => config('app.name') . ' - ' . 'Edit Gaji Karyawan',
                'side_active'   => 'gaji'
            ],
            'gaji' => $gaji
        ];

        return view('edit_gaji_individu', $result);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Gaji  $gaji
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $gaji = Gaji::findOrFail($id);

        $gaji->hari_kerja = $request->hari_kerja;
        $gaji->gaji_bersih = $request->gaji_bersih;
        $gaji->ins_koor = $request->ins_koor;
        $gaji->bonus = $request->bonus;
        $gaji->total_gaji = $request->total_gaji;

        $gaji->update();

        return redirect()->route('gaji.index', $gaji->dokter->id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Gaji  $gaji
     * @return \Illuminate\Http\Response
     */
    public function updateIndividu(Request $request, $id)
    {
        $gaji = Gaji::findOrFail($id);

        $gaji->hari_kerja = $request->hari_kerja;
        $gaji->gaji_bersih = $request->gaji_bersih;
        $gaji->ins_koor = $request->ins_koor;
        $gaji->bonus = $request->bonus;
        $gaji->total_gaji = $request->total_gaji;

        $gaji->update();

        return redirect()->route('gaji.index.ind', $gaji->dokter->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Gaji  $gaji
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $gaji = Gaji::findOrFail($id);

        $gaji->delete();

        return redirect()->route('gaji.index', $gaji->dokter->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Gaji  $gaji
     * @return \Illuminate\Http\Response
     */
    public function destroyIndividu($id)
    {
        $gaji = Gaji::findOrFail($id);

        $gaji->delete();

        return redirect()->route('gaji.index.ind', $gaji->dokter->id);
    }

    public function search(Request $request)
    {
        $keyword = $request->keyword;

        // if ($request->has('start_date')) {
        //     $start_date = \DateTime::createFromFormat('d/m/Y', $request->start_date);
        //     $start_date = $start_date->format('Y-m-d');
        // } else {
        //     $start_date = new DateTime('today');
        //     $start_date = $start_date->format('Y-m-d');
        // }

        // if ($request->has('end_date')) {
        //     $end_date = \DateTime::createFromFormat('d/m/Y', $request->end_date);
        //     $end_date = $end_date->format('Y-m-d');
        // } else {
        //     $end_date = new DateTime('today');
        //     $end_date = $end_date->format('Y-m-d');
        // }

        if ($request->has('keyword')) {
            $gaji = Gaji::where('dokter_id', 'LIKE', "%" . $keyword . "%")
                ->orWhereHas('dokter', function ($q) use ($keyword) {
                    $q->where('nama_dokter', 'LIKE', "%" . $keyword . "%");
                })->get();
        }

        // if ($request->has('start_date') && $request->has('end_date')) {
        // $start_date = \DateTime::createFromFormat('d/m/Y', $request->start_date);
        // $start_date = $start_date->format('Y-m-d');
        // $end_date = \DateTime::createFromFormat('d/m/Y', $request->end_date);
        // $end_date = $end_date->format('Y-m-d');

        //     $gaji = Gaji::whereBetween('created_at', [$start_date, $end_date])->get();
        // }

        $result = [
            'meta' => [
                'title'         => config('app.name') . ' - ' . 'Gaji Karyawan',
                'side_active'   => 'gaji'
            ],
            'gaji' => $gaji
        ];

        return view('gaji', $result);
    }

    public function slipGaji($id)
    {
        $gaji = Gaji::findOrFail($id);
        $terbilang = new NumberFormatter('id_ID', NumberFormatter::SPELLOUT);

        $result = [
            'meta' => [
                'title'         => config('app.name') . ' - ' . 'Slip Gaji',
                'side_active'   => 'gaji'
            ],
            'gaji' => $gaji,
            'terbilang' => $terbilang
        ];

        return view('slip_gaji', $result);
    }
}
