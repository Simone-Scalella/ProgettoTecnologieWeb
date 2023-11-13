@extends('layouts.public')
@section('content')
<section class="portfolio-block block-intro" style="border-color: var(--dark);background: var(--light);color: var(--white);">
    <div class="container">
                
        <h1 class="text-dark" style="background: url(&quot;images/foto_navbar.jpg&quot;), var(--white);color: var(--yellow);"><br><br><br></h1>
        <a href="link/to/your/download/file" download="Documentazione_grp_08">
            <button class="btn btn-primary" type="button" style="background: var(--yellow);border-color: var(--yellow);color: var(--gray);">DOWNLOAD DOCUMENTAZIONE</button>
        </a>
        </div>
    
        @include('desc_home')
</section>
<section class="portfolio-block block-intro">
    <div class="container">
        @include('trending')
    </div>
</section>
       

