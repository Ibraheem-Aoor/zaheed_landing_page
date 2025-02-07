<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

namespace radiustheme\Digeco_Core;

use Elementor\Controls_Manager;
use Elementor\Group_Control_Image_Size;
use Elementor\Group_Control_Typography;
use Elementor\Scheme_Base;
use Elementor\Utils;

if ( ! defined( 'ABSPATH' ) ) exit;

class Info_Box extends Custom_Widget_Base {

	public function __construct( $data = [], $args = null ){
		$this->rt_name = esc_html__( 'RT Info Box', 'digeco-core' );
		$this->rt_base = 'rt-info-box';
		parent::__construct( $data, $args );
	}

	public function rt_fields(){
		$fields = array(
			array(
				'mode'    => 'section_start',
				'id'      => 'sec_general',
				'label'   => esc_html__( 'General', 'digeco-core' ),
			),
			array(
				'type'    => Controls_Manager::SELECT2,
				'id'      => 'style',
				'label'   => esc_html__( 'Style', 'digeco-core' ),
				'options' => array(
					'style1' => esc_html__( 'Style 1', 'digeco-core' ),
					'style2' => esc_html__( 'Style 2', 'digeco-core' ),
					'style3' => esc_html__( 'Style 3', 'digeco-core' ),
					'style4' => esc_html__( 'Style 4', 'digeco-core' ),
					'style5' => esc_html__( 'Style 5', 'digeco-core' ),
					'style6' => esc_html__( 'Style 6', 'digeco-core' ),
					'style7' => esc_html__( 'Style 7', 'digeco-core' ),
					'style8' => esc_html__( 'Style 8', 'digeco-core' ),
					'style9' => esc_html__( 'Style 9', 'digeco-core' ),
					'style10' => esc_html__( 'Style 10', 'digeco-core' ),
					'style11' => esc_html__( 'Style 11', 'digeco-core' ),
					'style12' => esc_html__( 'Style 12', 'digeco-core' ),
					'style13' => esc_html__( 'Style 13', 'digeco-core' ),
					'style14' => esc_html__( 'Style 14', 'digeco-core' ),
					'style15' => esc_html__( 'Style 15', 'digeco-core' ),
					'style16' => esc_html__( 'Style 16', 'digeco-core' ),
					'style17' => esc_html__( 'Style 17', 'digeco-core' ),
					'style18' => esc_html__( 'Style 18', 'digeco-core' ),
					'style19' => esc_html__( 'Style 19', 'digeco-core' ),
					'style20' => esc_html__( 'Style 20', 'digeco-core' ),
				),
				'default' => 'style1',
			),
			array(
				'type'    => Controls_Manager::SELECT2,
				'id'      => 'theme_mode',
				'label'   => esc_html__( 'Theme Mode', 'digeco-core' ),
				'options' => array(
					'normal-mode'     => esc_html__( 'Normal Mode', 'digeco-core' ),
					'dark-mode'      => esc_html__( 'Dark Mode', 'digeco-core' ),
				),
				'default' => 'normal-mode',
				'condition'   => array( 'style' => array( 'style4' ) ),
			),
			array(
				'type'    => Controls_Manager::SELECT2,
				'id'      => 'themestyle',
				'label'   => esc_html__( 'Theme Style', 'digeco-core' ),
				'options' => array(
					'california' => esc_html__( 'Theme 1', 'digeco-core' ),
					'emerald' => esc_html__( 'Theme 2', 'digeco-core' ),
					'royal-blue' => esc_html__( 'Theme 3', 'digeco-core' ),
					'dodger-blue' => esc_html__( 'Theme 4', 'digeco-core' ),
					'sunset-orange' => esc_html__( 'Theme 5', 'digeco-core' ),
					'turquoise' => esc_html__( 'Theme 6', 'digeco-core' ),
					'hexagon' => esc_html__( 'Theme 7', 'digeco-core' ),
				),
				'default' => 'california',
				'condition'   => array( 'style' => array( 'style1', 'style9' ) ),
			),
			array(
				'type'    => Controls_Manager::SELECT2,
				'id'      => 'animation_display',
				'label'   => esc_html__( 'Animation Off/On', 'digeco-core' ),
				'options' => array(
					'has-animation'     => esc_html__( 'On', 'digeco-core' ),
					'no-animation'      => esc_html__( 'Off', 'digeco-core' ),
				),
				'default' => 'has-animation',
			),
			array(
				'type'    => Controls_Manager::TEXT,
				'id'      => 'delay',
				'label'   => esc_html__( 'Animation Delay', 'digeco-core' ),
				'default' => '100',
				'condition'   => array( 'animation_display' => array( 'has-animation' ) ),
			),	
			array(
				'type'    => Controls_Manager::SELECT2,
				'id'      => 'left_icon',
				'label'   => esc_html__( 'Left Icon', 'digeco-core' ),
				'options' => array(
					'top-icon'     => esc_html__( 'Top Icon', 'digeco-core' ),
					'left-icon'      => esc_html__( 'Left Icon', 'digeco-core' ),
				),
				'default' => 'top-icon',
				'condition'   => array( 'style' => array( 'style18' ) ),
			),	
			/*Icon Start*/
			array(					 
			   'type'    => Controls_Manager::CHOOSE,
			   'options' => [
			     'icon' => [
			       'title' => esc_html__( 'Left', 'digeco-core' ),
			       'icon' => 'fa fa-smile-o',
			     ],
			     'image' => [
			       'title' => esc_html__( 'Center', 'digeco-core' ),
			       'icon' => 'fa fa-image',
			     ],		     
			   ],
			   'id'      => 'icontype',
			   'label'   => esc_html__( 'Media Type', 'digeco-core' ),
			   'default' => 'icon',
			   'label_block' => false,
			   'toggle' => false,
				'condition'   => array( 'style' => array( 'style1', 'style2', 'style3', 'style4', 'style6', 'style7', 'style8', 'style9', 'style11', 'style12', 'style13', 'style15', 'style16', 'style17', 'style18', 'style19', 'style20' ) ),
			),
			array(
				'type'    => Controls_Manager::ICONS,
				'id'      => 'icon_class',
				'label'   => esc_html__( 'Icon', 'digeco-core' ),
				'default' => [
			      'value' => 'fas fa-smile-wink',
			      'library' => 'fa-solid',
			  ],	
			  	'condition'   => array('icontype' => array( 'icon' ), 'style' => array( 'style1', 'style2', 'style3', 'style4', 'style6', 'style7', 'style8', 'style9', 'style11', 'style12', 'style13', 'style14', 'style15', 'style16', 'style17', 'style18', 'style19', 'style20' ) ),
			),	
			array(
				'type'    => Controls_Manager::MEDIA,
				'id'      => 'icon_image',
				'label'   => esc_html__( 'Image', 'digeco-core' ),
				'default' => [
                    'url' => Utils::get_placeholder_image_src(),
                ],
				'condition'   => array('icontype' => array( 'image' ), 'style' => array( 'style1', 'style2', 'style3', 'style4', 'style6', 'style7', 'style8', 'style9', 'style11', 'style12', 'style13', 'style15', 'style16', 'style17', 'style18', 'style19', 'style20' ) ),
				'description' => esc_html__( 'Recommended full image', 'digeco-core' ),
			),
			array(
				'type'    => Group_Control_Image_Size::get_type(),
				'mode'    => 'group',				
				'label'   => esc_html__( 'image size', 'digeco-core' ),	
				'name' => 'icon_image_size', 
				'separator' => 'none',		
				'condition'   => array('icontype' => array( 'image' ), 'style' => array( 'style1', 'style2', 'style3', 'style4', 'style6', 'style7', 'style8', 'style9', 'style11', 'style12', 'style13', 'style15', 'style16', 'style17', 'style18', 'style19', 'style20' ) ),
			),
			/*Icon end*/
			array(
				'type'    => Controls_Manager::NUMBER,
				'id'      => 'icon_size',
				'label'   => esc_html__( 'Icon Size', 'digeco-core' ),
				'default' => '',
				'selectors' => array(
					'{{WRAPPER}} .info-box-default .icon-holder .item-icon i' => 'font-size: {{VALUE}}px',
					'{{WRAPPER}} .info-box-default .icon-holder .item-icon i:before' => 'font-size: {{VALUE}}px',
					'{{WRAPPER}} .info-box-default .rtin-item .rtin-icon i:before' => 'font-size: {{VALUE}}px',
				),
				'condition'   => array( 'style' => array( 'style1', 'style2', 'style3', 'style4', 'style6', 'style7', 'style8', 'style9', 'style11', 'style12', 'style13', 'style14', 'style15', 'style16', 'style17' ) ),
			),
			array(
				'type'    => Controls_Manager::TEXT,
				'id'      => 'title',
				'label'   => esc_html__( 'Title', 'digeco-core' ),
				'default' => esc_html__( 'Digital Solutions', 'digeco-core' ),
			),			
			array(
				'type'    => Controls_Manager::WYSIWYG,
				'id'      => 'content',
				'label'   => esc_html__( 'Content', 'digeco-core' ),
				'default' => esc_html__( 'Grursus mal suada faci ipsum to and the and dolarorit ametion consectetur elitto more bulum that odio', 'digeco-core' ),
			),
			array(
				'type'  => Controls_Manager::URL,
				'id'    => 'url',
				'label' => esc_html__( 'Link (Optional)', 'digeco-core' ),
				'placeholder' => 'https://your-link.com',
			),
			array(
				'type'    => Controls_Manager::TEXT,
				'id'      => 'buttontext',
				'label'   => esc_html__( 'Button Text', 'digeco-core' ),
				'default' => 'Read More',
				'condition'   => array( 'style' => array( 'style1', 'style2', 'style3', 'style4', 'style6', 'style7', 'style9', 'style10', 'style11', 'style12', 'style15', 'style16', 'style16', 'style17' ) ),
			),
			array(
				'mode' => 'section_end',
			),
			
			/*Title Style Option*/
			array(
				'mode'    => 'section_start',
				'id'      => 'sec_style',
				'label'   => esc_html__( 'Style', 'digeco-core' ),
				'tab'     => Controls_Manager::TAB_STYLE,
			),			
			array(
	            'type'    => Controls_Manager::DIMENSIONS,
	            'mode'          => 'responsive',
	            'size_units' => [ 'px', '%', 'em' ],
	            'id'      => 'box_padding',
	            'label'   => __( 'Box Padding', 'digeco-core' ),                 
	            'selectors' => array(
	                '{{WRAPPER}} .info-box-default' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',                    
	                '{{WRAPPER}} .info-box-default .rtin-item' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',                    
	            ),
	            'separator' => 'after',
	        ),	        			
			array(
	            'type'    => Controls_Manager::DIMENSIONS,
	            'mode'          => 'responsive',
	            'size_units' => [ 'px', '%', 'em' ],
	            'id'      => 'title_margin',
	            'label'   => __( 'Title Margin', 'digeco-core' ),                 
	            'selectors' => array(
	                '{{WRAPPER}} .info-box-default .rtin-title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',                    
	            ),
	        ),
			array(
				'mode'    => 'group',
				'type'    => Group_Control_Typography::get_type(),
				'name'    => 'title_typo',
				'label'   => esc_html__( 'Title Style', 'digeco-core' ),
				'selector' => '{{WRAPPER}} .info-box-default .rtin-title, {{WRAPPER}} .info-box-style18 .item-title, {{WRAPPER}} .info-box-style19 .item-title, {{WRAPPER}} .info-box-style20 .item-title',
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'title_color',
				'label'   => esc_html__( 'Title Color', 'digeco-core' ),
				'default' => '',
				'selectors' => array(
					'{{WRAPPER}} .info-box-default .rtin-title' => 'color: {{VALUE}}',
					'{{WRAPPER}} .info-box-default .rtin-title a' => 'color: {{VALUE}}',
					'{{WRAPPER}} .info-box-style18 .item-title a' => 'color: {{VALUE}}',
					'{{WRAPPER}} .info-box-style19 .item-title a' => 'color: {{VALUE}}',
					'{{WRAPPER}} .info-box-style20 .item-title a' => 'color: {{VALUE}}',
				),
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'title_hover_color',
				'label'   => esc_html__( 'Title Hover Color', 'digeco-core' ),
				'default' => '',
				'selectors' => array(
					'{{WRAPPER}} .info-box-default .rtin-title a:hover' => 'color: {{VALUE}}',
					'{{WRAPPER}} .info-box-style18 .item-title a:hover' => 'color: {{VALUE}}',
					'{{WRAPPER}} .info-box-style19 .item-title a:hover' => 'color: {{VALUE}}',
					'{{WRAPPER}} .info-box-style20 .item-title a:hover' => 'color: {{VALUE}}',
				),
				'condition'   => array( 'style' => array( 'style1', 'style2', 'style9', 'style18', 'style19', 'style20' ) ),
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'content_color',
				'label'   => esc_html__( 'Content Color', 'digeco-core' ),
				'default' => '',
				'selectors' => array(
					'{{WRAPPER}} .info-box-style4 .rtin-item .rtin-text' => 'color: {{VALUE}}',
					'{{WRAPPER}} .info-box-style4 .rtin-item .button-1' => 'color: {{VALUE}}!important',
					'{{WRAPPER}} .info-box-style4 .rtin-item .rtin-content .button-1 i' => 'color: {{VALUE}}!important',
					'{{WRAPPER}} .info-box-style5 .rtin-item .rtin-content' => 'color: {{VALUE}}!important',
					'{{WRAPPER}} .info-box-style7 .rtin-item .rtin-content' => 'color: {{VALUE}}',
					'{{WRAPPER}} .info-box-style8 .rtin-item .rtin-content' => 'color: {{VALUE}}',
					'{{WRAPPER}} .info-box-style10 .rtin-item .rtin-text' => 'color: {{VALUE}}',
					'{{WRAPPER}} .info-box-style11 .rtin-item .rtin-text' => 'color: {{VALUE}}',
					'{{WRAPPER}} .info-box-style12 .rtin-item .rtin-text' => 'color: {{VALUE}}',
					'{{WRAPPER}} .info-box-style13 .rtin-item .rtin-text' => 'color: {{VALUE}}',
					'{{WRAPPER}} .info-box-style14 .rtin-item .rtin-text' => 'color: {{VALUE}}',
					'{{WRAPPER}} .info-box-style15 .rtin-item .rtin-text' => 'color: {{VALUE}}',
					'{{WRAPPER}} .info-box-style10 .rtin-item .button-1' => 'color: {{VALUE}}!important',
					'{{WRAPPER}} .info-box-style11 .rtin-item .button-1' => 'color: {{VALUE}}!important',
					'{{WRAPPER}} .info-box-style12 .rtin-item .button-1' => 'color: {{VALUE}}!important',
					'{{WRAPPER}} .info-box-style15 .rtin-item .button-1' => 'color: {{VALUE}}!important',
					'{{WRAPPER}} .info-box-style16 .rtin-item .rtin-content' => 'color: {{VALUE}}',
					'{{WRAPPER}} .info-box-style18 .rtin-content' => 'color: {{VALUE}}',
					'{{WRAPPER}} .info-box-style19 .rtin-content' => 'color: {{VALUE}}',
				),
				'condition'   => array( 'style' => array( 'style4', 'style5', 'style7', 'style8', 'style10', 'style11', 'style12', 'style13', 'style14', 'style15', 'style16', 'style17', 'style18', 'style19' ) ),
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'icon_color',
				'label'   => esc_html__( 'Icon Color', 'digeco-core' ),
				'default' => '',
				'selectors' => array(
					'{{WRAPPER}} .info-box-default .item-icon' => 'color: {{VALUE}}',
					'{{WRAPPER}} .info-box-default .rtin-item .rtin-icon i' => 'color: {{VALUE}}',
					'{{WRAPPER}} .info-box-style18 .icon-color' => 'color: {{VALUE}}',
				),
				'condition'   => array( 'style' => array( 'style1', 'style2', 'style3', 'style4', 'style6', 'style7', 'style8', 'style9', 'style11', 'style12', 'style13', 'style14', 'style15', 'style16', 'style17', 'style18' ) ),
				'separator' => 'before',
			),	
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'icon_bag_color',
				'label'   => esc_html__( 'Icon Background Color', 'digeco-core' ),
				'default' => '',
				'selectors' => array(
					'{{WRAPPER}} .info-box-default .rtin-item .rtin-icon:before' => 'background-color: {{VALUE}}',
					'{{WRAPPER}} .info-box-style3 .rtin-item .rtin-icon i' => 'background-color: {{VALUE}}',
					'{{WRAPPER}} .info-box-style15 .rtin-item .rtin-icon i' => 'background-color: {{VALUE}}',
					'{{WRAPPER}} .info-box-style6 .rtin-item.rtin-icon .rtin-icon i' => 'background-color: {{VALUE}}',
					'{{WRAPPER}} .info-box-default .rtin-item.rtin-icon .rtin-icon:before' => 'background-color: {{VALUE}}',
					'{{WRAPPER}} .info-box-style17 .rtin-item .rtin-icon' => 'background-color: {{VALUE}}',
					'{{WRAPPER}} .info-box-style18 .item-icon:after' => 'background-color: {{VALUE}}',
				),
				'condition'   => array( 'style' => array( 'style2', 'style3', 'style6', 'style12', 'style13', 'style14', 'style15', 'style17', 'style18' ) ),
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'icon_bag_hover_color',
				'label'   => esc_html__( 'Icon Background Hover Color', 'digeco-core' ),
				'default' => '',
				'selectors' => array(
					'{{WRAPPER}} .info-box-default .rtin-item:hover .rtin-icon i' => 'background-color: {{VALUE}}',
					'{{WRAPPER}} .info-box-style14 .rtin-item.rtin-icon:hover .rtin-icon:before' => 'background-color: {{VALUE}}',
					'{{WRAPPER}} .info-box-style15 .rtin-item.rtin-icon:hover .rtin-icon:before' => 'background-color: {{VALUE}}',
					'{{WRAPPER}} .info-box-style17 .rtin-item:hover .rtin-icon' => 'background-color: {{VALUE}}',
				),
				'condition'   => array( 'style' => array( 'style3', 'style14', 'style15', 'style17' ) ),
			),			
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'icon_bag_shade6_color',
				'label'   => esc_html__( 'Icon Background Hover Color', 'digeco-core' ),
				'default' => '',
				'selectors' => array(
					'{{WRAPPER}} .info-box-default.info-box-style6 .rtin-item .rtin-icon:before' => 'background-color: {{VALUE}}',
				),
				'condition'   => array( 'style' => array( 'style6' ) ),
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'box_bag_color',
				'label'   => esc_html__( 'Box Background Color', 'digeco-core' ),
				'default' => '',
				'selectors' => array(
					'{{WRAPPER}} .info-box-style4 .rtin-item' => 'background-color: {{VALUE}}',
					'{{WRAPPER}} .info-box-style10 .rtin-item' => 'background-color: {{VALUE}}',
					'{{WRAPPER}} .info-box-style11 .rtin-item' => 'background-color: {{VALUE}}',
					'{{WRAPPER}} .info-box-style12 .rtin-item' => 'background-color: {{VALUE}}',
					'{{WRAPPER}} .info-box-style14 .rtin-item' => 'background-color: {{VALUE}}',
					'{{WRAPPER}} .info-box-style15 .rtin-item' => 'background-color: {{VALUE}}',
					'{{WRAPPER}} .info-box-style20' => 'background-color: {{VALUE}}',
				),
				'condition'   => array( 'style' => array( 'style4', 'style10', 'style11', 'style12', 'style14', 'style15', 'style20' ) ),
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'box_bag_hover_color',
				'label'   => esc_html__( 'Box Background Hover Color', 'digeco-core' ),
				'default' => '',
				'selectors' => array(
					'{{WRAPPER}} .info-box-default .rtin-item:before' => 'background-color: {{VALUE}}',
					'{{WRAPPER}} .info-box-style4 .rtin-item:hover' => 'background-color: {{VALUE}}',
					'{{WRAPPER}} .info-box-style11 .rtin-item:hover' => 'background-color: {{VALUE}}',
					'{{WRAPPER}} .info-box-style20:before' => 'background: {{VALUE}}',
				),
				'condition'   => array( 'style' => array( 'style3', 'style4', 'style11', 'style15', 'style20' ) ),
			),			
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'icon_hover_color',
				'label'   => esc_html__( 'Icon Hover Color', 'digeco-core' ),
				'default' => '',
				'selectors' => array(
					'{{WRAPPER}} .info-box-default:hover .item-icon' => 'color: {{VALUE}}',
					'{{WRAPPER}} .info-box-style14 .rtin-item:hover .rtin-icon i' => 'color: {{VALUE}}',
					'{{WRAPPER}} .info-box-style17 .rtin-item:hover .rtin-icon i' => 'color: {{VALUE}}',
				),
				'condition'   => array( 'style' => array( 'style1', 'style9', 'style14', 'style17' ) ),
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'svg_color',
				'label'   => esc_html__( 'Svg Bg Color', 'digeco-core' ),
				'default' => '',
				'selectors' => array(
					'{{WRAPPER}} .info-box-default .icon-holder .icon-bg-shape path' => 'fill: {{VALUE}}',
					'{{WRAPPER}} .info-box-style17 .rtin-item .icon-holder svg' => 'fill: {{VALUE}}',
				),
				'condition'   => array( 'style' => array( 'style1', 'style9', 'style17' ) ),
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'svg_hover_color',
				'label'   => esc_html__( 'Svg Bg Hover Color', 'digeco-core' ),
				'default' => '',
				'selectors' => array(
					'{{WRAPPER}} .info-box-default:hover .icon-holder .icon-bg-shape path' => 'fill: {{VALUE}}',
					'{{WRAPPER}} .info-box-style17 .rtin-item:hover .icon-holder svg' => 'fill: {{VALUE}}',
				),
				'condition'   => array( 'style' => array( 'style1', 'style9', 'style17' ) ),
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'dot_color',
				'label'   => esc_html__( 'Line Color', 'digeco-core' ),
				'default' => '',
				'selectors' => array(
					'{{WRAPPER}} .info-box-style5 .rtin-item:before' => 'background-color: {{VALUE}}',
				),
				'condition'   => array( 'style' => array( 'style5' ) ),
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'line_color',
				'label'   => esc_html__( 'Line Color', 'digeco-core' ),
				'default' => '',
				'selectors' => array(
					'{{WRAPPER}} .info-box-style5 .rtin-item:after' => 'background-color: {{VALUE}}',
				),
				'condition'   => array( 'style' => array( 'style5' ) ),
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'readmore_color',
				'label'   => esc_html__( 'Read More Color', 'digeco-core' ),
				'default' => '',
				'selectors' => array(
					'{{WRAPPER}} .info-box-style20 .item-btn' => 'color: {{VALUE}}',
					'{{WRAPPER}} .info-box-style20 .item-btn i' => 'color: {{VALUE}}',
				),
				'condition'   => array( 'style' => array( 'style20' ) ),
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'readmore_h_color',
				'label'   => esc_html__( 'Read More Hover Color', 'digeco-core' ),
				'default' => '',
				'selectors' => array(
					'{{WRAPPER}} .info-box-style20:hover .item-btn' => 'color: {{VALUE}}',
					'{{WRAPPER}} .info-box-style20:hover .item-btn i' => 'color: {{VALUE}}',
				),
				'condition'   => array( 'style' => array( 'style20' ) ),
			),			
			array(
				'mode' => 'section_end',
			),
		);
		return $fields;
	}

	protected function render() {
		$data = $this->get_settings();

		switch ( $data['style'] ) {
			case 'style20':
			$template = 'info-box-20';
			break;
			case 'style19':
			$template = 'info-box-19';
			break;
			case 'style18':
			$template = 'info-box-18';
			break;
			case 'style17':
			$template = 'info-box-17';
			break;
			case 'style16':
			$template = 'info-box-16';
			break;
			case 'style15':
			$template = 'info-box-15';
			break;
			case 'style14':
			$template = 'info-box-14';
			break;
			case 'style13':
			$template = 'info-box-13';
			break;
			case 'style12':
			$template = 'info-box-12';
			break;
			case 'style11':
			$template = 'info-box-11';
			break;
			case 'style10':
			$template = 'info-box-10';
			break;
			case 'style9':
			$template = 'info-box-9';
			break;
			case 'style8':
			$template = 'info-box-8';
			break;
			case 'style7':
			$template = 'info-box-7';
			break;
			case 'style6':
			$template = 'info-box-6';
			break;
			case 'style5':
			$template = 'info-box-5';
			break;
			case 'style4':
			$template = 'info-box-4';
			break;
			case 'style3':
			$template = 'info-box-3';
			break;
			case 'style2':
			$template = 'info-box-2';
			break;
			default:
			$template = 'info-box-1';
			break;
		}

		return $this->rt_template( $template, $data );
	}
}