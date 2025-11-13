<?php
if ( post_password_required() ) {
    return;
}
?>
<div id="comments">
    <?php if ( have_comments() ) : ?>
        <h2 class="comments-title"><?php _e( 'Comments', 'gr333' ); ?></h2>
        <?php wp_list_comments(); ?>
    <?php endif; ?>
    <?php comment_form(); ?>
</div>
