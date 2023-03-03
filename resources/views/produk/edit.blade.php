@extends('admin.layouts.admin')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                @include('admin/layouts/_flash')
                <div class="card">
                    <div class="card-header text-light" style="background-color:  rgb(124, 124, 124);">
                        Edit Data Produk
                    </div>
                    <div class="card-body bg-light shadow p-4">
                        <form action="{{ route('produk.update', $produk->id) }}" method="post">
                            @csrf
                            @method('put')
                            <div class="mb-3">
                                <label class="form-label">Produk</label>
                                <input type="text" class="form-control  @error('nama') is-invalid @enderror"
                                    name="nama" value="{{ $produk->nama }}">
                                @error('nama')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            
                            <div class="mb-3">
                                <label class="form-label">Harga</label>
                                <input type="number" class="form-control  @error('harga') is-invalid @enderror"
                                    name="harga" value="{{ $produk->harga }}">
                                @error('harga')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Warna</label>
                                <select name="warna_id[]" id="warna_id" class="js-example-basic-multiple w-100" multiple="multiple">
                                    @forelse($warnas as $warna)
                                        <option value="{{ $warna->id }}" {{ in_array($warna->id, $produk->warnaProduk->pluck('id')->toArray()) ? 'selected' : null }} >{{ $warna->nama_warna }}</option>
                                    @empty
                                    @endforelse
                                </select>
                                @error('warna_id')<span class="text-danger">{{ $message }}</span>@enderror
    
                                {{-- <select name="warna_id[]" class="js-example-basic-multiple w-100" id="" multiple="multiple">
                                   @forelse($warna as $tag)
                                    <option value="{{ $tag->id }}" {{ in_array($tag->id, $produk->warna_produk->pluck('id')->toArray()) ? 'selected' : null }} >{{ $tag->name }}</option>
                                @empty
                                @endforelse
                                </select>
                                @error('warna_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror --}}
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Bahan</label>
                                <select name="bahan_id[]" class="js-example-basic-multiple w-100" id="" multiple="multiple">
                                    @forelse($bahans as $bahan)
                                        <option value="{{ $bahan->id }}" {{ in_array($bahan->id, $produk->bahanProduk->pluck('id')->toArray()) ? 'selected' : null }} >{{ $bahan->nama_bahan }}</option>
                                    @empty
                                    @endforelse
                                </select>
                                @error('bahan_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>


                            <div class="mb-3">
                                <label class="form-label">Deskripsi Produk</label>
                                <input id="deskripsi" type="hidden" name="deskripsi" class="@error('deskripsi') is-invalid @enderror" >
                                <trix-editor input="deskripsi">{!! $produk->deskripsi !!}</trix-editor>
                                @error('deskripsi')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>  

                            <div class="mb-3">
                                <a href="{{ route('produk.index') }}" class="btn btn-info">Kembali</a>

                                <button class="btn btn-info" type="submit">Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            {{-- Warna Produk --}}
            

            {{-- Bahan Produk --}}
            

            {{-- Gambar Produk --}}
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header text-light" style="background-color:  rgb(124, 124, 124);">
                        Edit Gambar Produk
                    </div>
                    <div class="card-body bg-light shadow p-4">
                        <form action="{{ route('gambar.store') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            {{-- <input type="hidden" name="produk_id" value="{{ $produk->id }}"> --}}
                            {{-- @method('post') --}}
                            <input type="hidden" name="produk_id" value=" {{ $produk->id }} ">
                            <div class="mb-3">
                                <label class="form-label">Gambar Produk</label>
                                <input type="file" class="hgthfghfssssss   @error('nama') is-invalid @enderror"
                                    name="gambar_produk[]" value="{{ old('gambar_produk') }}" multiple>
                                @error('gambar_produk')
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

                        <div class="row">
                            <div class="mb-3 d-flex w-full flex-wrap items-center justify-content-between">
                                @foreach ($images as $img)
                                    <img src="{{ asset($img->gambar_produk) }}" alt="..."
                                        class="block mr-1 mb-2 rounded" style="max-height: 250px;width: 48%;">
                                    <form action=" {{ route('gambar.destroy', $img->id) }} " method="POST">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-sm btn-outline-danger"
                                            onclick="return confirm('Apakah Anda Yakin?')">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                fill="currentColor" class="bi bi-trash" viewBox="0 1.5 16 16">
                                                <path
                                                    d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z" />
                                                <path fill-rule="evenodd"
                                                    d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z" />
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
    </div>
@endsection
