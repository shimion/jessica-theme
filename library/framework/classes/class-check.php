<?php

/**
 * version 1.0
 */
class C5_Theme_Panel
{
    public $purchase_key;

    function __construct(){

    }

    function hook(){
        add_action('admin_menu', array($this, 'register_theme_panel'));

    }

    /**
    * register our theme panel via the hook
    */
   function register_theme_panel() {
       /* wp doc: add_menu_page( $page_title, $menu_title, $capability, $menu_slug, $function, $icon_url, $position ); */
       add_menu_page('Theme panel', 'Master', "edit_posts", "c5_theme_welcome", array($this, "c5_view_welcome"), null, 3);

       add_submenu_page( "c5_theme_welcome", 'Install demos', 'Install demos', 'edit_posts', 'c5_theme_demos',  array($this, "c5_theme_demos") );
       add_submenu_page( "c5_theme_welcome", 'Support', 'Support', 'edit_posts', 'c5_theme_support',  array($this, "c5_theme_support") );
       add_submenu_page( "c5_theme_welcome", 'System status', 'System status', 'edit_posts', 'c5_system_status',  array($this, "c5_system_status") );
       add_submenu_page( "c5_theme_welcome", 'Theme panel', 'Theme panel', 'edit_posts', 'c5_theme_panel',  array($this, "c5_theme_panel") );


       // shit hack for welcome menu
       global $submenu; // this is a global from WordPress
       $submenu['c5_theme_welcome'][0][0] = 'Welcome';


   }
}
$obj_check = new C5_Theme_Panel();
$obj_check->hook();


 ?>
