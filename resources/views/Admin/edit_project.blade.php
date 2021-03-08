@extends('layouts.app', ['title' => 'Redigera Projekt - JBA'])
@section('content')
<div class="container h-100">
    <form class="mt-5" action="{{ route('edit_project') }}" method="POST">
        <!--csrf token-->
        @csrf
        <div class="container form_container py-3 px-5 bgDiv">
            <h4 class="text-center">Uppdatera projektet "{{ $project[0]->projectname }}"</h4>
            <hr class="w-100"/>
            <input type="hidden" name="oldProjectname" value="{{ $project[0]->projectname }}">
            <div class="form-group px-3">
                <label for="projectname">Projektnamn</label>
                <input type="text" id="projectname" name="projectname" class="form-control" value="{{ $project[0]->projectname }}">
            </div>
            <div class="form-group px-3">
                <label for="description">Projektets beskrivning</label>
                <textarea id="description" name="description" class="form-control" rows="5">{{ $project[0]->description }}</textarea>
            </div>
            <div class="form-group py-2 px-3">
                <input type="submit" value="Uppdatera beskrivningen" class="btn button w-25">
            </div>
        </div>
    </form>
</div>
@endsection