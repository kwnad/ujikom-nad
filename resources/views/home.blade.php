@extends('admin.layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

                <div class="card-body mb-4">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    Selamat, {{ Auth::user()->name }} Kamu berhasil login

                    {{-- {{ __('You are logged in!') }} --}}
                </div>
        </div>
    </div>
</div>
@endsection