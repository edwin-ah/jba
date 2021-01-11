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

        @elseif($message = Session::get('failure'))
            <div class="alert alert-danger alert-dismissible fade show text-center">
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
        <!--Om det finns projekt-->
        @if ($projects->count())
            <div class="row">
                @foreach ($projects as $project)
                    <div class="col-xl-4 col-lg-6 col-md-6">
                        <div class="card my-4 mr-4 project-card @auth project-card--auth @endauth">
                            <!--Kolla hur många bilder projektet har-->
                            @if (count($project->images) == 0)
                                <p>Ingen bild</p>
                            @elseif(count($project->images) == 1)
                                <div class="img-container">
                                    <img class="card-img-top" src="/storage/projectImages/{{ $project->images->first()->imagename }}" alt="projektbild" data-original="/storage/projectImages/{{ $project->images->first()->imagename }}" />
                                </div>
                            @elseif(count($project->images) > 1)
                                <div class="carouselExampleControls-{{ $project->projectname}} carousel slide" data-ride="carousel">
                                    <div class="carousel-inner">
                                        
                                        @foreach ($project->images->pluck('imagename') as $item)
                                            <div class="carousel-item @if($loop->first) active @endif">                                                
                                                <div class="img-container">
                                                    <img src="/storage/projectImages/{{$item}}" class="d-block w-100" alt="projektbild" data-original="/storage/projectImages/{{$item}}"/>                                                    
                                                </div>
                                            </div>
                                        @endforeach

                                        <a class="carousel-control-prev carousel-btn" href=".carouselExampleControls-{{ $project->projectname }}" role="button" data-slide="prev">
                                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                            <span class="visually-hidden"></span>
                                        </a>
                                        <a class="carousel-control-next carousel-btn" href=".carouselExampleControls-{{ $project->projectname }}" role="button" data-slide="next">
                                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                            <span class="visually-hidden"></span>
                                        </a>
                                    </div>
                                </div>
                            @endif

                            <div class="card-body">
                                @auth
                                    <h5 class="card-title">{{ $project->projectname }}</h5>
                                @endauth
                                <p class="card-text">{{ $project->description }}</p>
                                <!--Buttons om användaren är inloggad-->
                                @auth
                                    <div class="d-flex justify-content-between align-items-center admin-buttons">
                                        <a href="{{ route('edit_project_view', ['project' => $project->projectname]) }}" class="btn btn-primary mr-1 ml-1">Redigera projekt</a>
                                        <a href="{{ route('delete_image_view', ['project' => $project->projectname]) }}" class="btn btn-primary mr-1 ml-1">Radera bilder</a>
                                        <a href="{{ route('delete_project_view', ['project' => $project->projectname]) }}" class="btn btn-danger mr-1 ml-1">Radera projektet</a>
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

    <div class="div-modal">
        <img src="" class="img-modal"/>
    </div>

<script src="{{ asset('js/custom.js') }}"></script>
<script>
    document.addEventListener("DOMContentLoaded", function(){
        showModal();
    });
</script>
@endsection
