jQuery(document).ready(function($){
    /* Validation Events for changing response CSS classes */
    document.addEventListener( 'wpcf7invalid', function( event ) {
        $('.wpcf7-response-output').removeClass('wpcf7-mail-sent-ok wpcf7-validation-errors alert-warning alert-danger alert-success').addClass('alert alert-danger');
    }, false );
    document.addEventListener( 'wpcf7spam', function( event ) {
        $('.wpcf7-response-output').removeClass('wpcf7-mail-sent-ok wpcf7-validation-errors alert-warning alert-danger alert-success').addClass('alert alert-warning');
    }, false );
    document.addEventListener( 'wpcf7mailfailed', function( event ) {
        $('.wpcf7-response-output').removeClass('wpcf7-mail-sent-ok wpcf7-validation-errors wpcf7-validation-errors alert-warning alert-danger alert-success').addClass('alert alert-warning');
    }, false );
    document.addEventListener( 'wpcf7mailsent', function( event ) {
        $('.wpcf7-response-output').removeClass('wpcf7-mail-sent-ok wpcf7-validation-errors alert-warning alert-danger alert-success').addClass('alert alert-success');
    }, false );
});
