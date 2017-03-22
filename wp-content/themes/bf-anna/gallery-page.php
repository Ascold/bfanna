<?php
/**
 * Template Name: MyGallery
 */

get_header(); ?>

    <section>
        <div class="container">
            <li class="album-grid"><a href="<?php the_permalink(); ?>"
                                      title="<?php the_title(); ?>"><?php the_post_thumbnail('album-grid'); ?></a></li>

            <?php if ($post->post_type == 'albums' && $post->post_status == 'publish') {
                $attachments = get_posts(array(
                    'post_type' => 'attachment',
                    'posts_per_page' => -1,
                    'post_parent' => $post->ID,
                    'exclude' => get_post_thumbnail_id()

                ));
                if ($attachments) {
                    foreach ($attachments as $attachment) {
                        $class = "post-attachment mime-" . sanitize_title($attachment->post_mime_type);
                        $title = wp_get_attachment_link($attachment->ID, 'album-grid', true);
                        echo '<li class="' . $class . ' album-grid">' . $title . '</li>';
                    }
                }
            }
            ?>
        </div>
    </section>

<?php

get_footer();
