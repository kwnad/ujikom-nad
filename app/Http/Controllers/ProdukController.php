<?php

namespace App\Http\Controllers;

use App\Models\Bahan;
use App\Models\BahanProduk;
use App\Models\Gambar;
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
        $produk = Produk::latest()->get();
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
        $bahan = Bahan::all();
        return view('produk.create', compact('warna', 'bahan'));
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
            'deskripsi' => 'required',
        ]);

        $produk = new Produk();
        $produk->nama = $request->nama;
        $produk->harga = $request->harga;
        $produk->deskripsi = $request->deskripsi;
        $produk->save();
        foreach ($request->warna_id as $warna) {
            $warnaProduk = new WarnaProduk();
            $warnaProduk->produk_id = $produk->id;
            $warnaProduk->warna_id = $warna;
            $warnaProduk->save();
        }
        foreach ($request->bahan_id as $bahan) {
            $bahanProduk = new BahanProduk();
            $bahanProduk->produk_id = $produk->id;
            $bahanProduk->bahan_id = $bahan;
            $bahanProduk->save();
        }
        if ($request->hasfile('gambar_produk')) {
            foreach ($request->file('gambar_produk') as $image) {
                $name = rand(1000, 9999) . $image->getClientOriginalName();
                $image->move('images/gambar_produk/', $name);
                $images = new Gambar();
                $images->produk_id = $produk->id;
                $images->gambar_produk = 'images/gambar_produk/' . $name;
                $images->save();
            }
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
        $bahanProduk = BahanProduk::where('produk_id', $produk->id)->get();
        $images = Gambar::where('produk_id', $id)->get();
        return view('produk.show', compact('produk', 'warnaProduk', 'bahanProduk', 'images'));
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
        $warna = Warna::latest()->get(['id', 'nama_warna']);
        // $tags = Tag::latest()->get(['id', 'name']);
        $bahan = Bahan::all();
        $images = Gambar::where('produk_id', $id)->get();
        // $warnaProduk = WarnaProduk::where('produk_id', $id)->get();
        $bahanProduk = BahanProduk::where('produk_id', $id)->get();

        return view('produk.edit', compact('produk', 'warna', 'bahan', 'bahanProduk', 'images'));
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
            'deskripsi' => 'required',
        ]);

        $produk = Produk::findOrFail($id);
        $produk->nama = $request->nama;
        $produk->harga = $request->harga;
        $produk->deskripsi = $request->deskripsi;
        $produk->save();
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
        $images = Gambar::where('produk_id', $id)->get();
        foreach ($images as $image) {
            $image->deleteImage();
            $image->delete();
        }
        $produk->delete();
        return redirect()->route('produk.index')
            ->with('success', 'Data berhasil dihapus!');
    }
}
