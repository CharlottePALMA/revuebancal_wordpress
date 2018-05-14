<?php get_header(); ?>

<div id="content"> 

    <div class="fond-pattern liste-article">
        <div class="wrapper">
           <h1 class="titre-page"><?php the_title(); ?></h1>
            <hr class="half-rule">
            <section class="page-form liste-article">
                <div class="row">
                    <section class="col-10 marg-1">
                        <div class="row no-padding">
                            <article class="col-10 marg-mobile marg-1 article-contenu">
                            <p><?php if ( have_posts() ) {
                                while ( have_posts() ) {
                                    the_post(); ?>
                                <?php the_content(); ?>
                            <?php } } ?></p>
                            </article>
                        </div>
                    </section>
                </div>
            </section>
        </div>
    </div>
    
</div>

<?php get_footer(); ?>


</div> </div> </body> </html>
