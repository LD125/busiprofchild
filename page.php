<?php

get_header();

if ( have_posts() ): 
    while ( have_posts() ): the_post();

    ?>
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <h2><?= get_the_title() ?></h2>
                <p> par <?= get_the_author() ?> le <?= get_the_date() ?></p>
                <p class="text-justify"><?= do_shortcode(get_the_content()) ?></p>
            </div>
            <div class="col-md-4">
                <!-- on récupère le nom de la sidebar du theme parent -->
                <?php dynamic_sidebar('sidebar-primary'); ?>
            </div>
                
        </div>

    </div>

    <?php
    endwhile;

endif;


get_footer();

?>