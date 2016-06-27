<?php

class C5_meta_boxes extends C5_theme_option_elements {

    function __construct() {
        add_filter( 'c5_fw_meta_box_post' , array($this, 'meta_box_post'));
        add_filter( 'c5_fw_meta_box_rest' , array($this, 'meta_box_post'));
        add_filter( 'c5_fw_meta_box_page' , array($this, 'meta_box_page'));

    }

    public function meta_box_post($options)
    {
        $options[] =array(
            'title' => 'General',
            'options' => $this->general_post(),
            'order' => 1
        );
        $options[] =array(
            'title' => 'Featured Media',
            'options' => $this->featured_media(),
            'order' => 1
        );
        $options[] = array(
            'title' => 'Custom Featured Image',
            'options' => $this->custom_featured_image(),
            'order' => 1
        );

        $options[] = array(
            'title' => 'Appearance',
            'options' => $this->appearance(),
            'order' => 3
        );


        $options[] = array(
            'title' => 'Layout',
            'options' => $this->layout(),
            'order' => 4
        );

        $categories = $this->dominating_categories();
        if(!empty($categories)){
            $options[] = array(
                'title' => 'Dominating Category',
                'options' => $categories,
                'order' => 5
            );
        }

        return $options;
    }

    public function meta_box_page($options)
    {
        $options[] =array(
            'title' => 'General',
            'options' => $this->general_page(),
            'order' => 1
        );
        $options[] = array(
            'title' => 'Slider',
            'options' => $this->page_slider(),
            'order' => 3
        );
        $options[] = array(
            'title' => 'Custom Featured Image',
            'options' => $this->custom_featured_image(),
            'order' => 4
        );
        $options[] = array(
            'title' => 'Appearance',
            'options' => $this->appearance(),
            'order' => 5
        );
        $options[] = array(
            'title' => 'Layout',
            'options' => $this->layout(),
            'order' => 6
        );
        return $options;
    }


    public function appearance()
    {
        $appearance_fields = array();
        $appearance_fields[] = array(
            'label' => 'Use Custom Color Settings',
            'id' => 'use_custom_colors',
            'type' => 'on_off',
            'desc' => 'Use Custom Color Settings.',
            'std' => 'off',
            'class' => ''
        );
        $appearance_fields = array_merge( $appearance_fields,  $this->get_colors_options() );

        return $appearance_fields;
    }

    public function layout()
    {
        $layout_fields = array();
        $layout_fields[] = array(
            'label' => 'Use Custom Layout Settings',
            'id' => 'use_custom_layout',
            'type' => 'on_off',
            'desc' => 'Use Custom Layout Settings.',
            'std' => 'off',
            'class' => ''
        );
        $layout_fields = array_merge( $layout_fields,  $this->get_layout_options() );

        return $layout_fields;
    }

    public function custom_featured_image()
    {
        $options = array(
            array(
                'label' => 'Custom Article Featured Image',
                'id' => 'c5_custom_image',
                'type' => 'upload',
                'desc' => 'Add Custom featured image to be applied in the page it self, on average you should assign 1000x400 pixel image to be visible',
                'std' => '',
                'rows' => '',
                'post_type' => '',
                'taxonomy' => '',
                'class' => ''
            ),
            array(
                'label' => 'Force Dark/Light Mode for this page',
                'id' => 'c5_force',
                'type' => 'select',
                'desc' => 'Force Dark/Light Mode for this page',
                'choices' => array(
                    array(
                        'label' => 'Automatic Checked',
                        'value' => ''
                    ),
                    array(
                        'label' => 'Dark',
                        'value' => 'dark'
                    ),
                    array(
                        'label' => 'Light',
                        'value' => 'light'
                    ),
                ),
                'std' => '',
                'rows' => '',
                'post_type' => '',
                'taxonomy' => '',
                'class' => ''
            ),
        );
        return $options;
    }

    public function featured_media()
    {
        $options = array(
            array(
                'label' => 'Enable Featured Media',
                'id' => 'featured_media',
                'type' => 'select',
                'desc' => 'Enable/Disable Featured Media for this Article',
                'choices' => array(
                    array(
                        'label' => 'Default',
                        'value' => ''
                    ),
                    array(
                        'label' => 'Yes',
                        'value' => 'yes'
                    ),
                    array(
                        'label' => 'No',
                        'value' => 'no'
                    )
                ),
                'std' => '',
                'rows' => '',
                'post_type' => '',
                'taxonomy' => '',
                'class' => ''
            ),
            array(
                'label' => 'Video / Audio url',
                'id' => 'meta_attachment',
                'type' => 'text',
                'desc' => 'Video url, we support "Youtube, Vimeo and Dailymotion" or Audio url we support "Audio and Soundcloud"',
                'std' => '',
                'rows' => '',
                'post_type' => '',
                'taxonomy' => '',
                'class' => ''
            )
        );
        return $options;
    }

    public function dominating_categories()
    {
        $options = array();
        if (isset($_GET['post_type'])) {
            $post_type = $_GET['post_type'];
        } else {
            if (isset($_GET['post'])) {
                $id = $_GET['post'];
                $post_type = get_post_type($id);
            } else {
                $post_type = 'post';
            }
        }
        if ($post_type != 'page') {
            $tax = c5_get_tax_from_post_type($post_type);

            $options =  array(
                array(
                    'label' => 'Choose Dominating Category',
                    'id' => 'category_follow',
                    'type' => 'taxonomy-select',
                    'desc' => 'Choose Dominating Category for this post, the Article will follow this category in its styling settings.',
                    'std' => '',
                    'rows' => '',
                    'post_type' => '',
                    'taxonomy' => $tax,
                    'class' => ''
                )
            );
        }
        return $options;
    }



    public function general_post()
    {
        $options = array(
            array(
                'label' => 'Subtitle',
                'id' => 'c5_subtitle',
                'type' => 'text',
                'desc' => 'Article, Page Subtitle',
                'std' => '',
                'rows' => '',
                'post_type' => '',
                'taxonomy' => '',
                'class' => ''
            ),
        );
        return $options;
    }
    public function general_page()
    {
        $options = array(
            array(
                'label' => 'Alternative Title',
                'id' => 'c5_title',
                'type' => 'text',
                'desc' => 'Add an alternative title to your page title',
                'std' => '',
                'rows' => '',
                'post_type' => '',
                'taxonomy' => '',
                'class' => ''
            ),
            array(
                'label' => 'Page Subtitle',
                'id' => 'c5_subtitle',
                'type' => 'text',
                'desc' => 'Article, Page Subtitle',
                'std' => '',
                'rows' => '',
                'post_type' => '',
                'taxonomy' => '',
                'class' => ''
            ),

            array(
                'label' => 'Enable Comments',
                'id' => 'enable_comments',
                'type' => 'on_off',
                'desc' => 'Enable/Disable Comments for this Page',
                'std' => 'off',
                'rows' => '',
                'post_type' => '',
                'taxonomy' => '',
                'class' => ''
            ),
            array(
                'label' => 'Login Required',
                'id' => 'login_required',
                'type' => 'on_off',
                'desc' => 'Make this page Login Required',
                'std' => 'off',
                'rows' => '',
                'post_type' => '',
                'taxonomy' => '',
                'class' => ''
            )
        );
        return $options;
    }

    public function page_slider()
    {
        $post_obj = new C5_post();

        $options = array(
            array(
                'label' => 'Enable top Slider',
                'id' => 'c5_top_slider',
                'type' => 'on_off',
                'desc' => 'Enable Top Slider',
                'std' => 'off',
                'rows' => '',
                'post_type' => '',
                'taxonomy' => '',
                'class' => ''
            ),
            array(
                'label' => 'Choose Post Type/Category/Tag/Author',
                'id' => 'slider_post_type',
                'type' => 'post-select',
                'desc' => 'Add Different Parameters to show your posts, select by tag, category or author.',
                'std' => 'post',
                'rows' => '',
                'post_type' => '',
                'taxonomy' => '',
                'class' => ''
            ),
            $post_obj->get_orderby_array('slider_orderby','date'),
            $post_obj->get_posts_per_page_array('slider_posts_per_page', '5'),
            array(
                'label' => 'Or Add Specific Articles',
                'id' => 'slider_posts',
                'type' => 'posts-search',
                'desc' => 'Add Specific Articles to this query "Any other query will be ignored".',
                'std' => '',
                'rows' => '',
                'post_type' => '',
                'taxonomy' => '',
                'class' => ''
            ),
            array(
                'label' => 'Alternative Top Content',
                'id' => 'c5_content',
                'type' => 'textarea-simple',
                'desc' => 'Add an alternative content to your top area, ex: slider shortcode or page builder template shortcode',
                'std' => '',
                'rows' => '',
                'post_type' => '',
                'taxonomy' => '',
                'class' => ''
            ),
        );
        return $options;
    }

}
$meta_boxes = new C5_meta_boxes();
?>
