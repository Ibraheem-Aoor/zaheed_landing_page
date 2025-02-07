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

if ( ! defined( 'ABSPATH' ) ) exit;

class Progress_Circle extends Custom_Widget_Base {

	public function __construct( $data = [], $args = null ){
		$this->rt_name = __( 'RT Progress Circle', 'digeco-core' );
		$this->rt_base = 'rt-progress-circle';
		parent::__construct( $data, $args );
	}

	private function rt_load_scripts(){
		wp_enqueue_script( 'jquery-knob' );
		wp_enqueue_script( 'jquery-appear' );
	}

	public function rt_fields(){
		$fields = array(
			array(
				'mode'    => 'section_start',
				'id'      => 'sec_general',
				'label'   => esc_html__( 'General', 'digeco-core' ),
			),
			array(
				'type'    => Controls_Manager::NUMBER,
				'id'      => 'number',
				'label'   => esc_html__( 'Circle Number', 'digeco-core' ),
				'default' => 50,
			),
			array(
				'type' => Controls_Manager::CHOOSE,
				'id'      => 'content_align',
				'label'   => esc_html__( 'Alignment', 'digeco-core' ),
				'options' => array(
					'left' => array(
						'title' => __( 'Left', 'elementor' ),
						'icon' => 'eicon-text-align-left',
					),
					'center' => array(
						'title' => __( 'Center', 'elementor' ),
						'icon' => 'eicon-text-align-center',
					),
					'right' => array(
						'title' => __( 'Right', 'elementor' ),
						'icon' => 'eicon-text-align-right',
					),
					'justify' => array(
						'title' => __( 'Justified', 'elementor' ),
						'icon' => 'eicon-text-align-justify',
					),
				),
				'default' => '',
				'selectors' => array(
					'{{WRAPPER}}' => 'text-align: {{VALUE}};',
				),
			),
			array(
				'type'    => Controls_Manager::TEXT,
				'id'      => 'mbps',
				'label'   => esc_html__( 'Unit', 'digeco-core' ),
				'default' => esc_html__( 'Mbps', 'digeco-core' ),
			),
			array(
				'type'    => Controls_Manager::TEXT,
				'id'      => 'circle_width',
				'label'   => esc_html__( 'Circle Width', 'digeco-core' ),
				'default' => 200,
			),
			array(
				'type'    => Controls_Manager::TEXT,
				'id'      => 'circle_height',
				'label'   => esc_html__( 'Circle Height', 'digeco-core' ),
				'default' => 200,
			),
			array(
				'type'    => Controls_Manager::TEXT,
				'id'      => 'circle_border',
				'label'   => esc_html__( 'Circle thickness', 'digeco-core' ),
				'default' => 0.09,
			),
			array(
				'type'    => Controls_Manager::TEXTAREA,
				'id'      => 'content',
				'label'   => esc_html__( 'Content', 'digeco-core' ),
				'default' => esc_html__( 'All our projects incorporate a unique artistic image functional.', 'digeco-core' ),
			),
			array(
				'type'    => Controls_Manager::NUMBER,
				'id'      => 'speed',
				'label'   => esc_html__( 'Animation Speed', 'digeco-core' ),
				'default' => 5000,
				'description' => esc_html__( 'The total duration of the count animation in milisecond eg. 5000', 'digeco-core' ),
			),
			array(
				'type'    => Controls_Manager::NUMBER,
				'id'      => 'steps',
				'label'   => esc_html__( 'Animation Steps', 'digeco-core' ),
				'default' => 10,
				'description' => esc_html__( 'Counter steps eg. 10', 'digeco-core' ),
			),
			array(
				'mode' => 'section_end',
			),
			array(
				'mode'    => 'section_start',
				'id'      => 'sec_style',
				'label'   => esc_html__( 'Style', 'digeco-core' ),
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'mbps_color',
				'label'   => esc_html__( 'Unit Color', 'digeco-core' ),
				'default' => '',
				'selectors' => array(
					'{{WRAPPER}} .progress-circular-layout .progress-circular .rtin-unit' => 'color: {{VALUE}}',
				),
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'content_color',
				'label'   => esc_html__( 'Content Color', 'digeco-core' ),
				'default' => '',
				'selectors' => array(
					'{{WRAPPER}} .progress-circular-layout .rtin-content' => 'color: {{VALUE}}',
				),
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'bgcolor_color',
				'label'   => esc_html__( 'bgcolor Color', 'digeco-core' ),
				'default' => '',
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'fgcolor_color',
				'label'   => esc_html__( 'fgcolor Color', 'digeco-core' ),
				'default' => '',
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
		
		$template = 'progress-circle';

		return $this->rt_template( $template, $data );
	}
}