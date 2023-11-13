@extends('layouts.public')
@section('scripts')
@parent
<script src="{{ asset('js/functionBottone.js') }}" > </script>
@endsection
@section('content')
@auth
@can('isUser4')
<div class="container">
    <a href="{{route('CreateFAQ')}}" style ="text-decoration: none;">
                <button class="buttonSimo2" type="button" id="bottone1" onmouseover="toggleMenu('bottone1')", onmouseout="toggleMenu2('bottone1')">CREA FAQ</button>
                    </a>
    <div class="row align-items-center">
        <div class="col">
        	
        	@isset($FAQList)
        		<ul class ="list-unstyled">
        		@foreach($FAQList as $FAQ)
        				<li>
                            <h4 class="text-left text-dark">{{$FAQ->Domanda}}</h4>
                            <p class="text-left text-dark">{{$FAQ->risposta}}</p>
                            <a href="{{route('eliminaFAQ',[$FAQ->numero])}}" style ="text-decoration: none;">
                <button class="buttonSimo2" style="background-color: red; text-decoration: none" type="button" id = "canc_{{$FAQ->numero}}" onmouseover="toggleMenu('canc_{{$FAQ->numero}}')" onmouseout="toggleMenu2('canc_{{$FAQ->numero}}')">CANCELLA FAQ</button>
                    </a>
                            <a href="{{route('modificaFAQ',[$FAQ->numero])}}" style ="text-decoration: none;">
                <button class="buttonSimo2" type="button" style = "text-decoration: none" id = "butt_{{$FAQ->numero}}" onmouseover="toggleMenu('butt_{{$FAQ->numero}}')" onmouseout="toggleMenu2('butt_{{$FAQ->numero}}')">MODIFICA FAQ</button>
                    </a>
                        </li>
        		@endforeach
        		</ul>
        	@endisset()
        	
        </div>
    </div>
</div>
@endcan
@endauth
@endsection