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
            if(is_plugin_active('polylang/polylang.php')) {
                $all_langs_name = pll_languages_list(array('fields' => 'name'));
                $all_langs_slug = pll_languages_list();
                $curr_lang = pll_current_language();
                $result = '';

                for($i = 0; $i < count($all_langs_slug); $i = $i + 1) {

                    if($all_langs_slug[$i] !== $curr_lang) {
                        $trans_post_id = pll_get_post($post->ID, $all_langs_slug[$i]);
                        if($trans_post_id) {
                            // make sure the post is published
                            if(get_post_status($trans_post_id) == 'publish') {
                                $result = $result . '<li><a href="' . get_permalink($trans_post_id) . '">' . $all_langs_name[$i] . '</a></li>';
                            }
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

    <div id="sharing">
        <h2><?php echo pll__("Share"); ?></h2>

        <?php 
            if(is_plugin_active('simple-share-buttons-adder/simple-share-buttons-adder.php')) {
                echo do_shortcode('[ssba]');
            }
            else {
        ?>
        <div class="fb-share">
            <div class="fb-share-button" data-href="<?php echo get_permalink($post->ID); ?>" data-type="button_count"></div>
        </div>

        <div class="twitter-share">
            <a href="https://twitter.com/share" class="twitter-share-button" data-via="dogrulat">Tweet</a>
            <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>
        </div>

        <?php } ?>
    </div>

    <div id="recent-posts">
        <h2><?php echo pll__("Recent Posts"); ?></h2>
        <ul>
<?php
    $max_count = 5;
    $recent_posts = wp_get_recent_posts(array('post_status' => 'publish',
                                              'numberposts' => $max_count));

    foreach( $recent_posts as $recent ){
        echo '<li><a href="' . get_permalink($recent["ID"]) . '" title="' . esc_attr($recent["post_title"]) . '" >' . $recent["post_title"].'</a></li>';
    }
?>
        </ul>
    </div>
</div>