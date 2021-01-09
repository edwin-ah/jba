@extends('layouts.app')
@section('content')
    <div class="container h-100">
        <h3>Välj vilka bilder du vill ta bort</h3>   
        <form action="{{ route('delete_image') }}" method="POST">
            <!--csrf token-->
            @csrf
            <div class="container form_container py-3 px-5">
                @foreach ($images as $image)
                    <div class="form-group">
                        <input type="checkbox" id="{{ $image->id }}" name="imageId[]" value="{{ $image->id }}">
                        <label for="{{ $image->id }}">
                            <div class="delete-image-div">
                                <img src="/storage/projectImages/{{ $image->imagename }}" alt="projektbild">
                            </div>
                        </label>
                    </div>
                @endforeach
                <div class="form-group py-2 px-3">
                    <input type="submit" value="Ta bort valda bilder" class="btn btn-primary w-25">
                </div>
            </div>
        </form>
    </div>
@endsection