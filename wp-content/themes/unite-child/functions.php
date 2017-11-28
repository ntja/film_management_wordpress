<?php
add_action( 'wp_enqueue_scripts', 'enqueue_parent_styles' );
function enqueue_parent_styles() {
    wp_enqueue_style( 'parent-style', get_template_directory_uri().'/style.css' );
}
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
}
 
add_action( 'init', 'create_post_type' );

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