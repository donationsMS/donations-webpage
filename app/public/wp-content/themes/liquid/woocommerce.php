<?php get_header(); ?>

<div class="detail page">
    <div class="container">
        <div class="row">
            <div class="<?php if ( !is_front_page() ) { ?>col-md-8<?php }else{ ?>col-md-12<?php } ?> mainarea">

                <?php if( is_product() ) { ?>
                <!-- woocommerce title -->
                <div class="ttl_h1" title="<?php the_title(); ?>">
                    <?php the_title(); ?>
                </div>
                <?php } ?>
                
                <!-- woocommerce pan -->
                <?php
                $args = array(
                    'delimiter'   => '',
                    'wrap_before' => '<ul class="breadcrumb" itemprop="breadcrumb">',
                    'wrap_after'  => '</ul>',
                    'before'      => '<li class="breadcrumb-item" itemprop="itemListElement">',
                    'after'       => '</li>',
                    'home'        => _x( 'TOP', 'breadcrumb', 'liquid' ),
                );
                ?>
                <?php woocommerce_breadcrumb( $args ); ?>

                <div class="detail_text">

                    <div class="post_meta">
                        <?php if(has_post_thumbnail()) { the_post_thumbnail(); } ?>
                    </div>
                    <div class="post_body">
                        <!-- woocommerce content -->
                        <?php woocommerce_content(); ?>
                    </div>

                </div>
                <?php endwhile; ?>
                <div class="detail_comments">
                    <?php comments_template(); ?>
                </div>
                <?php else : ?>
                <div class="col-xs-12">
                    <?php esc_html_e( 'No articles', 'liquid' ); ?>
                </div>
                <?php get_search_form(); ?>
                <?php endif; ?>

                <?php
                // Paging
                $args = array(
                    'before' => '<nav><ul class="page-numbers">', 
                    'after' => '</ul></nav>', 
                    'link_before' => '<li>', 
                    'link_after' => '</li>'
                );
                wp_link_pages( $args );
                ?>

            </div><!-- /col -->
            <?php if ( !is_front_page() ) { get_sidebar(); } ?>

        </div>
    </div>
</div>

<?php get_footer(); ?>