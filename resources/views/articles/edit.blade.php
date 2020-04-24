@extends('layouts.app')

@section('nav')
    <x-nav></x-nav>
@endsection

@section('content')
    <div class="container">
        <h1>Create article</h1>
        <form action="{{route('articles.update', ['article' => $article->id])}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="sections">Section</label>
                <select class="form-control @error('section_id') is-invalid @enderror" id="sections" name="section_id">
                    @foreach($sections as $section)
                        @if($section->id === $article->section_id)
                        <option selected value="{{ $section->id }}">{{ $section->title }}</option>
                        @else
                        <option value="{{ $section->id }}">{{ $section->title }}</option>
                        @endif
                    @endforeach
                </select>
                @error('section_id')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="form-group">
                <label for="articleTitle">Title</label>
                <input type="text" class="form-control @error('title') is-invalid @enderror" id="articleTitle" placeholder="Title" name="title" value="{{ $article->title }}">
                @error('title')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="form-group">
                <label for="articleDescription">Description</label>
                <textarea class="form-control @error('description') is-invalid @enderror" id="articleDescription" rows="3" placeholder="Description" name="description">{{ $article->description }}</textarea>
                @error('description')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="form-group">
                <label for="articleImage">Image</label>
                <br/>
                @if($article->image_path)
                    <img src="/storage/{{$article->image_path}}" height="250">
                @endif
                <input type="file" class="form-control-file @error('image') is-invalid @enderror" id="articleImage" name="image">
                @error('image')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Save</button>
        </form>
    </div>
@endsection
