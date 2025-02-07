<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

namespace radiustheme\Digeco_Core;

use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;

if ( ! defined( 'ABSPATH' ) ) exit;

class Progress_Bar extends Custom_Widget_Base {

	public function __construct( $data = [], $args = null ){
		$this->rt_name = __( 'RT Progress Bar', 'digeco-core' );
		$this->rt_base = 'rt-progress-bar';
		parent::__construct( $data, $args );
	}

	private function rt_load_scripts(){
		wp_enqueue_style( 'animate' );
	}

	public function rt_fields(){
		$fields = array(
			array(
				'mode'    => 'section_start',
				'id'      => 'sec_general',
				'label'   => esc_html__( 'General', 'digeco-core' ),
			),
			array(
				'type'    => Controls_Manager::TEXT,
				'id'      => 'title',
				'label'   => esc_html__( 'Title', 'digeco-core' ),
				'default' => esc_html__( 'Total Posts', 'digeco-core' ),
			),
			array(
				'type'    => Controls_Manager::SLIDER,
				'id'      => 'number',
				'label'   => esc_html__( 'Percentage', 'digeco-core' ),
				'default' => array( 'size' => 77 ),
			),
			array(
				'type'    => Controls_Manager::TEXT,
				'id'      => 'number_height',
				'label'   => esc_html__( 'Percentage Height', 'digeco-core' ),
				'default' => '10',
			),						
			array(
				'mode'    => 'group',
				'type'    => Group_Control_Typography::get_type(),
				'name'    => 'title_typo',
				'label'   => esc_html__( 'Title Typo', 'digeco-core' ),
				'selector' => '{{WRAPPER}} .rtin-progress-bar .rtin-name',
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'title_color',
				'label'   => esc_html__( 'Title Color', 'digeco-core' ),
				'default' => '',
				'selectors' => array( '{{WRAPPER}} .rtin-progress-bar .rtin-name' => 'color: {{VALUE}}' ),
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'bgcolor_color',
				'label'   => esc_html__( 'Bgcolor', 'digeco-core' ),
				'default' => '',
				'selectors' => array( '{{WRAPPER}} .progress' => 'background-color: {{VALUE}}' ),
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'fgcolor_color',
				'label'   => esc_html__( 'Fgcolor', 'digeco-core' ),
				'default' => '',
				'selectors' => array( '{{WRAPPER}} .progress .progress-bar' => 'background-color: {{VALUE}}' ),
			),			
			array(
				'type'        => Controls_Manager::SWITCHER,
				'id'          => 'bg_shape',
				'label'       => esc_html__( 'Background Shape', 'digeco-core' ),
				'label_on'    => esc_html__( 'On', 'digeco-core' ),
				'label_off'   => esc_html__( 'Off', 'digeco-core' ),
				'default'     => 'yes',
				'description' => esc_html__( 'Show or Hide Content. Default: off', 'digeco-core' ),
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

		$template = 'progress-bar';

		return $this->rt_template( $template, $data );
	}
}