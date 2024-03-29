@extends('layouts.app', ['title' => 'Projekt - JBA'])
@section('content')
<h1 class="text-center mt-4"><span class="fat">Projekt</span></h1>
<hr class="hr-header-separator"/>
    <div class="container">
        @if($message = Session::get('success'))
        <div class="alert alert-success alert-dismissible fade show text-center mt-1">
            <p class="lead">{{ $message }}</p>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>

        @elseif($message = Session::get('failure'))
            <div class="alert alert-danger alert-dismissible fade show text-center mt-1">
                <p class="lead">{{ $message }}</p>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
        
        
        @auth
            <div class="mt-3 ml-2">
                <a href="{{ route('add_project')}}" class="btn button mr-1">Lägg till projekt</a>
                <a href="{{ route('add_image')}}" class="btn button ml-1">Lägg till bild</a>
            </div>
        @endauth

        
        <div class="paginator mt-5">
            {{ $projects->links() }}
        </div>
        

        
        @if ($projects->count())
            <div class="projectCards row">
                @foreach ($projects as $project)
                    <div class="col-xl-4 col-lg-6 col-md-6 col-xs-12">
                        <div class="card my-4 mr-4 project-card @auth project-card--auth @endauth mx-auto bgDiv text-white">
                            <!--Kolla hur många bilder projektet har-->
                            @if (count($project->images) == 0)
                            <div class="img-container">
                                <img class="card-img-top" src="{{ URL('images/logos/jba_logo.png') }}" alt="Logo JBA" data-original="{{ URL('images/logos/jba_logo.png') }}" />
                            </div>
                            @elseif(count($project->images) == 1)
                                <div class="img-container">
                                    <img class="card-img-top" src={{ URL('storage/projectImages/'.$project->images->first()->imagename) }} alt="projektbild" data-original={{ URL('storage/projectImages/'.$project->images->first()->imagename) }} />
                                </div>
                            @elseif(count($project->images) > 1)
                                <div class="carouselExampleControls-{{ $project->projectname}} carousel slide" data-ride="carousel">
                                    <div class="carousel-inner">
                                        
                                        @foreach ($project->images->pluck('imagename') as $image)
                                            <div class="carousel-item @if($loop->first) active @endif">                                                
                                                <div class="img-container">
                                                    <img class="card-img-top" src={{ URL('storage/projectImages/'.$image) }} alt="projektbild" data-original={{ URL('storage/projectImages/'.$image) }} />                                               
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
                                    <h5 class="card-title lead">{{ $project->projectname }}</h5>
                                @endauth
                                <p class="card-text">{{ $project->description }}</p>
                                <!--Buttons om användaren är inloggad-->
                                @auth
                                    <div class="d-flex">
                                        <a href="{{ route('edit_project_view', ['project' => $project->projectname]) }}" class="btn btn-primary mr-1">Redigera projekt</a>
                                        <a href="{{ route('delete_image_view', ['project' => $project->projectname]) }}" class="btn btn-danger mr-1 ml-1">Radera bilder</a>
                                        <a href="{{ route('delete_project_view', ['project' => $project->projectname]) }}" class="btn btn-danger ml-1">Radera projektet</a>
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
