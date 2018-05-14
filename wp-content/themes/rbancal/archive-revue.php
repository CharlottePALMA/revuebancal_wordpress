<?php get_header(); ?>

<div id="content"> 
    
<div class="fond-pattern liste-article">
        <div class="wrapper">
            <section class="derniers-articles">
                <h1 class="titre-page">Notre sélection culturelle</h1>
                <hr class="half-rule">
                <div class="row">
                    <section class="col-7 col-12-t marg-1 marg-mobile">
                        <div class="row marge-bas row-wrap wrap">
                        <?php if(have_posts()) : ?><?php while(have_posts()) : the_post(); ?>
                            <article class="bloc-article col-4">
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
                                        	echo substr($accroche, 0, 200) . "...";
                                        }else{
                                        	echo $accroche; 
                                        };
                                        ?></div>
                                        <p><?php the_tags('<span class="mot-cle">','</span><span class="mot-cle">','</span>'); ?></p>
                                    </div>
                                
                            </article>
                        <?php endwhile; 
                        endif; 
                        theme_pagination();
                        ?> 
                        </div>
                    </section>
                    <section class="col-3 bloc-droite widget">
                        <?php 
                                $arg = array(
                                    'post_type' => 'revue',
                                );
                                $my_query = new WP_Query($arg);
                                
                                $une = types_render_field("article_une", array( 'id' => get_the_ID() ) );
                        
                                if($my_query->have_posts() && $une == 1) :
                        ?>
                        <section class="dernier-article bloc-liste">
				            <h2>Notre sélection culturelle</h2>
                            <?php  while ($my_query->have_posts() ) : $my_query->the_post();
                            
                            
                                    if($une == 1){ ?>
                                <p><a href="<?php the_permalink(); ?>" class="bloc-derniers-articles"><?php the_title(); ?></a></p>
                             <?php };
                                endwhile; ?>
                            </section>
                            <?php
                                endif; 
                                wp_reset_postdata();
                            ?> 
					   
					   <section class="bloc-newsletter" style="background-image:url(<?php echo get_stylesheet_directory_uri(); ?>/images/newsletter.png)">
                           <h2>Newsletter</h2>
                           <p class="description-news">Inscrivez-vous à notre newsletter pour recevoir chaque semaine notre sélection culturelle</p>
                               <?php echo do_shortcode('[mc4wp_form id="119"]'); ?>
                        </section>
					   <section class="bloc-facebook">
                           <h2>Facebook</h2>
                           <iframe src="https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fwww.facebook.com%2Frevuebancal&tabs=timeline&width=264&height=70&small_header=false&adapt_container_width=true&hide_cover=false&show_facepile=true&appId" width="264" height="130" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true"></iframe>
					   </section>
                    </section>
                </div>
            </section>
        </div>
    </div>
    
</div>
    
    <?php get_footer(); ?>

    
    
    
</div> </div> </body> </html>