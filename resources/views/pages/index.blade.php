@extends('layouts.app', ['title' => 'JBA'])
@section('content')

<!--<div class="jumb-pic">-->
    <!--Jumbotron-->
    <div class="jumbotron jumb-pic shadow">
      <h1 class="text-center fat">Johannes Bygg & Anläggning <span class="small mt-1">- din hantverkare i norra Bohuslän</span></h1>
      <div class="container mt-4">
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nihil, quo quos. Accusantium magni illum exercitationem minus aperiam error dolorem doloribus recusandae consequatur! Accusantium magni illum exercitationem minus aperiam error dolorem doloribus recusandae consequatur!</p>
      </div>
      
        <div class="d-flex justify-content-center jumb-btns">
          <a class="mr-3 mt-1 btn button rounded-pill shadow px-3" href="{{ route('about') }}">Mer om oss!</a>
          <a class="ml-3 mt-1 btn button rounded-pill shadow px-3" href="{{ route('contact') }}">Kontakta oss!</a>
        </div>
    </div>
      <!--Ikoner: (Projekt) (Kontakt) (Om oss)-->
      <div class="container-fluid padding">
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
<!--</div>-->
      
@endsection