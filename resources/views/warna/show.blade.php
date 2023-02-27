@extends('admin.layouts.admin')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-7">
                <div class="card">
                    <div class="card-header text-light" style="background-color:  rgb(124, 124, 124);">
                        Data Warna
                    </div>
                    <div class="card-body bg-light shadow p-4">
                        <div class="mb-3">
                            <label class="form-label">Warna</label>
                            <input type="text" class="form-control " name="nama" value="{{ $warna->nama_warna }}"
                                readonly>
                        </div>
                        
                        <div class="mb-3">
                            <div class="d-grid gap-2">
                                <a href="{{ route('warna.index') }}" class="btn btn-info" type="submit">Kembali</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection