@extends ('layouts.public')
@section('Title', 'Home 4')
@section('scripts')
@parent
<script src="{{ asset('js/functionBottone.js') }}" > </script>
@endsection
@section('content')
@guest
<h1>Ti devi autenticare</h1>
@endguest
@auth
@can('isUser4')
<section class="d-block portfolio-block project-no-images">
        <div class="divSimo">
            <div class="col-md-12" style="text-align: center;">
                <a href="{{route('ListUser2')}}">
                    <button class="buttonSimo" type="button" id="bottone1" onmouseover="toggleMenu('bottone1')", onmouseout="toggleMenu2('bottone1')">Lista Utenti 2</button></div>
                </a>
        </div>
    </div>
        <div class="divSimo">
            <div class="col-md-12" style="text-align: center;">
                <a href="{{route('ListUser3')}}">
                <button class="buttonSimo" type="button" id="bottone2" onmouseover="toggleMenu('bottone2')", onmouseout="toggleMenu2('bottone2')">Lista Utenti 3</button>
                </a>
        </div>
    </div>
        <div class="divSimo">
            <div class="col-md-12" style="text-align: center;">
                  <a href="{{route('FAQsito')}}">
                <button class="buttonSimo" type="button" id="bottone3" onmouseover="toggleMenu('bottone3')", onmouseout="toggleMenu2('bottone3')">Aggiorna FAQ</button>
                </a>
            </div>
        </div>
</section>
@else
<h1>Non autorizzato</h1>
@endcan
@endauth
@endsection
