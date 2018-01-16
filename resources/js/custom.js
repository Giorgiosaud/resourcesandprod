jQuery(document).ready(function($){
    /* Validation Events for changing response CSS classes */
    document.addEventListener( 'wpcf7invalid', function( event ) {
        $('.wpcf7-response-output').addClass('alert alert-danger');
    }, false );
    document.addEventListener( 'wpcf7spam', function( event ) {
        $('.wpcf7-response-output').addClass('alert alert-warning');
    }, false );
    document.addEventListener( 'wpcf7mailfailed', function( event ) {
        $('.wpcf7-response-output').addClass('alert alert-warning');
    }, false );
    document.addEventListener( 'wpcf7mailsent', function( event ) {
        $('.wpcf7-response-output').addClass('alert alert-success');
    }, false );
});
