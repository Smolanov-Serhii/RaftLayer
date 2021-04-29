<?php
//bitrix24 
//
//

add_action( 'woocommerce_thankyou', 'my_custom_tracking' );
function my_custom_tracking( $order_id ) {

  // Получаем информации по заказу
  $order = wc_get_order( $order_id );
  $order_data = $order->get_data();

  // Получаем базовую информация по заказу
  $order_id = $order_data['id'];
  $order_currency = $order_data['currency'];
  $order_payment_method_title = $order_data['payment_method_title'];
  $order_shipping_totale = $order_data['shipping_total'];
  $order_total = $order_data['total'];

  $order_base_info = "<hr><strong>Общая информация по заказу</strong><br>
  ID заказа: $order_id<br>
  Валюта заказа: $order_currency<br>
  Метода оплаты: $order_payment_method_title<br>
  Стоимость доставки: $order_shipping_totale<br>
  Итого с доставкой: $order_total<br>";

  // Получаем информация по клиенту
  $order_customer_id = $order_data['customer_id'];
  $order_customer_ip_address = $order_data['customer_ip_address'];
  $order_billing_first_name = $order_data['billing']['first_name'];
  $order_billing_last_name = $order_data['billing']['last_name'];
  $order_billing_email = $order_data['billing']['email'];
  $order_billing_phone = $order_data['billing']['phone'];

  $order_client_info = "<hr><strong>Информация по клиенту</strong><br>
  ID клиента = $order_customer_id<br>
  IP адрес клиента: $order_customer_ip_address<br>
  Имя клиента: $order_billing_first_name<br>
  Фамилия клиента: $order_billing_last_name<br>
  Email клиента: $order_billing_email<br>
  Телефон клиента: $order_billing_phone<br>";

  // Получаем информацию по доставке
  $order_shipping_address_1 = $order_data['shipping']['address_1'];
  $order_shipping_address_2 = $order_data['shipping']['address_2'];
  $order_shipping_city = $order_data['shipping']['city'];
  $order_shipping_state = $order_data['shipping']['state'];
  $order_shipping_postcode = $order_data['shipping']['postcode'];
  $order_shipping_country = $order_data['shipping']['country'];

  $order_shipping_info = "<hr><strong>Информация по доставке</strong><br>
  Страна доставки: $order_shipping_state<br>
  Город доставки: $order_shipping_city<br>
  Индекс: $order_shipping_postcode<br>
  Адрес доставки 1: $order_shipping_address_1<br>
  Адрес доставки 2: $order_shipping_address_2<br>";

  // Получаем информации по товару
  $order->get_total();
  $line_items = $order->get_items();
  foreach ( $line_items as $item ) {
    $product = $order->get_product_from_item( $item );
    $sku = $product->get_sku(); // артикул товара
    $id = $product->get_id(); // id товара
    $name = $product->get_name(); // название товара
    $description = $product->get_description(); // описание товара
    $stock_quantity = $product->get_stock_quantity(); // кол-во товара на складе
    $qty = $item['qty']; // количество товара, которое заказали
    $total = $order->get_line_total( $item, true, true ); // стоимость всех товаров, которые заказали, но без учета доставки

    $product_info[] = "<hr><strong>Информация о товаре</strong><br>
    Название товара: $name<br>
    ID товара: $id<br>
    Артикул: $sku<br>
    Описание: $description<br>
    Заказали (шт.): $qty<br>
    Наличие (шт.): $stock_quantity<br>
    Сумма заказа (без учета доставки): $total;";
  }

  $product_base_infо = implode('<br>', $product_info);

  $subject = "Заказ с сайта № $order_id";

  // Формируем URL в переменной $queryUrl для отправки сообщений в лиды Битрикс24, где
  // указываем [ваше_название], [идентификатор_пользователя] и [код_вебхука]
  $queryUrl = 'https://raftlayer.bitrix24.ru/rest/1/7t635ln01dbb01ja/crm.lead.add.json';
  // Формируем параметры для создания лида в переменной $queryData
  $queryData = http_build_query(array(
    'fields' => array(
	  'TITLE' => $subject,
	  'NAME' => $order_billing_first_name.' '.$order_billing_last_name,
	  "PHONE" => array(array("VALUE" => $order_billing_phone, "VALUE_TYPE" => "WORK" )),
	  "EMAIL" => array(array("VALUE" => $order_billing_email, "VALUE_TYPE" => "WORK" )),
      'COMMENTS' => $order_base_info.' '.$order_client_info.' '.$order_shipping_info.' '.$product_base_infо
    ),
    'params' => array("REGISTER_SONET_EVENT" => "Y")
  ));

  // Обращаемся к Битрикс24 при помощи функции curl_exec
  $curl = curl_init();
  curl_setopt_array($curl, array(
    CURLOPT_SSL_VERIFYPEER => 0,
    CURLOPT_POST => 1,
    CURLOPT_HEADER => 0,
    CURLOPT_RETURNTRANSFER => 1,
    CURLOPT_URL => $queryUrl,
    CURLOPT_POSTFIELDS => $queryData,
  ));
  $result = curl_exec($curl);
  curl_close($curl);
  $result = json_decode($result, 1);

  if (array_key_exists('error', $result)) echo "Ошибка при сохранении лида: ".$result['error_description']."<br>";
}


// Вызываем функцию для перехвата данных
add_action( 'wpcf7_mail_sent', 'your_wpcf7_mail_sent_function' );
function your_wpcf7_mail_sent_function( $contact_form ) {

  // Перехватываем данные из Contact Form 7
  $title = $contact_form->title;
  $posted_data = $contact_form->posted_data;
  //Вместо "Контактная форма 1" необходимо указать название вашей контактной формы

    $submission = WPCF7_Submission::get_instance();
    $posted_data = $submission->get_posted_data();
    // Далее перехватываем введенные данные в полях Contact Form 7:
    // 1. Перехватываем поле [your-name]
    if (isset($_POST['namepeople']) && !empty($_POST['namepeople']))
	{
		$posted_data['text-427'] = $_POST['namepeople'];
	}
    if (isset($_POST['mask-564']) && !empty($_POST['mask-564']))
	{
		$posted_data['mask-555'] = $_POST['mask-564'];
	}	
    $firstName = $posted_data['text-427'];
    // 2. Перехватываем поле [your-message]
    $userPhone = $posted_data['mask-555']; 
    
    // Формируем URL в переменной $queryUrl для отправки сообщений в лиды Битрикс24, где
    // указываем [ваше_название], [идентификатор_пользователя] и [код_вебхука]
    $queryUrl = 'https://raftlayer.bitrix24.ru/rest/1/7t635ln01dbb01ja/crm.lead.add.json';
    // Формируем параметры для создания лида в переменной $queryData
    $queryData = http_build_query(array(
      'fields' => array(
        // Устанавливаем название для заголовка лида
        'TITLE' => 'Заявка с сайта raftlayer96.ru',
        'NAME' => $firstName,
		"PHONE" => array(array("VALUE" => $userPhone, "VALUE_TYPE" => "WORK" )),
        'COMMENTS' => $message,
      ),
      'params' => array("REGISTER_SONET_EVENT" => "Y")
    ));

    // Обращаемся к Битрикс24 при помощи функции curl_exec
    $curl = curl_init();
    curl_setopt_array($curl, array(
      CURLOPT_SSL_VERIFYPEER => 0,
      CURLOPT_POST => 1,
      CURLOPT_HEADER => 0,
      CURLOPT_RETURNTRANSFER => 1,
      CURLOPT_URL => $queryUrl,
      CURLOPT_POSTFIELDS => $queryData,
    ));
    $result = curl_exec($curl);
    curl_close($curl);
    $result = json_decode($result, 1);

    if (array_key_exists('error', $result)) echo "Ошибка при сохранении лида: ".$result['error_description']."<br/>";
  
}

/**
 * RaftLayer functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package RaftLayer
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

if ( ! function_exists( 'raftlayer_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function raftlayer_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on RaftLayer, use a find and replace
		 * to change 'raftlayer' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'raftlayer', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus(
			array(
				'top-menu' => esc_html__( 'Верхнее страниц', 'raftlayer' ),
				'page-menu' => esc_html__( 'Меню страниц', 'raftlayer' ),
				'category-menu' => esc_html__( 'Меню категорий', 'raftlayer' ),
				'footer-menu' => esc_html__( 'Футер меню', 'raftlayer' ),
			)
		);

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'style',
				'script',
			)
		);

		// Set up the WordPress core custom background feature.
		add_theme_support(
			'custom-background',
			apply_filters(
				'raftlayer_custom_background_args',
				array(
					'default-color' => 'ffffff',
					'default-image' => '',
				)
			)
		);

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support(
			'custom-logo',
			array(
				'height'      => 250,
				'width'       => 250,
				'flex-width'  => true,
				'flex-height' => true,
			)
		);
	}
endif;
add_action( 'after_setup_theme', 'raftlayer_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function raftlayer_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'raftlayer_content_width', 640 );
}
add_action( 'after_setup_theme', 'raftlayer_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function raftlayer_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'raftlayer' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'raftlayer' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
    register_sidebar(
        array(
            'name'          => esc_html__( 'Фильтр товаров', 'raftlayer' ),
            'id'            => 'filter',
            'description'   => esc_html__( 'добавте фильтр', 'raftlayer' ),
            'before_widget' => '<section id="%1$s" class="widget %2$s">',
            'after_widget'  => '</section>',
        )
    );
}
add_action( 'widgets_init', 'raftlayer_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function raftlayer_scripts() {
    wp_enqueue_style( 'raftlayer-style', get_template_directory_uri() . '/dist/css/style.css', array(), _S_VERSION );
//    wp_enqueue_script('m-tyre-script', get_template_directory_uri() . '/dist/js/common.js');
    wp_enqueue_script( 'raftlayer-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );

    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
        wp_enqueue_script( 'comment-reply' );
    }
}
add_action( 'wp_enqueue_scripts', 'raftlayer_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

function mytheme_add_woocommerce_support(){
    add_theme_support('woocommerce');
}
add_action('after_setup_theme','mytheme_add_woocommerce_support');
add_theme_support( 'wc-product-gallery-zoom' );
add_theme_support( 'wc-product-gallery-lightbox' );
//add_theme_support( 'wc-product-gallery-slider');

if( function_exists('acf_add_options_page') ) {

    acf_add_options_page(array(
        'page_title' 	=> 'Параметры',
        'menu_title'	=> 'Параметры темы',
        'menu_slug' 	=> 'theme-general-settings',
        'capability'	=> 'edit_posts',
        'redirect'		=> false
    ));

    acf_add_options_sub_page(array(
        'page_title' 	=> 'Параметры Header',
        'menu_title'	=> 'Header',
        'parent_slug'	=> 'theme-general-settings',
    ));

    acf_add_options_sub_page(array(
        'page_title' 	=> 'Параметры Footer',
        'menu_title'	=> 'Footer',
        'parent_slug'	=> 'theme-general-settings',
    ));

    acf_add_options_sub_page(array(
        'page_title' 	=> 'Параметры общие',
        'menu_title'	=> 'Общие',
        'parent_slug'	=> 'theme-general-settings',
    ));
    acf_add_options_sub_page(array(
        'page_title' 	=> 'Параметры Контакты',
        'menu_title'	=> 'Контакты',
        'parent_slug'	=> 'theme-general-settings',
    ));

}

add_action( 'init', 'register_post_types' );
function register_post_types(){

    register_post_type( 'main-slider', [
        'label'  => null,
        'labels' => [
            'name'               => 'Слайдер', // основное название для типа записи
            'singular_name'      => 'Слайдер', // название для одной записи этого типа
            'add_new'            => 'Добавить слайд', // для добавления новой записи
            'add_new_item'       => 'Добавление слайда', // заголовка у вновь создаваемой записи в админ-панели.
            'edit_item'          => 'Редактирование слайда', // для редактирования типа записи
            'new_item'           => 'Новый слайд', // текст новой записи
            'view_item'          => 'Смотреть слайд', // для просмотра записи этого типа.
            'search_items'       => 'Искать слайд', // для поиска по этим типам записи
            'not_found'          => 'Не найдено', // если в результате поиска ничего не было найдено
            'not_found_in_trash' => 'Не найдено в корзине', // если не было найдено в корзине
            'parent_item_colon'  => '', // для родителей (у древовидных типов)
            'menu_name'          => 'Слайдер', // название меню
        ],
        'description'         => '',
        'public'              => true,
        // 'publicly_queryable'  => null, // зависит от public
        // 'exclude_from_search' => null, // зависит от public
        // 'show_ui'             => null, // зависит от public
        // 'show_in_nav_menus'   => null, // зависит от public
        'show_in_menu'        => null, // показывать ли в меню адмнки
        // 'show_in_admin_bar'   => null, // зависит от show_in_menu
        'show_in_rest'        => null, // добавить в REST API. C WP 4.7
        'rest_base'           => null, // $post_type. C WP 4.7
        'menu_position'       => null,
        'menu_icon'           => 'dashicons-businessman',
        //'capability_type'   => 'post',
        //'capabilities'      => 'post', // массив дополнительных прав для этого типа записи
        //'map_meta_cap'      => null, // Ставим true чтобы включить дефолтный обработчик специальных прав
        'hierarchical'        => false,
        'supports'            => [ 'title'], // 'title','editor','author','thumbnail','excerpt','trackbacks','custom-fields','comments','revisions','page-attributes','post-formats'
        'taxonomies'          => [],
        'has_archive'         => true,
        'rewrite'             => true,
        'query_var'           => true,
    ] );
    register_post_type( 'FAQ', [
        'label'  => null,
        'labels' => [
            'name'               => 'FAQ', // основное название для типа записи
            'singular_name'      => 'FAQ', // название для одной записи этого типа
            'add_new'            => 'Добавить вопрос', // для добавления новой записи
            'add_new_item'       => 'Добавление вопроса', // заголовка у вновь создаваемой записи в админ-панели.
            'edit_item'          => 'Редактирование вопроса', // для редактирования типа записи
            'new_item'           => 'Новый вопрос', // текст новой записи
            'view_item'          => 'Смотреть вопрос', // для просмотра записи этого типа.
            'search_items'       => 'Искать вопрос', // для поиска по этим типам записи
            'not_found'          => 'Не найдено', // если в результате поиска ничего не было найдено
            'not_found_in_trash' => 'Не найдено в корзине', // если не было найдено в корзине
            'parent_item_colon'  => '', // для родителей (у древовидных типов)
            'menu_name'          => 'FAQ', // название меню
        ],
        'description'         => '',
        'public'              => true,
        // 'publicly_queryable'  => null, // зависит от public
        // 'exclude_from_search' => null, // зависит от public
        // 'show_ui'             => null, // зависит от public
        // 'show_in_nav_menus'   => null, // зависит от public
        'show_in_menu'        => null, // показывать ли в меню адмнки
        // 'show_in_admin_bar'   => null, // зависит от show_in_menu
        'show_in_rest'        => null, // добавить в REST API. C WP 4.7
        'rest_base'           => null, // $post_type. C WP 4.7
        'menu_position'       => null,
        'menu_icon'           => 'dashicons-businessman',
        //'capability_type'   => 'post',
        //'capabilities'      => 'post', // массив дополнительных прав для этого типа записи
        //'map_meta_cap'      => null, // Ставим true чтобы включить дефолтный обработчик специальных прав
        'hierarchical'        => false,
        'supports'            => [ 'title', 'editor'], // 'title','editor','author','thumbnail','excerpt','trackbacks','custom-fields','comments','revisions','page-attributes','post-formats'
        'taxonomies'          => [],
        'has_archive'         => true,
        'rewrite'             => true,
        'query_var'           => true,
    ] );
}
//add_action( 'wp_default_scripts', 'remove_jq_migrate' );
//function remove_jq_migrate( $scripts ) {
//    if ( ! is_admin() && isset( $scripts->registered['jquery'] ) ) {
//        $script = $scripts->registered['jquery'];
//        if ( $script->deps ) {
//            $script->deps = array_diff( $script->deps, array( 'jquery-migrate' ) );
//        }
//    }
//}

// Add to cart
add_filter( 'woocommerce_product_single_add_to_cart_text', 'tb_woo_custom_cart_button_text' );
add_filter( 'woocommerce_product_add_to_cart_text', 'tb_woo_custom_cart_button_text' );
function tb_woo_custom_cart_button_text() {
    return __( 'Добавить в корзину', 'woocommerce' );
}

/* Изменяет символ валюты на буквы */
add_filter('woocommerce_currency_symbol', 'change_existing_currency_symbol', 10, 2);

function change_existing_currency_symbol( $currency_symbol, $currency ) {
    switch( $currency ) {
        case 'RUB': $currency_symbol = 'руб.'; break;
    }
    return $currency_symbol;
}

add_filter( 'woocommerce_product_tabs', 'woo_remove_product_tabs', 98 );
function woo_remove_product_tabs( $tabs ) {
    unset( $tabs['additional_information'] );
    return $tabs;
}

if ( defined( 'YITH_WCWL' ) && ! function_exists( 'yith_wcwl_get_items_count' ) ) {
    function yith_wcwl_get_items_count() {
        ob_start();
        ?>
        <span class="yith-wcwl-items-count">
      <i class="yith-wcwl-icon">
    <?php echo esc_html( yith_wcwl_count_all_products() ); ?>
      </i>
  </span>
        <?php
        return ob_get_clean();
    }
    add_shortcode( 'yith_wcwl_items_count', 'yith_wcwl_get_items_count' );
}

if ( defined( 'YITH_WCWL' ) && ! function_exists( 'yith_wcwl_ajax_update_count' ) ) {
    function yith_wcwl_ajax_update_count() {
        wp_send_json( array(
            'count' => yith_wcwl_count_all_products()
        ) );
    }
    add_action( 'wp_ajax_yith_wcwl_update_wishlist_count', 'yith_wcwl_ajax_update_count' );
    add_action( 'wp_ajax_nopriv_yith_wcwl_update_wishlist_count', 'yith_wcwl_ajax_update_count' );
}

if ( defined( 'YITH_WCWL' ) && ! function_exists( 'yith_wcwl_enqueue_custom_script' ) ) {
    function yith_wcwl_enqueue_custom_script() {
        wp_add_inline_script(
            'jquery-yith-wcwl',
            "
        jQuery( function( $ ) {
          $( document ).on( 'added_to_wishlist removed_from_wishlist', function() {
            $.get( yith_wcwl_l10n.ajax_url, {
              action: 'yith_wcwl_update_wishlist_count'
            }, function( data ) {
              $('.yith-wcwl-items-count').html( data.count );
            } );
          } );
        } );
      "
        );
    }
    add_action( 'wp_enqueue_scripts', 'yith_wcwl_enqueue_custom_script', 20 );
}

remove_action('load-update-core.php', 'wp_update_plugins');
add_filter('pre_site_transient_update_plugins', create_function('$a', "return null;") );
wp_clear_scheduled_hook('wp_update_plugins');

//add_filter( 'woocommerce_cart_ready_to_calc_shipping', 'disable_shipping_calc_on_cart', 99 );

// Отключаем ненужные поля ввода при заказе
add_filter('woocommerce_checkout_fields','remove_checkout_fields');
function remove_checkout_fields($fields){
    //unset($fields['billing']['billing_first_name']);
    //unset($fields['billing']['billing_last_name']);
    unset($fields['billing']['billing_company']); // Отключено
    //unset($fields['billing']['billing_address_1']);
    unset($fields['billing']['billing_address_2']); // Отключено
//    unset($fields['billing']['billing_city']); // Отключено
    unset($fields['billing']['billing_postcode']); // Отключено
    unset($fields['billing']['billing_country']); // Отключено
    unset($fields['billing']['billing_state']); // Отключено
    //unset($fields['billing']['billing_phone']);
    //unset($fields['order']['order_comments']);
    //unset($fields['billing']['billing_email']);
    unset($fields['account']['account_username']); // Отключено
    unset($fields['account']['account_password']); // Отключено
    unset($fields['account']['account_password-2']); // Отключено
    return $fields;
}
add_filter( 'woocommerce_checkout_fields' , 'custom_override_checkout_fields' );
function custom_override_checkout_fields( $fields ) {
    unset($fields['billing']['billing_country']); // Отключаем страны оплаты
    unset($fields['shipping']['shipping_country']);// Отключаем страны доставки
    return $fields;
}

add_filter('woocommerce_get_image_size_thumbnail', function ($size) {
    return array(
        'width'  => 250,
        'height' => 400,
        'crop' => 0,
    );
});
