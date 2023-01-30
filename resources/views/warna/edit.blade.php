@extends('admin.layouts.admin')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-7">
                @include('admin/layouts/_flash')
                <div class="card">
                    <div class="card-header " style="background-color:  rgb(143, 188, 240);">
                        Edit Data Warna
                    </div>
                    <div class="card-body bg-light shadow p-4">
                        <form action="{{ route('warna.update', $warna->id) }}" method="post">
                            @csrf
                            @method('put')
                            <div class="mb-3">
                                <label class="form-label">Warna</label>
                                <input type="text" class="form-control  @error('nama_warna') is-invalid @enderror"
                                    name="nama_warna" value="{{ $warna->nama_warna }}">
                                @error('nama_warna')
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