<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package BF_Anna
 */

?>

</div><!-- #content -->

<footer id="colophon" class="site-footer" role="contentinfo">
    <div class="container-inner">
        <div class="container-fluid">
            <div class="footer-block">
                <div class="footer-block-inner">
                    <div>
                        <?php echo date('Y'); ?>
                    </div>
                    <div>
                        <p>&nbsp;&copy;&nbsp;Made by GeekHub students</p>
                    </div>
                </div>
                <div class="footer-block-inner">
                    <?php wp_nav_menu(array('theme_location' => 'menu-3', 'container_class' => 'footer-menu')); ?>
                </div>
            </div>
        </div>
    </div>
</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
