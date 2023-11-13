@extends('layouts.public')
@section('Title', 'Lista 3')
@section('content')

@guest
<h1>Ti devi autenticare</h1>
@endguest

@auth
@can('isUser4')
@section('scripts')
@parent
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="{{ asset('js/funzioneBottoneDati.js') }}"></script>
<script src="{{ asset('js/functionBottone.js') }}" > </script>
@endsection


 <a href="{{route('CreateUser3')}}">
<button class="buttonSimo2" type="button" id="bottone1"  onmouseover="toggleMenu('bottone1')", onmouseout="toggleMenu2('bottone1')">Crea Utente 3</button>
 </a>
@isset($UserList) 
  </style>     
  <ul class="list-group">
       @foreach($UserList as $User)
    <li class="list-group-item shadow">
        <div class="shadow" style="background: #cccccc;">
            <div class="container">
                <div class="row align-items-center">
                    
                    <div class="col-md-2" style="border-right: 1px solid #000; padding-right: 20px; word-wrap: break-word;">
                        <h3 style="font-size: 1.5em;">{{$User->username}}</h3>
                        <h3 style="font-size: 1.5em;">{{$User->nome_organizzazione}}</h3>
                        
                    </div>

                    <div class="divSimo" style="margin-left: 0em;">
<table>
                    <tr><th>  <a href="{{route('eliminaUser3',[$User->username])}}">
                        <button class="buttonSimo2" type="button" style="width: 200px;" id = "elimina_{{$User->username}}" onmouseover="toggleMenu('elimina_{{$User->username}}')" onmouseout="toggleMenu2('elimina_{{$User->username}}')">ELIMINA</button>
                         </a></th> <th>
                        <a href="{{route('modificaUser3',[$User->username])}}">
                        <button class="buttonSimo2" type="button" style="width: 200px;" id = "modifica_{{$User->username}}" onmouseover="toggleMenu('modifica_{{$User->username}}')" onmouseout="toggleMenu2('modifica_{{$User->username}}')">MODIFICA</button>
                        </a></th>
                          <th>
                         <a href="{{route('modificaPass3',[$User->username])}}">
                        <button class="buttonSimo2" type="button" style="font-size: 1em" id = "pass_{{$User->username}}" onmouseover="toggleMenu('pass_{{$User->username}}')" onmouseout="toggleMenu2('pass_{{$User->username}}')">MODIFICA PASSWORD</button>
                        </a></th>
                        <th>
                        <details class="details">
                            <summary class = 'dettaglio' style="color: blue" id = "{{str_replace(' ', '_', $User->username)}}" >
                              Dettaglio Vendite
                            </summary>
                        </details>
                        </th></tr>
                        </table>
                    </div>
                </div>
                <div class="row align-items-center" id = "dettaglio_{{str_replace(' ', '_', $User->username)}}" style = 'display: none;'>
                    <p hidden id = "state_{{str_replace(' ', '_', $User->username)}}" style = 'display: none;'>hidden</p>
                    <div class="col-md-5">                        
                        <h3>Incasso Organizzatore: {{$User->incasso}}</h3>                       
                    </div>
    
                    <div class="col-md-3"> 
                     <h3>Biglietti venduti: {{$User->biglietti}} </h3>
                    </div>
                </div>
            </div>
        </div>
    </li>
  </ul>
@endforeach
    @include('pagination.paginator', ['paginator' => $UserList])
@endisset() 
@else
<h1>Non sei autorizzato ad accedere a queste informazioni</h1>
@endcan

@endauth
@endsection
