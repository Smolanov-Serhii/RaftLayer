<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package RaftLayer
 */

get_header();
?>

	<main id="default-page" class="default-page">

		<?php
		while ( have_posts() ) :
			the_post();

			get_template_part( 'template-parts/content', 'page' );

			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;

		endwhile; // End of the loop.
		?>
        <?php
        if( is_page( 'otzyvy' )){
            echo '<div class="reviewe-form">';
            echo '<h2 class="reviewe-form__title">Оставьте свой отзыв!</h2>';
            echo do_shortcode('[testimonial_view id="2"]');
            echo '</div>';
        }
        ?>

	</main><!-- #main -->
<?php
if( is_page( 'contacts' ) || is_page( 'gde-kupit' )){
    get_template_part('inc/consultation');
    get_template_part('inc/map');
}
?>
<?php
//get_sidebar();
get_footer();
