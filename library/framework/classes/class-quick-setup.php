<?php

class C5_quick_setup extends C5_archive_settings {

	public $_sections =array();
	public $_options =array();

	function __construct() {

	}

	function hook() {

		add_action('admin_menu', array($this, 'hook_page'));
		add_action( 'admin_enqueue_scripts', array( $this , 'admin_enqueue_scripts') );
	}

	function hook_page() {

		add_submenu_page('c5_theme_welcome','Quick Setup', 'Quick Setup', 'manage_options', 'c5-quick-setup', array($this, 'quick_setup_page'));
	}
	function admin_enqueue_scripts($hook) {
	    if( 'index.php' != $hook )
	        return;
		wp_enqueue_style( 'c5ab-flexslider', C5BP_extra_uri . 'css/flexslider.css');
		wp_enqueue_script( 'c5ab-flexslider', C5BP_extra_uri . 'js/jquery.flexslider-min.js', array(), '2.2', true );
	}

	function done_page() {
		$all_options = get_option( 'option_tree' );
		foreach ($this->_options as $option) {
			if( isset( $_POST[ $option['id'] ] )){
				if ($option['type'] == 'list-item' ) {
					$all_options[ $option['id'] ] = $_POST[ $option['id'] ][$option['id'] ];
				}elseif($option['type'] == 'textarea-simple'){
					$all_options[ $option['id'] ] =stripslashes(  $_POST[ $option['id'] ] );
				}else {
					$all_options[ $option['id'] ] = $_POST[ $option['id'] ];
				}

			}
		}


		update_option('c5_options_mode', 'simple');
		update_option( 'option_tree' , $all_options);

		?>
		<div class="wrap about-wrap">
			<div id="welcome-panel" class="c5-main-panel welcome-panel">
				<div class="quick-panel-flexslider c5-successfully">
					<div class="c5-quick-slide-wrap">
					<h2>Successfully Saved...</h2>
					<p class="about-description">Settings have been saved successfully, you might need to check the documentation and video tutorials for more about how to use the website.</p>
					</div>
				</div>
			</div>
		</div>
		<?php
	}


	function quick_setup_page() {
		$this->build_sections();
		$this->build_settings();

		if(isset($_POST['c5submit'])){
			$this->done_page();
			return;
		}

		?>
		<div class="wrap">
			<div id="welcome-panel" class="c5-main-panel welcome-panel">
				<form method="post" action="">
				<div class="quick-panel-flexslider">
				<ul class="slides">
				<?php
				$counter = 1;
				$previous = '';
				foreach ($this->_sections as  $section) {
					echo '<li>';

					echo '<div class="c5-quick-slide-wrap">';
					echo '<div class="section-wrap">';
					echo '<h3>'.$section['title'].'</h3>';
					echo $section['desc'];
					echo '</div><div class="options-wrap">';
					foreach ($this->_options as $option) {
						if($option['section']==$section['id']){
							$value = ot_get_option($option['id']);
							if($option['type'] == 'textarea-simple'){
								$value = stripslashes (  $value );
							}
							$value_array = array($option['id'] =>  $value);
							$this->display_setting($option, $value_array );
						}
					}

					if($section['id'] == 'direction'){
						if(!isset($GLOBALS['c5-demo-account'])){
							echo '<button  type="submit" class="button button-primary button-hero right" name="c5submit"><span class="fa fa-save"></span> Save</button>';
						}
					}elseif ($section['id'] == 'welcome') {
						echo '<p class="button c5-next-page c5-prev-page button-primary button-hero right" data-slide="'.$counter.'">Start <span class="fa fa-chevron-right"></span></p>';
					}else {
						echo '<p class="button c5-next-page c5-prev-page button-primary button-hero right" data-slide="'.$counter.'">Next <span class="fa fa-chevron-right"></span></p>';
					}
					$prev_num = $counter-2;
					if($prev_num >= 0){
						echo '<p class="button c5-next-page button-primary button-hero left" data-slide="'.$prev_num.'"><span class="fa fa-chevron-left"></span> Back</p>';

					}
					echo '</div>';
					echo '</div>';



					$counter++;
					echo '</li>';
				}
				 ?>
				</ul>
				</div>

				</form>
				</div>
		</div>
		<?php



	}
	function build_page($stage = 0) {
		echo '';
	}


	function build_sections () {

		$section = array();
		$this->_sections = apply_filters( 'c5_quick_setup_sections', $section );


	}
    function build_settings() {

		$options = array();
		$this->_options = apply_filters( 'c5_quick_setup_options', $options );

		



    }

    function get_content($id , $label , $std,$section = '') {
    	return array(
    	    'label' => $label,
    	    'id' => $id,
    	    'type' => 'textarea-simple',
    	    'desc' => '',
    	    'std' => $std,
    	    'rows' => '',
    	    'post_type' => '',
    	    'taxonomy' => '',
    	    'class' => '',
    	    'section' => $section
    	);
    }


}
$quick_setup = new C5_quick_setup();
$quick_setup->hook();
?>
