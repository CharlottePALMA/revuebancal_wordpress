<?php get_header(); ?>

 <div class="fond-pattern liste-article">
        <div class="wrapper">
            <section class="derniers-articles">
                <h1 class="titre-page">Recherche</h1>
                <hr class="half-rule">
                <form method="get" id="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>">
				    <div class="row">
                        <div class="col-6 marg-3 marge-bas2 col-12-t marg-0-t" >
                            <p>
								<input type="text" name="s" id="s" class="research" />
						    </p>
				   		</div>
                    </div>
                    <div class="row">
                        <div class="col-8 marg-2 col-12-t marg-0-t">
                            <div class="row align-vertical centre wrap" >
                                <div class="col-3 col-4-t col-12-m pad-top">
									<input type="radio" name="search" id="revue" value="revue" hidden><label class="pad-droite" for="revue" id="labart">Article</label>
								</div>
                                <div class="col-3 col-4-t col-12-m pad-top">
									<input type="radio" name="search" id="partenaire" value="partenaire" hidden><label class="pad-droite" for="partenaire" id="labpart">Partenaire</label>
								</div>
                                <div class="col-3 col-4-t col-12-m pad-top">
									<input type="radio" name="search" id="ouvrage" value="ouvrage" hidden><label class="pad-droite" for="ouvrage" id="labouvr">Ouvrage</label>
								</div>
								<div class="col-3 col-12-t">
									<input type="submit" class="button droite button-recherche" name="submit" id="searchsubmit" value="RECHERCHER" />
								</div>
                            </div>
                        </div>
                    </div>
				</form>
                <div class="row" id="resultats">
                    <section class="col-7 col-12-t marg-1 marg-0-t marg-mobile">
                        <div class="row marge-bas row-wrap wrap">
			                <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); 
								if ( get_post_type() == 'revue' ) {
									if ($_GET['search'] == "revue" || !isset($_GET['search'])) { ?>
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
								<?php
									}
								}
								if ( get_post_type() == 'partenaire' ) {
									if ($_GET['search'] == "partenaire" || !isset($_GET['search'])) { ?>
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
								<?php 
									}
								}
								if ( get_post_type() == 'ouvrage' ) { 
									if ($_GET['search'] == "ouvrage" || !isset($_GET['search'])) { ?>
									<article class="bloc-article col-4 contenu-ouvrage">
			                            <a href="listeouvrage.php">
			                                <figure class="align-bloc img-bloc-image">
			                                    <?php the_post_thumbnail(); ?>
			                                </figure>
			                                <div class="align-bloc decal-droite">
			                                    <h1 class="titre-article titre-blocouvrage"><?php the_title();  ?></h1>
			                                    <p class="auteur-ouvrage"><?php echo types_render_field("auteur", array( 'id' => get_the_ID() ) ); ?></p>
			                                    <p class="date-article"><?php echo types_render_field("date-de-l-ouvrage", array( 'id' => get_the_ID() ) ); ?></p>
			                                    <p class="prix">Broché : <?php echo types_render_field("prix-broche", array( 'id' => get_the_ID() ) ); ?>€
			                                            <br>E-Pub : <?php echo types_render_field("prix-epub", array( 'id' => get_the_ID() ) ); ?>€</p>
			                                </div>
			                                <div class="accroche-article">
			                                    <?php echo types_render_field("accroches", array( 'id' => get_the_ID() ) ); ?>
			                                </div>
			                            </a>
			                        </article>
								<?php 
									}
								}

							endwhile; 
							else: 
							?>
			                	<p>Il n'y a pas de résutats pour cette recherche.</p>

							<?php 
							 
							endif; ?>
                            
                            
						</div>
                        <?php 
							pagination($wp_query); ?>
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
				</div>
            </section>
        </div>
    </div>
    
</div>
    
    <?php get_footer(); ?>

    
    
    
</div> </div> </body> </html>