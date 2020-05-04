<?php
/**
 * Customize for post types multi-dropdown, extend the WP customizer
 *
 * @package 	Customizer_Library
 * @author		Devin Price, The Theme Foundry
 */

if ( ! class_exists( 'WP_Customize_Control' ) ) {
	return NULL;
}

class Customizer_Library_Dropdown_Post_Types_Multi extends WP_Customize_Control {

	public $type = 'dropdown-post-types-multi';
	
	public $name;
	
	public function render_content() {
		$args = array(
		   'public'   => true
		);
		$post_types = get_post_types( $args, 'objects' );
		
		$dropdown = '<select multiple="multiple" style="height:128px;" data-customize-setting-link="' .$this->id. '">';
		
		foreach ($post_types as $post_type) {
			$dropdown .= '<option value="' .$post_type->name. '">' .$post_type->labels->singular_name. '</option>';
		}
		
		$dropdown .= '</select>';		
	
		printf(
			'<label class="customize-control-select"><span class="customize-control-title">%s</span> %s</label>',
			$this->label,
			$dropdown
		);
	
		if ( isset( $this->description ) ) {
			echo '<span class="description customize-control-description">' . $this->description . '</span>';
		}
		
	}

}