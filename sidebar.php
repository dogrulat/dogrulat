<div id="sidebar">
    <div id="truth-panel">
    <?php
        $truthiness = trim(get_post_meta( $post->ID, 'post_truthiness', true));
        if($truthiness !== '') {
            $level = get_truthiness_level($truthiness);
            printf('<h2 class="truthiness truthiness-%s">%s</h2>', $level, $truthiness);
            printf('<div class="truth-level"><div class="level level-%s">&nbsp;</div></div>', $level);
        }
    ?>
    </div>

    <div id="translations">
        <?php
            include_once( ABSPATH . 'wp-admin/includes/plugin.php' );

            if(is_plugin_active('polylang/polylang.php')) {
                $all_langs_name = pll_languages_list(array('fields' => 'name'));
                $all_langs_slug = pll_languages_list();
                $curr_lang = pll_current_language();
                $result = '';

                for($i = 0; $i < count($all_langs_slug); $i = $i + 1) {

                    if($all_langs_slug[$i] !== $curr_lang) {
                        $trans_post_id = pll_get_post($post->ID, $all_langs_slug[$i]);
                        if($trans_post_id) {
                            $result = $result . '<li><a href="' . get_permalink($trans_post_id) . '">' . $all_langs_name[$i] . '</a></li>';
                        }
                    }
                }

                if($result !== '') {
                    echo '<h2>'. pll__("Translations") .'</h2>';
                    echo '<ul>' . $result . '</ul>';
                }
            }

        ?>
    </div>

    <div id="recent-posts">
        <h2>Son Yazılar</h2>
        <ul>
<?php
    $max_count = 5;
    $recent_posts = wp_get_recent_posts();
    if(count($recent_posts) > $max_count) {
        $recent_posts = array_slice($recent_posts, 0, $max_count);
    }

    foreach( $recent_posts as $recent ){
        echo '<li><a href="' . get_permalink($recent["ID"]) . '" title="Look '.esc_attr($recent["post_title"]).'" >' .   $recent["post_title"].'</a> </li> ';
    }
?>
        </ul>
    </div>
</div>