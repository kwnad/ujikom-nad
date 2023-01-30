@extends('admin.layouts.admin')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-7">
                @include('admin/layouts/_flash')
                <div class="card">
                    <div class="card-header " style="background-color:  rgb(143, 188, 240);">
                        Tambah Data Pesanan
                    </div>
                    <div class="card-body bg-light shadow p-4">
                        <form action="{{ route('pesanan.store') }}" method="post">
                            @csrf
                            <div class="mb-3">
                                <label class="form-label">Pilih Produk</label>
                                <select name="produk_id" class="form-control @error('produk_id') is-invalid @enderror"
                                    id="">
                                    @foreach ($produk as $data)
                                        <option value="{{ $data->id }}">{{ $data->produk }}</option>
                                    @endforeach
                                </select>
                                @error('produk_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Pilih Warna</label>
                                <select name="warna_id" class="form-control @error('warna_id') is-invalid @enderror"
                                    id="">
                                    @foreach ($warna as $data)
                                        <option value="{{ $data->id }}">{{ $data->warna }}</option>
                                    @endforeach
                                </select>
                                @error('warna_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Total Pesanan</label>
                                <input type="number" class="form-control  @error('total_pesanan') is-invalid @enderror"
                                    name="total_pesanan">
                                @error('total_pesanan')
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