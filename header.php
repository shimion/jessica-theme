<?php
if (isset($_SERVER['HTTP_ACCEPT_ENCODING'])) {
	$header_encoding = $_SERVER['HTTP_ACCEPT_ENCODING'];

	if (strpos($header_encoding, 'gzip')) {
	    ob_start("ob_gzhandler");
	}
}
$header_obj = new C5_build_header();
$header_obj->hook();
$header_css = new C5_header_css();
$header_css->hook();

// $obj = new C5_THEME_DEFAULTS();
// $obj->print_theme_options_array();

?>
<!doctype html>                                                                                                                             <!--[if lt IE 7]><html <?php language_attributes(); ?> class="no-js lt-ie9 lt-ie8 lt-ie7"><![endif]-->                                                                                                                                <!--[if (IE 7)&!(IEMobile)]><html <?php language_attributes(); ?> class="no-js lt-ie9 lt-ie8"><![endif]-->                                                                                                                                <!--[if (IE 8)&!(IEMobile)]><html <?php language_attributes(); ?> class="no-js lt-ie9"><![endif]-->
<!--[if gt IE 8]><!--> <html <?php language_attributes(); ?> class="no-js"><!--<![endif]-->

    <head>
        <meta charset="utf-8">

		<title><?php wp_title(); ?> </title>

        <?php // Google Chrome Frame for IE     ?>
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

        <?php // mobile meta (hooray!)  ?>
        <meta name="HandheldFriendly" content="True">
        <meta name="MobileOptimized" content="320">
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>

        <link rel="pingback" href="<?php esc_url( bloginfo('pingback_url')); ?>">

        <?php // wordpress head functions    ?>
        <?php wp_head(); ?>
        <script src="" type="text/javascript">

        </script>
        <?php // end of wordpress head    ?>
    </head>
	<?php

	$color_scheme = ot_get_option('color_scheme');
	if ($color_scheme=='') {
		$color_scheme = 'light';
	}


	 ?>
    <body <?php body_class('c5-body-class c5-scheme-'.$color_scheme); ?>>
		<?php
		$preload = ot_get_option('preload');
		if ($preload!='off') {
			?>
			<div class="c5-pre-con">
				<div class="center">
				<div class="c5-top-spinner"></div>

				</div>

			</div>
		    <?php
		}

        ?>
        <div id="fb-root"></div>
        <script>(function(d, s, id) {
                var js, fjs = d.getElementsByTagName(s)[0];
                if (d.getElementById(id))
                    return;
                js = d.createElement(s);
                js.id = id;
                js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&appId=<?php echo ot_get_option('facebook_ID'); ?>&version=v2.0";
                fjs.parentNode.insertBefore(js, fjs);
            }(document, 'script', 'facebook-jssdk'));</script>
        <?php
        global $c5_skindata;
        ?>



        <div class="c5-main-body-wrap  clearfix">
            <div class="c5-container-controller">


                <span class="c5-close-button"></span>

                <?php
                $header_obj->floating_bar();
                $header_obj->main_content();
                ?>
                <?php $header_obj->header_content(); ?>

                <?php


                if ($c5_skindata['floating_enable'] != 'off') {
                    ?>
                    <div id="floating-trigger"></div>
                <?php } ?>
