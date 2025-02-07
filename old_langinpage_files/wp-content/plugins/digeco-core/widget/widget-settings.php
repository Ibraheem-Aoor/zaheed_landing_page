<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

add_action( 'widgets_init', 'digeco_widgets_init' );
function digeco_widgets_init() {

	// Register Custom Widgets
	register_widget( 'DigecoTheme_About_Widget' );
	register_widget( 'DigecoTheme_Address_Widget' );
	register_widget( 'DigecoTheme_Social_Widget' );
	register_widget( 'DigecoTheme_Recent_Posts_With_Image_Widget' );
	register_widget( 'DigecoTheme_Post_Box' );
	register_widget( 'DigecoTheme_Post_Tab' );
	register_widget( 'DigecoTheme_Feature_Post' );
	register_widget( 'DigecoTheme_Open_Hour_Widget' );
	register_widget( 'DigecoTheme_Product_Box' );
	
}