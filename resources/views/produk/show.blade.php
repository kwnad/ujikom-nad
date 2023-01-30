@extends('admin.layouts.admin')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-7">
                <div class="card">
                    <div class="card-header " style="background-color:  rgb(143, 188, 240);">
                        Data Produk
                    </div>
                    <div class="card-body bg-light shadow p-4">
                        <div class="mb-3">
                            <label class="form-label">Produk</label>
                            <input type="text" class="form-control " name="nama" value="{{ $produk->nama }}"
                                readonly>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Harga</label>
                            <input type="number" class="form-control " name="harga" value="{{ $produk->harga }}"
                                readonly>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Warna</label>
                            @foreach ($warnaProduk as $data)
                                <input type="text" class="form-control " name="warna" value="{{ $data->warna->nama_warna }}"
                                readonly>
                            @endforeach
                                
                        </div>
                        
                        <div class="mb-3">
                            <div class="d-grid gap-2">
                                <a href="{{ route('produk.index') }}" class="btn btn-info" type="submit">Kembali</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection