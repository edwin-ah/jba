@extends('layouts.app', ['title' => 'Kontakt - JBA'])
@section('content')
<h1 class="text-center mt-4"><span class="fat">Kontakta </span><span class="jba">JBA</span></h1>
<hr class="hr-header-separator"/>
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
    </div>


<div class="container-fluid p-5 contact text-white rounded shadow">
    <div class="row justify-content-between">
        <div class="col-sm-12 col-lg-4">
            <p class="lead mt-3">Kontakta oss genom följande uppgifter</p>
            <div class="contactInfo-list">
                <ul class="list-group">
                    <li>
                        <p><span class="material-icons md-18 icons">call</span> Telefon: <span class="font-italic">0705904854</span>
                        </p>
                    </li>
                    <li>
                        <p><span class="material-icons md-18 icons">email</span> Epost: <span class="font-italic">johannes@jbabygg.se</span>
                        </p>
                    </li>
                </ul>
            </div>
            <img src="{{ URL('images/jonny.jpg') }}" alt="Bild på mig" class="rounded shadow img-fluid">
        </div>
        <div class="col-sm-12 col-lg-6">
            <p class="lead mt-3">Eller fyll i formuläret så återkommer vi så snart vi kan!</p>
            <form action="{{ route('send_mail') }}" method="POST" id="contactForm">
                @csrf
                <div class="form-group">
                    <label for="email">Din epostadress <span class="required">*</span></label>
                    <input type="email" class="form-control @error('email') border border-danger @enderror" id="email" name="email" placeholder="email@outlook.com" value="{{ old('email') }}">
                    <small id="emailHelp" class="form-text ">Din epostadress delas aldrig med någon annan.</small>
                    @error('email')
                        <div>
                            <p class="text-danger bg-dark">{{ $message }}</p>
                        </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="phone">Ditt telefonnummer <span class="required">*</span></label>
                    <input type="number" class="form-control @error('phone') border border-danger @enderror" id="phone" name="phone" placeholder="0701234567" value="{{ old('phone') }}">
                    <small id="emailHelp" class="form-text">Ditt telefonnummer delas aldrig med någon annan.</small>
                    @error('phone')
                        <div>
                            <p class="text-danger bg-dark">{{ $message }}</p>
                        </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="subject">Ämne <span class="required">*</span></label>
                    <input type="text" class="form-control @error('subject') border border-danger @enderror" id="subject" name="subject" placeholder="Ämne" value="{{ old('subject') }}">
                    @error('subject')
                        <div>
                            <p class="text-danger bg-dark">{{ $message }}</p>
                        </div>
                    @enderror
                    
                </div>
                <div class="form-group">
                    <label for="description">Beksriv ärendet <span class="required">*</span></label>
                    <textarea id="description" class="form-control @error('description') border border-danger @enderror" name="description" rows="5">{{ old('description') }}</textarea>

                    @error('description')
                        <div>
                            <p class="text-danger bg-dark">{{ $message }}</p>
                        </div>
                    @enderror
                </div>
                <div class="form-group mt-3 recaptcha">
                    {!! NoCaptcha::renderJs() !!}
                    {!! NoCaptcha::display() !!}
                    @error('g-recaptcha-response')
                    <div>
                        <p class="text-danger bg-dark">{{ $message }}</p>
                    </div>
                    @enderror
                </div>
                <div class="form-group">
                    <button type="submit" class="btn button w-50" form="contactForm"><span class="material-icons icons">send</span> Skicka Mail</button>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="footer-spacing"></div>
@endsection