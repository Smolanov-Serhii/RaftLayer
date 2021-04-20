<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package RaftLayer
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(''); ?>>
    <header class="entry-header">
        <div class="post-thumbnail">
            <?php the_post_thumbnail('full');?>>
        </div>
        <?php
        if ( is_singular() ) :
            the_title( '<h1 class="entry-title block-container">', '</h1>' );
        else :
            the_title( '<h2 class="entry-title block-container"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
        endif;
        ?>
    </header><!-- .entry-header -->

	<div class="entry-content block-container">
		<?php
		the_content();
		?>
	</div>
</article>
