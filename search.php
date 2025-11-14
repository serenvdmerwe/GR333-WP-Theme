<?php
/**
 * The template for displaying search results pages
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
                        <h1 class="page-title">
                            <?php
                            printf(
                                esc_html__( 'Search Results for: %s', 'gr333-wp-theme' ),
                                '<span>' . get_search_query() . '</span>'
                            );
                            ?>
                        </h1>
                    </header><!-- .page-header -->

                    <?php
                    // Start the Loop
                    while ( have_posts() ) :
                        the_post();
                        get_template_part( 'template-parts/content', 'search' );
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