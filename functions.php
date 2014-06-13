<?php
    include_once( ABSPATH . 'wp-admin/includes/plugin.php' );

    if(is_plugin_active('polylang/polylang.php')) {
        pll_register_string("Translations", "Translations");
        pll_register_string("Share", "Share");
        pll_register_string("Recent Posts", "Recent Posts");
        pll_register_string("Categories", "Categories");
        pll_register_string("Tags", "Tags");

        pll_register_string("January", "January");
        pll_register_string("February", "February");
        pll_register_string("March", "March");
        pll_register_string("April", "April");
        pll_register_string("May", "May");
        pll_register_string("June", "June");
        pll_register_string("July", "July");
        pll_register_string("August", "August");
        pll_register_string("September", "September");
        pll_register_string("October", "October");
        pll_register_string("November", "November");
        pll_register_string("December", "December");

        pll_register_string("Older", "Older");
        pll_register_string("Newer", "Newer");

        pll_register_string("Tagline", "Tagline");

        pll_register_string("No Posts", "No Posts");
    }

    function build_menu_items() {
        $menu_list = '';

        $menu_locations = get_nav_menu_locations();
        if(!isset($menu_locations)) {
            return '';
        } 

        $menu_location = $menu_locations['header-menu'];

        if (isset($menu_location)) {
            $menu_items = wp_get_nav_menu_items($menu_location);

            // here I am creating a data structure for menu items with submenus
            // for the sake of simplicity there is only one level of submenus ie. no submenus of submenus
            // since arrays are immutable in php, I had to use Linked Lists to append submenus to parents.
            $menu_items_ds = array();
            foreach ((array) $menu_items as $key => $menu_item) {
                if(!$menu_item->menu_item_parent) {
                    array_push($menu_items_ds, array('title'=>$menu_item->title, 'url'=>$menu_item->url, 'ID'=>$menu_item->ID, 'children'=>new SplDoublyLinkedList()));
                }
                else {
                    // find the parent
                    for($i=0; $i< count($menu_items_ds); $i = $i + 1) {
                        $menu_parent = $menu_items_ds[$i];

                        if($menu_parent['ID'] == $menu_item->menu_item_parent) {
                            $menu_parent['children']->push(array('title'=>$menu_item->title, 'url'=>$menu_item->url, 'ID'=>$menu_item->ID));
                        }
                    }
                }
            }

            // creating the html from the data structure
            foreach((array) $menu_items_ds as $menu_item) {
                $title = $menu_item['title'];
                $url = $menu_item['url'];

                if($menu_item['children']->count()) {
                    $children_list = $menu_item['children'];

                    $menu_list .= '<li class="dropdown">';
                    $menu_list .= '    <a class="dropdown-toggle custom-dd" data-toggle="dropdown" href="' . $url . '">' . $title . ' <b class="caret"></b></a>';
                    $menu_list .= '    <ul class="dropdown-menu" role="menu">';

                    $children_list->setIteratorMode(SplDoublyLinkedList::IT_MODE_FIFO);
                    for ($children_list->rewind(); $children_list->valid(); $children_list->next()) {
                        $current_child = $children_list->current();
                        $menu_list .= '<li><a href="' . $current_child['url'] . '">' . $current_child['title'] . '</a></li>';
                    }

                    $menu_list .= '    </ul>';
                    $menu_list .= '</li>';
                }
                else {
                    $menu_list .= '<li><a href="' . $url . '">' . $title . '</a></li>';
                }
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
            'prev_text'    => __('« ' . pll__("Older")),
            'next_text'    => __(pll__("Newer") . ' »')
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

//    require_once(ABSPATH . '/wp-admin/includes/template.php');
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

    function get_post_date() {
        $month = pll__(get_the_date('F'));
        echo str_replace('%%%', $month, get_the_date('d %%% Y')) ;
    }
?>