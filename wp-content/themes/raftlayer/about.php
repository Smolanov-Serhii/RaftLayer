<?php
/**
 * Template Name: Про компанию
 *
 */

get_header();
?>

    <main id="about" class="about">
        <header class="entry-header">
            <div class="post-thumbnail">
                <?php the_post_thumbnail('full');?>>
            </div>
            <h1 class="entry-title block-container"><?php the_title(); ?></h1>
        </header><!-- .entry-header -->
        <article class="about__article block-container">
            <?php
            $current_page = (get_query_var('paged')) ? get_query_var('paged') : 1;
            $params = array(
                'paged'          => $current_page,
                'posts_per_page' => 5,
                'post_type'      => 'post',
                'category'      => '79',
                'category_name' => 'interesnoe'
            );
            query_posts($params);
            $wp_query->is_archive = true;
            $wp_query->is_home = false;
            ?><ul class="about__list"><?
                while(have_posts()): the_post();
                    ?>
                    <div class="about__item">
                        <div class="poleznoe__img">
                            <?php the_post_thumbnail();?>
                        </div>
                        <div class="about__content">
                            <h2 class="about__title"><?php the_title();?></h2>
                            <?php the_excerpt();?>
                            <a class="about__lnk brown-button" href="<?php the_permalink(); ?>"><?php the_field('nadpis_podrobnee', 'options'); ?></a>
                        </div>
                    </div>
                <?
                endwhile;
                ?></ul><?
            wp_reset_postdata();
            the_posts_pagination();
            wp_reset_query();
            ?>
        </article>
    </main><!-- #main -->
<?php

get_footer();
