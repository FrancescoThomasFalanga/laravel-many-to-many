@extends('layouts/admin')

@section('content')
    



    <section>

        @foreach ($projects as $project)            

        <div class="project">
            <div class="left">

                <a href="">
                    <img src="{{$project->url_img}}" alt="Project IMG">
                </a>

            </div>

            <div class="right">

                <h2>{{$project->title}}</h2> 
                
                <h5>Types: <span class="text-decoration-underline">{{$project->type->name ?? 'nessuna'}}</span></h5>

                <h6>Technologies: 
                    
                    @foreach($project->technologies as $technology) 

                        <span class="badge rounded-pill mx-1 my-1" style="background-color: {{$technology->color}}">{{$technology->name}}</span>

                    @endforeach

                </h6>

                <p>{{$project->description}}</p>

                <button class="button">
                    <a href="{{route('admin.projects.show', $project->slug)}}">View Project</a>
                </button>

            </div>
        </div>

        @endforeach
    </section>

@endsection