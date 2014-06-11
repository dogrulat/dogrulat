<?php get_header(); ?> 

<div class="container">

        <?php if(have_posts()) { ?>

        <div class="posts">
            <ul id="col_1" class="col">
        <?php while(have_posts()) : the_post(); ?>
        <?php 
            $imgsrcparam = array(
                'alt'   => trim(strip_tags( $post->post_excerpt )),
                'title' => trim(strip_tags( $post->post_title )),
            );
        ?>

        <li><div class="post-preview">
            <a href="<?php the_permalink() ?>">
                <?php  
                    if(has_post_thumbnail()) {
                        the_post_thumbnail();
                    }
                    else {
                        echo '<img src="' . get_bloginfo('template_directory') . '/img/thumbnail.png" />';
                    }
                ?>
            </a>
            <div class="hometitle">

            <?php
                $truthiness = trim(get_post_meta( $post->ID, 'post_truthiness', true));
                if($truthiness !== '') {
                    $level = get_truthiness_level($truthiness);
                    printf('<span class="truthiness truthiness-%s">%s</span>', $level, $truthiness);
                }
            ?>

            <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a>
        </div> <!-- end of hometitle -->

            <?php 
                $summary = get_post_meta( $post->ID, 'post_summary', true);
                if(trim($summary)!=='') {
                    printf('<div class="homesummary"><span>%s</span></div>', $summary);
                }
            ?>

            <div class="homedate">
                <span><?php get_post_date(); ?></span>
            </div>

        </div> <!-- end of post-preview" -->
        </li>

        <?php 
            endwhile; 
        ?>
        </ul>
        </div> <!-- end of posts -->
        
        <?php 
            }
            else {
                echo '<h2 class="no-posts">' . pll__("No Posts") . '</h2>';
            }
        ?>

    <br style="clear: both" />

    <div class="navlinks">
        <?php echo get_default_pagination(); ?>
    </div>

</div><!-- /.container -->

<?php get_footer(); ?>
