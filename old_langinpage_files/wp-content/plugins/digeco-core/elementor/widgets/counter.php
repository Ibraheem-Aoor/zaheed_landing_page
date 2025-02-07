<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

namespace radiustheme\Digeco_Core;

use Elementor\Controls_Manager;

if ( ! defined( 'ABSPATH' ) ) exit;

class Counter extends Custom_Widget_Base {

	public function __construct( $data = [], $args = null ){
		$this->rt_name = __( 'RT Counter', 'digeco-core' );
		$this->rt_base = 'rt-Counter';
		parent::__construct( $data, $args );
	}

	private function rt_load_scripts(){
		wp_enqueue_style( 'animate' );
		wp_enqueue_script( 'jquery-counterup' );
		wp_enqueue_script( 'rt-waypoints' );
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
				),
				'default' => 'style1',
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
				'type'    => Controls_Manager::SELECT2,
				'id'      => 'iconalign',
				'label'   => esc_html__( 'Icon Align', 'digeco-core' ),
				'options' => array(
					'left' => esc_html__( 'left', 'digeco-core' ),
					'center' => esc_html__( 'Center', 'digeco-core' ),
					'right' => esc_html__( 'Right', 'digeco-core' ),
				),
				'default' => 'center',
			),
			/*Icon Start*/
			array(
				'type'    => Controls_Manager::ICONS,
				'id'      => 'icon_class',
				'label'   => esc_html__( 'Icon', 'digeco-core' ),
				'default' => array(
			      'value' => 'flaticon-award',
			      'library' => 'fa-solid',
				),
				'condition'   => array( 'style' => array( 'style2', 'style4' ) ),
			),
			array(
				'type'    => Controls_Manager::TEXT,
				'id'      => 'title',
				'label'   => esc_html__( 'Title', 'digeco-core' ),
				'default' => esc_html__( 'Happy Clients', 'digeco-core' ),
			),
			array(
				'type'    => Controls_Manager::NUMBER,
				'id'      => 'number',
				'label'   => esc_html__( 'Counter Number', 'digeco-core' ),
				'default' => 1240,
			),
			array(
				'type'    => Controls_Manager::NUMBER,
				'id'      => 'speed',
				'label'   => esc_html__( 'Animation Speed', 'digeco-core' ),
				'default' => 2000,
				'description' => esc_html__( 'The total duration of the count animation in milisecond eg. 5000', 'digeco-core' ),
			),
			array(
				'type'    => Controls_Manager::NUMBER,
				'id'      => 'steps',
				'label'   => esc_html__( 'Animation Steps', 'digeco-core' ),
				'default' => 50,
				'description' => esc_html__( 'Counter steps eg. 10', 'digeco-core' ),
			),
			array(
				'mode' => 'section_end',
			),
			
			array(
				'mode'    => 'section_start',
				'id'      => 'sec_colors',
				'label'   => esc_html__( 'Colors', 'digeco-core' ),
				'tab'     => Controls_Manager::TAB_STYLE,
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'title_color',
				'label'   => esc_html__( 'Title Color', 'digeco-core' ),
				'default' => '',
				'selectors' => array(
					'{{WRAPPER}} .rt-counter .rtin-item .rtin-title' => 'color: {{VALUE}}',
				),
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'counter_color',
				'label'   => esc_html__( 'Counter Color', 'digeco-core' ),
				'default' => '',
				'selectors' => array(
					'{{WRAPPER}} .rt-counter .rtin-item .rtin-counter' => 'color: {{VALUE}}',
				),
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'icon_color',
				'label'   => esc_html__( 'Icon Color', 'digeco-core' ),
				'default' => '',
				'selectors' => array(
					'{{WRAPPER}} .rt-counter .rtin-item i' => 'color: {{VALUE}}',
				),
				'condition'   => array( 'style' => array( 'style2', 'style4' ) ),
			),
			array(
				'type'    => Controls_Manager::NUMBER,
				'id'      => 'title_size',
				'label'   => esc_html__( 'Title Font Size', 'digeco-core' ),
				'default' => '',
				'selectors' => array(
					'{{WRAPPER}} .rt-counter .rtin-item .rtin-title' => 'font-size: {{VALUE}}px',
				),
			),
			array(
				'type'    => Controls_Manager::NUMBER,
				'id'      => 'counter_size',
				'label'   => esc_html__( 'Counter Font Size', 'digeco-core' ),
				'default' => '',
				'selectors' => array(
					'{{WRAPPER}} .rt-counter .rtin-item .rtin-counter' => 'font-size: {{VALUE}}px',
				),
			),
			array(
				'type'    => Controls_Manager::NUMBER,
				'id'      => 'icon_size',
				'label'   => esc_html__( 'Icon Font Size', 'digeco-core' ),
				'default' => '',
				'selectors' => array(
					'{{WRAPPER}} .rt-counter .rtin-item .rtin-icon i' => 'font-size: {{VALUE}}px',
					'{{WRAPPER}} .rt-counter .rtin-item .rtin-icon i:before' => 'font-size: {{VALUE}}px',
				),
				'condition'   => array( 'style' => array( 'style2', 'style4' ) ),
			),
			array(
				'mode' => 'section_end',
			),
		);
		return $fields;
	}

	protected function render() {
		$data = $this->get_settings();
		$this->rt_load_scripts();
		
		switch ( $data['style'] ) {
			case 'style4':
			$template = 'counter-4';
			break;
			case 'style3':
			$template = 'counter-3';
			break;
			case 'style2':
			$template = 'counter-2';
			break;
			default:
			$template = 'counter-1';
			break;
		}

		return $this->rt_template( $template, $data );
	}
}