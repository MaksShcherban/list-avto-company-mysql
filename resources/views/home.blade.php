@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Dashboard') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        {{ __('You are logged in!') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div style="text-align: center">
        <button class="btn"><a class="link-style" href="/">На говну </a></button>
        <button class="btn"><a class="link-style"href="/admin/car">До сторінки адміністрації автомобілів</a></button>
        <button class="btn"><a class="link-style"href="/admin/company">До сторінки адміністрації компаній </a></button>
    </div>
@endsection
