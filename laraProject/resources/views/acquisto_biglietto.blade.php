@extends ('layouts.public')
@section('Title','Acquisto')
@php
use Carbon\Carbon;
@endphp
@section('scripts')
@parent
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="{{ asset('js/functionBottone.js') }}" ></script>
<script>
$(function () {
    $("#n_biglietti").on('change', function () {
        var biglietti = $('#n_biglietti').val();
        //var biglietti = $(this).val();
        if (biglietti>=0) {
            var prezzo = $('#invisible_costo').val();
            $('#costo_totale').text('costo totale: '+ (biglietti*prezzo).toFixed(2)+ '€');
        }

    }); 
});
</script>
@endsection


@section('content')
@guest
<div>
    <h1 class="display-4 text-dark"><strong>Devi effettuare il login</strong></h1>
</div>
@endguest
@auth
@can('isUser2')
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
                <h3 class="text-dark">Organizzatore: {{$evento->organizzatore}}</h3>
            </div>
            <div class="col-md-4">
                @if((($check=Carbon::now())->between($evento->data_sconto,$evento->data_evento)) && (!is_null($evento->sconto))  &&  (!is_null($evento->data_sconto)))
               <del><h1 class="text-danger">Prezzo:{{$evento->prezzo_unitario}}</h1></del>
                <h1 class="text-success">Prezzo scontato:{{$evento->prezzo_scontato}}</h1>
                @else
                <h1 class="text-success">Prezzo:{{$evento->prezzo_unitario}}</h1>
                @endif
                <h3 class="text-danger">Biglietti rimanenti: {{$evento->bigl_disp}} &#8725; {{$evento->numero_biglietti}} 
                	
            </div>
        </div>
    </div>
</div>

<div class="static">
    
        <div class="centerSimo">
            {{ Form::open(array('route' => 'acquisto.biglietto', 'class' => 'contact-form')) }}
            
             <div  class="inputbox", style="height: 2.5em;">
                {{ Form::label('Numero Biglietti', 'Numero Biglietti', ['class' => 'label-input']) }}
                {{ Form::number('quantita','', ['min' => 1,'max' => "$evento->bigl_disp",'class' => 'input','id' => 'n_biglietti']) }}
                @if ($errors->first('quantita'))
                <ul class="errors" style="margin-right: -28em;">
                    @foreach ($errors->get('quantita') as $message)
                    <li>{!! $message !!}</li>
                    @endforeach
                </ul>
                @endif
            </div>

            <div  class="inputbox">
                {{ Form::label('tipo pagamento', 'tipo pagamento', ['class' => 'label-input']) }}
                {{ Form::select('tipo_pagamento',$tipo_pagamento, ['class' => 'form-control'])}}
                @if ($errors->first('regione'))
                <ul class="errors">
                    @foreach ($errors->get('tipo_pagamento') as $message)
                    <li>{!! $message !!}</li>
                    @endforeach
                </ul>
                @endif
            </div>

            <div  class="wrap-input">
                {{ Form::label('costo totale', 'costo totale: 0 € ', ['id' => 'costo_totale','class' => 'label-input']) }}
                {{ Form::hidden('id_evento', $evento->id_evento, array('id' => 'invisible_id')) }}
                
                
            	@if((($check=Carbon::now())->between($evento->data_sconto,$evento->data_evento)) && (!is_null($evento->sconto))  &&  (!is_null($evento->data_sconto)))
            	{{ Form::hidden('costo', $evento->prezzo_scontato, array('id' => 'invisible_costo')) }}
                @else
                {{ Form::hidden('costo', $evento->prezzo_unitario, array('id' => 'invisible_costo')) }}
                @endif
            </div>
            
            <div class="container-form-btn">                
                {{ Form::submit('Acquista', ['class' => 'buttonSimo2','id'=>'bottone1','onmouseover'=>"toggleMenu('bottone1')",'onmouseout'=>"toggleMenu2('bottone1')"]) }}
            </div>
            
            {{ Form::close() }}
        </div>
   
</div>
@else
<div>
    <h1 class="display-4 text-dark"><strong>Non sei autorizzato</strong></h1>
</div>
@endcan
@endauth
@endsection

