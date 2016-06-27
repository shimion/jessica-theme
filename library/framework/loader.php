<?php
/**
 * Code125 framework
 * Version 1.15.12.15
 */
define('C5_FW_ROOT', C5_ROOT . 'library/framework/');
define('C5_FW_URL', C5_URL . 'library/framework/');




$pages = array(
	'C5_SLUG_THEME_OPTIONS' => 'c5-theme-options',
	'C5_SLUG_SUPPORT' => 'c5-support',
	'C5_SLUG_SYSTEM_STATUS' => 'c5-system-status',
	'C5_SLUG_DEMOS_INSTALL' => 'c5-install-demos',
	'C5_SLUG_QUICK_SETUP' => 'c5-install-demos&tab=quicksetup',
	'C5_SLUG_IMPORT_EXPORT' => 'c5-export-settings',
	'C5_SLUG_ABOUT' => 'c5-about',
);
foreach ($pages as $key => $value) {
	define($key , $value );
}

add_filter( 'ot_show_pages', '__return_false' );


add_action( 'admin_enqueue_scripts', 'c5_fw_admin_styling' );
function c5_fw_admin_styling(){
	if (C5_development_mode) {
		wp_enqueue_style( 'c5-admin-css', C5_FW_URL . 'less/admin.less', false, '1.0.0' );
	}else {
		wp_enqueue_style( 'c5-admin-css', C5_FW_URL . 'css/framework-admin.css', false, '1.0.0' );
	}

	wp_enqueue_style( 'c5-admin-font', C5_FW_URL . 'font/code125.css', false, '1.0.0' );
}

function c5_fw_frontend_styling() {
	if (is_admin_bar_showing() ) {
		wp_enqueue_style( 'c5-admin-font', C5_FW_URL . 'font/code125.css', false, '1.0.0' );
	}
}
add_action( 'wp_enqueue_scripts', 'c5_fw_frontend_styling' );
/**
 * Defining Awesome Builder integration parameters.
 */
add_filter( 'c5ab_theme_mode', '__return_true' );
add_filter( 'c5ab_root_path' ,  'c5ab_root_path');
function c5ab_root_path($root) {
	$root = C5_FW_ROOT . 'awesome-builder/';
	return $root;
}
add_filter( 'c5ab_uri_path' ,  'c5ab_uri_path');
function c5ab_uri_path($uri) {
	$uri = C5_FW_URL . 'awesome-builder/';
	return $uri;
}



require_once(C5_FW_ROOT . 'awesome-builder/loader.php' );
require_once(C5_FW_ROOT . 'option-tree/ot-loader.php' );
require_once(C5_FW_ROOT . 'theme-options/class-theme-options.php' );
require_once(C5_FW_ROOT . 'tgm/class-tgm-plugin-activation.php' );
require_once(C5_FW_ROOT . 'tgm/plugins.php' );

$files = array(
	'check',
	'arqam',
	'functions'
);
if (C5_development_mode) {
	$files[] = 	'lessc.inc';
	$files[] = 	'wp-less';
}

foreach ($files as $file ) {
	require_once(C5_FW_ROOT . 'files/'.$file.'.php' );
}

$classes = array(
	'admin-panel',
	'meta-box',
	'archive',
	'fonts',
	'quick-setup',
	'system-status',
	'custom-options',
	'article-options',
	'theme-defaults'
);

foreach ($classes as $file ) {
	require_once(C5_FW_ROOT . 'classes/class-'.$file.'.php' );
}

require_once(C5_FW_ROOT . 'import/loader.php' );
// require_once(C5_FW_ROOT . 'widget-import-export/widget-data.php' );
?>
