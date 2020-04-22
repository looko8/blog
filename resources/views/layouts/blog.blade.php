@extends('layouts.app')

@section('nav')
    <x-nav />
@endsection

@section('content')
    <div class="container">
        <div class="row mt-3">
            <div class="col-8">
                @yield('list')
            </div>
            <div class="col-4">
                <x-latest-posts />
            </div>
        </div>
    </div>
@endsection
