<?php

class C5_quick_setup_options extends C5_theme_option_elements {


	function __construct() {
		add_filter( 'c5_quick_setup_sections',  array($this, 'c5_quick_setup_sections') );
		add_filter( 'c5_quick_setup_options',  array($this, 'c5_quick_setup_options') );
	}



	public function c5_quick_setup_sections($sections)
	{
		$sections = array(
			array(
				'title' => 'Welcome',
				'id' => 'welcome',
				'desc'=> '<p class="about-description">Thank You for Purcharsing our products, we created this quick setup wizard to help you to set most of the common tasks during your theme installtion, to minimize the time you look in the docs and video tutorials on how to setup your website.</p><p class="about-description">We hope that we will give you a real assistant here.</p>'
			),
			array(
				'title' => 'Add Your Logo',
				'id' => 'logo',
				'desc'=> '<p class="about-description">Upload Your Website logo, make sure that you upload the biggest size of the logo in jpeg/png format and set the height and we will handle it for you.</p>'
			),
			array(
				'title' => 'Set Your Color',
				'id' => 'color',
				'desc'=> '<p class="about-description">Choose the main color for your website, choose the best color that represent your website and brand.</p>'
			),
			array(
				'title' => 'Set Default Background',
				'id' => 'background',
				'desc'=> '<p class="about-description">Upload the default background image, it will be used in case there is no featured in the article.</p>'
			),
			array(
				'title' => 'Set Your Fonts',
				'id' => 'fonts',
				'desc'=> '<p class="about-description">Choose the fonts that will apply to your website, you can choose 2 different fonts to be applied on your headings and your content</p>'
			),

			array(
				'title' => 'Set Default Layout',
				'id' => 'layout',
				'desc'=> '<p class="about-description">Choose the default Layout for your website page, you can assign custom page layouts in each page/article seperatily, but here you will set the default for your website.</p>'
			),
			array(
				'title' => 'Set Default Blog Layout',
				'id' => 'blog',
				'desc'=> '<p class="about-description">Choose the default blog type for your website, this will affect homepage, category, tag, author and search pages.</p>'
			),
			array(
				'title' => 'Include Search Button',
				'id' => 'search',
				'desc'=> '<p class="about-description">Enable/Disable the search button in the top menu</p>'
			),
			array(
				'title' => 'Set Social Setting',
				'id' => 'social',
				'desc'=> '<p class="about-description">Add Your facebook App ID and Twitter authentication settings, this will help you to have your social data shows smoothly.</p>'
			),
			array(
				'title' => 'Set Website Direction',
				'id' => 'direction',
				'desc'=> '<p class="about-description">Do you have your website in Right to Left Language like "Arabic, Persian, Hebrew" you need to make the choice of Yes.</p>'
			),
		);
		return $sections;
	}

	public function c5_quick_setup_options($options='')
	{
		$fonts_obj = new C5_font();
		$google_fonts = $fonts_obj->get_select_array();

		global $wp_registered_sidebars;

		$sidebars = array();
		foreach ($wp_registered_sidebars as $sidebar_new) {
			$sidebars[] = array(
				'label' => $sidebar_new['name'],
				'value' => $sidebar_new['id']
			);
		}

		$layout_array = array(
			'1170-B-C',
			'1170-C-B',
			'1170-C',
		);
		$layout_options = array(
		);

		foreach ($layout_array as $value) {
			$layout_options[] = array(
				'src' => C5_skins_URL . 'images/layout/' . $value . '.png',
				'label' => '',
				'value' => $value
			);
		}

		$rtl_array = array(
			'ltr',
			'rtl'
		);
		$rtl_options = array(
		);

		foreach ($rtl_array as $value) {
			$rtl_options[] = array(
				'src' => C5_skins_URL . 'images/rtl/' . $value . '.png',
				'label' => '',
				'value' => $value
			);
		}

		$tabs = array(
			'blog-1',
			'blog-2',
			'grid-1',
			'grid-2',
			'grid-3',
		);
		$tabs_array = array();
		foreach ($tabs as $value) {
			$tabs_array[] = array(
				'src' => C5_URL . 'library/includes/images/blog/' . $value . '.jpg',
				'label' => '',
				'value' => $value,
				'class' => 'c5_posts_img'
			);
		}

		$obj = new C5AB_ICONS();
		$icons = $obj->get_icons_as_images();

		$options = array(
			array(
				'id'          => 'welcome_text',
				'label'       => 'Build your website in few steps!',
				'desc'        => '<p class="about-description">Most of our customers want to build their website in very easy way and don\'t want to read or watch a lot of documentation/video tutorials and thus we created this question based wizard to make it super easy to you.</p>',
				'std'         => '',
				'type'        => 'textblock',
				'section'     => 'welcome',
				'class' => '',
			),
			array(
				'label' => 'Website Logo',
				'id' => 'logo',
				'type' => 'upload',
				'desc' => 'Upload the main logo for your website, Upload as the logo as big as you can, you choose its size below',
				'std' => '',
				'rows' => '',
				'post_type' => '',
				'taxonomy' => '',
				'class' => '',
				'section' => 'logo'
			),
			array(
				'label' => 'Logo Height',
				'id' => 'logo_height',
				'type' => 'numeric-slider',
				'desc' => 'Slide to select your Logo Height in <strong>pixels</strong>. "We will calculate the width automaticly based on the height"',
				'std' => '30',
				'min_max_step' => '10,300,1',
				'rows' => '',
				'post_type' => '',
				'taxonomy' => '',
				'class' => '',
				'section' => 'logo'
			),
			array(
				'label' => 'What is your website color?',
				'id' => 'primary_color',
				'type' => 'colorpicker',
				'desc' => 'Pick a the main color for the theme (default: #c41411 ).',
				'std' => '#c41411',
				'rows' => '',
				'post_type' => '',
				'taxonomy' => '',
				'class' => '',
				'section' => 'color'
			),
			array(
				'label' => 'Default Cover Photo',
				'id' => 'default_cover',
				'type' => 'upload',
				'desc' => 'Default Cover Photo for your website.',
				'std' => array(),
				'rows' => '',
				'post_type' => '',
				'taxonomy' => '',
				'class' => '',
				'section' =>  'background'
			),
			array(
				'label' => 'Primary Heading Font',
				'id' => 'heading_font',
				'type' => 'select',
				'desc' => 'Select your Header font from the available fonts, Fonts are provided via Google Fonts API',
				'choices' => $google_fonts,
				'std' => 'Droid Serif#latin#googlefont',
				'rows' => '',
				'post_type' => '',
				'taxonomy' => '',
				'class' => '',
				'section' => 'fonts'
			),
			array(
				'label' => 'Body Font',
				'id' => 'body_font',
				'type' => 'select',
				'desc' => 'Select your body "Default" font from the available fonts, Fonts are provided via Google Fonts API',
				'choices' => $google_fonts,
				'std' => 'Droid Serif#latin#googlefont',
				'rows' => '',
				'post_type' => '',
				'taxonomy' => '',
				'class' => '',
				'section' => 'fonts'
			),
			array(
				'label' => 'Enable Search bar on top',
				'id' => 'search_on',
				'type' => 'on_off',
				'desc' => 'Choose ON to enable Search on the top menu bar.',
				'std' => 'on',
				'class' => '',
				'section' => 'search'
			),
			array(
				'label' => 'Page Layout',
				'id' => 'page_width',
				'type' => 'select',
				'desc' => 'Choose Page Layout',
				'choices' => array(
					array(
						'label'=>'Full Width',
						'value'=>'full',
					),
					array(
						'label'=>'Hidden Left Sidebar',
						'value'=>'left_hidden',
					),
					array(
						'label'=>'Hidden Right Sidebar',
						'value'=>'right_hidden',
					),
					array(
						'label'=>'Left Sidebar',
						'value'=>'left',
					),
					array(
						'label'=>'Right Sidebar',
						'value'=>'right',
					),
				),
				'std' => 'right',
				'rows' => '',
				'post_type' => '',
				'taxonomy' => '',
				'class' => 'c5-layout-control',
				'section' => 'layout'
			),
			array(
				'label' => 'Sidebar',
				'id' => 'big_sidebar',
				'type' => 'select',
				'desc' => 'Select the Big Page sidebar.',
				'choices' => $sidebars,
				'std' => 'sidebar',
				'rows' => '',
				'post_type' => '',
				'taxonomy' => '',
				'class' => 'c5-layout-control',
				'section' => 'layout'
			),
			array(
				'label' => 'Default Blog Layout',
				'id' => 'default_blog_layout',
				'type' => 'radio-image',
				'desc' => '',
				'choices' => $tabs_array,
				'std' => 'blog-1',
				'rows' => '',
				'post_type' => '',
				'taxonomy' => '',
				'class'=>'c5-blog-layout',
				'section' => 'blog'
			),
			array(
				'label' => 'Is Your website in Arabic "Right to Left Direction"',
				'id' => 'rtl',
				'type' => 'select',
				'desc' => '',
				'choices' => array(
					array(
						'label'=>'Yes',
						'value'=>'rtl',
					),
					array(
						'label'=>'No',
						'value'=>'ltr',
					),
				),
				'std' => 'ltr',
				'rows' => '',
				'post_type' => '',
				'taxonomy' => '',
				'class' => 'c5-layout-control',
				'section' =>'direction'
			),

			array(
				'label' => 'Facebook App ID',
				'id' => 'facebook_ID',
				'type' => 'text',
				'desc' => 'Add Facebook App ID.',
				'std' => '',
				'class' => '',
				'section' => 'social'
			),
			array(
				'label' => 'Twitter Consumer Key',
				'id' => 'consumerkey',
				'type' => 'text',
				'desc' => 'Add your twitter Consumer Key <a href="http://themepacific.com/how-to-generate-api-key-consumer-token-access-key-for-twitter-oauth/994/" >Click Here to learn about these keys</a>.',
				'std' => '',
				'rows' => '',
				'post_type' => '',
				'taxonomy' => '',
				'class' => '',
				'section' => 'social'
			),
			array(
				'label' => 'Twitter Consumer Secret',
				'id' => 'consumersecret',
				'type' => 'text',
				'desc' => 'Add your twitter Consumer Secret.',
				'std' => '',
				'rows' => '',
				'post_type' => '',
				'taxonomy' => '',
				'class' => '',
				'section' => 'social'
			),
			array(
				'label' => 'Twitter Access Token',
				'id' => 'accesstoken',
				'type' => 'text',
				'desc' => 'Add your twitter Access Token.',
				'std' => '',
				'rows' => '',
				'post_type' => '',
				'taxonomy' => '',
				'class' => '',
				'section' => 'social'
			),
			array(
				'label' => 'Twitter Access Token Secret',
				'id' => 'accesstokensecret',
				'type' => 'text',
				'desc' => 'Add your twitter Access Token Secret.',
				'std' => '',
				'rows' => '',
				'post_type' => '',
				'taxonomy' => '',
				'class' => '',
				'section' => 'social'
			),


		);
		return $options;
	}
	
}
$quick_setup = new C5_quick_setup_options();

?>
