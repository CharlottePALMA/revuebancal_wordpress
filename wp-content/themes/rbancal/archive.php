<?php get_header(); ?>
<div id="content"> 
   <div class="fond-pattern liste-article">
        <div class="wrapper">
            <section class="derniers-articles">
                <h1 class="titre-page">Derniers articles</h1>
                <hr class="half-rule">
                <div class="row">
                    <section class="col-7 col-12-t marg-1 marg-mobile">
                        <div class="row marge-bas row-wrap wrap">
                         <?php if(have_posts()) : ?><?php while(have_posts()) : the_post(); ?>
                        
                            <article class="bloc-article col-4">
                                <a href="<?php the_permalink(); ?>">
                                    <p class="categorie"> <?php the_category();  ?></p>
                                    <figure><img src="<?php image_link();  ?>" alt="<?php the_title();  ?>" /></figure>
                                    <div class="contenu-article">
                                        <p class="date-article"><?php the_time('j F Y'); ?></p>
                                        <p class="titre-article"><?php the_title();  ?></p>
                                        <p class="accroche-article"><?php echo types_render_field("accrochea", array( 'id' => get_the_ID() ) ); ?></p>
                                        <p> </p>
                                    </div>
                                </a>
                            </article>
                        <?php endwhile; ?> <?php endif; ?> 
                        </div>
                    </section>
                    <section class="col-3 bloc-droite widget">
                        <section class="dernier-article bloc-liste">
				            <h2>Derniers articles</h2>
				            
					   </section>
					   <section class="bloc-newsletter" style="background-image:url(<?php echo get_stylesheet_directory_uri(); ?>/images/newsletter.png)">
                           <h2>Newsletter</h2>
                           <p class="description-news">Inscrivez-vous à notre newsletter et recevez des actualités toutes les semaines.</p>
                           <form action="core/addNewsletter.php" method="post">
                               <p>
                                   <input type="text" name="email" id="name">
                               </p>
                               <p>
                                   <button class="button">S'abonner</button>
                               </p>
                           </form>
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

<?php get_footer(); ?>

    
    
    
</div> </div> </body> </html>