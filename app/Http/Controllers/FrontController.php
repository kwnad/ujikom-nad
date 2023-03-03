<?php

namespace App\Http\Controllers;

use App\Models\BahanProduk;
use App\Models\Produk;
use App\Models\Gambar;
use App\Models\WarnaProduk;
// use App\Models\Warna;
// use App\Models\Bahan;
// use App\Models\Gambar;

use Illuminate\Http\Request;

class FrontController extends Controller
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

    public function produkdetail(Produk $produk,WarnaProduk $warna ,Gambar $images, BahanProduk $bahan )
    {
        $images = Gambar::where('produk_id' , $produk->id)->get();
        $bahan = BahanProduk::where('produk_id', $produk->id)->get();
        $warna = WarnaProduk::where('produk_id', $produk->id)->get();
        // dd($kategori);
        return view('detailproduk', compact('produk','images','warna','bahan'));
    }

    public function produkuser()
    {
        // $produk = Produk::all();
        $produk = Produk::with('gambar')->get();
        return view('welcome', compact('produk'));
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

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
}
