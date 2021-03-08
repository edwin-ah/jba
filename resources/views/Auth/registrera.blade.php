@extends('layouts.app', ['title' => 'Registrera - JBA'])
@section('content')
    <!--Formulär för att registrera-->
    <div class="container h-100">
        <form class="mt-5" action="{{ route('register') }}" method="POST">
            <!--csrf token-->
            @csrf
            <div class="container form_container py-3 px-5 bgDiv">
                <h2 class="text-center">Registrera</h2>
                <hr class="w-100"/>
                <div class="form-group px-3">
                    <label for="name">Namn</label>
                    <input type="text" id="name" name="name" placeholder="Ange ditt namn" class="form-control @error('name') border border-danger @enderror" value="{{ old('name') }}">

                    @error('name')
                        <div>
                            <p class="text-danger">{{ $message }}</p>
                        </div>
                    @enderror
                </div>
                <div class="form-group px-3">
                    <label for="username">Användarnamn</label>
                    <input type="text" id="username" name="username" placeholder="Ange ditt användarnamn" class="form-control @error('username') border border-danger @enderror" value="{{ old('username') }}">
                    
                    @error('username')
                        <div>
                            <p class="text-danger">{{ $message }}</p>
                        </div>  
                    @enderror
                </div>
                <div class="form-group py-2 px-3">
                    <label for="password">Lösenord</label>
                    <input type="password"id="password" name="password" placeholder="Ange lösenord" class="form-control @error('password') border border-danger @enderror">

                    @error('password')
                        <div>
                            <p class="text-danger">{{ $message }}</p>
                        </div>
                    @enderror
                </div>
                <div class="form-group py-2 px-3">
                    <label for="password_confirmation">Bekräfta lösenord</label>
                    <input type="password"id="password_confirmation" name="password_confirmation" placeholder="Upprepa lösenord" class="form-control @error('password_confirmation') border border-danger @enderror">

                    @error('password_confirmation')
                        <div>
                            <p class="text-danger">{{ $message }}</p>
                        </div>
                    @enderror
                </div>
                <div class="form-group py-2 px-3">
                    <input type="submit" value="Registrera" class="btn button w-25">
                </div>
            </div>
        </form>
    </div>
@endsection