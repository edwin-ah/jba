@extends('layouts.app')
@section('content')
    <div class="container">
        @if($message = Session::get('success'))
        <div class="alert alert-success alert-dismissible fade show text-center">
            <p class="lead">{{ $message }}</p>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
        </div>
        @endif
        
        @auth
            <div>
                <a href="{{ route('add_projekt')}}" class="btn btn-primary btn-block">Lägg till projekt</a>
                <a href="{{ route('image')}}" class="btn btn-primary btn-block">Lägg till bild</a>
            </div>
        @endauth
        @if ($projekten->count())
            <div class="row">
                @foreach ($projekten as $projekt)
                    <div class="col-sm-4 col-md-4">
                        <div class="card my-4">
                            <img class="card-img-top" src="/storage/projectImages/{{ $projekt->namn }}" alt="projektbild">
                            <div class="card-body">
                                @auth
                                    <h5 class="card-title">{{ $projekt->projektnamn }}</h5>
                                @endauth
                                <p class="card-text">{{ $projekt->beskrivning }}</p>
                                @auth
                                    <div class="d-flex justify-content-between align-items-center">
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