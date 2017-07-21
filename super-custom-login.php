<?php
/*
Plugin Name: Super Custom Login
Plugin URI: http://middleearmedia.com/labs/plugins/super-custom-login/
Description: Customize your login screen. Replace the WordPress logo with your custom logo and make it link to your homepage. Enhance security by removing error messages upon failed login attempts. A template file for your logo is included.
Version: 0.7
License: GPLv2 or later
Author: Obadiah Metivier
Author URI: http://middleearmedia.com/
*/


// Displays a custom logo on login screen.
function custom_login_logo() {
   echo '<style type="text/css">
       h1 a { background-image:url('.get_bloginfo('stylesheet_directory').'/images/login_logo.png) !important; background-size: 328px 84px !important; height: 84px !important; width: 328px !important; }   
   </style>';
}
add_action('login_head', 'custom_login_logo');

// Custom Login Screen links
function change_wp_login_url() {
return get_bloginfo('url');
}

function change_wp_login_title() {
echo get_option('blogname');
}

add_filter('login_headerurl', 'change_wp_login_url');
add_filter('login_headertitle', 'change_wp_login_title');

// remove error messages on failed log-ins
add_filter('login_errors',create_function('$a', "return null;"));
?>