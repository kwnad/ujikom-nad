<?php

namespace App\Http\Controllers;

use App\Models\Warna;
use Illuminate\Http\Request;

class WarnaController extends Controller
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
        $warna = Warna::all();
        return view('warna.index', compact('warna'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('warna.create');
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
            'nama_warna' => 'required',
        ]);

        $warna = new Warna();
        $warna->nama_warna = $request->nama_warna;
        $warna->save();
        return redirect()->route('warna.index')
            ->with('success', 'Data berhasil dibuat!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Warna  $category
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $warna = Warna::findOrFail($id);
        return view('warna.show', compact('warna'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Warna  $category
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $warna = Warna::findOrFail($id);
        return view('warna.edit', compact('warna'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Warna  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'nama_warna' => 'required',
        ]);

        $warna = Warna::findOrFail($id);
        $warna->nama_warna = $request->nama_warna;
        $warna->save();
        return redirect()->route('warna.index')
            ->with('success', 'Data berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Warna  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $warna = Warna::findOrFail($id);
        $warna->delete();
        return back()
            ->with('success', 'Data berhasil dihapus!');
    }
}
