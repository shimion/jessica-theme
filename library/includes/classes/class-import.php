<?php

/**
*
*/
class C5_theme_import extends C5_theme_activation
{

    function __construct() {
        add_filter( 'c5_theme_name',  array($this, 'set_theme_name') );
        add_filter( 'c5_theme_videos_url',  array($this, 'set_theme_videos_url') );
        add_filter( 'c5_theme_docs_url',  array($this, 'set_theme_docs_url') );
        add_filter( 'c5_theme_purchase_url',  array($this, 'set_theme_purchase_url') );
        add_filter( 'c5_import_categories_url',  array($this, 'set_categories_url') );
        add_filter( 'c5_import_demo_data',  array($this, 'set_demo_urls') );
        add_filter( 'c5_import_menu_locations',  array($this, 'set_menu_locations') );


		add_filter( 'c5_theme_ticket_url',  array($this, 'c5_theme_ticket_url') );
        add_filter( 'c5_about_theme',  array($this, 'c5_about_theme') );

    }

    public function c5_about_theme($value='')
    {
        $description = '<p>Crystal is a premium WordPress Theme that fits Blogs and Magazines. Crystal stands out from the crowd not only with its elegant and professional design, but in how simple it is to set up and create the perfect website for your Magazine or Blog.</p>  ';

        return $description;
    }
    function c5_theme_ticket_url(){
        $value = 'https://code125.com/out/crystal-support/';
        return $value;
    }

    public function set_theme_name($value='')
    {
        $value = 'Crystal';
        return $value;
    }
    public function set_theme_videos_url($value='')
    {
        $value = 'https://www.youtube.com/watch?v=MItqDK2RarM&list=PLoZkybG-SsuL9L2GycioDsLPddL7koUIk';
        return $value;
    }
    public function set_theme_docs_url($value='')
    {
        $value = 'https://docs.code125.com/crystal/';
        return $value;
    }
    public function set_theme_purchase_url($value='')
    {
        $value = 'https://code125.com/out/crystal/';
        return $value;
    }
    public function set_categories_url($value='')
    {
        $value = 'http://files.code125.com/crystal/categories.txt';
        return $value;
    }
    public function set_menu_locations($menus)
    {
        $menus['main-nav'] = 'Main Menu';


        return $menus;
    }


    public function set_demo_urls($options)
    {
        $base_url = 'http://files.code125.com/crystal/';
        $demo_base_url = 'http://crystal.code125.com/';
        $options = array(
            'main-demo' => array(
            	'label'=>'Blog Style 1',
            	'xml' => $base_url . 'demo.xml',
            	'theme-options' => $base_url . 'theme-options-blog-1.txt',
            	'widgets' => $base_url . 'sidebar.json',
            	'img' => $base_url . 'demo1.jpg',
            	'demo_url'=> $demo_base_url . 'demo1/',
            	'homepage' => 'Homepage Blog 1',
            ),
            'dark' => array(
            	'label'=>'Dark Demo',
            	'xml' => $base_url . 'demo.xml',
            	'theme-options' => $base_url . 'theme-options-dark.txt',
            	'widgets' => $base_url . 'sidebar.json',
            	'img' => $base_url . 'demo2.jpg',
            	'demo_url'=> $demo_base_url . 'demo2/',
            	'homepage' => 'Homepage Blog 1',
            ),
            'blog-2' => array(
            	'label'=>'Blog Style 2',
            	'xml' => $base_url . 'demo.xml',
            	'theme-options' => $base_url . 'theme-options-blog-2.txt',
            	'widgets' => $base_url . 'sidebar.json',
            	'img' => $base_url . 'demo3.jpg',
            	'demo_url'=> $demo_base_url . 'demo3/',
            	'homepage' => 'Homepage Blog 2',
            ),
            'grid-1' => array(
            	'label'=>'Grid Style 1',
            	'xml' => $base_url . 'demo.xml',
            	'theme-options' => $base_url . 'theme-options-grid-1.txt',
            	'widgets' => $base_url . 'sidebar.json',
            	'img' => $base_url . 'demo4.jpg',
            	'demo_url'=> $demo_base_url . 'demo4/',
            	'homepage' => 'Homepage Grid 1',
            ),
            'grid-2' => array(
            	'label'=>'Grid Style 2',
            	'xml' => $base_url . 'demo.xml',
            	'theme-options' => $base_url . 'theme-options-grid-2.txt',
            	'widgets' => $base_url . 'sidebar.json',
            	'img' => $base_url . 'demo5.jpg',
            	'demo_url'=> $demo_base_url . 'demo5/',
            	'homepage' => 'Homepage Grid 2',
            ),
            'grid-3' => array(
            	'label'=>'Grid Style 3',
            	'xml' => $base_url . 'demo.xml',
            	'theme-options' => $base_url . 'theme-options-grid-3.txt',
            	'widgets' => $base_url . 'sidebar.json',
            	'img' => $base_url . 'demo6.jpg',
            	'demo_url'=> $demo_base_url . 'demo5/',
            	'homepage' => 'Homepage Grid 3',
            ),
            'shop' => array(
            	'label'=>'Shop',
            	'xml' => $base_url . 'demo-shop.xml',
            	'theme-options' => $base_url . 'theme-options-shop.txt',
            	'widgets' => $base_url . 'sidebar-shop.json',
            	'img' => $base_url . 'demo-shop.jpg',
            	'demo_url'=> $demo_base_url . 'shop/',
            	'homepage' => 'Homepage 1',
            ),
            'ar' => array(
            	'label'=>'Arabic Demo',
            	'xml' => $base_url . 'demo-ar.xml',
            	'theme-options' => $base_url . 'theme-options-ar.txt',
            	'widgets' => $base_url . 'sidebar-ar.json',
            	'img' => $base_url . 'demo-ar.jpg',
            	'demo_url'=> $demo_base_url . 'ar/',
            	'homepage' => 'Homepage Blog 1',
            ),

        );


        return $options;
    }
}
$import_obj = new C5_theme_import();

?>
