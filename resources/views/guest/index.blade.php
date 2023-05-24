@extends('layouts/app')

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

                <h2>{{$project->title}}</h2> <h5>Type: <span class="text-decoration-underline">{{$project->type->name ?? 'nessuna'}}</span></h5>

                <p>{{$project->description}}</p>

                <button class="button">
                    <a href="{{route('projects.show', $project->slug)}}">View Project</a>
                </button>

            </div>
        </div>

        @endforeach
    </section>

@endsection