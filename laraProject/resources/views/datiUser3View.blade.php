@extends ('layouts.public')
@section('Title', 'Home3')
@section('scripts')
@parent
<script src="{{ asset('js/functionBottone.js') }}" > </script>
@endsection
@section('content')
@guest
<h1>Ti devi autenticare</h1>
@endguest
@auth
@can('isUser3')
<section  style="border-color: var(--dark);background: white;color: var(--white);"> 
    <div class="divSimoAnagrafiche">
        @isset($dati)
        <h2 style="color: black; font-size: 1.5em;" ></p >Questa è la lista delle anagrafiche dell'utente: </p>
        <ul class="list-group">            
            <li class="display-6 text-dark">username Utente:  <strong style="color: darkorange;">{{$dati['username']}}</strong></li>             
            <li class="display-6 text-dark">nome Organizzazione: <strong style="color: darkorange;">{{$dati['nome_organizzazione']}}</strong></li>
            <li class="display-6 text-dark">Tipo societa': <strong style="color: darkorange;">{{$dati['tipo_societa']}}</strong></li>
            <li class="display-6 text-dark">Citta' di organizzazione: <strong style="color: darkorange;">{{$dati['citta']}}</strong></li>
        </ul>
        </h2>
        @endisset
    </div>
    <div class="divSimo"><h2 style="color: black; text-align: center; font-size: 1.5em;"><p>Queste sono le operzioni che puoi fare sul tuo profilo: </p>
    </h2>
        <ul class = "list-group" style="list-style-type:none">
   <li>
        <a href="{{ route('eventi3') }}">
        <button class="buttonSimo" type="button" id="bottone1" onmouseover="toggleMenu('bottone1')", onmouseout="toggleMenu2('bottone1')">I miei eventi</button>
    </a>
    </li>
<li>
    <a href="{{ route('CreateEvento') }}">
    <button class="buttonSimo" type="button" id="bottone2" onmouseover="toggleMenu('bottone2')", onmouseout="toggleMenu2('bottone2')">Crea un Evento
    </button>
    </a> </li>
    </div>   
</section>
@else
<h1>Non autorizzato</h1>
@endcan
@endauth
@endsection



