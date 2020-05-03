<?php
/**
 * Customize for textarea, extend the WP customizer
 *
 * @package 	Customizer_Library
 * @author		Devin Price, The Theme Foundry
 */

if ( ! class_exists( 'WP_Customize_Control' ) ) {
	return NULL;
}

class Customizer_Library_Divider extends WP_Customize_Control {

    /**
     * CSS class for the control.
     *
     * @since 4.0.0
     * @var string
     */
    public $class;	
	
	/**
	 * Render the control's content.
	 *
	 * Allows the content to be overriden without having to rewrite the wrapper.
	 *
	 * @since   1.0.0
	 * @return  void
	 */
	public function render_content() {
		?>
		<hr class="divider <?php echo esc_attr( $this->class ); ?>" />
		<?php
		
	}

}