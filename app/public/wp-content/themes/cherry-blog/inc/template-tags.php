<?php
/**
 * Custom template tags for this theme
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package cherry-blog
 */

if (!function_exists('cherry_blog_posted_on')) :
    /**
     * Prints HTML with meta information for the current post-date/time.
     */
    function cherry_blog_posted_on()
    {
        $time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
        if (get_the_time('U') !== get_the_modified_time('U')) {
            $time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
        }

        $time_string = sprintf(
            $time_string,
            esc_attr(get_the_date(DATE_W3C)),
            esc_html(get_the_date()),
            esc_attr(get_the_modified_date(DATE_W3C)),
            esc_html(get_the_modified_date())
        );
        $archive_year = get_the_time('Y');
        $archive_month = get_the_time('m');
        $archive_day = get_the_time('d');

        $posted_on = sprintf(
            /* translators: %s: post date. */
            esc_html__('%s', 'cherry-blog'),
            '<a href="' . esc_url(get_day_link($archive_year, $archive_month, $archive_day)) . '" rel="bookmark">' . $time_string . '</a>'
        );

        echo '<span class="posted-on">' . $posted_on . '</span>'; // WPCS: XSS OK.
    }
endif;

if (!function_exists('cherry_blog_posted_by')) :
    /**
     * Prints HTML with meta information for the current author.
     */
    function cherry_blog_posted_by()
    {
        $byline = sprintf(
            /* translators: %s: post author. */
            esc_html__('by %s', 'cherry-blog'),
            '<span class="author vcard"><a class="url fn n" href="' . esc_url(get_author_posts_url(get_the_author_meta('ID'))) . '">' . esc_html(get_the_author()) . '</a></span>'
        );

        echo '<span class="byline"> ' . $byline . '</span>'; // WPCS: XSS OK.
    }
endif;

if (!function_exists('cherry_blog_entry_footer')) :
    /**
     * Prints HTML with meta information for the categories, tags and comments.
     */
    function cherry_blog_entry_footer()
    {
        // Hide category and tag text for pages.
        if ('post' === get_post_type()) {
            /* translators: used between list items, there is a space after the comma */
            $categories_list = get_the_category_list(esc_html__(' / ', 'cherry-blog'));
            if ($categories_list) {
                /* translators: 1: list of categories. */
                printf('<span class="cat-links">' . esc_html__('%1$s', 'cherry-blog') . '</span>', $categories_list); // WPCS: XSS OK.
            }
        }

        if (!is_single() && !post_password_required() && (comments_open() || get_comments_number())) {
            echo '<span class="comments-link">';
            comments_popup_link(
                sprintf(
                    wp_kses(
                        /* translators: %s: post title */
                        __('Leave a Comment<span class="screen-reader-text"> on %s</span>', 'cherry-blog'),
                        [
                            'span' => [
                                'class' => [],
                            ],
                        ]
                    ),
                    get_the_title()
                )
            );
            echo '</span>';
        }

        edit_post_link(
            sprintf(
                wp_kses(
                    /* translators: %s: Name of current post. Only visible to screen readers */
                    __('Edit <span class="screen-reader-text">%s</span>', 'cherry-blog'),
                    [
                        'span' => [
                            'class' => [],
                        ],
                    ]
                ),
                get_the_title()
            ),
            '<span class="edit-link">',
            '</span>'
        );
    }
endif;

if (!function_exists('cherry_blog_post_thumbnail')) :
    /**
     * Displays an optional post thumbnail.
     *
     * Wraps the post thumbnail in an anchor element on index views, or a div
     * element when on single views.
     */
    function cherry_blog_post_thumbnail()
    {
        if (post_password_required() || is_attachment() || !has_post_thumbnail()) {
            return;
        }

        if (is_singular()) :
            ?>

<div class="post-thumbnail">
    <?php the_post_thumbnail(); ?>
</div><!-- .post-thumbnail -->

<?php else : ?>

<a class="post-thumbnail" href="<?php the_permalink(); ?>"
    aria-hidden="true" tabindex="-1">
    <?php
            the_post_thumbnail('cherry-blog-default', [
                'alt' => the_title_attribute([
                    'echo' => false,
                ]),
            ]); ?>
</a>

<?php
        endif; // End is_singular().
    }
endif;
