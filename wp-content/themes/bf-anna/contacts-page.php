<?php
/*
Template Name: Contacts Page
*/
?>

<?php get_header(); ?>

    <div id="primary" class="content-area container-inner">
        <main id="main" class="site-main" role="main">
            <div class="contacts-wrapper clearfix">

                <?php if (have_posts()): ?>
                    <?php while (have_posts()): the_post(); ?>
                        <h2> <?php the_field( 'page_title' ) ?> </h2>
                    <?php endwhile; ?>
                <?php endif; ?>


                <div class="contacts-text">
                    <h3>Адрес:</h3>
                    <address>г. Черкассы, ул. Горького, 62</address>
                </div>
                <div class="contacts-map">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2182.2307246499167!2d32.0923767265611!3d49.42546391961497!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x40d14ba5f16da949%3A0x3aba7532bc786c10!2z0LLRg9C70LjRhtGPINCT0L7RgNGM0LrQvtCz0L4sIDYyLCDQp9C10YDQutCw0YHQuCwg0KfQtdGA0LrQsNGB0YzQutCwINC-0LHQu9Cw0YHRgtGMLCAxODAwMA!5e0!3m2!1sru!2sua!4v1490378534608"
                            width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
                </div>
            </div>
        </main><!-- #main -->
    </div><!-- #primary -

<?php get_footer(); ?>