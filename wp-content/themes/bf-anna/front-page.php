<?php
/**
 * Template for front page
 */

get_header(); ?>
    <div class="front-page">
        <div class="container-inner">
            <div id="primary" class="content-area">
                <main id="main" class="site-main" role="main">

                    <section class="main-carousel">

                        <?php $args = array(
                            'post_type' => 'slider_post',
                            'posts_per_page' => -1
                        );
                        $slider = new WP_Query($args);

                        if ($slider->have_posts()) :
                        ?>

                        <div id="myCarousel" class="carousel slide" data-ride="carousel">
                            <!-- Indicators -->
                            <ol class="carousel-indicators">
                                <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                                <li data-target="#myCarousel" data-slide-to="1"></li>
                                <li data-target="#myCarousel" data-slide-to="2"></li>
                                <li data-target="#myCarousel" data-slide-to="3"></li>
                            </ol>
                            <div class="carousel-inner" role="listbox">
                                <?php
                                $i = 0;
                                // Цикл!
                                while ($slider->have_posts()) :
                                $slider->the_post();
                                ?>
                                <div <?php echo ($i == 0) ? "class='active item' " : "class='item'"; ?>
                                <?php
                                echo '<h2>' . $post->post_title . '</h2>';
                                echo '<p>' . $post->post_content . '</p>';
                                get_the_post_thumbnail() ?>
                            </div>
                            <?php
                            $i++;
                            endwhile;
                            else: ?>
                                <h3>No slide</h3>
                            <?php endif; ?>
                        </div>
                        <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
                            <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
                            <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
            </div>

            </section>


            </main><!-- #main -->
        </div><!-- #primary -->
    </div>
    </div>
<?php
get_footer();
