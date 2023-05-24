@extends('layouts/admin')

@section('content')

    <div class="go-back-btn text-center">

        <button class="button">
            <a href="{{route('admin.projects.show', $project->slug)}}">Go Back</a>
        </button>

    </div>

    <div class="form-container">

        <form class="form" action="{{route('admin.projects.update', $project->slug)}}" method="POST">
            @csrf
            @method('PUT')
    
    
            <label class="lb" for="title">Title:</label>
            <input name="title" id="title" type="text" class="infos input @error('title') is-invalid @enderror" value="{{old('title') ?? $project->title}}">
            @error('title')
            <div class="invalid-feedback mb-3 mt-0">
                {{$message}}
            </div>
            @enderror
        
            <label for="description" class="lb">Description:</label>
            <textarea name="description" id=description" cols="30" rows="3" class="infos input @error('description') is-invalid @enderror">{{old('description') ?? $project->description}}</textarea>
            @error('description')
            <div class="invalid-feedback mb-3 mt-0">
                {{$message}}
            </div>
            @enderror
        
            <label for="url_img" class="lb">URL Img:</label>
            <input name="url_img" id="url_img" type="text" class="infos input @error('url_img') is-invalid @enderror" value="{{old('url_imd') ?? $project->url_img}}">
            @error('url_img')
            <div class="invalid-feedback mb-3 mt-0">
                {{$message}}
            </div>
            @enderror
        
            <button id="send" type="submit">Send</button>
            <button id="limpar" type="reset">Clear </button>
            
        </form>

    </div>
    

@endsection