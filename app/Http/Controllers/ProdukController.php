<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use App\Models\Warna;
use App\Models\WarnaProduk;
use Illuminate\Http\Request;

class ProdukController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $produk = Produk::all();
        return view('produk.index', compact('produk'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $warna = Warna::all();
        return view('produk.create', compact('warna'));
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
            'nama' => 'required',
            'harga' => 'required',
        ]);

        $produk = new Produk();
        $produk->nama = $request->nama;
        $produk->harga = $request->harga;
        $produk->save();
        foreach ($request->warna_id as $warna) {
            $warnaProduk = new WarnaProduk();
            $warnaProduk->produk_id = $produk->id;
            $warnaProduk->warna_id = $warna;
            $warnaProduk->save();
        }
        return redirect()->route('produk.index')
            ->with('success', 'Data berhasil dibuat!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Produk  $category
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $produk = Produk::findOrFail($id);
        $warnaProduk = WarnaProduk::where('produk_id', $produk->id)->get();
        return view('produk.show', compact('produk', 'warnaProduk'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Produk  $category
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $produk = Produk::findOrFail($id);
        $warna = Warna::all();
        $warnaProduk = WarnaProduk::where('produk_id', $id)->get();

        return view('produk.edit', compact('produk', 'warna', 'warnaProduk'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Produk  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'nama' => 'required',
            'harga' => 'required',
        ]);

        $produk = Produk::findOrFail($id);
        $produk->nama = $request->nama;
        $produk->harga = $request->harga;
        $produk->save();

        // foreach ($request->warna_id as $warna) {
        //     $warnaProduk = new WarnaProduk();
        //     $warnaProduk->produk_id = $produk->id;
        //     $warnaProduk->warna_id = $warna;
        //     $warnaProduk->save();
        // }

        return redirect()->route('produk.index')
            ->with('success', 'Data berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Produk  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $produk = Produk::findOrFail($id);
        $produk->delete();
        return redirect()->route('produk.index')
            ->with('success', 'Data berhasil dihapus!');
    }
}
