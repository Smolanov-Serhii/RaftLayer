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
        <article class="about__article">
            <section class="about__video-block video-block block-container">
                <div class="video-block__header">
                    <div class="video-navigate">
                        <div class="prev">
                            <svg width="22" height="37" viewBox="0 0 22 37" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M2.31088e-05 18.5001C2.31009e-05 19.1632 0.253216 19.8262 0.758536 20.3318L16.6679 36.241C17.6799 37.253 19.3207 37.253 20.3323 36.241C21.344 35.2294 21.344 33.5888 20.3323 32.5767L6.25489 18.5001L20.3319 4.42339C21.3435 3.41136 21.3435 1.77102 20.3319 0.759476C19.3202 -0.253044 17.6794 -0.253044 16.6674 0.759476L0.758044 16.6684C0.252642 17.1742 2.31167e-05 17.8372 2.31088e-05 18.5001Z" fill="#C4C4C4" fill-opacity="0.5"/>
                            </svg>
                        </div>
                        <div class="next">
                            <svg width="23" height="37" viewBox="0 0 23 37" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M22.0456 18.4999C22.0456 17.8368 21.7924 17.1738 21.2871 16.6682L5.37779 0.759023C4.36576 -0.253008 2.72493 -0.253008 1.71331 0.759023C0.701685 1.77064 0.701685 3.41115 1.71331 4.42326L15.7908 18.4999L1.7138 32.5766C0.702178 33.5886 0.702178 35.229 1.7138 36.2405C2.72542 37.253 4.36625 37.253 5.37828 36.2405L21.2876 20.3316C21.793 19.8258 22.0456 19.1628 22.0456 18.4999Z" fill="#C4C4C4" fill-opacity="0.5"/>
                            </svg>
                        </div>
                    </div>
                    <h2>
                        <?php the_field('zagolovok_bloka_video', 16);?>
                    </h2>
                    <p><?php the_field('podzagolovok_bloy_video', 16);?></p>

                </div>
                <div class="video-block__container swiper-container">
                    <div class="video-block__wrapper swiper-wrapper">
                        <?php
                        if( have_rows('video_elementy') ):
                            while( have_rows('video_elementy') ) : the_row();
                                $sub_title = get_sub_field('zagolovok_dlya_elementa_video');
                                $sub_subtitle = get_sub_field('podzagolovok_elementa_video');
                                $sub_image = get_sub_field('oblozhka_elementa_video');
                                $sub_lnk = get_sub_field('ssylka_na_video_s_yutub');
                                ?>
                                <a href="<?php echo $sub_lnk;?>" class="video-block__item swiper-slide fresco">
                                    <div class="video-block__img">
                                        <img src="<?php echo $sub_image;?>" alt="<?php echo $sub_title;?>">
                                    </div>
                                    <div class="video-block__content">
                                        <h2><?php echo $sub_title;?></h2>
                                        <p><?php echo $sub_subtitle;?></p>
                                    </div>
                                </a>
                               <?php
                            endwhile;
                        endif;?>
                    </div>
                </div>
            </section>
            <section class="about__history-block history-block">
                <div class="video-block__header block-container">
                    <h2>
                        <?php the_field('zagolovok_bloka_istoriya', 16);?>
                    </h2>
                    <p><?php the_field('podzagolovok_bloka_istoriya', 16);?></p>
                </div>
                <div class="history-block__content block-container">
                    <?php the_field('opisanie_blloka_istoriya', 16);?>
                </div>
            </section>
            <section class="about__technology-block technology-block block-container">
                <div class="video-block__header">
                    <h2>
                        <?php the_field('zagolovok_bloka_tehnologiya', 16);?>
                    </h2>
                </div>
                <div class="technology-block__content">
                    <?php the_field('opisanie_bloka_tehnologiya', 16);?>
                </div>
            </section>
            <section class="about__sertificate-block sertificate-block block-container">
                <div class="video-block__header">
                    <div class="video-navigate">
                        <div class="prev">
                            <svg width="22" height="37" viewBox="0 0 22 37" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M2.31088e-05 18.5001C2.31009e-05 19.1632 0.253216 19.8262 0.758536 20.3318L16.6679 36.241C17.6799 37.253 19.3207 37.253 20.3323 36.241C21.344 35.2294 21.344 33.5888 20.3323 32.5767L6.25489 18.5001L20.3319 4.42339C21.3435 3.41136 21.3435 1.77102 20.3319 0.759476C19.3202 -0.253044 17.6794 -0.253044 16.6674 0.759476L0.758044 16.6684C0.252642 17.1742 2.31167e-05 17.8372 2.31088e-05 18.5001Z" fill="#C4C4C4" fill-opacity="0.5"/>
                            </svg>
                        </div>
                        <div class="next">
                            <svg width="23" height="37" viewBox="0 0 23 37" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M22.0456 18.4999C22.0456 17.8368 21.7924 17.1738 21.2871 16.6682L5.37779 0.759023C4.36576 -0.253008 2.72493 -0.253008 1.71331 0.759023C0.701685 1.77064 0.701685 3.41115 1.71331 4.42326L15.7908 18.4999L1.7138 32.5766C0.702178 33.5886 0.702178 35.229 1.7138 36.2405C2.72542 37.253 4.36625 37.253 5.37828 36.2405L21.2876 20.3316C21.793 19.8258 22.0456 19.1628 22.0456 18.4999Z" fill="#C4C4C4" fill-opacity="0.5"/>
                            </svg>
                        </div>
                    </div>
                    <h2>
                        <?php the_field('zagolovok_bloka_sertifikaty', 16);?>
                    </h2>

                </div>
                <div class="sertificate-block__container swiper-container">
                    <div class="sertificate-block__wrapper swiper-wrapper">
                        <?php
                        if( have_rows('perechen_setrifikatov') ):
                            while( have_rows('perechen_setrifikatov') ) : the_row();
                                $sub_title = get_sub_field('opisanie_setrifikata');
                                $sub_image = get_sub_field('izobrazhenie_setrifikata');
                                ?>
                                <a href="<?php echo $sub_image;?>" class="sertificate-block__item swiper-slide fresco">
                                    <div class="sertificate-block__img">
                                        <img src="<?php echo $sub_image;?>" alt="<?php echo $sub_title;?>">
                                    </div>
                                </a>
                            <?php
                            endwhile;
                        endif;?>
                    </div>
                </div>
            </section>
            <section class="about__regions-block regions-block">
                <div class="regions-block__header block-container">
                    <h2>
                        <?php the_field('zagolovok_regionalnye_predstavitelstva', 16);?>
                    </h2>
                </div>
                <div class="regions-block__content block-container">
                    <?php the_field('opisanie_regionalnye_predstavitelstva', 16);?>
                </div>
            </section>
            <section class="about__rekvizits-block rekvizits-block">
                <div class="rekvizits-block__header block-container">
                    <h2>
                        <?php the_field('zagolovok_regionalnye_predstavitelstva', 16);?>
                    </h2>
                </div>
                <div class="rekvizits-block__content block-container">
                    <?php the_field('opisanie_regionalnye_predstavitelstva', 16);?>
                </div>
            </section>
        </article>
    </main><!-- #main -->
<?php

get_footer();
