@extends('layouts.public')

@section('title', 'Login')
@section('scripts')
@parent
<script src="{{ asset('js/functionBottone.js') }}" ></script>
@endsection
<title>By4Event - Login</title>
@section('content')
    <h1 style="margin-top: -5%;">Login</h1>
     

        <div class="centerSimo">
            {{ Form::open(array('route' => 'login', 'class' => 'contact-form')) }}
            
                 <h1>Utilizza questa form per autenticarti al sito</h1>         
             <div  class="inputbox">
                {{ Form::label('username', 'username', ['class' => 'label-input']) }}
                {{ Form::text('username', '', ['class' => 'input','id' => 'username']) }}
                </div>
                 <div style="list-style-position: inside;">
                @if ($errors->first('username')) 
                <ul class="errorsProva", style="list-style-type: none;">
                    @foreach ($errors->get('username') as $message)
                    <li>{{ $message }}</li>
                    @endforeach
                </ul>
                @endif
                 </div>
           
             
            <div  class="inputbox">
                {{ Form::label('password', 'password', ['class' => 'label-input']) }}
                {{ Form::password('password',['class' => 'input', 'id' => 'password']) }}
                </div>
                <div style="list-style-position:inside; ">
                @if ($errors->first('password'))
                <ul class="errorsProva", style="list-style-type: none;">
                    @foreach ($errors->get('password') as $message)
                    <li>{{ $message }}</li>
                    @endforeach
                </ul>
                @endif
            </div>
            
            <div class="container-form-btn">                
                {{ Form::submit('Login', ['class' => 'buttonSimo','id'=>'bottone1','onmouseover'=>"toggleMenu('bottone1')",'onmouseout'=>"toggleMenu2('bottone1')"]) }}
            </div>
            
            {{ Form::close() }}
    <p style="padding: 1em">Se non hai già un account <a  href="{{ route('register') }}">registrati</a></p>

@endsection
