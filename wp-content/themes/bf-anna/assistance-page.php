<?php
/*
Template Name: Assictance Page
*/
?>

<?php get_header(); ?>
<?php the_post(); ?>

<div id="primary" class="content-area container-inner assistance-page">
    <main id="main" class="site-main" role="main">

        <h2> <?php echo get_the_title(); ?> </h2>

        <div class="assistance-wrapper clearfix">
                <?php the_content(); ?>
        </div>

    </main><!-- #main -->
</div><!-- #primary -->

<?php get_footer(); ?>
