@extends('layouts.public')
@section('title', 'ModificaEvento')
@section('scripts')
@parent
<script src="{{ asset('js/functions.js') }}" ></script>
<script src="{{ asset('js/functionBottone.js') }}" ></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script>
$(function () {
    var actionUrl = "{{ route('modifica.evento3') }}";
    var formId = 'ModificaEvento';
    $(":input").on('blur', function (event) {
        var formElementId = $(this).attr('id');
        doElemValidation(formElementId, actionUrl, formId);
    });
    $("#ModificaEvento").on('submit', function (event) {
        event.preventDefault();
        doFormValidation(actionUrl, formId);
    }); 
});

$(function () {
    $('#sel_reg').on('change',function (event1) {
        if (!$('#sel_reg').val()) { 
            reset();
            return
        }
        $.ajax({
            type: 'GET',
            url: "{{route('ajax.province')}}",
            data: "regione=" + $('#sel_reg').val(),
            dataType: 'json',
            success: function(data){
                    setProvince(data);
                    $('#sel_prov').append('<option></option>');
                }
        });
    });


$('#sel_prov').on('change',function (event) {
        if (!$('#sel_prov').val()) { 
            reset();
        }
        $.ajax({
            type: 'GET',
            url: "{{route('ajax.regione')}}",
            data: "provincia=" + $('#sel_prov').val(),
            dataType: 'json',
            success: function(data){
                setRegione(data);
                $('#sel_reg').append('<option></option>');
            }
        });
    });
});

//reset
function reset(){
    $('#sel_reg').find('option').remove();
    $('#sel_prov').find('option').remove();

    $.ajax({
       type: 'GET',
       url: "{{route('ajax.allprovince')}}",
       data: "",
       dataType: 'json',
       success: function(data){
                   setProvince(data);
                   $('#sel_prov').val('');
               } 
    });
    $.ajax({
       type: 'GET',
       url: "{{route('ajax.allregione')}}",
       data: "",
       dataType: 'json',
       success: function(data){
                   setRegione(data);
                   $('#sel_reg').val('');
               } 
    });
}

function setRegione(data) {
    $('#sel_reg').find('option').remove();
    $.each(data, function (key, val) {
        $('#sel_reg').append('<option>' + val + '</option>');
    });
}


function setProvince(data) {
    $('#sel_prov').find('option').remove();
    $.each(data, function (key, val) {
        $('#sel_prov').append('<option>' + val + '</option>');
    });
};
</script>
@endsection
@section('content')
@guest
<h1>Ti devi autenticare</h1>
@endguest
@auth
@can('isUser3')
<div class="static">
    <h3>Modifica Un Evento</h3>
    
        <div class="centerSimo">
            {{ Form::open(array('route' => 'modifica.evento3','id'=>'ModificaEvento', 'files' => true, 'class' => 'contact-form')) }}
            
            <div  class="inputbox">
                {{ Form::label('nome_evento', 'nome evento', ['class' => 'label-input']) }}
                {{ Form::text('nome_evento', $evento->nome_evento, ['class' => 'input','id' => 'nome_evento','class' => 'form-control']) }}
            </div>

           <div  class="inputbox">
                {{ Form::label('data_evento', 'data evento', ['class' => 'label-input']) }}
                {{ Form::input('dateTime-local','',$evento->data_evento, ['name'=>'data_evento','id' => 'datetime_evento','class' => 'form-control']) }}
            </div>
            
            <div  class="inputbox">
                {{ Form::label('data_sconto', 'data_sconto', ['class' => 'label-input']) }}
                {{ Form::input('dateTime-local','',$evento->data_sconto, ['name'=>'data_sconto','id' => 'datetime_sconto','class' => 'form-control']) }}
            </div>
            
            <div  class="inputbox">
                {{ Form::label('sconto', 'sconto', ['class' => 'label-input']) }}
                {{ Form::text('sconto', $evento->sconto, ['class' => 'input','id' => 'durata','class' => 'form-control']) }}
            </div>
            
            <div  class="inputbox">
                {{ Form::label('durata(in ore)', 'durata(in ore)', ['class' => 'label-input']) }}
                {{ Form::text('durata', $evento->durata, ['class' => 'input','id' => 'durata','class' => 'form-control']) }}
            </div>

            <div  class="inputbox">
                {{ Form::label('image', 'image', ['class' => 'label-input']) }}
                {{ Form::file('image', ['class' => 'input', 'id' => 'image','class' => 'form-control']) }}
            </div>

            <div  class="inputbox">
                {{ Form::label('prezzo_unitario', 'prezzo unitario', ['class' => 'label-input']) }}
                {{ Form::number('prezzo_unitario', $evento->prezzo_unitario, ['min' => '0','class' => 'input','id' => 'prezzo_unitario','step' => '.01','class' => 'form-control'] ) }}
            </div>

            <div  class="inputbox">
                {{ Form::label('numero_biglietti', 'numero biglietti', ['class' => 'label-input']) }}
                {{ Form::number('numero_biglietti',$evento->numero_biglietti, ['min' => $evento->biglietti_venduti,'class' => 'input','id' => 'numero_biglietti','class' => 'form-control']) }}
            </div>

            <div  class="inputbox">
                {{ Form::label('indirizzo_evento', 'indirizzo evento (via e numero civico)', ['class' => 'label-input']) }}
                {{ Form::text('indirizzo_evento', $evento->indirizzo_evento, ['class' => 'input','id' => 'indirizzo_evento','class' => 'form-control']) }}
            </div>

            <div  class="inputbox">
                {{ Form::label('citta', 'citta', ['class' => 'label-input']) }}
                {{ Form::text('citta', $evento->citta, ['class' => 'input','id' => 'citta',]) }}
            </div>

            <div  class="inputbox">
                {{ Form::label('provincia', 'provincia', ['class' => 'label-input']) }}
                {{ Form::select('provincia',$province,$evento->provincia,['class' => 'form-control','id' => 'sel_prov','style' => 'border-radius: 10px; border: 2px solid #000;'])}}
            </div>
            <div  class="inputbox">
                {{ Form::label('regione', 'regione', ['class' => 'label-input']) }}
                {{ Form::select('regione',$regione,$evento->regione,['class' => 'form-control','id' => 'sel_reg','style' => 'border-radius: 10px; border: 2px solid #000;'])}}
            </div>

            <div  class="inputbox">
                {{ Form::label('descrizione', 'descrizione', ['class' => 'label-input']) }}
                {{ Form::text('descrizione', $evento->descrizione, ['class' => 'input','id' => 'descrizione','class' => 'input']) }}
            </div>

            <div  class="inputbox">
                {{ Form::label('indicazioni', 'indicazioni', ['class' => 'label-input']) }}
                {{ Form::text('indicazioni', $evento->indicazioni, ['class' => 'input','id' => 'indicazioni','class' => 'input']) }}
            </div>
            
            <div  class="inputbox">
                {{ Form::label('programma', 'programma', ['class' => 'label-input']) }}
                {{ Form::text('programma', $evento->programma, ['class' => 'input','id' => 'programma','class' => 'input']) }}
            </div>

            <div  class="inputbox">
                {{ Form::hidden('id_evento', $evento->id_evento, array('id' => 'invisible_id')) }}
            </div>

            <div>
                <p></p>
            </div>
            <div class="container-form-btn">                
                {{ Form::submit('Applica Modifica', ['class' => 'buttonSimo','id'=>'bottone1','onmouseover'=>"toggleMenu('bottone1')",'onmouseout'=>"toggleMenu2('bottone1')"]) }}
            </div>
            
            {{ Form::close() }}
        </div>

</div>
@else
<h1>Non autorizzato</h1>
@endcan
@endauth
@endsection