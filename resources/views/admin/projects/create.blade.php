@extends('layouts/admin')

@section('content')

    <div class="go-back-btn text-center d-flex justify-content-center align-items-center gap-4" style="margin-top: 100px">

        <h2 class="mb-0 green text-uppercase">Add Project</h2>

        <a href="{{route('admin.projects.index')}}" class="btn-custom">Go Back <span></span></a>


    </div>

    <div class="form-container">

        <form class="form" action="{{route('admin.projects.store')}}" method="POST">
            @csrf

            <label class="lb" for="title">Title:</label>
            <input name="title" id="title" type="text" class="infos input @error('title') is-invalid @enderror" value="{{old('title')}}">
            @error('title')
            <div class="invalid-feedback mb-3 mt-0">
                {{$message}}
            </div>
            @enderror

            <label class="lb" for="title">Type:</label>
            <select name="type_id" id="type_id" class="infos input @error('category_id') is-invalid @enderror">

                <option value="">Nessuna</option>
            
                @foreach ($types as $type)
            
                    <option value="{{$type->id}}" {{$type->id == old('type_id') ? 'selected' : ''}}>{{$type->name}}</option>
            
                @endforeach
            
            </select>
            @error('category_id')
            <div class="invalid-feedback mb-3 mt-0">
                {{$message}}
            </div>
            @enderror

            <label for="description" class="lb">Description:</label>
            <textarea name="description" id=description" cols="30" rows="3" class="infos input @error('description') is-invalid @enderror">{{old('description')}}</textarea>
            @error('description')
            <div class="invalid-feedback mb-3 mt-0">
                {{$message}}
            </div>
            @enderror
        
            <label for="url_img" class="lb">URL Img:</label>
            <input name="url_img" id="url_img" type="text" class="infos input @error('url_img') is-invalid @enderror" value="{{old('url_img')}}">
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