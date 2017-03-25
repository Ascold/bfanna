<?php
/**
 * Template Name: MyGallery
 */
get_header(); ?>

    <div id="primary" class="content-area">
        <main id="main" class="site-main" role="main">
            <?php
            $args = array(
                'post_type' => 'photo_gallery_img',
                'posts_per_page' => -1
            );
            $the_query = new WP_Query($args);?>

            <?php if ( $the_query->have_posts() ) : ?>

                <!-- pagination here -->

                <!-- the loop -->
                <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
                    <div>
                        <?php if ( has_post_thumbnail()) { ?>
                            <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" >
                                <?php the_post_thumbnail(array(640,640)); ?>
                            </a>
                        <?php } ?></div>
                <?php endwhile; ?>
                <!-- end of the loop -->

                <!-- pagination here -->

                <?php wp_reset_postdata(); ?>

            <?php else : ?>
                <p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
            <?php endif; ?>


        </main><!-- #main -->
    </div><!-- #primary -->


<?php

get_footer();