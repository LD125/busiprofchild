<footer>
    <div class="container">
        <div class="row">
            <div class="col-md-12 menufooter">
            <?php
            // j'affiche le menufooter qui est dans la zone déclarée dans functions

            /*
            printf
            $s => string
            $f => float
            $d => integer

            $language = 'PHP';
            printf("Etude de language %s",$language);

            $arg1="premier";
            $arg2="deuxieme";

            printf("Mon %s et mon %s",$arg1,$arg2);

            $num = 5;
            $location = 'bananier';

            echo sprintf('Il y a %d singes dans le %s',$num,$location);


            items_wrap
            %1 => id
            %2 => class
            %3 => élements (li)
            $s => string (cf. printf())
            */
                wp_nav_menu( array(
                    'menu' => 'menufooter',
                    'menu_class' => 'nav nav-pills nav-jstified',
                    'item-wrap' => '<ul class="%2$s">%3$s</ul>'
                ));
            ?>
            </div>
        </div>
    </div>

<div class="container-fluid">
    <div class="row">
        <div class="col-md-12 text-center monfooter">
            <p>&copy; Copyright <?= date('Y/m') ?> - Lounis - Tous droits réservés</p>
        </div>
    </div>
</div>
</footer>
<?php
wp_footer();
?>