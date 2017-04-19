<?php
/**
 * Template for front page
 */
get_header();
?>
    <div class="front-page">
        <main id="main" class="site-main" role="main">
            <!-- This is a carousel section-->
            <section class="main-carousel">
                <?php $args = array(
                    'post_type' => 'slider_post'
                );
                $slider = new WP_Query($args);
                if ($slider->have_posts()) : ?>
                    <div id="myCarousel" class="carousel slide" data-ride="carousel">
                        <!-- Indicators -->
                        <ol class="carousel-indicators">
                            <?php
                            $carousel_indicators = 0;
                            $published_posts = wp_count_posts('slider_post')->publish;
                            while ($carousel_indicators < $published_posts) : ?>
                                <li data-target="#myCarousel"
                                    data-slide-to="<?php echo $carousel_indicators; ?>"
                                    class="<?php echo ($carousel_indicators == 0) ? "active" : null ?>"></li>
                                <?php $carousel_indicators++;
                            endwhile; ?>
                        </ol>
                        <!-- Slides-->
                        <ul class="carousel-inner" role="listbox">
                            <?php $i = 0;
                            while ($slider->have_posts()) :
                                $slider->the_post(); ?>
                                <li <?php echo ($i == 0) ? "class='active item' " : "class='item'"; ?>>
                                    <?php the_post_thumbnail('front-page-slider-image') ?>
                                </li>
                                <?php $i++;
                            endwhile; ?>
                        </ul>
                        <!-- Left and right controls -->
                        <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
                            <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
                            <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
                <?php else: ?>
                    <h3>No slides</h3>
                <?php endif; ?>
            </section>
            <!-- Еnd of a carousel section -->
            <!-- Section with content of page -->
            <?php /* Start the Loop */
            while (have_posts()) : the_post();
                get_template_part('template-parts/content', 'front-page');
            endwhile; ?>
        </main><!-- #main -->
    </div>
<?php
get_footer();
