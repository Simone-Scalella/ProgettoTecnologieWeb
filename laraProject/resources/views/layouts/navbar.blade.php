<ul class="navbar navbar-nav ml-auto ">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
    <li class="nav-item"><a class="nav-link active" href="{{ route('home_content') }}" style="color: var(--warning);">Home</a></li>
    <li class="nav-item"><a class="nav-link" href="{{ route('lista_eventi') }}" style="color: var(--warning);">Eventi</a></li>
    @guest
    <li class="nav-item"><a class="nav-link active" href="{{ route('login') }}" style="color: var(--warning);">Accedi</a></li>
    <li class="nav-item"><a class="nav-link active" href="{{ route('register') }}" style="color: var(--warning);">Registrati</a></li>
    @endguest

    @auth        
        <li class="nav-item"><a class="nav-link active" href="" title="Logout" style="color: var(--warning)" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a></li>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            {{ csrf_field() }}
        </form>
    @endauth
    @can('isUser2')
        <li class="nav-item"><a class="nav-link active" href="{{ route('anagrafiche2') }}" style="color: var(--warning);">Area Personale</a></li>
    	<li class="nav-item"><a class="nav-link active" href="" style="color: var(--warning); pointer-events: none;cursor: default;">{{auth()->user()->username}}</a></li>
    @endcan
    @can('isUser3')
        <li class="nav-item"><a class="nav-link active" href="{{ route('anagrafiche3') }}" style="color: var(--warning);">Area Personale</a></li>
    	<li class="nav-item"><a class="nav-link active" href="" style="color: var(--warning); pointer-events: none;cursor: default;">{{auth()->user()->username}}</a></li>
    @endcan
    @can('isUser4')
        <li class="nav-item"><a class="nav-link active" href="{{ route('anagrafiche4') }}" style="color: var(--warning);">Area Personale</a></li>
    	<li class="nav-item"><a class="nav-link active" href="" style="color: var(--warning); pointer-events: none;cursor: default;">{{auth()->user()->username}}</a></li>
    @endcan
</ul>