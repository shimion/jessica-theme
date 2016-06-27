<?php

/**
*
*/
class C5_ADD_THEME_DEFAULTS
{

    function __construct()
    {
        add_filter( 'c5_theme_defaults', array($this, 'set_values'));
    }
    public function set_values($defaults)
    {
        $defaults = array (
          'skin_default' => '',
          'skin_default_category' => '',
          'skin_default_search' => '',
          'skin_default_archive' => '',
          'skin_default_404' => '',
          'logo' => '',
          'logo_height' => '30',
          'logo_margin' => '12',
          'favicon' => '',
          'default_cover' => '',
          'preload' => 'on',
          'articles_preload' => 'on',
          'preview' => 'on',
          'category_styling' => 'on',
          'gallery_style' => 'on',
          'custom_css' => '',
          'custom_css_mobile' => '',
          'custom_css_tablet' => '',
          'custom_js' => '',
          'default_blog_layout' => 'blog-1',
          'rtl' => 'ltr',
          'page_width' => 'right',
          'big_sidebar' => 'sidebar',
          'header_menu' => 'main-nav',
          'main_ad' => '728x90',
          'main_ad_content_728x90' => '',
          'main_ad_content_300x250' => '',
          'floating_enable' => 'on',
          'color_scheme' => 'light',
          'primary_color' => '#c41411',
          'heading_font' => 'Droid Serif#latin#googlefont',
          'body_font' => 'Droid Serif#latin#googlefont',
          'body_fs' => '15',
          'menu_fs' => '12',
          'title_fs' => '16',
          'article_title_fs' => '50',
          'article_subtitle_fs' => '24',
          'article_meta_fs' => '13',
          'article_text_fs' => '16',
          'default_template' => '',
          'cat_template' => '',
          'tag_template' => '',
          'author_template' => '',
          'search_template' => '',
          'archive_template' => '',
          '404_template' => '',
          'facebook_ID' => '',
          'consumerkey' => '',
          'consumersecret' => '',
          'accesstoken' => '',
          'accesstokensecret' => '',
          'article_width' => 'right',
          'article_sidebar' => 'article',
          'article_meta_data' => 'author_on,time_on,comment_on,like_on,views_on,share_on',
          'c5_date_format' => 'date_ago',
          'article_social_media' => 'facebook_on,twitter_on,googleplus_on,linkedin_on',
          'article_before' => '',
          'article_after' => '',
          'enable_facebook' => 'on',
          'enable_wp_comments' => 'on',
          'comments_order' => 'facebook_comments',
          'facebook_color' => 'light',
          'search_on' => 'on',
          'search_post' => 'post',
          'search_cover' => '',
          'sidebars' => '',
          'menus' => '',
          'custom_fonts' => '',
          'footer_enable' => 'on',
          'footer_template' => 'footer-1',
          'footer_background' => '#272727',
          'footer_copyrights_enable' => 'on',
          'footer_copyrights_background' => '#1f1f1f',
          'social_icons' => '',
          'footer_copyrights' => 'Copyright ©2014. Designed by <a href="https://code125.com/out/crystal/" target="_blank">Code125</a>',
        );
        return $defaults;
    }
}
$obj = new C5_ADD_THEME_DEFAULTS();


?>
