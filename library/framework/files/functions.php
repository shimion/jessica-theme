<?php

function c5_get_post_tax($id) {
    $post_type = get_post_type($id);
    $taxonomies=get_taxonomies();
    $skip = array(
        'post_tag',
        'nav_menu',
        'link_category',
        'post_format'
    );
    foreach ($taxonomies as $tax) {
        if(!in_array($tax , $skip) ){
            $tax_obj = get_taxonomy( $tax );
            if($tax_obj->object_type[0] == $post_type){
                return $tax;
            }
        }
    }

}

add_action( 'admin_bar_menu', 'c5_development_admin_bar_menu', 999 );

function c5_development_admin_bar_menu( $wp_admin_bar ) {
    if (C5_development_mode) {
        $args = array(
            'id'     => 'c5-development-post',     // id of the existing child node (New > Post)
            'title'  => 'Develepment Mode Active', // alter the title of existing node
            'parent' => false,
            'class' => 'c5-development-mode-active'
        );
        $wp_admin_bar->add_node( $args );
    }
}

add_action( 'wp_head', 'c5_development_admin_bar_css' );

function c5_development_admin_bar_css()
{
    if (is_admin_bar_showing() ) {
        ?>
        <style>
        .toplevel_page_c5-about .dashicons-admin-generic:before{
            font-family: 'code125';
            content: '\e800';
            line-height: auto;
            height: auto;
            font-size: 17px;
            margin-right: 5px;
            margin-left: 5px;
        }
        </style>
        <?php
    }
}


?>
