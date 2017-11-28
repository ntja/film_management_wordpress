<?php /*
Template Name: film-template
Template Post Type: films
*/
get_header(); ?>

	<div id="primary" class="content-area col-sm-12 col-md-8 <?php echo of_get_option( 'site_layout' ); ?>">
		<main id="main" class="site-main" role="main">
					
		<?php 
			/**/
			$args = array( 'post_type' => 'films', 'posts_per_page' => 10 );
			$loop = new WP_Query( $args );
			while ( $loop->have_posts() ) : $loop->the_post();
				//the_title();
				//the_content();
				get_template_part( 'content', 'single' );
				//date('m/d/Y', strtotime(the_field( 'release_date' )));
				//the_field( 'ticket_price' );
				//the_title();
				echo '<div class="entry-content">';
				//the_excerpt();
				echo '</div>';
				
				//echo '<div class="entry-content">';
				//date('m/d/Y', strtotime(the_field( 'release_date' )));
				//the_field( 'ticket_price' );
				//echo '</div>';
				// If comments are open or we have at least one comment, load up the comment template
				if ( comments_open() || '0' != get_comments_number() ) :
					comments_template();
				endif;
			endwhile;
			
		?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php //get_sidebar(); ?>
<?php get_footer(); ?>