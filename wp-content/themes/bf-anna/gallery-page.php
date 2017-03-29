<?php
/**
 * Template Name: MyGallery
 */
get_header(); ?>
    <section class="gallery-page">
        <div class="container-inner">
            <div id="primary" class="content-area">
                <main id="main" class="site-main" role="main">
                    <div class="album-block">
                        <?php
                        $args = array(
                            'post_type' => 'photo_gallery_img',
                            'posts_per_page' => -1
                        );
                        $the_query = new WP_Query($args); ?>
                        <?php if ($the_query->have_posts()) : ?>
                            <!-- pagination here -->
                            <!-- the loop -->
                            <?php while ($the_query->have_posts()) : $the_query->the_post(); ?>
                                <div class="album-gallery">
                                    <?php if (has_post_thumbnail()) { ?>
                                        <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
                                            <?php the_post_thumbnail('thumb-gallery'); ?>
                                        </a>
                                    <?php } ?>
                                    <?php if (get_post_meta($post->ID, 'date-album', true)) : ?>
                                        <div class="album-date">
                                            <?php echo get_post_meta($post->ID, 'date-album', true) ?>
                                        </div>
                                    <?php endif; ?>
                                    <div class="album-title">
                                        <?php the_title() ?>
                                    </div>
                                </div>
                            <?php endwhile; ?>
                            <!-- end of the loop -->
                            <!-- pagination here -->

                            <?php wp_reset_postdata(); ?>
                        <?php else : ?>
                            <p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
                        <?php endif; ?>
                    </div>
                </main><!-- #main -->
            </div><!-- #primary -->
        </div>
    </section>
<?php

get_footer();