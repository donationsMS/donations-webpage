/**
 * CityLogic Theme Custom Admin Functionality
 *
 */
( function( $ ) {
	
	$(window).load(function() {
    });
	
    $( document ).ready( function() {
		// Open the RSS dashboard widget links in a new tab
		$( '#otb-dashboard-news a.rsswidget' ).click(function() {
			$(this).attr( 'target', '_blank' );
		});
    });

} )( jQuery );
