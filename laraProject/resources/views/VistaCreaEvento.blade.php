@extends('layouts.public')

@section('Title', 'Eventi')
@section('scripts')
@parent
<script src="{{ asset('js/functionBottone.js') }}" ></script>
<script src="{{ asset('js/functions.js') }}" ></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script>
$(function () {
    //Validazione
    var actionUrl = "{{ route('CreaEvento') }}";
    var formId = 'CreaE';
    $(":input").on('blur', function (event) {
        var formElementId = $(this).attr('id');
        doElemValidation(formElementId, actionUrl, formId);
    });
    $("#CreaE").on('submit', function (event) {
        event.preventDefault();
        doFormValidation(actionUrl, formId);
    }); 
});


//aggiorna le province dalle regioni
$(function () {
    $('#regione').on('change',function (event1) {
        //$('body').append('sel reg fired ');
        if (!$('#regione').val()) { //se e' nullo restaura lista di tutte le regioni
            reset();
            return
        }
        $.ajax({
            type: 'GET',
            url: "{{route('ajax.province')}}",
            data: "regione=" + $('#regione').val(),
            dataType: 'json',
            success: function(data){
                    setProvince(data);
                    $('#provincia').append('<option></option>');
                }
        });
    });

//aggiorna la regione dalla provincia
$('#provincia').on('change',function (event) {
        if (!$('#provincia').val()) { //se e' nullo restaura lista di tutte le regioni
            reset();
        }
        $.ajax({
            type: 'GET',
            url: "{{route('ajax.regione')}}",
            data: "provincia=" + $('#provincia').val(),
            dataType: 'json',
            success: function(data){
                setRegione(data);
                $('#regione').append('<option></option>');
            }
        });
    });
});

//reset
function reset(){
    $('#regione').find('option').remove();
    $('#provincia').find('option').remove();

    $.ajax({
       type: 'GET',
       url: "{{route('ajax.allprovince')}}",
       data: "",
       dataType: 'json',
       success: function(data){
                   setProvince(data);
                   $('#provincia').val('');
               } 
    });
    $.ajax({
       type: 'GET',
       url: "{{route('ajax.allregione')}}",
       data: "",
       dataType: 'json',
       success: function(data){
                   setRegione(data);
                   $('#regione').val('');
               } 
    });
}

function setRegione(data) {
    $('#regione').find('option').remove();
    $.each(data, function (key, val) {
        $('#regione').append('<option>' + val + '</option>');
    });
}


function setProvince(data) {
    $('#provincia').find('option').remove();
    $.each(data, function (key, val) {
        $('#provincia').append('<option>' + val + '</option>');
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
    <h3>Crea un nuovo evento</h3>
    
        <div class="centerSimo">
            {{ Form::open(array('route' => 'CreaEvento','id' => 'CreaE', 'files' => true, 'class' => 'contact-form')) }}
            
            <div  class="inputbox">
                {{ Form::label('nome_evento', 'nome evento', ['class' => 'label-input']) }}
                {{ Form::text('nome_evento', '', ['class' => 'input','id' => 'nome_evento','class' => 'form-control']) }}
            </div>

           <div  class="inputbox">
                {{ Form::label('data_evento', 'data evento', ['class' => 'label-input']) }}
                {{ Form::input('dateTime-local','','', ['name'=>'data_evento','id' => 'data_evento', 'class' => 'form-control']) }}
            </div>
            
            <div  class="inputbox">
                {{ Form::label('data_sconto', 'data_sconto', ['class' => 'label-input']) }}
                 {{ Form::input('dateTime-local','','', ['name'=>'data_sconto','id' => 'data_sconto', 'class' => 'form-control']) }}
            </div>
            
            <div  class="inputbox">
                {{ Form::label('sconto', 'sconto(in percentuale)', ['class' => 'label-input']) }}
                {{ Form::text('sconto', '0', ['class' => 'input','id' => 'sconto','class' => 'form-control']) }}
            </div>
            
            <div  class="inputbox">
                {{ Form::label('durata', 'durata(in ore)', ['class' => 'label-input']) }}
                {{ Form::text('durata', '', ['class' => 'input','id' => 'durata','class' => 'form-control']) }}
            </div>

            <div  class="inputbox">
                {{ Form::label('image', 'imaggine evento', ['class' => 'label-input']) }}
                {{ Form::file('image', ['class' => 'input', 'id' => 'image','class' => 'form-control']) }}
            </div>

            <div  class="inputbox">
                {{ Form::label('prezzo_unitario', 'prezzo unitario', ['class' => 'label-input']) }}
                {{ Form::number('prezzo_unitario', '', ['min' => '0','class' => 'input','id' => 'prezzo_unitario','step' => '.01','class' => 'form-control'] ) }}
            </div>

            <div  class="inputbox">
                {{ Form::label('numero_biglietti', 'numero biglietti', ['class' => 'label-input']) }}
                {{ Form::number('numero_biglietti','10', ['min' => '1','class' => 'input','id' => 'numero_biglietti','class' => 'form-control']) }}
            </div>

            <div  class="inputbox">
                {{ Form::label('indirizzo_evento', 'indirizzo evento (via e numero civico)', ['class' => 'label-input']) }}
                {{ Form::text('indirizzo_evento', '', ['class' => 'input','id' => 'indirizzo_evento','class' => 'form-control']) }}
            </div>

            <div  class="inputbox">
                {{ Form::label('citta', 'citta/comune', ['class' => 'label-input']) }}
                {{ Form::text('citta', '', ['class' => 'input','id' => 'citta','class' => 'form-control']) }}
            </div>

            <div  class="inputbox">
                {{ Form::label('provincia', 'provincia', ['class' => 'label-input']) }}
                {{ Form::select('provincia',$province,NULL,['class' => 'form-control','id' => 'provincia', 'style' => 'border-radius: 10px; border: 2px solid #000;'])}}
            </div>

            <div  class="inputbox">
                {{ Form::label('regione', 'regione', ['class' => 'label-input']) }}
                {{ Form::select('regione',$regione,NULL,['class' => 'form-control','id' => 'regione','style' => 'border-radius: 10px; border: 2px solid #000;'])}}
            </div>

            <div  class="inputbox">
                {{ Form::label('descrizione', 'descrizione', ['class' => 'label-input']) }}
                {{ Form::text('descrizione', '', ['class' => 'input','id' => 'descrizione','class' => 'form-control']) }}
            </div>
            
            <div  class="inputbox">
                {{ Form::label('indicazioni', 'indicazioni', ['class' => 'label-input']) }}
                {{ Form::text('indicazioni', '', ['class' => 'input','id' => 'indicazioni','class' => 'form-control']) }}
            </div>

            <div  class="inputbox">
                {{ Form::label('programma', 'programma', ['class' => 'label-input']) }}
                {{ Form::text('programma', '', ['class' => 'input','id' => 'programma','class' => 'form-control']) }}
            </div>
            
            <div class="container-form-btn">                
                {{ Form::submit('Crea', ['class' => 'buttonSimo','id'=>'bottone1','onmouseover'=>"toggleMenu('bottone1')",'onmouseout'=>"toggleMenu2('bottone1')"]) }}
            </div>
            
            {{ Form::close() }}
        </div>
    </div>

</div>
@else
<h1>Non Autorizzato</h1>
@endcan
@endauth
@endsection