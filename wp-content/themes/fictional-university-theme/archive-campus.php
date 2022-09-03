<?php get_header();
pageBanner(['title' => 'All Campuses', 'subtitle' => 'we have several conveniently located campuses']); ?>

<div class="container container--narrow page-section">

    <div class="acf-map">
        <?php
        while (have_posts()) {
            the_post();
            $mapLocation = get_field('map_location');
        ?>
            <div class="marker" data-lat="<?= $mapLocation['lat'] ?>" data-lng="<?= $mapLocation['lng'] ?>">
                <h3><a href="<?= get_the_permalink(); ?>"><?php the_title() ?></a></h3>
                <?= $mapLocation['address'] ?>
            </div>
        <?php } ?>
    </div>



</div>

<?php get_footer(); ?>