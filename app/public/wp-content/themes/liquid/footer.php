<div class="pagetop">
    <a href="#top"><i class="icon icon-arrow-up2"></i></a>
</div>

<footer>
    <div class="container">
        <div class="row">
            <?php if(! dynamic_sidebar('liquid_footer')): ?>
            <!-- no widget -->
            <?php endif; ?>
        </div>
    </div>

    <div class="copy">
        <?php esc_html_e( '(C)', 'liquid' ); ?>
        <?php echo date('Y'); ?> <a href="<?php echo esc_url( home_url() ); ?>">
            <?php bloginfo('name'); ?></a>
        <?php esc_html_e( 'All rights reserved.', 'liquid' ); ?>
        <!-- Powered by -->
        <?php esc_html_e( 'Theme by', 'liquid' ); ?> <a href="https://wordpress.org/themes/liquid/" rel="nofollow" target="_blank">
            <?php esc_html_e( 'LIQUID', 'liquid' ); ?></a>
        <br>
        <?php esc_html_e( 'Powered by', 'liquid' ); ?> <a href="https://wordpress.org" target="_blank">
            <?php esc_html_e( 'WordPress', 'liquid' ); ?></a>
        <!-- /Powered by -->
    </div>

</footer>

</div><!--/wrapper-->

<?php wp_footer(); ?>

</body>
</html>