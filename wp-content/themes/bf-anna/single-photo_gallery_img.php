<?php
/**
 * The template for displaying Single gallery page
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package BF_Anna
 */

get_header(); ?>
    <div class="container-inner">
        <div class="container-fluid">
            <div id="primary" class="content-area">
                <main id="main" class="site-main" role="main">
                    <div class="gallery-slider">
                        <div id="slider" class="flexslider">
                            <ul class="slides">
                                <?php
                                $query = new WP_Query('post_type=photo_gallery_img');
                                if ($gallery = get_post_gallery(get_the_ID(), false)) :
                                    $i = 1;
                                    foreach ($gallery['src'] as $src) : ?>
                                        <li>
                                            <img src="<?php echo $src; ?>" alt="image"/>
                                        </li>
                                        <?php
                                        $i++;
                                        ?>
                                        <?php
                                    endforeach; ?>
                                <?php endif;
                                ?>
                            </ul>
                        </div>
                        <div id="carousel" class="flexslider">
                            <ul class="slides">
                                <?php
                                $query = new WP_Query('post_type=photo_gallery_img');
                                if ($gallery = get_post_gallery(get_the_ID(), false)) :
                                    $i = 1;
                                    foreach ($gallery['src'] as $src) : ?>
                                        <li>
                                            <img src="<?php echo $src; ?>" alt="image"/>
                                        </li>
                                        <?php
                                        $i++;
                                        ?>
                                        <?php
                                    endforeach; ?>
                                <?php endif;
                                ?>
                            </ul>
                        </div>
                    </div>
                </main><!-- #main -->
            </div><!-- #primary -->
        </div>
    </div>

<?php
get_footer();
