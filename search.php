<?php
get_header();
?>
<main>
    <h1>Search Results for: <?php echo get_search_query(); ?></h1>
    <?php get_template_part( 'template-parts/content', 'search' ); ?>
</main>
<?php
get_footer();
