<?php get_header(); ?>
<div class="detail error">
    <div class="container">
        <h1 class="ttl_h1">
            <?php esc_html_e( 'Not found.', 'liquid' ); ?>
        </h1>
        <?php get_search_form(); ?>
    </div>
</div>
<?php get_footer(); ?>