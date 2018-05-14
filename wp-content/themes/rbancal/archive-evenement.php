<?php get_header(); ?>

<div id="content"> 

    <div class="fond-pattern liste-article">
        <div class="wrapper">
            <h1 class="titre-page">Agenda</h1>
            <div class="row row-wrap wrap ">
                <?php 
                $args = array(
                    'post_type' => 'evenement',
                );
                $my_query = new WP_Query($args);
                
                $une = types_render_field("event_expir", array( 'id' => get_the_ID() ) );
                
                if($my_query->have_posts() && $une == 1) : 
                
                
                
                ?>
                
                <section class="events-expiration col-8 marg-2 marg-1-m col-10-m">
                    <h2>Derniers jours</h2>
                    <div class="event-articles row wrap row-wrapp">
                        
                        <?php while ($my_query->have_posts() ) : $my_query->the_post();
                        if($une == 1){
                        ?>
                        <article class="event-avant col-4">
                            <a href="<?php echo types_render_field("liene", array( 'id' => get_the_ID() ) ); ?>" target="_blank">
                                <p class="date-event"><?php echo types_render_field("date-de-fin", array( 'id' => get_the_ID() ) ); ?></p>
                                <h2><?php the_title(); ?></h2>
                                 <?php
                                    $lieu = types_render_field("lieu", array( 'id' => get_the_ID() ) );
                                            if(!empty($lieu)){ ?>
                                                <p class="event-lieu"><?php echo $lieu; ?></p>
                                                <?php } ?>
                            </a>
                        </article>
                    <?php };
                    endwhile; ?>
                    </div>
                </section>
                <?php
                        endif;
                    theme_pagination();
                    wp_reset_postdata(); ?>
                    
            </div>
            <section class="event-contenu">
               <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
                        <div class="row">
                            <div class="event col-10 marg-1">
                                <a href="<?php echo types_render_field("liene", array( 'id' => get_the_ID() ) ); ?>" target="_blank">
                                        <p class="date-event col-12-s">
                                        <?php
                                            $dateend = types_render_field("date-de-debut", array( 'id' => get_the_ID() ) );
                                            if(!empty($dateend)){ ?>
                                                <br><?php echo $dateend; ?>
                                                <?php } ?>

                                        <?php echo types_render_field("date-de-fin", array( 'id' => get_the_ID() ) ); ?>
                                         
                                        </p>
                                    <div class="col-12-s">    
                                        <h2><?php the_title(); ?></h2>
                                        <?php
                                        $lieu2 = types_render_field("lieu", array( 'id' => get_the_ID() ) );
                                            if(!empty($lieu2)){ ?>
                                                <p class="event-lieu"><?php echo $lieu2; ?></p>
                                                <?php } ?>
                                              
                                    </div>
                                </a>
                            </div>
                        </div>
                <?php  endwhile; ?> <?php endif; ?> 
            </section>
        </div>
    </div>



</div>
    
    <?php get_footer(); ?>

    
    
    
</div> </div> </body> </html>