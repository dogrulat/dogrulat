<?php
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
?>