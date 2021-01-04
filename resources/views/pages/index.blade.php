@extends('layouts.app')
@section('content')
    <!--Jumbotron-->
    <div class="jumbotron text-white jumbotron-image shadow">
        <div class="container">
          <h1 class="ml-5 mb-3 ">Johannes Lundebacke</h1>
          <p class="mx-5 lead">Lorem ipsum dolor sit amet consectetur adipisicing elit. Nihil, quo quos. Accusantium magni illum exercitationem minus aperiam error dolorem doloribus recusandae consequatur! Odit, blanditiis deleniti! Id veritatis porro officiis unde! Lorem ipsum dolor sit, amet consectetur adipisicing elit. Officia cumque ipsum maiores at eaque laborum, ratione explicabo natus harum ea sed molestias repellendus nisi hic iure delectus, error commodi tenetur. Lorem ipsum dolor sit amet consectetur adipisicing elit.?</p>
          <hr class="my-4">
          <a class="ml-2 btn btn-primary a-btn" href="#">Mer om oss!</a>
          <a class="ml-2 btn btn-primary a-btn" href="#">Kontakta oss!</a>
        </div>
      </div>


      <!--Ikoner: Hus(Projekt) Telefon(Kontakt) Gubbe(Om oss)-->
      <div class="container-fluid padding">
        <div class="row text-center padding">
          <div class="col-xs-12 col-md-4">
            <a href="#">
              <img src="{{ URL('images/icons/project_icon.png') }}" alt="projekt-ikon">
              <h4 class="icon-text">Kolla in våra projekt</h4>
            </a>  
          </div>
          <div class="col-xs-12 col-md-4">
            <a href="#">
              <img src="{{ URL('images/icons/phone_icon.png') }}" alt="kontakt-ikon">
              <h4 class="icon-text">Kontakta oss</h4>
            </a>
          </div>
          <div class="col-xs-12 col-md-4">
            <a href="#">
              <img src="{{ URL('images/icons/about_icon.png') }}" alt="om_oss-ikon">
              <h4 class="icon-text">Mer om oss</h4>
            </a>  
          </div>
        </div>
      </div>
@endsection