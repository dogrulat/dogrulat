<?php
    function build_menu_items() {
        $menu_list = '';
        $menu_name = '';

        // todo: there must be a better way to get the default menu name.
        // just using the first menu
        $menus = wp_get_nav_menus();
        if(sizeof($menus) > 0) {
            $menu_name = $menus[0]->name;
        }

        if (($menu = wp_get_nav_menu_object($menu_name)) && (isset($menu))) {
            $menu_items = wp_get_nav_menu_items($menu->term_id);

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
    require_once('admin-menu.php');

    add_theme_support('post-thumbnails');
?>