@extends('layouts.public')
@section('content')
<link rel="stylesheet" href="{{ asset('css/css') }}">
<div class="image-holder"><img src=" public/images/User.png) "></div>
<form method="post">
    <h4 class="text-center"><strong>Effettua il login</strong></h4>
    <div class="form-group"><input class="form-control" type="username" name="username" placeholder="username" /></div>
    <div class="form-group"><input class="form-control" type="password" name="password" placeholder="Password" /></div>
    <div class="form-group"><button class="btn btn-primary btn-block" type="submit">Accedi</button>
    </div>
    <a class="already" href="login.html">Se hai dimenticato la password sei fregato !!!</a>
</form>
@endsection()