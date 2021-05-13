<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package RaftLayer
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name='viewport' content='width=device-width,initial-scale=1'/>
    <meta content='true' name='HandheldFriendly'/>
    <meta content='width' name='MobileOptimized'/>
    <meta content='yes' name='apple-mobile-web-app-capable'/>
    <link rel="preconnect" href="https://fonts.gstatic.com">

    <link rel="shortcut icon" href="<?php echo get_template_directory_uri()?>/images/favicon.jpg" type="image/jpg">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;300;500;600;700;900&display=swap" rel="stylesheet">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="site" class="site">
	<header id="header" class="header">
        <div class="header__mobile block-container">
            <div class="header__mobile-fade">
            </div>
            <div class="header__mobile-menu">
                <nav class="icon-nav">
                    <?php
                    wp_nav_menu(
                        array(
                            'theme_location' => 'page-icon',
                            'menu_id'        => 'page-icon',
                        )
                    );
                    ?>
                </nav>
                <nav id="top-menu-item" class="top-menu-item">
                    <?php
                    wp_nav_menu(
                        array(
                            'theme_location' => 'top-menu',
                            'menu_id'        => 'top-menu',
                        )
                    );
                    ?>
                </nav>
                <nav id="page-menu-item" class="page-menu-item">
                    <?php
                    wp_nav_menu(
                        array(
                            'theme_location' => 'page-menu',
                            'menu_id'        => 'page-menu',
                        )
                    );
                    ?>
                </nav>
                <nav id="category-menu-item" class="category-menu-item">
                    <?php
                    wp_nav_menu(
                        array(
                            'theme_location' => 'category-menu',
                            'menu_id'        => 'category-menu',
                        )
                    );
                    ?>
                </nav>
                <div class="header__contacts">
                    <a href="tel:<?php the_field('telefon_1', 'options')?>">
                        <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M15.3626 2.63459C11.8474 -0.879592 6.1489 -0.878748 2.63471 2.63652C-0.87947 6.1518 -0.878626 11.8503 2.63665 15.3645C6.15192 18.8786 11.8504 18.8778 15.3646 15.3625C17.0523 13.6743 18.0002 11.3847 17.9996 8.99759C17.9992 6.61083 17.0506 4.32202 15.3626 2.63459ZM13.6298 12.5364L13.6286 12.5376V12.5346L13.1726 12.9876C12.5829 13.5848 11.724 13.8305 10.9076 13.6356C10.0851 13.4155 9.30326 13.065 8.59162 12.5976C7.93047 12.1751 7.31777 11.6811 6.76462 11.1246C6.25567 10.6194 5.79842 10.0646 5.39961 9.46861C4.96339 8.82729 4.61812 8.12867 4.37361 7.3926C4.09331 6.5279 4.32559 5.57907 4.97362 4.94161L5.50761 4.40763C5.65608 4.25849 5.89732 4.25797 6.04642 4.40643L7.7336 6.09361C7.88273 6.24208 7.88326 6.48332 7.7348 6.63242L6.7436 7.62361C6.45954 7.90458 6.42382 8.35107 6.65961 8.67363C7.01768 9.16504 7.41392 9.62745 7.84462 10.0566C8.32482 10.5389 8.84686 10.9776 9.40461 11.3676C9.72689 11.5924 10.1638 11.5545 10.4426 11.2776L11.3996 10.3056C11.5481 10.1565 11.7893 10.156 11.9384 10.3045L13.6286 11.9976C13.7778 12.1461 13.7783 12.3873 13.6298 12.5364Z" fill="#B87D3B"/>
                        </svg>
                        <?php the_field('telefon_1', 'options')?>
                    </a>
                    <a href="tel:<?php the_field('telefon_2', 'options')?>">
                        <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M15.3626 2.63459C11.8474 -0.879592 6.1489 -0.878748 2.63471 2.63652C-0.87947 6.1518 -0.878626 11.8503 2.63665 15.3645C6.15192 18.8786 11.8504 18.8778 15.3646 15.3625C17.0523 13.6743 18.0002 11.3847 17.9996 8.99759C17.9992 6.61083 17.0506 4.32202 15.3626 2.63459ZM13.6298 12.5364L13.6286 12.5376V12.5346L13.1726 12.9876C12.5829 13.5848 11.724 13.8305 10.9076 13.6356C10.0851 13.4155 9.30326 13.065 8.59162 12.5976C7.93047 12.1751 7.31777 11.6811 6.76462 11.1246C6.25567 10.6194 5.79842 10.0646 5.39961 9.46861C4.96339 8.82729 4.61812 8.12867 4.37361 7.3926C4.09331 6.5279 4.32559 5.57907 4.97362 4.94161L5.50761 4.40763C5.65608 4.25849 5.89732 4.25797 6.04642 4.40643L7.7336 6.09361C7.88273 6.24208 7.88326 6.48332 7.7348 6.63242L6.7436 7.62361C6.45954 7.90458 6.42382 8.35107 6.65961 8.67363C7.01768 9.16504 7.41392 9.62745 7.84462 10.0566C8.32482 10.5389 8.84686 10.9776 9.40461 11.3676C9.72689 11.5924 10.1638 11.5545 10.4426 11.2776L11.3996 10.3056C11.5481 10.1565 11.7893 10.156 11.9384 10.3045L13.6286 11.9976C13.7778 12.1461 13.7783 12.3873 13.6298 12.5364Z" fill="#B87D3B"/>
                        </svg>
                        <?php the_field('telefon_2', 'options')?>
                    </a>
                    <a href="mailto:<?php the_field('e-mail_sajta', 'options')?>">
                        <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M12.6311 5.78564H5.36881L8.99995 8.89807L12.6311 5.78564Z" fill="#B87D3B"/>
                            <path d="M8.99996 9.64293C8.92321 9.64293 8.84898 9.61546 8.79075 9.5654L4.82139 6.16309V12.2144H13.1785V6.16309L9.20917 9.5654C9.15094 9.61546 9.07671 9.64293 8.99996 9.64293Z" fill="#B87D3B"/>
                            <path d="M9 0C4.02947 0 0 4.02947 0 9C0 13.9705 4.02947 18 9 18C13.9705 18 18 13.9705 18 9C17.9944 4.03183 13.9682 0.00565011 9 0ZM13.8214 12.5357C13.8214 12.7132 13.6775 12.8571 13.5 12.8571H4.5C4.32249 12.8571 4.17857 12.7132 4.17857 12.5357V5.46429C4.17857 5.28678 4.32249 5.14286 4.5 5.14286H13.5C13.6775 5.14286 13.8214 5.28678 13.8214 5.46429V12.5357Z" fill="#B87D3B"/>
                        </svg>
                        <?php the_field('e-mail_sajta', 'options')?>
                    </a>
                    <div class="header__get-call js-get-call brown-button">
                        <?php the_field('nadpis_zakazat_zvonok', 'options')?>
                    </div>
                </div>

            </div>
            <div class="header__burger burger__button">
                <span></span>
                <span></span>
                <span></span>
            </div>
            <div class="header__logo">
                <?php
                the_custom_logo();
                ?>
            </div>
            <div class="icons-wrapper">
                <div class="to-wishlist">
                    <a href="<?php echo get_home_url() . '/wishlist/view' ?>">

                        <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M8.03439 0.62615L5.83739 5.28026L0.921884 6.029C0.0403898 6.16257 -0.312881 7.29798 0.326371 7.94829L3.88263 11.5689L3.04151 16.6835C2.8901 17.608 3.82207 18.3005 4.60262 17.8682L9 15.4532L13.3974 17.8682C14.1779 18.297 15.1099 17.608 14.9585 16.6835L14.1174 11.5689L17.6736 7.94829C18.3129 7.29798 17.9596 6.16257 17.0781 6.029L12.1626 5.28026L9.96561 0.62615C9.57196 -0.203435 8.4314 -0.213981 8.03439 0.62615Z" fill="#001317"/>
                        </svg>
                        <?php echo do_shortcode('[yith_wcwl_items_count]');?>
                    </a>
                </div>
                <div class="header__woo">
                    <?php
                    if (class_exists('WooCommerce')) {
                        global $woocommerce; ?>
                        <a href="<?php echo $woocommerce->cart->get_cart_url() ?>" class="fix_cart_btn fz_an js-show-pop-rec">
                        <span class="basket-btn__label">
                            <svg width="20" height="18" viewBox="0 0 20 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M19.822 4.431C19.73 4.29808 19.6072 4.18943 19.464 4.11436C19.3209 4.0393 19.1616 4.00006 19 4H5.333L4.179 1.23C4.02769 0.865226 3.77147 0.553593 3.44282 0.334615C3.11418 0.115638 2.72791 -0.00082104 2.333 4.35724e-06H0V2H2.333L7.077 13.385C7.15299 13.5672 7.28118 13.7228 7.44542 13.8322C7.60967 13.9416 7.80263 14 8 14H16C16.417 14 16.79 13.741 16.937 13.352L19.937 5.352C19.9937 5.20063 20.0129 5.03776 19.9928 4.87735C19.9728 4.71695 19.9142 4.56379 19.822 4.431Z" fill="#001317"/>
                                <path d="M8.5 18C9.32843 18 10 17.3284 10 16.5C10 15.6716 9.32843 15 8.5 15C7.67157 15 7 15.6716 7 16.5C7 17.3284 7.67157 18 8.5 18Z" fill="#001317"/>
                                <path d="M15.5 18C16.3284 18 17 17.3284 17 16.5C17 15.6716 16.3284 15 15.5 15C14.6716 15 14 15.6716 14 16.5C14 17.3284 14.6716 18 15.5 18Z" fill="#001317"/>
                            </svg>
                            <span class="fix_cart_count basket-btn__counter"><?php echo sprintf($woocommerce->cart->cart_contents_count); ?></span>
                        </span>
                            <?php
                            $currency_symbol = html_entity_decode(get_woocommerce_currency_symbol());
                            ?>
                            <span class="fix_cart_total"><?php echo sprintf($woocommerce->cart->cart_contents_total);
                                echo $currency_symbol; ?></span>
                        </a >
                        <?php
                    }
                    ?>
                </div>
            </div>
        </div>
        <div class="header__undermenu">
            <div class="block-container">
                <nav id="page-menu-item" class="page-menu-item">
                    <?php
                    wp_nav_menu(
                        array(
                            'theme_location' => 'top-menu',
                            'menu_id'        => 'top-menu',
                        )
                    );
                    ?>
                </nav>
            </div>
        </div>
        <div class="header__first">
            <div class="block-container">
                <div class="header__logo">
                    <?php
                    the_custom_logo();
                    ?>
                </div>
                <div class="header__contacts">
                    <a href="tel:<?php the_field('telefon_1', 'options')?>">
                        <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M15.3626 2.63459C11.8474 -0.879592 6.1489 -0.878748 2.63471 2.63652C-0.87947 6.1518 -0.878626 11.8503 2.63665 15.3645C6.15192 18.8786 11.8504 18.8778 15.3646 15.3625C17.0523 13.6743 18.0002 11.3847 17.9996 8.99759C17.9992 6.61083 17.0506 4.32202 15.3626 2.63459ZM13.6298 12.5364L13.6286 12.5376V12.5346L13.1726 12.9876C12.5829 13.5848 11.724 13.8305 10.9076 13.6356C10.0851 13.4155 9.30326 13.065 8.59162 12.5976C7.93047 12.1751 7.31777 11.6811 6.76462 11.1246C6.25567 10.6194 5.79842 10.0646 5.39961 9.46861C4.96339 8.82729 4.61812 8.12867 4.37361 7.3926C4.09331 6.5279 4.32559 5.57907 4.97362 4.94161L5.50761 4.40763C5.65608 4.25849 5.89732 4.25797 6.04642 4.40643L7.7336 6.09361C7.88273 6.24208 7.88326 6.48332 7.7348 6.63242L6.7436 7.62361C6.45954 7.90458 6.42382 8.35107 6.65961 8.67363C7.01768 9.16504 7.41392 9.62745 7.84462 10.0566C8.32482 10.5389 8.84686 10.9776 9.40461 11.3676C9.72689 11.5924 10.1638 11.5545 10.4426 11.2776L11.3996 10.3056C11.5481 10.1565 11.7893 10.156 11.9384 10.3045L13.6286 11.9976C13.7778 12.1461 13.7783 12.3873 13.6298 12.5364Z" fill="#B87D3B"/>
                        </svg>
                        <?php the_field('telefon_1', 'options')?>
                    </a>
                    <a href="tel:<?php the_field('telefon_2', 'options')?>">
                        <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M15.3626 2.63459C11.8474 -0.879592 6.1489 -0.878748 2.63471 2.63652C-0.87947 6.1518 -0.878626 11.8503 2.63665 15.3645C6.15192 18.8786 11.8504 18.8778 15.3646 15.3625C17.0523 13.6743 18.0002 11.3847 17.9996 8.99759C17.9992 6.61083 17.0506 4.32202 15.3626 2.63459ZM13.6298 12.5364L13.6286 12.5376V12.5346L13.1726 12.9876C12.5829 13.5848 11.724 13.8305 10.9076 13.6356C10.0851 13.4155 9.30326 13.065 8.59162 12.5976C7.93047 12.1751 7.31777 11.6811 6.76462 11.1246C6.25567 10.6194 5.79842 10.0646 5.39961 9.46861C4.96339 8.82729 4.61812 8.12867 4.37361 7.3926C4.09331 6.5279 4.32559 5.57907 4.97362 4.94161L5.50761 4.40763C5.65608 4.25849 5.89732 4.25797 6.04642 4.40643L7.7336 6.09361C7.88273 6.24208 7.88326 6.48332 7.7348 6.63242L6.7436 7.62361C6.45954 7.90458 6.42382 8.35107 6.65961 8.67363C7.01768 9.16504 7.41392 9.62745 7.84462 10.0566C8.32482 10.5389 8.84686 10.9776 9.40461 11.3676C9.72689 11.5924 10.1638 11.5545 10.4426 11.2776L11.3996 10.3056C11.5481 10.1565 11.7893 10.156 11.9384 10.3045L13.6286 11.9976C13.7778 12.1461 13.7783 12.3873 13.6298 12.5364Z" fill="#B87D3B"/>
                        </svg>
                        <?php the_field('telefon_2', 'options')?>
                    </a>
                    <a href="mailto:<?php the_field('e-mail_sajta', 'options')?>">
                        <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M12.6311 5.78564H5.36881L8.99995 8.89807L12.6311 5.78564Z" fill="#B87D3B"/>
                            <path d="M8.99996 9.64293C8.92321 9.64293 8.84898 9.61546 8.79075 9.5654L4.82139 6.16309V12.2144H13.1785V6.16309L9.20917 9.5654C9.15094 9.61546 9.07671 9.64293 8.99996 9.64293Z" fill="#B87D3B"/>
                            <path d="M9 0C4.02947 0 0 4.02947 0 9C0 13.9705 4.02947 18 9 18C13.9705 18 18 13.9705 18 9C17.9944 4.03183 13.9682 0.00565011 9 0ZM13.8214 12.5357C13.8214 12.7132 13.6775 12.8571 13.5 12.8571H4.5C4.32249 12.8571 4.17857 12.7132 4.17857 12.5357V5.46429C4.17857 5.28678 4.32249 5.14286 4.5 5.14286H13.5C13.6775 5.14286 13.8214 5.28678 13.8214 5.46429V12.5357Z" fill="#B87D3B"/>
                        </svg>
                        <?php the_field('e-mail_sajta', 'options')?>
                    </a>
                </div>
                <div class="header__get-call js-get-call brown-button">
                    <?php the_field('nadpis_zakazat_zvonok', 'options')?>
                </div>
                <nav class="icon-nav">
                    <?php
                    wp_nav_menu(
                        array(
                            'theme_location' => 'page-icon',
                            'menu_id'        => 'page-icon',
                        )
                    );
                    ?>
                </nav>
            </div>
        </div>
        <div class="header__second">
            <div class="block-container">
                <nav id="page-menu-item" class="page-menu-item">
                    <?php
                    wp_nav_menu(
                        array(
                            'theme_location' => 'page-menu',
                            'menu_id'        => 'page-menu',
                        )
                    );
                    ?>
                </nav>
                <div class="to-wishlist">
                    <a href="<?php echo get_home_url() . '/wishlist/view' ?>">

                        <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M8.03439 0.62615L5.83739 5.28026L0.921884 6.029C0.0403898 6.16257 -0.312881 7.29798 0.326371 7.94829L3.88263 11.5689L3.04151 16.6835C2.8901 17.608 3.82207 18.3005 4.60262 17.8682L9 15.4532L13.3974 17.8682C14.1779 18.297 15.1099 17.608 14.9585 16.6835L14.1174 11.5689L17.6736 7.94829C18.3129 7.29798 17.9596 6.16257 17.0781 6.029L12.1626 5.28026L9.96561 0.62615C9.57196 -0.203435 8.4314 -0.213981 8.03439 0.62615Z" fill="#001317"/>
                        </svg>
                        <?php echo do_shortcode('[yith_wcwl_items_count]');?>
                    </a>
                </div>
                <div class="header__woo">
                    <?php
                    if (class_exists('WooCommerce')) {
                        global $woocommerce; ?>
                        <a href="<?php echo $woocommerce->cart->get_cart_url() ?>" class="fix_cart_btn fz_an js-show-pop-rec">
                        <span class="basket-btn__label">
                            <svg width="20" height="18" viewBox="0 0 20 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M19.822 4.431C19.73 4.29808 19.6072 4.18943 19.464 4.11436C19.3209 4.0393 19.1616 4.00006 19 4H5.333L4.179 1.23C4.02769 0.865226 3.77147 0.553593 3.44282 0.334615C3.11418 0.115638 2.72791 -0.00082104 2.333 4.35724e-06H0V2H2.333L7.077 13.385C7.15299 13.5672 7.28118 13.7228 7.44542 13.8322C7.60967 13.9416 7.80263 14 8 14H16C16.417 14 16.79 13.741 16.937 13.352L19.937 5.352C19.9937 5.20063 20.0129 5.03776 19.9928 4.87735C19.9728 4.71695 19.9142 4.56379 19.822 4.431Z" fill="#001317"/>
                                <path d="M8.5 18C9.32843 18 10 17.3284 10 16.5C10 15.6716 9.32843 15 8.5 15C7.67157 15 7 15.6716 7 16.5C7 17.3284 7.67157 18 8.5 18Z" fill="#001317"/>
                                <path d="M15.5 18C16.3284 18 17 17.3284 17 16.5C17 15.6716 16.3284 15 15.5 15C14.6716 15 14 15.6716 14 16.5C14 17.3284 14.6716 18 15.5 18Z" fill="#001317"/>
                            </svg>
                            <span class="fix_cart_count basket-btn__counter"><?php echo sprintf($woocommerce->cart->cart_contents_count); ?></span>
                        </span>
                            <?php
                            $currency_symbol = html_entity_decode(get_woocommerce_currency_symbol());
                            ?>
                            <span class="fix_cart_total"><?php echo sprintf($woocommerce->cart->cart_contents_total);
                                echo $currency_symbol; ?></span>
                        </a >
                        <?php
                    }
                    ?>
                </div>
            </div>
        </div>
        <div class="header__hird">
            <div class="block-container">
                <nav id="category-menu-item" class="category-menu-item">
                    <?php
                    wp_nav_menu(
                        array(
                            'theme_location' => 'category-menu',
                            'menu_id'        => 'category-menu',
                        )
                    );
                    ?>
                </nav>
            </div>
        </div>
	</header>
