<?php
/**
 * The template for displaying the footer
 *
 * @package GR333_WP_Theme
 */
?>

    <footer id="colophon" class="site-footer">
        <div class="site-container">
            <?php if ( is_active_sidebar( 'footer-1' ) ) : ?>
                <div class="footer-widgets">
                    <?php dynamic_sidebar( 'footer-1' ); ?>
                </div>
            <?php endif; ?>
            
            <div class="footer-content">
                <div class="site-info">
                    <?php
                    // Footer text - customize this as needed
                    printf(
                        esc_html__( '&copy; %1$s %2$s. All rights reserved.', 'gr333-wp-theme' ),
                        date( 'Y' ),
                        get_bloginfo( 'name' )
                    );
                    ?>
                    <span class="sep"> | </span>
                    <?php
                    printf(
                        esc_html__( 'Powered by %s', 'gr333-wp-theme' ),
                        '<a href="' . esc_url( __( 'https://wordpress.org/', 'gr333-wp-theme' ) ) . '">WordPress</a>'
                    );
                    ?>
                </div><!-- .site-info -->
                
                <?php
                // Display footer menu if set
                if ( has_nav_menu( 'footer' ) ) :
                    ?>
                    <nav class="footer-navigation">
                        <?php
                        wp_nav_menu(
                            array(
                                'theme_location' => 'footer',
                                'menu_id'        => 'footer-menu',
                                'depth'          => 1,
                                'container'      => false,
                            )
                        );
                        ?>
                    </nav>
                <?php endif; ?>
            </div>
        </div>
    </footer><!-- #colophon -->

</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>