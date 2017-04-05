<?php get_header(); ?>

    <div id="primary" class="content-area container-inner blog-page">
        <main id="main" class="site-main" role="main">
            <h2><?php echo get_the_title($_GET['page_id']) ?></h2>

            <?php if (have_posts()): ?>

                <ul class="event-post-items">

                    <?php while (have_posts()): ?>

                            <?php get_template_part('post', 'preview') ?>

                    <?php endwhile; ?>

                </ul>

            <?php endif; ?>

        </main><!-- #main -->
    </div><!-- #primary -->


<?php get_footer(); ?>