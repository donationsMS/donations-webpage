<?php
// Ensure cart contents update when products are added to the cart via AJAX
add_filter('woocommerce_add_to_cart_fragments', 'citylogic_wc_header_add_to_cart_fragment');

function citylogic_wc_header_add_to_cart_fragment( $fragments ) {
    ob_start(); ?>
        <a class="header-cart-contents" href="<?php echo esc_url( wc_get_cart_url() ); ?>" title="<?php esc_attr_e('View your shopping cart', 'citylogic'); ?>">
            <span class="header-cart-amount">
                <?php echo sprintf(_n('%d item', '%d items', WC()->cart->get_cart_contents_count(), 'citylogic'), WC()->cart->get_cart_contents_count());?> - <?php echo wp_kses_data( WC()->cart->get_cart_subtotal() ); ?>
            </span>
            <span class="header-cart-checkout<?php echo ( WC()->cart->get_cart_contents_count() > 0 ) ? ' cart-has-items' : ''; ?>">
                <span><?php esc_attr_e('Checkout', 'citylogic'); ?></span> <i class="otb-fa otb-fa-shopping-cart"></i>
            </span>
        </a>
    <?php
    $fragments['a.header-cart-contents'] = ob_get_clean();
    
    return $fragments;
}
