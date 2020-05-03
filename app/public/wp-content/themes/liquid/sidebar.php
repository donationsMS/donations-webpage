<div class="col-md-4 sidebar">
    <div class="widgets">
        <?php if(! dynamic_sidebar('liquid_sidebar')){ ?>
        <!-- no widget -->
        <div class="widget search">
            <?php get_search_form(); ?>
        </div>
        <div class="widget cats">
            <h4>
                <?php esc_html_e( 'Categories', 'liquid' ); ?>
            </h4>
            <ul class="list-unstyled">
                <?php wp_list_categories(); ?>
            </ul>
        </div>
        <div class="widget tags">
            <h4>
                <?php esc_html_e( 'Tags', 'liquid' ); ?>
            </h4>
            <ul class="list-unstyled">
                <?php
                $args = array(
                    'taxonomy' => 'post_tag',
                    'title_li' => ''
                );
                wp_list_categories( $args );
                ?>
            </ul>
        </div>
        <?php } ?>
    </div>
</div>