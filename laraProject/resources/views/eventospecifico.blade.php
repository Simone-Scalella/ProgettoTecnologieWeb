@extends ('layouts.public')
@php
use Carbon\Carbon
@endphp
@section('scripts')
@parent
<script src="{{ asset('js/functionBottone.js') }}" > </script>
@endsection
@section('content')
<section  style="border-color: var(--dark);background: var(--light);color: var(--white);">
    <div>
        <h1 class="display-4 text-dark"><strong>{{$evento->nome_evento}}</strong></h1>
    </div>
    <div>
        <div class="container border rounded-0 border-dark shadow">
            <div class="row align-items-center">
            	@if(@isset($evento->immagine))
                        <div class="col-md-4"><img src={{asset("images/$evento->immagine")}} width="96" height="120"/></div>
                    @else
                        <div class="col-md-4"><img src={{asset("images/default.jpg")}} width="96"  height="120"/></div>
                    @endif

                <div class="col-md-4">
                    <h4 class="text-black-50">{{$evento->citta}}, {{$evento->data_evento}} durata: {{$evento->durata}} ore</h4>
                    <h3 class="text-dark">Organizzatore: {{$evento->nome_organizzazione}}</h3>
                </div>
                <div class="col-md-4">
                   @if((($check=Carbon::now())->between($evento->data_sconto,$evento->data_evento)) && (!is_null($evento->sconto))  &&  (!is_null($evento->data_sconto)))
                   <del style="text-decoration-color: black;" ><h1 class="text-danger">Prezzo:{{$evento->prezzo_unitario}}</h1></del>
                   <h1 class="text-success">Prezzo scontato:{{$evento->prezzo_scontato}}</h1>
                   @else
                   <h1 class="text-success">Prezzo:{{$evento->prezzo_unitario}}</h1>
                   @endif
                    <h3 class="text-danger">Biglietti rimanenti: {{$evento->bigl_disp}} &#8725; {{$evento->numero_biglietti}} 
                        <h3 class="text-danger">Numero di persone che seguono l'evento: {{$evento->segui}} </h3>
                    	
                </div>
            </div>
        </div>
    </div>
    <div>
        <h2 style="color: black; padding: 1em;">Luogo dell'evento</h2>
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6"><iframe style="width: 69em;" src="https://maps.google.com/maps?q={{urlencode($evento->indirizzo_evento)}},{{urlencode($evento->citta)}}%20{{urlencode($evento->provincia)}}&ie=UTF8&iwloc=&output=embed" width="400" height="300" style="border:0;" allowfullscreen="" loading="lazy"></iframe></div>
            </div>
        </div>
    </div>
        <div class="container">
            <div class="row justify-content-center align-items-center">
                <div class="col-md-6">
                    <h3 class="text-dark">INFO SULL&#39;EVENTO</h3>
                    <p class="text-dark"><br />{{$evento->descrizione}}<br /></p>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="row justify-content-center align-items-center">
                <div class="col-md-6">
                    <h3 class="text-dark">Il PROGRAMMA</h3>
                    <p class="text-dark"><br/>{!! nl2br($evento->programma) !!}<br /></p>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="row justify-content-center align-items-center">
                <div class="col-md-6">
                    <h3 class="text-dark">COME RAGGIUNGERE L&#39;EVENTO</h3>
                    <p class="text-dark"><br/>{{ $evento->indicazioni}}<br /></p>
                </div>
            </div>
        </div>
    @can('isUser2')
    <div class="divSimo">
    	<a style="text-decoration: none;" href="{{route ('acquisto_biglietto',[$evento->id_evento])}}">
    	<button class="buttonSimo2" type="button" id="bottone1" onmouseover="toggleMenu('bottone1')", onmouseout="toggleMenu2('bottone1')">Acquista</button>
    	</a>
        </div>
    @if($evento->verifica != 1)
    <div class="divSimo">
        <a style="text-decoration: none;" href="{{route ('partecipa_evento',[$evento->id_evento])}}">
        <button  class="buttonSimo2" type="button" id="bottone2" onmouseover="toggleMenu('bottone2')", onmouseout="toggleMenu2('bottone2')">Partecipa</button>
        </a>
        </div>
        @endif
    @endcan
</section>
@endsection

