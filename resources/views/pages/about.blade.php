@extends('layouts.app')
@section('content')
<div class="container h-100 mt-5 rounded text-white bgDiv mb-5">
    <br/>
    <h2 class="text-center">Om oss</h2>
    <hr class="h-separator"/>
    <div class="row">
        <div class="col-sm-12 col-lg-6 d-flex">
            <p class="align-self-center p-5">
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Quae culpa corrupti at eligendi eaque suscipit accusamus, nesciunt mollitia laborum deserunt dignissimos possimus. Sit quod mollitia harum totam, laborum inventore sed? Lorem ipsum dolor sit, amet consectetur adipisicing elit. Voluptas eaque illo magni sed ullam tenetur blanditiis temporibus aut distinctio perferendis expedita, delectus libero amet. Nostrum deleniti dicta nisi exercitationem sint. 
            </p>
        </div>
        <div class="col-sm-12 col-lg-6">
            <img src="{{ URL('images/jonny.jpg') }}" alt="Bild på mig" class="rounded img-fluid">
        </div>
    </div>
    <hr class="h-separator"/>
    <div class="text-center">
        <a href="{{ route('contact') }}" class="btn button w-75 mt-4">Kontakta oss!</a>
    </div>
    <br/>
</div>
@endsection