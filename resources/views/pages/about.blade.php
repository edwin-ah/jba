@extends('layouts.app', ['title' => 'Om oss - JBA'])
@section('content')

<h1 class="text-center mt-4"><span class="fat">Om </span><span class="jba">JBA</span></h1>
<hr class="hr-header-separator"/>
<div class="container-fluid rounded about bg-light py-5 shadow">
    <div class="row justify-content-between ">
        <div class="col-sm-12 col-lg-6">
            <h4 class="fat">Din hantverkare i norra Bohuslän</h4>
            <p class="align-self-center">
                Jag heter <span class="strong">Johannes Lundebacke</span> som driver JBA på egen hand, Jag har arbetat inom byggbranschen i ca 10 år. Jag arbetar utan anställda och vänder mig till er som befinner er i Tanum med omnejd. 
                JBA är en mindre firma som möjliggör en nära kontakt med oss, Det möjligör för ett gott samarbete.
                När du väljer JBA, väljer du ett plikttroget företag som lägger stor vikt vid Kundens behov och kvalitet.
                Företaget innehar erforderlig Bygg & Entreprenad försäkring samt F-Skattsedel.
            </p>
            <div class="mt-4 mb-4">
                <h4 class="fat ">Byggtjänster</h4>
                <ul class="list-group services">
                    <li class="group-item">
                        <p class="ml-2">
                            <span class="material-icons icons">check</span>
                            JBA utför alla slag av bygg- och renoveringsprojekt.
                        </p>
                    </li>

                    <li class="group-item">
                        <p class="ml-2">
                            <span class="material-icons icons">check</span>
                            Nybyggnad
                        </p>
                    </li> 

                    <li class="group-item">
                        <p class="ml-2">
                            <span class="material-icons icons">check</span>
                            Ombyggnad
                        </p>
                    </li> 

                    <li class="group-item">
                        <p class="ml-2">
                            <span class="material-icons icons">check</span>
                            Tillbyggnad
                        </p>
                    </li> 

                    <li class="group-item">
                        <p class="ml-2">
                            <span class="material-icons icons">check</span>
                            Renovering
                        </p>
                    </li>

                    <li class="group-item">
                        <p class="ml-2">
                            <span class="material-icons icons">check</span>
                            JBA erbjuder även ett stort utbud av tjänster inom byggbranschen.
                        </p>
                    </li>
                </ul>
            </div>
            <div>
                <h4 class="fat">Använd ROT-avdraget<h4>
                <p>
                    Med hjälp av Skatteverkets ROT-avdrag sänks arbetskostnaden för renoveringar i bostaden. 
                    Vi sköter all kontakt med Skatteverket och drar av skatterabatten direkt på fakturan.
                    
                    Läs mer om ROT-avdraget på <a href="https://www.skatteverket.se/privat/skatter/fastigheterbostad/husarbeterot.4.2e56d4ba1202f95012080002966.html">Skatteverkets hemsida.</a>
                </p>
            </div>
            <div class="text-center">
                <a href="{{ route('contact') }}" class="btn button mt-4">Kontakta oss!</a>
            </div>
        </div>
        <div class="col-sm-12 col-lg-4 align-self-center">
            <img src="{{ URL('images/jonny.jpg') }}" alt="Bild på mig" class="rounded img-fluid">
        </div>
    </div>
</div>
@endsection