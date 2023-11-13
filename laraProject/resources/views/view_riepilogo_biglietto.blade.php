@extends ('layouts.public')
<title>By4Event - Eventi</title>
@section('content')
@auth
@can('isUser2')

<section class="portfolio-block block-intro" style="border-color: var(--dark);background: var(--light);color: var(--white);">
<div>
    <h1 class="display-4 text-dark"><strong>Riepilogo Acquisto</strong></h1>
</div>
<div>
    <div class="container border rounded-0 border-dark shadow">
        <div class="row align-items-center">
            <div class="col-md-4">
                <h4 class="text-black-50">Biglietto acquistato: {{$riepilogo->quantita}}</h4>
                <h3 class="text-dark">Data Acquisto: {{$riepilogo->data_acquisto}}</h3>

            </div>
            <div class="col-md-4">
                <h3 class="text-dark">Tipo Pagamento: {{$riepilogo->tipo_pagamento}}</h3>
                <h1 class="text-success">Costo:{{$riepilogo->costo}}</h1>
            </div>
        </div>
    </div>
</div>


<div>
    <h1 class="display-4 text-dark"><strong>{{$evento->nome_evento}}</strong></h1>
</div>
<div>
    <div class="container border rounded-0 border-dark shadow">
        <div class="row align-items-center">
            @if(@isset($evento->immagine))
                    <div class="col-md-4"><img src={{asset("images/$evento->immagine")}} width="96" height="120"/></div>
                @else
                    <div class="col-md-4"><img src={{asset("images/not-found.png")}} width="96"  height="120"/></div>
                @endif

            <div class="col-md-4">
                <h4 class="text-black-50">{{$evento->citta}}, {{$evento->data_evento}} durata: {{$evento->durata}} ore</h4>
                <h3 class="text-dark">Organizzatore: {{$evento->nome_organizzazione}}</h3>
            </div>
            <div class="col-md-4">
                <h1 class="text-success">Prezzo:{{$evento->prezzo_unitario}}</h1>
                <h3 class="text-danger">Biglietti rimanenti: {{$evento->bigl_disp}} &#8725; {{$evento->numero_biglietti}} 
               
            </div>
        </div>
    </div>
    </div>
</section>
@endcan
@endauth
@endsection

