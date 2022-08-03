<?php
/**
 * Functions used in avril-pro Hooks admin panel
 *
 */

if ( ! function_exists( 'avril_execute_hooks' ) ) {

	/**
	 * Function to execute actions added for each hook
	 *
	 * @param string $id Hook id.
	 */
	function avril_execute_hooks( $id ) {
		$hooks = get_option( 'avril_hooks' );

		$content = isset( $hooks[ $id ] ) ? $hooks[ $id ] : null;

		if ( ! $content ) {
			return;
		}

		$php = isset( $hooks[ $id . '_php' ] ) ? $hooks[ $id . '_php' ] : null;

		$value = do_shortcode( $content );

		if ( 'true' == $php ) {
			eval( "?>$value<?php " );
		} else {
			echo $value;
		}

	}
}


$hooks = get_option( 'avril_hooks' );
if ( ! empty( $hooks ) ) {
	foreach ( $hooks as $hook => $action ) {

		add_action(
			$hook, function() use ( $hook ) {
				avril_execute_hooks( $hook );
			}
		);

	}
}
