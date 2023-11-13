@extends('layouts.public')

@section('Title', 'Crea FAQ')
@section('scripts')
@parent
<script src="{{ asset('js/functions.js') }}" ></script>
<script src="{{ asset('js/functionBottone.js') }}" ></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script>
$(function () {
    var actionUrl = "{{ route('CreaFAQ') }}";
    var formId = 'CreaFAQ';
    $(":input").on('blur', function (event) {
        var formElementId = $(this).attr('id');
        doElemValidation(formElementId, actionUrl, formId);
    });
    $("#CreaFAQ").on('submit', function (event) {
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
    <h3>Crea una nuova FAQ</h3>
    
        <div class="centerSimo">
            {{ Form::open(array('route' => 'CreaFAQ','id' => 'CreaFAQ','files' => true, 'class' => 'contact-form')) }}
            
            <div  class="inputbox">
                {{ Form::label('Domanda', 'Domanda', ['class' => 'label-input']) }}
                {{ Form::text('Domanda', '', ['class' => 'input','id' => 'Domanda','class' => 'form-control']) }}
            </div>

   

            <div  class="inputbox">
                {{ Form::label('risposta', 'risposta', ['class' => 'label-input']) }}
                {{ Form::text('risposta', '', ['class' => 'input','id' => 'risposta','class' => 'form-control']) }}
            </div>

            
            <div class="container-form-btn">                
                {{ Form::submit('Crea',['class' => 'buttonSimo','id'=>'bottone1','onmouseover'=>"toggleMenu('bottone1')",'onmouseout'=>"toggleMenu2('bottone1')"]) }}
            </div>
            
            {{ Form::close() }}
        </div>

</div>
@else
<h1>Non autorizzato</h1>
@endcan
@endauth
@endsection