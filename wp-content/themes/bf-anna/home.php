<?php
get_header();

if (have_posts()):
    while (have_posts()):
        the_post(); ?>
    <div class="post-item">
        <div class="post-thumbnail">

        </div>
        <div clss="post-exerpt">

        </div>

    </div>

<?php    endwhile;
endif;

get_footer();