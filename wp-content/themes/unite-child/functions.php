<?php
add_action( 'wp_enqueue_scripts', 'enqueue_parent_styles' );
function enqueue_parent_styles() {
    wp_enqueue_style( 'parent-style', get_template_directory_uri().'/style.css' );
}

// create new post type (films)
function create_post_type() {
    register_post_type( 'films',
        array(
            'labels' => array(
                'name' => __( 'Films' ),
                'singular_name' => __( 'Film' )
            ),
        'public' => true,
        'menu_position' => 5,
        'rewrite' => array('slug' => 'films')
        )
    );
	flush_rewrite_rules();
}
 
add_action( 'init', 'create_post_type' );


// Add genre taxonomy to film post
function genre_taxonomy() {
   register_taxonomy(
		'genre',
		'films',
		array(
			'hierarchical' => true,
			'label' => 'Genre',
			'query_var' => true,
			'rewrite' => array('slug' => 'genre')
		)
	);
}
add_action( 'init', 'genre_taxonomy' );

//add country taxonomy to film post
function country_taxonomy() {
   register_taxonomy(
		'country',
		'films',
		array(
			'hierarchical' => true,
			'label' => 'Country',
			'query_var' => true,
			'rewrite' => array('slug' => 'country')
		)
	);
}
add_action( 'init', 'country_taxonomy' );

//add actor taxonomy to film post
function actor_taxonomy() {
   register_taxonomy(
		'actor',
		'films',
		array(
			'hierarchical' => true,
			'label' => 'Actors',
			'query_var' => true,
			'rewrite' => array('slug' => 'actor')
		)
	);
}
add_action( 'init', 'actor_taxonomy' );

//Add year taxonomy to film post
function year_taxonomy() {
   register_taxonomy(
		'year',
		'films',
		array(
			'hierarchical' => true,
			'label' => 'Year',
			'query_var' => true,
			'rewrite' => array('slug' => 'year')
		)
	);
}
add_action( 'init', 'year_taxonomy' );

// Add custom field (rekease_date and ticket_price) to the_content()
function custom_post_type_filed($content){
	global $post;	
	//var_dump($post->post_type); die();
	if($post->post_type == 'films'){		
		$date = new dateTime(get_post_meta($post->ID, 'release_date', true));
		//var_dump($date->format('m-d-Y')); die();
		$content .= '<br><br>Release Date : ' . $date->format('m-d-Y');
		$content .= '<br>Ticket Price : ' . get_post_meta($post->ID, 'ticket_price', true);
		// country taxonomy
		$terms = get_the_terms( $post->ID, 'country' ); 				
		if($terms){
			$content .= '<br> Country : ';
			foreach($terms as $term) {
			  $content .= $term->name;
				if ($term !== end($terms)){
					$content .= ' | ';
				}
			}
		}		
		// genre taxonomy
		$terms = get_the_terms( $post->ID, 'genre' ); 				
		if($terms){
			$content .= '<br> Genre : ';
			foreach($terms as $term) {
				$content .= $term->name;
				if ($term !== end($terms)){
					$content .= ' | ';
				}			  
			}
		}
	}	
	return $content;
}
add_filter('the_content', 'custom_post_type_filed', 0);

add_shortcode('last_5_films', 'film_shortcode_query');


// show last 5 films on film widget
function film_shortcode_query(){
  $args = array( 'post_type' => 'films', 'posts_per_page' => 5 );
  $posts = new WP_Query($args);
  $output = '';
    if ($posts->have_posts()){
		while ($posts->have_posts()):
            $posts->the_post();
            $out .= '<div class="film_box">
                <h4><a href="'.get_permalink().'" title="' . get_the_title() . '">'.get_the_title() .'</a></h4>';                
            $out .='</div>';    
		endwhile;  
	}        

  wp_reset_query();
  return $out;
}

add_filter( 'pre_get_posts', 'my_get_films' );

// Showing films post type on home page
function my_get_films( $query ) {
	if ( is_home() && $query->is_main_query() ){
		$query->set( 'post_type', array( 'films'));
	}		
	return $query;
}
