<?php 
$nav_menu_args   = DigecoTheme_Helper::nav_menu_args();
$rdtheme_logo  =  empty( DigecoTheme::$options['logo']['id'] ) ? '<img width="489" height="121" class="logo-small" alt="'.get_bloginfo( 'name' ).'" src="'. DIGECO_IMG_URL . 'logo.png'.'">' :  wp_get_attachment_image(DigecoTheme::$options['logo']['id'],'full',"", array( "class" => "logo-small" ));
?>
 
<div class="rt-header-menu mean-container" id="meanmenu">
    <div class="mean-bar">
    	<a href="<?php echo esc_url(home_url('/'));?>"><?php echo wp_kses_post($rdtheme_logo);?></a>

        <?php
        
        if ( DigecoTheme::$options['online_button'] == '1' ) {
            echo '<a class="button-btn" target="_self" href="'.esc_url( DigecoTheme::$options['online_button_link'] ).'">'.esc_html( DigecoTheme::$options['online_button_text'] ).'</a>';
        }

        if ( DigecoTheme::$options['search_icon'] ) {
            get_template_part( 'template-parts/header/icon', 'barsearch' );
        }
        
        if ( DigecoTheme::$options['cart_icon'] ) {
            get_template_part( 'template-parts/header/icon', 'cart' );
        }

        ?>

        <span class="sidebarBtn ">
            <span class="fa fa-bars">
            </span>
        </span>
    </div>

    <div class="rt-slide-nav">
        <div class="offscreen-navigation">
            <?php wp_nav_menu( $nav_menu_args );?>
        </div>
    </div>

</div>
