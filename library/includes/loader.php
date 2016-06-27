<?php


define('C5_skins_ROOT', C5_ROOT . 'library/includes/');
define('C5_skins_URL', C5_URL . 'library/includes/');


//theme widgets include
require_once(C5_skins_ROOT . 'widgets/widgets-loader.php' );
require_once(C5_skins_ROOT . 'pre-made/pre-made.php' );


$files = array(
	'admin-functions',
	'functions',
	'like',
	'post-formats',
	'ajax'
);


if(class_exists( 'WooCommerce' )){
	$files[] =  'woocommerce';
}
foreach ($files as $file ) {
	require_once(C5_skins_ROOT . 'files/'.$file.'.php' );
}
$classes = array(

	'header',
	'header-css',
	'bread-crumb',
	'theme-options-base',
	'theme-options-elements',
	'advanced-options',
	'theme-functions',
	'quick-setup',
	'post',
	'article',
	'menu',
	'author',
	'category',
	'header',
	'meta-boxes',
	'import',
	'theme-defaults',
	'layout',
	'theme-options',
	'tgm',
);

foreach ($classes as $file ) {
	require_once(C5_skins_ROOT . 'classes/class-'.$file.'.php' );
}


?>
