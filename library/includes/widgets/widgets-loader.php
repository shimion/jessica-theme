<?php
/**
 * This file will handle the integration of widgets
 */
require_once(C5_skins_ROOT . 'widgets/widgets-loader.php' );

add_filter('c5ab_external_widgets', 'c5_theme_widgets' );
function c5_theme_widgets($widgets)
{
	$files = array(
		'title' => 'C5AB_title',
		'authors_info'=> 'C5AB_authors_info',
		'authors_list' => 'C5AB_authors_list',
		'button' => 'C5AB_button',
		'dribbble' => 'C5AB_dribbble',
		'facebook_like_box' => 'C5AB_facebook_like_box',
		'facebook_post' => 'C5AB_facebook_post',
		'featured_post' => 'C5AB_featured_post',
		'google_plus_box' => 'C5AB_google_plus_box',
		'flickr' => 'C5AB_flickr',
		'icon' => 'C5AB_icon',
		'instagram' => 'C5AB_instagram',
		'menu' => 'C5AB_menu',
		'posts' => 'C5AB_posts',
		'rating' => 'C5AB_review',
		'social_count' => 'C5AB_social_count',
		'social_icons' => 'C5AB_social_icons',
		'twitter_slider' => 'C5AB_twitter_slider',
		'twitter' => 'C5AB_twitter',
		'youtube_box' => 'C5AB_youtube_box',
	);

	/* require the files */
	foreach ( $files as $file => $widget_class ) {
		add_filter('c5ab_widget_skip_'.$file,'__return_true');
		$widgets[] = array(
			'path' => C5_skins_ROOT . 'widgets/widgets/'. $file .'.php',
			'class' => $widget_class
		);
	}
	return $widgets;
}

add_filter('c5ab_hide_settings', '__return_true');

add_filter('c5ab_remove_css_' . 'c5ab_social_icons', '__return_true');
// add_filter('c5ab_remove_css_' . 'c5ab_tabs', '__return_true');


add_filter( 'c5ab_setting_post_types', 'c5ab_setting_post_types' );
function c5ab_setting_post_types($value){
	if (!is_array($value)) {
		$value = array();
	}
	if (!in_array('page' , $value)) {
		$value[] = 'page';
	}
	if (!in_array('footer' , $value)) {
		$value[] = 'footer';
	}
	return $value;
}



?>
