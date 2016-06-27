<?php 

class C5AB_facebook_post extends C5_Widget {


	public  $_shortcode_name;
	public  $_shortcode_bool = true;
	public  $_options =array();
	
	
	function __construct() {
		
		$id_base = 'facebook-post-widget';
		$this->_shortcode_name = 'c5ab_facebook_post';
		$name = 'Facebook Embed Post';
		$desc = 'Embed a facebook post.';
		$classes = '';
		
		$this->self_construct($name, $id_base , $desc , $classes);
		
		
	}
	
	
	function shortcode($atts,$content) {
		
		$data = '';
		if(!isset($GLOBALS['c5ab_fb_' .  $atts['id'] ])){
			$GLOBALS['c5ab_fb_' .  $atts['id'] ] = true;
			$data .= '<div id="fb-root"></div>
			<script>(function(d, s, id) {
			  var js, fjs = d.getElementsByTagName(s)[0];
			  if (d.getElementById(id)) return;
			  js = d.createElement(s); js.id = id;
			  js.src = "//connect.facebook.net/en_US/all.js#xfbml=1&appId=' . $atts['id'] . '";
			  fjs.parentNode.insertBefore(js, fjs);
			}(document, \'script\', \'facebook-jssdk\'));</script>';
		}
		$data .= '<div class="fb-post" data-href="'.$atts['url'].'" data-width="' . $atts['width'] . '"></div>';
		
		    return $data;
	}
	
	
	function custom_css() {
		
	}
	
	function options() {
		
		$this->_options =array(
			array(
			    'label' => 'Facebook App ID',
			    'id' => 'id',
			    'type' => 'text',
			    'desc' => 'Facebook App ID.',
			    'std' => ot_get_option('facebook_ID'),
			    'rows' => '',
			    'post_type' => '',
			    'taxonomy' => '',
			    'class' => ''
			),
			array(
			    'label' => 'Post Url',
			    'id' => 'url',
			    'type' => 'text',
			    'desc' => 'Facebook Post Url.',
			    'std' => '',
			    'rows' => '',
			    'post_type' => '',
			    'taxonomy' => '',
			    'class' => ''
			),
			array(
			    'label' => 'Width',
			    'id' => 'width',
			    'type' => 'text',
			    'desc' => 'Post Width, this value in pixels.',
			    'std' => '446',
			    'rows' => '',
			    'post_type' => '',
			    'taxonomy' => '',
			    'class' => ''
			)
		 
		);
	}
	
	function css() {
	}

}


 ?>