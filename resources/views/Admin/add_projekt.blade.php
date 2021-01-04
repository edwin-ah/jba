@extends('layouts.app')
@section('content')
<div class="container">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Lägg till ett nytt projekt</h4>
            <form action="{{ route('add_projekt') }}" method="POST">
                @csrf
                <div class="container form_container py-3 px-5">
                    <div class="form-group px-3">
                        <label for="projektnamn">Projektnamn</label>
                        <input type="text" id="projektnamn" name="projektnamn" placeholder="Ange projektets namn" class="form-control @error('projektnamn') border border-danger @enderror" value="{{ old('projektnamn') }}">
    
                        @error('projektnamn')
                            <div>
                                <p class="text-danger">{{ $message }}</p>
                            </div>
                        @enderror
                    </div>
                    <div class="form-group px-3">
                        <label for="beskrivning">Beskriv projektet</label>
                        <textarea id="beskrivning" name="beskrivning" class="form-control @error('beskrivning') border border-danger @enderror" value="{{ old('beskrivning') }}" rows="5"></textarea>
                        
                        @error('beskrivning')
                            <div>
                                <p class="text-danger">{{ $message }}</p>
                            </div>  
                        @enderror
                    </div>
                    <div class="form-group py-2 px-3">
                        <input type="submit" value="Lägg till projektet" class="btn btn-primary w-25">
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection