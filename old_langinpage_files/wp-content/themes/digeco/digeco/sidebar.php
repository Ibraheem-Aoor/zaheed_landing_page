<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */
?>
<div class="col-lg-4 col-md-12 fixed-side-bar">
	<aside class="sidebar-widget-area fixed-bar-coloum">		
		<?php
			if ( DigecoTheme::$sidebar ) {
				if ( is_active_sidebar( DigecoTheme::$sidebar ) ) dynamic_sidebar( DigecoTheme::$sidebar );
			}
			else {
				if ( is_active_sidebar( 'sidebar' ) ) dynamic_sidebar( 'sidebar' );
			}
		?>
	</aside>
</div>