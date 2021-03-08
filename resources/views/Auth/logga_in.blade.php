@extends('layouts.app', ['title' => 'Logga In - JBA'])
@section('content')
  
    <div class="container h-100">
        <form class="mt-5" action="{{ route('login') }}" method="POST">
            <!--csrf token-->
            @csrf
            <div class="container form_container py-3 px-5 bgDiv">
                <h2 class="text-center">Logga in</h2>
                <hr class="w-100"/>
                <!--Kolla om användaren försökt logga in-->
                @if (session('inloggad'))
                    <div class="alert alert-danger text-center">
                        <p>{{ session('inloggad') }}</p>
                    </div>  
                @endif

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
                    <input type="submit" value="Logga in" class="btn button w-25">
                </div>
            </div>
        </form>
    </div>
@endsection