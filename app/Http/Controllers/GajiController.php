<?php

namespace App\Http\Controllers;

use App\Gaji;
use App\Pembayaran;
use App\User;
use App\Tindakan;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use DateTime;
use NumberFormatter;
use PDF;
use Symfony\Component\Console\Input\Input;

class GajiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        foreach (Auth::user()->roles as $role) {
            $role_name = $role->name;
        }
        if ($role_name == 'admin') {
            $gaji = Gaji::where('users_id', Auth::user()->id)->get();
        } else {
            $gaji = Gaji::all();
        }

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
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::all();

        $result = [
            'meta' => [
                'title'         => config('app.name') . ' - ' . 'Tambah Gaji',
                'side_active'   => 'gaji'
            ],
            'users' => $users
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
        $gaji = new Gaji;

        $gaji->users()->associate($request->users_id);
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
        $gaji->ins_hari_besar = $request->ins_hari_besar;
        $gaji->bonus = $request->bonus;
        $gaji->total_gaji = $request->total_gaji;
        $gaji->bulan_gajian = $request->bulan_gajian;
        $gaji->save();

        return redirect()->route('slip.gaji', $gaji->id);
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
        $gaji->ins_hari_besar = $request->ins_hari_besar;
        $gaji->bonus = $request->bonus;
        $gaji->total_gaji = $request->total_gaji;

        $gaji->update();

        return redirect()->route('gaji.index', $gaji->users->id);
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

        return redirect()->route('gaji.index', $gaji->users->id);
    }

    public function search(Request $request)
    {
        $keyword = $request->keyword;
        $bulan = $request->bulan_gajian;

        foreach (Auth::user()->roles as $role) {
            $role_name = $role->name;
        }

        if ($keyword && $bulan && $role_name == 'admin') {
            $gaji = Gaji::where('users_id', 'LIKE', "%" . $keyword . "%")
                ->whereMonth('bulan_gajian', $bulan)->where('users_id', Auth::user()->id)
                ->orWhereHas('users', function ($q) use ($keyword) {
                    $q->where('name', 'LIKE', "%" . $keyword . "%");
                })->whereMonth('bulan_gajian', $bulan)->where('users_id', Auth::user()->id)
                ->get();
        } else if ($keyword == null && $bulan && $role_name == 'admin') {
            $gaji = Gaji::whereMonth('bulan_gajian', $bulan)
                ->where('users_id', Auth::user()->id)->get();
        } else if ($keyword && $bulan == null && $role_name == 'admin') {
            $gaji = Gaji::where('users_id', 'LIKE', "%" . $keyword . "%")
                ->where('users_id', Auth::user()->id)
                ->orWhereHas('users', function ($q) use ($keyword) {
                    $q->where('name', 'LIKE', "%" . $keyword . "%");
                })->where('users_id', Auth::user()->id)->get();
        } else if ($keyword == null && $bulan == null && $role_name == 'admin') {
            $gaji = Gaji::where('users_id', Auth::user()->id)->get();
        }

        if ($keyword && $bulan && $role_name != 'admin') {
            $gaji = Gaji::where('users_id', 'LIKE', "%" . $keyword . "%")
                ->whereMonth('bulan_gajian', $bulan)
                ->orWhereHas('users', function ($q) use ($keyword) {
                    $q->where('name', 'LIKE', "%" . $keyword . "%");
                })->whereMonth('bulan_gajian', $bulan)->get();
        } else if ($keyword == null && $bulan && $role_name != 'admin') {
            $gaji = Gaji::whereMonth('bulan_gajian', $bulan)->get();
        } else if ($keyword && $bulan == null && $role_name != 'admin') {
            $gaji = Gaji::where('users_id', 'LIKE', "%" . $keyword . "%")
                ->orWhereHas('users', function ($q) use ($keyword) {
                    $q->where('name', 'LIKE', "%" . $keyword . "%");
                })->get();
        } else if ($keyword == null && $bulan == null && $role_name != 'admin') {
            $gaji = Gaji::all();
        }

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

    public function getData($id = 0)
    {
        $data = array(
            'data' => User::findOrFail($id),
            'pekerjaan' => User::where('id', $id)->first()->pekerjaan,
            'gaji_pokok' => User::where('id', $id)->first()->gaji_pokok,

            'hari_masuk_terapis' => Pembayaran::where('users_id', $id)->whereMonth('created_at', Carbon::now()->subMonth())
                ->distinct()->count(DB::raw('DATE(created_at)')),
            'hari_masuk_admin' => Pembayaran::where('admin_id', $id)->whereMonth('created_at', Carbon::now()->subMonth())
                ->distinct()->count(DB::raw('DATE(created_at)')),

            'biaya_tindakan' => Tindakan::where('nama_tindakan', 'NOT LIKE', '%Exercise Full%')
                ->where(function ($q) {
                    $q->whereNull('keterangan')->orWhereNotNull('keterangan')->whereNotIn('keterangan', ['Properti', 'properti', 'Property', 'property']);
                })
                ->whereHas('pembayaran', function ($q) use ($id) {
                    $q->where('users_id', $id)->whereMonth('pembayaran.created_at', Carbon::now()->subMonth());
                })->sum('harga_jual'),

            'biaya_exe' => Tindakan::where('nama_tindakan', 'LIKE', '%Exercise Full%')
                ->where(function ($q) {
                    $q->whereNull('keterangan')->orWhereNotNull('keterangan')->whereNotIn('keterangan', ['Properti', 'properti', 'Property', 'property']);
                })
                ->whereHas('pembayaran', function ($q) use ($id) {
                    $q->where('users_id', $id)->whereMonth('pembayaran.created_at', Carbon::now()->subMonth());
                })->sum('harga_jual'),

            'tindakan_minggu_satu' => Pembayaran::where('users_id', $id)->whereDay('created_at', Carbon::parse('first sunday of previous month'))
                ->whereHas('tindakan', function ($q) {
                    $q->whereNull('keterangan')->orWhereNotNull('keterangan')->whereNotIn('keterangan', ['Properti', 'properti', 'Property', 'property']);
                })->sum('total_biaya'),
            'jml_karyawan_satu' => Pembayaran::whereDay('created_at', Carbon::parse('first sunday of previous month'))
                ->count('users_id'),

            'tindakan_minggu_dua' => Pembayaran::where('users_id', $id)->whereDay('created_at', Carbon::parse('second sunday of previous month'))
                ->whereHas('tindakan', function ($q) {
                    $q->whereNull('keterangan')->orWhereNotNull('keterangan')->whereNotIn('keterangan', ['Properti', 'properti', 'Property', 'property']);
                })->sum('total_biaya'),
            'jml_karyawan_dua' => Pembayaran::whereDay('created_at', Carbon::parse('second sunday of previous month'))
                ->count('users_id'),

            'tindakan_minggu_tiga' => Pembayaran::where('users_id', $id)->whereDay('created_at', Carbon::parse('third sunday of previous month'))
                ->whereHas('tindakan', function ($q) {
                    $q->whereNull('keterangan')->orWhereNotNull('keterangan')->whereNotIn('keterangan', ['Properti', 'properti', 'Property', 'property']);
                })->sum('total_biaya'),
            'jml_karyawan_tiga' => Pembayaran::whereDay('created_at', Carbon::parse('third sunday of previous month'))
                ->count('users_id'),

            'tindakan_minggu_empat' => Pembayaran::where('users_id', $id)->whereDay('created_at', Carbon::parse('fourth sunday of previous month'))
                ->whereHas('tindakan', function ($q) {
                    $q->whereNull('keterangan')->orWhereNotNull('keterangan')->whereNotIn('keterangan', ['Properti', 'properti', 'Property', 'property']);
                })->sum('total_biaya'),
            'jml_karyawan_empat' => Pembayaran::whereDay('created_at', Carbon::parse('fourth sunday of previous month'))
                ->count('users_id'),

            'tindakan_minggu_lima' => Pembayaran::where('users_id', $id)->whereDay('created_at', Carbon::parse('fifth sunday of previous month'))
                ->whereHas('tindakan', function ($q) {
                    $q->whereNull('keterangan')->orWhereNotNull('keterangan')->whereNotIn('keterangan', ['Properti', 'properti', 'Property', 'property']);
                })->sum('total_biaya'),
            'jml_karyawan_lima' => Pembayaran::whereDay('created_at', Carbon::parse('fifth sunday of previous month'))
                ->count('users_id'),

            'ins_hari_besar' => Pembayaran::where('users_id', $id)->whereMonth('created_at', Carbon::now()->subMonth())->sum('hari_besar')
        );
        echo json_encode($data);

        exit;
    }

    public static function printGaji($id)
    {
        $gaji = Gaji::findOrFail($id);
        $terbilang = new NumberFormatter('id_ID', NumberFormatter::SPELLOUT);

        $result = [
            'gaji' => $gaji,
            'terbilang' => $terbilang
        ];

        return view('slip_gaji_pdf', $result);
    }

    public static function downloadGaji($id)
    {
        $gaji = Gaji::findOrFail($id);
        $terbilang = new NumberFormatter('id_ID', NumberFormatter::SPELLOUT);

        $filename = 'SlipGaji_0' . $id . '.pdf';

        $result = [
            'gaji' => $gaji,
            'terbilang' => $terbilang
        ];

        $pdf = PDF::loadview('slip_gaji_pdf',  $result)->setPaper('A4', 'potrait');
        // return $pdf->stream();
        return $pdf->download($filename);
    }
}
