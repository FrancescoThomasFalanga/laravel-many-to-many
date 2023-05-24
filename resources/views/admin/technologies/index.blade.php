@extends('layouts/admin')

@section('content')

    <div class="container py-3">

        <h1 class="mt-5 mb-0 green text-uppercase">All Technologies</h1>

        <table class="table text-white me-5 mt-5">
            <thead>
            <tr class="green">
                <th scope="col">Name</th>
                <th scope="col">Color</th>
                <th scope="col">Slug</th>
                <th scope="col">Command</th>
            </tr>
            </thead>
            <tbody>
    
                @foreach ($technologies as $technology)
                    
                    <tr>
    
                        <td>{{$technology->name}}</td>
                        <td>{{$technology->color}}</td>
                        <td>{{$technology->slug}}</td>
                        <td >
                            <a href="{{route('admin.technologies.show', $technology->slug)}}" class="green ms-4">
                                <i class="fa-solid fa-magnifying-glass"></i>
                            </a>
                        </td>
    
                    </tr>
    
                @endforeach
    
            </tbody>
        </table>

    </div>


@endsection