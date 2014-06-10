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