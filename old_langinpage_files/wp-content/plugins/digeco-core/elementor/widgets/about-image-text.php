<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

namespace radiustheme\Digeco_Core;

use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;
use Elementor\Scheme_Base;
use Elementor\Group_Control_Image_Size;
use Elementor\Utils;

if ( ! defined( 'ABSPATH' ) ) exit;

class About_Image_Text extends Custom_Widget_Base {

	public function __construct( $data = [], $args = null ){
		$this->rt_name = esc_html__( 'RT About Image Text', 'digeco-core' );
		$this->rt_base = 'rt-About-image-text';
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
				'label'   => esc_html__( 'About Style', 'digeco-core' ),
				'options' => array(
					'style1' => esc_html__( 'About Style 1' , 'digeco-core' ),
					'style2' => esc_html__( 'About Style 2' , 'digeco-core' ),
					'style3' => esc_html__( 'About Style 3' , 'digeco-core' ),
					'style4' => esc_html__( 'About Style 4' , 'digeco-core' ),
					'style5' => esc_html__( 'About Style 5' , 'digeco-core' ),
				),
				'default' => 'style1',
			),
			array(
				'type'    => Controls_Manager::SELECT2,
				'id'      => 'theme',
				'label'   => esc_html__( 'Theme', 'digeco-core' ),
				'options' => array(
					'leftimg' => esc_html__( 'Left Image', 'digeco-core' ),
					'rightimg' => esc_html__( 'Right Image', 'digeco-core' ),
				),
				'default' => 'leftimg',
				'condition'   => array( 'style' => array( 'style1' ) ),
			),
			array(
				'type'    => Controls_Manager::SELECT2,
				'id'      => 'animation_display',
				'label'   => esc_html__( 'Animation Off/On', 'digeco-core' ),
				'options' => array(
					'has-animation'   => esc_html__( 'On', 'digeco-core' ),
					'no-animation'    => esc_html__( 'Off', 'digeco-core' ),
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
				'type'    => Controls_Manager::TEXT,
				'id'      => 'title',
				'label'   => esc_html__( 'Title', 'digeco-core' ),
				'default' => 'About Us',
			),
			array(
				'type'    => Controls_Manager::TEXT,
				'id'      => 'sub_title',
				'label'   => esc_html__( 'Sub Title', 'digeco-core' ),
				'default' => esc_html__('About Digeco', 'digeco-core' ),
			),
			array(
				'type'    => Controls_Manager::MEDIA,
				'id'      => 'icon_image',
				'label'   => esc_html__( 'Image', 'digeco-core' ),
				'default' => [
                    'url' => Utils::get_placeholder_image_src(),
                ],
				'description' => esc_html__( 'Recommended full image', 'digeco-core' ),
			),
			array(
				'type'    => Group_Control_Image_Size::get_type(),
				'mode'    => 'group',				
				'label'   => esc_html__( 'image size', 'roofit-core' ),	
				'name' => 'icon_image_size', 
				'separator' => 'none',		
			),
			array(
				'type'    => Controls_Manager::WYSIWYG,
				'id'      => 'content',
				'label'   => esc_html__( 'Content', 'digeco-core' ),
				'default' => esc_html__('Lorem Ipsum has been the industrys standard dummy text ever since printer took a galley. Rimply dummy text of the printing and typesetting industry', 'digeco-core' ),
			),
			array(
				'type'        => Controls_Manager::SWITCHER,
				'id'          => 'button_display',
				'label'       => esc_html__( 'Button Display', 'digeco-core' ),
				'label_on'    => esc_html__( 'On', 'digeco-core' ),
				'label_off'   => esc_html__( 'Off', 'digeco-core' ),
				'default'     => false,
				'description' => esc_html__( 'Show or Hide Content. Default: off', 'digeco-core' ),
			),
			array(
				'type'    => Controls_Manager::SELECT2,
				'id'      => 'button_style',
				'label'   => esc_html__( 'Button Style', 'digeco-core' ),
				'options' => array(
					'digeco-button-1'        => esc_html__( 'Button 1', 'digeco-core' ),
					'digeco-button-2'        => esc_html__( 'Button 2', 'digeco-core' ),
				),
				'default' => 'digeco-button-1',
				'condition'   => array( 'button_display' => array( 'yes' ) ),
			),
			array(
				'type'        => Controls_Manager::TEXT,
				'id'          => 'button_one',
				'label'       => esc_html__( 'Button Text', 'digeco-core' ),
				'default' 	  => esc_html__('Read More', 'digeco-core' ),
				'condition'   => array( 'button_display' => array( 'yes' ) ),
			),
			array(
				'type'        => Controls_Manager::URL,
				'id'          => 'one_buttonurl',
				'label'       => esc_html__( 'Button URL', 'digeco-core' ),
				'placeholder' => 'https://your-link.com',
				'condition'   => array( 'button_display' => array( 'yes' ) ),
			),
			
			array(
				'mode' => 'section_end',
			),
			// Style
			array(
				'mode'    => 'section_start',
				'id'      => 'sec_style',
				'label'   => esc_html__( 'Style', 'digeco-core' ),
				'tab'     => Controls_Manager::TAB_STYLE,
			),
			array (
				'mode'    => 'group',
				'type'    => Group_Control_Typography::get_type(),
				'name'    => 'title_typo',
				'label'   => esc_html__( 'Title Style', 'digeco-core' ),
				'selector' => '{{WRAPPER}} .about-image-text .about-content .rtin-title',
			),
			array (
				'mode'    => 'group',
				'type'    => Group_Control_Typography::get_type(),
				'name'    => 'sub_title_typo',
				'label'   => esc_html__( 'Sub Title Style', 'digeco-core' ),
				'selector' => '{{WRAPPER}} .about-image-text .about-content .sub-rtin-title',
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'title_color',
				'label'   => esc_html__( 'Title Color', 'digeco-core' ),
				'default' => '',
				'selectors' => array(
					'{{WRAPPER}} .about-image-text .about-content .rtin-title' => 'color: {{VALUE}}',
					'{{WRAPPER}} .about-image-text .about-content .rtin-content h4' => 'color: {{VALUE}}',
					'{{WRAPPER}} .about-image-text ul.list-layout2 li .inner-item-title' => 'color: {{VALUE}}',
				),
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'sub_title_color',
				'label'   => esc_html__( 'Sub Title Color', 'digeco-core' ),
				'default' => '',
				'selectors' => array(
					'{{WRAPPER}} .about-image-text .about-content .sub-rtin-title' => 'color: {{VALUE}}',
				),
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'content_color',
				'label'   => esc_html__( 'Content Color', 'digeco-core' ),
				'default' => '',
				'selectors' => array(
					'{{WRAPPER}} .about-image-text .about-content .rtin-content' => 'color: {{VALUE}}',
					'{{WRAPPER}} .about-image-text ul.list-layout1 li:before' => 'color: {{VALUE}}',
					'{{WRAPPER}} .about-image-text ul.list-layout2 li:before' => 'color: {{VALUE}}',
				),
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
			case 'style5':
			$template = 'about-image-text-5';
			break;
			case 'style4':
			$template = 'about-image-text-4';
			break;
			case 'style3':
			$template = 'about-image-text-3';
			break;
			case 'style2':
			$template = 'about-image-text-2';
			break;
			default:
			$template = 'about-image-text-1';
			break;
		}
	
		return $this->rt_template( $template, $data );
	}
}