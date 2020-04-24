@extends('layouts.app')

@section('nav')
    <x-nav></x-nav>
@endsection

@section('content')
<div class="container">
    @if(session('message'))
        <div class="alert alert-success" role="alert">
            {{session('message')}}
        </div>
    @endif
    <div class="row">
        <div class="col-6">
            <h2>Sections</h2>
            <ul class="list-group">
                @foreach($sections as $section)
                    <li class="list-group-item">
                        {{$section->title}}
                        <a
                            href="{{ route('sections.destroy', ['section' => $section->id]) }}"
                            class="badge badge-danger float-right ml-3"
                            onclick="event.preventDefault(); document.getElementById('destroy-section-{{ $section->id }}').submit();"
                        >
                            <span class="material-icons">delete</span>
                        </a>
                        <a href="{{ route('sections.edit', ['section' => $section->id]) }}" class="badge badge-info float-right ml-3">
                            <span class="material-icons">edit</span>
                        </a>
                        <a href="{{route('users.sections.articles.index', ['user' => Auth::id(), 'section' => $section->id])}}" class="badge badge-secondary float-right ml-3">
                            <span class="material-icons">visibility</span>
                        </a>

                        <form id="destroy-section-{{ $section->id }}" action="{{ route('sections.destroy', ['section' => $section->id]) }}" method="POST" style="display: none;">
                            @csrf
                            @method('DELETE')
                        </form>
                    </li>
                @endforeach
            </ul>
        </div>
        <div class="col-6">
            <h2>Articles</h2>
            <ul class="list-group">
                @foreach($articles as $article)
                    <li class="list-group-item">
                        <span class="name">{{$article->title}}</span>
                        <a
                            href="{{ route('articles.destroy', ['article' => $article->id]) }}"
                            class="badge badge-danger float-right ml-3"
                            onclick="event.preventDefault(); document.getElementById('destroy-article-{{ $article->id }}').submit();"
                        >
                            <span class="material-icons">delete</span>
                        </a>
                        <a href="{{ route('articles.edit', ['article' => $article->id]) }}" class="badge badge-info float-right ml-3">
                            <span class="material-icons">edit</span>
                        </a>
                        <a href="{{ route('users.sections.articles.show', ['user' => $article->user_id, 'section' => $article->section_id, 'article' => $article->id]) }}" class="badge badge-secondary float-right ml-3">
                            <span class="material-icons">visibility</span>
                        </a>

                        <form id="destroy-article-{{ $article->id }}" action="{{ route('articles.destroy', ['article' => $article->id]) }}" method="POST" style="display: none;">
                            @csrf
                            @method('DELETE')
                        </form>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
</div>
@endsection
