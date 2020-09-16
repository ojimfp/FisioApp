<?php

namespace App\Http\Controllers;

use App\Kasir;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Facade\Ignition\Tabs\Tab;

class KasirController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    // Menampilkan halaman utama kasir
    public function index()
    {
        //$kasir = DB::table('kasir')->get();

        return view('kasir');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Kasir  $kasir
     * @return \Illuminate\Http\Response
     */
    public function show(Kasir $kasir)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Kasir  $kasir
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
     * @param  \App\Kasir  $kasir
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Kasir $kasir)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Kasir  $kasir
     * @return \Illuminate\Http\Response
     */
    public function destroy(Kasir $kasir)
    {
        //
    }
}
