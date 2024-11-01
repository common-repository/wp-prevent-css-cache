<?php
/**
 * Plugin Name: WP Prevent CSS Cache
 * Plugin URI: https://eastsidecode.com
 * Description: WordPress plugin to prevent caching your stylesheet during development
 * Version: 1.0
 * Author: Louis Fico
 * Author URI: http://eastsidecode.com
 * License: GPL12
 */

if ( ! defined( 'ABSPATH' ) ) exit;


add_filter( 'style_loader_tag',  'escode_add_stylesheet_timestamp', 10, 4 );

function escode_add_stylesheet_timestamp( $html, $handle, $href, $media ){
    // only look for main stylesheet
    $escodeMainStyleSheet = get_stylesheet_directory_uri() . '/style.css';
    // set up a variable that has the file name with the timeppended
    $escodeStyleWithTime = 'style.css?ver=' . time(); 
     if( strpos( $escodeMainStyleSheet, $href ) !== false  ){
         $html = str_replace('style.css', $escodeStyleWithTime, $html);
    }
    return $html;
}
