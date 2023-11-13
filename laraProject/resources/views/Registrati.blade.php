<link rel="stylesheet" href="{{ asset('css/css.css') }}">
<div class="form-container">
    <div class="image-holder"></div>
    <form method="post">
        <h2 class="text-center"><strong>Crea un account</strong></h2>
        <div class="form-group"><input class="form-control" type="username" name="username" placeholder="username" /></div>
        <div class="form-group"><input class="form-control" type="password" name="password" placeholder="Password" /></div>
        <div class="form-group"><input class="form-control" type="password" name="password-repeat" placeholder="Password (repeat)" /></div>
        <div class="form-group">
            <div class="form-check"><label class="form-check-label"><input class="form-check-input" type="checkbox" />I agree to the license terms.</label></div>
        </div>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        <div class="form-group"><button class="btn btn-primary btn-block" type="submit">Registrati</button></div><a class="already" href="{{ route('Accedi') }}">Hai già un account? Effettua il LOGIN qui</a>
    </form>
</div>