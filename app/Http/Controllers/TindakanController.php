<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Facade\Ignition\Tabs\Tab;
use App\Tindakan;

class TindakanController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $tindakan = DB::table('tindakan')->get();

        $result = [
            'meta' => [
                'title'         => config('app.name').' - '.'List Tindakan',
                'side_active'   => 'tindakan'
            ],
            'tindakan' => $tindakan
        ];

        return view('tindakan', $result);
    }

    public function create()
    {
        return view('tambah_tindakan');
    }

    public function store(Request $request)
    {
        DB::table('tindakan')->insert([
            'kode_tindakan' => $request->kode_tindakan,
            'nama_tindakan' => $request->nama_tindakan,
            'harga_jual' => $request->harga_jual,
            'komisi_tindakan' => $request->komisi_tindakan,
            'kategori_tindakan' => $request->kategori_tindakan,
            'status_member' => $request->status_member,
            'status_aktif' => $request->status_aktif,
            'keterangan' => $request->keterangan
        ]);
        return redirect()->route('tindakan.index');
    }

    // /**
    //  * Display the specified resource.
    //  *
    //  * @param  int  $id
    //  * @return \Illuminate\Http\Response
    //  */
    // public function show($id)
    // {
    //     //
    // }

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

    //Mencari data tindakan
    public function search(Request $request)
    {
        $keyword = $request->keyword;

        if ($request->has('keyword')) {
            $tindakan = DB::table('tindakan')
                ->where('kode_tindakan', 'LIKE', "%" . $keyword . "%")
                ->orWhere('nama_tindakan', 'LIKE', "%" . $keyword . "%")
                ->get();
        } else {
            $tindakan = DB::table('tindakan')->get();
        }

        return view('tindakan', ['tindakan' => $tindakan]);
    }
}
