<?php
    include_once( ABSPATH . 'wp-admin/includes/plugin.php' );

    if(is_plugin_active('polylang/polylang.php')) {
        pll_register_string("Translations", "Translations");
    }

    function build_menu_items() {

        $menu_location = get_nav_menu_locations()['header-menu'];

        if (isset($menu_location)) {
            $menu_items = wp_get_nav_menu_items($menu_location);

            foreach ((array) $menu_items as $key => $menu_item) {
                $title = $menu_item->title;
                $url = $menu_item->url;
                $menu_list .= '<li><a href="' . $url . '">' . $title . '</a></li>';
            }
        }

        return $menu_list;
    }

    function register_default_menu() {
      register_nav_menu(
          'header-menu',__( 'Header Menu' )
      );
    }
    
    add_action( 'init', 'register_default_menu' );

    function get_default_pagination() {
        global $wp_query;

        $big = 999999999; // need an unlikely integer

        return paginate_links( array(
            'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
            'format' => '?paged=%#%',
            'current' => max( 1, get_query_var('paged') ),
            'total' => $wp_query->max_num_pages,
            'prev_text'    => __('« Daha yeni'),
            'next_text'    => __('Daha eski »')
        ));
    }

    function get_truthiness_level($truthiness) {
        $level = 'yalan';
        switch($truthiness) {
            case 'DOĞRU':
                $level = 'dogru';
                break;
            case 'ÇOĞU DOĞRU':
                $level = 'cogudogru';
                break;
            case 'YARI DOĞRU':
                $level = 'yaridogru';
                break;
            case 'AZ DOĞRU':
                $level = 'azdogru';
                break;
            case 'YALAN':
                $level = 'yalan';
                break;
            default:
                break;
        }

        return $level;
    }

    require_once(ABSPATH . '/wp-admin/includes/template.php');
    require_once('theme-options/admin-menu.php');

    add_theme_support('post-thumbnails');

    function translate_read_this($lang) {
        switch($lang) {
            case 'English':
                return 'Read this post in English';
            case 'Türkçe':
                return 'Bu yazıyı Türkçe okuyun';
            default:
                return 'Read this post in ' . $lang;
        }
    }
?>