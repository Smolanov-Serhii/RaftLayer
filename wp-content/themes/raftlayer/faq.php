<?php
/**
 * Template Name: Вопросы и ответы
 *
 */

get_header();
?>

    <main id="faq-page" class="faq-page">
        <article>
            <header class="entry-header">
                <div class="post-thumbnail">
                    <?php the_post_thumbnail('full');?>>
                </div>
                <h1 class="entry-title block-container"><?php the_title(); ?></h1>
            </header><!-- .entry-header -->
            <div class="entry-content block-container">
                <?php
                the_content();
                ?>
            </div><!-- .entry-content -->
            <div class="faq__content block-container">
                <div class="faq__title">
                    <h2><?php echo the_field('nadpis_spisok_chastyh_voprosov_i_otvetov', 'options');?></h2>
                </div>
                <?php
                $args = array(
                    'post_type' => 'FAQ',
                    'showposts' => "-1", //сколько показать статей
                    'orderby' => "menu_order", //сортировка по дате
                    'caller_get_posts' => 1);
                $my_query = new wp_query($args);
                if ($my_query->have_posts()) {
                    while ($my_query->have_posts()) {
                        $my_query->the_post();
                        $post_id = get_the_ID();
                        $image = get_field('fotogalereya_slajd', $post_id);
                        ?>
                        <div class="faq__item">
                            <div class="faq__triger">
                                <div class="faq__triger-title"><?php the_title();?></div>
                                <div class="close-item">
                                    <span class="vert"></span>
                                    <span class="hor"></span>
                                </div>
                            </div>
                            <div class="faq__answer" style="display: none;">
                                <?php the_content();?>
                            </div>
                        </div>
                    <?php }
                }
                wp_reset_query(); ?>
            </div>
        </article>
    </main><!-- #main -->
<?php

get_footer();
