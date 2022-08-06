<?php

//custom post type we can use in function.php aswlll and from muplugins also

function university_post_types(){
    register_post_type('event',array(
        // 'show_in_rest'=>true,
        'supports'=>array('title','editor','excerpt','custom-fields'),
        'rewrite'=>array('slug'=>'events'),
        'has_archive'=>true,
        'public'=>true,
        'labels'=>array(
            'name'=>'Events',
            'add_new_item'=>'Add New Event',
            'edit_item'=>'Edit Event',
            'all_items'=>'All Events',
            'singular_name'=>'Event'
        ),
        'menu_icon'=>'dashicon-calendar'
    ));

     // program post type
     register_post_type('program',array(
     'supports'=>array('title','editor'),
     'rewrite'=>array('slug'=>'programs'),
     'has_archive'=>true,
     'public'=>true,
     'labels'=>array(
         'name'=>'Programs',
         'add_new_item'=>'Add New Program',
         'edit_item'=>'Edit Program',
         'all_items'=>'All Programs',
         'singular_name'=>'Program'
     ),
     'menu_icon'=>'dashicon-awards'
 ));
}

add_action('init','university_post_types');

?>