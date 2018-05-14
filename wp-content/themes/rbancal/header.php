<!DOCTYPE html>
<html lang="fr">
	<head>
        <title><?php
 if ( is_search() ) :
 echo 'Résultats de recherche pour "'.get_search_query().'" | ';
 
 else :
 wp_title('|', true, 'right');
 endif;

 bloginfo('name'); 
?></title>
        <meta name="viewport" content="initial-scale=1.0,width=device-width" />
        <meta charset="utf-8">
        <link href="<?php bloginfo('stylesheet_url'); ?>" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Noto+Serif" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
        <link rel="icon" href="<?php echo get_stylesheet_directory_uri(); ?>/images/Favicon.png" type="image/png" sizes="16x16">
<?php wp_enqueue_script( 'jquery'); ?>
        <script src="<?php bloginfo( 'template_url' ); ?>/js/jquery.js"></script>
        <script src="<?php bloginfo( 'template_url' ); ?>/js/codejs.js"></script>
        <script src="<?php bloginfo( 'template_url' ); ?>/js/jquery.bxslider.min.js"></script>
        <script src="<?php bloginfo( 'template_url' ); ?>/js/jquery.easing.1.3.js"></script>
        <script src="<?php bloginfo( 'template_url' ); ?>/js/jquery.fitvids.js"></script>
        <script type="text/javascript">
            $(document).ready(function(){ 
                $('.bxslider').bxSlider({
                    auto: true,
                    controls: false,
                    default: 1000,
                    nextSelector: '#slider-next',
                    prevSelector: '#slider-prev',
                    nextText: 'Onward →',
                    prevText: '← Go back'
                }); 
            });
		</script> 
    </head>
<body>
    
    <div id="header">
    <header class="header-top-revu">
        <div class="wrapper">
            <button class="bbresp burger"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/burger.png" ></button>
            <ul>
                <li><a href="<?php echo get_bloginfo( 'url' ); ?>/revue">Revue</a>
                    <ul class="sous_liste">
                        <?php wp_list_cats('all'); ?>
                    </ul>
                </li>
                <li><a href="<?php echo get_bloginfo( 'url' ); ?>/ouvrage">édition</a></li>
                <li><a href="<?php echo get_bloginfo( 'url' ); ?>/partenaire">Talents</a></li>
                <li><a href="<?php echo get_bloginfo( 'url' ); ?>/a-propos">à propos</a></li>
                <li class="cacher">
                    <a href="<?php echo get_bloginfo( 'url' ); ?>/evenement/">Agenda</a>
                    <ul class="liste_agenda listeagenda">
                        <?php 
                        $args = array(
                        'post_type' => 'evenement',
                        );
                        $my_query = new WP_Query($args);
                        if($my_query->have_posts()) : while ($my_query->have_posts() ) : $my_query->the_post();
                        ?>
                        <li>
                            <a href="<?php echo types_render_field("liene", array( 'id' => get_the_ID() ) ); ?>" target="_blank">
                                <div class="date-event-moment agenda-ouvert"><p><?php echo types_render_field("date-de-fin", array( 'id' => get_the_ID() ) ); ?></p></div>
                                <div class="infos-event-moment agenda-ouvert"><p><?php the_title(); ?></p></div>
                            </a>
                        </li>
                      <?php
                        endwhile;
                        endif;
                        wp_reset_postdata(); ?>
                    </ul>
                </li>
            </ul>
            <form method="get" id="searchform" action="<?php bloginfo('home'); ?>/">
                <ul class="openul2">
                    <li>
                        <input id="s" class="rechercher cache" type="text" name="s" placeholder="Votre recherche" value="<?php the_search_query(); ?>">
                    </li>
                    <li><a href="#" class="icone visible" id="recherche"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/rechercher.png" class="arecherche"></a></li>
                    <li class="cache valider icomarge">
                        <input type="submit" id="searchsubmit" value="Chercher" class="icone recherche2" style="background-image: url(<?php echo get_stylesheet_directory_uri(); ?>/images/rechercher.png);"/>
                    </li>
                    <li><a href="https://www.facebook.com/revuebancal" target="_blank" class="icone facebook"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/facebook.png" class="afacebook"></a></li>
                    <li><a href="https://twitter.com/revuebancal" target="_blank" class="icone twitter"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/twitter.png" class="atwitter"></a></li>
                    <li><a href="https://www.instagram.com/revuebancal/" target="_blank" class="icone instagram"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/instagram.png" class="ainsta"></a></li>
                    
                    
                </ul>
                <input type="checkbox" name="c1" value="article" checked hidden>
                <input type="checkbox" name="c2" value="partenaire" checked hidden>
                <input type="checkbox" name="c3" value="ouvrage" checked hidden>
            </form>
            <h1><a href="<?php bloginfo('url'); ?>">
                <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/bancal.png" alt="logo" />
            </a></h1>
        </div>
    </header>
</div>
    
<div class="wrapper categories catcache">
        <ul>
                <?php wp_list_cats('all'); ?>  
            <li class="droite li-agenda">
                <a href="<?php echo get_bloginfo( 'url' ); ?>/evenement/" id="agenda">Agenda</a>
                 <ul class="liste_agenda listeagenda">
                     <?php 
                        $args = array(
                        'post_type' => 'evenement',
                        );
                        $my_query = new WP_Query($args);
                        if($my_query->have_posts()) : while ($my_query->have_posts() ) : $my_query->the_post();
                        ?>
                        <li>
                            <a href="<?php echo types_render_field("liene", array( 'id' => get_the_ID() ) ); ?>" target="_blank">
                                <div class="date-event-moment agenda-ouvert"><p><?php echo types_render_field("date-de-fin", array( 'id' => get_the_ID() ) ); ?></p></div>
                                <div class="infos-event-moment agenda-ouvert"><p><?php the_title(); ?></p></div>
                            </a>
                        </li>
                      <?php
                        endwhile;
                        endif;
                        wp_reset_postdata(); ?>
                    </ul>
            </li>
        </ul>
    </div>

	
<div id="page">