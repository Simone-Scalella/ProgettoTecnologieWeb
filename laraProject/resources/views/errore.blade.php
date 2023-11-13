@extends ('layouts.public')
@section('content')
<section  style="border-color: var(--dark);background: var(--light);color: var(--white);"> 
	@isset($messaggio)
	<h2 class="display-6 text-dark" ></p >{{$messaggio}}</p></h2>
	@endisset
</section>
@endsection