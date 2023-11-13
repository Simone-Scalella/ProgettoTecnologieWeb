@extends('layouts.public')
@section('Title', 'FAQ')
@section('scripts')
@parent
<script src="{{ asset('js/functions.js') }}" ></script>
<script src="{{ asset('js/functionBottone.js') }}" ></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script>
$(function () {
    var actionUrl = "{{ route('updateFAQ') }}";
    var formId = 'ModificaFaq';
    $(":input").on('blur', function (event) {
        var formElementId = $(this).attr('id');
        doElemValidation(formElementId, actionUrl, formId);
    });
    $("#ModificaFaq").on('submit', function (event) {
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
    <h3>Modifica la FAQ</h3>
    
        <div class="centerSimo">
            {{ Form::open(array('route' => 'updateFAQ','id' => 'ModificaFaq','files' => true, 'class' => 'contact-form')) }}
            
            <div  class="inputbox">
                {{ Form::label('Domanda', 'Domanda', ['class' => 'label-input']) }}
                {{ Form::text('Domanda', $FAQ->Domanda, ['class' => 'input','id' => 'Domanda','class' => 'form-control']) }}
            </div>

   

            <div  class="inputbox">
                {{ Form::label('risposta', 'Risposta', ['class' => 'label-input']) }}
                {{ Form::text('risposta', $FAQ->risposta, ['class' => 'input','id' => 'risposta','class' => 'form-control']) }}
            </div>
           <div  class="wrap-input">
                {{ Form::hidden('numero', $FAQ->numero, array('id' => 'invisible_id')) }}
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