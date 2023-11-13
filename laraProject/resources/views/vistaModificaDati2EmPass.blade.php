@extends('layouts.public')

@section('title', 'Modifica Password')
@section('scripts')
@parent
<script src="{{ asset('js/functions.js') }}" ></script>
<script src="{{ asset('js/functionBottone.js') }}" ></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script>
$(function () {
    var actionUrl = "{{ route('modifyPassEm') }}";
    var formId = 'modificaPass';
    $("#modificaPass").on('submit', function (event) {
        event.preventDefault();
        doFormValidation(actionUrl, formId);
    }); 
});
</script>
@endsection
<title>By4Event - Anagrafiche</title>
@section('content')
@guest
<h1>Ti devi autenticare</h1>
@endguest
@auth
@can('isUser2')
<div class="static">
   <h2 style="color: red;"> Modifica le tue credenziali personali</h2>
    <h3>Ti ricordiamo che al termine dell'operazione dovrai ripetere l'operazione di Login</h3>
    
        <div class="centerSimo">
            {{ Form::open(array('route' => 'modifyPassEm','id'=>'modificaPass', 'class' => 'contact-form')) }}

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