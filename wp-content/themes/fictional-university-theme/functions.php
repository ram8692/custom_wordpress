<?php

//adding css and js file 
function university_files(){
wp_enqueue_script('main-javascript-files',get_theme_file_uri('/build/index.js'),array('jquery'),'1.0',true);
wp_enqueue_style('custom-google-fonts','https://fonts.googleapis.com/css?family=Roboto+Condensed:300,300i,400,400i,700,700i|Roboto:100,300,400,400i,700,700i');
wp_enqueue_style('font-awsome','https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css');
wp_enqueue_style('university_main_styles',get_theme_file_uri('/build/style-index.css'));
wp_enqueue_style('university_extra_styles',get_theme_file_uri('/build/index.css'));
}

add_action('wp_enqueue_scripts','university_files');

//add some custom modification like in below case we are setting up the title of page
function university_features(){

    // The feature being added. Likely core values include:

    // 'admin-bar'
    // 'align-wide'
    // 'automatic-feed-links'
    // 'core-block-patterns'
    // 'custom-background'
    // 'custom-header'
    // 'custom-line-height'
    // 'custom-logo'
    // 'customize-selective-refresh-widgets'
    // 'custom-spacing'
    // 'custom-units'
    // 'dark-editor-style'
    // 'disable-custom-colors'
    // 'disable-custom-font-sizes'

add_theme_support('title-tag');
}

add_action('after_setup_theme','university_features');

?>