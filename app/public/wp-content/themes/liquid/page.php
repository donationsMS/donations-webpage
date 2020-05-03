<?php get_header(); ?>

<div class="detail page">
    <div class="container">
        <div class="row">
            <div class="<?php if ( !is_front_page() ) { ?>col-md-8<?php }else{ ?>col-md-12<?php } ?> mainarea">

                <?php if (have_posts()) : ?>
                <?php while (have_posts()) : the_post(); ?>
                <?php if ( !is_front_page() ) { ?>
                <h1 class="ttl_h1">
                    <?php the_title(); ?>
                </h1>
                <!-- pan -->
                <nav aria-label="breadcrumb">
                    <ul class="breadcrumb" itemscope itemtype="http://schema.org/BreadcrumbList">
                        <li class="breadcrumb-item" itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
                            <a href="<?php echo esc_url( home_url() ); ?>" itemprop="item"><span itemprop="name"><?php esc_html_e( 'TOP', 'liquid' ); ?></span></a>
                            <meta itemprop="position" content="1">
                        </li>
                        <?php $item_position = 1; ?>
                        <?php if($post->post_parent) {
                        $cat_name = get_the_title($post->post_parent);
                        $cat_slug = get_page_link($post->post_parent); ?>
                        <?php $item_position++; ?>
                        <li class="breadcrumb-item" itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
                            <a href="<?php echo esc_html($cat_slug); ?>" itemprop="item"><span itemprop="name"><?php echo esc_html($cat_name); ?></span></a>
                            <meta itemprop="position" content="<?php echo $item_position; ?>">
                        </li>
                        <?php } ?>
                        <?php $item_position++; ?>
                        <li class="breadcrumb-item active" itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem" aria-current="page">
                            <a title="<?php the_title(); ?>" itemprop="item"><span itemprop="name"><?php the_title(); ?></span></a>
                            <meta itemprop="position" content="<?php echo $item_position; ?>">
                        </li>
                    </ul>
                </nav>
                <?php } ?>

                <div class="detail_text">

                    <?php if ( !is_front_page() ) { ?>
                    <div class="post_meta">
                        <?php if(has_post_thumbnail()) { the_post_thumbnail(); } ?>
                    </div>
                    <?php } ?>
                    <div class="post_body">
                        <?php the_content(); ?>
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