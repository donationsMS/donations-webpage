
<div class="shop-links">
	<div class="account-link">
	<?php
	if ( is_user_logged_in() ) {
	?>
		<a href="<?php echo esc_url( get_permalink( intval( get_option('woocommerce_myaccount_page_id') ) ) ); ?>" class="my-account" title="<?php esc_attr_e('My Account','citylogic'); ?>">
			<?php esc_attr_e('My Account','citylogic'); ?>
		</a>
	<?php
	} else {
	?>
		<a href="<?php echo esc_url( get_permalink( intval( get_option('woocommerce_myaccount_page_id') ) ) ); ?>" class="my-account" title="<?php esc_attr_e('Login','citylogic'); ?>">
			<?php esc_attr_e('Sign In&nbsp;&nbsp;|&nbsp;&nbsp;Register','citylogic'); ?>
		</a>
	<?php
	}
	?>
	</div>
	
	<div class="header-cart">
		<a class="header-cart-contents" href="<?php echo esc_url( wc_get_cart_url() ); ?>" title="<?php esc_attr_e('View your shopping cart', 'citylogic'); ?>">
			<span class="header-cart-amount">
				<?php echo sprintf(_n('%d item', '%d items', WC()->cart->get_cart_contents_count(), 'citylogic'), WC()->cart->get_cart_contents_count());?> - <?php echo wp_kses_data( WC()->cart->get_cart_subtotal() ); ?>
			</span>
			<span class="header-cart-checkout <?php echo ( WC()->cart->get_cart_contents_count() > 0 ) ? 'cart-has-items' : ''; ?>">
				<span><?php esc_attr_e('Checkout', 'citylogic'); ?></span> <i class="otb-fa otb-fa-shopping-cart"></i>
			</span>
		</a>
	</div>
</div>