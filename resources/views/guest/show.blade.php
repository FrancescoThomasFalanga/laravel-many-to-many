@extends('layouts/app')

@section('content')
    
    <section>         

        <div class="project">
            <div class="left">

                <a href="">
                    <img src="{{asset('storage/' . $project->url_img)}}" alt="Project IMG">
                </a>

            </div>

            <div class="right">

                <h2>{{$project->title}}</h2> 
                
                <h5>Type: <span class="text-decoration-underline">{{$project->type->name ?? 'nessuna'}}</span></h5>

                <h6>Technologies: 
                    
                    @foreach($project->technologies as $technology) 

                        <span class="badge rounded-pill mx-1 my-1" style="background-color: {{$technology->color}}">{{$technology->name}}</span>

                    @endforeach

                </h6>

                <strong>GitHub Link: </strong><a href="">{{$project->repo}}</a>

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