@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Create article</h1>
        <form action="{{route('articles.store')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="sections">Section</label>
                <select class="form-control @error('section_id') is-invalid @enderror" id="sections" name="section_id">
                    @foreach($sections as $section)
                        <option value="{{ $section->id }}">{{ $section->title }}</option>
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
                <input type="text" class="form-control @error('title') is-invalid @enderror" id="articleTitle" placeholder="Title" name="title">
                @error('title')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="form-group">
                <label for="articleDescription">Description</label>
                <textarea class="form-control @error('description') is-invalid @enderror" id="articleDescription" rows="3" placeholder="Description" name="description"></textarea>
                @error('description')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="form-group">
                <label for="articleImage">Image</label>
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
