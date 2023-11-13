@extends('layouts.public')
@section('title', 'Anagrafiche')
@section('scripts')
@parent
<script src="{{ asset('js/functions.js') }}" ></script>
<script src="{{ asset('js/functionBottone.js') }}" ></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script>
$(function () {
    var actionUrl = "{{ route('modifyPass') }}";
    var formId = 'ModificaPassUser3';
    $("#ModificaPassUser3").on('submit', function (event) {
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
    
    
        <div class="centerSimo">
            {{ Form::open(array('route' => 'modifyPass','id' => 'ModificaPassUser3', 'class' => 'contact-form')) }}
           
        <div  class="inputbox">
                {{ Form::hidden('username', $dati['username'], array('id' => 'invisible_id')) }}
                <h3>Modifica le  credenziali personali</h3>
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
                {{ Form::submit('Modifica', ['class' => 'buttonSimo','id'=>'bottone1','onmouseover'=>"toggleMenu('bottone1')",'onmouseout'=>"toggleMenu2('bottone1')"]) }}
            </div>
            
            {{ Form::close() }}
        </div>

</div>
@endcan
@endauth
@endsection