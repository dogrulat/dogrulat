<?php get_header(); ?> 

<div class="container">

    <div class="posts">
        <?php if(have_posts()) : ?><?php while(have_posts()) : the_post(); ?>
        
        <?php 
            $imgsrcparam = array(
                'alt'   => trim(strip_tags( $post->post_excerpt )),
                'title' => trim(strip_tags( $post->post_title )),
            );
            $thumbID = get_the_post_thumbnail( $post->ID, 'background', $imgsrcparam );
        ?>

        <div class="post-preview">
            <a href="<?php the_permalink() ?>"><?php echo "$thumbID"; ?></a>
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
                <span><?php $cur_date = get_the_date('d F Y'); echo $cur_date; ?>
                </span>
            </div>

        </div> <!-- end of preview" -->

        <?php 
            endwhile; 
            else :
            endif;
        ?>

    </div> <!-- end of posts -->

    <br style="clear: both" />

    <div class="navlinks">
        <?php echo get_default_pagination(); ?>
    </div>

</div><!-- /.container -->

<?php get_footer(); ?>
