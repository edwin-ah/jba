@extends('layouts.app')
@section('content')
    <div class="container">

        <!--Kolla om det finns någon sessions variabel-->
        @if($message = Session::get('success'))
        <div class="alert alert-success alert-dismissible fade show text-center">
            <p class="lead">{{ $message }}</p>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
        </div>
        @endif
        
        <!--Visa detta om användaren är inloggad-->
        @auth
            <div>
                <a href="{{ route('add_project')}}" class="btn btn-primary btn-block">Lägg till projekt</a>
                <a href="{{ route('add_image')}}" class="btn btn-primary btn-block">Lägg till bild</a>
            </div>
        @endauth
        @if ($projects->count())
            <div class="row">
                @foreach ($projects as $project)
                    <div class="col-xl-4 col-lg-6 col-md-6">
                        <div class="card my-4 mr-4 project-card @auth project-card--auth @endauth">
                            @if (count($project->images) == 0)
                                <p>Ingen bild</p>
                            @else
                                <img class="card-img-top" src="/storage/projectImages/{{ $project->images->first()->imagename }}" alt="projektbild">
                            @endif
                            
                            <div class="card-body">
                                @auth
                                    <h5 class="card-title">{{ $project->projectname }}</h5>
                                @endauth
                                <p class="card-text">{{ $project->description }}</p>
                                @auth
                                    <div class="d-flex justify-content-between align-items-center admin-buttons">
                                        <a href="#" class="btn btn-primary mr-1 ml-1">Redigera projekt</a>
                                        <a href="#" class="btn btn-primary mr-1 ml-1">Radera bilder</a>
                                        <a href="#" class="btn btn-danger mr-1 ml-1">Radera projektet</a>
                                    </div>
                                @endauth
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <h1 class="display-4 mt-5 text-center">Det finns inga projekt för tillfället</h1>
        @endif
    </div>    
@endsection
