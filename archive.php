<?php
/**
 * The template for displaying archive pages
 *
 * @package GR333_WP_Theme
 */

get_header();
?>

<main id="primary" class="site-main">
    <div class="site-container">
        <div class="content-area <?php echo is_active_sidebar( 'sidebar-1' ) ? 'has-sidebar' : ''; ?>">
            <div class="main-content">
                <?php if ( have_posts() ) : ?>

                    <header class="page-header">
                        <?php
                        the_archive_title( '<h1 class="page-title">', '</h1>' );
                        the_archive_description( '<div class="archive-description">', '</div>' );
                        ?>
                    </header><!-- .page-header -->

                    <?php
                    // Start the Loop
                    while ( have_posts() ) :
                        the_post();
                        get_template_part( 'template-parts/content', get_post_format() );
                    endwhile;

                    // Pagination
                    gr333_pagination();

                else :

                    get_template_part( 'template-parts/content', 'none' );

                endif;
                ?>
            </div>

            <?php get_sidebar(); ?>
        </div>
    </div>
</main>

<?php
get_footer();