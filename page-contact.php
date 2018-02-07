<?php

get_header();

if ( have_posts() ): 
    while ( have_posts() ): the_post();

    ?>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <!-- __() est une fonction d'internationalisation ou l'on doit indiquer la chaine a traduire et le text domain, ici celui du thème enfant-->
                <h2 class="text-center"><?= __('Contact us','busiprofchild') ?></h2>
                <!-- do_shortcode() interprète les eventuels shortcode dans le contenu -->
                <p class="text-justify"><?= do_shortcode(get_the_content()) ?></p>
            </div>
        </div>
    </div>

    <?php
    endwhile;

endif;


get_footer();

?>