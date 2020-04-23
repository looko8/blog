@extends('layouts.blog')

@section('list')
    {{ Breadcrumbs::render('article', $user, $article->section, $article) }}
        <div class="card mb-3">
            @if($article->image_path)
                <img class="card-img-top" src="/storage/{{ $article->image_path }}" alt="Card image cap">
            @endif
            <div class="card-body">
                <h2 class="card-title">{{ $article->title }}</h2>
                <div class="row mb-0">
                    <h6 class="card-subtitle mb-2 text-muted col">by {{ $user->name }}</h6>
                    <h6 class="card-subtitle mb-2 text-muted col-md-auto">{{ $article->created_at }}</h6>
                </div>
                <hr/>
                <p class="card-text">{{ $article->description }}</p>
            </div>
        </div>
    <x-related-posts />
@endsection
