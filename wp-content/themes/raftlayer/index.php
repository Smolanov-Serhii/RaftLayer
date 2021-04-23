<?php
/**
 * Template Name: Главная
 *
 */

get_header();
?>

	<main id="primary" class="site-main">
        <article>
            <section class="main-slider">
                <div class="main-slider__list swiper-container">
                    <div class="swiper-wrapper">
                        <?php
                        if( have_rows('verhnij_slajder', 12) ):
                            while( have_rows('verhnij_slajder', 12) ) : the_row();
                                $bigimage = get_sub_field('izobrazhenie_dlya_pk');
                                $smallimage = get_sub_field('izobrazhenie_dlya_mob');
                                $title = get_sub_field('zaglovok_dlya_slajda');
                                $subtitle = get_sub_field('podzagolovok_dlya_slajda');
                                ?>
                                <div class="main-slider__item swiper-slide">
                                    <picture>
                                        <source media="(max-width: 500px)"
                                                srcset="<?php echo $smallimage;?>">
                                        <img src="<?php echo $bigimage;?>" class="main-slider__image" alt="<?php echo $title;?>">
                                    </picture>
                                    <div class="main-slider__content">
                                        <div class="block-container">
                                            <h2 class="main-slider__title">
                                                <?php echo $title;?>
                                            </h2>
                                            <span class="main-slider__devider"></span>
                                            <div class="main-slider__desc"><?php echo $subtitle;?></div>
                                        </div>
                                    </div>
                                </div>
                            <?php
                            endwhile;
                        endif;
                        ?>
                    </div>
                    <div class="main-slider__navigate">
                        <div class="block-container">
                            <div class="main-slider__prev main-slider__swicher">
                                <svg width="22" height="37" viewBox="0 0 22 37" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M2.31088e-05 18.5001C2.31009e-05 19.1632 0.253216 19.8262 0.758536 20.3318L16.6679 36.241C17.6799 37.253 19.3207 37.253 20.3323 36.241C21.344 35.2294 21.344 33.5888 20.3323 32.5767L6.25489 18.5001L20.3319 4.42339C21.3435 3.41136 21.3435 1.77102 20.3319 0.759476C19.3202 -0.253044 17.6794 -0.253044 16.6674 0.759476L0.758044 16.6684C0.252642 17.1742 2.31167e-05 17.8372 2.31088e-05 18.5001Z" fill="#C4C4C4" fill-opacity="0.5"/>
                                </svg>
                            </div>
                            <div class="main-slider__next main-slider__swicher">
                                <svg width="23" height="37" viewBox="0 0 23 37" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M22.0456 18.4999C22.0456 17.8368 21.7924 17.1738 21.2871 16.6682L5.37779 0.759023C4.36576 -0.253008 2.72493 -0.253008 1.71331 0.759023C0.701685 1.77064 0.701685 3.41115 1.71331 4.42326L15.7908 18.4999L1.7138 32.5766C0.702178 33.5886 0.702178 35.229 1.7138 36.2405C2.72542 37.253 4.36625 37.253 5.37828 36.2405L21.2876 20.3316C21.793 19.8258 22.0456 19.1628 22.0456 18.4999Z" fill="#C4C4C4" fill-opacity="0.5"/>
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <section class="main-category">
                <h2 class="main-category__block-title section-title">Категории товаров</h2>
                <div class="block-container">
                    <div class="main-category__container swiper-container">
                        <div class="main-category__wrapper swiper-wrapper">
                            <?php
                            $prod_cat_args = array(
                                'taxonomy'    => 'product_cat',
                                'orderby'     => 'id', // здесь по какому полю сортировать
                                'hide_empty'  => false, // скрывать категории без товаров или нет
                                'parent'      => 0 // id родительской категории
                            );
                            $woo_categories = get_categories( $prod_cat_args );
                            foreach ( $woo_categories as $woo_cat ) {
                                $woo_cat_id = $woo_cat->term_id; //category ID
                                $woo_cat_name = $woo_cat->name; //category name
                                $woo_cat_slug = $woo_cat->slug; //category slug
                                echo '<div class="main-category__item swiper-slide">';
                                $category_thumbnail_id = get_woocommerce_term_meta($woo_cat_id, 'thumbnail_id', true);
                                $thumbnail_image_url = wp_get_attachment_url($category_thumbnail_id);
                                echo '<img src="' . $thumbnail_image_url . '"/>';
                                echo '<div class="main-category__bottom">';
                                echo '<h2 class="main-category__title">';
                                echo $woo_cat_name;
                                echo '</h2>';
                                echo '<a class="main-category__lnk" href="' . get_term_link( $woo_cat_id, 'product_cat' ) . '">' . 'Перейти в каталог' . '<svg width="21" height="8" viewBox="0 0 21 8" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M20.3536 4.35355C20.5488 4.15829 20.5488 3.84171 20.3536 3.64645L17.1716 0.464466C16.9763 0.269204 16.6597 0.269204 16.4645 0.464466C16.2692 0.659728 16.2692 0.976311 16.4645 1.17157L19.2929 4L16.4645 6.82843C16.2692 7.02369 16.2692 7.34027 16.4645 7.53553C16.6597 7.7308 16.9763 7.7308 17.1716 7.53553L20.3536 4.35355ZM0 4.5H20V3.5H0V4.5Z" fill="white"/>
                                        </svg>
                                        </a>';
                                echo "</div>";
                                echo "</div>\n";
                            }
                            ?>
                        </div>
                    </div>
                    <div class="main-category__navigate block-container">
                        <div class="main-category__prev main-slider__swicher">
                            <svg width="22" height="37" viewBox="0 0 22 37" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M2.31088e-05 18.5001C2.31009e-05 19.1632 0.253216 19.8262 0.758536 20.3318L16.6679 36.241C17.6799 37.253 19.3207 37.253 20.3323 36.241C21.344 35.2294 21.344 33.5888 20.3323 32.5767L6.25489 18.5001L20.3319 4.42339C21.3435 3.41136 21.3435 1.77102 20.3319 0.759476C19.3202 -0.253044 17.6794 -0.253044 16.6674 0.759476L0.758044 16.6684C0.252642 17.1742 2.31167e-05 17.8372 2.31088e-05 18.5001Z" fill="#C4C4C4" fill-opacity="0.5"/>
                            </svg>
                        </div>
                        <div class="main-category__next main-slider__swicher">
                            <svg width="23" height="37" viewBox="0 0 23 37" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M22.0456 18.4999C22.0456 17.8368 21.7924 17.1738 21.2871 16.6682L5.37779 0.759023C4.36576 -0.253008 2.72493 -0.253008 1.71331 0.759023C0.701685 1.77064 0.701685 3.41115 1.71331 4.42326L15.7908 18.4999L1.7138 32.5766C0.702178 33.5886 0.702178 35.229 1.7138 36.2405C2.72542 37.253 4.36625 37.253 5.37828 36.2405L21.2876 20.3316C21.793 19.8258 22.0456 19.1628 22.0456 18.4999Z" fill="#C4C4C4" fill-opacity="0.5"/>
                            </svg>
                        </div>
                    </div>
                </div>
            </section>
            <section class="technology block-container">
                <h2 class="technology__title section-title">
                    <?php the_field('zagolovok_dlya_bloka', 12);?>
                </h2>
                <p class="technology__subtitle"><?php the_field('podzagolovok_dlya_bloka_opisaniya', 12);?></p>
                <div class="technology__container">
                    <div class="technology__text">
                        <?php the_field('opisanie_dlya_bloka_opisanie', 12);?>
                        <a class="technology__lnk brown-button" href="<?php echo the_field('ssylka_dlya_knopei_bloka_opisanie', 12);?>">
                            <?php echo the_field('nadpis_podrobnee', 'options');?>
                        </a>
                    </div>
                    <div class="technology__img">
                        <img src="<?php echo the_field('kartinka_bloka_opisanie', 12);?>" alt="<?php the_field('zagolovok_dlya_bloka', 12)?>">
                    </div>
                </div>
            </section>
            <div class="main-products">
                <div class="main-products__decor">
                    <img src="<?php echo get_template_directory_uri();?>/images/decor.svg" alt="">
                </div>
                <section class="new-product">
                    <h2 class="new-product__title section-title">
                        <?php the_field('zagolovok_bloka_novinki_tovara', 12);?>
                    </h2>
                    <div class="block-container">
                        <?php echo do_shortcode('[recent_products per_page="4" columns="4"]')?>
                    </div>
                </section>
                <div class="main-products__decor">
                    <img src="<?php echo get_template_directory_uri();?>/images/decor-left.svg" alt="">
                </div>
                <section class="best-product">
                    <h2 class="new-product__title section-title">
                        <?php the_field('zagolovok_bloka_hity_prodazh', 12);?>
                    </h2>
                    <div class="block-container">
                        <?php echo do_shortcode('[featured_products per_page="4" columns="4"]')?>
                    </div>
                </section>
                <div class="main-products__decor">
                    <img src="<?php echo get_template_directory_uri();?>/images/decor.svg" alt="">
                </div>
            </div>
            <section class="reviewes block-container">
                <h2 class="reviewes__title section-title">
                    <?php the_field('zagolovok_bloka_otzyvy', 12);?>
                </h2>
                <?php echo do_shortcode('[testimonial_view id="1"]')?>
                <div class="reviewes__lnk">
                    <a class="brown-button" href="<?php echo get_home_url(); ?>/otzyvy/" target="_blank">ещё отзывы</a>
                </div>
            </section>
            <section class="news">
                <div class="news__left">
                    <img src="<?php echo get_template_directory_uri();?>/images/news-left.svg" alt="">
                </div>
                <div class="news__right">
                    <img src="<?php echo get_template_directory_uri();?>/images/news-right.svg" alt="">
                </div>
                <div class="block-container">
                    <h2 class="news__title section-title">
                        <?php the_field('zagolovok_novosti', 12);?>
                    </h2>
                    <div class="news__list">
                        <?php
                        // параметры по умолчанию
                        $posts = get_posts( array(
                            'numberposts' => 4,
                            'category'    => 0,
                            'orderby'     => 'date',
                            'order'       => 'ASC',
                            'include'     => array(),
                            'exclude'     => array(),
                            'meta_key'    => '',
                            'meta_value'  =>'',
                            'post_type'   => 'post',
                            'suppress_filters' => true, // подавление работы фильтров изменения SQL запроса
                        ) );

                        foreach( $posts as $post ){
                            setup_postdata($post);
                            $date = get_the_date( $d, $post );
                            ?>
                                <a href="<?php the_permalink();?>"  class="news__item">
                                    <div class="news__image">
                                        <?php the_post_thumbnail();?>
                                    </div>
                                    <div class="news__content">
                                        <div class="news__date">
                                            <?php echo $date;?>
                                        </div>
                                        <h2 class="news__title">
                                            <?php the_title();?>
                                        </h2>
                                        <div class="news__desc">
                                            <?php the_excerpt();?>
                                            <span class="news__detail">
                                                <?php echo the_field('nadpis_podrobnee', 'options');?>
                                                <svg width="13" height="8" viewBox="0 0 13 8" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M12.3536 4.35355C12.5488 4.15829 12.5488 3.84171 12.3536 3.64645L9.17157 0.464466C8.97631 0.269204 8.65973 0.269204 8.46447 0.464466C8.2692 0.659728 8.2692 0.976311 8.46447 1.17157L11.2929 4L8.46447 6.82843C8.2692 7.02369 8.2692 7.34027 8.46447 7.53553C8.65973 7.7308 8.97631 7.7308 9.17157 7.53553L12.3536 4.35355ZM0 4.5H12V3.5H0V4.5Z" fill="black"/>
                                                </svg>
                                            </span>
                                        </div>
                                    </div>
                                </a>
                            <?php
                        }

                        wp_reset_postdata(); // сброс
                        ?>
                    </div>
                    <div class="news__all">
                        <a class="news__all-show brown-button" href="<?php the_field('ssylka_na_knopku_novosti', 12);?>"> <?php echo the_field('nadpis_eshhyo_novosti', 'options');?></a>
                    </div>
                </div>

            </section>
            <section class="consultation block-container">
                <h2 class="consultation__title section-title">
                    <?php the_field('zagolovok_konsultacziya', 12);?>
                </h2>
                <div class="consultation__subtitle">
                    <?php the_field('podzagolovok_konsultacziya', 12);?>
                </div>
                <div class="consultation__content">
                    <?php echo do_shortcode('[contact-form-7 id="24" title="Консультация"]')?>
                </div>
            </section>

        </article>
	</main>
<?php get_template_part('inc/map'); ?>  <!-- Блок отзывы -->
<?php
//get_sidebar();
get_footer();
