<?php

/**
* version 1.0
*/
class C5_Admin_Panel
{
    public $purchase_key;

    function __construct(){

    }

    function constants(){
        $code125_url = 'http://code125.com';
        $theme_name = apply_filters( 'c5_theme_name', 'Code125' );
        $theme = wp_get_theme();

        define('C5_THEME_NAME' , $theme_name );
        define('C5_THEME_VERSION' , $theme->version );

        $theme_docs_url = apply_filters( 'c5_theme_docs_url', $code125_url );
        define('C5_THEME_DOCS_URL' , $theme_docs_url );

        $theme_vtutorials_url = apply_filters( 'c5_theme_videos_url', $code125_url );
        define('C5_THEME_VIDEO_TUTORIALS_URL' , $theme_vtutorials_url );

        $theme_ticket_url = apply_filters( 'c5_theme_ticket_url', 'http://themeforest.net/user/code125/portfolio?ref=code125' );
        define('C5_THEME_TICKET_URL' , $theme_ticket_url );

        $theme_purchase_URL = apply_filters( 'c5_theme_purchase_url', 'http://themeforest.net/user/code125/portfolio?ref=code125' );
        define('C5_THEME_PURCHASE_URL' , $theme_purchase_URL );

    }

    function hook(){


        add_action('wp_loaded' , array($this, 'constants'));
        add_action('admin_menu', array($this, 'register_theme_panel'));
        add_action('admin_menu', array($this, 'assign_plugins_bubble'), 9999);
        add_filter('ot_theme_options_parent_slug', array( $this, 'c5_theme_options_parent_slug' ));
        add_filter('ot_theme_options_menu_slug', array( $this, 'theme_options_menu_slug' ));
        add_filter('ot_header_logo_link', array( $this, 'ot_header_logo_link' ));
        add_filter('ot_theme_options_export_slug', array( $this, 'ot_theme_options_export_slug' ));
        add_filter('ot_header_version_text', array( $this, 'ot_header_version_text' ));



        add_action('c5_theme_options_header' ,array($this, 'theme_options_header' ));
        add_action( 'admin_bar_menu', array($this, 'admin_bar'), 1000 );

    }

    public function admin_bar()
    {
        global $wp_admin_bar, $wpdb;
        if ( !is_super_admin() || !is_admin_bar_showing()  )
        return;

        $pages  = array(
            C5_SLUG_ABOUT => 'About',
            C5_SLUG_THEME_OPTIONS => 'Theme Options',
            C5_SLUG_SUPPORT => 'Support',
            C5_SLUG_SYSTEM_STATUS => 'System Status',
            C5_SLUG_DEMOS_INSTALL => 'Install Demos',
            C5_SLUG_QUICK_SETUP => 'Quick Setup',
            C5_SLUG_IMPORT_EXPORT => 'Import/Export',
        );

        $wp_admin_bar->add_menu( array( 'id' => 'c5_parent', 'title' => '<span class="icon-c5-code125"></span> ' . C5_THEME_NAME , 'href' => admin_url( 'admin.php?page=' . C5_SLUG_THEME_OPTIONS ) ) ) ;

        foreach ($pages as $key => $value) {

            $wp_admin_bar->add_menu( array( 'parent'=>'c5_parent', 'id' => $key, 'class' =>  $key,'href'=>admin_url('admin.php?page=' . $key), 'title' => $value ) );
        }

        if(!is_admin()){
            $wp_admin_bar->add_node( array( 'parent' => 'c5_parent','id' => 'c5_refresh_categories', 'title' => __( 'Refresh Cached Categories Info', 'code125-admin' ), 'href' => get_permalink() . '?update=categories' ) );
        }
    }

    function ot_header_logo_link(){
        return '<a href="http://code125.com" target="_blank" class="c5-ot-header-icon"><span class="icon-c5-code125"></span></a>';
    }
    function ot_header_version_text(){
        return C5_THEME_NAME . ' ' . C5_THEME_VERSION;
    }
    function theme_options_menu_slug(){
        return C5_SLUG_THEME_OPTIONS;
    }
    function ot_theme_options_export_slug(){
        return C5_SLUG_IMPORT_EXPORT;
    }
    function c5_theme_options_parent_slug(){
        return C5_SLUG_ABOUT;
    }
    function theme_options_header(){
        if ($_GET['page'] == C5_SLUG_IMPORT_EXPORT) {
            ?>
            <h1>Import and Export</h1>
            <div class="about-text" style="margin-bottom: 30px;">
                <p>In case you wanted to migrate your website, try new theme options or take backup. We built a small tool to help you import or export theme options easily. Please take backup before every update you perform.</p>
                <?php $this->badge(); ?>
            </div>
            <?php
            $this->header();
            return;
        }
        ?>
        <h1>Theme Options</h1>
        <div class="about-text" style="margin-bottom: 30px;">
            <p>We grouped the most options should be needed to change in your website and built this theme options panel. It is grouped in main categories to make it accessible for you to customize your website smoothly.</p>
            <?php $this->badge(); ?>
        </div>
        <?php
        $this->header();
    }

    /**
    * register our theme panel via the hook
    */
    function register_theme_panel() {

        /* wp doc: add_menu_page( $page_title, $menu_title, $capability, $menu_slug, $function, $icon_url, $position ); */
        add_menu_page( C5_THEME_NAME . ' Panel', C5_THEME_NAME, "edit_posts", C5_SLUG_ABOUT, array($this, "c5_about_page"), null, 3);
        add_submenu_page( C5_SLUG_ABOUT , 'Support', 'Support', 'edit_posts', C5_SLUG_SUPPORT,  array($this, "c5_theme_support") );
        add_submenu_page( C5_SLUG_ABOUT , 'System status', 'System status', 'edit_posts', C5_SLUG_SYSTEM_STATUS,  array($this, "c5_system_status") );


        // shit hack for welcome menu
        global $submenu; // this is a global from WordPress
        $submenu[C5_SLUG_ABOUT][0][0] = 'About';



    }
    public function assign_plugins_bubble()
    {
        global $submenu;

        $index = 0;
        foreach ($submenu as $name => $menu) {
            if ($name == C5_SLUG_ABOUT) {
                foreach ($menu as $single_menu) {
                    if ($single_menu[2] == 'c5-install-plugins') {
                        break;
                    }else {
                        $index++;
                    }
                }
            }
        }
        if (isset( $submenu[C5_SLUG_ABOUT][$index][0] )) {
            $count = $this->get_tgma_unactive_count();
            if ($count > 0) {
                $submenu[C5_SLUG_ABOUT][$index][0] .= ' <span class="c5-update-count">'. $count . '</span>';
            }
        }
    }
    function c5_about_page(){
        ?>
        <div class="wrap about-wrap c5-admin-wrap">
            <h1>About</h1>
            <div class="about-text" style="margin-bottom: 30px;">
                <p>Welcome to  <?php echo C5_THEME_NAME?> dashboard. We in Code125 handcrafted this theme carefully for you to start your next big project. We are dedicated to serve you in the best way we can.</p>
                <?php $this->badge(); ?>
            </div>
            <?php $this->header(); ?>

            <div class="feature-section two-col">
                <div class="col">
                    <div class="media-container">
                        <img src="<?php echo get_template_directory_uri() ?>/screenshot.png" />
                    </div>
                </div>
                <div class="col">
                    <h3>About <?php echo C5_THEME_NAME?>.</h3>
                    <p><?php echo apply_filters( 'c5_about_theme', '' ); ?></p>
                    <h4>Notes</h4>
                    <ul class="c5-lists">
                        <li><?php echo C5_THEME_NAME?> is exclusivly sold on Themeforest throught this <a href="<?php echo C5_THEME_PURCHASE_URL ?>" target="_blank">link</a>.</li>
                        <li>We offer support through this <a href="<?php echo admin_url('/admin.php?page=' . C5_SLUG_SUPPORT) ?>" target="_blank">page</a>.</li>
                        <li>The purchase you made allows you to use <?php echo C5_THEME_NAME?> on one domain or project.</li>
                        <li>We appreciate everyone feedback as it allows us to keep supporting and releasing new updates</li>
                    </ul>
                </div>
            </div>

        </div>
        <?php
    }
    function c5_theme_support(){
        ?>
        <div class="wrap about-wrap c5-admin-wrap">
            <h1>Support</h1>
            <div class="about-text" style="margin-bottom: 30px;">
                <p>We love to help our customers to build an amazing website with our products. So we provide a lot of support solutions for your to get your answer as fast as possible. Below kindly check how can you get your question answered.</p>
                <?php $this->badge(); ?>
            </div>
            <?php $this->header(); ?>
            <div class="changelog point-releases">
                <h3>Need help?</h3>
                <p>We have packed multiple solutions to help you with any question you have. Please check the following solutions to get the maxium beneifts out of <?php echo C5_THEME_NAME?></p>
            </div>
            <div class="feature-section under-the-hood three-col">
                <div class="col">
                    <h3>Documentation</h3>
                    <p>We built a detailed documentation for <?php echo C5_THEME_NAME?>. There is a high chance we covered your question in the documentation. Please check the documentation before opening a ticket.</p>
                    <a href="<?php echo C5_THEME_DOCS_URL ?>" class="button button-hero button-primary" target="_blank">Check out Documentation</a>
                </div>
                <div class="col">
                    <h3>Video Tutorials</h3>
                    <p>We created Youtube tutorials to help you on how to use our products, kindly review them as we always update them with the most questions we got asked related to our products.</p>
                    <a href="<?php echo C5_THEME_VIDEO_TUTORIALS_URL ?>" class="button button-hero button-primary" target="_blank">See Video Tutorials</a>
                </div>
                <div class="col">
                    <h3>Submit a Ticket</h3>
                    <p>We will be happy to receive your question through our support tab in the product page. But we encourage you to know your rights before attempting to send us a support ticket.</p>
                    <a href="<?php echo C5_THEME_TICKET_URL ?>" class="button button-hero button-primary" target="_blank">Open Ticket</a>
                </div>
            </div>
            <div class="feature-section c5-support-policy">

                <h2>Support Policy</h2>
                <p>We grouped some guidelines should help you to determine wheither your question fails into the scope of Theme Support or it is a customization.</p>
                <h4>What’s included in support:</h4>
                <ul class="c5-lists">
                    <li>Responding to questions or problems regarding the item and its features</li>
                    <li>Fixing bugs and reported issues</li>
                    <li>Providing updates to ensure compatibility with new software versions</li>
                </ul>

                <h4>What’s not included in support:</h4>
                <ul class="c5-lists">
                    <li>Customization and installation services</li>
                    <li>Support for third party software and plug-ins</li>
                    <li>Fixing Bugs related to hosting setup or WordPress itself.</li>
                </ul>
                <p>You can read more about Envato Item Support Policy <a href="http://themeforest.net/page/item_support_policy?ref=code125" target="_blank">Here</a></p>
            </div>

        </div>
        <?php
    }
    function badge(){
        ?>
        <div class="c5-badge"><?php echo C5_THEME_NAME?> <?php echo C5_THEME_VERSION; ?></div>
        <?php
    }
    function header(){

        $pages  = array(
            C5_SLUG_ABOUT => 'About',
            C5_SLUG_THEME_OPTIONS => 'Theme Options',
            C5_SLUG_SUPPORT => 'Support',
            C5_SLUG_SYSTEM_STATUS => 'System Status',
            C5_SLUG_DEMOS_INSTALL => 'Install Demos',
            'c5-install-plugins' => 'Install Plugins',
            C5_SLUG_QUICK_SETUP => 'Quick Setup',
            C5_SLUG_IMPORT_EXPORT => 'Import/Export',
        );
        ?>
        <h2 class="nav-tab-wrapper">
            <?php

            $current_url = $_GET['page'];
            if (isset($_GET['tab'])) {
                $current_url .= '&tab=' . $_GET['tab'];
            }
            foreach ($pages as $slug => $title) {
                $url = admin_url( 'admin.php?page=' . $slug );
                $class= '';
                if ($current_url == $slug) {
                    $class = 'nav-tab-active';
                }

                if ($slug == 'c5-install-plugins') {
                    $count = $this->get_tgma_unactive_count();
                    if ($count > 0) {
                        $title .=  ' <span class="count">'. $count . '</span>';
                    }
                }
                ?>
                <a href="<?php echo $url; ?>" class="nav-tab <?php echo $class ?>"><?php echo $title; ?></a>
                <?php
            }
            ?>
        </h2>
        <?php
    }
    public function get_tgma_unactive_count()
    {
        $count = 0;
        $plugins = array( );
        $plugins = apply_filters( 'c5_fw_tgmpa', $plugins );
        foreach ($plugins as $plugin) {
            if (!is_plugin_active( $this->_get_plugin_basename_from_slug( $plugin['slug'] ) )) {
                $count++;
            }
        }
        return $count;
    }
     function _get_plugin_basename_from_slug( $slug ) {
        $keys = array_keys( $this->get_plugins() );

        foreach ( $keys as $key ) {
            if ( preg_match( '|^' . $slug . '/|', $key ) ) {
                return $key;
            }
        }

        return $slug;
    }
    public function get_plugins( $plugin_folder = '' ) {
        if ( ! function_exists( 'get_plugins' ) ) {
            require_once ABSPATH . 'wp-admin/includes/plugin.php';
        }

        return get_plugins( $plugin_folder );
    }
    function c5_system_status(){


        $obj = new C5_System_Status();
        $obj->render();

        echo '</div>';
    }
}
$obj_check = new C5_Admin_Panel();
$obj_check->hook();


?>
