@extends('layouts/admin')

@section('content')

    <div class="container py-3">

        <h1 class="mt-5 mb-0 green text-uppercase">All Types</h1>

        <table class="table text-white me-5 mt-5">
            <thead>
            <tr class="green">
                <th scope="col">Name</th>
                <th scope="col">Description</th>
                <th scope="col">Slug</th>
                <th scope="col">Command</th>
            </tr>
            </thead>
            <tbody>
    
                @foreach ($types as $type)
                    
                    <tr>
    
                        <td>{{$type->name}}</td>
                        <td>{{$type->description}}</td>
                        <td>{{$type->slug}}</td>
                        <td class="text-center">
                            <a href="{{route('admin.types.show', $type->slug)}}" class="green">
                                <i class="fa-solid fa-magnifying-glass"></i>
                            </a>
                        </td>
    
                    </tr>
    
                @endforeach
    
            </tbody>
        </table>

    </div>


@endsection