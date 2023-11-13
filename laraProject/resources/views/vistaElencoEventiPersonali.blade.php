@extends ('layouts.public')

@section('content')
@isset($listPersonalEvents)
    @foreach ($listPersonalEvents as $eventi )
    
<section class="portfolio-block block-intro" style="border-color: var(--dark);background: var(--light);color: var(--white);"> 

    <div>      
       
        <h1 class="display-4 text-dark"><strong>{{$eventi->id_evento}}</strong></h1>
        <h1 class="display-4 text-dark"><strong>{{$eventi->nome_evento}}</strong></h1>
        <h1 class="display-4 text-dark"><strong>{{$eventi->incasso_evento}}</strong></h1>
        
        <form action="{{ route('modificaEvento3') }}"> <input type="submit" class="btn btn-primary" value="Modifica evento" > </form>
        <form action="{{ route('eliminaEvento') }}"> <input type="submit" class = "btn btn-primary" value="Elimina l'evento" > </form>
    
          
    </div>

</section>
@endforeach
@endisset()
@endsection
