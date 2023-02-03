<?php

namespace App\Http\Controllers;

use App\Models\Pesanan;
use App\Models\Produk;
use App\Models\Warna;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PesananController extends Controller
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
        $pesanan = Pesanan::get();

        return view('pesanan.index', compact('pesanan'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $produk = Produk::all();
        $warna = Warna::all();
        return view('pesanan.create', compact('produk', 'warna'));
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
            'produk_id' => 'required',
            'warna_id' => 'required',
            'size_s' => 'required',
            'size_m' => 'required',
            'size_l' => 'required',
            'size_xl' => 'required',
            'size_xxl' => 'required',
        ]);

        $pesanan = new Pesanan();
        $size_s = $request->size_s;
        $size_m = $request->size_m;
        $size_l = $request->size_l;
        $size_xl = $request->size_xl;
        $size_xxl = $request->size_xxl;
        $total = $size_s + $size_m + $size_l + $size_xl + $size_xxl;

        $kode_pesanan = DB::table('pesanans')->select(DB::raw('MAX(RIGHT(kode_pesanan, 3)) as kode'));
        if ($kode_pesanan->count() > 0) {
            foreach ($kode_pesanan->get() as $kode_pesanan) {
                $x = ((int) $kode_pesanan->kode) + 1;
                $kode = sprintf('%03s', $x);
            }
        } else {
            $kode = '001';
        }

        $pesanan->kode_pesanan = 'RNK-' . date('dmy') . $kode;
        $pesanan->produk_id = $request->produk_id;
        $pesanan->warna_id = $request->warna_id;
        $pesanan->size_s = $request->size_s;
        $pesanan->size_m = $request->size_m;
        $pesanan->size_l = $request->size_l;
        $pesanan->size_xl = $request->size_xl;
        $pesanan->size_xxl = $request->size_xxl;
        $pesanan->total = $total;
        $pesanan->save();
        return redirect()->route('pesanan.index')
            ->with('success', 'Data berhasil dibuat!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pesanan  $category
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pesanan = Pesanan::findOrFail($id);
        return view('pesanan.show', compact('pesanan'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pesanan  $category
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pesanan = Pesanan::findOrFail($id);

        return view('pesanan.edit', compact('pesanan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pesanan  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'size_s' => 'required',
            'size_m' => 'required',
            'size_l' => 'required',
            'size_xl' => 'required',
            'size_xxl' => 'required',
        ]);

        $pesanan = Pesanan::findOrFail($id);
        $pesanan->size_s = $request->size_s;
        $pesanan->size_m = $request->size_m;
        $pesanan->size_l = $request->size_l;
        $pesanan->size_xl = $request->size_xl;
        $pesanan->size_xxl = $request->size_xxl;
        $pesanan->save();

        return redirect()->route('pesanan.index')
            ->with('success', 'Data berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pesanan  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pesanan = Pesanan::findOrFail($id);
        $pesanan->delete();
        return redirect()->route('pesanan.index')
            ->with('success', 'Data berhasil dihapus!');
    }
}
