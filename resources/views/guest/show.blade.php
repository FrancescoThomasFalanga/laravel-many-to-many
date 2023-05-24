@extends('layouts/app')

@section('content')
    
    <section>         

        <div class="project">
            <div class="left">

                <a href="">
                    <img src="{{$project->url_img}}" alt="Project IMG">
                </a>

            </div>

            <div class="right">

                <h2>{{$project->title}}</h2> <h5>Type: <span class="text-decoration-underline">{{$project->type->name ?? 'nessuna'}}</span></h5>

                <p>{{$project->description}}</p>

                <div class="d-flex gap-4">
    
                    <button class="button">
                        <a href="{{route('projects.index')}}">Go Back</a>
                    </button>

                </div>

            </div>
        </div>

    </section>

@endsection