@extends('layouts/admin')

@section('content')

    <div class="container py-3 d-flex mt-5 justify-content-start">

        <div class="single-type d-flex gap-4  mb-5 mt-5">

            <h1 class="mb-0">Selected Type</h1>

             <a class="btn-custom" href="{{route('admin.types.index')}}">Go Back</a>

        </div>


        <table class="table text-white me-5">
            <thead>
            <tr>
                <th scope="col">Name</th>
                <th scope="col">Description</th>
                <th scope="col">Slug</th>
            </tr>
            </thead>
            <tbody>
                    
                <tr>

                    <td>{{$type->name}}</td>
                    <td>{{$type->description}}</td>
                    <td>{{$type->slug}}</td>

                </tr>
    
            </tbody>
        </table>

        <div class="d-flex gap-4 mt-5">

            <button class="button" style="margin: 0">
                <a href="{{route('admin.types.edit', $type->slug)}}">Edit</a>
            </button>

            <form action="{{route('admin.types.destroy', $type->slug)}}" method="POST">
    
                @csrf
                @method('DELETE')
    
                <button class="btn btn-danger text-primary fw-bold p-3" type="button" data-bs-toggle="modal" data-bs-target="#exampleModal">
                  DELETE
                </button>
      
                <div class="modal fade text-primary" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h1 class="modal-title fs-4" id="exampleModalLabel">Delete Type</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <div class="modal-body">
                        Are you sure you want to delete the actual Type?
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary delete-btn" data-bs-dismiss="modal">CLOSE<span></span></button>
                        <button type="submit" class="btn btn-secondary">DELETE<span></span></button>
                      </div>
                    </div>
                  </div>
                </div>
              
            </form>

        </div>

    </div>


@endsection