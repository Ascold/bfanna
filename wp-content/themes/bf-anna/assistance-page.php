<?php
/*
Template Name: Assictance Page
*/
?>

<?php get_header(); ?>
<?php $post = get_post(); ?>

<div id="primary" class="content-area container-inner assistance-page">
    <main id="main" class="site-main" role="main">

        <h2> <?php echo get_field('assistance_page_title') ?> </h2>

        <div class="assistance-wrapper clearfix">
            <h3 class="assistance-title"> <?php echo get_field('assistance_title') ?> </h3>
            <div class="assistance-requisites">
                <?php echo get_field('assistance_requisites') ?>
            </div>

        </div>

    </main><!-- #main -->
</div><!-- #primary -

<?php get_footer(); ?>
