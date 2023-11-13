function getErrorHtml(elemErrors) {//funzione di servizio usata dalle altre due
    if ((typeof (elemErrors) === 'undefined') || (elemErrors.length < 1))//crea i messaggi di errore in HTML
        return;
    var out = '<ul class="errors">';
    for (var i = 0; i < elemErrors.length; i++) {
        out += '<li>' + elemErrors[i] + '</li>';
    }
    out += '</ul>';
    return out;
}

function doElemValidation(id, actionUrl, formId) {

    var formElems;

    function addFormToken() {//estrae il valore del token per la validazione
        var tokenVal = $("#" + formId + " input[name=_token]").val();
        formElems.append('_token', tokenVal);
    }

    function sendAjaxReq() {//invia il contenuto al server per essere validato
        $.ajax({
            type: 'POST',//tipo di verbo da usare
            url: actionUrl,//risorsa da attivare lato server
            data: formElems,//contiene le informazioni da inviare al server
            dataType: "json",//definisco il formato che deve essere restituito
            error: function (data) {//proprietà che definisce la funzione di callback,data è la risposta del server
                if (data.status === 422) {//se la risposta è di errore
                    var errMsgs = JSON.parse(data.responseText);//facciamo il parse del json in oggetto js
                    $("#" + id).parent().find('.errors').html(' ');//cancella i messaggi di errore per quelli validati,cioè per vecchi inserimenti
                    $("#" + id).after(getErrorHtml(errMsgs[id]));//adesso vengono aggiutni i messaggi di errore
                }
            },
            contentType: false,//abbiamo già strutturato il contenuto del risultato della form
            processData: false//non vogliamo formattare in maniera diversa la struttura del risultato
        });
    }

    var elem = $("#" + formId + " :input[name=" + id + "]");//selezionamo l'elemento da validare tramite ID
    if (elem.attr('type') === 'file') {//verifico il valore dell'elemento, se è un file
    // elemento di input type=file valorizzato
        if (elem.val() !== '') {
            //devo creare un oggetto con quel valore
            inputVal = elem.get(0).files[0];
        } else {
            inputVal = new File([""], "");
        }
    } else {
        // elemento di input type != file
        inputVal = elem.val();
    }
    formElems = new FormData();
    formElems.append(id, inputVal);
    addFormToken();
    sendAjaxReq();

}

function doFormValidation(actionUrl, formId) {
//più semplice della precedente perchè prende tutto il contenuto della form
    var form = new FormData(document.getElementById(formId));//nuova struttura per i dati della form,in questo caso lo devo popolare
    $.ajax({
        type: 'POST',
        url: actionUrl,
        data: form,
        dataType: "json",
        error: function (data) {
            if (data.status === 422) {
                var errMsgs = JSON.parse(data.responseText);
                $.each(errMsgs, function (id) {//devo visualizzare tutti i messaggi di errore
                    $("#" + id).parent().find('.errors').html(' ');
                    $("#" + id).after(getErrorHtml(errMsgs[id]));
                });
            }
        },
        success: function (data) {//mi serve una funzione se la form è andata bene e devo andare avanti
            window.location.replace(data.redirect);//ricarica la pagina dopo l'inserimento,quella specificata nel parametro
        },
        contentType: false,
        processData: false
    });
}




