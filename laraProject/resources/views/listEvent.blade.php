@extends('layouts.public')
@php
use Carbon\Carbon;
@endphp
@section('scripts')
@parent
<script src="{{ asset('js/functionBottone.js') }}" > </script>
@endsection
@section('content')
<div class="static">
    <div class="container-contact">
        <div class="wrap-contact1">
            {{ Form::open(array('route' => 'filter', 'class' => 'contact-form','method' => 'get')) }}
            
             <div  class="wrap-input">
                {{ Form::label('descrizione', 'descrizione', ['class' => 'label-input']) }}
                @if(@isset($filter['descrizione']))
                    {{ Form::text('descrizione', $filter['descrizione'], ['class' => 'input','id' => 'descrizione','max'=>'100']) }}
                @else
                    {{ Form::text('descrizione', '', ['class' => 'input','id' => 'descrizione','max'=>'100']) }}
                @endif

            </div>
            
             <div  class="wrap-input">
                {{ Form::label('organizzatore', 'organizzatore', ['class' => 'label-input']) }}
                @if(@isset($filter['organizzatore']))
                    {{ Form::select('organizzatore',$nome_organizzatore,$filter['organizzatore'])}}                    
                @else
                    {{ Form::select('organizzatore',$nome_organizzatore)}}
                @endif

            </div>


            <div  class="wrap-input">
                {{ Form::label('regione', 'regione', ['class' => 'label-input']) }}
                
                @if(@isset($filter['regione']))
                    {{ Form::select('regione', $regione,$filter['regione'])}}                    
                @else
                    {{ Form::select('regione',$regione)}}
                @endif


            </div>


            <div  class="wrap-input">
                {{ Form::label('data inizio', 'data inizio:') }}

                @if(@isset($filter['data_inizio']))
                    {{ Form::date('data_inizio', $filter['data_inizio'], array('class' => 'data_inizio','id' => 'datepicker')) }}                   
                @else
                    {{ Form::date('data_inizio', '', array('class' => 'data_inizio','id' => 'datepicker')) }}
                @endif                

                {{ Form::label('data fine', 'data fine:') }}

                @if(@isset($filter['data_fine']))
                    {{ Form::date('data_fine', $filter['data_fine'], array('class' => 'data_fine','id' => 'datepicker')) }}                   
                @else
                    {{ Form::date('data_fine', '', array('class' => 'data_fine','id' => 'datepicker')) }}
                @endif

            </div>
            
            <div class="container-form-btn">                           
                {{ Form::submit('Cerca e filtra', ['class' => 'buttonSimo2','id'=>'bottone1','onmouseover'=>"toggleMenu('bottone1')",'onmouseout'=>"toggleMenu2('bottone1')"]) }}
            </div>

            @if ($errors->first('descrizione'))
                <ul class="errors" style = "margin-right: 1.5em;">
                    @foreach ($errors->get('descrizione') as $message)
                    <li>{!! $message !!}</li>
                    @endforeach
                </ul>
            @endif

            @if ($errors->first('organizzatore'))
                <ul class="errors" style = "margin-right: 1.5em;">
                    @foreach ($errors->get('organizzatore') as $message)
                    <li>{!! $message !!}</li>
                    @endforeach
                </ul>
            @endif
            
            @if ($errors->first('regione'))
                <ul class="errors" style = "margin-right: 1.5em;">
                    @foreach ($errors->get('regione') as $message)
                    <li>{!! $message !!}</li>
                    @endforeach
                </ul>
            @endif

            @if ($errors->first('data_inizio'))
                <ul class="errors" style = "margin-right: 1.5em;">
                    @foreach ($errors->get('data_inizio') as $message)
                    <li>{!! $message !!}</li>
                    @endforeach
                </ul>
            @endif

            @if ($errors->first('data_fine'))
                <ul class="errors" style = "margin-right: 1.5em;">
                    @foreach ($errors->get('data_fine') as $message)
                    <li>{!! $message !!}</li>
                    @endforeach
                </ul>
            @endif
            {{ Form::close() }}
        </div>
    </div>
</div>

   @isset($EventList)     
  <ul class="list-group">
       @foreach($EventList as $Event)
    <li class="list-group-item shadow">
        <div class="shadow" style="background: #cccccc;">
            <div class="container">
                <div class="row align-items-center">
                    @if(@isset($Event->immagine))
                        <div class="col-md-2"><img src={{asset("images/$Event->immagine")}} width="96" height="120"/></div>
                    @else
                        <div class="col-md-2"><img src={{asset("images/default.jpg")}} width="96"  height="120"/></div>
                    @endif

                    <div class="col-md-4">
                        <h3>{{$Event->nome_evento}}</h3>
                        <h4 class="text-black-50">{{$Event->citta}}, {{$Event->data_evento}}</h4>
                        <h4 class="text-center"> Organizzatore: {{$Event->nome_organizzazione}}</h6>
                    </div>
                    
                    <div class="col-md-4">
                        @if(($check=Carbon::now())->between($Event->data_sconto,$Event->data_evento) && ($Event->sconto != 0))
                              <del style="text-decoration-color: darkred;" ><h1> {{$Event->prezzo_unitario}} Euro</h1></del>                        
                        @else
                              <h1> {{$Event->prezzo_unitario}} Euro</h1>                   
                        @endif
                        <h3 class="text-danger"> {{$Event->bigl_disp}} biglietti </h3>
                        <h3 class="text-danger"> {{$Event->segui}} partecipanti </h3>
                        <a href="{{ route('get_evento', [$Event->id_evento]) }}">
                        <button class="btn btn-primary" type="button">Clicca qui per avere più informazioni</button>
                        </a>
                    </div>
                    @if(($check=Carbon::now())->between($Event->data_sconto,$Event->data_evento) &&($Event->sconto != 0))                       
                    <div class="col-md-2">
                            <h3 class= "text-danger"><b>-{{number_format($Event->sconto,2)}} %</b></h3>
                            <h3> adesso a soli </h3>
                            <h1> {{$Event->prezzo_scontato}}Euro!</h1>
                    </div>
                     @endif
                </div>
                
            </div>
        </div>
    </li>
  </ul>
@endforeach
    @include('pagination.paginator', ['paginator' => $EventList])
@endisset() 
@endsection