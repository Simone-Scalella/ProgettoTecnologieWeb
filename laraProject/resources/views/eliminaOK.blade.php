@extends ('layouts.public')
@section('content')
@guest
<h1>Ti devi autenticare</h1>
@endguest
@auth
@can('isUser3')
<section  style="border-color: var(--dark);background: var(--light);color: var(--white);"> 

	<h2 class="display-6 text-dark" ></p >La cancellazione è stata effettuata con successo</p></h2>
</section>
@endcan
@endauth
@endsection