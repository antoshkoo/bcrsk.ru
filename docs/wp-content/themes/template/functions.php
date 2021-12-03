<?php
add_theme_support( 'post-thumbnails' );
set_post_thumbnail_size( 300, 160, true );
add_image_size( 'post-thumbnail-small', 300, 160 );
add_image_size( 'post-thumbnail-big', 1600, 1200 );

//Удаляем ссылку из меню на текущую категорию
function no_link_current_page( $p ) {
    return preg_replace( '%((current_page_item|current-menu-item)[^<]+)[^>]+>([^<]+)</a>%', '$1<span>$3</span>', $p, 1 );
}
add_filter('wp_nav_menu', 'no_link_current_page');

//Удаляем лишние классы из меню
add_filter ('wp_nav_menu','strip_empty_classes');
function strip_empty_classes($menu) {
    $menu = preg_replace('/ class=(["\'])(?!active)(?!list-menu).*?\1/','',$menu);
    return $menu;
}
add_filter( 'nav_menu_item_id', '__return_empty_string' );

//Tonny New
add_filter( 'image_send_to_editor', 'fancy_capable', 10, 8);
       function fancy_capable($html, $id, $caption, $title, $align, $url, $size, $alt ) {
           $url = wp_get_attachment_url($id);
           $html = '<figure itemprop="image" itemscope itemtype="https://schema.org/ImageObject" class="image"><img itemprop="image" src="' . $url .  '" alt="' . $alt . '"/></figure>';
           return $html;
       }
remove_filter( 'the_content', 'wpautop' );

add_action( 'wp_print_scripts', 'my_deregister_javascript', 1 );
function my_deregister_javascript() {
wp_deregister_script( 'contact-form-7' );
//wp_deregister_script( 'wp-embed' ); - глючило редактирвание в 5.0 версии
}
function wps_deregister_styles() {
    wp_dequeue_style( 'wp-block-library' );
}
add_action( 'wp_print_styles', 'wps_deregister_styles', 100 );

add_filter('rest_enabled', '__return_false');
// Отключаем фильтры REST API
remove_action( 'xmlrpc_rsd_apis', 'rest_output_rsd' );
remove_action( 'wp_head', 'rest_output_link_wp_head', 10, 0 );
remove_action( 'template_redirect', 'rest_output_link_header', 11, 0 );
remove_action( 'auth_cookie_malformed', 'rest_cookie_collect_status' );
remove_action( 'auth_cookie_expired', 'rest_cookie_collect_status' );
remove_action( 'auth_cookie_bad_username', 'rest_cookie_collect_status' );
remove_action( 'auth_cookie_bad_hash', 'rest_cookie_collect_status' );
remove_action( 'auth_cookie_valid', 'rest_cookie_collect_status' );
remove_filter( 'rest_authentication_errors', 'rest_cookie_check_errors', 100 );
// Отключаем события REST API
remove_action( 'init', 'rest_api_init' );
remove_action( 'rest_api_init', 'rest_api_default_filters', 10, 1 );
remove_action( 'parse_request', 'rest_api_loaded' );
// Отключаем Embeds связанные с REST API
remove_action( 'rest_api_init', 'wp_oembed_register_route' );
remove_filter( 'rest_pre_serve_request', '_oembed_rest_pre_serve_request', 10, 4 );

remove_action('wp_head', 'print_emoji_detection_script', 7);
remove_action('wp_print_styles', 'print_emoji_styles');
remove_action( 'wp_head', 'wp_resource_hints', 2);
remove_action('wp_head', 'wp_generator');
remove_action('wp_head', 'wlwmanifest_link');
remove_action('wp_head', 'rsd_link');
remove_action( 'wp_head', 'wp_oembed_add_discovery_links');

//remove_action('wp_head','feed_links_extra', 3); // убирает ссылки на rss категорий
//remove_action('wp_head','feed_links', 2); // минус ссылки на основной rss и комментарии

remove_action('wp_head', 'wp_shortlink_wp_head');
remove_action('template_redirect', 'wp_shortlink_header');

add_action('do_feed', 'fb_disable_feed', 1);
add_action('do_feed_rdf', 'fb_disable_feed', 1);
add_action('do_feed_rss', 'fb_disable_feed', 1);
add_action('do_feed_rss2', 'fb_disable_feed', 1);
add_action('do_feed_atom', 'fb_disable_feed', 1);

remove_action( 'wp_head', 'feed_links_extra', 3 );
remove_action( 'wp_head', 'feed_links', 2 );
remove_action( 'wp_head', 'rsd_link' );

add_filter('pre_handle_404', 'myhook_disable_author_archive', 10, 2 );
function myhook_disable_author_archive( $flag, $wp_query ) {
   // если это авторский архив:
   if (is_month() || is_year()  || is_day()) {
      //вернем 404ю страницу
      $wp_query->set_404();
      status_header( 404 );
      nocache_headers();
      //сигнализируем об обработке статуса страницы вручную
      return true;
   }
   return $flag;
}
add_action( 'template_redirect', function(){
    ob_start( function( $buffer ){
        $buffer = str_replace( array( 'type="text/javascript"', "type='text/javascript'" ), '', $buffer );
        $buffer = str_replace( array( 'type="text/css"', "type='text/css'" ), '', $buffer );
        return $buffer;
    });
});
function my_revisions_to_keep( $revisions ) {
    return 1;
}
add_filter( 'wp_revisions_to_keep', 'my_revisions_to_keep' );

add_shortcode( 'cards', 'shortcode_cards' );

function shortcode_cards( $atts ) {
    ob_start();
   // белый список параметров
    $atts = shortcode_atts( [
        'template' => '',
    ], $atts );

    /**
     * Подключает файл по пути:
     * мой_домен/wp-content/themes/моя_тема/templates/shortcodes/переданное_имя_файла.php
     */
    get_template_part( "includes/{$atts['template']}" );
    return ob_get_clean();
}
## заменим слово «записи» на «статьи»
//$labels = apply_filters( "post_type_labels_{$post_type}", $labels );
add_filter('post_type_labels_post', 'rename_posts_labels');
function rename_posts_labels( $labels ){
    // заменять автоматически не пойдет например заменили: Запись = Статья, а в тесте получится так "Просмотреть статья"

    /* оригинал
        stdClass Object (
            'name'                  => 'Записи',
            'singular_name'         => 'Запись',
            'add_new'               => 'Добавить новую',
            'add_new_item'          => 'Добавить запись',
            'edit_item'             => 'Редактировать запись',
            'new_item'              => 'Новая запись',
            'view_item'             => 'Просмотреть запись',
            'search_items'          => 'Поиск записей',
            'not_found'             => 'Записей не найдено.',
            'not_found_in_trash'    => 'Записей в корзине не найдено.',
            'parent_item_colon'     => '',
            'all_items'             => 'Все записи',
            'archives'              => 'Архивы записей',
            'insert_into_item'      => 'Вставить в запись',
            'uploaded_to_this_item' => 'Загруженные для этой записи',
            'featured_image'        => 'Миниатюра записи',
            'set_featured_image'    => 'Задать миниатюру',
            'remove_featured_image' => 'Удалить миниатюру',
            'use_featured_image'    => 'Использовать как миниатюру',
            'filter_items_list'     => 'Фильтровать список записей',
            'items_list_navigation' => 'Навигация по списку записей',
            'items_list'            => 'Список записей',
            'menu_name'             => 'Записи',
            'name_admin_bar'        => 'Запись',
        )
    */

    $new = array(
        'name'                  => 'Помещения',
        'singular_name'         => 'Помещение',
        'add_new'               => 'Добавить помещение',
        'add_new_item'          => 'Добавить помещение',
        'edit_item'             => 'Редактировать помещение',
        'new_item'              => 'Новое помещение',
        'view_item'             => 'Просмотреть',
        'search_items'          => 'Поиск помещения',
        'not_found'             => 'Помещений не найдено.',
        'not_found_in_trash'    => 'Помещений в корзине не найдено.',
        'parent_item_colon'     => '',
        'all_items'             => 'Все помещения',
        'archives'              => 'Архив помещений',
        'insert_into_item'      => 'Вставить',
        'uploaded_to_this_item' => 'Загруженные',
        'featured_image'        => 'Миниатюра',
        'filter_items_list'     => 'Фильтровать список',
        'items_list_navigation' => 'Навигация по списку',
        'items_list'            => 'Список',
        'menu_name'             => 'Помещения',
        'name_admin_bar'        => 'Помещение', // пункте "добавить"
    );

    return (object) array_merge( (array) $labels, $new );
}
?>
