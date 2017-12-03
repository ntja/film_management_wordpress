<?php /*
Template Name: film-template
Template Post Type: films
*/
get_header(); 
?>

	<div id="primary" class="content-area col-sm-12 col-md-8 <?php echo of_get_option( 'site_layout' ); ?>">
		<main id="main" class="site-main" role="main">					
		<?php 
			/**/
			$args = array( 'post_type' => 'films', 'posts_per_page' => 10 );
			$loop = new WP_Query( $args );
			//die('here');
			while ( $loop->have_posts() ) : $loop->the_post();
				//the_title();
				//the_content();				
				//get_post_format()
				get_template_part( 'content', 'film' );
				//the_title();
				echo '<div class="entry-content">';
				//the_content();
				//echo 'Release Date :';
				//date('m/d/Y', strtotime(the_field( 'release_date' )));
				//echo '<br> Ticket Price :';
				//the_field( 'ticket_price' );
				echo '</div>';					
			endwhile;
			wp_reset_postdata();
		?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>