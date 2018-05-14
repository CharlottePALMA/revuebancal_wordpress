<?php
function rbancalscripts() {
    
$js_directory = get_template_directory_uri() . '/js/';
//wp_register_script( 'jquery2', $js_directory . 'jquery.js', 'jquery' );
//wp_register_script( 'codejs', $js_directory . 'codejs.js', 'jquery' );
    
  //  wp_enqueue_script( 'jquery2', get_bloginfo('stylesheet_directory').'/js/monscript.js', array( 'jquery' ), '1.0', true );

wp_enqueue_script( 'jquery2', $js_directory . 'jquery.js', array( 'jquery' ), '1.0', true );
//wp_enqueue_script( 'codejs', $js_directory . 'codejs.js', 'jquery', true );


}




if( !function_exists( 'theme_pagination' ) ) {
	
    function theme_pagination() {
	
	global $wp_query, $wp_rewrite;
	$wp_query->query_vars['paged'] > 1 ? $current = $wp_query->query_vars['paged'] : $current = 1;
	
	$pagination = array(
		'base' => @add_query_arg('page','%#%'),
		'format' => '',
		'total' => $wp_query->max_num_pages,
		'current' => $current,
	        'show_all' => false,
	        'end_size'     => 1,
	        'mid_size'     => 2,
		'type' => 'list',
		'next_text' => '»',
		'prev_text' => '«'
	);
	
	if( $wp_rewrite->using_permalinks() )
		$pagination['base'] = user_trailingslashit( trailingslashit( remove_query_arg( 's', get_pagenum_link( 1 ) ) ) . 'page/%#%/', 'paged' );
	
	if( !empty($wp_query->query_vars['s']) )
		$pagination['add_args'] = array( 's' => str_replace( ' ' , '+', get_query_var( 's' ) ) );
		
	echo str_replace('page/1/','', paginate_links( $pagination ) );
    }	
}








function filter_search($query) {
    if ($query->is_search) {
      $query->set('post_type', array('ouvrage', 'partenaire', 'revue'));
    };
    return $query;
};
add_filter('pre_get_posts', 'filter_search');




function pagination($query) {  
	
	$baseURL="http://".$_SERVER['HTTP_HOST'];
	if($_SERVER['REQUEST_URI'] != "/"){
		$baseURL = $baseURL.$_SERVER['REQUEST_URI'];
	}
 
	// Suppression de '/page' de l'URL
	$sep = strrpos($baseURL, '/page/');
	if($sep != FALSE){
		$baseURL = substr($baseURL, 0, $sep);
	}
 
  // Suppression des paramètres de l'URL
	$sep = strrpos($baseURL, '?');
	if($sep != FALSE){
	// On supprime le caractère avant qui est un '/'
		$baseURL = substr($baseURL, 0, ($sep-1));
	}	
	
	$page = $query->query_vars["paged"];  
	if ( !$page ) $page = 1;  
	$qs = $_SERVER["QUERY_STRING"] ? "?".$_SERVER["QUERY_STRING"] : "";  
	
	// Nécessaire uniquement si on a plus de posts que de posts par page admis 
	if ( $query->found_posts > $query->query_vars["posts_per_page"] ) {  
		echo '<ul class="pagination">'; 
		// lien précédent si besoin
		if ( $page > 1 ) { 
			echo '<li class="next_prev prev"><a title="Revenir à la page précédente (vous êtes à la page '.$page.')" href="'.$baseURL.'/page/'.($page-1).'/'.$qs.'">«</a></li>'; 
		} 
		// la boucle pour les pages
		for ( $i=1; $i <= $query->max_num_pages; $i++ ) { 
			// ajout de la classe active pour la page en cours de visualisation
			if ( $i == $page ) { 
				echo '<li class="active"><a href="#pagination" title="Vous êtes sur cette page '.$i.'">'.$i.'</a></li>'; 
			} else { 
				echo '<li><a title="Rejoindre la page '.$i.'" href="'.$baseURL.'/page/'.$i.'/'.$qs.'">'.$i.'</a></li>'; 
			} 
		} 
		// le lien next si besoin
		if ( $page < $query->max_num_pages ) { 
			echo '<li class="next_prev next"><a title="Passer à la page suivante (vous êtes à la page '.$page.')" href="'.$baseURL.'/page/'.($page+1).'/'.$qs.'">»</a></li>'; 
		} 
		echo '</ul>';  
	}  
}

add_filter( 'mc4wp_use_sslverify', '__return_false' );