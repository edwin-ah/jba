@extends('layouts.app')
@section('content')
<div class="container about-div">
    <div class="row mt-5">
        <div class="text col-md-6 text-white mt-5">
            <h1>Om oss</h1>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Mollitia distinctio deserunt voluptate inventore assumenda architecto suscipit id eos expedita tempora dignissimos consequuntur possimus quibusdam dicta labore, blanditiis nemo, saepe rem.</p>
        </div>
        <div class="about-img col-md-6 mt-5 rounded">
            <img src="{{ URL('images/jonny.jpg') }} " alt="Bild på mig">
        </div>
    </div>
</div>
@endsection