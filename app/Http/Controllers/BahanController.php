<?php

namespace App\Http\Controllers;

use App\Models\Bahan;
use Illuminate\Http\Request;

class BahanController extends Controller
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
        $bahan = Bahan::latest()->get();
        return view('bahan.index', compact('bahan'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('bahan.create');
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
            'nama_bahan' => 'required|unique:bahans|',
        ]);

        $bahan = new Bahan();
        $bahan->nama_bahan = $request->nama_bahan;
        $bahan->save();
        return redirect()->route('bahan.index')
            ->with('success', 'Data berhasil dibuat!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Bahan  $category
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $bahan = Bahan::findOrFail($id);
        return view('bahan.show', compact('bahan'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Bahan  $category
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $bahan = Bahan::findOrFail($id);
        return view('bahan.edit', compact('bahan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Bahan  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'nama_bahan' => 'required',
        ]);

        $bahan = Bahan::findOrFail($id);
        $bahan->nama_bahan = $request->nama_bahan;
        $bahan->save();
        return redirect()->route('bahan.index')
            ->with('success', 'Data berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Bahan  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $bahan = Bahan::findOrFail($id);
        $bahan->delete();
        return back()
            ->with('success', 'Data berhasil dihapus!');
    }
}
