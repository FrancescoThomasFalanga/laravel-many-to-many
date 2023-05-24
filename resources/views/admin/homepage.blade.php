@extends('layouts/admin')

@section('content')

    <div class="container">

            <h1 class="text-shadow">
                Hey, I'm Francesco
            </h1>

            <p>A Full Stack Web Developer</p>

            <button>
                <a class="fs-5" href="{{route('admin.projects.index')}}">MY PROJECTS<span></span></a>
            </button>

    </div>

@endsection