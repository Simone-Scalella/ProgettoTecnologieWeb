@extends('layouts.public')

@section('title', 'Registrazione')
@section('scripts')
@parent
<script src="{{ asset('js/functions.js') }}" ></script>
<script src="{{ asset('js/functionBottone.js') }}" ></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script>
$(function () {
    var actionUrl = "{{ route('register') }}";
    var formId = 'Registrazione';
    $(":input").on('blur', function (event) {
        var formElementId = $(this).attr('id');
        if(formElementId != 'password')doElemValidation(formElementId, actionUrl, formId);
    });
    $("#Registrazione").on('submit', function (event) {
        event.preventDefault();
        doFormValidation(actionUrl, formId);
    }); 
});
</script>
@endsection
<title>By4Event - Registrazione</title>
@section('content')
<div class="static">
    <h3>Registrazione</h3>
    <p>Utilizza questa form per registrarti al sito</p>

        <div class="centerSimo">
            {{ Form::open(array('route' => 'register','id' => 'Registrazione', 'class' => 'contact-form')) }}
            
             <div  class="inputbox">
                {{ Form::label('username', 'username', ['class' => 'label-input']) }}
                {{ Form::text('username', '', ['class' => 'input','id' => 'username']) }}
            </div>
            
            <div  class="inputbox">
                {{ Form::label('nome', 'nome', ['class' => 'label-input']) }}
                {{ Form::text('nome', '', ['class' => 'input','id' => 'nome']) }}
            </div>

            <div  class="inputbox">
                {{ Form::label('cognome', 'cognome', ['class' => 'label-input']) }}
                {{ Form::text('cognome', '', ['class' => 'input','id' => 'cognome']) }}
            </div>

            <div  class="inputbox">
                {{ Form::label('via_residenza', 'via_residenza', ['class' => 'label-input']) }}
                {{ Form::text('via_residenza', '', ['class' => 'input','id' => 'via_residenza']) }}
            </div>

            <div  class="inputbox">
                {{ Form::label('numero_civ', 'numero_civ', ['class' => 'label-input']) }}
                {{ Form::text('numero_civ', '', ['class' => 'input','id' => 'numero_civ']) }}
            </div>

            <div  class="inputbox">
                {{ Form::label('citta', 'citta', ['class' => 'label-input']) }}
                {{ Form::text('citta', '', ['class' => 'input','id' => 'citta']) }}
            </div>

            <div  class="inputbox">
                {{ Form::label('data_nascita', 'data_nascita', ['class' => 'label-input']) }}
                {{ Form::date('data_nascita', '', array('class' => 'data_data_nascita','id' => 'data_nascita')) }}
            </div>

             <div  class="inputbox">
                {{ Form::label('password', 'Password', ['class' => 'label-input']) }}
                {{ Form::password('password', ['class' => 'input', 'id' => 'password']) }}
            </div>

            <div  class="inputbox">
                {{ Form::label('password-confirm', 'Conferma password', ['class' => 'label-input']) }}
                {{ Form::password('password_confirmation', ['class' => 'input', 'id' => 'password-confirm']) }}
            </div>

            <div class="container-form-btn">                
                {{ Form::submit('Registra', ['class' => 'buttonSimo','id'=>'bottone1','onmouseover'=>"toggleMenu('bottone1')",'onmouseout'=>"toggleMenu2('bottone1')"]) }}
            </div>
            
            {{ Form::close() }}
        </div>

</div>
@endsection
