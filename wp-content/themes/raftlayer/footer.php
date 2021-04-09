<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package RaftLayer
 */

?>

	<footer id="colophon" class="site-footer">
		<div class="site-info">
			<a href="<?php echo esc_url( __( 'https://wordpress.org/', 'raftlayer' ) ); ?>">
				<?php
				/* translators: %s: CMS name, i.e. WordPress. */
				printf( esc_html__( 'Proudly powered by %s', 'raftlayer' ), 'WordPress' );
				?>
			</a>
			<span class="sep"> | </span>
				<?php
				/* translators: 1: Theme name, 2: Theme author. */
				printf( esc_html__( 'Theme: %1$s by %2$s.', 'raftlayer' ), 'raftlayer', '<a href="http://underscores.me/">Underscores.me</a>' );
				?>
		</div><!-- .site-info -->
        <nav id="site-navigation" class="main-navigation">
            <button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><?php esc_html_e( 'Primary Menu', 'raftlayer' ); ?></button>
            <?php
            wp_nav_menu(
                array(
                    'theme_location' => 'footer-menu',
                    'menu_id'        => 'footer-menu',
                )
            );
            ?>
        </nav><!-- #site-navigation -->
	</footer><!-- #colophon -->
</div><!-- #page -->
<script
        src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
        crossorigin="anonymous" defer></script>
<script src="https://unpkg.com/swiper/swiper-bundle.min.js" defer></script>
<script src="https://api-maps.yandex.ru/2.1/?apikey=d325ee9d-883e-46b0-a064-7900b7b320c5&lang=ru_RU" type="text/javascript" defer></script>
<script src="<?php echo get_template_directory_uri() ?>/dist/js/common.js" defer></script>
<?php wp_footer(); ?>

</body>
</html>
