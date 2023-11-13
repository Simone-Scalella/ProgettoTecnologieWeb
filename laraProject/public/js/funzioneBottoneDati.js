$(function () {
    $('.dettaglio').on('click', function () {
        var utente3 = $(this).attr('id');
        var state_class = $('#state_' + utente3);
        var state = state_class.text();
        if (state == 'hidden'){           
            state_class.text('show');
        $('#dettaglio_' + utente3).slideDown('slow');
        }
        else{
            state_class.text('hidden');
            $('#dettaglio_' + utente3).slideUp('slow');
        }
    }); 
});