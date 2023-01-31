<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Warna;
use Illuminate\Http\Request;
use Validator;

class WarnaController extends Controller
{
    public function index()
    {
        $warna = Warna::all();
        $response = [
            "success" => true,
            "data" => $warna,
            "message" => "data warna",
        ];
        return response()->json($response, 200);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama_warna' => 'required',
        ],
            [
                'nama_warna.required' => 'Masukkan nama warna !',
            ]
        );

        if ($validator->fails()) {

            return response()->json([
                'success' => false,
                'message' => 'Silahkan Isi Bidang Yang Kosong',
                'data' => $validator->errors(),
            ], 401);

        } else {

            $warna = Warna::create([
                'nama_warna' => $request->input('nama_warna'),
            ]);

            if ($warna) {
                return response()->json([
                    'success' => true,
                    'message' => 'Warna Berhasil Disimpan!',
                ], 200);
            } else {
                return response()->json([
                    'success' => false,
                    'message' => 'Warna Gagal Disimpan!',
                ], 401);
            }
        }
    }

    public function show($id)
    {
        $warna = Warna::whereId($id)->first();

        if ($warna) {
            return response()->json([
                'success' => true,
                'message' => 'Detail warna!',
                'data' => $warna,
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Warna Tidak Ditemukan!',
                'data' => '',
            ], 401);
        }
    }

    public function update(Request $request, $id)
    {
        // validate data
        $validator = Validator::make($request->all(), [
            'nama_warna' => 'required',
        ],
            [
                'nama_warna.required' => 'Masukkan warna !',
            ]
        );

        if ($validator->fails()) {

            return response()->json([
                'success' => false,
                'message' => 'Silahkan Isi Bidang Yang Kosong',
                'data' => $validator->errors(),
            ], 401);

        } else {

            $warna = Warna::find($id);
            if ($warna) {
                $warna->nama_warna = $request->nama_warna;
                $warna->save();
                return response()->json([
                    'success' => true,
                    'message' => 'data warna berhasil diedit',
                    'data' => $warna,
                ], 201);

            } else {
                return response()->json([
                    'success' => false,
                    'message' => 'data warna tidak ditemukan',
                    'data' => [],
                ], 404);
            }

        }
    }

    public function destroy($id)
    {
        $warna = Warna::findOrFail($id);
        $warna->delete();

        if ($warna) {
            return response()->json([
                'success' => true,
                'message' => 'Warna Berhasil Dihapus!',
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Warna Gagal Dihapus!',
            ], 400);
        }
    }

}
