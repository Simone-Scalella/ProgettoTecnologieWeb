@extends ('layouts.public')
@section('content')
<section class="portfolio-block block-intro" style="border-color: var(--dark);background: var(--light);color: var(--white);">
        <div>
            <h1 class="display-4 text-dark">Stai per acquistare il seguente biglietto:</h1>
        </div>
        <div>
            <div class="container border rounded-0 border-dark shadow">
                <div class="row align-items-center">
                    <div class="col-md-4"><img src="cola_dimart.jpg" /></div>
                    <div class="col-md-4">
                        <h4 class="text-black-50">Ancona, 01/08/2021</h4>
                        <h3 class="text-dark">Nome organizzatore</h3>
                    </div>
                    <div class="col-md-4">
                        <h1 class="text-success">Prezzo:15</h1>
                    </div>
                </div>
            </div>
        </div>
        <div>
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-md-6">
                        <h3 class="text-dark">Scegli la modalità di pagamento e poi clicca su &#39;ACQUISTA&#39;</h3>
                        <div class="form-check"><input type="checkbox" class="form-check-input" id="formCheck-1" /><label class="form-check-label text-justify" for="formCheck-1" style="color: #070707;">Paypal</label></div>
                        <div class="form-check"><input type="checkbox" class="form-check-input" id="formCheck-3" /><label class="form-check-label" for="formCheck-1" style="color: #070707;">Carta di credito</label></div>
                        <div class="form-check"><input type="checkbox" class="form-check-input" id="formCheck-2" /><label class="form-check-label" for="formCheck-1" style="color: #070707;">Masterpass</label></div>
                        <div class="form-check"><input type="checkbox" class="form-check-input" id="formCheck-1" /><label class="form-check-label" for="formCheck-1" style="color: #070707;">Bonifico</label></div>
                    </div>
                    <div class="col-md-6">
                        <h3 class="text-dark">INFO SULL&#39;EVENTO</h3>
                        <p class="text-dark"><br />A grande richiesta, dopo il sold out in sole 6 ore del concerto al Teatro Antico di Taormina del prossimo 28 agosto, si aggiungono nuove date al tour estivo di Pinco e Pallino.<br /></p>
                    </div>
                </div>
            </div>
        </div>
        <div>
            <div class="container">
                <div class="row justify-content-center align-items-center">
                    <div class="col"><button class="btn btn-primary btn-lg" type="button" style="background: rgb(10,184,17);">ACQUISTA IL BIGLIETTO</button></div>
                </div>
            </div>
        </div>
    </section>
@endsection


    
