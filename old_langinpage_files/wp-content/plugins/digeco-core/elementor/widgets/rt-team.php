<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

namespace radiustheme\Digeco_Core;
use Elementor\Controls_Manager;

if ( ! defined( 'ABSPATH' ) ) exit;

class RT_Team extends Custom_Widget_Base {

	public function __construct( $data = [], $args = null ){
		$this->rt_name = esc_html__( 'RT Team', 'digeco-core' );
		$this->rt_base = 'rt-team';
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
		$terms = get_terms( array( 'taxonomy' => 'digeco_team_category', 'fields' => 'id=>name' ) );
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
					'style1' => esc_html__( 'Team Grid 1', 'digeco-core' ),
					'style2' => esc_html__( 'Team Grid 2', 'digeco-core' ),
					'style5' => esc_html__( 'Team Grid 3', 'digeco-core' ),
					'style3' => esc_html__( 'Team Slider 1', 'digeco-core' ),
					'style4' => esc_html__( 'Team Slider 2', 'digeco-core' ),
					'style6' => esc_html__( 'Team Slider 3', 'digeco-core' ),
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
				'type'    => Controls_Manager::NUMBER,
				'id'      => 'number',
				'label'   => esc_html__( 'Total number of items', 'digeco-core' ),
				'default' => 6,
				'description' => esc_html__( 'Write -1 to show all', 'digeco-core' ),
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
				'type'        => Controls_Manager::SWITCHER,
				'id'          => 'content_bg',
				'label'       => esc_html__( 'Content Background', 'digeco-core' ),
				'label_on'    => esc_html__( 'On', 'digeco-core' ),
				'label_off'   => esc_html__( 'Off', 'digeco-core' ),
				'default'     => 'no',
				'description' => esc_html__( 'Show or Hide Content. Default: off', 'digeco-core' ),
				'condition'   => array( 'style' => array( 'style1', 'style3' ) ),
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'content_bg_color',
				'label'   => esc_html__( 'Background Color', 'digeco-core' ),
				'default' => '',
				'selectors' => array(
					'{{WRAPPER}} .team-multi-layout-1 .content-bg .mask-wrap' => 'background-color: {{VALUE}}',
				),
				'condition'   => array( 'content_bg' => array( 'yes' ), 'style' => array( 'style1', 'style3' ) ),
			),
			array(
				'type'        => Controls_Manager::SWITCHER,
				'id'          => 'content_display',
				'label'       => esc_html__( 'Content Display', 'digeco-core' ),
				'label_on'    => esc_html__( 'On', 'digeco-core' ),
				'label_off'   => esc_html__( 'Off', 'digeco-core' ),
				'default'     => false,
				'description' => esc_html__( 'Show or Hide Content. Default: off', 'digeco-core' ),
			),
			array(
				'type'    => Controls_Manager::SELECT2,
				'id'      => 'contype',
				'label'   => esc_html__( 'Content Type', 'digeco-core' ),
				'options' => array(
					'content' => esc_html__( 'Conents', 'digeco-core' ),
					'excerpt' => esc_html__( 'Excerpts', 'digeco-core' ),
				),
				'default'     => 'content',
				'description' => esc_html__( 'Display contents from Editor or Excerpt field', 'digeco-core' ),
				'condition'   => array( 'content_display' => array( 'yes' ) ),
			),
			array(
				'type'    => Controls_Manager::NUMBER,
				'id'      => 'count',
				'label'   => esc_html__( 'Word count', 'digeco-core' ),
				'default' => 13,
				'description' => esc_html__( 'Maximum number of words', 'digeco-core' ),
				'condition'   => array( 'content_display' => array( 'yes' ) ),
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
				'id'          => 'social_display',
				'label'       => esc_html__( 'Social Media Display', 'digeco-core' ),
				'label_on'    => esc_html__( 'On', 'digeco-core' ),
				'label_off'   => esc_html__( 'Off', 'digeco-core' ),
				'default'     => 'yes',
				'description' => esc_html__( 'Show or Hide Social Medias. Default: On', 'digeco-core' ),
			),
			array(
				'type'    => Controls_Manager::SELECT2,
				'id'      => 'more_button',
				'label'   => esc_html__( 'More Button', 'digeco-core' ),
				'options' => array(
					'show'        => esc_html__( 'Show Read More', 'digeco-core' ),
					'hide'        => esc_html__( 'Show Pagination', 'digeco-core' ),
				),
				'default' => 'show',
				'condition'   => array( 'style' => array( 'style1', 'style2', 'style5' ) ),
			),
			array (
				'type'    => Controls_Manager::TEXT,
				'id'      => 'see_button_text',
				'label'   => esc_html__( 'Button Text', 'digeco-core' ),
				'condition'   => array( 'more_button' => array( 'show' ) ),
				'default' => esc_html__( 'Show More', 'digeco-core' ),
				'condition'   => array( 'style' => array( 'style1', 'style2', 'style5' ) ),
			),
			array (
				'type'    => Controls_Manager::TEXT,
				'id'      => 'see_button_link',
				'label'   => esc_html__( 'Button Link', 'digeco-core' ),
				'condition'   => array( 'more_button' => array( 'show' ) ),
				'condition'   => array( 'style' => array( 'style1', 'style2', 'style5' ) ),
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
				'condition'   => array( 'style' => array( 'style3', 'style4', 'style6' ) ),
			),
			array(
				'type'        => Controls_Manager::SWITCHER,
				'id'          => 'slider_nav',
				'label'       => esc_html__( 'Navigation Arrow', 'digeco-core' ),
				'label_on'    => esc_html__( 'On', 'digeco-core' ),
				'label_off'   => esc_html__( 'Off', 'digeco-core' ),
				'default'     => 'yes',
				'description' => esc_html__( 'Enable or disable navigation arrow. Default: On', 'digeco-core' ),
			),
			array(
				'type'        => Controls_Manager::SWITCHER,
				'id'          => 'slider_dots',
				'label'       => esc_html__( 'Navigation Dots', 'digeco-core' ),
				'label_on'    => esc_html__( 'On', 'digeco-core' ),
				'label_off'   => esc_html__( 'Off', 'digeco-core' ),
				'default'     => '',
				'description' => esc_html__( 'Enable or disable navigation dots. Default: Off', 'digeco-core' ),
			),
			array(
				'type'        => Controls_Manager::SWITCHER,
				'id'          => 'slider_autoplay',
				'label'       => esc_html__( 'Autoplay', 'digeco-core' ),
				'label_on'    => esc_html__( 'On', 'digeco-core' ),
				'label_off'   => esc_html__( 'Off', 'digeco-core' ),
				'default'     => 'yes',
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
			case 'style6':
			$template = 'team-slider-3';
			break;
			case 'style5':
			$template = 'team-grid-3';
			break;
			case 'style4':
			$template = 'team-slider-2';
			break;
			case 'style3':
			$template = 'team-slider-1';
			break;
			case 'style2':
			$template = 'team-grid-2';
			break;
			default:
			$template = 'team-grid-1';
			break;
		}
		
		$data['owl_data'] = json_encode( $owl_data );
		$this->rt_load_scripts();

		return $this->rt_template( $template, $data );
	}
}