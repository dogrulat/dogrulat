<?php get_header(); ?>

<div id="main">
    <?php if(have_posts()) : ?><?php while(have_posts()) : the_post(); ?>
        <div class="post">
            <h1 id="post-title">
            <?php 
                $truthiness = trim(get_post_meta( $post->ID, 'post_truthiness', true));
                            if($truthiness!=='') {
                    echo('[' . $truthiness . ']');
                }
            ?> <?php the_title(); ?>
            </h1>
            <div class="post-date">
                <span><?php $cur_date = get_the_date('d F Y'); echo $cur_date; ?></span>
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