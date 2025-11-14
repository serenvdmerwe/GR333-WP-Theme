<?php
/**
 * The main template file
 *
 * @package GR333_WP_Theme
 */

get_header();
?>

<main id="primary" class="site-main">
    <div class="site-container">
        <div class="content-area <?php echo is_active_sidebar( 'sidebar-1' ) ? 'has-sidebar' : ''; ?>">
            <div class="main-content">
                <?php
                if ( have_posts() ) :
                    
                    // Check if we're on the blog index
                    if ( is_home() && ! is_front_page() ) :
                        ?>
                        <header class="page-header">
                            <h1 class="page-title"><?php single_post_title(); ?></h1>
                        </header>
                        <?php
                    endif;
                    
                    // Start the Loop
                    while ( have_posts() ) :
                        the_post();
                        
                        // Include the post content template
                        get_template_part( 'template-parts/content', get_post_format() );
                        
                    endwhile;
                    
                    // Pagination
                    gr333_pagination();
                    
                else :
                    
                    // No content found
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