@extends('layouts.public')
<title>By4Event - FAQ</title>
@section('content')
@can('isUser4')
@include('FAQsitoUser4')
@else
    <div class="container">
        <div class="row align-items-center">
            <div class="col">
            	
            	@isset($FAQList)
            		<ul class ="list-unstyled">
            		@foreach($FAQList as $FAQ)
            				<li>
                                <h4 class="text-left text-dark">{{$FAQ->Domanda}}</h4>
                                <p class="text-left text-dark">{{$FAQ->risposta}}</p>
                            </li>
            		@endforeach
            		</ul>
            	@endisset()
            </div>
        </div>
    </div>
@endcan
@endsection