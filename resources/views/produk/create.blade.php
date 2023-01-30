@extends('admin.layouts.admin')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-7">
                @include('admin/layouts/_flash')
                <div class="card">
                    <div class="card-header " style="background-color:  rgb(143, 188, 240);">
                        Tambah Data Produk
                    </div>
                    <div class="card-body bg-light shadow p-4">
                        <form action="{{ route('produk.store') }}" method="post">
                            @csrf
                            <div class="mb-3">
                                <label class="form-label">Produk</label>
                                <input type="text" class="form-control  @error('nama') is-invalid @enderror"
                                    name="nama">
                                @error('nama')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Harga</label>
                                <input type="number" class="form-control  @error('harga') is-invalid @enderror"
                                    name="harga">
                                @error('harga')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Warna</label>
                                <select name="warna_id[]" id="" multiple>
                                    @foreach ($warna as $data)
                                        <option value="{{ $data->id }}">{{ $data->nama_warna }}</option>
                                    @endforeach
                                </select>
                                @error('warna')
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
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection