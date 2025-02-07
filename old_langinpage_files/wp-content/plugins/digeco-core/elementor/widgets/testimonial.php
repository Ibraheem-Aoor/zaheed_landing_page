<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

namespace radiustheme\Digeco_Core;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Image_Size;
use Elementor\Utils;

if ( ! defined( 'ABSPATH' ) ) exit;

class Testimonial extends Custom_Widget_Base {

	public function __construct( $data = [], $args = null ){
		$this->rt_name = esc_html__( 'RT Testimonial', 'digeco-core' );
		$this->rt_base = 'rt-testimonial';
		$this->rt_translate = array(
			'cols'  => array(
				'12' => esc_html__( '1 Col', 'digeco-core' ),
				'6'  => esc_html__( '2 Col', 'digeco-core' ),
				'4'  => esc_html__( '3 Col', 'digeco-core' ),
				'3'  => esc_html__( '4 Col', 'digeco-core' ),
				'2'  => esc_html__( '6 Col', 'digeco-core' ),
			),
		);
		parent::__construct( $data, $args );
	}

	private function rt_load_scripts(){
		wp_enqueue_style(  'owl-carousel' );
		wp_enqueue_style(  'owl-theme-default' );
		wp_enqueue_script( 'owl-carousel' );
	}

	public function rt_fields(){
		$cpt = DIGECO_CORE_CPT_PREFIX;
		$terms  = get_terms( array( 'taxonomy' => "{$cpt}_testimonial_category", 'fields' => 'id=>name' ) );
		$category_dropdown = array( '0' => esc_html__( 'All Categories', 'digeco-core' ) );

		foreach ( $terms as $id => $name ) {
			$category_dropdown[$id] = $name;
		}

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
					'style6' => esc_html__( 'Style 6 ( Grid Layout )', 'digeco-core' ),
					'style7' => esc_html__( 'Style 7', 'digeco-core' ),
					'style8' => esc_html__( 'Style 8', 'digeco-core' ),
					'style9' => esc_html__( 'Style 9', 'digeco-core' ),
				),
				'default' => 'style1',
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
				'id'      => 'cat',
				'label'   => esc_html__( 'Categories', 'digeco-core' ),
				'options' => $category_dropdown,
				'default' => '0',
			),
			array(
				'type'    => Controls_Manager::SELECT2,
				'id'      => 'orderby',
				'label'   => esc_html__( 'Order By', 'digeco-core' ),
				'options' => array(
					'date'        => esc_html__( 'Date (Recents comes first)', 'digeco-core' ),
					'title'       => esc_html__( 'Title', 'digeco-core' ),
					'menu_order'  => esc_html__( 'Custom Order (Available via Order field inside Page Attributes box)', 'digeco-core' ),
				),
				'default' => 'date',
			),	
			array(
				'type'    => Controls_Manager::SELECT2,
				'id'      => 'icon_bottom_position',
				'label'   => esc_html__( 'Icon Position', 'digeco-core' ),
				'options' => array(
					'icon-right'     => esc_html__( 'Icon Right', 'digeco-core' ),
					'icon-bottom'      => esc_html__( 'Icon Right Bottom', 'digeco-core' ),
				),
				'default' => 'icon-right',
				'condition'   => array( 'style' => array( 'style3' ) ),
			),	
			array(
				'type'    => Controls_Manager::SELECT2,
				'id'      => 'icon_top_position',
				'label'   => esc_html__( 'Icon Position', 'digeco-core' ),
				'options' => array(
					'icon-right'     => esc_html__( 'Icon Right', 'digeco-core' ),
					'icon-top'      => esc_html__( 'Icon Left Top', 'digeco-core' ),
				),
				'default' => 'icon-right',
				'condition'   => array( 'style' => array( 'style4' ) ),
			),
			array(
				'type'    => Controls_Manager::MEDIA,
				'id'      => 'icon_image',
				'label'   => esc_html__( 'Image', 'digeco-core' ),
				'default' => [
                    'url' => Utils::get_placeholder_image_src(),
                ],
				'description' => esc_html__( 'Recommended full image', 'digeco-core' ),
				'condition'   => array( 'style' => array( 'style7' ) ),
			),
			array(
				'type'    => Group_Control_Image_Size::get_type(),
				'mode'    => 'group',				
				'label'   => esc_html__( 'image size', 'digeco-core' ),	
				'name' => 'icon_image_size', 
				'separator' => 'none',
				'condition'   => array( 'style' => array( 'style7' ) ),
			),
			array(
				'type'    => Controls_Manager::NUMBER,
				'id'      => 'count',
				'label'   => esc_html__( 'Word count', 'digeco-core' ),
				'default' => 20,
				'description' => esc_html__( 'Maximum number of words', 'digeco-core' ),
			),
			array(
				'type'    => Controls_Manager::NUMBER,
				'id'      => 'number',
				'label'   => esc_html__( 'Total number of items', 'digeco-core' ),
				'default' => 5,
				'description' => esc_html__( 'Write -1 to show all', 'digeco-core' ),
			),
			array(
				'type'        => Controls_Manager::SWITCHER,
				'id'          => 'designation_display',
				'label'       => esc_html__( 'Designation Display', 'digeco-core' ),
				'label_on'    => esc_html__( 'On', 'digeco-core' ),
				'label_off'   => esc_html__( 'Off', 'digeco-core' ),
				'default'     => 'yes',
				'description' => esc_html__( 'Show or Hide Designation. Default: On', 'digeco-core' ),
			),
			array(
				'type'        => Controls_Manager::SWITCHER,
				'id'          => 'ratting_display',
				'label'       => esc_html__( 'Ratting Display', 'digeco-core' ),
				'label_on'    => esc_html__( 'On', 'digeco-core' ),
				'label_off'   => esc_html__( 'Off', 'digeco-core' ),
				'default'     => 'no',
				'description' => esc_html__( 'Show or Hide Ratting. Default: On', 'digeco-core' ),
			),
			array(
				'type'        => Controls_Manager::SWITCHER,
				'id'          => 'thumbs_display',
				'label'       => esc_html__( 'Thumbs Display', 'digeco-core' ),
				'label_on'    => esc_html__( 'On', 'digeco-core' ),
				'label_off'   => esc_html__( 'Off', 'digeco-core' ),
				'default'     => 'yes',
				'description' => esc_html__( 'Show or Hide Thumbs. Default: On', 'digeco-core' ),
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
				'type'    => Controls_Manager::COLOR,
				'id'      => 'item_bg_color',
				'label'   => esc_html__( 'Item Background Color', 'digeco-core' ),
				'default' => '',
				'selectors' => array( 
					'{{WRAPPER}} .rtin-testimonial-1 .rtin-item .top-box' => 'background-image: linear-gradient(60deg, {{VALUE}} 0%, {{VALUE}} 100%)',
					'{{WRAPPER}} .rtin-testimonial-2 .rtin-item' => 'background-image: linear-gradient(60deg, {{VALUE}} 0%, {{VALUE}} 100%)',
					'{{WRAPPER}} .rtin-testimonial-3 .rtin-item' => 'background-color: {{VALUE}}',
					'{{WRAPPER}} .rtin-testimonial-4 .rtin-item' => 'background-color: {{VALUE}}',
					'{{WRAPPER}} .rtin-testimonial-5 .rtin-item' => 'background-color: {{VALUE}}',
				),
				'condition'   => array( 'style' => array( 'style1', 'style2', 'style3', 'style4', 'style6' ) ),
				'mode'    => 'responsive',
			),
			array (
				'type'    => Controls_Manager::COLOR,
				'id'      => 'item_svgbg1_color',
				'label'   => esc_html__( 'Item SVG1 Background Color', 'digeco-core' ),
				'default' => '',
				'selectors' => array( 
					'{{WRAPPER}} .rtin-testimonial-5 .shape-wrap li:first-child stop' => 'stop-color: {{VALUE}}',
					'{{WRAPPER}} .rtin-testimonial-8 .shape-wrap li svg path' => 'fill: {{VALUE}}',
				),
				'condition'   => array( 'style' => array( 'style5','style8' ) ),
				'mode'    => 'responsive',
			),
			array (
				'type'    => Controls_Manager::COLOR,
				'id'      => 'item_svgbg2_color',
				'label'   => esc_html__( 'Item SVG2 Background Color', 'digeco-core' ),
				'default' => '',
				'selectors' => array( 
					'{{WRAPPER}} .rtin-testimonial-5 .shape-wrap li:last-child path' => 'fill: {{VALUE}}',
				),
				'condition'   => array( 'style' => array( 'style5' ) ),
				'mode'    => 'responsive',
			),
			array (
				'type'    => Controls_Manager::COLOR,
				'id'      => 'item_title_color',
				'label'   => esc_html__( 'Item Title Color', 'digeco-core' ),
				'default' => '',
				'selectors' => array( 
					'{{WRAPPER}} .default-testimonial .rtin-item .rtin-title' => 'color: {{VALUE}}',
				),
				'mode'    => 'responsive',
			),
			array (
				'type'    => Controls_Manager::COLOR,
				'id'      => 'item_designa_color',
				'label'   => esc_html__( 'Item designation Color', 'digeco-core' ),
				'default' => '',
				'selectors' => array(
					'{{WRAPPER}} .default-testimonial .rtin-item .rtin-designation' => 'color: {{VALUE}}',
				),
				'mode'    => 'responsive',
			),
			array (
				'type'    => Controls_Manager::COLOR,
				'id'      => 'item_content_color',
				'label'   => esc_html__( 'Item Content Color', 'digeco-core' ),
				'default' => '',
				'selectors' => array(
					'{{WRAPPER}} .default-testimonial .rtin-item .rtin-content p' => 'color: {{VALUE}}',
					'{{WRAPPER}} .default-testimonial .rtin-item .top-box p' => 'color: {{VALUE}}',
					'{{WRAPPER}} .default-testimonial .rtin-item p' => 'color: {{VALUE}}',
				),
				'mode'    => 'responsive',
			),
			array (
				'type'    => Controls_Manager::COLOR,
				'id'      => 'item_icon_color',
				'label'   => esc_html__( 'Item Icon Color', 'digeco-core' ),
				'default' => '',
				'selectors' => array(
					'{{WRAPPER}} .default-testimonial .rtin-item .rtin-icon' => 'color: {{VALUE}}',
				),
				'mode'    => 'responsive',
			),		
			array(
				'mode' => 'section_end',
			),
			
			// Responsive Columns
			array(
				'mode'    => 'section_start',
				'id'      => 'sec_responsive',
				'label'   => esc_html__( 'Number of Responsive Columns', 'digeco-core' ),
			),
			array(
				'type'    => Controls_Manager::SELECT2,
				'id'      => 'col_lg',
				'label'   => esc_html__( 'Desktops: > 1199px', 'digeco-core' ),
				'options' => $this->rt_translate['cols'],
				'default' => '4',
			),
			array(
				'type'    => Controls_Manager::SELECT2,
				'id'      => 'col_md',
				'label'   => esc_html__( 'Desktops: > 991px', 'digeco-core' ),
				'options' => $this->rt_translate['cols'],
				'default' => '4',
			),
			array(
				'type'    => Controls_Manager::SELECT2,
				'id'      => 'col_sm',
				'label'   => esc_html__( 'Tablets: > 767px', 'digeco-core' ),
				'options' => $this->rt_translate['cols'],
				'default' => '6',
			),
			array(
				'type'    => Controls_Manager::SELECT2,
				'id'      => 'col_xs',
				'label'   => esc_html__( 'Phones: < 768px', 'digeco-core' ),
				'options' => $this->rt_translate['cols'],
				'default' => '12',
			),
			array(
				'type'    => Controls_Manager::SELECT2,
				'id'      => 'col_mobile',
				'label'   => esc_html__( 'Small Phones: < 480px', 'digeco-core' ),
				'options' => $this->rt_translate['cols'],
				'default' => '12',
			),
			array(
				'mode' => 'section_end',
			),

			// Slider options
			array(
				'mode'        => 'section_start',
				'id'          => 'sec_slider',
				'label'       => esc_html__( 'Slider Options', 'digeco-core' ),
				'condition'   => array( 'style' => array( 'style1', 'style2', 'style3', 'style4', 'style5', 'style7', 'style8', 'style9' ) ),
			),
			array(
				'type'    => Controls_Manager::SELECT2,
				'id'      => 'nav_style',
				'label'   => esc_html__( 'Nav Style', 'digeco-core' ),
				'options' => array(
					'rt-owl-nav-1'     => esc_html__( 'Nav Style 1', 'digeco-core' ),
					'rt-owl-nav-2'      => esc_html__( 'Nav Style 2', 'digeco-core' ),
					'rt-owl-nav-3'      => esc_html__( 'Nav Style 3', 'digeco-core' ),
					'rt-owl-nav-4'      => esc_html__( 'Nav Style 4', 'digeco-core' ),
				),
				'default' => 'rt-owl-nav-1',
			),			
			array(
				'type'    => Controls_Manager::SELECT2,
				'id'      => 'nav_position',
				'label'   => esc_html__( 'Nav Style', 'digeco-core' ),
				'options' => array(
					'inner-nav'     => esc_html__( 'Inner Nav', 'digeco-core' ),
					'outer-nav'      => esc_html__( 'Outer Nav', 'digeco-core' ),
				),
				'default' => 'inner-nav',
			),
			array(
				'type'        => Controls_Manager::SWITCHER,
				'id'          => 'slider_nav',
				'label'       => esc_html__( 'Navigation Arrow', 'digeco-core' ),
				'label_on'    => esc_html__( 'On', 'digeco-core' ),
				'label_off'   => esc_html__( 'Off', 'digeco-core' ),
				'default'     => '',
				'description' => esc_html__( 'Enable or disable navigation arrow. Default: On', 'digeco-core' ),
			),
			array(
				'type'        => Controls_Manager::SWITCHER,
				'id'          => 'slider_dots',
				'label'       => esc_html__( 'Navigation Dots', 'digeco-core' ),
				'label_on'    => esc_html__( 'On', 'digeco-core' ),
				'label_off'   => esc_html__( 'Off', 'digeco-core' ),
				'default'     => 'yes',
				'description' => esc_html__( 'Enable or disable navigation dots. Default: Off', 'digeco-core' ),
			),
			array(
				'type'        => Controls_Manager::SWITCHER,
				'id'          => 'slider_autoplay',
				'label'       => esc_html__( 'Autoplay', 'digeco-core' ),
				'label_on'    => esc_html__( 'On', 'digeco-core' ),
				'label_off'   => esc_html__( 'Off', 'digeco-core' ),
				'default'     => '',
				'description' => esc_html__( 'Enable or disable autoplay. Default: On', 'digeco-core' ),
			),
			array(
				'type'        => Controls_Manager::SWITCHER,
				'id'          => 'slider_stop_on_hover',
				'label'       => esc_html__( 'Stop on Hover', 'digeco-core' ),
				'label_on'    => esc_html__( 'On', 'digeco-core' ),
				'label_off'   => esc_html__( 'Off', 'digeco-core' ),
				'default'     => 'yes',
				'description' => esc_html__( 'Stop autoplay on mouse hover. Default: On', 'digeco-core' ),
				'condition'   => array( 'slider_autoplay' => 'yes' ),
			),
			array(
				'type'    => Controls_Manager::SELECT2,
				'id'      => 'slider_interval',
				'label'   => esc_html__( 'Autoplay Interval', 'digeco-core' ),
				'options' => array(
					'5000' => esc_html__( '5 Seconds', 'digeco-core' ),
					'4000' => esc_html__( '4 Seconds', 'digeco-core' ),
					'3000' => esc_html__( '3 Seconds', 'digeco-core' ),
					'2000' => esc_html__( '2 Seconds', 'digeco-core' ),
					'1000' => esc_html__( '1 Second',  'digeco-core' ),
				),
				'default' => '5000',
				'description' => esc_html__( 'Set any value for example 5 seconds to play it in every 5 seconds. Default: 5 Seconds', 'digeco-core' ),
				'condition'   => array( 'slider_autoplay' => 'yes' ),
			),
			array(
				'type'    => Controls_Manager::NUMBER,
				'id'      => 'slider_autoplay_speed',
				'label'   => esc_html__( 'Autoplay Slide Speed', 'digeco-core' ),
				'default' => 200,
				'description' => esc_html__( 'Slide speed in milliseconds. Default: 200', 'digeco-core' ),
				'condition'   => array( 'slider_autoplay' => 'yes' ),
			),
			array(
				'type'        => Controls_Manager::SWITCHER,
				'id'          => 'slider_loop',
				'label'       => esc_html__( 'Loop', 'digeco-core' ),
				'label_on'    => esc_html__( 'On', 'digeco-core' ),
				'label_off'   => esc_html__( 'Off', 'digeco-core' ),
				'default'     => 'yes',
				'description' => esc_html__( 'Loop to first item. Default: On', 'digeco-core' ),
			),
			array(
				'mode' => 'section_end',
			),
		);
		return $fields;
	}

	protected function render() {
		$data = $this->get_settings();

		$owl_data = array( 
			'nav'                => $data['slider_nav'] == 'yes' ? true : false,
			'dots'               => $data['slider_dots'] == 'yes' ? true : false,
			'navText'            => array( "<i class='flaticon-back'></i>", "<i class='flaticon-next'></i>" ),
			'autoplay'           => $data['slider_autoplay'] == 'yes' ? true : false,
			'autoplayTimeout'    => $data['slider_interval'],
			'autoplaySpeed'      => $data['slider_autoplay_speed'],
			'autoplayHoverPause' => $data['slider_stop_on_hover'] == 'yes' ? true : false,
			'loop'               => $data['slider_loop'] == 'yes' ? true : false,
			'margin'             => 30,
			'responsive'         => array(
				'0'    => array( 'items' => 12 / $data['col_mobile'] ),
				'480'  => array( 'items' => 12 / $data['col_xs'] ),
				'768'  => array( 'items' => 12 / $data['col_sm'] ),
				'992'  => array( 'items' => 12 / $data['col_md'] ),
				'1200' => array( 'items' => 12 / $data['col_lg'] ),
			)
		);

		switch ( $data['style'] ) {
			case 'style9':
			$template = 'testimonial-9';
			break;
			case 'style8':
			$template = 'testimonial-8';
			break;
			case 'style7':
			$template = 'testimonial-7';
			break;
			case 'style6':
			$template = 'testimonial-6';
			break;
			case 'style5':
			$template = 'testimonial-5';
			break;
			case 'style4':
			$template = 'testimonial-4';
			break;
			case 'style3':
			$template = 'testimonial-3';
			break;
			case 'style2':
			$template = 'testimonial-2';
			break;
			default:
			$template = 'testimonial-1';
			break;
		}

		$data['owl_data'] = json_encode( $owl_data );
		$this->rt_load_scripts();

		return $this->rt_template( $template, $data );
	}
}