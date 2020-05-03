<?php
if ( ! defined( 'WP_UNINSTALL_PLUGIN' ) ) {
    exit();
}
delete_option( 'liquid_blocks_toggle' );
delete_option( 'liquid_blocks_no' );
delete_option( 'liquid_blocks_type' );
delete_option( 'liquid_blocks_name' );
?>