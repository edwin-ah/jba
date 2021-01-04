@extends('layouts.app')
@section('content')
    @foreach ($bilder as $img)
        <img src="/storage/projectImages/{{ $img->namn }}">
    @endforeach
@endsection