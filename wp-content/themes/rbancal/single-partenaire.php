<?php get_header(); ?>
<div id="content"> 

    
    <div class="fond-noir-partenaire">  
        <div class="fond-partenaire">
            <img class="fond-part" src="<?php echo get_stylesheet_directory_uri(); ?>/images/partenaire.png">
            <div class="wrapper row no-padding">
                <div class="marg-1 col-10 haut-partenaire col-12-t marg-0-t">
                    <figure class="image_avant"><?php 
if ( have_posts() ) {
the_post_thumbnail(); ?></figure>
                    <div class="info-partenaire">
                        <h1><?php the_title(); ?></h1>
                        <div class="partenaire-accroche"><?php echo types_render_field("accrochep", array( 'id' => get_the_ID() ) ); ?></div>
                    <p><?php the_tags('<span class="mot-cle">','</span><span class="mot-cle">','</span>'); ?></p>
                    </div>
                    <?php 
$lien_facebook = types_render_field("lien-facebook", array( 'id' => get_the_ID() ) );
$lien_twitter = types_render_field("lien-twitter", array( 'id' => get_the_ID() ) );
$lien_instagram = types_render_field("lien-instagram", array( 'id' => get_the_ID() ) );
$lien_soundcloud = types_render_field("lien-soundcloud", array( 'id' => get_the_ID() ) );
$lien_youtube = types_render_field("lien-youtube", array( 'id' => get_the_ID() ) );
$lien_email = types_render_field("email", array( 'id' => get_the_ID() ) );
    $lenghtf = strlen ($lien_facebook);
    $lenghtt = strlen ($lien_twitter);
    $lenghti = strlen ($lien_instagram);
    $lenghts = strlen ($lien_soundcloud);
    $lenghty = strlen ($lien_youtube);
    $lenghtm = strlen ($lien_email);

if($lenghtf > 0 AND $lenghtt > 0 AND $lenghti > 0 AND $lenghts > 0 AND $lenghty > 0 AND $lenghtm > 0){
                    }else{ ?>
                    <div class="artiste-reseau widget">
                        <p>Retrouvez l'artiste sur :</p>
                        <ul>
                            <?php 
                            if($lenghtf > 0){?>
                                <li><a href="<?php $lien_facebook ?>">Facebook</a></li>
                            <?php } ?>
                            <?php 
                            if($lenghtt > 0){?>
                                <li><a href="<?php $lien_twitter ?>">Twitter</a></li>
                            <?php } ?>
                            <?php 
                            if($lenghti > 0){?>
                                <li><a href="<?php $lien_instagram ?>">Instagram</a></li>
                            <?php } ?>
                            <?php 
                            if($lenghts > 0){?>
                                <li><a href="<?php $lien_soundcloud ?>">Soundcloud</a></li>
                            <?php } ?>
                            <?php 
                            $lenghty = strlen ($lien_youtube);
                            if($lenghty > 0){?>
                                <li><a href="<?php $lien_youtube ?>">Youtube</a></li>
                            <?php } ?>
                            <?php 
                            if($lenghtm > 0){?>
                                <li><a href="mailto:<?php $lien_email ?>" class="rs mail"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/mail.png"></a></li>
                            <?php } ?>
                        </ul>
                    </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
    <div class="fond-pattern">
        <div class="wrapper row">
            <section class="marg-1 col-10 marg-mobile col-12-m">
                <div class="fond-blanc padding-partenaire">
                <div class="article-contenu">
                    <p>
                        <?php 
$actu = types_render_field("contenus-actu", array( 'id' => get_the_ID() ) );
$projet = types_render_field("contenus-projet", array( 'id' => get_the_ID() ) );
the_content();
?>
                        <?php 
                            the_post();
$bio = get_the_content();
                            $lenghtb = strlen ($bio); 
                            if($lenghtb > 0){ ?>
                            <h2>Biographie</h2>
                            <?php the_content();
                             } } ?>
                    
                    
                        <?php 
                            $lenghta = strlen ($actu);
                            if($lenghta > 0){ ?>
                            <h2>Actu</h2>
                            <?php echo $actu;
                         } ?>
                        <?php 
                            $lenghtp = strlen ($projet);
                                if($lenghtp > 0){ ?>
                            <h2>Projet</h2>
                            <?php echo $projet;
                        } ?>
                    </p>
                </div>
                </div>    
            </section>
        </div>
        <div class="wrapper">
            <section class="formulaire-partenaire">
                <div class="contour">
                    <h1 class="titre-page titre-danspage">Vous êtes artiste ?</h1>
                    <p class="text-form-partenaire">Vous souhaitez nous faire découvrir votre univers artistiques, remplissez ce formulaire.</p>
                    <div class="centre">
                        <p class="bouton_part">
                            <a href="<?php echo get_stylesheet_directory_uri(); ?>/formulaire-de-partenariat/" class="a-part">accéder au formulaire</a>
                        </p>
                    </div>
                </div>
            </section>
        </div>
    </div>



</div>
<?php get_footer(); ?>


</div> </div> </body> </html>
