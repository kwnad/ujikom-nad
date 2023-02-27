@extends('admin.layouts.admin')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-7">
                @include('admin/layouts/_flash')
                <div class="card">
                    <div class="card-header text-light" style="background-color:  rgb(124, 124, 124);">
                        Tambah Data Produk
                    </div>
                    <div class="card-body bg-light shadow p-4">
                        <form action="{{ route('produk.store') }}" method="post" enctype="multipart/form-data">
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
                                <input type="number" min="0"
                                    class="form-control  @error('harga') is-invalid @enderror" name="harga">
                                @error('harga')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label>Warna</label>
                                <select name="warna_id[]"
                                    class="js-example-basic-multiple w-100 @error('warna') is-invalid @enderror"
                                    multiple="multiple">
                                    @foreach ($warna as $data)
                                        <option value="{{ $data->id }}">{{ $data->nama_warna }}</option>
                                    @endforeach
                                </select>
                                {{-- <label for="multi-select2">Warna</label>
                                <select name="warna_id[]"
                                    class="form-control select2 select2-hidden-accessible @error('warna') is-invalid @enderror"
                                    multiple="" data-placeholder="Pilih Warna" style="width: 100%;" tabindex="-1"
                                    aria-hidden="true">
                                    @foreach ($warna as $data)
                                        <option value="{{ $data->id }}"
                                            {{ collect(old('warna'))->contains($data->id) ? 'selected' : '' }}>
                                            {{ $data->nama_warna }}</option>
                                    @endforeach
                                </select> --}}
                                {{-- <label class="form-label">Warna</label>
                                <select name="warna_id[]" id="" multiple>
                                    @foreach ($warna as $data)
                                        <option value="{{ $data->id }}">{{ $data->nama_warna }}</option>
                                    @endforeach
                                </select> --}}
                                @error('warna')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label>Bahan</label>
                                <select name="bahan_id[]"
                                    class="js-example-basic-multiple w-100 @error('bahan') is-invalid @enderror"
                                    multiple="multiple">
                                    @foreach ($bahan as $data)
                                        <option value="{{ $data->id }}">{{ $data->nama_bahan }}</option>
                                    @endforeach
                                </select>
                                @error('bahan')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Deskripsi Produk</label>
                                <input id="x" type="hidden" name="deskripsi"
                                    class="@error('deskripsi') is-invalid @enderror">
                                <trix-editor input="x"></trix-editor>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Gambar Produk</label>
                                <input type="file" name="gambar_produk[]"
                                    class="  @error('gambar_produk') is-invalid @enderror"
                                    value="{{ old('gambar_produk') }}" multiple>
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
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.select2').select2({
                closeOnSelect: false
            });
        });
    </script> --}}
@endsection
