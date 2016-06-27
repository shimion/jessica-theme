<?php

class C5AB_contact_form extends C5_Widget {

    public $_shortcode_name;
    public $_shortcode_bool = true;
    public $_options = array();

    function __construct() {

        $id_base = 'contact_form-widget';
        $this->_shortcode_name = 'c5ab_contact_form';
        $name = 'Contact us Form';
        $desc = 'Add Contact us Form Box';
        $classes = '';
		
        $this->self_construct($name, $id_base, $desc, $classes);
    }
	
	
	
    function shortcode($atts, $content) {
    	
    	
    	$data = '<form id="c5-contact-form" class="clearfix" method="post" action="">';
    	
    	$data = $data . '<div class="row">';
    	
    	$data = $data . '<div class="col-md-6">
    		<div class="input-wrap"><input type="text" name="name" class="element-block" id="name" placeholder="'.$atts['name'].'" size="20" /><span class="fa fa-user"></span></div>
    		</div>';
    	$data = $data . '<div class="col-md-6">
    		<div class="input-wrap"><input type="text" name="email" class="element-block" id="email" placeholder="'.$atts['your_email'].'" size="20" /><span class="fa fa-envelope"></span></div>
    		</div></div>';
    	$data = $data . '<textarea id="message" placeholder="'.$atts['message'].'" name="message" class="element-block  " tabindex="4" aria-required="true"></textarea>';
    	
    	$data = $data . '<input name="submit" type="submit" id="c5-submit-contact" value="'.$atts['send'].'">';
    	  
    	 
    	$data = $data . '<input type="hidden" name="recieve_email" id="recieve_email" value="'.$atts['email'].'" /><div class="clearfix"></div><div class="message_contact_true alert alert-success"><p>'.$atts['success'].'</p></div><div class="message_contact_false alert alert-warning"><p>'.$atts['fail'].'</p></div></form>';
    	
    		
		return $data;
	}
	
	function custom_css() {
	
		
        
    }

    function options() {
		
		
		
        $this->_options = array(
            array(
                'label' => 'Email to recieve',
                'id' => 'email',
                'type' => 'text',
                'desc' => 'Add Email to recieve.',
                'std' => '',
            ),
            array(
                'label' => 'Name Placeholder',
                'id' => 'name',
                'type' => 'text',
                'desc' => 'Add name placeholder.',
                'std' => 'Name',
            ),
            array(
                'label' => 'Email Placeholder Text',
                'id' => 'your_email',
                'type' => 'text',
                'desc' => 'Add Email  Placeholder text.',
                'std' => 'Subject',
            ),
            array(
                'label' => 'Message Placeholder Text',
                'id' => 'message',
                'type' => 'text',
                'desc' => 'Add Message Placeholder Text.',
                'std' => 'Your message ...',
            ),
            array(
                'label' => 'Send Text',
                'id' => 'send',
                'type' => 'text',
                'desc' => 'Add your Send Button Text.',
                'std' => 'Send',
            ),
            array(
                'label' => 'Succesful Message Text',
                'id' => 'success',
                'type' => 'text',
                'desc' => 'Add your Succesful Message Text.',
                'std' => 'Your Message was sent, Thank you.',
            ),
            array(
                'label' => 'Failure Message Text',
                'id' => 'fail',
                'type' => 'text',
                'desc' => 'Add your Failure Message Text.',
                'std' => 'Your Message was not sent, Please try again.',
            ),
            
         );
    }

    function css() {
        ?>
        <style>
        	#c5-contact-form{
        		padding: 15px 15px 0px;
        		background: #eee;	
        	}
        	.message_contact_true,.message_contact_false{
        		display: none;
        	}
        	.input-wrap {
        	position: relative;
        	display: block;
        	padding-right: 40px;
        	margin-bottom: 10px;
        	}
        	.input-wrap input {
        	display: block;
        	width: 100%;
        	border: none;
        	padding: 12px;
        	}
        	.input-wrap .fa {
        	position: absolute;
        	right: 0px;
        	top: 0px;
        	width: 40px;
        	height: 40px;
        	line-height: 40px;
        	text-align: center;
        	background: #333;
        	color: white;
        	}
        	
        	textarea.element-block{
        		width: 100%;
        		min-height: 150px;
        		padding: 15px;
        		border: none;
        		background: white;
        		margin-bottom: 30px;
        	}
        	
        	#c5-submit-contact {
        	float: right;
        	clear: both;
        	margin-bottom:15px;
        	border: 1px;
        	display: block;
        	padding: 9px 18px;
        	color: white;
        	border-radius: 2px;
        	-webkit-transition: all .2s ease;
        	-moz-transition: all .2s ease;
        	-ms-transition: all .2s ease;
        	-o-transition: all .2s ease;
        	transition: all .2s ease;
        	}
        	#c5-submit-contact:hover{
        		background: #333;
        	}
        	.contact_error{
        		background: #F7B0B0;
        	}
        </style>
        <?php

    }


}

function c5ab_contact_send() {

		add_filter('wp_mail_content_type', create_function('', 'return "text/html";'));

        ob_start();
        bloginfo('name');
        $name = ob_get_contents();
        ob_end_clean();


		$email = $_POST['recieve_email'];
		
		$message = '<p>' . __('Name: ','code125') . $_POST['name'] . '</p>';
        $message .= '<p>' . __('Email: ','code125') . $_POST['email'] . '</p>';
        $message .= '<p>' . __('Message: ','code125') . $_POST['message'] . '</p>';
        $headers = 'From: ' . $name . ' ' . "\r\n";
        wp_mail( $email , $name . ' Contact Page', $message, $headers, '');

        echo 'done';
        die();
}


add_action( 'wp_ajax_c5ab_contact_send', 'c5ab_contact_send' );
add_action( 'wp_ajax_nopriv_c5ab_contact_send', 'c5ab_contact_send' );
?>