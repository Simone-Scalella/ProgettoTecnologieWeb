@extends('layouts.public')
@section('Title', 'Registrazione')
@section('scripts')
@parent
<script src="{{ asset('js/functions.js') }}" ></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="{{ asset('js/functionBottone.js') }}" ></script>
<script>
$(function () {
    var actionUrl = "{{ route('CreaUtente3') }}";
    var formId = 'CreaUser3';
    $(":input").on('blur', function (event) {
        var formElementId = $(this).attr('id');
        if(formElementId != 'password')doElemValidation(formElementId, actionUrl, formId);
    });
    $("#CreaUser3").on('submit', function (event) {
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
@can('isUser4')
<div class="static">
    <h3>Crea l'utente di livello 3</h3>
    

    <div class="centerSimo">
        
            {{ Form::open(array('route' => 'CreaUtente3','id' => 'CreaUser3', 'class' => 'contact-form')) }}
            
             <div  class="inputbox">
                {{ Form::label('username', 'username', ['class' => 'label-input']) }}
                {{ Form::text('username', '', ['class' => 'input','id' => 'username']) }}
            </div>
            
            
            <div  class="inputbox">
                {{ Form::label('citta', 'Citta', ['class' => 'label-input']) }}
                {{ Form::text('citta', '', ['class' => 'input','id' => 'citta']) }}
            </div>
            
            
            <div  class="inputbox">
                {{ Form::label('tipo_societa', 'Tipo societa', ['class' => 'label-input']) }}
                {{ Form::text('tipo_societa', '', ['class' => 'input','id' => 'tipo_societa']) }}
            </div>
            
            <div  class="inputbox">
                {{ Form::label('organizzazione', 'Nome organizzazione', ['class' => 'label-input']) }}
                {{ Form::text('organizzazione', '', ['class' => 'input','id' => 'organizzazione']) }}
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
@else
<h1>Non autorizzato</h1>
@endcan
@endauth
@endsection