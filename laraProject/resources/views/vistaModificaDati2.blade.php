@extends('layouts.public')
@section('Title', 'Anagrafiche')
@section('title', 'ModificaCredenziali')
@section('scripts')
@parent
<script src="{{ asset('js/functions.js') }}" ></script>
<script src="{{ asset('js/functionBottone.js') }}" ></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script>
$(function () {
    var actionUrl = "{{ route('modify') }}";
    var formId = 'ModificaUser2';
    $(":input").on('blur', function (event) {
        var formElementId = $(this).attr('id');
        doElemValidation(formElementId, actionUrl, formId);
    });
    $("#ModificaUser2").on('submit', function (event) {
        event.preventDefault();
        doFormValidation(actionUrl, formId);
    }); 
});
</script>
@endsection
@section('content')
@guest
<h1>Ti devi autenticare</h1>
@endguest
@auth
@can('isUser2')
<div class="static">
    <h3>Modifica le tue credenziali</h3>
    
        <div class="centerSimo">
            {{ Form::open(array('route' => 'modify','id'=>'ModificaUser2', 'class' => 'contact-form')) }}
            
            <div  class="inputbox">
                {{ Form::label('nome', 'nome', ['class' => 'label-input']) }}
                {{ Form::text('nome', $dati['nome'], ['class' => 'input','id' => 'nome']) }}
            </div>

           <div  class="inputbox">
                {{ Form::label('cognome', 'cognome', ['class' => 'label-input']) }}
                {{ Form::text('cognome', $dati['cognome'], ['class' => 'input','id' => 'cognome']) }}
            </div>

            <div  class="inputbox">
                {{ Form::label('via_residenza', 'via_residenza', ['class' => 'label-input']) }}
                {{ Form::text('via_residenza', $dati['via_residenza'], ['class' => 'input','id' => 'via_residenza']) }}
            </div>

            <div  class="inputbox">
                {{ Form::label('numero_civ', 'numero_civ', ['class' => 'label-input']) }}
                {{ Form::text('numero_civ', $dati['numero_civ'], ['class' => 'input','id' => 'numero_civ']) }}
            </div>

            <div  class="inputbox">
                {{ Form::label('citta', 'citta', ['class' => 'label-input']) }}
                {{ Form::text('citta', $dati['citta'], ['class' => 'input','id' => 'citta']) }}
            </div>

            <div  class="inputbox">
                {{ Form::label('data_nascita', 'data_nascita', ['class' => 'label-input']) }}
                {{ Form::date('data_nascita', $dati['data_nascita'], ['class' => 'input','id' => 'data_nascita']) }}
            </div>
            
            <div class="container-form-btn">                
                {{ Form::submit('Modifica', ['class' => 'buttonSimo','id'=>'bottone1','onmouseover'=>"toggleMenu('bottone1')",'onmouseout'=>"toggleMenu2('bottone1')"]) }}
            </div>
            
            {{ Form::close() }}
        </div>
    </div>

</div>
@endcan
@endauth
@endsection