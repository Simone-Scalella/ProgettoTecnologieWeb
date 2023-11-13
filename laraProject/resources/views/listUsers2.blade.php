@extends('layouts.public')
@section('Title', 'Lista 2')
@section('scripts')
@parent
<script src="{{ asset('js/functionBottone.js') }}" > </script>
@endsection
@section('content')

   @isset($UserList)     
  <ul class="list-group">
       @foreach($UserList as $User)
    <li class="list-group-item shadow">
        <div class="shadow" style="background: #cccccc;">
            <div class="container">
                <div class="row align-items-center">
                    
                    <div class="col-md-4" style="border-right: 1px solid #000; padding-right: 20px; word-wrap: break-word;">
                         <h3>{{$User->username}}</h3>
                        <h3>{{$User->nome}}</h3>
                        
                    </div>
                   
              <div class="divSimo" style="margin-top: 10px; margin-left: 5em;">
            <a href="{{route('eliminaUser2',[$User->username])}}">
            <button class="buttonSimo2" style="background-color: red" type="button" id = "butt_{{$User->username}}" onmouseover="toggleMenu('butt_{{$User->username}}')" onmouseout="toggleMenu2('butt_{{$User->username}}')">ELIMINA UTENTE</button>
            </a>
            </div>
              </div>
                
            </div>
        </div>
    </li>
  </ul>
@endforeach
    @include('pagination.paginator', ['paginator' => $UserList])
@endisset() 
@endsection