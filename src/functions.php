<?php

add_action( 'init', 'sheensay_disable_emojis' );
 
function sheensay_disable_emojis() {
  remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
  remove_action( 'wp_print_styles', 'print_emoji_styles' );
  remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
  remove_action( 'admin_print_styles', 'print_emoji_styles' );
  remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
  remove_filter( 'comment_text_rss', 'wp_staticize_emoji' );
  remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );
 
  add_filter( 'tiny_mce_plugins', 'sheensay_disable_emojis_tinymce' );
  add_filter( 'wp_resource_hints', 'sheensay_disable_emojis_remove_dns_prefetch', 10, 2 );
}
 
function sheensay_disable_emojis_tinymce( $plugins ) {
  if ( is_array( $plugins ) ) {
    return array_diff( $plugins, array( 'wpemoji' ) );
  } else {
    return array();
  }
}
 
function sheensay_disable_emojis_remove_dns_prefetch( $urls, $relation_type ) {
  if ( 'dns-prefetch' == $relation_type ) {
    /** This filter is documented in wp-includes/formatting.php */
    $emoji_svg_url = apply_filters( 'emoji_svg_url', 'https://s.w.org/images/core/emoji/2.2.1/svg/' );
 
    $urls = array_diff( $urls, array( $emoji_svg_url ) );
  }
 
  return $urls;
}

add_action( 'init', 'remove_head_trash' ); // отключаем лишние скрипты
    
function remove_head_trash() {
    
    remove_action('wp_head','rsd_link');  // сервис Really Simple Discovery
        
    remove_action('wp_head','wp_shortlink_wp_head', 10, 0 );
    remove_action( 'wp_head', 'rest_output_link_wp_head');
    remove_action( 'wp_head', 'wp_oembed_add_discovery_links');
    remove_action( 'template_redirect', 'rest_output_link_header', 11, 0 );
  
    remove_action( 'wp_head', 'wp_generator' );
    remove_action( 'wp_head', 'rel_canonical' ); 

    // Используется для сервиса Really Simple Discovery 
    remove_action( 'wp_head', 'rsd_link' ); 
 
    // Удаляем link rel="wlwmanifest" type="application/wlwmanifest+xml" Используется Windows Live Writer
    remove_action( 'wp_head', 'wlwmanifest_link' );
 
    // Удаляем различные ссылки link rel на главную страницу
    remove_action( 'wp_head', 'index_rel_link' ); 
    // на первую запись
    remove_action( 'wp_head', 'start_post_rel_link', 10 );  
    // на предыдущую запись
    remove_action( 'wp_head', 'parent_post_rel_link', 10 ); 
    // на следующую запись
    remove_action( 'wp_head', 'adjacent_posts_rel_link', 10 );
 
    // Удаляем связь с родительской записью
    remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10 ); 
 
    // Удаляем вывод /feed/
    remove_action( 'wp_head', 'feed_links', 2 );

    // Удаляем вывод /feed/ для записей, категорий, тегов и подобного
    remove_action( 'wp_head', 'feed_links_extra', 3 );
 
    // Удаляем ненужный css плагина WP-PageNavi
    remove_action( 'wp_head', 'pagenavi_css' ); 
    
  }

  add_filter('show_admin_bar', '__return_false');
  
  require_once dirname(__FILE__) . "/ui/Ui_adapter.php";

$main = new Ui_adapter();
// $main->get_page();

