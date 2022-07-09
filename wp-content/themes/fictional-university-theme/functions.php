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

//registerting the menu in admin ,without this we can see "menu" option under appearence for header
register_nav_menu('headerMenuLocation','Header Menu Location');

//registerting the menu in admin ,without this we can see "menu" option under appearence for footer
register_nav_menu('footerLocationOne','Footer Location One');
register_nav_menu('footerLocationTwo','Footer Location Two');

//setting the website title
add_theme_support('title-tag');
}

add_action('after_setup_theme','university_features');


//custom post type we can use in function.php aswlll and from muplugins also

// function university_post_types(){
//     register_post_type('event',array(
//         'public'=>true,
//         'labels'=>array(
//             'name'=>'Events',
//             'add_new_item'=>'Add New Event',
//             'edit_item'=>'Edit Event',
//             'all_items'=>'All Events',
//             'singular_name'=>'Event'
//         ),
//         'menu_icon'=>'dashicon-calendar'
//     ));
// }

// add_action('init','university_post_types');
?>