@extends('admin.layouts.admin')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header text-light" style="background-color:  rgb(124, 124, 124);">
                        Data Produk
                    </div>
                    <div class="card-body bg-light shadow p-4">
                        <div class="mb-3">
                            <label class="form-label">Produk</label>
                            <input type="text" class="form-control " name="nama" value="{{ $produk->nama }}" readonly>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Harga</label>
                            <input type="number" class="form-control " name="harga" value="{{ $produk->harga }}"
                                readonly>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Warna</label>
                            @foreach ($warnaProduk as $data)
                            <ul>
                                <li>
                                    {{ $data->warna->nama_warna }}
                                </li>         
                            </ul>
                                {{-- <input type="text" class="form-control " name="warna"
                                    value="{{ $data->warna->nama_warna }}" readonly> --}}
                            @endforeach
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Bahan</label>
                            @foreach ($bahanProduk as $data)
                            <ul>
                                <li>
                                    {{ $data->bahan->nama_bahan }}
                                </li>
                            </ul>
                                {{-- <input type="text" class="form-control " name="bahan"
                                    value="{{ $data->bahan->nama_bahan }}" readonly> --}}
                            @endforeach
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Deskripsi Produk</label>
                            <div class="card">
                                <div class="card-body">
                                    <p>
                                        {!! $produk->deskripsi !!}
                                    </p>
                                </div>
                            </div>
                        </div>

                        <div class="mb-3">
                            <div class="d-grid gap-2">
                                <a href="{{ route('produk.index') }}" class="btn btn-info" type="submit">Kembali</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card-header text-light" style="background-color:  rgb(124, 124, 124);">
                    Gambar Produk
                </div>
                <div class="card-body bg-light shadow p-4">
                    <div class="mb-3">
                        <label class="form-label">Gambar Produk</label>
                        <div class="d-flex w-full flex-wrap items-center justify-content-between">
                            @foreach ($images as $img)
                                <img src="{{ asset($img->gambar_produk) }}" alt="..." class="block mr-1 mb-2 rounded"
                                    style="max-height: 250px;width: 48%;">
                            @endforeach
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
