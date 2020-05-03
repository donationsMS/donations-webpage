<?php get_header(); ?>

<div <?php post_class(); ?>>
    <div class="container">
        <div class="row">
            <div class="col-md-8 mainarea">

                <?php if (have_posts()) : ?>
                <?php while (have_posts()) : the_post(); ?>

                <h1 class="ttl_h1">
                    <?php the_title(); ?>
                </h1>

                <!-- pan -->
                <?php $cat = get_the_category(); ?>
                <nav aria-label="breadcrumb">
                    <ul class="breadcrumb" itemscope itemtype="http://schema.org/BreadcrumbList">
                        <li class="breadcrumb-item" itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
                            <a href="<?php echo esc_url( home_url() ); ?>" itemprop="item"><span itemprop="name"><?php esc_html_e( 'TOP', 'liquid' ); ?></span></a>
                            <meta itemprop="position" content="1">
                        </li>
                        <?php $item_position = 1; ?>
                        <?php if( !empty($cat) && !empty($cat[0]->parent) ){ ?>
                        <?php $item_position++; ?>
                        <li class="breadcrumb-item" itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
                            <a href="<?php echo get_category_link($cat[0]->parent); ?>" itemprop="item"><span itemprop="name"><?php echo get_cat_name($cat[0]->parent); ?></span></a>
                            <meta itemprop="position" content="<?php echo $item_position; ?>">
                        </li>
                        <?php } ?>
                        <?php if( !empty($cat) && !empty($cat[0]->term_id) ){ ?>
                        <?php $item_position++; ?>
                        <li class="breadcrumb-item" itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
                            <a href="<?php echo get_category_link($cat[0]->term_id); ?>" itemprop="item"><span itemprop="name"><?php echo get_cat_name($cat[0]->term_id); ?></span></a>
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

                <div class="detail_text">

                    <div class="post_meta">
                        <span class="post_time">
                            <i class="icon icon-clock" title="<?php esc_html_e( 'Last update: ', 'liquid' ); ?><?php the_modified_date(); ?>"></i>
                            <?php the_time( get_option( 'date_format' ) ); ?>
                        </span>
                        <?php if(!empty($cat)){ ?>
                        <span class="post_cat"><i class="icon icon-folder"></i>
                            <?php the_category(', ') ?>
                        </span>
                        <?php } ?>
                    </div>
                    <?php if(has_post_thumbnail()) { the_post_thumbnail(); } ?>
                    <?php if(! dynamic_sidebar('liquid_main_head')): ?>
                    <!-- no widget -->
                    <?php endif; ?>
                    <div class="post_body">
                        <?php the_content(); ?>
                    </div>
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
                    <?php if(! dynamic_sidebar('liquid_main_foot')): ?>
                    <!-- no widget -->
                    <?php endif; ?>
                    <?php the_tags( '<ul class="list-inline tag"><li class="list-inline-item">', '</li><li class="list-inline-item">', '</li></ul>' ); ?>
                </div>
                <?php endwhile; ?>
                <div class="detail_comments">
                    <?php comments_template(); ?>
                </div>
                <?php else : ?>
                <div class="col-12">
                    <?php esc_html_e( 'No articles', 'liquid' ); ?>
                </div>
                <?php get_search_form(); ?>
                <?php endif; ?>

                <nav>
                    <ul class="pagination justify-content-between">
                        <?php
                        $prev_post = get_previous_post();
                        $next_post = get_next_post();
                        if (!empty( $prev_post )) {
                            echo '<li><a href="'.esc_url( get_permalink( $prev_post->ID )).'" class="badge-pill" title="'.htmlspecialchars($prev_post->post_title).'">'.esc_html__( '&lt; Prev', 'liquid' ).'</a></li>';
                        }
                        if (!empty( $next_post )) {
                            echo '<li><a href="'.esc_url( get_permalink( $next_post->ID )).'" class="badge-pill" title="'.htmlspecialchars($next_post->post_title).'">'.esc_html__( 'Next &gt;', 'liquid' ).'</a></li>';
                        } ?>
                    </ul>
                </nav>

                <?php
                //recommend
                $original_post = $post;
                $tags = wp_get_post_tags($post->ID);
                $tagIDs = array();
                if ($tags) {
                  $tagcount = count($tags);
                  for ($i = 0; $i < $tagcount; $i++) {
                      $tagIDs[$i] = $tags[$i]->term_id;
                  }
                $args=array(
                'tag__in' => $tagIDs,
                'post__not_in' => array($post->ID),
                'showposts' => 4,
                'ignore_sticky_posts' => 1
                );
                $my_query = new WP_Query($args);
                if( $my_query->have_posts() ) { ?>
                    <div class="recommend">
                        <div class="ttl">
                            <?php esc_html_e( 'Recommend', 'liquid' ); ?>
                        </div>
                        <div class="row">
                        <?php 
                        while ($my_query->have_posts()) : $my_query->the_post();
                        ?>
                        <article class="card col-md-6">
                            <div class="card-block">
                                <div class="post_links">
                                    <span class="post_thumb">
                                        <?php if(has_post_thumbnail()) { the_post_thumbnail(); }else{ echo '<span class="noimage">'.esc_html__( 'no image', 'liquid' ).'</span>'; } ?>
                                    </span>
                                    <span class="card-text">
                                        <span class="post_time"><i class="icon icon-clock"></i>
                                            <?php the_time( get_option( 'date_format' ) ); ?></span>
                                    </span>
                                    <h3 class="card-title post_ttl"><a href="<?php the_permalink() ?>" title="<?php the_title_attribute(); ?>">
                                            <?php the_title(); ?></a></h3>
                                </div>
                            </div>
                        </article>
                        <?php endwhile; wp_reset_postdata(); ?>
                    </div>
                </div>
                <?php } else { ?>
                <!-- <?php esc_html_e( 'No articles', 'liquid' ); ?> -->
                <?php }
            } ?>

            </div><!-- /col -->
            <?php get_sidebar(); ?>

        </div>
    </div>
</div>

<?php get_footer(); ?>