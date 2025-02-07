<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

use Elementor\Plugin; 


function digeco_get_maybe_rtl( $filename ){
	$file = get_template_directory_uri() . '/assets/';
	if ( is_rtl() ) {
		return $file . 'css-auto-rtl/' . $filename;
	}
	else {
		return $file . 'css/' . $filename;
	}
}
add_action( 'wp_enqueue_scripts','digeco_enqueue_high_priority_scripts', 1500 );
function digeco_enqueue_high_priority_scripts() {
	if ( is_rtl() ) {
		wp_enqueue_style( 'digeco-rtl', DIGECO_CSS_URL . 'rtl.css', array(), DIGECO_VERSION );
	}
}

add_action( 'wp_enqueue_scripts', 'digeco_register_scripts', 12 );
if ( !function_exists( 'digeco_register_scripts' ) ) {
	function digeco_register_scripts(){
		wp_deregister_style( 'font-awesome' );
        wp_deregister_style( 'layerslider-font-awesome' );
        wp_deregister_style( 'yith-wcwl-font-awesome' );

		/*CSS*/
		// owl.carousel CSS
		wp_register_style( 'owl-carousel',       DIGECO_CSS_URL . 'owl.carousel.min.css', array(), DIGECO_VERSION );
		wp_register_style( 'owl-theme-default',  DIGECO_CSS_URL . 'owl.theme.default.min.css', array(), DIGECO_VERSION );		
		wp_register_style( 'magnific-popup',     digeco_get_maybe_rtl('magnific-popup.css'), array(), DIGECO_VERSION );
		// Slider
		wp_register_style( 'nivo-slider',        digeco_get_maybe_rtl('nivo-slider.min.css'), array(), DIGECO_VERSION );
		wp_register_style( 'animate',        	 digeco_get_maybe_rtl('animate.min.css'), array(), DIGECO_VERSION );
		wp_register_style( 'jquery-timepicker',  digeco_get_maybe_rtl('jquery.timepicker.min.css'), array(), DIGECO_VERSION );
		
		// Pagepiling		
		wp_register_style( 'jquery-pagepiling',  digeco_get_maybe_rtl('jquery.pagepiling.min.css'), array(), DIGECO_VERSION );
		
		/*JS*/
		// owl.carousel.min js
		wp_register_script( 'owl-carousel',      DIGECO_JS_URL . 'owl.carousel.min.js', array( 'jquery' ), DIGECO_VERSION, true );
		// Slider
		wp_register_script( 'nivo-slider',       DIGECO_JS_URL . 'jquery.nivo.slider.min.js', array( 'jquery' ), DIGECO_VERSION, true );
		
		// counter js
		wp_register_script( 'rt-waypoints',      DIGECO_JS_URL . 'waypoints.min.js', array( 'jquery' ), DIGECO_VERSION, true );
		wp_register_script( 'jquery-counterup',  DIGECO_JS_URL . 'jquery.counterup.min.js', array( 'jquery' ), DIGECO_VERSION, true );
		wp_register_script( 'jquery-knob',       DIGECO_JS_URL . 'jquery.knob.js', array( 'jquery' ), DIGECO_VERSION, true );
		wp_register_script( 'jquery-appear',     DIGECO_JS_URL . 'jquery.appear.js', array( 'jquery' ), DIGECO_VERSION, true );
		
		// magnific popup
		wp_register_script( 'magnific-popup',    DIGECO_JS_URL . 'jquery.magnific-popup.min.js', array( 'jquery' ), DIGECO_VERSION, true );
		
		// theia sticky
		wp_register_script( 'theia-sticky',    	 DIGECO_JS_URL . 'theia-sticky-sidebar.min.js', array( 'jquery' ), DIGECO_VERSION, true );
		wp_register_script( 'isotope-pkgd',      DIGECO_JS_URL . 'isotope.pkgd.min.js', array( 'jquery' ), DIGECO_VERSION, true );
		wp_register_script( 'isotope-func',      DIGECO_JS_URL . 'isotope-func.js', array( 'jquery' ), DIGECO_VERSION, true );

		wp_register_script( 'jquery-timepicker', DIGECO_JS_URL . 'jquery.timepicker.min.js', array( 'jquery' ), DIGECO_VERSION, true );
		
		// Tilt js
		wp_register_script( 'tilt-jquery',       DIGECO_JS_URL . 'tilt.jquery.js', array( 'jquery' ), DIGECO_VERSION, true );
		
		// Parallax js
		wp_register_script( 'parallax-scroll',  DIGECO_JS_URL . 'jquery.parallax-scroll.js', array( 'jquery' ), DIGECO_VERSION, true );

		// Pagepiling
		wp_register_script( 'jquery-pagepiling', DIGECO_JS_URL . 'jquery.pagepiling.min.js', array( 'jquery' ), DIGECO_VERSION, true );
	}
}

add_action( 'wp_enqueue_scripts', 'digeco_enqueue_scripts', 15 );
if ( !function_exists( 'digeco_enqueue_scripts' ) ) {
	function digeco_enqueue_scripts() {
		$dep = array( 'jquery' );
		/*CSS*/
		// Google fonts
		wp_enqueue_style( 'digeco-gfonts', 		DigecoTheme_Helper::fonts_url(), array(), DIGECO_VERSION );
		// Bootstrap CSS  //@rtl
		wp_enqueue_style( 'bootstrap', 			digeco_get_maybe_rtl('bootstrap.min.css'), array(), DIGECO_VERSION );
		
		// Flaticon CSS
		wp_enqueue_style( 'flaticon-digeco',    DIGECO_ASSETS_URL . 'fonts/flaticon-digeco/flaticon.css', array(), DIGECO_VERSION );
		
		elementor_scripts();
		wp_enqueue_style( 'nivo-slider' );
		//Video popup
		wp_enqueue_style( 'magnific-popup' );
		// font-awesome CSS
		wp_enqueue_style( 'font-awesome',       DIGECO_CSS_URL . 'font-awesome.min.css', array(), DIGECO_VERSION );
		// animate CSS
		wp_enqueue_style( 'animate',            digeco_get_maybe_rtl('animate.min.css'), array(), DIGECO_VERSION );	
		// Select 2 CSS
		wp_enqueue_style( 'select2',            digeco_get_maybe_rtl('select2.min.css'), array(), DIGECO_VERSION );		
		// Meanmenu CSS // @rtl
		//wp_enqueue_style( 'meanmenu',     		digeco_get_maybe_rtl('meanmenu.css'), array(), DIGECO_VERSION );
		// main CSS // @rtl
		wp_enqueue_style( 'digeco-default',    	digeco_get_maybe_rtl('default.css'), array(), DIGECO_VERSION );
		// elementor css
		wp_enqueue_style( 'digeco-elementor',   digeco_get_maybe_rtl('elementor.css'), array(), DIGECO_VERSION );
		// rt-animation css
		wp_enqueue_style( 'digeco-rtanimation', digeco_get_maybe_rtl('rtanimation.css'), array(), DIGECO_VERSION );
			
		// Style CSS
		wp_enqueue_style( 'digeco-style',     	digeco_get_maybe_rtl('style.css'), array(), DIGECO_VERSION );
		
		// Template Style
		wp_add_inline_style( 'digeco-style',   	digeco_template_style() );

		/*JS*/
		wp_enqueue_script( 'isotope-pkgd' );
		// bootstrap js
		wp_enqueue_script( 'popper',            DIGECO_JS_URL . 'popper.js', array( 'jquery' ), DIGECO_VERSION, true );
		// bootstrap js
		wp_enqueue_script( 'bootstrap',         DIGECO_JS_URL . 'bootstrap.min.js', array( 'jquery' ), DIGECO_VERSION, true );
		
		// Comments
		if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
			wp_enqueue_script( 'comment-reply' );
		}
		// Select2 js
		wp_enqueue_script( 'select2',           DIGECO_JS_URL . 'select2.min.js', array( 'jquery' ), DIGECO_VERSION, true );
		// Meanmenu js
		//wp_enqueue_script( 'jquery-meanmenu', 	DIGECO_JS_URL . 'jquery.meanmenu.min.js', array( 'jquery' ), DIGECO_VERSION, true );		
		// Nav smooth scroll
		wp_enqueue_script( 'jquery-navpoint',      	DIGECO_JS_URL . 'jquery.navpoints.js', array( 'jquery' ), DIGECO_VERSION, true );
		// Countdown
		wp_enqueue_script( 'jquery-countdown',  DIGECO_JS_URL . 'jquery.countdown.min.js', array( 'jquery' ), DIGECO_VERSION, true );
		// Cookie js
		wp_enqueue_script( 'js-cookie',       	DIGECO_JS_URL . 'js.cookie.min.js', array( 'jquery' ), DIGECO_VERSION, true );

		wp_enqueue_script( 'nivo-slider' );
		wp_enqueue_script( 'theia-sticky' );
		wp_enqueue_style( 'jquery-timepicker' );
		wp_enqueue_script( 'jquery-timepicker' );
		wp_enqueue_script( 'tilt-jquery' );
		wp_enqueue_script( 'parallax-scroll' );
		wp_enqueue_script( 'magnific-popup' );
		
		wp_enqueue_script( 'masonry' );
		wp_enqueue_script( 'digeco-main',    	DIGECO_JS_URL . 'main.js', $dep , DIGECO_VERSION, true );
		
		if ( !empty( DigecoTheme::$options['logo']['url'] ) ) {
			$logo = '<img class="logo-small" src="'. esc_url( empty( DigecoTheme::$options['logo']['url'] ) ? DIGECO_IMG_URL . 'logo.png' : DigecoTheme::$options['logo']['url'] ).'" />';
		} else {
			$logo = '<img class="logo-small" src="'. esc_url( DIGECO_IMG_URL . 'logo.png' ) . '" />';
		}
		
		$html = '';

		if ( DigecoTheme::$options['online_button'] == '1' ) {
			$html .= '<a class="button-btn" target="_self" href="'.esc_url( DigecoTheme::$options['online_button_link'] ).'">'.esc_html( DigecoTheme::$options['online_button_text'] ).'</a>';
		}
		
		if ( DigecoTheme::$options['search_icon'] ) {
			ob_start();
			get_template_part( 'template-parts/header/icon', 'barsearch' );
			$html .= ob_get_clean();
		}
		
		if ( DigecoTheme::$options['cart_icon'] ) {
			ob_start();
			get_template_part( 'template-parts/header/icon', 'cart' );
			$html .= ob_get_clean();
		}

		
		// localize script
		$digeco_localize_data = array(
			'stickyMenu' 	=> DigecoTheme::$options['sticky_menu'],
			'meanWidth'  	=> DigecoTheme::$options['resmenu_width'],
			'siteLogo'   	=> '<a href="' . esc_url( home_url( '/' ) ) . '" alt="' . esc_attr( get_bloginfo( 'title' ) ) . '">' . esc_html ( $logo ) . '</a>' .$html,
			'extraOffset' => DigecoTheme::$options['sticky_menu'] ? 70 : 0,
			'extraOffsetMobile' => DigecoTheme::$options['sticky_menu'] ? 52 : 0,
			'rtl' => is_rtl()?'yes':'no',
			
			// Ajax
			'ajaxURL' => admin_url('admin-ajax.php'),
			'nonce' => wp_create_nonce( 'digeco-nonce' )
		);
		wp_localize_script( 'digeco-main', 'digecoObj', $digeco_localize_data );
	}	
}




function elementor_scripts() {
	
	if ( !did_action( 'elementor/loaded' ) ) {
		return;
	}
	
	if ( \Elementor\Plugin::$instance->preview->is_preview_mode() ) {
		// do stuff for preview
		wp_enqueue_style(  'owl-carousel' );
		wp_enqueue_style(  'owl-theme-default' );
		wp_enqueue_script( 'owl-carousel' );

		if ( is_page_template( 'page-template/template-pagepiling.php' ) ) {
		 	wp_enqueue_script( 'jquery-pagepiling' );		
			wp_enqueue_style( 'jquery-pagepiling' );
		}

		wp_enqueue_style( 'nivo-slider' );
		wp_enqueue_script( 'nivo-slider' );		
		wp_enqueue_style( 'jquery-timepicker' );
		wp_enqueue_script( 'timepicker-js' );		
		wp_enqueue_script( 'jquery-knob' );
		wp_enqueue_script( 'jquery-appear' );
		wp_enqueue_script( 'jquery-counterup' );
		wp_enqueue_script( 'rt-waypoints' );
		wp_enqueue_script( 'isotope-pkgd' );
		wp_enqueue_script( 'isotope-func' );
	} 
	
}

add_action( 'wp_enqueue_scripts', 'digeco_high_priority_scripts', 1500 );
if ( !function_exists( 'digeco_high_priority_scripts' ) ) {
	function digeco_high_priority_scripts() {
		// Dynamic style
		DigecoTheme_Helper::dynamic_internal_style();
	}
}

function digeco_template_style(){
	ob_start();
	$footer_bg_img = empty( DigecoTheme::$options['fbgimg']['url'] ) ? DIGECO_IMG_URL . 'footer1_bg.png' : DigecoTheme::$options['fbgimg']['url'];
	
	$footer2_bg_img = empty( DigecoTheme::$options['footer2_bottom_img']['url'] ) ? DIGECO_IMG_URL . 'footer2_bg.png' : DigecoTheme::$options['footer2_bottom_img']['url'];
	?>
	
	.entry-banner {
		<?php if ( DigecoTheme::$bgtype == 'bgcolor' ): ?>
			background-color: <?php echo esc_html( DigecoTheme::$bgcolor );?>;
		<?php else: ?>
			background: url(<?php echo esc_url( DigecoTheme::$bgimg );?>) no-repeat scroll center center / cover;
		<?php endif; ?>
	}
	
	.entry-banner .entry-banner-content {
		text-align: <?php echo DigecoTheme::$has_banner_align; ?>;
	}
	
	.footer-top-area {
		<?php if ( DigecoTheme::$options['footer_bgtype'] == 'fbgcolor' ): ?>
			background-color: <?php echo esc_html( DigecoTheme::$options['fbgcolor'] ); ?> !important;
		<?php else: ?>
			background: url(<?php echo esc_url( $footer_bg_img );?>) no-repeat scroll center center / cover;
		<?php endif; ?>
	}
	
	.footer-style-2 .footer-area {
		<?php if ( DigecoTheme::$options['footer2_bottom_img_display'] == 1  ): ?>
			background: url(<?php echo esc_url( $footer2_bg_img );?>) no-repeat scroll center bottom;
		<?php endif; ?>
	}
	
	.content-area {
		padding-top: <?php echo esc_html( DigecoTheme::$padding_top );?>px; 
		padding-bottom: <?php echo esc_html( DigecoTheme::$padding_bottom );?>px;
	}
	#page {
		background: url( <?php echo DigecoTheme::$pagebgimg; ?> );
		background-color: <?php echo DigecoTheme::$pagebgcolor; ?>;
	}
	.single-digeco_team #page {
		background-image: none;
		background-color: transparent;
	}
	.single-digeco_team .site-main {
		background-image: url( <?php echo DigecoTheme::$pagebgimg; ?> );
		background-color: <?php echo DigecoTheme::$pagebgcolor; ?>;
	}
	
	.error-page-area {		 
		background-color: <?php echo esc_html( DigecoTheme::$options['error_bodybg'] );?>;
	}

	
	<?php
	return ob_get_clean();
}

function load_custom_wp_admin_script_gutenberg() {
	wp_enqueue_style( 'digeco-gfonts', DigecoTheme_Helper::fonts_url(), array(), DIGECO_VERSION );
	// font-awesome CSS
	wp_enqueue_style( 'font-awesome',       DIGECO_CSS_URL . 'font-awesome.min.css', array(), DIGECO_VERSION );
	// Flaticon CSS
	wp_enqueue_style( 'flaticon-digeco',    DIGECO_ASSETS_URL . 'fonts/flaticon-digeco/flaticon.css', array(), DIGECO_VERSION );
}
add_action( 'admin_enqueue_scripts', 'load_custom_wp_admin_script_gutenberg', 1 );

function load_custom_wp_admin_script() {
	wp_enqueue_style( 'digeco-admin-style',  DIGECO_CSS_URL . 'admin-style.css', false, DIGECO_VERSION );
	wp_enqueue_script( 'digeco-admin-main',  DIGECO_JS_URL . 'admin.main.js', false, DIGECO_VERSION, true );
	
}
add_action( 'admin_enqueue_scripts', 'load_custom_wp_admin_script' );


