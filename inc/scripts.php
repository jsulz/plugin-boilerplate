<?php 

	define( 'MAIN_CSS_VER', '0.1' );
	define( 'MAIN_JS_VER', '0.1' );

	function load_frontend_scripts() {

		wp_enqueue_style( 'main-css', PLUGIN_CSS . 'styles.css', array(), MAIN_CSS_VER, 'all' );
		wp_enqueue_script( 'main-js', PLUGIN_JS . 'main.js', array('jquery', 'wp-color-picker'), MAIN_JS_VER , true );

	}

	add_action( 'wp_enqueue_scripts', 'load_all_scripts' );

	function load_admin_scripts() {

		wp_enqueue_style( 'wp-color-picker' );
    	wp_enqueue_script( 'admin_js', PLUGIN_JS . 'admin.js', array( 'wp-color-picker' ), false, true );

	}

	add_action( 'admin_enqueue_scripts', 'load_admin_scripts' );

?>