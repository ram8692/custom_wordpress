<?php
get_header();

while (have_posts()) {
    the_post(); ?>
    <div class="page-banner">
        <div class="page-banner__bg-image" style="background-image: url(<?= get_theme_file_uri('images/ocean.jpg') ?>)"></div>
        <div class="page-banner__content container container--narrow">
            <h1 class="page-banner__title"><?php the_title(); ?></h1>
            <div class="page-banner__intro">
                <p>see what is going in our world</p>
            </div>
        </div>
    </div>

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
                $homePageEvents->the_post(); ?>
                <div class="event-summary">
                    <a class="event-summary__date t-center" href="#">
                        <span class="event-summary__month"><?php //the_time('M')
                                                            //the_field('event_date');
                                                            $eventDate = new DateTime(get_field('event_date'));
                                                            echo $eventDate->format('M');
                                                            ?></span>
                        <span class="event-summary__day"><?php //the_time('d')
                                                            echo $eventDate->format('d') ?></span>
                    </a>
                    <div class="event-summary__content">
                        <h5 class="event-summary__title headline headline--tiny"><a href="<?php the_permalink(); ?>"><?php the_title() ?></a></h5>
                        <p><?php if (has_excerpt()) {
                                echo get_the_excerpt();
                            } else {
                                echo wp_trim_words(get_the_content(), 18);
                            } ?><a href="<?php the_permalink(); ?>" class="nu gray">Learn more</a></p>
                    </div>
                </div>
        <?php }
        } ?>

    </div>
<?php
}


get_footer();
?>