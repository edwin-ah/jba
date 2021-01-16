@extends('layouts.app')
@section('content')
    <div class="container">
        @if($message = Session::get('success'))
        <div class="alert alert-success alert-dismissible fade show text-center mt-5">
            <p class="lead">{{ $message }}</p>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>

        @elseif($message = Session::get('failure'))
            <div class="alert alert-danger alert-dismissible fade show text-center">
                <p class="lead">{{ $message }}</p>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif

        <div class="container mt-5 rounded text-white bg-dark">
            <br/>
            <h2 class="text-center">Kontakta oss</h5>
            <div class="row contactInfo">
                <hr class="w-100"/>
                <div class="col-sm-12 col-lg-5">
                    <p class="lead mt-3">Kontakta oss genom följande uppgifter</p>
                    <div class="contactInfo-list">
                        <ul class="list-group">
                            <li>
                                <p><span class="material-icons md-18 icons">call</span> Telefon: <span class="font-italic">0705904854</span>
                                </p>
                            </li>
                            <li>
                                <p><span class="material-icons md-18 icons">email</span> Epost: <span class="font-italic">jba-johannes@hotmail.com</span>
                                </p>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="col-sm-12 col-lg-7">
                    <p class="lead mt-3">Eller fyll i formuläret så återkommer vi så snart vi kan!</p>
                    <form action="{{ route('send_mail') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="email">Din epostadress</label>
                            <input type="email" class="form-control @error('email') border border-danger @enderror" id="email" name="email" placeholder="email@outlook.com" value="{{ old('email') }}">
                            <small id="emailHelp" class="form-text text-muted">Din epostadress delas aldrig med någon annan.</small>
                            @error('email')
                                <div>
                                    <p class="text-danger">{{ $message }}</p>
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="phone">Ditt telefonnummer</label>
                            <input type="number" class="form-control @error('phone') border border-danger @enderror" id="phone" name="phone" placeholder="0701234567" value="{{ old('phone') }}">
                            <small id="emailHelp" class="form-text text-muted">Ditt telefonnummer delas aldrig med någon annan.</small>
                            @error('phone')
                                <div>
                                    <p class="text-danger">{{ $message }}</p>
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="subject">Ämne</label>
                            <input type="text" class="form-control @error('subject') border border-danger @enderror" id="subject" name="subject" placeholder="Ämne" value="{{ old('subject') }}">
                            @error('subject')
                                <div>
                                    <p class="text-danger">{{ $message }}</p>
                                </div>
                            @enderror
                            
                        </div>
                        <div class="form-group">
                            <label for="description">Beksriv ärendet</label>
                            <textarea id="description" class="form-control @error('description') border border-danger @enderror" name="description" rows="5" value="{{ old('description') }}"></textarea>
                            @error('description')
                                <div>
                                    <p class="text-danger">{{ $message }}</p>
                                </div>
                            @enderror
                            
                        </div>
                        <div class="form-group">
                            <input type="submit" class="btn btn-primary w-50" value="Skicka mail">
                        </div>
                    </form>
                </div>
            </div> 
        </div>
    </div>
    <br/>
@endsection