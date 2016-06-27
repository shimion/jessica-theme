<?php 

class C5AB_toggle extends C5_Widget {


	public  $_shortcode_name;
	public  $_shortcode_bool = true;
	public  $_options =array();
	
	
	function __construct() {
		
		$id_base = 'toggle-widget';
		$this->_shortcode_name = 'c5ab_toggle';
		$name = 'Toggle';
		$desc = 'Toggle Box.';
		$classes = '';
		
		$this->self_construct($name, $id_base , $desc , $classes);
		
		
	}
	
	
	function shortcode($atts,$content) {
		
		
		$data = '<div class="toggle"><h3 class="clearfix"><span class="'.$atts['icon'].'"></span><a href="#">'.$atts['title'].'</a></h3><div class="content" style="display: none;">'.do_shortcode($content).'</div></div>';
		return $data;
	}
	
	
	function custom_css() {
		
	}
	
	function options() {
		$icons = new C5AB_ICONS();
		$icons_array = $icons->get_icons_as_images();
		$this->_options =array(
			
			array(
			    'label' => 'Title',
			    'id' => 'title',
			    'type' => 'text',
			    'desc' => 'Call an action title.',
			    'std' => '',
			    'rows' => '',
			    'post_type' => '',
			    'taxonomy' => '',
			    'class' => ''
			),
			array(
			   'label'       => 'Icon',
			   'id'          => 'icon',
			   'type'        => 'radio-text',
			   'desc'        => '',
			   'choices' => $icons_array,
			   'std'         => 'fa fa-facebook',
			   'rows'        => '',
			   'post_type'   => '',
			   'taxonomy'    => '',
			   'class'       => 'c5ab_icons'
			 ),
			array(
			    'label' => 'Content',
			    'id' => 'content',
			    'type' => 'textarea-simple',
			    'desc' => 'Tab Content.',
			    'std' => '',
			    'rows' => '',
			    'post_type' => '',
			    'taxonomy' => '',
			    'class' => '',
			)
		 
		);
	}
	
	function css() {
		?>
		<style>
		.toggle{margin:0px 0 20px}.toggle .content{font-size:13px;padding:10px 30px 10px;background:#f6f6f6;border:1px solid #efefef;border-top:0}
		.toggle h3{margin:0;cursor:pointer;font-size:14px;-moz-transition:all .2s ease;-o-transition:all .2s ease;-webkit-transition:all .2s ease;-ms-transition:all .2s ease;transition:all .2s ease;font-weight:normal;display:block;border:1px solid #efefef;line-height:40px;background:#fdfdfd}.toggle h3 span{-moz-transition:all .2s ease;-o-transition:all .2s ease;-webkit-transition:all .2s ease;-ms-transition:all .2s ease;transition:all .2s ease;margin-right:10px;float:left;padding:0px 10px;background:#f2f2f2;color:#787878;line-height: 40px;
		padding: 0px 15px;}
		
		.toggle h3 a{
			text-decoration: none;
			color: inherit;
		}
		.toggle h3 a:hover{
			color: inherit;
		}
		.toggle h3:hover{
			background: #f6f6f6;	
		}
		</style>
		<?php
	}

}


 ?>