<?php
get_header();
//Determines whether current WordPress query has posts to loop over.
while (have_posts()) {
    the_post(); ?>
    <div class="page-banner">
        <div class="page-banner__bg-image" style="background-image: url(<?= get_theme_file_uri('images/ocean.jpg') ?>)"></div>
        <div class="page-banner__content container container--narrow">
            <h1 class="page-banner__title"><?php the_title(); ?></h1>
            <div class="page-banner__intro">
                <p>Learn how the school of your dreams got started.</p>
            </div>
        </div>
    </div>

    <div class="container container--narrow page-section">

        <?php
        //get the parent id of current page
        $theParent = wp_get_post_parent_id(get_the_ID());
        if ($theParent) { ?>

            <div class="metabox metabox--position-up metabox--with-home-link">
                <p>
                    <a class="metabox__blog-home-link" href="<?= get_permalink($theParent) ?>"><i class="fa fa-home" aria-hidden="true"></i> Back to <?= get_the_title($theParent) ?></a> <span class="metabox__main"><?= get_the_title() ?></span>
                </p>
            </div>
        <?php } ?>

        <!-- this below code does if the current page is not a parent page or child page then dont show the side menu -->
        <?php
        //get the list of child pages "get_pages" ,if didnt found then it will return false or null 
        $testArray = get_pages(array('child_of' => get_the_ID()));
        if ($theParent or $testArray) {
        ?>
            <div class="page-links">
                <h2 class="page-links__title"><a href="<?= get_the_permalink($theParent) ?>">
                <!-- get the title of page get_the_title() -->
                <?= get_the_title($theParent) ?></a></h2>
                <ul class="min-list">
                    <?php
                    if ($theParent) {
                        $findChildrenOf = $theParent;
                    } else {
                        //get_the_ID() return the current page id
                        $findChildrenOf = get_the_ID();
                    }
                    // wp_list_pages() Retrieves or displays a list of pages (or hierarchical post type items) in list (li) format.
                    wp_list_pages(array('title_li' => NULL, 'child_of' => $findChildrenOf));
                    ?>
                </ul>
            </div>
        <?php } ?>

        <div class="generic-content">
            <?php
            //page or post content
            the_content(); ?>
        </div>
    </div>



<?php
}

get_footer();
?>