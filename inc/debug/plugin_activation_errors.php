<?php
/**
 * 		captures plugin activation errors for debugging
 *
 * 		@return void
 */
function orgseries_plugin_activation_errors() {
	if ( WP_DEBUG === TRUE ) {
		$errors = ob_get_contents();
		file_put_contents( SERIES_PATH . 'inc/debug/logs/espresso_plugin_activation_errors.html', $errors );
		update_option( 'orgseries_plugin_activation_errors', $errors );
	}	
}
add_action( 'activated_plugin', 'orgseries_plugin_activation_errors' );



/**
 * 		orgseries_debug loaded
 *
 * 		@return 		void
 */
function orgseries_debug_loaded() {
	if ( $activation_errors = get_option( 'orgseries_plugin_activation_errors', FALSE )) {
		echo '<div class="error"><p>' . $activation_errors . '</p></div>';
		update_option( 'orgseries_plugin_activation_errors', FALSE );
	}
}
add_action( 'admin_notices', 'orgseries_debug_loaded', 5 );