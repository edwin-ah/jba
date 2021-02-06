@extends('layouts.app')
@section('content')
    <!--Jumbotron-->
    <div class="jumbotron shadow text-center">
      <div class="container">
        <h2 class="mb-4">Johannes Bygg & Anläggning</h2>
        <p class="mx-5">Lorem ipsum dolor sit amet consectetur adipisicing elit. Nihil, quo quos. Accusantium magni illum exercitationem minus aperiam error dolorem doloribus recusandae consequatur!</p>
        
        <div class="align-items-center mt-5">
          <a class="ml-2 mt-1 btn button rounded-pill shadow px-3" href="#">Mer om oss!</a>
          <a class="ml-2 mt-1 btn button rounded-pill shadow px-3" href="{{ route('contact') }}">Kontakta oss!</a>
        </div>
      </div>
    </div>


      <!--Ikoner: (Projekt) (Kontakt) (Om oss)-->
      <div class="container-fluid padding mt-5">
        <div class="row text-center padding">
          <div class="col-xs-12 col-md-4 mt-3 icon">
            <a href="{{ route('project') }}">
              <img src="{{ URL('images/icons/project_icon.png') }}" alt="projekt-ikon">
              <h4 class="icon-text">Kolla in våra projekt</h4>
            </a>  
          </div>
          <div class="col-xs-12 col-md-4 mt-3 icon">
            <a href="{{ route('contact') }}">
              <img src="{{ URL('images/icons/phone_icon.png') }}" alt="kontakt-ikon">
              <h4 class="icon-text">Kontakta oss</h4>
            </a>
          </div>
          <div class="col-xs-12 col-md-4 mt-3 icon">
            <a href="{{ route('about') }}">
              <img src="{{ URL('images/icons/about_icon.png') }}" alt="om_oss-ikon">
              <h4 class="icon-text">Mer om oss</h4>
            </a>  
          </div>
        </div>
      </div>
@endsection