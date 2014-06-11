<?php get_header(); ?>

<div id="main">
    <?php get_sidebar(); ?>

    <?php if(have_posts()) : ?><?php while(have_posts()) : the_post(); ?>
        <div class="post">
            <h1 id="post-title">
            <?php 
                $truthiness = trim(get_post_meta( $post->ID, 'post_truthiness', true));
                if($truthiness!=='') {
                    $level = get_truthiness_level($truthiness);
                    printf('<span class="title-truth truthiness-%s">%s</span>', $level, $truthiness);
                }
            ?> <?php the_title(); ?>
            </h1>
            <div class="post-date">
                <span><?php $cur_date = get_the_date('d F Y'); echo $cur_date; ?></span>
            </div>

            <div class="post-translations">
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
                                echo '<a href="' . get_permalink($trans_post_id) . '">' . translate_read_this($all_langs_name[$i]) . '</a><br />';
                            }
                        }
                    }
                }

            ?>
            </div>
            <div class="article" id="post-<?php the_ID(); ?>">
                <?php the_content(); ?>
                <div class="postmetadata">
                    <?php printf('<span>Kategori:</span> %s', get_the_category_list(', ')); ?><br />
                    <?php the_tags('<span>Etiketler:</span>' . ' ', ', ', '<br />'); ?>
                    <?php edit_post_link('[Edit this entry]', '<br />', ''); ?>
                </div>
            </div>

            <div id="comments">
                <?php comments_template(); ?>
            </div>

    <?php endwhile;
        else : // some error message is appropriate here
        endif;
    ?>

    </div>
</div>

<?php get_footer(); ?>