<?php get_header(); ?>



<div id="content"> 
    
<div class="fond-pattern">
        <div class="wrapper">
            <div class="col-12">
                <section class="slider">
                   <ul class="bxslider">       
                       <?php 
                        $argssli = array(
                            'post_type' => 'slide',
                        );
                        $my_query = new WP_Query($argssli);
                        if($my_query->have_posts()) : while ($my_query->have_posts() ) : $my_query->the_post(); 
                        ?>
                        <li>
                            <a href="<?php echo types_render_field("lienslide", array( 'id' => get_the_ID() ) ); ?>" target="_blank">
                                <?php 
                                $img = get_the_post_thumbnail_url();
                                ?>
                                <img src="<?php echo $img; ?>" class="carrousel">
                            </a>
                        </li>
                      <?php 
                        endwhile;
                        endif;
                        wp_reset_postdata(); ?>
				    </ul>
        		</section>
            </div>
            <section class="derniers-articles">
                <h1 class="titre-page">Notre sélection culturelle</h1>
                <hr class="half-rule">
                <div class="row marg-da wrap2">
                    <?php 
                        $args = array(
                            'post_type' => 'revue',
                            'numberposts' => 2,
                        );
                        $postslist = get_posts( $args );
                        $a = 1;
                        foreach ($postslist as $post) :  setup_postdata($post);
                    ?>
                        <article class="bloc-article col-4 col-5-t col-12-m mar marg-bas marg-mobile
                        <?php 
                            if($a%2 == 0){

                            }else{
                                echo "marg-2 marg-1-t";
                            }
                        ?>">
                                <p class="categorie"><?php the_category('name'); ?></p>
                                <a href="<?php the_permalink(); ?>">
                                    <figure><?php the_post_thumbnail(); ?></figure>
                                </a>
                                    <div class="contenu-article">
                                        <p class="date-article"><?php $date = get_the_date();
                                            echo $date;
                                           ?></p>
                                        <a href="<?php the_permalink(); ?>">
                                            <p class="titre-article"><?php the_title(); ?></p>
                                        </a>
                                        <div class="accroche-article"><?php 

                                        $accroche =  types_render_field("accroche_article", array( 'id' => get_the_ID() ) ); 

                                        if(strlen ($accroche) > 220){
                                            echo substr($accroche, 0, 220) . "...";
                                        }else{
                                            echo $accroche; 
                                        };
                                        ?></div>
                                        <p><?php the_tags('<span class="mot-cle">','</span><span class="mot-cle">','</span>'); ?></p>
                                    </div>
                                
                            </article>
                    <?php
                        $a = $a+1;
                         endforeach;
                    wp_reset_postdata(); ?>

                </div>
                <p class="pbtn"><a href="<?php echo get_bloginfo( 'url' ); ?>/revue" class="button">Plus d'articles</a></p>
            </section>
        </div>
    </div>
    <div class="fond-newsletter" style="background-image:url(<?php echo get_stylesheet_directory_uri(); ?>/images/newsletter.png)">
        <div class="wrapper">
            <section class="newsletter">
                    <h1 class="titre-page-news">Newsletter</h1>
                    <hr class="half-rule">
                    <p>Inscrivez-vous à notre newsletter pour recevoir chaque semaine notre sélection culturelle</p>
                    <?php echo do_shortcode('[mc4wp_form id="119"]'); ?>
            </section>
        </div>
    </div>
    
    <div class="presen">
        <div class="wrapper"> 
            <section class="presentation row wrap">
                <?php 
                    $args = array(
                        'post_type' => 'contenu',
                    );
                    $my_query = new WP_Query($args);
                    if($my_query->have_posts()) : while ($my_query->have_posts() ) : $my_query->the_post(); ?>
                <div class="col-4 col-12-m pres">
                    <a href="<?php 
                    echo types_render_field("liencontent", array( 'id' => get_the_ID() ) );
                    ?>">
                        <figure><img src="<?php the_post_thumbnail_url(); ?>" ></figure>
                        <h2><?php the_title(); ?>
                            </h2>
                        <p><?php the_content(); ?></p>
                    </a>
                </div>
                <?php 
                        endwhile;
                        endif;
                        wp_reset_postdata(); ?>
            </section>
        </div>
    </div>
    
    
</div>
<?php get_footer(); ?>


</div> </div> </body> </html>
