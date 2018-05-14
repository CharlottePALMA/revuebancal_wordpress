<?php get_header(); ?>
<div id="content"> 

<div class="fond-pattern">
       <div class="wrapper article-image">
           <figure><?php the_post_thumbnail(); ?></figure>
           <div class="marg-1 col-10 col-12-t">
               <div class="infos-partenaire">
                   <h1><?php the_title(); ?></h1>
                   <p class="article-date"><?php 
                        $date = get_the_date();
                        echo $date;
                    ?></p>
                   <p class="article-accroche"><?php 
                       $accrochevar = types_render_field("accroche_article", array( 'id' => get_the_ID() ) );
                       $accrochevar2 = substr($accrochevar, 3);
                       echo $accrochevar2; ?></p>
                   <p><?php the_tags('<span class="mot-cle">','</span><span class="mot-cle">','</span>'); ?></p>
               </div>
           </div>
       </div>
        <div class="wrapper row wrap">
            <section class="marg-1 col-7 col-10-t col-12-m marg-mobile">
                <div class="fond-blanc">
                <div class="article-contenu">
                    <p><?php the_post(); the_content(); ?></p>
                </div>
                <div class="informations-complementaires">
                    <ul class="partage">
                        <li><a href="http://www.facebook.com/sharer.php?u=<?php echo $_SERVER['SCRIPT_URI'] ?>" target="_blank" class="facebook gauche"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/facebook.png"></a></li>
                        <li><a href="https://twitter.com/share?url=<?php echo $_SERVER['SCRIPT_URI'] ?>" target="_blank" class="twitter gauche"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/twitter.png"></a></li>
                        <li><a href="mailto:?subject=Article de la Revue Bancal&body=<?php the_title(); ?>" class="mail gauche"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/mail.png"></a></li> 
                    </ul>
                    
                    
                    <div class="bloc-auteur">
                        <figure><?php echo get_avatar( get_the_author_id(), $size = ’80’ ); ?></figure>
                        <div class="auteur">
                            <p class="infos-auteur"><?php the_author_firstname(); ?> <?php the_author_lastname(); ?> <span>- Auteur</span></p>
                            <p class="desciption-auteur"><?php the_author_description(); ?></p>
                        </div>
                    </div>
                </div>
                <div class="commentaires">
                    <h1 class="titre-page titre-danspage" id="com">Commentaires</h1>
                    <hr class="half-rule">
                        <div class="commentaires-poste">
                            <?php comments_template(); ?>
                            </div>
                    <div class="commentaire-poster">

                        <form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform">
<?php if ( $user_ID ) : ?>

<p>Vous êtes connecté avec votre identifiant <a href="<?php echo get_option('siteurl'); ?>/wp-admin/profile.php" class="identifiant"><?php echo $user_identity; ?></a>. <a href="<?php echo get_option('siteurl'); ?>/wp-login.php?action=logout" title="D&eacute;connect&eacute; de ce compte" class="deconnexion">D&eacute;connection</a></p><br>

<p>
    <label for="commentaire">Commentaire *</label>
</p>
<p><textarea name="comment" id="comment" cols="60" rows="10" tabindex="4" class="com"></textarea></p>
                            
<?php else : ?>
<p>
    <label for="commentaire">Commentaire *</label>
</p>
<p><textarea name="comment" id="comment" cols="60" rows="10" tabindex="4" class="com"></textarea></p>


<div class="row no-padding wrap">
    <div class="col-6 col-12-t">                            
                         
<p>
    <label for="author"><small>Nom* <?php if ($req) echo "(requis)"; ?></small></label>
    <input type="text" name="author" id="author" value="<?php echo $comment_author; ?>" size="40" tabindex="1" />
</p>
        </div>
        <div class="col-6 col-12-t">
<p>
    <label for="email"><small>Email* <span class="paspublie">(ne sera pas publi&eacute;) </span><?php if ($req) echo "(requis)"; ?></small></label>
    <input type="text" name="email" id="email" value="<?php echo $comment_author_email; ?>" size="40" tabindex="2" />
</p>
            
</div>
    </div>

<?php endif; ?>
                            
<p class="paspublie">Les champs marqués d'un * sont obligatoires.</p>
           

<p><input name="submit" type="submit" id="submit" tabindex="5" value="Envoyer" class="buttonsub" />
<input type="hidden" name="comment_post_ID" value="<?php echo $id; ?>" />
</p>
                 
                            




<?php do_action('comment_form', $post->ID); ?>

</form>


                        
                    </div>
                </div>
                </div>
                <?php 
                    $as1 = types_render_field("as1", array( 'id' => get_the_ID() ) );
                    $as2 = types_render_field("as2", array( 'id' => get_the_ID() ) ); 
                
                    $test1 = wp_trim_excerpt($as1);
                    $test2 = wp_trim_excerpt($as2);

                if(is_numeric($test1) or is_numeric($test2)){
                                    ?>
                
                 <div class="article-associe">
                        <h1 class="titre-page titre-danspage">Article Associés</h1>
                        <hr class="half-rule">
                        <div class="row">
                            <?php if(is_numeric($test1)){ 
                                $lien1 = get_permalink($as1);
                                $image1 = get_the_post_thumbnail_url($as1);
                                $titre1 = get_the_title($as1);
                                $date1 = get_the_date( 'j F Y', $as1 );
                                $tags1 = get_the_tag_list( '<span class="mot-cle">','</span><span class="mot-cle">','</span>', $as1 );
                            ?>
                            <article class="bloc-article col-6 col-12-m">
                                
                                <p class="categorie"><?php the_category($as1) ?></p>
                                <a href="<?php echo $lien1 ?>">
                                <figure><img src="<?php echo $image1 ?>" alt="<?php echo $titre1 ?>"/></figure>
                                </a>
                                <div class="contenu-article">
                                    <a href="<?php echo $lien1 ?>">
                                    <p class="date-article"><?php echo $date1 ?></p>
                                    <p class="titre-article"><?php echo $titre1 ?></p>
                                    <div class="accroche-article"><?php echo types_render_field("accroche_article", array( 'id' => $as1 ) ); ?></div>
                                        </a>
                                    <p><?php echo $tags1 ?></p>

                                </div>
                            </article>
                            <?php }
                            if(is_numeric($test2)){ 
                            $lien2 = get_permalink($as2);
                            $image2 = get_the_post_thumbnail_url($as2 );
                            $titre2 = get_the_title($as2);
                            $date2 = get_the_date( 'j F Y', $as2 );
                            $tags2 = get_the_tag_list( '<span class="mot-cle">','</span><span class="mot-cle">','</span>', $as2 );
                            ?>
                        <article class="bloc-article col-6 col-12-m">
                                <p class="categorie"><?php the_category($as2) ?></p>
                            <a href="<?php echo $lien2 ?>">    
                            <figure><img src="<?php echo $image2 ?>" alt="<?php echo $titre2 ?>"/></figure>
                            </a>
                                <div class="contenu-article">
                                    <a href="<?php echo $lien2 ?>">
                                    <p class="date-article"><?php echo $date2 ?></p>
                                    <p class="titre-article"><?php echo $titre2 ?></p>
                                    <div class="accroche-article"><?php echo types_render_field("accroche_article", array( 'id' => $as2 ) ); ?></div>                        
                                        </a>
                                    <p><?php echo $tags2 ?></p>
                                </div>
                            </a>
                        </article>
                         <?php } ?>
                    </div>
                </div>
                <?php } ?>
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
    

</div>
<?php get_footer(); ?>


</div> </div> </body> </html>
