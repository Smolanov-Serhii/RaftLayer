<?php
/**
 * The Template for displaying product archives, including the main shop page which is a post type archive
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/archive-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.4.0
 */

defined( 'ABSPATH' ) || exit;

get_header( 'shop' );
$term = get_queried_object();
$image = get_field('kartinka_kategorii', $term);
$title = get_field('zagolovok_dlya_kategorii', $term);

?>
<header class="entry-header">
    <div class="post-thumbnail">
        <?php
        if( is_shop() ){
           ?>
            <img src="<?php echo the_field('kartinka_v_shapku',6)?>" alt="<?php echo the_field('zagolovok_na_straniczu_magazina',6)?>">
                <?php
        } else {
            ?>
            <img src="<?php echo $image?>" alt="<?php echo $title; ?>">
            <?php
        }
        ?>

    </div>
    <?php
    if( is_shop() ){
        ?>
        <h1 id="shop-title" class="entry-title block-container"><?php echo the_field('zagolovok_na_straniczu_magazina',6)?></h1>
        <?php
    } else {
        ?>
        <h1 class="entry-title block-container"><?php echo $title ?></h1>
        <?php
    }
    ?>

	</header><!-- .entry-header -->
<?php
/**
 * Hook: woocommerce_before_main_content.
 *
 * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
 * @hooked woocommerce_breadcrumb - 20
 * @hooked WC_Structured_Data::generate_website_data() - 30
 */
do_action( 'woocommerce_before_main_content' );

?>
    <div class="products-filter">
        <?php dynamic_sidebar( 'filter' ); ?>
    </div>
<section class="woocommerce-products-header">
	<?php if ( apply_filters( 'woocommerce_show_page_title', true ) ) : ?>
		<h2 class="woocommerce-products-header__title page-title"><?php woocommerce_page_title(); ?></h2>
	<?php endif; ?>

	<?php
	/**
	 * Hook: woocommerce_archive_description.
	 *
	 * @hooked woocommerce_taxonomy_archive_description - 10
	 * @hooked woocommerce_product_archive_description - 10
	 */
	do_action( 'woocommerce_archive_description' );
	?>
</section>
<?php
if ( woocommerce_product_loop() ) {

	/**
	 * Hook: woocommerce_before_shop_loop.
	 *
	 * @hooked woocommerce_output_all_notices - 10
	 * @hooked woocommerce_result_count - 20
	 * @hooked woocommerce_catalog_ordering - 30
	 */
	do_action( 'woocommerce_before_shop_loop' );

	woocommerce_product_loop_start();

	if ( wc_get_loop_prop( 'total' ) ) {
		while ( have_posts() ) {
			the_post();

			/**
			 * Hook: woocommerce_shop_loop.
			 */
			do_action( 'woocommerce_shop_loop' );

			wc_get_template_part( 'content', 'product' );
		}
	}

	woocommerce_product_loop_end();

	/**
	 * Hook: woocommerce_after_shop_loop.
	 *
	 * @hooked woocommerce_pagination - 10
	 */
	do_action( 'woocommerce_after_shop_loop' );
} else {
	/**
	 * Hook: woocommerce_no_products_found.
	 *
	 * @hooked wc_no_products_found - 10
	 */
	do_action( 'woocommerce_no_products_found' );
}

/**
 * Hook: woocommerce_after_main_content.
 *
 * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
 */
do_action( 'woocommerce_after_main_content' );
?>

    <section class="best-product">
        <h2 class="new-product__title section-title">
            <?php the_field('zagolovok_bloka_hity_prodazh', 12);?>
        </h2>
        <div class="block-container">
            <?php echo do_shortcode('[featured_products per_page="10" columns="4"]')?>
        </div>
    </section>
<?php get_template_part('inc/map'); ?>  <!-- Блок отзывы -->

<?php
/**
 * Hook: woocommerce_sidebar.
 *
 * @hooked woocommerce_get_sidebar - 10
 */
//do_action( 'woocommerce_sidebar' );

get_footer( 'shop' );
