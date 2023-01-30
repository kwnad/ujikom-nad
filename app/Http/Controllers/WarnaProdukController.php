<?php

namespace App\Http\Controllers;

use App\Models\WarnaProduk;
use Illuminate\Http\Request;

class WarnaProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $validated = $request->validate([
            'warna_id' => 'required',
        ]);

        foreach ($request->warna_id as $color) {
            $warnaProduk = new WarnaProduk();
            $warnaProduk->warna_id = $color;
            $warnaProduk->produk_id = $request->produk_id;
            $warnaProduk->save();

        }
        return back()->with('success', 'Data berhasil dibuat!');
        // $warnaProduk->save();

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\WarnaProduk  $warnaProduk
     * @return \Illuminate\Http\Response
     */
    public function show(WarnaProduk $warnaProduk)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\WarnaProduk  $warnaProduk
     * @return \Illuminate\Http\Response
     */
    public function edit(WarnaProduk $warnaProduk)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\WarnaProduk  $warnaProduk
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, WarnaProduk $warnaProduk)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\WarnaProduk  $warnaProduk
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $warnaProduk = WarnaProduk::findOrFail($id);
        $warnaProduk->delete();
        return back()
            ->with('success', 'Data berhasil dihapus!');

    }
}
