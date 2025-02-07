<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

namespace radiustheme\Digeco_Core;

use Elementor\Controls_Manager;

if ( ! defined( 'ABSPATH' ) ) exit;

class Contact_Info extends Custom_Widget_Base {

	public function __construct( $data = [], $args = null ){
		$this->rt_name = esc_html__( 'RT Contact Info', 'digeco-core' );
		$this->rt_base = 'rt-contact-info';
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
				'type'    => Controls_Manager::TEXTAREA,
				'id'      => 'content',
				'label'   => esc_html__( 'Content', 'digeco-core' ),
				'default' => esc_html__( 'Lorem Ipsum hasbeen standard daand scrambled. Rimply dummy text of the printing and typesetting industry', 'digeco-core' ),
			),
			array(
				'type'    => Controls_Manager::TEXTAREA,
				'id'      => 'address',
				'label'   => esc_html__( 'Address', 'digeco-core' ),
				'default' => esc_html__( '29 Street, Melbourne City, Australia # 34 Road, House #10.', 'digeco-core' ),
			),
			array(
				'type'    => Controls_Manager::TEXT,
				'id'      => 'phone1',
				'label'   => esc_html__( 'Phone 1', 'digeco-core' ),
				'default' => '+0000000000',
			),
			array(
				'type'    => Controls_Manager::TEXT,
				'id'      => 'phone2',
				'label'   => esc_html__( 'Phone 2', 'digeco-core' ),
			),
			array(
				'type'    => Controls_Manager::TEXT,
				'id'      => 'email',
				'label'   => esc_html__( 'Email', 'digeco-core' ),
				'default' => 'info@example.com',
			),
			array(
				'type'    => Controls_Manager::TEXT,
				'id'      => 'fax',
				'label'   => esc_html__( 'Fax', 'digeco-core' ),
				'default' => '+0000000000',
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'icon_color',
				'label'   => esc_html__( 'Icon Color', 'digeco-core' ),
				'default' => '',
				'selectors' => array(
					'{{WRAPPER}} .rtin-contact-info ul li i' => 'color: {{VALUE}}',
				),
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'content_color',
				'label'   => esc_html__( 'Content Color', 'digeco-core' ),
				'default' => '',
				'selectors' => array(
					'{{WRAPPER}} .rtin-contact-info .rtin-content' => 'color: {{VALUE}}',
					'{{WRAPPER}} .rtin-contact-info ul li' => 'color: {{VALUE}}',
					'{{WRAPPER}} .rtin-contact-info ul li a' => 'color: {{VALUE}}',
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

		$template = 'contact-info';

		return $this->rt_template( $template, $data );
	}
}