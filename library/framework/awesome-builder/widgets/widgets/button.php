<?php

class C5AB_button extends C5_Widget {


	public  $_shortcode_name;
	public  $_shortcode_bool = true;
	public  $_options =array();


	function __construct() {

		$id_base = 'button-widget';
		$this->_shortcode_name = 'c5ab_button';
		$name = 'Button';
		$desc = 'Add a Button.';
		$classes = '';

		$this->self_construct($name, $id_base , $desc , $classes);


	}


	function shortcode($atts,$content) {

		$id = $this->get_unique_id();
		$style_obj = new C5AB_STYLE();

		$icon = '';
		$has_icon ='';
		if($atts['icon']!='fa fa-none'){
			$icon = '<span class="icon '.$atts['icon'].'"></span>';
			$has_icon ='has_icon';
		}

		$data = '<a href="' . $atts['link'] . '" target="'.$atts['target'].'" class="'.$has_icon.' ' . $atts['button_class'] . ' c5btn c5btn-'.$id.' ' . $atts['float'] . '"><span class="text">' . $atts['text'] .'</span>' . $icon .'</a><div class="clearfix"></div>';

		$data .= '<style>
		.c5btn.c5btn-'.$id.' .text, .c5btn.c5btn-'.$id.' .icon{
			padding: '.round( 0.8*$atts['font_size']).'px '.round( 1.1*$atts['font_size']).'px;
			font-size:'.$atts['font_size'].'px;
			font-weight:'.$atts['font_weight'].';
		}
		.c5btn.c5btn-'.$id.' .text, .c5btn.c5btn-'.$id.':hover .icon{
			background:'. $atts['button_bg_color'] .';
			'. $style_obj->border_darker($atts['button_bg_color']) .'
			color: '. $atts['button_text_color'] .';


		}
		.c5btn.c5btn-'.$id.':hover .text, .c5btn.c5btn-'.$id.' .icon{
			background:'. $atts['button_bg_hover_color'] .';
			'. $style_obj->border_darker($atts['button_bg_hover_color']) .'
			color: '. $atts['button_text_hover_color'] .'
		}
		</style>';

		return $data;
	}


	function custom_css() {

	}

	function options() {
		$colors = $this->get_main_colors();
		$obj = new C5AB_ICONS();
		$icons = $obj->get_icons_as_images();
		$this->_options =array(

			array(
			    'label' => 'Text',
			    'id' => 'text',
			    'type' => 'text',
			    'desc' => 'Button Text.',
			    'std' => '',
			    'rows' => '',
			    'post_type' => '',
			    'taxonomy' => '',
			    'class' => ''
			),
			array(
			    'label' => 'Link',
			    'id' => 'link',
			    'type' => 'text',
			    'desc' => 'Button Link.',
			    'std' => '',
			    'rows' => '',
			    'post_type' => '',
			    'taxonomy' => '',
			    'class' => ''
			),
			array(
			    'label' => 'Link target Attribute',
			    'id' => 'target',
			    'type' => 'select',
			    'desc' => 'Choose Click type for that image.',
			    'std' => '_self',
			    'choices'=>array(
			    	array(
			    		'label'=>'Load in a new window',
			    		'value'=>'_blank'
			    	),
			    	array(
			    		'label'=>'	Load in the same frame as it was clicked',
			    		'value'=>'_self'
			    	)
			    ),
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
			    'label' => 'Font Size',
			    'id' => 'font_size',
			    'type' => 'numeric-slider',
			    'desc' => 'Font Size for the title.',
			    'std' => '12',
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
			    'label' => 'Button Class',
			    'id' => 'button_class',
			    'type' => 'text',
			    'desc' => 'Service Column Button Text.',
			    'std' => '',
			    'rows' => '',
			    'post_type' => '',
			    'taxonomy' => '',
			    'class' => ''
			),
			array(
			    'label' => 'Float',
			    'id' => 'float',
			    'type' => 'select',
			    'desc' => 'Choose button float.',
			    'choices' => array(
			        array(
			            'label' => 'Left',
			            'value' => 'left'
			        ),
			        array(
			            'label' => 'Center',
			            'value' => 'center'
			        ),
			        array(
			            'label' => 'Right',
			            'value' => 'right'
			        )
			    ),
			    'std' => 'center',
			    'rows' => '',
			    'post_type' => '',
			    'taxonomy' => '',
			    'class' => '',
			),
			array(
			    'label' => 'Button Text Color',
			    'id' => 'button_text_color',
			    'type' => 'colorpicker',
			    'desc' => 'Button Text Color.',
			    'std' => $colors['dark'],
			    'rows' => '',
			    'post_type' => '',
			    'taxonomy' => '',
			    'class' => ''
			),
			array(
			    'label' => 'Button Text Hover Color',
			    'id' => 'button_text_hover_color',
			    'type' => 'colorpicker',
			    'desc' => 'Button Text Hover Color.',
			    'std' => $colors['light'],
			    'rows' => '',
			    'post_type' => '',
			    'taxonomy' => '',
			    'class' => ''
			),
			array(
			    'label' => 'Button Background Color',
			    'id' => 'button_bg_color',
			    'type' => 'colorpicker',
			    'desc' => 'Button Background Color.',
			    'std' => $colors['light'],
			    'rows' => '',
			    'post_type' => '',
			    'taxonomy' => '',
			    'class' => ''
			),
			array(
			    'label' => 'Button Background Hover Color',
			    'id' => 'button_bg_hover_color',
			    'type' => 'colorpicker',
			    'desc' => 'Button Background Hover Color.',
			    'std' => $colors['primary'],
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
			a.c5btn.has_icon .text{
				border-radius:2px 0px 0px 2px;
			}
			a.c5btn.has_icon .icon{
				border-radius:0px 2px 2px 0px;
			}
			a.c5btn .text{
				border-radius: 2px;
			}
			a.c5btn .text, a.c5btn .icon{
				display: block;
				float: left;
				-moz-transition: all 0.2s ease;
				-o-transition: all 0.2s ease;
				-webkit-transition: all 0.2s ease;
				-ms-transition: all 0.2s ease;
				transition: all 0.2s ease;
			}
			a.c5btn {
			  border: none;
			  cursor: pointer;
			  display: inline-block;
			  margin: 10px auto 0px;
			  position: relative;
			  border-radius: 2px;
			  text-align: center;
			  font-size: 12px;
			  line-height: 1;
			}
			.c5btn .text, .c5btn .icon{
				display: inline-block;
			}
			a.c5btn:hover {
			  color: white;
			  text-decoration: none;
			}
			a.c5btn.center {
			  display:table;
			}
			a.c5btn.left {
			  float: left;
			  clear:both;
			}

			a.c5btn.right {
			  float: right;
			  clear:both;
			}

		</style>


		<?php
	}

}


 ?>
