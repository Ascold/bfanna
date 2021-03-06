<?php
/**
 * The template for displaying comments
 *
 * This is the template that displays the area of the page that contains both the current comments
 * and the comment form.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package tsarenko
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if (post_password_required()) {
    return;
}
?>
<section class="comments-page">
<div id="comments" class="comments-area">
    <?php
    // You can start editing here -- including this comment!
    if (have_comments()) : ?>
               <?php if (get_comment_pages_count() > 1 && get_option('page_comments')) : // Are there comments to navigate through? ?>
            <nav id="comment-nav-above" class="navigation comment-navigation" role="navigation">
                <h2 class="screen-reader-text"><?php esc_html_e('Comment navigation', 'bf-anna'); ?></h2>
                <div class="nav-links">

                    <div class="nav-previous"><?php previous_comments_link(esc_html__('Older Comments', 'bf-anna')); ?></div>
                    <div class="nav-next"><?php next_comments_link(esc_html__('Newer Comments', 'bf-anna')); ?></div>

                </div><!-- .nav-links -->
            </nav><!-- #comment-nav-above -->
        <?php endif; // Check for comment navigation. ?>

        <ol class="comment-list">
            <?php wp_list_comments('type=comment&callback=mytheme_comment'); ?>
        </ol><!-- .comment-list -->

        <?php if (get_comment_pages_count() > 1 && get_option('page_comments')) : // Are there comments to navigate through? ?>
            <nav id="comment-nav-below" class="navigation comment-navigation" role="navigation">
                <h2 class="screen-reader-text"><?php esc_html_e('Comment navigation', 'bf-anna'); ?></h2>
                <div class="nav-links">
                    <div class="nav-previous"><?php previous_comments_link(esc_html__('Older Comments', 'bf-anna')); ?></div>
                    <div class="nav-next"><?php next_comments_link(esc_html__('Newer Comments', 'bf-anna')); ?></div>
                </div><!-- .nav-links -->
            </nav><!-- #comment-nav-below -->
            <?php
        endif; // Check for comment navigation.

    endif; // Check for have_comments().


    // If comments are closed and there are comments, let's leave a little note, shall we?
    if (!comments_open() && get_comments_number() && post_type_supports(get_post_type(), 'comments')) : ?>

        <p class="no-comments"><?php esc_html_e('Comments are closed.', 'bf-anna'); ?></p>
        <?php
    endif;

    $author = wp_get_current_commenter();
    $req = get_option('require_name_email');
    $aria_req = ($req ? " aria-required='true'" : '');
    $fields = array(
        'title' => '<p class="comment-form-title"><label for="title">' . __('Тема Відгуку') . '</label>' .
            '<input id="title" class="title-comment" size="40"  type="text"/></p>',

        'author' => '<p class="comment-form-author"><label for="author">' . __('Name') . '</label> ' . ($req ? '<span class="required">*</span>' : '') .
            '<input id="author" name="author" type="text" value="' . esc_attr($author['comment_author']) . '" size="40"' . $aria_req . ' /></p>',

    );
    $comments_args = array(
        'comment_notes_before' => '',
        'title_reply'          => __( 'Ваш відгук дуже важливий для нас' ),
        'fields' => $fields,
        'comment_field' => '<p class="comment-form-comment"><label for="comment">' . __('') . '</label><br /><textarea id="comment" class="text-area-comment" name="comment" aria-required="true" cols="30" rows="15"></textarea></p>',

    );
    comment_form($comments_args);
    ?>


</div><!-- #comments -->
</section>


