<?php get_header(); ?>

<div id="content"> 
    <div class="fond-pattern liste-article">
        <div class="wrapper">
            <h1 class="titre-page">Ouvrages et concours de nouvelles</h1>
            <hr class="half-rule">
        </div>
    </div>
    <div class="wrapper liste-ouvrage">
        <?php if(have_posts()) : ?><?php while(have_posts()) : the_post(); ?>
            <section class="ouvrage row wrapp">
                <div class="ouvrage-gauche col-2 marg-1 col-2-t col-12-m marg-mobile marg-0-t">
                    <div class="row wrap">
                        <div class="col-12">
                            <figure><?php the_post_thumbnail(); ?></figure>  
                        </div>
                        <div class="col-12 catcache-m">
                            <p class="prix">
                        <?php
                        $brochet = types_render_field("prix-broche", array( 'id' => get_the_ID() ) );
                        if(!empty($brochet)){
                        echo "Prix broché : ".$brochet."€"; 
                        } ?>
                        </p>
                        <p class="prix">
                        <?php
                        $epub =  types_render_field("prix-epub", array( 'id' => get_the_ID() ) );
                        if(!empty($epub)){
                        echo "Prix epub : ".$epub."€"; 
                        } ?>
                        </p>
                        </div>
                    </div>
                </div>
                <div class="info-ouvrage col-8 col-10-t col-12-m">
                    <h2><?php the_title();  ?></h2>
                    <p class="ouvrage-auteur"><?php echo types_render_field("auteur", array( 'id' => get_the_ID() ) ); ?></p>
                    <p class="ouvrage-date"><?php echo types_render_field("date-de-l-ouvrage", array( 'id' => get_the_ID() ) ); ?></p>
                    <p class="ouvrage-accroche"><?php echo types_render_field("accroches", array( 'id' => get_the_ID() ) ); ?></p>
                    <p class="ouvrage-contenu"><?php the_content(); ?></p>
                    <div class="col-12 catcache-cache catcache-block">
                        <p class="prix">
                        <?php
                        $brochet = types_render_field("prix-broche", array( 'id' => get_the_ID() ) );
                        if(!empty($brochet)){
                        echo "Prix broché : ".$brochet."€"; 
                        } ?>
                        </p>
                        <p class="prix">
                        <?php
                        $epub =  types_render_field("prix-epub", array( 'id' => get_the_ID() ) );
                        if(!empty($epub)){
                        echo "Prix epub : ".$epub."€"; 
                        } ?>
                        </p>
                    </div>
                    <p class="right">
                        <?php 
                        $lien = types_render_field("lien", array( 'id' => get_the_ID() ) );
                        $nblien = strlen($lien);
                        if($lien != 0){?>
    <a href="<?php echo types_render_field("lien", array( 'id' => get_the_ID() ) ) ?>" class="button-footer">Acheter</a>
                        <?php }else{ ?>
                        <a href="<?php echo get_stylesheet_directory_uri(); ?>/formulaire-de-commande/" class="button-footer">Acheter</a>
    <?php } ?>
                    </p>
                </div>
            </section>
        <?php endwhile;
        endif; 
        theme_pagination();
        ?> 
        </div>
    
</div>
    
    <?php get_footer(); ?>

    
    
    
</div> </div> </body> </html>