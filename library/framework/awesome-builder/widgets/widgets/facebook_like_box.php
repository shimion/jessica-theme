<?php 

class C5AB_facebook_like_box extends C5_Widget {


	public  $_shortcode_name;
	public  $_shortcode_bool = true;
	public  $_options =array();
	
	
	function __construct() {
		
		$id_base = 'facebook-like-box-widget';
		$this->_shortcode_name = 'c5ab_facebook_like_box';
		$name = 'Facebook Like Box';
		$desc = 'Embed facebook Like page.';
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
		$data .= '<div class="fb-like-box" data-href="http://www.facebook.com/'.$atts['username'].'" data-width="' . $atts['width'] . '" data-colorscheme="' . $atts['color'] . '" data-show-faces="true" data-header="false" data-stream="false" data-show-border="true"></div>';
		
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
			    'label' => 'Page Username',
			    'id' => 'username',
			    'type' => 'text',
			    'desc' => 'Facebook Page Username.',
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
			),
			array(
			    'label' =>'Color Mode',
			    'id' => 'color',
			    'type' => 'select',
			    'desc' => 'Choose The color mode for the box.',
			    'choices' => array(
			        array(
			            'label' => 'Light',
			            'value' => 'light'
			        ),
			        array(
			            'label' => 'Dark',
			            'value' => 'dark'
			        )
			    ),
			    'std' => 'light',
			    'rows' => '',
			    'post_type' => '',
			    'taxonomy' => '',
			    'class' => '',
			),
			
			
		 
		);
	}
	
	function css() {
	}

}


 ?>