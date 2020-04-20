@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Create section</h1>
        <form action="{{route('sections.store')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="sectionTitle">Title</label>
                <input type="text" class="form-control @error('title') is-invalid @enderror" id="sectionTitle" placeholder="Title" name="title">
                @error('title')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="form-group">
                <label for="sectionDescription">Description</label>
                <textarea class="form-control" id="sectionDescription" rows="3" placeholder="Description" name="description"></textarea>
            </div>
            <div class="form-group">
                <label for="sectionImage">Image</label>
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
