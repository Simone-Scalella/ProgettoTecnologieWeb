@extends ('layouts.public')
@section('scripts')
@parent
<script src="{{ asset('js/functionBottone.js') }}" > </script>
@endsection
<title>By4Event - Home2</title>
@section('content')
@guest
<h1>Ti devi autenticare</h1>
@endguest
@auth
@can('isUser2')
<section  style="border-color: var(--dark);background: white;color: var(--white);"> 
    <div class="divSimoAnagrafiche">
    @isset($dati)
	<h2 class="display-6 text-dark" ><p>Queste sono le tue informazioni personali: </p></h2>
    <ul class = "list-group">
        <li class="display-6 text-dark">username Utente:  <strong style="color: darkorange;">{{$dati['username']}}</strong></li>             
        <li class="display-6 text-dark">Nome Utente:  <strong style="color: darkorange;">{{$dati['nome']}}</strong></li>           
        <li class="display-6 text-dark">Cognome Utente:  <strong style="color: darkorange;">{{$dati['cognome']}}</strong></li>             
        <li class="display-6 text-dark">Via di residenza dell'utente:  <strong style="color: darkorange;">{{$dati['via_residenza']}}</strong></li>
        <li class="display-6 text-dark">Numero civico dell'utente:  <strong style="color: darkorange;">{{$dati['numero_civ']}}</strong></li>              
        <li class="display-6 text-dark">Citta' di residenza dell'utente:  <strong style="color: darkorange;">{{$dati['citta']}}</strong></li>                       
    </ul>
    @endisset
</div>
<div class="divSimo">
    <h2 style="color: black; text-align: center; font-size: 1.5em;"><p>Queste sono le operzioni che puoi fare sul tuo profilo: </p></h2>
        <ul class = "list-group">
   <li> <a href="{{route ('modifica2')}}">
    <button class="buttonSimo" type="button" id="bottone1" onmouseover="toggleMenu('bottone1')", onmouseout="toggleMenu2('bottone1')">modifica le tue anagrafiche</button>
    </a></li>
   <li> <a href="{{route ('modificaEmPass2')}}">
    <button class="buttonSimo" type="button" id="bottone2" onmouseover="toggleMenu('bottone2')", onmouseout="toggleMenu2('bottone2')">modifica le tue credenziali</button>
    </a></li>
   <li> <a href="{{route ('get_storico')}}">
    <button class="buttonSimo" type="button" id="bottone3" onmouseover="toggleMenu('bottone3')", onmouseout="toggleMenu2('bottone3')">Consulta storico acquisti</button>
    </a></li>
</ul>
</div>
</section>
@else
<h1>Non autorizzato</h1>
@endcan
@endauth
@endsection
