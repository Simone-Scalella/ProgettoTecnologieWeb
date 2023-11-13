@extends ('layouts.public')
@section('Title', 'Storico')
@section('content')

@guest
<h1>Ti devi autenticare</h1>
@endguest

@auth
@can('isUser2')

    @isset($storAq)
    
        @foreach ($storAq as $biglietti )
        <ul>
            <section class="portfolio-block block-intro" style="border-color: var(--light);background: var(--dark);color: var(--white); width: 79em;"> 
            <li>
                <div>      
                 <h1>Informazioni sull'acquisto del <strong style="color: yellow">{{$biglietti->data_acquisto}}</strong></h1>
                 <h1>Il codice dell'evento di cui hai acquistato i biglietti e' <strong style="color: yellow">{{$biglietti->id_evento}}</strong></h1>
                 <h1>I biglietti che hai acquistato sono :</h1>
                     <h2 style="color: yellow;">{{$biglietti->quantita}}</h2>
                 <h1>Questo è il tipo di pagamento che hai scelto:</h1>
                     <h2 style="color: yellow;">{{$biglietti->tipo_pagamento}}</h2>
                <h1>Questo è il costo totale dell'acquisto:</h1>
                     <h2 style="color: yellow;">{{$biglietti->costo}}</h2>
                </div>
            </li>
            </section>
        </ul>
        @endforeach
        @include('pagination.paginator', ['paginator' => $storAq])
    @endisset()
@else
    <h1>Non sei autorizzato ad accedere a queste informazioni</h1>
@endcan
@endauth
@endsection
