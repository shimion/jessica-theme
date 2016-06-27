<?php
/*
Plugin Name: Awesome Builder Extra
Plugin URI: http://www.code125.com/page-builder/
Description: Extra Widgets for Awesome Builder Plugin.
Version: 1.0
Author: Code125
Author URI: http://themeforest.net/user/Code125
License: GPL3
License URI: http://www.gnu.org/licenses/gpl.html
*/


if(!class_exists('C5BP_EXTRA')){
	class C5BP_EXTRA {
		public function __construct() {

			/* load languages */
			//$this->load_languages();

			/* load Plugin */
			$this->load();
			//add_action( 'plugins_loaded', array( $this, 'load' ), 1 );

		}


		function load() {
			/* setup the constants */
			$this->constants();
			/* hook into WordPress */
			$this->hooks();

			/* include the required admin files */
			$this->admin_includes();

			/* include the required files */
			//$this->includes();


		}


		private function constants() {



			define('C5BP_extra_uri', C5BP_uri . 'widgets/');
			define('C5BP_extra_root',C5BP_root . 'widgets/' );
			/*
			define('C5BP_extra_uri', C5_shortcodes_URL .'/c5-builder/');
			define('C5BP_extra_root', C5_shortcodes_PATH .'/c5-builder/');
			*/
		}

		function add_widgets($widgets){
			/* global include files */
			$files = array(
				'button' => 'C5AB_button',
				'service_column' => 'C5AB_service_column',
				'call_an_action' => 'C5AB_call_an_action',
				'facebook_post' => 'C5AB_facebook_post',
				'facebook_like_box' => 'C5AB_facebook_like_box',
				'google_plus_box' => 'C5AB_google_plus_box',
				'twitter' => 'C5AB_twitter',
				'twitter_slider' => 'C5AB_twitter_slider',
				'tweet' => 'C5AB_tweet',
				'title' => 'C5AB_title',
				'ads' => 'C5AB_ads',
				'social_icons' => 'C5AB_social_icons',
				'flickr' => 'C5AB_flickr',
				'video' => 'C5AB_video',
				'audio' => 'C5AB_audio',
				'tabs' => 'C5AB_tabs',
				'pricing_table' => 'C5AB_pricing_table',
				'toggle' => 'C5AB_toggle',
				'space' => 'C5AB_space',
				'divider' => 'C5AB_divider',
				'percentage' => 'C5AB_center',
				'center' => 'C5AB_percentage',
				'box' => 'C5AB_box',
				'slider' => 'C5AB_slider',
				'image' => 'C5AB_image',
				'team_member' => 'C5AB_team_member',
				'ul' => 'C5AB_ul',
				'icon' => 'C5AB_icon',
				'search' => 'C5AB_search',
				'account' => 'C5AB_account',
				'comments' => 'C5AB_comment',
				'current-widgets' => 'C5AB_current_widgets',
				'social_count' => 'C5AB_social_count',
				'authors_list' => 'C5AB_authors_list',
				'text' => 'C5AB_text',
				'sitemap' => 'C5AB_sitemap',
				'contact_form'  => 'C5AB_contact_form',
				'youtube_box' => 'C5AB_youtube_box',
			);

			/* require the files */
			foreach ( $files as $file => $widget_class ) {
				$skip = false;
				$skip = apply_filters( 'c5ab_widget_skip_'.$file, $skip );

				if ( !$skip  ) {
					// $this->load_file( C5BP_extra_root . "widgets/{$file}.php" );
					$widgets[] = array(
						'path' => C5BP_extra_root .'widgets/'. $file .'.php',
						'class' => $widget_class
					);
				}
			}
			return $widgets;
		}



		private function admin_includes() {

			/* exit early if we're not on an admin page */


			$this->load_file( C5BP_extra_root . 'pre-made/pre-made.php');

			$this->load_file( C5BP_extra_root . 'includes/C5_Widget.php');
			$this->load_file( C5BP_extra_root . 'includes/C5_style.php');
			$this->load_file( C5BP_extra_root . 'includes/C5_icons.php');
			$this->load_file( C5BP_extra_root . 'includes/C5_image.php');
			$this->load_file( C5BP_extra_root . 'includes/C5_skin.php');
			$this->load_file( C5BP_extra_root . 'includes/C5_social.php');
			$this->load_file( C5BP_extra_root . 'includes/twitteroauth.php');
			$this->load_file( C5BP_extra_root . 'includes/ot_radio-text.php');




			$extenral_list = array( );
			$extenral_list = apply_filters('c5ab_external_widgets', $extenral_list);
			foreach ($extenral_list as $widget) {
				$this->load_file($widget['path']);
			}


		}

		private function load_file( $file ){

			include_once( $file );

		}

		function hooks() {
			/* add scripts for metaboxes to post-new.php & post.php */
			add_action( 'admin_print_scripts-post-new.php', array($this, 'load_js'), 11 );
			add_action( 'admin_print_scripts-post.php', array($this, 'load_js'), 11 );

			/* add styles for metaboxes to post-new.php & post.php */
			add_action( 'admin_print_styles-post-new.php', array($this, 'load_css'), 11 );
			add_action( 'admin_print_styles-post.php', array($this, 'load_css'), 11 );
			add_action( 'admin_print_styles-widgets.php', array($this, 'load_css'), 11 );
			add_action( 'admin_enqueue_scripts', array($this, 'load_css'), 11 );




			add_action('wp_enqueue_scripts', array($this, 'load_front_css') );

			add_action('widgets_init' , array($this, 'register_widgets'));

			add_filter('c5ab_external_widgets', array($this, 'add_widgets') );
		}





		function load_front_css() {
			//wp_enqueue_style( 'c5ab-widgets', C5BP_extra_uri . 'less/c5ab-widgets.less');
			wp_enqueue_style( 'c5ab-widgets', C5BP_extra_uri . 'css/c5ab-widgets.css');
			wp_enqueue_style( 'c5ab-font-awesome', C5BP_extra_uri . 'fonts/font-awesome/css/font-awesome.min.css');
			wp_enqueue_style( 'c5ab-flexslider', C5BP_extra_uri . 'css/flexslider.css');
			wp_enqueue_script( 'c5ab-widgets', C5BP_extra_uri . 'js/c5ab-widgets.js', array(), '1.0.0', true );
			wp_localize_script('c5ab-widgets', 'c5_ajax_var', array(
				'url' => admin_url('admin-ajax.php'),
				'nonce' => wp_create_nonce('ajax-nonce')
			));
			wp_enqueue_script('jquery' );
			wp_enqueue_script( 'c5ab-flexslider', C5BP_extra_uri . 'js/jquery.flexslider-min.js', array(), '2.2', true );
			wp_enqueue_script( 'c5ab-magnify', C5BP_extra_uri . 'js/jquery.magnific-popup.min.js', array(), '0.9.9', true );

			wp_enqueue_script('c5ab-jquery-tools', C5BP_extra_uri . 'js/jquery.tools.min.js', array(), '1.0', true);
		}

		function load_css() {
			wp_enqueue_style( 'c5ab-font-awesome', C5BP_extra_uri . 'fonts/font-awesome/css/font-awesome.min.css');
		}

		function load_js() {

		}

		function register_widgets() {

			$extenral_list = array( );
			$extenral_list = apply_filters('c5ab_external_widgets', $extenral_list);
			foreach ($extenral_list as $widget) {
				register_widget( $widget['class'] );
			}
		}
	}
	$c5bp_extra = new C5BP_EXTRA();
}

?>
