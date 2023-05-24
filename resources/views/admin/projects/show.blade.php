@extends('layouts/admin')

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
                        <a href="{{route('admin.projects.edit', $project->slug)}}">Edit</a>
                    </button>
    
                    <form action="{{route('admin.projects.destroy', $project->slug)}}" method="POST">
            
                        @csrf
                        @method('DELETE')
            
                        <button class="btn btn-danger text-primary fw-bold p-3" type="button" data-bs-toggle="modal" data-bs-target="#exampleModal">
                          DELETE
                        </button>
              
                        <div class="modal fade text-primary" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                          <div class="modal-dialog">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h1 class="modal-title fs-4" id="exampleModalLabel">Delete Project</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                              </div>
                              <div class="modal-body">
                                Are you sure you want to delete the actual Project?
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-secondary delete-btn" data-bs-dismiss="modal">CLOSE<span></span></button>
                                <button type="submit" class="btn btn-secondary">DELETE<span></span></button>
                              </div>
                            </div>
                          </div>
                        </div>
                      
                    </form>
    
                    <button class="button">
                        <a href="{{route('admin.projects.index')}}">Go Back</a>
                    </button>

                </div>

            </div>
        </div>

    </section>

@endsection