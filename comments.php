<?php
/**
 * The template for displaying comments
 *
 * @package GR333_WP_Theme
 */

if ( post_password_required() ) {
    return;
}
?>

<div id="comments" class="comments-area">

    <?php if ( have_comments() ) : ?>
        <h2 class="comments-title">
            <?php
            $gr333_comment_count = get_comments_number();
            if ( '1' === $gr333_comment_count ) {
                printf(
                    esc_html__( 'One comment on &ldquo;%1$s&rdquo;', 'gr333-wp-theme' ),
                    '<span>' . get_the_title() . '</span>'
                );
            } else {
                printf(
                    esc_html( _nx( '%1$s comment on &ldquo;%2$s&rdquo;', '%1$s comments on &ldquo;%2$s&rdquo;', $gr333_comment_count, 'comments title', 'gr333-wp-theme' ) ),
                    number_format_i18n( $gr333_comment_count ),
                    '<span>' . get_the_title() . '</span>'
                );
            }
            ?>
        </h2><!-- .comments-title -->

        <ol class="comment-list">
            <?php
            wp_list_comments(
                array(
                    'style'      => 'ol',
                    'short_ping' => true,
                    'avatar_size' => 60,
                )
            );
            ?>
        </ol><!-- .comment-list -->

        <?php
        the_comments_navigation();

        // If comments are closed and there are comments, let's leave a little note.
        if ( ! comments_open() ) :
            ?>
            <p class="no-comments"><?php esc_html_e( 'Comments are closed.', 'gr333-wp-theme' ); ?></p>
        <?php endif; ?>

    <?php endif; // Check for have_comments(). ?>

    <?php
    comment_form(
        array(
            'title_reply_before' => '<h2 id="reply-title" class="comment-reply-title">',
            'title_reply_after'  => '</h2>',
        )
    );
    ?>

</div><!-- #comments -->