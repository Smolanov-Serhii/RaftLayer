<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package RaftLayer
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
        <?php raftlayer_post_thumbnail(); ?>
		<?php the_title( '<h1 class="entry-title block-container">', '</h1>' ); ?>
	</header><!-- .entry-header -->

	<div class="entry-content block-container">
        <?php
        if( is_page('oplata') ){
            ?>
            <div class="pay-type">
                <h2 class="pay-type__title">
                    <?php the_field('zagolovok_dlya_bloka_oplat');?>
                </h2>
                <div class="pay-type__container">
                    <?php
                    if( have_rows('vidy_oplat') ):
                        while( have_rows('vidy_oplat') ) : the_row();
                            $sub_title = get_sub_field('opisanie_oplaty');
                            $sub_image = get_sub_field('kartinka_dlya_oplaty');
                            ?>
                            <div class="pay-type__item">
                                <div class="pay-type__img">
                                    <img src="<?php echo $sub_image;?>" alt="<?php echo $sub_title;?>">
                                </div>
                                <p class="pay-type__desc">
                                    <?php echo $sub_title;?>
                                </p>
                            </div>
                        <?php
                        endwhile;
                    endif;?>
                </div>
            </div>
            <?php
        }
        ?>
		<?php
		the_content();

		wp_link_pages(
			array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'raftlayer' ),
				'after'  => '</div>',
			)
		);
        if( is_page( 'contacts' )){
            ?>
            <div class="socials-contacts">
                <h3 class="socials-contacts__title">
                    ???? ?? ???????????????????? ??????????
                </h3>
                <div class="socials-contacts__list">
                    <div class="socials-contacts__item">
                        <a href="<?php echo the_field('ssylka_na_vkontakte', 22);?>">
                            <img src="<?php echo the_field('ikonka_dlya_vkontakte', 22);?>" alt="???? ??????????????????">
                        </a>
                    </div>
                    <div class="socials-contacts__item">
                        <a href="<?php echo the_field('ssilka_na_instagram', 22);?>">
                            <img src="<?php echo the_field('ikonka_instagram', 22);?>" alt="???? ?? instagram">
                        </a>
                    </div>
                </div>
            </div>
            <?php
        }
		?>
	</div><!-- .entry-content -->

</article><!-- #post-<?php the_ID(); ?> -->
