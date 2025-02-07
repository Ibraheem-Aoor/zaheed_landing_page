<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

namespace radiustheme\Digeco_Core;

use DigecoTheme;
use DigecoTheme_Helper;
use \RT_Postmeta;

if ( ! defined( 'ABSPATH' ) ) exit;

if ( !class_exists( 'RT_Postmeta' ) ) {
	return;
}

$Postmeta = RT_Postmeta::getInstance();

$prefix = DIGECO_CORE_CPT_PREFIX;

/*-------------------------------------
#. Layout Settings
---------------------------------------*/
$nav_menus = wp_get_nav_menus( array( 'fields' => 'id=>name' ) );
$nav_menus = array( 'default' => __( 'Default', 'digeco-core' ) ) + $nav_menus;
$sidebars  = array( 'default' => __( 'Default', 'digeco-core' ) ) + DigecoTheme_Helper::custom_sidebar_fields();

$Postmeta->add_meta_box( "{$prefix}_page_settings", __( 'Layout Settings', 'digeco-core' ), array( 'page', 'post', 'digeco_team', 'digeco_service', 'digeco_portfolio', 'digeco_testim' ), '', '', 'high', array(
	'fields' => array(
	
		"{$prefix}_layout_settings" => array(
			'label'   => __( 'Layouts', 'digeco-core' ),
			'type'    => 'group',
			'value'  => array(	
			
				"{$prefix}_layout" => array(
					'label'   => __( 'Layout', 'digeco-core' ),
					'type'    => 'select',
					'options' => array(
						'default'       => __( 'Default', 'digeco-core' ),
						'full-width'    => __( 'Full Width', 'digeco-core' ),
						'left-sidebar'  => __( 'Left Sidebar', 'digeco-core' ),
						'right-sidebar' => __( 'Right Sidebar', 'digeco-core' ),
					),
					'default'  => 'default',
				),		
				'digeco_sidebar' => array(
					'label'    => __( 'Custom Sidebar', 'digeco-core' ),
					'type'     => 'select',
					'options'  => $sidebars,
					'default'  => 'default',
				),
				"{$prefix}_page_menu" => array(
					'label'    => __( 'Main Menu', 'digeco-core' ),
					'type'     => 'select',
					'options'  => $nav_menus,
					'default'  => 'default',
				),
				"{$prefix}_tr_header" => array(
					'label'    	  => __( 'Transparent Header', 'digeco-core' ),
					'type'     	  => 'select',
					'options'  	  => array(
						'default' => __( 'Default', 'digeco-core' ),
						'on'      => __( 'Enabled', 'digeco-core' ),
						'off'     => __( 'Disabled', 'digeco-core' ),
					),
					'default'  => 'default',
				),
				"{$prefix}_top_bar" => array(
					'label' 	  => __( 'Top Bar', 'digeco-core' ),
					'type'  	  => 'select',
					'options' => array(
						'default' => __( 'Default', 'digeco-core' ),
						'on'      => __( 'Enabled', 'digeco-core' ),
						'off'     => __( 'Disabled', 'digeco-core' ),
					),
					'default'  	  => 'default',
				),
				"{$prefix}_top_bar_style" => array(
					'label' 	=> __( 'Top Bar Layout', 'digeco-core' ),
					'type'  	=> 'select',
					'options'	=> array(
						'default' => __( 'Default', 'digeco-core' ),
						'1'       => __( 'Layout 1', 'digeco-core' ),
						'2'       => __( 'Layout 2', 'digeco-core' ),
						'3'       => __( 'Layout 3', 'digeco-core' ),
						'4'       => __( 'Layout 4', 'digeco-core' ),
					),
					'default'   => 'default',
				),
				"{$prefix}_header_opt" => array(
					'label' 	  => __( 'Header On/Off', 'digeco-core' ),
					'type'  	  => 'select',
					'options' => array(
						'default' => __( 'Default', 'digeco-core' ),
						'on'      => __( 'Enabled', 'digeco-core' ),
						'off'     => __( 'Disabled', 'digeco-core' ),
					),
					'default'  	  => 'default',
				),
				"{$prefix}_header" => array(
					'label'   => __( 'Header Layout', 'digeco-core' ),
					'type'    => 'select',
					'options' => array(
						'default' => __( 'Default', 'digeco-core' ),
						'1'       => __( 'Layout 1', 'digeco-core' ),
						'2'       => __( 'Layout 2', 'digeco-core' ),
						'3'       => __( 'Layout 3', 'digeco-core' ),
						'4'       => __( 'Layout 4', 'digeco-core' ),
						'5'       => __( 'Layout 5', 'digeco-core' ),
						'6'       => __( 'Layout 6', 'digeco-core' ),
						'7'       => __( 'Layout 7', 'digeco-core' ),
					),
					'default'  => 'default',
				),
				"{$prefix}_footer" => array(
					'label'   => __( 'Footer Layout', 'digeco-core' ),
					'type'    => 'select',
					'options' => array(
						'default' => __( 'Default', 'digeco-core' ),
						'1'       => __( 'Layout 1', 'digeco-core' ),
						'2'       => __( 'Layout 2', 'digeco-core' ),
						'3'       => __( 'Layout 3', 'digeco-core' ),
						'4'       => __( 'Layout 4', 'digeco-core' ),
						'5'       => __( 'Layout 5', 'digeco-core' ),
						'6'       => __( 'Layout 6', 'digeco-core' ),
						'7'       => __( 'Layout 7', 'digeco-core' ),
						'8'       => __( 'Layout 8', 'digeco-core' ),
						'9'       => __( 'Layout 9', 'digeco-core' ),
					),
					'default'  => 'default',
				),
				"{$prefix}_footer_area" => array(
					'label' 	  => __( 'Footer Area', 'digeco-core' ),
					'type'  	  => 'select',
					'options' => array(
						'default' => __( 'Default', 'digeco-core' ),
						'on'      => __( 'Enabled', 'digeco-core' ),
						'off'     => __( 'Disabled', 'digeco-core' ),
					),
					'default'  	  => 'default',
				),
				"{$prefix}_copyright_area" => array(
					'label' 	  => __( 'Copyright Area', 'digeco-core' ),
					'type'  	  => 'select',
					'options' => array(
						'default' => __( 'Default', 'digeco-core' ),
						'on'      => __( 'Enabled', 'digeco-core' ),
						'off'     => __( 'Disabled', 'digeco-core' ),
					),
					'default'  	  => 'default',
				),
				"{$prefix}_top_padding" => array(
					'label'   => __( 'Content Padding Top', 'digeco-core' ),
					'type'    => 'select',
					'options' => array(
						'default' => __( 'Default', 'digeco-core' ),
						'0px'     => __( '0px', 'digeco-core' ),
						'10px'    => __( '10px', 'digeco-core' ),
						'20px'    => __( '20px', 'digeco-core' ),
						'30px'    => __( '30px', 'digeco-core' ),
						'40px'    => __( '40px', 'digeco-core' ),
						'50px'    => __( '50px', 'digeco-core' ),
						'60px'    => __( '60px', 'digeco-core' ),
						'70px'    => __( '70px', 'digeco-core' ),
						'80px'    => __( '80px', 'digeco-core' ),
						'90px'    => __( '90px', 'digeco-core' ),
						'100px'   => __( '100px', 'digeco-core' ),
						'110px'   => __( '110px', 'digeco-core' ),
						'120px'   => __( '120px', 'digeco-core' ),
					),
					'default'  => 'default',
				),
				"{$prefix}_bottom_padding" => array(
					'label'   => __( 'Content Padding Bottom', 'digeco-core' ),
					'type'    => 'select',
					'options' => array(
						'default' => __( 'Default', 'digeco-core' ),
						'0px'     => __( '0px', 'digeco-core' ),
						'10px'    => __( '10px', 'digeco-core' ),
						'20px'    => __( '20px', 'digeco-core' ),
						'30px'    => __( '30px', 'digeco-core' ),
						'40px'    => __( '40px', 'digeco-core' ),
						'50px'    => __( '50px', 'digeco-core' ),
						'60px'    => __( '60px', 'digeco-core' ),
						'70px'    => __( '70px', 'digeco-core' ),
						'80px'    => __( '80px', 'digeco-core' ),
						'90px'    => __( '90px', 'digeco-core' ),
						'100px'   => __( '100px', 'digeco-core' ),
						'110px'   => __( '110px', 'digeco-core' ),
						'120px'   => __( '120px', 'digeco-core' ),
					),
					'default'  => 'default',
				),
				"{$prefix}_banner" => array(
					'label'   => __( 'Banner', 'digeco-core' ),
					'type'    => 'select',
					'options' => array(
						'default' => __( 'Default', 'digeco-core' ),
						'on'	  => __( 'Enable', 'digeco-core' ),
						'off'	  => __( 'Disable', 'digeco-core' ),
					),
					'default'  => 'default',
				),
				"{$prefix}_breadcrumb" => array(
					'label'   => __( 'Breadcrumb', 'digeco-core' ),
					'type'    => 'select',
					'options' => array(
						'default' => __( 'Default', 'digeco-core' ),
						'on'      => __( 'Enable', 'digeco-core' ),
						'off'	  => __( 'Disable', 'digeco-core' ),
					),
					'default'  => 'default',
				),
				"{$prefix}_banner_title_align" => array(
					'label'   => __( 'Banner Title Align', 'digeco-core' ),
					'type'    => 'select',
					'options' => array(
						'default' => __( 'Default', 'digeco-core' ),
						'center' => __( 'Center', 'digeco-core' ),
						'left'	  => __( 'Left', 'digeco-core' ),
						'right'	  => __( 'Right', 'digeco-core' ),
					),
					'default'  => 'default',
				),
				"{$prefix}_banner_type" => array(
					'label'   => __( 'Banner Background Type', 'digeco-core' ),
					'type'    => 'select',
					'options' => array(
						'default' => __( 'Default', 'digeco-core' ),
						'bgimg'   => __( 'Background Image', 'digeco-core' ),
						'bgcolor' => __( 'Background Color', 'digeco-core' ),
					),
					'default' => 'default',
				),
				"{$prefix}_banner_bgimg" => array(
					'label' => __( 'Banner Background Image', 'digeco-core' ),
					'type'  => 'image',
					'desc'  => __( 'If not selected, default will be used', 'digeco-core' ),
				),
				"{$prefix}_banner_bgcolor" => array(
					'label' => __( 'Banner Background Color', 'digeco-core' ),
					'type'  => 'color_picker',
					'desc'  => __( 'If not selected, default will be used', 'digeco-core' ),
				),		
				"{$prefix}_page_bgimg" => array(
					'label' => __( 'Page/Post Background Image', 'digeco-core' ),
					'type'  => 'image',
					'desc'  => __( 'If not selected, default will be used', 'digeco-core' ),
				),
				"{$prefix}_page_bgcolor" => array(
					'label' => __( 'Page/Post Background Color', 'digeco-core' ),
					'type'  => 'color_picker',
					'desc'  => __( 'If not selected, default will be used', 'digeco-core' ),
				),
			)
		)
	),
) );


/*-------------------------------------
#. Team
---------------------------------------*/

$Postmeta->add_meta_box( 'digeco_team_settings', __( 'Team Member Settings', 'digeco-core' ), array( 'digeco_team' ), '', '', 'high', array(
	'fields' => array(
		'digeco_team_designation' => array(
			'label' => __( 'Designation', 'digeco-core' ),
			'type'  => 'text',
		),
		'digeco_team_email' => array(
			'label' => __( 'Email', 'digeco-core' ),
			'type'  => 'text',
		),
		'digeco_team_phone' => array(
			'label' => __( 'Phone', 'digeco-core' ),
			'type'  => 'text',
		),
		'digeco_team_address' => array(
			'label' => __( 'Address', 'digeco-core' ),
			'type'  => 'text',
		),
		'digeco_team_socials_header' => array(
			'label' => __( 'Socials', 'digeco-core' ),
			'type'  => 'header',
			'desc'  => __( 'Enter your social links here', 'digeco-core' ),
		),
		'digeco_team_socials' => array(
			'type'  => 'group',
			'value'  => DigecoTheme_Helper::team_socials()
		),
	)
) );

$Postmeta->add_meta_box( 'digeco_team_skills', __( 'Team Member Skills', 'digeco-core' ), array( 'digeco_team' ), '', '', 'high', array(
	'fields' => array(
		'digeco_team_skill' => array(
			'type'  => 'repeater',
			'button' => __( 'Add New Skill', 'digeco-core' ),
			'value'  => array(
				'skill_name' => array(
					'label' => __( 'Skill Name', 'digeco-core' ),
					'type'  => 'text',
					'desc'  => __( 'eg. Marketing', 'digeco-core' ),
				),
				'skill_value' => array(
					'label' => __( 'Skill Percentage (%)', 'digeco-core' ),
					'type'  => 'text',
					'desc'  => __( 'eg. 75', 'digeco-core' ),
				),
				'skill_color' => array(
					'label' => __( 'Skill Color', 'digeco-core' ),
					'type'  => 'color_picker',
					'desc'  => __( 'If not selected, primary color will be used', 'digeco-core' ),
				),
			)
		),
	)
) );
$Postmeta->add_meta_box( 'digeco_team_contact', __( 'Team Member Contact', 'digeco-core' ), array( 'digeco_team' ), '', '', 'high', array(
	'fields' => array(
		'digeco_team_contact_form' => array(
			'label' => __( 'Contct Shortcode', 'digeco-core' ),
			'type'  => 'text',
		),
	)
) );

/*-------------------------------------
#. Service
---------------------------------------*/
$Postmeta->add_meta_box( 'digeco_service_info', __( 'Service Info', 'digeco-core' ), array( 'digeco_service' ), '', '', 'high', array(
	'fields' => array(
		'digeco_service_contact' => array(
			'label' => __( 'Service Contact', 'clenix-core' ),
			'type'  => 'text',
		),
		'digeco_service_email' => array(
			'label' => __( 'Service E-mail', 'clenix-core' ),
			'type'  => 'text',
		),
		'digeco_service_button' => array(
			'label' => __( 'Service Button', 'digeco-core' ),
			'type'  => 'text',
		),
		'digeco_service_url' => array(
			'label' => __( 'Service Button Url', 'digeco-core' ),
			'type'  => 'text',
		),
	),
) );

$Postmeta->add_meta_box( 'digeco_service_media', __( 'Service Icon image', 'digeco-core' ),
		array( "digeco_service" ),'',
		'side',
		'default', array(
		'fields' => array(
			"digeco_service_icon" => array(
			  'label' => __( 'Service Icon', 'digeco-core' ),
			  'type'  => 'icon_select',
			  'desc'  => __( "Choose a Icon for your service", 'digeco-core' ),
			  'options' => DigecoTheme_Helper::get_icons(),
			),
			"digeco_service_img" => array(
				'label' => __( 'Service Image', 'digeco-core' ),
				'type'  => 'image',
				'desc'  => __( "Upload service image in case of icon not selected", 'digeco-core' ),
			),
		)
) );
/*-------------------------------------
#. Portfolio
---------------------------------------*/

$Postmeta->add_meta_box( 'digeco_portfolio_info', __( 'Portfolio Info', 'digeco-core' ), array( 'digeco_portfolio' ), '', '', 'high', array(
	'fields' => array(
		'digeco_port_info_title' => array(
			'label' => __( 'Info Title', 'digeco-core' ),
			'type'  => 'text',
		),
		'digeco_port_des' => array(
			'label' => __( 'Info Description', 'digeco-core' ),
			'type'  => 'textarea',
		),
		'digeco_client_name' => array(
			'label' => __( 'Client', 'digeco-core' ),
			'type'  => 'text',
		),
		'digeco_start_date' => array(
			'label' => __( 'Start Date', 'digeco-core' ),
			'type'  => 'text',
		),
		'digeco_finish_date' => array(
			'label' => __( 'End Date', 'digeco-core' ),
			'type'  => 'text',
		),
		'digeco_website' => array(
			'label' => __( 'Website', 'digeco-core' ),
			'type'  => 'text',
		),
		'digeco_port_rating' => array(
			'label' => __( 'Select the Rating', 'digeco-core' ),
			'type'  => 'select',
			'options' => array(
				'default' => __( 'Default', 'digeco-core' ),
				'1'    => '1',
				'2'    => '2',
				'3'    => '3',
				'4'    => '4',
				'5'    => '5'
				),
			'default'  => 'default',
		),	
		'digeco_port_image' => array(
			'label' => __( 'Portfolio Right Image', 'digeco-core' ),
			'type'  => 'image',
		),			
		'digeco_port_gallery' => array(
			'label' => __( 'Portfolio Gallery', 'digeco-core' ),
			'type'  => 'gallery',
		),
	),
) );

$Postmeta->add_meta_box( 'digeco_portfolio_share', __( 'Portfolio Social Share', 'digeco-core' ), array( 'digeco_portfolio' ), '', '', 'high', array(
	'fields' => array(
		'digeco_portfolio_socials' => array(
			'label' => __( 'Socials', 'digeco-core' ),
			'type'  => 'header',
			'desc'  => __( 'Enter your social links here', 'digeco-core' ),
		),
		'digeco_portfolio_icons' => array(
			'type'  => 'group',
			'value'  => DigecoTheme_Helper::team_socials()
		),
	)
) );

/*-------------------------------------
#. Testimonial
---------------------------------------*/
$Postmeta->add_meta_box( 'digeco_testimonial_info', __( 'Testimonial Info', 'digeco-core' ), array( 'digeco_testim' ), '', '', 'high', array(
	'fields' => array(
		'digeco_tes_designation' => array(
			'label' => __( 'Designation', 'digeco-core' ),
			'type'  => 'text',
		),		
		'digeco_tes_rating' => array(
			'label' => __( 'Select the Rating', 'digeco-core' ),
			'type'  => 'select',
			'options' => array(
				'default' => __( 'Default', 'digeco-core' ),
				'1'    => '1',
				'2'    => '2',
				'3'    => '3',
				'4'    => '4',
				'5'    => '5'
				),
			'default'  => 'default',
		),
	)
) );