@extends('layouts.app')

@section('nav')
    <x-nav></x-nav>
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-6">
            <h2>Sections</h2>
            <ul class="list-group">
                @foreach($sections as $section)
                    <li class="list-group-item">
                        {{$section->title}}
                        <a href="#" class="badge badge-danger float-right ml-3">
                            <span class="material-icons">delete</span>
                        </a>
                        <a href="#" class="badge badge-info float-right ml-3">
                            <span class="material-icons">edit</span>
                        </a>
                        <a href="{{route('users.sections.articles.index', ['user' => Auth::id(), 'section' => $section->id])}}" class="badge badge-secondary float-right ml-3">
                            <span class="material-icons">visibility</span>
                        </a>
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
                        <a href="#" class="badge badge-danger float-right ml-3">
                            <span class="material-icons">delete</span>
                        </a>
                        <a href="#" class="badge badge-info float-right ml-3">
                            <span class="material-icons">edit</span>
                        </a>
                        <a href="#" class="badge badge-secondary float-right ml-3">
                            <span class="material-icons">visibility</span>
                        </a>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
</div>
@endsection
