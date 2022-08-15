<?php
get_header();

while (have_posts()) {
    the_post();
    pageBanner(['title'=>the_title(),'subtitle'=>'keepup']); ?>
   
    <div class="container container--narrow page-section">
        <div class="metabox metabox--position-up metabox--with-home-link">
            <p>
                <a class="metabox__blog-home-link" href="<?php echo site_url('/blog'); ?>"><i class="fa fa-home" aria-hidden="true"></i> Blog Home </a> <span class="metabox__main"><?php the_title(); ?></span>
            </p>
        </div>
        <div class="generic-content">
            <?php
            //page or post content
            the_content(); ?>
        </div>
        <?php
        $reletedPrograms = get_field('releted_programs');
        if ($reletedPrograms) {
            echo '<hr class="section-break">';
            echo '<h2 class="headline headline-medium">Releted Program(s)</h2>';
            echo '<ul class="link-list min-list">';
            foreach ($reletedPrograms as $program) { ?>
                <li><a href="<?php echo get_the_permalink($program) ?>"><?php echo get_the_title($program) ?></a></li>
        <?php   }
            echo '</ul>';
        } ?>
    </div>
<?php
}


get_footer();
?>