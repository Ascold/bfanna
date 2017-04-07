<?php get_header(); ?>

<div id="primary" class="content-area container-inner events-single-post">
    <main id="main" class="site-main" role="main">
        <div class="single-post-wrapper">
            <?php the_post(); ?>
            <?php
            $post_year = get_the_date('Y');
            $post_month = get_the_date('m');
            $post_day = get_the_date('d');
            ?>
            <h2> <?php echo get_the_title(); ?> </h2>
            <div class="post-thumbnail">
                <img src="<?php echo get_the_post_thumbnail_url(); ?>"
                     alt="<?php echo get_the_title() ?>">
            </div>
            <div class="post-date">
                <a href="<?php echo get_day_link($post_year, $post_month, $post_day); ?>"> <?php echo $post_day; ?> </a>
                <span>/</span>
                <a href="<?php echo get_month_link($post_year, $post_month); ?>"> <?php echo $post_month; ?> </a>
                <span>/</span>
                <a href="<?php echo get_year_link($post_year); ?>"> <?php echo $post_year; ?></a>
            </div>
            <p class="post-content">
                <?php the_content(); ?>
            </p>
            <?php rewind_posts(); ?>
        </div>
    </main><!-- #main -->
</div><!-- #primary -->

<?php get_footer(); ?>
