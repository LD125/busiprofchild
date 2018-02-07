<?php
get_header();

if ( have_posts() ):

    while ( have_posts() ):
        
        the_post();


    ?>
    <!-- ZONE WIDGET PERSO -->

    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">
                <?php /* je positionne la zone de widget */ dynamic_sidebar('sidebar-perso'); ?>
            </div>
        </div>
    </div>




    <!--ZONE 1 -->
    <div class="container">
        <div class="row carousel-holder">
            <div class="col-md-12">
                <!-- <h1><?= get_the_title(); ?></h1> <!-- equivalent get_the_title() => the_title() -->
                <?php
                
                // je récupère le champ ACF avec son nom

                $slides = array();
                $slides[] = get_field('slide1');
                $slides[] = get_field('slide2');
                $slides[] = get_field('slide3');
                // si j'ajoute un champ slide4 j'aurais seulement à ajouter
                // $slides[] = get_field('slide4');
                
                ?>
                <div id="carousel-star" class="carousel slide" data-ride="carousel">
                        <!-- les petits ronds -->
                        <ol class="carousel-indicators">
                            <?php foreach( $slides as $index => $image ) :  ?>
                            <li data-target="#carousel-star" data-slide-to="<?= $index ?>" <?= ( $index == 0) ? 'class="active"' : '' ?>></li>
                        <?php endforeach; ?>
                        </ol>
                        <!-- les images -->
                        <div class="carousel-inner">
                            <?php foreach ( $slides as $index => $image ) : ?>
                            <div class="item <?= ( $index == 0 ) ? 'active' : '' ?>">
                                <img src="<?= $slides[$index]['url'] ?>" class="slide-image" alt="<$= $image['alt'] ?>">
                            </div>
                            <?php endforeach ?>
                        </div>
                        <a class="left carousel-control" href="#carousel-star" data-slide="prev">
                            <span class="fa fa-chevron-left"></span>
                        </a>
                        <a class="right carousel-control" href="#carousel-star" data-slide="next">
                            <span class="fa fa-chevron-right"></span>
                        </a>

                
                </div>
  
            </div>
        </div>
    </div>

    <!-- ZONE 2 -->
        <?php
        $p1 = get_field('text_haut_gauche');
        $p2 = get_field('text_haut_droite');
        ?>
        <div class="container">
            <div class="row">
                <div class="col-md-6 text-justify"><?= $p1 ?></div>
                <div class="col-md-6 text-justify"><?= $p2 ?></div>
            </div>
        </div>

    <!-- ZONE 3 -->    
        <?php
        $img_parallaxe = get_field('image_parallaxe');
        $hauteur = get_field('hauteur_parallaxe');
        ?>
        <div class="container-fluid"> 
            <div class="row">
                <div class="img_parallaxe" style="background: url(<?= $img_parallaxe['url'] ?>); height:<?= $hauteur ?>px;"></div>
            </div>
        </div>
    <!-- ZONE 4 -->
    <?php
    $p3 = get_field('texte_central');
    ?>
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-justify">
                <?= $p3 ?>
            </div>
        </div>
    </div>
    <!-- ZONE 5 -->
    <?php
    $vignettes = array();
    $vignettes[] = get_field('vignette1');
    $vignettes[] = get_field('vignette2');
    $vignettes[] = get_field('vignette3');
    $vignettes[] = get_field('vignette4');
        // on calcule la class bootstrap (3,4,6)
    $col = 12 / ( count($vignettes) );
    ?>
    <div class="container">
        <div class="row">
            <?php foreach ( $vignettes as $vignette) : ?>
            <div class="col-md-<?= $col ?>">
                <div class="thumbnail">
                <img src="<?= $vignette['url'] ?>" alt="<?= $vignette['alt'] ?>">
                <div class="caption">
                    <!-- on exploite la légende du média -->
                    <?= $vignette['caption'] ?>
                </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>


    <!-- ZONE 6 NEWSLETTER -->
    <?php
    $form = do_shortcode(get_field('bloc_newsletter'))  ;
    ?>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div><?= $form ?></div>
            </div>
        </div>
    </div>

    <?php
    endwhile;

endif;

get_footer();

?>