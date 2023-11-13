@extends('layouts.public')
@section('content')
<div class="container">
    <div class="row align-items-center">
        <div class="col">
            <img src="{{ asset('images/immagine_contatti.jpg') }}" />
            <h2 class="text-left text-dark"><strong>Contatti</strong><br /><br /></h2>
            <h3 class="text-left text-dark">Se sei un cliente e hai bisogno di assistenza (ad esempio per verificare lo stato del tuo ordine, chiedere un voucher, modificare un ordine,...) puoi:</h3>
            <p class="text-left text-dark">- telefonarci allo <a href = "tel:073656XO8">073656XO8</a>, attivo dal Lunedì al Venerdì con orario continuato 8-18;</p>
            <p class="text-left text-dark">- scriverci a <a href = "mailto:contattaci@by4event.it">contattaci@by4event.it </a> ,dove un nostro collaboratore ti risponderà in massimo 48 ore (escluso giorni festivi).</p>
            <h3 class="text-left text-dark"><br />Se sei un organizzatore hai un accesso a te dedicato: <br /></h3>
            <p class="text-left text-dark">contattaci 24h su 24 allo <a href = "tel:089567O98">089567O98</a>.</p>
        </div>
    </div>
</div>
@endsection