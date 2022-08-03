/**
 *  Exported avril_filter_hooks
 *
 */

/**
 * Filter hooks
 */
function avril_filter_hooks() {

	var search_val = '';

	if ( typeof jQuery( '#avril_search_hooks' ) !== 'undefined' ) {

		if ( typeof jQuery( '#avril_search_hooks' ).val() !== 'undefined' ) {

			search_val = jQuery( '#avril_search_hooks' ).val().toUpperCase();

			if ( typeof search_val !== 'undefined' ) {

				jQuery( '#avril_hooks_settings th' ).each(
					function () {

						if ( jQuery( this ).text().toUpperCase().indexOf( search_val ) > -1 ) {
							jQuery( this ).parent().removeClass( 'hooks-none' );
						} else {
							jQuery( this ).parent().addClass( 'hooks-none' );
						}
					}
				);

			}

		}

	}
}