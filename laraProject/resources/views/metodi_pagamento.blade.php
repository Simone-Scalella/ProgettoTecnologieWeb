@extends('layouts.public')
@section('content')
    <div class="container">
        <div class="row align-items-center">
            <div class="col">
                <h3 class="text-left text-dark"><strong>Modalità di pagamento</strong><br /></h3>
                <p class="text-left text-dark"><br /><strong>SCEGLI IL TUO METODO DI PAGAMENTO CON BY 4 EVENT.</strong><br /></p>
                <p class="text-left text-dark">By 4 Event ti offre la possibilità di utilizzare la metodologia di pagamento che più si adatti alle tue esigenze, e che possa garantirti il massimo livello di sicurezza dei tuoi dati. Una volta effettuata la prenotazione su By 4 Event, potrai completare il pagamento tramite:<br /><br /></p>
                <p class="text-left text-dark">-  <strong>carte di credito </strong>dei circuiti <strong>VISA</strong>, <strong>VISA ELECTRON</strong>, <strong>MASTERCARD</strong>, <strong>AMERICAN EXPRESS</strong>, <strong>JCB</strong>, <strong>DISCOVER</strong>, <strong>DINERS</strong> e <strong>POSTEPAY</strong>.<br /><img src="{{ asset('images/metodi-pagamento_18072019.jpg') }}" /><br /></p>
                <p class="text-left text-dark">- <strong>PAYPAL </strong>il conto on line che permette di procedere ai pagamenti su internet in maniera comoda e sicura sia tramite carta di credito sia tramite bonifico da un conto corrente tradizionale. Per saperne di più su PayPal consultare il sito ufficiale.<br /></p>
                <div class="row">
                    <div class="col"><img src="{{ asset('images/paypal_1807-2019.jpg') }}" /></div>
                </div>
                <p class="text-left text-dark">- <strong>MasterPass,</strong> la soluzione per lo shopping online offerta da MasterCard in collaborazione con la tua Banca che ti consente di fare acquisti in modo semplice, rapido e sicuro. <br /></p>
                <div class="row">
                    <div class="col"><img src="{{ asset('images/masterpass.jpg') }}" /></div>
                </div>
                <p class="text-left text-dark">- Bonifico Bancario via <strong>SOFORT Banking,</strong> il sistema internazionale di bonifico bancario diretto, semplice e sicuro certificato TÜV.<br /></p>
                <div class="row">
                    <div class="col"><img src="{{ asset('images/sofort.jpg') }}" /></div>
                </div>
                <p class="text-left text-dark">- contattando  il <strong>Call Center.</strong><br /></p>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row"></div>
    </div>
@endsection

