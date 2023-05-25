@extends('layouts/admin')

@section('content')

    <div class="go-back-btn text-center d-flex justify-content-center align-items-center gap-4" style="margin-top:100px">

        <h2 class="mb-0 green text-uppercase">Edit Project</h2>

        <a class="btn-custom" href="{{route('admin.projects.show', $project->slug)}}">Go Back <span></span></a>

    </div>

    <div class="form-container" style="padding-bottom: 100px">

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

            <label class="lb" for="title">Type:</label>
            <select name="type_id" id="type_id" class="infos input @error('category_id') is-invalid @enderror">

                <option value="">Nessuna</option>
            
                @foreach ($types as $type)
            
                    <option value="{{$type->id}}" {{$type->id == old('type_id', $project->type_id) ? 'selected' : ''}}>{{$type->name}}</option>
            
                @endforeach
            
            </select>
            @error('category_id')
            <div class="invalid-feedback mb-3 mt-0">
                {{$message}}
            </div>
            @enderror
            
            <div class="technologies d-flex flex-column gap-2 mt-5 mb-3">

                <h4 class="green">Technologies:</h4>

                @foreach ($technologies as $technology)

                
                <div class="technology">
                    
                    @if ($errors->any())
                        <input @checked(in_array($technology->id, old('technologies', []))) class="m-0" type="checkbox" id="technology-{{$technology->id}}" name="technologies[]" value="{{$technology->id}}">
                    @else
                        <input @checked($project->technologies->contains($technology->id)) class="m-0" type="checkbox" id="technology-{{$technology->id}}" name="technologies[]" value="{{$technology->id}}">
                    @endif
                    
                    <label class="lb m-0" for="technology-{{$technology->id}}">{{$technology->name}}</label>

                </div>
    
                @endforeach

            </div>

            <label class="lb" for="repo">Link Repo:</label>
            <input name="repo" id="repo" type="text" class="infos input @error('repo') is-invalid @enderror" value="{{old('repo') ?? $project->repo}}">
            @error('repo')
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