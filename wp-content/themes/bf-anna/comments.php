<?php
/**
 * The template for displaying comments
 */
if (post_password_required()) {
    return;
}
?>
<section class="comments-page">
    <div id="comments" class="comments-area">
        <?php
        if (have_comments()) : ?>
            <?php if (get_comment_pages_count() > 1 && get_option('page_comments')) : // Are there comments to navigate through? ?>
                <nav id="comment-nav-above" class="navigation comment-navigation" role="navigation">
                    <h2 class="screen-reader-text"><?php esc_html_e('Comment navigation', 'bf-anna'); ?></h2>
                </nav><!-- #comment-nav-above -->
            <?php endif; // Check for comment navigation. ?>
            <ol class="comment-list">
                <?php wp_list_comments(array('callback' => 'my_comments_callback')); ?>
            </ol><!-- .comment-list -->
            <?php if (get_comment_pages_count() > 1 && get_option('page_comments')) : // Are there comments to navigate through? ?>
                <nav id="comment-nav-below" class="navigation comment-navigation" role="navigation">
                    <h2 class="screen-reader-text"><?php esc_html_e('Comment navigation', 'bf-anna'); ?></h2>
                    <div class="nav-link-more">
                        <?php previous_comments_link(pll__(' Більше відгуків ')) ?>
                    </div>
                    <div class="nav-link-back">
                        <?php next_comments_link(pll__('До початку ')) ?>
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
            'title' => '<p class="comment-form-title"><label for="age">' . __('Тема') . '</label>' .
                '<input id="title" name="title" type="text" size="30" /></p>',

            'author' => '<p class="comment-form-author"><label for="author">' . __('Name') . '</label> ' . ($req ? '<span class="required">*</span>' : '') .
                '<input placeholder="' . pll__('Your name') . '" id="author" name="author" type="text"   size="30" /></p>',

        );
        $comments_args = array(
            'comment_notes_before' => '',
            'title_reply' => pll__('Ваш відгук дуже важливий для нас'),
            'fields' => $fields,
            'label_submit' => pll__('Відправити'),
            'comment_field' => '<p class="comment-form-comment"><label for="comment">' . __('') . '</label><br /><textarea id="comment" class="text-area-comment" name="comment" aria-required="true" cols="30" rows="8"></textarea></p>',
        );
        comment_form($comments_args);
        ?>

    </div><!-- #comments -->
</section>


