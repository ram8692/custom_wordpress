<?php

function pageBanner($args = [])
{
    if (!$args['title']) {
        $args['title'] = get_the_title();
    }

    if (!$args['subtitle']) {
        $args['subtitle'] = get_field('page_banner_subtitle');
    }
    if (!$args['photo']) {
        if (get_field('page_banner_background_image')) {
            $args['photo'] = get_field('page_banner_background_image')['sizes']['pageBanner'];
        } else {
            $args['photo'] = get_theme_file_uri('/images/ocean.jpg');
        }
    }
?>

    <div class="page-banner">
        <div class="page-banner__bg-image" style="background-image: url(<?= $args['photo'] ?>)">
        </div>
        <div class="page-banner__content container container--narrow">
            <h1 class="page-banner__title"><?= $args['title']; ?></h1>
            <div class="page-banner__intro">
                <p><?= $args['subtitle'] ?></p>
            </div>
        </div>
    </div>

<?php }

//adding css and js file 
function university_files()
{
    wp_enqueue_script('main-javascript-files', get_theme_file_uri('/build/index.js'), array('jquery'), '1.0', true);
    wp_enqueue_style('custom-google-fonts', 'https://fonts.googleapis.com/css?family=Roboto+Condensed:300,300i,400,400i,700,700i|Roboto:100,300,400,400i,700,700i');
    wp_enqueue_style('font-awsome', 'https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css');
    wp_enqueue_style('university_main_styles', get_theme_file_uri('/build/style-index.css'));
    wp_enqueue_style('university_extra_styles', get_theme_file_uri('/build/index.css'));
}

add_action('wp_enqueue_scripts', 'university_files');

//add some custom modification like in below case we are setting up the title of page
function university_features()
{

    //registerting the menu in admin ,without this we can see "menu" option under appearence for header
    register_nav_menu('headerMenuLocation', 'Header Menu Location');

    //registerting the menu in admin ,without this we can see "menu" option under appearence for footer
    register_nav_menu('footerLocationOne', 'Footer Location One');
    register_nav_menu('footerLocationTwo', 'Footer Location Two');

    //setting the website title
    add_theme_support('title-tag');

    //below code is used for adding feature images section
    add_theme_support('post-thumbnails');

    //below code is used for creating custom size of images 
    //third param is true because we want excact size if we dont then we set set to false 
    add_image_size('professorLandscape', 400, 260, true);
    add_image_size('professorPortrait', 480, 650, true);
    add_image_size('pageBanner', 1500, 350, true);
}

add_action('after_setup_theme', 'university_features');


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
/***
 * below hook code pre_get_posts and it will apply in backend admin and forntent page  of all post aswell to limit that we have added condition !is_admin() and we have added event post condtion as well and other one 3rd condtion will be url based query only
 */
function university_adjust_queries($query)
{
    if (!is_admin() and is_post_type_archive('program') and $query->is_main_query()) {
        $query->set('orderby', 'meta_value_num');
        $query->set('order', 'ASC');
        $query->set('posts_per_page', -1);
    }

    if (!is_admin() and is_post_type_archive('event') and $query->is_main_query()) {

        /***
         * to limit the pagination
         */
        //$query->set('posts_per_page','1');
        /***
         * below code to filter out past date and sort with asc order by event date
         *
         */
        $query->set('meta_key', 'event_date');
        $query->set('orderby', 'meta_value_num');
        $query->set('order', 'ASC');
        $today = date('Ymd');
        $query->set('meta_query', array(
            array(
                'key' => 'event_date',
                'compare' => '>=',
                'value' => $today,
                'type' => 'numeric'
            )
        ));
    }
}

add_action('pre_get_posts', 'university_adjust_queries');
