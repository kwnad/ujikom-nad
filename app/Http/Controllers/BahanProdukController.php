<?php

namespace App\Http\Controllers;

use App\Models\BahanProduk;
use Illuminate\Http\Request;

class BahanProdukController extends Controller
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
            'bahan_id' => 'required',
        ]);

        foreach ($request->bahan_id as $material) {
            $bahanProduk = new BahanProduk();
            $bahanProduk->bahan_id = $material;
            $bahanProduk->produk_id = $request->produk_id;
            $bahanProduk->save();

        }
        return back()->with('success', 'Data berhasil dibuat!');
        // $bahanProduk->save();

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\BahanProduk  $bahanProduk
     * @return \Illuminate\Http\Response
     */
    public function show(BahanProduk $bahanProduk)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\BahanProduk  $bahanProduk
     * @return \Illuminate\Http\Response
     */
    public function edit(BahanProduk $bahanProduk)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\BahanProduk  $bahanProduk
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, BahanProduk $bahanProduk)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\BahanProduk  $bahanProduk
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $bahanProduk = BahanProduk::findOrFail($id);
        $bahanProduk->delete();
        return back()
            ->with('success', 'Data berhasil dihapus!');

    }
}
