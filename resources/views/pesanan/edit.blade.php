@extends('admin.layouts.admin')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                @include('admin/layouts/_flash')
                <div class="card">
                    <div class="card-header " style="background-color:  rgb(143, 188, 240);">
                        Edit Data Pesanan
                    </div>
                    <div class="card-body bg-light shadow p-4">
                        <form action="{{ route('pesanan.update', $pesanan->id) }}" method="post">
                            @csrf
                            @method('put')
                            <div class="mb-3">
                                <label class="form-label">Produk</label>
                                <input type="text" class="form-control  @error('nama') is-invalid @enderror"
                                    name="nama" value="{{ $pesanan->nama }}">
                                @error('nama')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Harga</label>
                                <input type="number" class="form-control  @error('harga') is-invalid @enderror"
                                    name="harga" value="{{ $pesanan->harga }}">
                                @error('harga')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            
                            <div class="mb-3">
                                <a href="{{ route('pesanan.index') }}" class="btn btn-info" type="submit">Kembali</a>
                                
                                <button class="btn btn-info" type="submit">Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="card">
                    <div class="card-header " style="background-color:  rgb(143, 188, 240);">
                        Edit Warna Produk
                    </div>
                    <div class="card-body bg-light shadow p-4">
                        <form action="{{ route('warnaProduk.store') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            {{-- <input type="hidden" name="produk_id" value="{{ $pesanan->id }}"> --}}
                            {{-- @method('post') --}}
                            <input type="hidden" name="produk_id" value=" {{ $pesanan->id }} ">
                            <div class="mb-3">
                                <label class="form-label">Warna</label>
                                <select name="warna_id[]" id="" multiple>
                                    @foreach ($warna as $data)
                                        <option value="{{ $data->id }}">{{ $data->nama_warna }}</option>
                                    @endforeach
                                </select>
                                @error('warna_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            
                            <div class="mb-3">
                                <div class="d-grid gap-2">
                                    <button class="btn btn-info" type="submit">Simpan</button>
                                </div>
                            </div>
                        </form>

                        <div class="row mb-3">
                            @foreach ($warnaProduk as $data)
                                <input type="text" class="form-control " name="warna" value="{{ $data->warna->nama_warna }}"
                                readonly>
                                <form action=" {{ route('warnaProduk.destroy', $data->id )}} " method="POST">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-sm btn-outline-danger"
                                        onclick="return confirm('Apakah Anda Yakin?')">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 1.5 16 16">
                                        <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                                        <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                                        </svg>
                                    </button>
                                </form>
                            @endforeach

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection