<?php get_header(); ?>

<?php if(! dynamic_sidebar('liquid_top_header')): ?>
<!-- no widget -->
<?php endif; ?>

<div class="mainpost">

    <div class="container">
        <div class="row" id="main">
            <?php if (have_posts()) : while ( have_posts() ) : the_post(); ?>
            <article <?php post_class();?>>
                <div class="card-block">
                    <div class="post_links">
                        <span class="post_thumb">
                            <?php if(has_post_thumbnail()) { the_post_thumbnail(); }else{ echo '<span class="noimage">'.esc_html__( 'no image', 'liquid' ).'</span>'; } ?>
                        </span>
                        <span class="card-text">
                            <span class="post_time"><i class="icon icon-clock"></i>
                                <?php the_time( get_option( 'date_format' ) ); ?></span>
                            <span class="post_cat"><i class="icon icon-folder"></i>
                                <?php the_category(','); ?></span>
                        </span>
                        <h3 class="card-title post_ttl"><a href="<?php the_permalink() ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h3>
                    </div>
                </div>
            </article>
            <?php 
            //endforeach;
            endwhile;
            else : 
             get_search_form();
            endif;
            ?>
        </div>

        <?php 
        // navigation
        liquid_paging_nav();
        ?>

    </div>
</div>

<?php get_footer(); ?>