<?php

define('C5_IMPORT_ROOT', C5_FW_ROOT . 'import/');
define('C5_IMPORT_URL', C5_FW_URL . 'import/');

require_once(C5_IMPORT_ROOT . 'theme-activation.php' );
require_once(C5_IMPORT_ROOT . 'auto-widgets-import.php' );
//require_once(C5_IMPORT_ROOT . 'auto-import.php' );

function c5_one_click_styles() {
	wp_enqueue_script( 'c5-oneclick-import-script', C5_IMPORT_URL. 'import-script.js', array(), '1.0.0', true );
}

add_action( 'admin_enqueue_scripts', 'c5_one_click_styles' );


add_action('admin_init','c5_theme_activation_redirection');

function c5_theme_activation_redirection() {
	global $pagenow;
	 if ( is_admin() && isset( $_GET['activated'] ) && $pagenow == 'themes.php' )
	 {
	      wp_redirect( admin_url( 'admin.php?page='.C5_SLUG_DEMOS_INSTALL.'&activated=true' ) );
	      exit;
	 }
}

 ?>
