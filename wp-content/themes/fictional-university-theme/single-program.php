<?php
get_header();

while (have_posts()) {
    the_post();
    pageBanner(['title'=>the_title(),'subtitle'=>'see what is going in our world']);
    ?>
    <div class="container container--narrow page-section">
        <div class="metabox metabox--position-up metabox--with-home-link">
            <p>
                <a class="metabox__blog-home-link" href="<?php echo site_url('/programs'); ?>"><i class="fa fa-home" aria-hidden="true"></i> Blog Home </a> <span class="metabox__main"><?php the_title(); ?></span>
            </p>
        </div>
        <div class="generic-content">
            <?php
            //page or post content
            the_content(); ?>
        </div>
        <?php

        $reletedProfessors = new WP_Query(array(
            'posts_per_page' => -1,
            'post_type' => 'professor',
            'orderby' => 'title',
            'order' => 'ASC',
            'meta_query' => array(
                array(
                    'key' => 'releted_programs',
                    'compare' => 'LIKE',
                    'value' => '"' . get_the_ID() . '"',
                )
            )
        ));

        if ($reletedProfessors->have_posts()) {
            echo '<hr class="section-break">';
            echo '<h2 class="headline headline--medium">' . get_the_title() . 'Professors </h2>';

            echo '<ul class="professor-cards">';
            while ($reletedProfessors->have_posts()) {
                $reletedProfessors->the_post(); ?>
                <li class="professor-card__list-item">
                    <a href="<?php the_permalink(); ?>" class="professor-card">
                        <img src="<?php the_post_thumbnail_url() ?>" class="professor-card__image" alt="">
                        <span class="professor-card__name"><?php the_title(); ?></span>
                    </a>
                </li>
            <?php }

           
        }

        /**wp_reset_postdata is used for reset post query because if we use multiple query in single page then other query will not work to solve that type of issue we are using below */
        wp_reset_postdata();

        $today = date('Ymd');
        $homePageEvents = new WP_Query(array(
            'posts_per_page' => 2,
            'post_type' => 'event',
            'meta_key' => 'event_date',
            'orderby' => 'meta_value_num',
            'order' => 'ASC',
            'meta_query' => array(
                array(
                    'key' => 'event_date',
                    'compare' => '>=',
                    'value' => $today,
                    'type' => 'numeric'
                ),
                array(
                    'key' => 'releted_programs',
                    'compare' => 'LIKE',
                    'value' => '"' . get_the_ID() . '"',
                )
            )
        ));

        if ($homePageEvents->have_posts()) {
            echo '<hr class="section-break">';
            echo '<h2 class="headline headline--medium"Upcoming>' . get_the_title() . '</h2>';

            while ($homePageEvents->have_posts()) {
                $homePageEvents->the_post();
                get_template_part('template-parts/content-event');
            }
        } ?>

    </div>
<?php
}


get_footer();
?>