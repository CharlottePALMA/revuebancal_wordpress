<?php get_header(); ?>

<div id="content"> 
    <div class="fond-pattern liste-article">
        <div class="wrapper">
            <h1 class="titre-page">Talents</h1>
            <hr class="half-rule">    
            <div class="row">
                    <section class="col-10 col-12-t marg-1 marg-mobile">
                        <div class="row marge-bas row-wrapp wrap">
                        <?php if(have_posts()) : ?><?php while(have_posts()) : the_post(); ?>
                            <article class="bloc-article col-4">
                                <a href="<?php the_permalink(); ?>">
                                    <figure class="redimension">
                                        <?php the_post_thumbnail(); ?>
                                    </figure>
                                </a>
                                    <div class="contenu-article">
                                        <a href="<?php the_permalink(); ?>">
                                            <p class="nom-partenaire"><?php the_title();  ?></p>
                                        </a>
                                        <p><?php the_tags('<span class="mot-cle">','</span><span class="mot-cle">','</span>'); ?></p>
                                    </div>
                                
                            </article>
                        <?php endwhile; 
                        endif; 
                        theme_pagination();
                        ?> 
                        </div>
                    </section>
                </div>
            <section class="formulaire-partenaire">
                <div class="contour">
                    <h1 class="titre-page titre-danspage">Vous êtes artiste ?</h1>
                    <p class="text-form-partenaire">Vous souhaitez nous faire découvrir votre univers artistique, remplissez ce formulaire.</p>
                    <div class="centre">
                        <p class="bouton_part">
                            <a href="<?php echo get_stylesheet_directory_uri(); ?>/formulaire-de-partenariat/" class="a-part">accédez au formulaire</a>
                        </p>
                    </div>
                </div>
            </section>
        </div>
    </div>
    </div>
    
    <?php get_footer(); ?>

    
    
    
</div> </div> </body> </html>