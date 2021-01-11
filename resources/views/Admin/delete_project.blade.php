@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="card">
            <div class="card-body h-100">
                <h4 class="card-title">Är du säker på att du vill radera projektet "{{ $project[0]->projectname }}"?</h4>
                <form action="{{ route('delete_project') }}" method="POST">
                    <!--csrf token-->
                    @csrf
                    <input type="hidden" name="projectname" value="{{ $project[0]->projectname }}">
                    <div class="container form_container py-3 px-5">
                        <div class="form-group px-3">
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="deleteCheck" name="delete" onclick="changeBtnColor()">
                                <label for="deleteCheck" class="form-check-label">Ja</label> 
                            </div>
                        </div>
                        <div class="form-group py-2 px-3">
                            <input type="submit" value="Radera" id="delete-btn" class="btn btn-primary w-25">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="{{ asset('js/custom.js') }}"></script>
@endsection