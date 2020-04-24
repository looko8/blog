@extends('layouts.blog')

@section('list')
    @if($currentSection ?? '')
    {{ Breadcrumbs::render('section', $user, $currentSection) }}
    <div class="jumbotron text-white shadow text-center" style="background-image: url(/storage/{{ $currentSection->image_path }}); background-size: 100%">
        <h2 class="mb-4">
            {{ $currentSection->title }}
        </h2>
        <p class="mb-4">
            {{ $currentSection->description }}
        </p>
    </div>
    @else
    {{ Breadcrumbs::render('by', $user) }}
    @endif
    <div class="row">
        @foreach($articles as $article)
            <div class="col-6">
                <div class="card mb-3">
                    @if($article->image_path)
                        <img class="card-img-top" src="/storage/{{ $article->image_path }}" alt="Card image cap">
                    @endif
                    <div class="card-body">
                        <a href="{{route('users.sections.articles.show', ['user' => $user->id, 'section' => $article->section_id, 'article' => $article->id])}}"><h2 class="card-title">{{ $article->title }}</h2></a>
                        <div class="row mb-0">
                            <h6 class="card-subtitle mb-2 text-muted col">by {{ $user->name }}</h6>
                            <h6 class="card-subtitle mb-2 text-muted col-md-auto">{{ $article->created_at }}</h6>
                        </div>
                        <hr/>
                        <p class="card-text">{{ Str::limit($article->description, 40) }}</p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
