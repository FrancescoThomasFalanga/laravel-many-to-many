@extends('layouts/admin')

@section('content')

<div class="go-back-btn text-center d-flex justify-content-center align-items-center gap-4" style="margin-top:100px">

    <h2 class="mb-0 green text-uppercase">Edit Type</h2>

    <a class="btn-custom" href="{{route('admin.types.show', $type->slug)}}">Go Back <span></span></a>

</div>

    <div class="form-container">

        <form class="form" action="{{route('admin.types.update', $type->slug)}}" method="POST">
            @csrf
            @method('PUT')
    
    
            <label class="lb" for="name">Name:</label>
            <input name="name" id="name" type="text" class="infos input @error('name') is-invalid @enderror" value="{{old('name') ?? $type->name}}">
            @error('name')
            <div class="invalid-feedback mb-3 mt-0">
                {{$message}}
            </div>
            @enderror
        
            <label for="description" class="lb">Description:</label>
            <textarea name="description" id=description" cols="30" rows="3" class="infos input @error('description') is-invalid @enderror">{{old('description') ?? $type->description}}</textarea>
            @error('description')
            <div class="invalid-feedback mb-3 mt-0">
                {{$message}}
            </div>
            @enderror
        
            <button id="send" type="submit">Send</button>
            <button id="limpar" type="reset">Clear </button>
            
        </form>

    </div>
    

@endsection