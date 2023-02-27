@extends('admin.layouts.admin')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-7">
                @include('admin/layouts/_flash')
                <div class="card">
                    <div class="card-header text-light" style="background-color:  rgb(124, 124, 124);">
                        Tambah Data Warna
                    </div>
                    <div class="card-body bg-light shadow p-4">
                        <form action="{{ route('warna.store') }}" method="post">
                            @csrf
                            <div class="mb-3">
                                <label class="form-label">Warna</label>
                                <input type="text" class="form-control  @error('nama_warna') is-invalid @enderror"
                                    name="nama_warna">
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