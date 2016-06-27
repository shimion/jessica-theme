<?php 

class C5AB_authors_info extends C5_Widget {


	public  $_shortcode_name;
	public  $_shortcode_bool = true;
	public  $_options =array();
	
	
	function __construct() {
		
		$id_base = 'authors_info-widget';
		$this->_shortcode_name = 'c5ab_authors_info';
		$name = 'Authors Info';
		$desc = 'Authors Info Box.';
		$classes = '';
		
		$this->self_construct($name, $id_base , $desc , $classes);
		
		
	}
	
	
	function shortcode($atts,$content) {
		if($atts['author_id'] == ''){
			$user_ID = get_the_author_meta('ID');
		}else {
			$user_ID = $atts['author_id'] ;
		}
		        $facebook_user = get_the_author_meta('c5_term_meta_user_facebook', $user_ID);
		        $twitter_user = get_the_author_meta('c5_term_meta_user_twitter', $user_ID);
		        $google_plus_user = get_the_author_meta('c5_term_meta_user_google_plus', $user_ID);
				
				 
		        $data .= '<div class="c5-author-meta-wrap">';
		        $data .= '<div class="c5-author-img">' . get_avatar($user_ID, '200', '', '') . '</div>';
		
		        $data .= '<div class="c5-author-data"><a class="url fn" href="' . get_author_posts_url($user_ID) . '">' . get_the_author_meta('display_name') . '</a>';
		
		        if ($twitter_user != '') {
		            $data .=  '<div class=""><a href="https://twitter.com/' . $twitter_user . '" class="twitter-follow-button" data-show-count="false" data-show-screen-name="false">Follow @' . $twitter_user . '</a>
					<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="//platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script></div>';
		        }
		
		        if ($facebook_user != '') {
		            $data .=  '<div class="float_left_fb"><div class="fb-follow" data-href="http://www.facebook.com/'.$facebook_user.'" data-width="100px" data-height="24px" data-colorscheme="light" data-layout="button_count" data-show-faces="false"></div></div>';
		        }
		        
		        if ($google_plus_user != '') {
		            $data .=  '<div class="float_left_gp">
		            <div class="g-follow" data-annotation="bubble" data-height="20" data-href="http://plus.google.com/+'.$google_plus_user.'" data-rel="author"></div>
		            
		            </div>';
		        }
				
				
		        $data .= '</div>';
		        $data .= '</div>';
		        
		        $user_data = get_userdata($user_ID);
		        if($user_data->description!=''){
		        	$data .= '<p class="c5-user-description">'.$user_data->description.'</p>';
		        }
		
		return $data;
		
	}
	
	
	function custom_css() {
		
	}
	
	function options() {
		$array = array();
		        $array[] = array(
		            'label' => 'Current Article Authors',
		            'value' => ''
		        );
		        $blogusers = get_users();
		        foreach ($blogusers as $user) {
		            if (count_user_posts($user->ID) > 0) {
		                $array[] = array(
		                    'label' => $user->display_name,
		                    'value' => $user->ID
		                );
		            }
		        }
		
		$this->_options =array(
			
			array(
			    'label' => 'Author',
			    'id' => 'author_id',
			    'type' => 'select',
			    'desc' => 'Choose the Author',
			    'std' => '',
			    'choices' => $array,
			    'rows' => '',
			    'post_type' => '',
			    'taxonomy' => '',
			    'class' => '',
			)
		 
		);
	}
	
	function css() {
		?>
		<style>
		.c5-user-description{
			padding: 15px;
			font-size: 13px;
			background: #eee;
			position: relative;
			display: block;
			margin-bottom:30px;
		}
		.c5-user-description:after{
			width: 0;
			height: 0;
			content: '';
			border-left: 14px solid transparent;
			border-right: 14px solid transparent;
			border-top: 14px solid transparent;
			border-bottom: 14px solid #eee;
			position: absolute;
			display: block;
			top: -28px;
			left: 20px;
			-webkit-transition: all .2s ease;
			-moz-transition: all .2s ease;
			-ms-transition: all .2s ease;
			-o-transition: all .2s ease;
			transition: all .2s ease;
		}
		.c5-author-meta-wrap {
		  position: relative;
		  min-height: 100px;
		  display: block;
		  margin-bottom: 30px;
		}
		.c5-author-meta-wrap .c5-author-img {
		  width: 100px;
		  height: 100px;
		  display: block;
		  position: absolute;
		  top: 0px;
		  left: 0px;
		}
		.c5-author-meta-wrap .list-icon {
		  width: 100px;
		  height: 100px;
		  background: #eee;
		  line-height: 100px;
		  text-align: center;
		  font-size: 40px;
		  display: block;
		  position: absolute;
		  top: 0px;
		  left: 0px;
		}
		.c5-author-meta-wrap .c5-author-data {
		  padding-left: 130px;
		  display: block;
		  position: relative;
		}
		.c5-author-meta-wrap .c5-author-data .fa {
		  margin-right: 5px;
		}
		.c5-author-meta-wrap .url.fn {
		  color: #333;
		  font-size: 16px;
		  margin-bottom: 10px;
		  font-weight: bold;
		}
		
		</style>
		<?php
	}

}


 ?>