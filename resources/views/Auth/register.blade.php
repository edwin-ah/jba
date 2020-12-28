@extends('layouts.app')
@section('content')
    <!--Registrera formulär-->
    <div class="container h-100">
        <form class="mt-5">
            <h2>Registrera</h2>
            <div class="container py-3 px-5">
                <div class="form-group px-3">
                    <label for="name">Namn</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Ange ditt namn">
                </div>
                <div class="form-group py-2 px-3">
                    <label for="password">Lösenord</label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="Ange lösenord">
                </div>
                <div class="form-group py-2 px-3">
                    <label for="password_confirmation">Bekräfta lösenord</label>
                    <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="Upprepa lösenord">
                </div>
                <div class="form-group py-2 px-3">
                    <input type="submit" class="btn btn-primary" value="Registrera">
                </div>
            </div>
        </form>
    </div>
@endsection