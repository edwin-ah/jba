@extends('layouts.app')
@section('content')
<div class="container">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Lägg till bild</h4>
            <form action="{{ route('add_image') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="container form_container py-3 px-5">
                    <div class="form-group px-3">
                        <label for="projectname">Projektnamn</label>
                        <select id="projectname" name="projectname" class="form-control @error('projectname') border border-danger @enderror" value="{{ old('projectname') }}">
                            @foreach ($projectname as $name)
                                <option>{{ $name->projectname }}</option>
                            @endforeach
                        </select>
    
                        @error('projectname')
                            <div>
                                <p class="text-danger">{{ $message }}</p>
                            </div>
                        @enderror
                    </div>
                    <div class="form-group px-3">
                        <label for="image">Välj en bild</label>
                        <input type="file" id="image" name="image" placeholder="Välj en bild" class="form-control-file">
                        @error('image')
                            <div>
                                <p class="text-danger">{{ $message }}</p>
                            </div>  
                        @enderror
                    </div>    

                    <!--div för att visa bilder-->
                    <div class="img-preview px-3" id="img-preview">
                        <img src="" alt="Bild förhandsgranskning" class="img-preview-img">
                    </div>
                   
                    
                    <div class="form-group py-2 px-3">
                        <input type="submit" value="Lägg till bild" class="btn btn-primary">
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<script src="{{ asset('js/custom.js') }}"></script>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        previewImg();
    });
</script>
@endsection