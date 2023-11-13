<h1> I piu' venduti </h1>
@isset($ListVenduti)
<div class="row articles">
    @foreach($ListVenduti as $Event)
    <div class="col-sm-6 col-md-4 item">
        @if(@isset($Event->immagine))
        <a href="{{ route('get_evento', [$Event->id_evento]) }}"><img class="img-fluid" src={{asset("images/$Event->immagine")}} width="156" height="198"></a>
        @else
        <a href="{{ route('get_evento', [$Event->id_evento]) }}"><img class="img-fluid" src={{asset("images/default.jpg")}} width="156" height="198"></a>
        @endif
        <p> venduti: {{$Event->venduti}} </p>
        <a class="action" href="{{ route('get_evento', [$Event->id_evento]) }}"></a><a class="btn btn-outline-primary btn-sm" role="button" href="{{ route('get_evento', [$Event->id_evento]) }}">SCOPRI DI PIU'</a>
    </div>
    @endforeach
</div>
@endisset
<h1> I piu' partecipati </h1>
@isset($ListPartecipati)
<div class="row articles">
    @foreach($ListPartecipati as $Event)

    <div class="col-sm-6 col-md-4 item">
        @if(@isset($Event->immagine))
        <a href="{{ route('get_evento', [$Event->id_evento]) }}"><img class="img-fluid" src={{asset("images/$Event->immagine")}} width="156" height="198"></a>
        @else
        <a href="{{ route('get_evento', [$Event->id_evento]) }}"><img class="img-fluid" src={{asset("images/default.jpg")}} width="156" height="198"></a>
        @endif
        <p> partecipati: {{$Event->num_partecipanti}} </p>
        <a class="action" href="{{ route('get_evento', [$Event->id_evento]) }}"></a><a class="btn btn-outline-primary btn-sm" role="button" href="{{ route('get_evento', [$Event->id_evento]) }}">SCOPRI DI PIU'</a>
    </div>
    @endforeach
</div>
@endisset