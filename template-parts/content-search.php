<?php
/**
 * Template part for displaying search results
 *
 * @package GR333_WP_Theme
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <header class="entry-header">
        <?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>

        <?php if ( 'post' === get_post_type() ) : ?>
            <div class="entry-meta">
                <?php
                gr333_posted_on();
                gr333_posted_by();
                ?>
            </div><!-- .entry-meta -->
        <?php endif; ?>
    </header><!-- .entry-header -->

    <?php if ( has_post_thumbnail() ) : ?>
        <div class="post-thumbnail">
            <a href="<?php the_permalink(); ?>">
                <?php the_post_thumbnail( 'gr333-thumbnail' ); ?>
            </a>
        </div>
    <?php endif; ?>

    <div class="entry-summary">
        <?php the_excerpt(); ?>
        <a href="<?php the_permalink(); ?>" class="read-more">
            <?php esc_html_e( 'Read More', 'gr333-wp-theme' ); ?> &rarr;
        </a>
    </div><!-- .entry-summary -->

    <footer class="entry-footer">
        <?php
        // Display post type for non-post content types
        if ( 'post' !== get_post_type() ) {
            $post_type_obj = get_post_type_object( get_post_type() );
            if ( $post_type_obj ) {
                echo '<span class="post-type-label">' . esc_html( $post_type_obj->labels->singular_name ) . '</span>';
            }
        }
        ?>
    </footer><!-- .entry-footer -->
</article><!-- #post-<?php the_ID(); ?> -->