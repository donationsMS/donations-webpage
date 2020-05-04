<?php
/**
 * Customize for menus dropdown, extend the WP customizer
 *
 * @package 	Customizer_Library
 * @author		Devin Price, The Theme Foundry
 */

if ( ! class_exists( 'WP_Customize_Control' ) ) {
	return NULL;
}

class Customizer_Library_Dropdown_Menus extends WP_Customize_Control {

	public $type = 'dropdown-menus';
	
	public $name;
	
	public function render_content() {
		$menus = wp_get_nav_menus();
		
		$dropdown = '<select data-customize-setting-link="' .$this->id. '">';
		
		foreach ($menus as $menu) {
			$dropdown .= '<option value="' .$menu->term_id. '">' .$menu->name. '</option>';
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