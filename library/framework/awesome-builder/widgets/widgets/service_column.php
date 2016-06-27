<?php 

class C5AB_service_column extends C5_Widget {


	public  $_shortcode_name;
	public  $_shortcode_bool = true;
	public  $_options =array();
	
	
	function __construct() {
		
		$id_base = 'service-column-widget';
		$this->_shortcode_name = 'c5ab_service_column';
		$name = 'Service Column';
		$desc = 'Show your services in a decent way.';
		$classes = '';
		
		$this->self_construct($name, $id_base , $desc , $classes);
		
		
	}
	
	
	function shortcode($atts,$content) {
		
		$id = $this->get_unique_id();
		
		$data = '<div class="services_wrapper c5ab-service-column-'.$id.'" >
						<div class="service-item"> 
							<div class="upper_half">
								<div class="round-green">';
								
		if($atts['image']==''){						
			$data .= '<span class="'.$atts['icon'].'"></span>';
		}else {
			$data .= '<img src="'.$atts['image'].'" alt="" />';
		}
		
		
		$data .= '</div><div class="service-cta">';
		if($atts['button_text']!=''){						
			$data .= '[c5ab_button link="'.$atts['link'].'" text="'. $atts['button_text'] .'" ]';
		}						
		$data .= '</div>
							</div>
							
							<div class="lower_half">
								<h5>'.$atts['title'].'</h5>
								<p>'.$content.'</p>
							</div> 
						</div> 
					</div>';
					
					
		$style_obj = new C5AB_STYLE();			
		$start = 'box-shadow:0px 0px 0px 0px '. $atts['color'] . ';';
		$color_rgb = $style_obj->hex2rgb($atts['color']);
		$end = 'box-shadow:0px 0px 0px 20px  rgba('. $color_rgb[0].' , '. $color_rgb[1] .' , '. $color_rgb[2].' , 0);';
		$css_keyframe =  $style_obj->generate_css_keyframe('c5_waves_animation_'. $id , $start , $end);
					
		$data .= '<style>
			.c5ab-service-column-'.$id.' .round-green{
				background: '. $atts['color'] .';
				width:'.$atts['width'].'px;
				height:'.$atts['width'].'px;
				line-height:'.$atts['width'].'px;
				border-radius:'.$atts['border_radius'].'px;
			}
			.c5ab-service-column-'.$id.'  img{
				margin:auto;
				width:'.$atts['width'].'px;
				font-size: '.round( $atts['width']*0.3125 ).'px;
				display:block;
			}
			'.$css_keyframe.'
			.services_wrapper.c5ab-service-column-'.$id.' .service-item:hover .round-green {
			  -webkit-animation: c5_waves_animation_'.$id.' 1s infinite;
			  /* Safari 4+ */
			  -moz-animation: c5_waves_animation_'.$id.' 1s infinite;
			  /* Fx 5+ */
			  -o-animation: c5_waves_animation_'.$id.' 1s infinite;
			  /* Opera 12+ */
			  -ms-animation: c5_waves_animation_'.$id.' 1s infinite;
			  /* Opera 12+ */
			  animation: c5_waves_animation_'.$id.' 1s infinite;
			}
		
		</style>';
		
		return $data;
	}
	
	
	function custom_css() {
		$colors = $this->get_main_colors();
		$style_obj = new C5AB_STYLE();
		?>
		<style>
			.round-green{
				background: <?php echo $colors['primary']; ?>;
			}
			.services_wrapper {
			  color: <?php echo $colors['text']; ?> !important;
			}
			.services_wrapper .service-item .upper_half,
			.services_wrapper .service-item .lower_half,
			.services_wrapper .service-item .service-item-wrap {
			  border: 1px solid <?php echo $colors['grey']; ?>;
			}
			.services_wrapper .service-item .upper_half {
				background: <?php echo $colors['light']; ?>;
			}
				
			<?php 
			// c5_waves_animation keyframe
			$start = 'box-shadow:0px 0px 0px 0px '. $colors['primary'] . ';';
			$color_rgb = $style_obj->hex2rgb($colors['primary']);
			$end = 'box-shadow:0px 0px 0px 20px  rgba('. $color_rgb[0].' , '. $color_rgb[1] .' , '. $color_rgb[2].' , 0);';
			echo $style_obj->generate_css_keyframe('c5_waves_animation' , $start , $end);
			 ?>
		
		</style>
		<?php
	}
	
	function options() {
		$colors = $this->get_main_colors();
		
		$icons = new C5AB_ICONS();
		$icons_array = $icons->get_icons_as_images(); 
		
		$this->_options =array(
			
			array(
			    'label' => 'Title',
			    'id' => 'title',
			    'type' => 'text',
			    'desc' => 'Service Column title.',
			    'std' => 'Service Column',
			    'rows' => '',
			    'post_type' => '',
			    'taxonomy' => '',
			    'class' => ''
			),
			array(
			    'label' => 'Image',
			    'id' => 'image',
			    'type' => 'upload',
			    'desc' => 'upload image instead of icons.',
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
			  'std'         => 'fa fa-cloud',
			  'rows'        => '',
			  'post_type'   => '',
			  'taxonomy'    => '',
			  'class'       => 'c5ab_icons'
			),
			array(
			    'label' => 'Bacground Color',
			    'id' => 'color',
			    'type' => 'colorpicker',
			    'desc' => 'Color of this service column.',
			    'std' => $colors['primary'],
			    'rows' => '',
			    'post_type' => '',
			    'taxonomy' => '',
			    'class' => ''
			),
			array(
			    'label' => 'Circle Width',
			    'id' => 'width',
			    'type' => 'numeric-slider',
			    'desc' => 'Font Weight for the title.',
			    'std' => '80',
			    'min_max_step' => '50,200,10',
			    'rows' => '',
			    'post_type' => '',
			    'taxonomy' => '',
			    'class' => ''
			),
			array(
			    'label' => 'Border Radius',
			    'id' => 'border_radius',
			    'type' => 'numeric-slider',
			    'desc' => 'Border Radius for the image.',
			    'std' => '80',
			    'min_max_step' => '0,200,1',
			    'rows' => '',
			    'post_type' => '',
			    'taxonomy' => '',
			    'class' => ''
			),
			array(
			    'label' => 'Content',
			    'id' => 'content',
			    'type' => 'textarea-simple',
			    'desc' => 'Service Column Content.',
			    'std' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. ',
			    'rows' => '',
			    'post_type' => '',
			    'taxonomy' => '',
			    'class' => ''
			),
			array(
			    'label' => 'Button Link',
			    'id' => 'link',
			    'type' => 'text',
			    'desc' => 'Service Column Button Link.',
			    'std' => '',
			    'rows' => '',
			    'post_type' => '',
			    'taxonomy' => '',
			    'class' => ''
			),
			array(
			    'label' => 'Button Text',
			    'id' => 'button_text',
			    'type' => 'text',
			    'desc' => 'Service Column Button Text.',
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
			
			.services_wrapper .round-green {
			  border-radius: 100%;
			  display: inline-block;
			  font-size: 25px;
			  width: 80px;
			  height: 80px;
			  line-height: 80px;
			  color: white;
			  -moz-transition: all 0.2s ease;
			  -o-transition: all 0.2s ease;
			  -webkit-transition: all 0.2s ease;
			  -ms-transition: all 0.2s ease;
			  transition: all 0.2s ease;
			}
			.services_wrapper .service-item {
			  margin-bottom: 30px;
			}
			.services_wrapper .service-item:hover .round-green {
			  -webkit-animation: c5_waves_animation 1s infinite;
			  /* Safari 4+ */
			  -moz-animation: c5_waves_animation 1s infinite;
			  /* Fx 5+ */
			  -o-animation: c5_waves_animation 1s infinite;
			  /* Opera 12+ */
			  -ms-animation: c5_waves_animation 1s infinite;
			  /* Opera 12+ */
			  animation: c5_waves_animation 1s infinite;
			}
			
			.services_wrapper .service-item .upper_half {
			  padding: 40px 40px 65px;
			  text-align: center;
			  border-radius: 2px;
			  position: relative;
			  border-bottom: none;
			}
			.services_wrapper .service-item .upper_half .service-cta {
			  left: 0px;
			  bottom: -22px;
			  text-align: Center;
			  position: absolute;
			  width: 100%;
			}
			.services_wrapper .service-item .lower_half {
			  padding: 30px;
			  background: white;
			}
			.services_wrapper .service-item .lower_half h5 {
			  text-align: center;
			  font-weight: 600;
			  font-size: 26px;
			  margin: 0px;
			  font-family: "Helvetica Neue", Helvetica;
			}
			.services_wrapper .service-item .lower_half p {
			  text-align: center;
			  margin-top: 15px;
			  font-size: 14px;
			}
			.services_wrapper .service-item .service-item-wrap{
				padding:30px;
				text-align: center;
				border-radius:2px;
				position:relative;
			}
		
		</style>
		<?php
	}

}


 ?>