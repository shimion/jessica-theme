<?php

class C5_theme_layout extends C5_theme_option_elements {

    function __construct() {

    }


    function template_exist($id) {
        if($id != ''){
            return true;
        }
        return false;
    }

    function get_current_template_id() {

        if (is_category() || is_tax()) {
            $obj = get_queried_object();
            $term_id = $obj->term_id;
            $tax = $obj->taxonomy;

            $value = get_option('c5_term_meta_' . $tax . '_' . $term_id . '_' . 'template');
            if ($this->template_exist($value)) {
                return $value;
            }

            $tax_terms = get_taxonomy($tax );
            $post_type = $tax_terms->object_type[0];
            $post_type_id = $this->get_cpt( $post_type);
            if($post_type_id){
                $value = get_post_meta($post_type_id, 'category_template' , true) ;
                if ($this->template_exist($value)) {
                    return $value;
                }
            }

            $value = ot_get_option('cat_template');
            if ($this->template_exist($value)) {
                return $value;
            }
        } elseif (is_tag()) {
            $obj = get_queried_object();
            $term_id = $obj->term_id;
            $tax = $obj->taxonomy;

            $value = get_option('c5_term_meta_' . $tax . '_' . $term_id . '_' . 'template');
            if ($this->template_exist($value)) {
                return $value;
            }
            $value = ot_get_option('tag_template');
            if ($this->template_exist($value)) {
                return $value;
            }

        } elseif (is_search()) {
            $value = ot_get_option('search_template');
            if ($this->template_exist($value)) {
                return $value;
            }
        } elseif (is_author()) {
            $obj = get_queried_object();

            $value = get_the_author_meta('c5_term_meta_user_template', $obj->ID);
            if ($this->template_exist($value)) {
                return $value;
            }

            $value = ot_get_option('author_template');
            if ($this->template_exist($value)) {
                return $value;
            }
        } elseif (is_404()) {
            $value = ot_get_option('404_template');
            if ($this->template_exist($value)) {
                return $value;
            }
        } elseif (is_archive()) {
            $value = ot_get_option('archive_template');
            if ($this->template_exist($value)) {
                return $value;
            }
        }


        $value = ot_get_option('default_template');

        return $value;
    }



    function get_current_skin() {

        global $c5_skindata;
        if (!is_array($c5_skindata)) {
            $c5_skindata = array();
        }

        $defaults_obj = new C5_THEME_DEFAULTS();
        $c5_theme_defaults = $defaults_obj->get_theme_defaults();


        foreach ($c5_theme_defaults as $id => $default) {
            $c5_skindata[$id] = ot_get_option($id, $default);
        }

        $template_id = $this->get_current_template_id();

        $c5_skindata['template_id'] = $template_id;

        $GLOBALS['c5-main-width'] = c5_get_page_width();

        c5_check_mobile_width();
    }
    function get_cpt($slug) {
        $args = array(
            'post_type' => 'cpt',
            'meta_value' => $slug
        );
        $id = false;
        $the_query = new WP_Query( $args );
        // The Loop
        if ( $the_query->have_posts() ) {
            while ( $the_query->have_posts() ) {
                $the_query->the_post();
                $id = get_the_ID();
            }
        }
        wp_reset_postdata();
        return $id;
    }

    function build_layout($source) {
        global $c5_skindata;
        ?>

        <div id="inner-content" class=" clearfix">
            <?php
            $class = 'c5-sidebar-hidden';
            switch ($c5_skindata['page_width']) {
                case 'left':
                $GLOBALS['c5_content_width'] = 740;
                $class = 'c5-sidebar-active';
                break;
                case 'right':
                $GLOBALS['c5_content_width'] = 740;
                $class = 'c5-sidebar-active';
                break;
                case 'full':
                $GLOBALS['c5_content_width'] = 1070;
                break;
                default:
                $GLOBALS['c5_content_width'] = 740;
                break;
            }
            c5_check_mobile_width();
            echo '<div class="c5-main-width-wrap c5-main-page-wrap-sidebar '.$class.' c5-page-'.$c5_skindata['page_width'].' clearfix"><div class="row"><div class="c5-middle-control clearfix">';
            if ($c5_skindata['page_width'] == 'left' || $c5_skindata['page_width'] == 'left_hidden') {
                $this->get_sidebar($c5_skindata['big_sidebar']);
                $this->get_main_content($source);



            }elseif ($c5_skindata['page_width'] == 'right' || $c5_skindata['page_width'] == 'right_hidden') {

                $this->get_main_content($source);
                $this->get_sidebar($c5_skindata['big_sidebar']);
            }else {
                $this->get_main_content($source);
            }
            echo '</div></div></div>';

        }

        function get_sidebar($sidebar) {
            $test = $GLOBALS['c5_content_width'];
            $GLOBALS['c5_content_width'] = 300;
            ?>
            <div id="sidebar-<?php echo $sidebar ?>" class="c5-single-content c5-sidebar-wrap clearfix">
                <?php
                if ( is_active_sidebar( $sidebar ) ){
                    dynamic_sidebar( $sidebar );
                }
                ?>
            </div>
            <?php
            $GLOBALS['c5_content_width'] = $test;
        }

        function get_main_content($source) {
            echo '<div class="c5-main-content-area c5-single-content clearfix">';
            switch ($source) {
                case 'home':
                get_template_part( 'library/includes/templates/template-index');
                break;
                case 'page':
                get_template_part( 'library/includes/templates/template-page');
                break;
                case 'woocommerce':
                get_template_part( 'library/includes/templates/template-woocommerce');
                break;
                case 'single':
                get_template_part( 'library/includes/templates/template-single');
                break;
                case '404':
                get_template_part( 'library/includes/templates/template-404');
                break;

            }
            echo '</div>';

        }

    }
    ?>
