@extends('layouts.app')

@section('nav')
    <x-nav></x-nav>
@endsection

@section('content')
    <div class="container">
        <h1>Edit section</h1>
        <form action="{{route('sections.update', ['section' => $section->id])}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="sectionTitle">Title</label>
                <input type="text" class="form-control @error('title') is-invalid @enderror" id="sectionTitle" placeholder="Title" name="title" value="{{$section->title}}">
                @error('title')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="form-group">
                <label for="sectionDescription">Description</label>
                <textarea class="form-control @error('description') is-invalid @enderror" id="sectionDescription" rows="3" placeholder="Description" name="description">{{$section->description}}</textarea>
                @error('description')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="form-group">
                <label for="sectionImage">Image</label>
                <br/>
                <img src="/storage/{{$section->image_path}}" height="250"/>
                <input type="file" class="form-control-file @error('image') is-invalid @enderror" id="sectionImage" name="image">
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
