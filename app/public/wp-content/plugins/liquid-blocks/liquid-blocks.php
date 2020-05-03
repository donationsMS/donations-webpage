<?php
/*
Plugin Name: LIQUID BLOCKS
Plugin URI: https://lqd.jp/wp/plugin.html
Description: A magic tool to master WordPress blocks.
Author: LIQUID DESIGN Ltd.
Author URI: https://lqd.jp/wp/
License: GPLv2
License URI: https://www.gnu.org/licenses/gpl-2.0.html
Text Domain: liquid-blocks
Version: 1.0.5
*/
/*  Copyright 2019 LIQUID DESIGN Ltd. (email : info@lqd.jp)

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License, version 2, as
	published by the Free Software Foundation.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
*/

// ------------------------------------
// Plugin
// ------------------------------------
$liquid_blocks_data = get_file_data( __FILE__, array( 'version' => 'Version'));

// json
if ( is_admin() ) {
    $json_liquid_blocks_error = "";
    $json_liquid_blocks_url = "https://lqd.jp/wp/data/p/liquid-blocks.json";
    $json_liquid_blocks = wp_remote_get($json_liquid_blocks_url);
    if ( is_wp_error( $json_liquid_blocks ) ) {
        $json_liquid_blocks_error = $json_liquid_blocks->get_error_message().$json_liquid_blocks_url;
    }else{
        $json_liquid_blocks = json_decode($json_liquid_blocks['body']);
    }
}

// notices
function liquid_blocks_admin_notices() {
    global $json_liquid_blocks, $json_liquid_blocks_error;
    if ( isset( $_GET['liquid_admin_notices_dismissed'] ) ) {
        set_transient( 'liquid_admin_notices', 'dismissed', 60*60*24*30 );
    }
    if ( isset( $_GET['liquid_admin_offer_dismissed'] ) ) {
        set_transient( 'liquid_admin_offer', 'dismissed', 60*60*24*30 );
    }
    if( !empty($json_liquid_blocks->news) && get_transient( 'liquid_admin_notices' ) != 'dismissed' ){
        echo '<div class="notice notice-info" style="position: relative;"><p>'.$json_liquid_blocks->news.'</p><a href="?liquid_admin_notices_dismissed" style="position: absolute; right: 10px; top: 10px;">&times;</a></div>';
    }
    if( !empty($json_liquid_blocks->offer) && get_transient( 'liquid_admin_offer' ) != 'dismissed' ){
        echo '<div class="notice notice-info" style="position: relative;"><p>'.$json_liquid_blocks->offer.'</p><a href="?liquid_admin_offer_dismissed" style="position: absolute; right: 10px; top: 10px;">&times;</a></div>';
    }
    if(!empty($json_liquid_blocks_error)) {
        echo '<script>console.log("'.$json_liquid_blocks_error.'");</script>';
    }
}
add_action( 'admin_notices', 'liquid_blocks_admin_notices' );

// get_option
$liquid_blocks_toggle = get_option( 'liquid_blocks_toggle' );
$liquid_blocks_no = get_option( 'liquid_blocks_no' );
$liquid_blocks_type = get_option( 'liquid_blocks_type' );
$liquid_blocks_name = get_option( 'liquid_blocks_name' );
if( empty( $liquid_blocks_toggle ) ){
    add_action( 'enqueue_block_editor_assets', 'liquid_blocks_enqueue_block_editor_assets' );
    add_action( 'enqueue_block_assets', function () {
        global $liquid_blocks_data;
        wp_enqueue_style( 'liquid-blocks', plugins_url( 'css/block.css' , __FILE__ ), array(), $liquid_blocks_data['version'] );
    });
    add_action( 'admin_footer', 'liquid_blocks_admin_footer' );
}

// plugin_action_links
function liquid_blocks_plugin_action_links( $links ) {
	$mylinks = '<a href="'.admin_url( 'options-general.php?page=liquid-blocks' ).'">'.__( 'Settings', 'liquid-blocks' ).'</a>';
    array_unshift( $links, $mylinks);
    return $links;
}
add_filter( 'plugin_action_links_' . plugin_basename(__FILE__), 'liquid_blocks_plugin_action_links' );

function liquid_blocks_enqueue_block_editor_assets(){
    global $liquid_blocks_data, $liquid_blocks_no, $liquid_blocks_type, $liquid_blocks_name;
    wp_enqueue_script( 'liquid-blocks-template', plugins_url( 'lib/template.js', __FILE__ ), array(), $liquid_blocks_data['version'] );
    wp_enqueue_script( 'liquid-blocks', plugins_url( 'lib/block.js', __FILE__ ), array( 'wp-blocks', 'wp-i18n', 'wp-element', 'wp-editor', 'wp-plugins', 'wp-edit-post', 'wp-components', 'liquid-blocks-template' ), $liquid_blocks_data['version'] );
    wp_register_script( 'liquid-blocks', plugins_url( 'lib/block.js', __FILE__ ), array( 'wp-i18n' ) );
    wp_localize_script( 'liquid-blocks-template', 'liquid_blocks_imgurl', plugins_url( 'images/', __FILE__ ) );
    wp_localize_script( 'liquid-blocks', 'liquid_blocks_imgurl', plugins_url( 'images/', __FILE__ ) );
    wp_localize_script( 'liquid-blocks', 'liquid_blocks_no', $liquid_blocks_no );
    wp_localize_script( 'liquid-blocks', 'liquid_blocks_type', $liquid_blocks_type );
    wp_localize_script( 'liquid-blocks', 'liquid_blocks_name', $liquid_blocks_name );
    wp_enqueue_style( 'liquid-blocks', plugins_url( 'css/block.css' , __FILE__ ), array(), $liquid_blocks_data['version'] );
    wp_enqueue_style( 'liquid-blocks-editor', plugins_url( 'css/block-editor.css' , __FILE__ ), array(), $liquid_blocks_data['version'] );
    if ( function_exists( 'wp_set_script_translations' ) ) {
        wp_set_script_translations( 'liquid-blocks', 'liquid-blocks', plugin_dir_path( __FILE__ ) . 'languages' );
    }
}

function liquid_blocks_admin_footer() {
    global $pagenow, $post;
    if( $pagenow == 'post.php' || $pagenow == 'post-new.php' ){
        if ( apply_filters( 'replace_editor', false, $post ) !== true ) {
	       if ( use_block_editor_for_post( $post ) ) {
?>
<!-- Gallery -->
<div id="liquid_blocks_modal" class="liquid_blocks_modal" style="display:none;" onclick="LiquidGalleryClose();">
    <div class="liquid_blocks_modal_gallery">
        <h3><?php _e( 'Headlines', 'liquid-blocks' ); ?> <small>Headlines</small></h3>
        <script>LiquidGalleryList('Headlines');</script>
        <h3><?php _e( 'Layouts', 'liquid-blocks' ); ?> <small>Layouts</small></h3>
        <script>LiquidGalleryList('Layouts');</script>
        <h3><?php _e( 'Price list', 'liquid-blocks' ); ?> <small>Price</small></h3>
        <script>LiquidGalleryList('Price');</script>
        <h3><?php _e( 'CTA: Call To Action', 'liquid-blocks' ); ?> <small>CTA</small></h3>
        <script>LiquidGalleryList('CTA');</script>
        <h3><?php _e( 'Landing pages', 'liquid-blocks' ); ?> <small>Landing</small></h3>
        <script>LiquidGalleryList('Landing');</script>
        <h3><?php _e( 'Recommended Plugins', 'liquid-blocks' ); ?></h3>
        <a href="https://wordpress.org/plugins/liquid-speech-balloon/" target="_blank"><img src="<?php echo plugins_url( 'images/Recommend/liquid-speech-balloon.png', __FILE__ ); ?>" alt=""></a>
    </div>
</div>
<?php
            }
        }
    }
}

// ------------------------------------
// Admin
// ------------------------------------
function liquid_blocks_init() {
	load_plugin_textdomain( 'liquid-blocks', false, dirname( plugin_basename( __FILE__ ) ) . '/languages' );
}
add_action( 'admin_init', 'liquid_blocks_init' );

function liquid_blocks_admin() {
    add_options_page(
      'LIQUID BLOCKS',
      'LIQUID BLOCKS',
      'administrator',
      'liquid-blocks',
      'liquid_blocks_admin_page'
    );
    register_setting(
      'liquid_blocks_group',
      'liquid_blocks_toggle',
      'liquid_blocks_toggle_validation'
    );
    register_setting(
      'liquid_blocks_group',
      'liquid_blocks_no'
    );
    register_setting(
      'liquid_blocks_group',
      'liquid_blocks_type'
    );
    register_setting(
      'liquid_blocks_group',
      'liquid_blocks_name'
    );
}
add_action( 'admin_menu', 'liquid_blocks_admin' );

function liquid_blocks_toggle_validation( $input ) {
     $input = (int) $input;
     if ( $input === 0 || $input === 1 ) {
          return $input;
     } else {
          add_settings_error(
               'liquid_blocks_toggle',
               'liquid_blocks_toggle_validation_error',
               __( 'illegal data', 'error' ),
               'error'
          );
     }
}

function liquid_blocks_admin_page() {
     global $json_liquid_blocks, $liquid_blocks_toggle, $liquid_blocks_no, $liquid_blocks_type, $liquid_blocks_name;
     if( empty( $liquid_blocks_toggle ) ){
          $checked_on = 'checked="checked"';
          $checked_off = '';
     } else {
          $checked_on = '';
          $checked_off = 'checked="checked"';
     }
?>
<div class="wrap">
<h1>LIQUID BLOCKS</h1>

<div id="poststuff">

<!-- Recommend -->
<?php if( !empty($json_liquid_blocks->recommend) ){ ?>
<div class="postbox">
<h2 style="border-bottom: 1px solid #eee;"><?php _e( 'Recommend', 'liquid-blocks' ); ?></h2>
<div class="inside"><?php echo $json_liquid_blocks->recommend; ?></div>
</div>
<?php } ?>

<!-- Settings -->
<div class="postbox">
<h2 style="border-bottom: 1px solid #eee;"><?php _e( 'Settings', 'liquid-blocks' ); ?></h2>
<div class="inside">
<form method="post" action="options.php">
<?php
     settings_fields( 'liquid_blocks_group' );
     do_settings_sections( 'default' );
?>
<table class="form-table">
     <tbody>
     <tr>
          <th><?php _e( 'Shortcuts', 'liquid-blocks' ); ?></th>
     </tr>
     <tr>
          <td>
          <?php
            for ($i=0; $i<10; $i++) {
                $j = $i + 1;
                $no = !empty($liquid_blocks_no[$i]) ? $liquid_blocks_no[$i] : "";
                $type = !empty($liquid_blocks_type[$i]) ? $liquid_blocks_type[$i] : "";
                $name = !empty($liquid_blocks_name[$i]) ? $liquid_blocks_name[$i] : "";
                echo '<p>'.$j.' Name:<input type="text" name="liquid_blocks_name['.$i.']" value="'.esc_html($name).'" placeholder="intro"> ';
                echo 'Type:<input type="text" name="liquid_blocks_type['.$i.']" value="'.esc_html($type).'" placeholder="Headlines"> ';
                echo 'No:<input type="number" name="liquid_blocks_no['.$i.']" value="'.esc_html($no).'"></p>';
            }
          ?>
          </td>
     </tr>
     <tr>
          <th colspan="2"><?php _e( 'Enable', 'liquid-blocks' ); ?> LIQUID BLOCKS
          <p>
               <label for="liquid_blocks_toggle_on"><input type="radio" id="liquid_blocks_toggle_on" name="liquid_blocks_toggle" value="0" <?php echo $checked_on; ?>>On</label>
               <label for="liquid_blocks_toggle_off"><input type="radio" id="liquid_blocks_toggle_off" name="liquid_blocks_toggle" value="1" <?php echo $checked_off; ?>>Off</label>
          </p>
          </th>
     </tr>
     </tbody>
</table>
<?php submit_button(); ?>
</form>
</div>
</div>

</div><!-- /poststuff -->
<hr><a href="https://lqd.jp/wp/" target="_blank">LIQUID PRESS</a>
</div><!-- /wrap -->
<?php }
?>