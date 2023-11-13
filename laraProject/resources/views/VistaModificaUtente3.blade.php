@extends('layouts.public')
@section('title', 'Anagrafiche')
@section('scripts')
@parent
<script src="{{ asset('js/functions.js') }}" ></script>
<script src="{{ asset('js/functionBottone.js') }}" ></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script>
$(function () {
    var actionUrl = "{{ route('modify3') }}";
    var formId = 'ModificaUser3';
    $(":input").on('blur', function (event) {
        var formElementId = $(this).attr('id');
        doElemValidation(formElementId, actionUrl, formId);
    });
    $("#ModificaUser3").on('submit', function (event) {
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
    <h3>Modifica l'utente di livello 3</h3>
    

    <div class="centerSimo">
            {{ Form::open(array('route' => 'modify3','id' => 'ModificaUser3', 'class' => 'contact-form')) }}
           
            <div  class="inputbox">
                {{ Form::hidden('username', $user3->username, array('id' => 'invisible_id')) }}
            </div>
            <div  class="inputbox">
                {{ Form::label('citta', 'Citta', ['class' => 'label-input']) }}
                {{ Form::text('citta',  $user3['citta'], ['class' => 'input','id' => 'citta']) }}
            </div>
            
            
            <div  class="inputbox">
                {{ Form::label('tipo_societa', 'Tipo societa', ['class' => 'label-input']) }}
                {{ Form::text('tipo_societa',  $user3['tipo_societa'], ['class' => 'input','id' => 'tipo_societa']) }}
            </div>
            
            <div  class="inputbox">
                {{ Form::label('organizzazione', 'Nome organizzazione', ['class' => 'label-input']) }}
                {{ Form::text('organizzazione', $user3['nome_organizzazione'], ['class' => 'input','id' => 'organizzazione']) }}
            </div>

            <div class="container-form-btn">                
                {{ Form::submit('Modifica', ['class' => 'buttonSimo','id'=>'bottone1','onmouseover'=>"toggleMenu('bottone1')",'onmouseout'=>"toggleMenu2('bottone1')"]) }}
            </div>
            
            {{ Form::close() }}
    </div>

</div>
@else
<h1>Non autorizzato</h1>
@endcan
@endauth
@endsection