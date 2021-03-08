@extends('layouts.app', ['title' => 'Lägg Till Projekt - JBA'])
@section('content')
<div class="container h-100">
    <form class="mt-5" action="{{ route('add_project') }}" method="POST">
        @csrf
        <div class="container form_container py-3 px-5 bgDiv">
            <h2 class="text-center">Lägg till ett nytt projekt</h2>
            <hr class="w-100"/>
            <div class="form-group px-3">
                <label for="projectname">Projektnamn</label>
                <input type="text" id="projectname" name="projectname" placeholder="Ange projektets namn" class="form-control @error('projectname') border border-danger @enderror" value="{{ old('projectname') }}">

                @error('projectname')
                    <div>
                        <p class="text-danger">{{ $message }}</p>
                    </div>
                @enderror
            </div>
            <div class="form-group px-3">
                <label for="description">Beskriv projektet</label>
                <textarea id="description" name="description" class="form-control @error('description') border border-danger @enderror" value="{{ old('description') }}" rows="5"></textarea>
                
                @error('description')
                    <div>
                        <p class="text-danger">{{ $message }}</p>
                    </div>  
                @enderror
            </div>
            <div class="form-group py-2 px-3">
                <input type="submit" value="Lägg till projektet" class="btn button w-25">
            </div>
        </div>
    </form>

</div>
@endsection