<?php
/*
	Plugin Name: Plugin Boilerplate
	Plugin URI: https://profiles.wordpress.org/jsulz
	Description: A starting point for all my plugins
	Author: Jared Sulzdorf
	Version: 1.0
	Author URI: https://profiles.wordpress.org/jsulz
 */
	
// Peace out if you're trying to access this up front
if( ! defined( 'ABSPATH' ) ) exit;

//If this class don't exist, make it so
if( ! class_exists( 'CLASSNAME' ) ) {

	class CLASSNAME {

		private static $instance;

			//the magic
	        public static function instance() {

	            if( ! self::$instance ) {

	                self::$instance = new CLASSNAME( );
	                self::$instance->plugin_constants( );
	                self::$instance->plugin_requires( );

	            }

	            return self::$instance;

	        }

	    //the constants (folders and such)
		public function plugin_constants() {

			define( 'PLUGIN_FOLDER', plugin_dir_path( __FILE__ ) );
			define( 'PLUGIN_LOCAL_ASSETS', plugin_dir_url( __FILE__ ) );
			define( 'PLUGIN_INC', trailingslashit( PLUGIN_FOLDER . 'inc' ) );
			define( 'PLUGIN_CSS', trailingslashit( PLUGIN_LOCAL_ASSETS . 'css' ) );
			define( 'PLUGIN_JS', trailingslashit( PLUGIN_LOCAL_ASSETS . 'js' ) );
			define( 'PLUGIN_ADMIN', trailingslashit( PLUGIN_FOLDER . 'admin' ) );
			define( 'PLUGIN_SETTINGS_PAGE', PLUGIN_ADMIN . 'settings_page.php' );
			define( 'PLUGIN_POST_META_BOX', PLUGIN_ADMIN . 'post_meta_box.php' );
			define( 'PLUGIN_CUSTOM_FIELDS', PLUGIN_ADMIN . 'custom_fields.php' );
			define( 'PLUGIN_SHORTCODES', PLUGIN_INC . 'shortcodes.php');
			define( 'PLUGIN_WIDGET', PLUGIN_INC . 'widget.php' );
			define( 'PLUGIN_API_CLIENT', PLUGIN_INC . 'client.php' );
			define( 'PLUGIN_SCRIPTS', PLUGIN_INC . 'scripts.php' );

		}

		//the files
		public function plugin_requires() {

			require( PLUGIN_SHORTCODES );
			require( PLUGIN_SCRIPTS ) ;
			require( PLUGIN_WIDGET );
			require( PLUGIN_API_CLIENT );
			require( PLUGIN_SETTINGS_PAGE );
			require( PLUGIN_POST_META_BOX );
			//require( PLUGIN_CUSTOM_FIELDS );

		}
		//in case someone wants to translate stuff 
		//Need to refactor as I might need to load this differently similar to load_all_scripts()
		public function class_name_load_plugin_textdomain() {

	    	load_plugin_textdomain( 'text-domain', FALSE, dirname( plugin_basename( __FILE__ ) ) . '/languages/' );

		}
		
	}

}

//get this show on the road
function class_name_as_function() {

    return CLASSNAME::instance( );
    
}

//Check to see if this can be done differently 
add_action( 'plugins_loaded', 'class_name_as_function' );

?>