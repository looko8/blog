@extends('layouts.app')

@section('nav')
    <x-nav></x-nav>
@endsection

@section('content')
    <div class="container">
        <h2>User blogs</h2>
        <div class="list-group">
            @foreach($users as $user)
                <a href="{{ route('users.sections.articles.all', ['user' => $user->id]) }}" class="list-group-item list-group-item-action">{{ $user->name }}</a>
            @endforeach
        </div>
    </div>
@endsection
