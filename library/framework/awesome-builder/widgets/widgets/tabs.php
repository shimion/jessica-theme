<?php

class C5AB_tabs extends C5_Widget {

    public $_shortcode_name;
    public $_shortcode_bool = true;
    public $_options = array();
    public $_child_shortcode_bool = true;
    public $_child_shortcode = 'c5ab_tab';

    function __construct() {

        $id_base = 'tabs-widget';
        $this->_shortcode_name = 'c5ab_tabs';
        $name = 'Tabs';
        $desc = 'Add Tabs box.';
        $classes = '';

        $this->self_construct($name, $id_base, $desc, $classes);
    }

    function child_shortcode($atts, $content) {
        $x = $GLOBALS['c5ab_tabs_count'];
        $GLOBALS['c5ab_tabs'][$x] = array('title' => sprintf($atts['title'], $GLOBALS['c5ab_tabs_count']), 'content' => $content, 'icon' => $atts['icon'], 'post' => $atts['post'], 'content' => $content);

        $GLOBALS['c5ab_tabs_count'] ++;
    }
	function get_content($tab) {
		$content  = '';
		if( $tab['post'] == ''){
			$content = $tab['content'] ;
		}else{
			$type = get_post_type( $tab['post'] );
			$args = array(
				'p'=>$tab['post'],
				'post_type' => $type
			);
			$the_query = new WP_Query( $args );
			if ( $the_query->have_posts() ) {
			    while ( $the_query->have_posts() ) {
					$the_query->the_post();
					$content .= '<h2 class="c5-tabs-subtitle">'.get_the_title().'</h2>';
					$content .= '<div class="c5-entry">'. get_the_content() . '</div>';
				}
			}
			wp_reset_postdata();

		}
		return $content;
	}
    function shortcode($atts, $content) {

        $GLOBALS['c5ab_tabs_count'] = 0;
        unset($GLOBALS['c5ab_tabs']);
        do_shortcode($content);

        $tab_id = $this->get_unique_id();

        $counter = 1;

        $return = '';

        if (isset($GLOBALS['c5ab_tabs']) && is_array($GLOBALS['c5ab_tabs'])) {
            if ($atts['type'] == 'tabs') {


                $tabs = '';
                $panes = '';
                foreach ($GLOBALS['c5ab_tabs'] as $tab) {
                    $class = '';
                    $display = 'style="display:none;"';
                    if ($counter == 1) {
                        $class = "current";
                        $display = 'style="display:block;"';
                        $counter++;
                    }
                    $unique_id = $this->get_unique_id();

                    $tabs .= '<li class="c5ab_tab_handle ' . $class . '" data-id="'.$unique_id.'"><span class="' . $tab['icon'] . '" >' . $tab['title'] . '</span></li>';
                    $panes .= '<div class="custom_tabs_content clearfix pane pane-'.$unique_id.'" '.$display.'>' . $this->get_content($tab) . '</div>';

                }
                $return = '<div class="custom_tabs_wrap_out c5ab_tabs_wrap"><ul class="custom_tabs custom_tabs_' . $tab_id . ' clearfix">' . $tabs . '</ul><div class="custom_tabs_wrap">' . $panes . '</div></div>' . "\n";

            } elseif ($atts['type'] == 'side' || $atts['type'] == 'side-left') {
                $tabs = '';
                $panes = '';
                foreach ($GLOBALS['c5ab_tabs'] as $tab) {
                    if ($tab['icon'] != '' && $tab['icon'] != 'none') {
                        $icon = '<span class="side-menu-icon ' . $tab['icon'] . '"></span>';
                    } else {
                        $icon = '';
                    }

                    $unique_id = $this->get_unique_id();

                    $class = '';
                    $display = 'style="display:none;"';
                    if ($counter == 1) {
                        $class = "current";
                        $display = 'style="display:block;"';
                        $counter++;
                    }
                    $tabs .= '<li class="c5ab_tab_handle ' . $class . '" data-id="'.$unique_id.'">' . $icon . '<span class="tab-caption">' . $tab['title'] . '</span></li>';
                    $panes .= '<div class="pane pane-'.$unique_id.'" '.$display.'>' . $this->get_content($tab) . '</div>';
                }
				if ($atts['type'] == 'side'){
                	$return = '<div class="c5ab_tabs_wrap tabbed_wrapper clearfix"><div class="col-lg-9"><div class="tab-content">' . $panes . '</div></div><div class="col-lg-3"><ul class="nav nav-tabs pos-right">' . $tabs . '</ul></div></div>';
                }else {
                	$return = '<div class="c5ab_tabs_wrap tab-left tabbed_wrapper clearfix"><div class="col-lg-3"><ul class="nav nav-tabs pos-left">' . $tabs . '</ul></div><div class="col-lg-9"><div class="tab-content">' . $panes . '</div></div></div>';
                }

            } elseif ($atts['type'] == 'accordion') {
                $tabs = '';
                foreach ($GLOBALS['c5ab_tabs'] as $tab) {
                    $unique_id = $this->get_unique_id();
                    $class = '';
                    $display = 'style="display:none;"';
                    if ($counter == 1) {
                        $class = "current";
                        $display = 'style="display:block;"';
                        $counter++;
                    }

                    $tabs .= '<h2 class="c5ab_accordion_tab_handle '.$class.'" data-id="'.$unique_id.'"><span class="' . $tab['icon'] . '" data-id="'.$unique_id.'"></span>' . $tab['title'] . '</h2><div class="pane pane-'.$unique_id.'" '.$display.'>' . $this->get_content($tab) . '</div>';
                    $counter++;
                }
                $return = '<div class="accordion c5ab_tabs_wrap accordion_'.$tab_id.'">' . $tabs . '</div>';


            }
        }
        return do_shortcode($return);
    }

    function get_unique_id() {
        $characters = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $randomString = '';
        for ($i = 0; $i < 5; $i++) {
            $randomString .= $characters[rand(0, strlen($characters) - 1)];
        }
        return $randomString;
    }

    function custom_css() {
        $colors = $this->get_main_colors();
        $style_obj = new C5AB_STYLE();
        ?>
        <style>
            .custom_tabs_wrap_out{
                background: <?php echo $colors['light'] ?>;
            }

            ul.custom_tabs li.current span,
            ul.custom_tabs li span:hover{
                background: <?php echo $colors['primary'] ?>;
                color: white;
            }
            ul.custom_tabs li a{
                color: <?php echo $colors['primary'] ?>;
            }

        </style>

        <?php
    }


    function options() {
        $icons = new C5AB_ICONS();
        $icons_array = $icons->get_icons_as_images();


        $tabs = array(
            'tabs',
            'side',
            'side-left',
            'accordion',
        );
        $tabs_array = array();
        foreach ($tabs as $value) {
            $tabs_array[] = array(
                'src' => C5BP_extra_uri . 'image/tabs/' . $value . '.png',
                'label' => '',
                'value' => $value
            );
        }


        $this->_options = array(
            array(
                'label' => 'Tabs type',
                'id' => 'type',
                'type' => 'radio-image',
                'desc' => '',
                'choices' => $tabs_array,
                'std' => 'tabs',
                'rows' => '',
                'post_type' => '',
                'taxonomy' => ''
            ),
            array(
                'label' => 'Add Tab',
                'id' => 'c5ab_tab',
                'type' => 'list-item',
                'desc' => 'Add tab to the tabs box.',
                'settings' => array(
                    array(
                        'label' => 'Icon',
                        'id' => 'icon',
                        'type' => 'radio-text',
                        'desc' => '',
                        'choices' => $icons_array,
                        'std' => 'fa fa-none',
                        'rows' => '',
                        'post_type' => '',
                        'taxonomy' => '',
                        'class' => 'c5ab_icons'
                    ),
                    array(
                        'label' => 'Post ID',
                        'id' => 'post',
                        'type' => 'text',
                        'desc' => 'Get the content from a post, add the post ID here',
                        'std' => '',
                        'rows' => '8',
                        'post_type' => '',
                        'taxonomy' => '',
                        'class' => '',
                    ),
                    array(
                        'label' => 'Content',
                        'id' => 'content',
                        'type' => 'textarea-simple',
                        'desc' => '',
                        'std' => '',
                        'rows' => '8',
                        'post_type' => '',
                        'taxonomy' => '',
                        'class' => '',
                    )
                ),
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
            ul.custom_tabs{margin:0px;padding:0px;width:100%}
            ul.custom_tabs li{overflow:hidden;font-size:13px;font-weight:400;cursor:pointer;display:block;position:relative;float:left;
            -moz-transition:all .2s ease;-o-transition:all .2s ease;-webkit-transition:all .2s ease;-ms-transition:all .2s ease;transition:all .2s ease}
            ul.custom_tabs li span{border-left:none;display:block;line-height:1;text-decoration:none;font-size:14px;padding:14px;-moz-transition:all .2s ease;-o-transition:all .2s ease;-webkit-transition:all .2s ease;-ms-transition:all .2s ease;transition:all .2s ease}
            .custom_tabs_wrap_out p.custom_tab_title{float:left;font-size:22px;margin:0px}
            .widget-blog-wrap .custom_tabs_wrap_out{padding:0px;border:none;background:none}
            .widget-blog-wrap ul.custom_tabs li span{padding:12px;-moz-transition:all .2s ease;-o-transition:all .2s ease;-webkit-transition:all .2s ease;-ms-transition:all .2s ease;transition:all .2s ease}
            .custom_tabs_wrap{clear:both;padding-top:15px}
            .custom_tabs_wrap_out{padding:20px}
            .custom_tabs2_wrap{position:relative;margin-left:250px;z-index:1;margin-bottom:25px}
            ul.custom_tabs2 li.current span,
            ul.custom_tabs2 li.current span:hover{color:#fff}
            .custom_tabs2_content{padding-left:20px}
            ul.custom_tabs2{margin:0!important;z-index:2;position:relative;padding:0px}ul.custom_tabs2 li{display:block;font-weight:normal;margin-bottom:1px;margin-left:0;-moz-transition:all .2s ease;-o-transition:all .2s ease;-webkit-transition:all .2s ease;-ms-transition:all .2s ease;transition:all .2s ease}
            ul.custom_tabs2 li span{display:block;padding:11px 0px;margin-left:0;text-decoration:none;font-weight:normal;font-size:16px;-moz-transition:all .2s ease;-o-transition:all .2s ease;-webkit-transition:all .2s ease;-ms-transition:all .2s ease;transition:all .2s ease}
            ul.custom_tabs2 li .side-menu-icon,ul.custom_tabs2 li .a_text{padding:12px;font-size:14px}
            .custom_tabs2_container{overflow:hidden}
            ul.custom_tabs li span.fa:before{
                margin-right:10px;
            }
            ul.custom_tabs li span.current{
            	color: white;
            }

            .c5ab_tabs_wrap{
            	margin-bottom: 30px;
            }

            .tabbed_wrapper > div{padding:0}
            .tabbed_wrapper .tab-content{
            	border:1px solid #DDDDDD;
            	border-right: 0px;
            	border-bottom: 0px;
				padding:30px;
				border-radius:4px 0 4px 4px;
			}

            ul.nav.nav-tabs.pos-right{display:block;border:none;margin: 0px;}ul.nav.nav-tabs.pos-right li{clear:both;display:block;width:100%}
            ul.nav.nav-tabs.pos-right li.current{box-shadow:none;margin-left:-1px;background:white;border-left:0px;}
            ul.nav.nav-tabs.pos-right li:first-child{border-radius:0px 4px 0px 0px}
            ul.nav.nav-tabs.pos-right li:last-child{border-radius:0px 0px 4px 0px}
            ul.nav.nav-tabs.pos-right li{cursor: pointer;
				border:1px solid #DDDDDD;border-left:1px solid #DDD;box-shadow:inset 0 10px 20px -10px #ddd;border-radius:0px;font-size:14px;font-weight:600;padding:16px;color:#c1c1c1;-moz-transition:all .2s ease;-o-transition:all .2s ease;-webkit-transition:all .2s ease;-ms-transition:all .2s ease;transition:all .2s ease}
            ul.nav.nav-tabs.pos-right li:hover{border-left:0px;border-bottom-color:#ddd;box-shadow:none;background:white}
            ul.nav.nav-tabs.pos-right li span.fa{
                margin-right:10px;
            }


            .tabbed_wrapper.tab-left .tab-content{
            	border:1px solid #DDDDDD;
            	border-left: 0px;
            	border-bottom: 0px;
            	padding:30px;
            	border-radius:0px 4px 4px 4px;
            	font-size:16px;
            	line-height:1.6;
            	color: #444;
            }
            .tabbed_wrapper.tab-left .tab-content p{
            	margin-bottom:30px;
            }

            ul.nav.nav-tabs.pos-left{display:block;border:none;margin: 0px;}
            ul.nav.nav-tabs.pos-left li{clear:both;display:block;width:100%}
            ul.nav.nav-tabs.pos-left li.current{box-shadow:none;margin-right:-1px;background:white;border-right:0px;}
            ul.nav.nav-tabs.pos-left li:first-child{border-radius:4px 0px 0px 0px}
            ul.nav.nav-tabs.pos-left li:last-child{border-radius:0px 0px 0px 4px}
            ul.nav.nav-tabs.pos-left li{
            	cursor: pointer;
            	border:1px solid #DDDDDD;
            	border-right:1px solid #DDD;
            	box-shadow:inset 0 10px 20px -10px #ddd;
            	border-radius:0px;
            	font-size:14px;
            	font-weight:600;
            	padding:16px;
            	color:#444;
            	-moz-transition:all .2s ease;
            	-o-transition:all .2s ease;
            	-webkit-transition:all .2s ease;
            	-ms-transition:all .2s ease;
            	transition:all .2s ease;

            }
            ul.nav.nav-tabs.pos-left li:hover{border-right:0px;border-bottom-color:#ddd;box-shadow:none;background:white}
            ul.nav.nav-tabs.pos-left li span.fa{
                margin-right:10px;
            }


            /*Accordion*/
            .accordion{margin:0 auto 30px;}.accordion h2:hover{background:#f6f6f6}
            .accordion h2.current{cursor:default}
            .accordion .pane{display:none;font-size:13px;padding:10px 30px 10px;background:#f6f6f6;border:1px solid #efefef;border-top:0}.accordion .pane h3{font-weight:normal;margin:0;font-size:16px}
            .accordion h2.first{border-top:1px solid #efefef}
            .accordion h2{margin:0;cursor:pointer;font-size:14px;-moz-transition:all .2s ease;-o-transition:all .2s ease;-webkit-transition:all .2s ease;-ms-transition:all .2s ease;transition:all .2s ease;font-weight:normal;display:block;border:1px solid #efefef;line-height:40px;border-top:0;background:#FDFDFD}.accordion h2 span.fa{-moz-transition:all .2s ease;-o-transition:all .2s ease;-webkit-transition:all .2s ease;-ms-transition:all .2s ease;transition:all .2s ease;font-size:18px;height:40px;width:40px;text-align:center;float:left;display:block;margin-right:10px;background:#f2f2f2; color:#787878; line-height: 40px;}

        </style>
        <?php
    }

}
?>
