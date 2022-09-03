<?php
get_header();

while (have_posts()) {
    the_post();
    pageBanner(['title' => the_title(), 'subtitle' => 'see what is going in our world']);
?>
    <div class="container container--narrow page-section">
        <div class="metabox metabox--position-up metabox--with-home-link">
            <p>
                <a class="metabox__blog-home-link" href="<?php echo site_url('/campuses'); ?>"><i class="fa fa-home" aria-hidden="true"></i> All campuses </a> <span class="metabox__main"><?php the_title(); ?></span>
            </p>
        </div>
        <div class="generic-content">
            <?php
            //page or post content
            the_content(); ?>
        </div>

        <div class="acf-map">
            <?php
           
                $mapLocation = get_field('map_location');
            ?>
                <div class="marker" data-lat="<?= $mapLocation['lat'] ?>" data-lng="<?= $mapLocation['lng'] ?>">
                    <h3><?php the_title() ?></h3>
                    <?= $mapLocation['address'] ?>
                </div>
            
        </div>

        <?php

        $reletedPrograms = new WP_Query(array(
            'posts_per_page' => -1,
            'post_type' => 'program',
            'orderby' => 'title',
            'order' => 'ASC',
            'meta_query' => array(
                array(
                    'key' => 'releted_campuses',
                    'compare' => 'LIKE',
                    'value' => '"' . get_the_ID() . '"',
                )
            )
        ));

        if ($reletedPrograms->have_posts()) {
            echo '<hr class="section-break">';
            echo '<h2 class="headline headline--medium">Programs available at this campus</h2>';

            echo '<ul class="min-list link-list">';
            while ($reletedPrograms->have_posts()) {
                $reletedPrograms->the_post(); ?>
                <li>
                    <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                </li>
        <?php }
        }

        /**wp_reset_postdata is used for reset post query because if we use multiple query in single page then other query will not work to solve that type of issue we are using below */
        wp_reset_postdata();

       
        
        ?>

    </div>
<?php
}


get_footer();
?>