<?php get_header(); ?>

<div id="main">
    <?php get_sidebar(); ?>

    <?php if(have_posts()) : ?><?php while(have_posts()) : the_post(); ?>
        <div class="post">
            <h1 id="post-title">
            <?php the_title(); ?>
            </h1>
            <div class="article" id="post-<?php the_ID(); ?>">
                <?php the_content(); ?>
                <div class="postmetadata">
                    <?php if(trim(get_the_category_list())!=='') { printf('<span>Kategori:</span> %s', get_the_category_list(', ')); } ?><br />
                    <?php the_tags('<span>Etiketler:</span>' . ' ', ', ', '<br />'); ?>
                    <?php edit_post_link('[Edit this entry]', '<br />', ''); ?>
                </div>
            </div>

    <?php endwhile;
        else : // some error message is appropriate here
        endif;
    ?>

    </div>
</div>

<?php get_footer(); ?>