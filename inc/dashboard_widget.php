<?php 
/**
 * Add a widget to the dashboard.
 *
 * This function is hooked into the 'wp_dashboard_setup' action below.
 */

function register_dashboard_widget() {

	return new PLUGINNAME_DASHBOARD_WIDGET();

}

add_action( 'init', 'register_dashboard_widget' );

class PLUGINNAME_DASHBOARD_WIDGET {

	function __construct() {
		add_action( 'wp_dashboard_setup', array( $this, 'pluginname_add_dashboard_widgets') );
	}

	function pluginname_add_dashboard_widgets() {

		wp_add_dashboard_widget(
	                 'example_dashboard_widget',         // Widget slug.
	                 'Example Dashboard Widget',         // Title.
	                 array( $this, 'pluginname_dashboard_widget_function' ) // Display function.
	        );	
	}

	/**
	 * Create the function to output the contents of our Dashboard Widget.
	 */
	function pluginname_dashboard_widget_function() {

		// Display whatever it is you want to show.
		echo "Hello World, I'm a great Dashboard Widget";
	}

}

?>