$('document').ready( function() {
    $('form.confirm-destroy-js').submit( function() {
        if(! confirm('Sure?')) return false;
    });
});