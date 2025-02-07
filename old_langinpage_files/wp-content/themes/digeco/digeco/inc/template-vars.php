<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

add_action( 'template_redirect', 'digeco_template_vars' );
if( !function_exists( 'digeco_template_vars' ) ) {
    function digeco_template_vars() {
        // Single Pages
        if( is_single() || is_page() ) {
            $post_type = get_post_type();
            $post_id   = get_the_id();
            switch( $post_type ) {
                case 'page':
                $prefix = 'page';
                break;
                case 'post':
                $prefix = 'single_post';
                break;	
                case 'digeco_service':
                $prefix = 'services';
                break;  
                case 'digeco_portfolio':
                $prefix = 'portfolio';
                break;  			
                case 'product':
                $prefix = 'product';
                break;
                default:
                $prefix = 'single_post';
                break;
            }
			
			$layout_settings    = get_post_meta( $post_id, 'digeco_layout_settings', true );
            
            DigecoTheme::$layout = ( empty( $layout_settings['digeco_layout'] ) || $layout_settings['digeco_layout']  == 'default' ) ? DigecoTheme::$options[$prefix . '_layout'] : $layout_settings['digeco_layout'];

			DigecoTheme::$sidebar = ( empty( $layout_settings['digeco_sidebar'] ) || $layout_settings['digeco_sidebar'] == 'default' ) ? DigecoTheme::$options[$prefix . '_sidebar'] : $layout_settings['digeco_sidebar'];
			
			DigecoTheme::$tr_header = ( empty( $layout_settings['digeco_tr_header'] ) || $layout_settings['digeco_tr_header'] == 'default' ) ? DigecoTheme::$options['tr_header'] : $layout_settings['digeco_tr_header'];
            
            DigecoTheme::$top_bar = ( empty( $layout_settings['digeco_top_bar'] ) || $layout_settings['digeco_top_bar'] == 'default' ) ? DigecoTheme::$options['top_bar'] : $layout_settings['digeco_top_bar'];
            
            DigecoTheme::$top_bar_style = ( empty( $layout_settings['digeco_top_bar_style'] ) || $layout_settings['digeco_top_bar_style'] == 'default' ) ? DigecoTheme::$options['top_bar_style'] : $layout_settings['digeco_top_bar_style'];
			
			DigecoTheme::$header_opt = ( empty( $layout_settings['digeco_header_opt'] ) || $layout_settings['digeco_header_opt'] == 'default' ) ? DigecoTheme::$options['header_opt'] : $layout_settings['digeco_header_opt'];
            
            DigecoTheme::$header_style = ( empty( $layout_settings['digeco_header'] ) || $layout_settings['digeco_header'] == 'default' ) ? DigecoTheme::$options['header_style'] : $layout_settings['digeco_header'];
			
            DigecoTheme::$footer_style = ( empty( $layout_settings['digeco_footer'] ) || $layout_settings['digeco_footer'] == 'default' ) ? DigecoTheme::$options['footer_style'] : $layout_settings['digeco_footer'];
			
			DigecoTheme::$footer_area = ( empty( $layout_settings['digeco_footer_area'] ) || $layout_settings['digeco_footer_area'] == 'default' ) ? DigecoTheme::$options['footer_area'] : $layout_settings['digeco_footer_area'];
			
			DigecoTheme::$copyright_area = ( empty( $layout_settings['digeco_copyright_area'] ) || $layout_settings['digeco_copyright_area'] == 'default' ) ? DigecoTheme::$options['copyright_area'] : $layout_settings['digeco_copyright_area'];
            
            $padding_top = ( empty( $layout_settings['digeco_top_padding'] ) || $layout_settings['digeco_top_padding'] == 'default' ) ? DigecoTheme::$options[$prefix . '_padding_top'] : $layout_settings['digeco_top_padding'];
			
            DigecoTheme::$padding_top = (int) $padding_top;
            
            $padding_bottom = ( empty( $layout_settings['digeco_bottom_padding'] ) || $layout_settings['digeco_bottom_padding'] == 'default' ) ? DigecoTheme::$options[$prefix . '_padding_bottom'] : $layout_settings['digeco_bottom_padding'];
			
            DigecoTheme::$padding_bottom = (int) $padding_bottom;
			
            DigecoTheme::$has_banner = ( empty( $layout_settings['digeco_banner'] ) || $layout_settings['digeco_banner'] == 'default' ) ? DigecoTheme::$options[$prefix . '_banner'] : $layout_settings['digeco_banner'];
            
            DigecoTheme::$has_banner_align = ( empty( $layout_settings['digeco_banner_title_align'] ) || $layout_settings['digeco_banner_title_align'] == 'default' ) ? DigecoTheme::$options[$prefix . '_banner_title_align'] : $layout_settings['digeco_banner_title_align'];
			
			DigecoTheme::$has_breadcrumb = ( empty( $layout_settings['digeco_breadcrumb'] ) || $layout_settings['digeco_breadcrumb'] == 'default' ) ? DigecoTheme::$options['breadcrumb_active'] : $layout_settings['digeco_breadcrumb'];
            
            DigecoTheme::$bgtype = ( empty( $layout_settings['digeco_banner_type'] ) || $layout_settings['digeco_banner_type'] == 'default' ) ? DigecoTheme::$options[$prefix . '_bgtype'] : $layout_settings['digeco_banner_type'];
            
            DigecoTheme::$bgcolor = empty( $layout_settings['digeco_banner_bgcolor'] ) ? DigecoTheme::$options[$prefix . '_bgcolor'] : $layout_settings['digeco_banner_bgcolor'];
			
			if( !empty( $layout_settings['digeco_banner_bgimg'] ) ) {
                $attch_url      = wp_get_attachment_image_src( $layout_settings['digeco_banner_bgimg'], 'full', true );
                DigecoTheme::$bgimg = $attch_url[0];
            } elseif( !empty( DigecoTheme::$options[$prefix . '_bgimg']['id'] ) ) {
                $attch_url      = wp_get_attachment_image_src( DigecoTheme::$options[$prefix . '_bgimg']['id'], 'full', true );
                DigecoTheme::$bgimg = $attch_url[0];
            } else {
                DigecoTheme::$bgimg = DIGECO_IMG_URL . 'banner.jpg';
            }
			
			DigecoTheme::$pagebgcolor = empty( $layout_settings['digeco_page_bgcolor'] ) ? DigecoTheme::$options[$prefix . '_page_bgcolor'] : $layout_settings['digeco_page_bgcolor'];
            
            if( !empty( $layout_settings['digeco_page_bgimg'] ) ) {
                $attch_url      = wp_get_attachment_image_src( $layout_settings['digeco_page_bgimg'], 'full', true );
                DigecoTheme::$pagebgimg = $attch_url[0];
            } elseif( !empty( DigecoTheme::$options[$prefix . '_bgimg']['id'] ) ) {
                $attch_url      = wp_get_attachment_image_src( DigecoTheme::$options[$prefix . '_page_bgimg']['id'], 'full', true );
                DigecoTheme::$pagebgimg = $attch_url[0];
            }
        }
        
        // Blog and Archive
        elseif( is_home() || is_archive() || is_search() || is_404() ) {
            if( is_search() ) {
                $prefix = 'search';
            }elseif( is_404() ) {
                $prefix                                = 'error';
                DigecoTheme::$options[$prefix . '_layout'] = 'full-width';
            }elseif( function_exists( 'is_woocommerce' ) && is_woocommerce() ) {
                $prefix = 'shop';
            }elseif( is_post_type_archive( "digeco_service" ) || is_tax( "digeco_service_category" ) ) {
                $prefix = 'services_archive';            
            }elseif( is_post_type_archive( "digeco_portfolio" ) || is_tax( "digeco_portfolio_category" ) ) {
                $prefix = 'portfolio_archive';            
            }else{
                $prefix = 'blog';
            }
            
            DigecoTheme::$layout         		= DigecoTheme::$options[$prefix . '_layout'];
            DigecoTheme::$tr_header      		= DigecoTheme::$options['tr_header'];
            DigecoTheme::$top_bar        		= DigecoTheme::$options['top_bar'];
            DigecoTheme::$header_opt      		= DigecoTheme::$options['header_opt'];
            DigecoTheme::$footer_area     		= DigecoTheme::$options['footer_area'];
			DigecoTheme::$copyright_area  		= DigecoTheme::$options['copyright_area'];
            DigecoTheme::$top_bar_style  		= DigecoTheme::$options['top_bar_style'];
            DigecoTheme::$header_style   		= DigecoTheme::$options['header_style'];
            DigecoTheme::$footer_style   		= DigecoTheme::$options['footer_style'];
            DigecoTheme::$padding_top    		= DigecoTheme::$options[$prefix . '_padding_top'];
            DigecoTheme::$padding_bottom 		= DigecoTheme::$options[$prefix . '_padding_bottom'];
            DigecoTheme::$has_banner     		= DigecoTheme::$options[$prefix . '_banner'];
            DigecoTheme::$has_banner_align 		= DigecoTheme::$options[$prefix . '_banner_title_align'];
            DigecoTheme::$has_breadcrumb 		= DigecoTheme::$options[$prefix . '_breadcrumb'];
            DigecoTheme::$bgtype         		= DigecoTheme::$options[$prefix . '_bgtype'];
            DigecoTheme::$bgcolor        		= DigecoTheme::$options[$prefix . '_bgcolor'];
			
            if( !empty( DigecoTheme::$options[$prefix . '_bgimg']['id'] ) ) {
                $attch_url      = wp_get_attachment_image_src( DigecoTheme::$options[$prefix . '_bgimg']['id'], 'full', true );
                DigecoTheme::$bgimg = $attch_url[0];
            } else {
                DigecoTheme::$bgimg = DIGECO_IMG_URL . 'banner.jpg';
            }
			
           	DigecoTheme::$pagebgcolor = DigecoTheme::$options[$prefix . '_page_bgcolor'];
			
            if( !empty( DigecoTheme::$options[$prefix . '_page_bgimg']['id'] ) ) {
                $attch_url      = wp_get_attachment_image_src( DigecoTheme::$options[$prefix . '_page_bgimg']['id'], 'full', true );
                DigecoTheme::$pagebgimg = $attch_url[0];
            }
        }
    }
}

// Add body class
add_filter( 'body_class', 'digeco_body_classes' );
if( !function_exists( 'digeco_body_classes' ) ) {
    function digeco_body_classes( $classes ) {
        
        $classes[] = 'header-style-'. DigecoTheme::$header_style;		
        $classes[] = 'footer-style-'. DigecoTheme::$footer_style;

        if ( DigecoTheme::$top_bar == 1 || DigecoTheme::$top_bar == 'on' ){
            $classes[] = 'has-topbar topbar-style-'. DigecoTheme::$top_bar_style;
        }

        if ( DigecoTheme::$tr_header == 1 || DigecoTheme::$tr_header == 'on' ){
           $classes[] = 'trheader';
        }
        
        $classes[] = ( DigecoTheme::$layout == 'full-width' ) ? 'no-sidebar' : 'has-sidebar';
		
		$classes[] = ( DigecoTheme::$layout == 'left-sidebar' ) ? 'left-sidebar' : 'right-sidebar';
        
        if( isset( $_COOKIE["shopview"] ) && $_COOKIE["shopview"] == 'list' ) {
            $classes[] = 'product-list-view';
        } else {
            $classes[] = 'product-grid-view';
        }
		if ( is_singular('post') ) {
			$classes[] =  ' post-detail-' . DigecoTheme::$options['post_style'];
        }
        return $classes;
    }
}