@extends ('layouts.public')
@section('Title', 'Miei eventi')
@section('scripts')
@parent
<script src="{{ asset('js/functionBottone.js') }}" > </script>
@endsection
@section('content')
@guest
<h1>Ti devi autenticare</h1>
@endguest
@can('isUser3')
@isset($EventList)
<a href="{{route('CreateEvento')}}">
<button class="buttonSimo2" type="button" id="bottone1" onmouseover="toggleMenu('bottone1')", onmouseout="toggleMenu2('bottone1')">Crea Evento</button>
</a>
  <ul class="list-group">
       @foreach($EventList as $Event)
    <li class="list-group-item shadow">
        <div class="shadow" style="background: #cccccc;">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-md-4">
                        <h3>{{$Event->nome_evento}}</h3>
                        <h4 class="text-black-50">{{$Event->citta}}, {{$Event->data_evento}}</h4>
                        <h4 class="text-center"> {{$Event->prezzo_unitario}} Euro</h4>
                    </div>
                    <div class="col-md-4">
                        <h3 class="text-danger">Biglietti venduti: {{$Event->biglietti_venduti}}/{{$Event->numero_biglietti}} </h3>
                        <h3 class="text-danger">{{$Event->percentuale}}%  </h3>
                        <h3 class="text-danger">{{$Event->incasso_evento}} € </h3>
                    </div>
                    <div class="divSimo">
                        
                        <a style="text-decoration: none;" href="{{ route('modificaEvento3', [$Event->id_evento]) }}">
                        <button class="buttonSimo2" type="button" id = "butt_{{$Event->id_evento}}" onmouseover="toggleMenu('butt_{{$Event->id_evento}}')" onmouseout="toggleMenu2('butt_{{$Event->id_evento}}')">Modifica</button>
                        </a>

                        <a style="text-decoration: none;" href="{{ route('eliminaEvento', [$Event->id_evento]) }}">
                        <button style="background-color: red" class="buttonSimo2" type="button" id = "canc_{{$Event->id_evento}}" onmouseover="toggleMenu('canc_{{$Event->id_evento}}')" onmouseout="toggleMenu2('canc_{{$Event->id_evento}}')">Cancella</button>
                        </a>
                    </div>
                </div>
                
            </div>
        </div>
    </li>
  </ul>
@endforeach
    @include('pagination.paginator', ['paginator' => $EventList])
@endisset()
@else
<h1>Non autorizzato</h1>
@endcan 
@endsection