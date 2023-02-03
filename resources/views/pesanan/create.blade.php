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
                        <form action="{{ route('pesanan.store') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label class="form-label">Pilih Produk</label>
                                <select name="produk_id" class="form-control @error('produk_id') is-invalid @enderror"
                                    id="">
                                    @foreach ($produk as $data)
                                        <option value="{{ $data->id }}">{{ $data->nama }}</option>
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
                                        <option value="{{ $data->id }}">{{ $data->nama_warna }}</option>
                                    @endforeach
                                </select>
                                @error('warna_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            {{-- <div class="mb-3">
                                <label class="form-label">Desain</label>
                               <input type="file" class="form-control  @error('image') is-invalid @enderror" name="image" required>
                                    @error('image')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                            </div> --}}
                            <div class="mb-3">
                                <label class="form-label">Size S</label>
                                <input type="number" class="form-control  @error('size_s') is-invalid @enderror"
                                    name="size_s">
                                @error('size_s')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Size M</label>
                                <input type="number" class="form-control  @error('size_m') is-invalid @enderror"
                                    name="size_m">
                                @error('size_m')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Size L</label>
                                <input type="number" class="form-control  @error('size_l') is-invalid @enderror"
                                    name="size_l">
                                @error('size_l')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Size XL</label>
                                <input type="number" class="form-control  @error('size_xl') is-invalid @enderror"
                                    name="size_xl">
                                @error('size_xl')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Size XXL</label>
                                <input type="number" class="form-control  @error('size_xxl') is-invalid @enderror"
                                    name="size_xxl">
                                @error('size_xxl')
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