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

	<footer id="footer" class="footer">
        <div class="footer__container block-container">
            <div class="footer__logo">
                <?php
                the_custom_logo();
                ?>
            </div>
            <nav id="footer-navigation" class="footer__navigation">
                <?php
                wp_nav_menu(
                    array(
                        'theme_location' => 'footer-menu',
                        'menu_id'        => 'footer-menu',
                    )
                );
                ?>
            </nav>
            <div class="footer__get-call js-get-call brown-button">
                <?php the_field('nadpis_zakazat_zvonok', 'options')?>
            </div>
        </div>
	</footer><!-- #colophon -->
</div><!-- #page -->
<script
        src="https://code.jquery.com/jquery-3.5.1.min.js"
        integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0="
        crossorigin="anonymous" defer></script>
<script src="https://unpkg.com/swiper/swiper-bundle.min.js" defer></script>
<script src="https://api-maps.yandex.ru/2.1/?apikey=d325ee9d-883e-46b0-a064-7900b7b320c5&lang=ru_RU" type="text/javascript" defer></script>
<!--<script src="--><?php //echo get_template_directory_uri() ?><!--/src/js/fresco.js" defer></script>-->
<script src="<?php echo get_template_directory_uri() ?>/dist/js/common.js" defer></script>
<?php wp_footer(); ?>

</body>
</html>
