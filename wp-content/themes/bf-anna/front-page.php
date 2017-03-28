<?php
/**
 * Template for front page
 */

get_header(); ?>
    <div class="front-page">
        <div class="container-inner">
            <div id="primary" class="content-area">
                <main id="main" class="site-main" role="main">
                    <!-- This is a carousel section-->
                    <section class="main-carousel">
                        <?php $args = array(
                            'post_type' => 'slider_post',
//                            'posts_per_page' => -1
                        );
                        $slider = new WP_Query($args);
                        if ($slider->have_posts()) : ?>
                        <div id="myCarousel" class="carousel slide" data-ride="carousel">
                            <!-- Slides-->
                            <ul class="carousel-inner" role="listbox">
                                <?php $i = 0;
                                while ($slider->have_posts()) :
                                    $slider->the_post(); ?>
                                    <li <?php echo ($i == 0) ? "class='active item' " : "class='item'"; ?>>
                                        <?php the_post_thumbnail('slider-image') ?>
                                    </li>
                                    <?php $i++;
                                endwhile;
                                else: ?>
                                <h3>No slide</h3>
                            </ul>
                            <?php endif; ?>
                            <div class="slider-indicators-wrap">
                                <!--Left button-->
                                <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
                                    <span class="fa fa-angle-double-left" aria-hidden="true"></span>
                                    <span class="sr-only">Previous</span>
                                </a>
                                <!-- Indicators -->
                                <ol class="carousel-indicators">
                                    <?php
                                    $carousel_indicators = 0;
                                    $published_posts = wp_count_posts('slider_post')->publish;
                                    while ($carousel_indicators < $published_posts) : ?>
                                        <li data-target="#myCarousel"
                                            data-slide-to="<?php echo $carousel_indicators; ?>"
                                            class="<?php echo ($carousel_indicators == 0) ? "active" : null ?>"><?php echo $carousel_indicators + 1 ?></li>
                                        <?php $carousel_indicators++;
                                    endwhile; ?>
                                </ol>
                                <!--Right button-->
                                <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
                                    <span class="fa fa-angle-double-right" aria-hidden="true"></span>
                                    <span class="sr-only">Next</span>
                                </a>
                            </div>
                        </div>
                    </section>
                    <!-- Еnd of a carousel section -->
                    <br>
                    <br>
                    <!-- Section with content of page -->
                    <?php /* Start the Loop */

                    while (have_posts()) : the_post();

                        /*
                        * Include the Post-Format-specific template for the content.
                        * If you want to override this in a child theme, then include a file
                        * called content-___.php (where ___ is the Post Format name) and that will be used instead.
                        */
                        get_template_part('template-parts/content', 'front-page');
                    endwhile; ?>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                </main><!-- #main -->
            </div><!-- #primary -->
        </div>
    </div>
<?php
get_footer();
