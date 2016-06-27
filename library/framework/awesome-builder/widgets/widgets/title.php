<?php 

class C5AB_title extends C5_Widget {


	public  $_shortcode_name;
	public  $_shortcode_bool = true;
	public  $_options =array();
	
	
	function __construct() {
		
		$id_base = 'title-widget';
		$this->_shortcode_name = 'c5ab_title';
		$name = 'Title';
		$desc = 'Title for your website.';
		$classes = '';
		
		$this->self_construct($name, $id_base , $desc , $classes);
		
		
	}
	
	
	function shortcode($atts,$content) {
		
		
		    $id = '';
		    if ($atts['id'] != '') {
		        $id = 'id="' . $atts['id'] . '"';
		    } 
		
		
			$class= '';
			if ($atts['class'] != '') {
			    $class =  $atts['class'];
			}
			
			$link= '';
			$tag= 'span';
			if ($atts['link'] != '') {
			    $link = 'href="' . $atts['link'] . '"';
			    $tag= 'a';
			}
			
		    $icon = '';
		    if($atts['icon'] != '' && $atts['icon'] !='fa fa-none' ){
		    	$icon=  '<span class="icon '. $atts['icon'] .'"></span>'  ;
		    }
		    
		    $id = $this->get_unique_id();		    
		    
		    
		    
		
		    $data = '<h2  class="'.$atts['apperance'].' c5ab-title-'.$id.'  '.$class.' '.$atts['transform'].' title  clearfix"><'.$tag.' '.$link.' class="text-wrap">'.$icon.'<span class="text ">' . $atts['title'] . '</span></'.$tag.'></h2>';
		    if($atts['apperance']!='title-style-1'){
		    	$data .='<style>h2.title.c5ab-title-'.$id.'{font-size:'.$atts['font_size'].'px; font-weight:'.$atts['font_weight'].'; margin-bottom:'. $atts['font_size'].'px;}</style>';
		    }
		    return $data;
		
	}
	
	
	function custom_css() {
		
	}
	
	function options() {
		$obj = new C5AB_ICONS();
		$icons = $obj->get_icons_as_images();
		
		$tabs = array(
			'title-style-1',
			'title-style-2'
		);
		$tabs_array = array();
		foreach ($tabs as $value) {
			$tabs_array[] = array(
			    'src' => C5BP_extra_uri.'image/title/'.$value.'.png',
			    'label' => '',
			    'value' => $value,
			    'class' => ''
			);
		}
		
		
		
		$this->_options =array(
			array(
			   'label'       => 'Apperance',
			   'id'          => 'apperance',
			   'type'        => 'radio-image',
			   'desc'        => '',
			   'choices' => $tabs_array,
			   'std'         => 'title-style-2',
			   'rows'        => '',
			   'post_type'   => '',
			   'taxonomy'    => ''
			 ),
			array(
			    'label' => 'Title',
			    'id' => 'title',
			    'type' => 'text',
			    'desc' => 'Title.',
			    'std' => '',
			    'rows' => '',
			    'post_type' => '',
			    'taxonomy' => '',
			    'class' => ''
			),
			array(
			    'label' => 'Font Size',
			    'id' => 'font_size',
			    'type' => 'numeric-slider',
			    'desc' => 'Font Size for the title.',
			    'std' => '20',
			    'min_max_step' => '12,100,1',
			    'rows' => '',
			    'post_type' => '',
			    'taxonomy' => '',
			    'class' => ''
			),
			array(
			    'label' => 'Font Weight',
			    'id' => 'font_weight',
			    'type' => 'numeric-slider',
			    'desc' => 'Font Weight for the title.',
			    'std' => '300',
			    'min_max_step' => '100,900,100',
			    'rows' => '',
			    'post_type' => '',
			    'taxonomy' => '',
			    'class' => ''
			),
			array(
			    'label' => 'Text transform',
			    'id' => 'transform',
			    'type' => 'select',
			    'desc' => 'Text transform.',
			    'choices' => array(
			    	array(
			    		'label' => 'Uppercase',
			    		'value' => 'uppercase'
			    	),
			    	array(
			    		'label' => 'Normal',
			    		'value' => 'normal'
			    	)
			    ),
			    'std' => 'normal',
			    'rows' => '',
			    'post_type' => '',
			    'taxonomy' => '',
			    'class' => '',
			),
			array(
			    'label' => 'Class',
			    'id' => 'class',
			    'type' => 'text',
			    'desc' => 'Class.',
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
			  'choices' => $icons,
			  'std'         => 'fa fa-none',
			  'rows'        => '',
			  'post_type'   => '',
			  'taxonomy'    => '',
			  'class'       => 'c5ab_icons'
			),
			array(
			    'label' => 'Link',
			    'id' => 'link',
			    'type' => 'text',
			    'desc' => 'Add a url if you want to the title to be clickable.',
			    'std' => '',
			    'rows' => '',
			    'post_type' => '',
			    'taxonomy' => '',
			    'class' => ''
			),
			array(
			    'label' => 'ID',
			    'id' => 'id',
			    'type' => 'text',
			    'desc' => 'Add ID to the title.',
			    'std' => '',
			    'rows' => '',
			    'post_type' => '',
			    'taxonomy' => '',
			    'class' => ''
			),
					 
		);
	}
	
	function css() {
		?>
		<style>
		
		
		h2.title {
		  font-size: 16px;
		  font-weight: 600;
		  margin: 0px;
		  line-height: 1.4;
		  margin-bottom:20px;
		  font-family: "Helvetica Neue", Helvetica;
		}
		h2.title .icon{
			margin-right:15px;
		}
		h2.title.uppercase{
			text-transform:uppercase;
		}
		
		
		
		
		</style>
		<?php
	}

}


 ?>