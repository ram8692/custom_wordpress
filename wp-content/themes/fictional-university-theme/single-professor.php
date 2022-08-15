<?php
get_header();

while (have_posts()) {
    the_post();pageBanner(); ?>
    

    <div class="container container--narrow page-section">

        <div class="generic-content">
            <div class="row group">
                <div class="one-third">
                    <?php

                    // below code is responsible for dfisplaying feature image
                    the_post_thumbnail('professorLandscape');

                    ?>
                </div>
                <div class="one-thirds">
                    <?php //page or post content
                    the_content(); ?>
                </div>
            </div>

        </div>
        <?php
        $reletedPrograms = get_field('releted_programs');
        if ($reletedPrograms) {
            echo '<hr class="section-break">';
            echo '<h2 class="headline headline-medium">Subject(s) Taught</h2>';
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