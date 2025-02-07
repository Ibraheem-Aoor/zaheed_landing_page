<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

namespace radiustheme\Digeco_Core;
use Elementor\Controls_Manager;

if ( ! defined( 'ABSPATH' ) ) exit;

class Logo_Slider extends Custom_Widget_Base {

	public function __construct( $data = [], $args = null ){
		$this->rt_name = esc_html__( 'RT Logo Slider and Grid', 'digeco-core' );
		$this->rt_base = 'rt-logo-slider';
		$this->rt_translate = array(
			'cols'  => array(
				'1'  => esc_html__( '1 Col', 'digeco-core' ),
				'2'  => esc_html__( '2 Col', 'digeco-core' ),
				'3'  => esc_html__( '3 Col', 'digeco-core' ),
				'4'  => esc_html__( '4 Col', 'digeco-core' ),
				'5'  => esc_html__( '5 Col', 'digeco-core' ),
				'6'  => esc_html__( '6 Col', 'digeco-core' ),
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

		$repeater = new \Elementor\Repeater();

		$repeater->add_control(
            'image',
            array(
                'type' => Controls_Manager::MEDIA,
                'label' =>   esc_html__('Image', 'thepack'),
                'label_block' => true,
			)
        );

		$repeater->add_control(
            'url',
            array(
                'type' => Controls_Manager::TEXT,
                'label' => esc_html__( 'URL(optional)', 'digeco-core' ),
                'label_block' => true,
			)
        );

		$fields = array(
			array(
				'mode'    => 'section_start',
				'id'      => 'sec_general',
				'label'   => esc_html__( 'General', 'digeco-core' ),
			),
			array(
				'type'    => Controls_Manager::SELECT2,
				'id'      => 'layout',
				'label'   => esc_html__( 'Logo Layout', 'digeco-core' ),
				'options' => array(
					'layout1' => esc_html__( 'Logo Slider', 'digeco-core' ),
					'layout2' => esc_html__( 'Logo Grid', 'digeco-core' ),
				),
				'default' => 'layout1',
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
				'type'    => Controls_Manager::REPEATER,
				'id'      => 'logos',
				'label'   => esc_html__( 'Add as many logos as you want', 'digeco-core' ),
				'fields'  => $repeater->get_controls(),
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
				'default' => '5',
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
				'default' => '3',
			),
			array(
				'type'    => Controls_Manager::SELECT2,
				'id'      => 'col_xs',
				'label'   => esc_html__( 'Phones: < 768px', 'digeco-core' ),
				'options' => $this->rt_translate['cols'],
				'default' => '2',
			),
			array(
				'type'    => Controls_Manager::SELECT2,
				'id'      => 'col_mobile',
				'label'   => esc_html__( 'Small Phones: < 480px', 'digeco-core' ),
				'options' => $this->rt_translate['cols'],
				'default' => '1',
			),
			array(
				'mode' => 'section_end',
			),

			// Slider options
			array(
				'mode'        => 'section_start',
				'id'          => 'sec_slider',
				'label'       => esc_html__( 'Slider Options', 'digeco-core' ),
				'condition'   => array( 'layout' => array( 'layout1' ) ),
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
				'label'       => esc_html__( 'Navigation Dot', 'digeco-core' ),
				'label_on'    => esc_html__( 'On', 'digeco-core' ),
				'label_off'   => esc_html__( 'Off', 'digeco-core' ),
				'default'     => '',
				'description' => esc_html__( 'Enable or disable navigation dot. Default: Off', 'digeco-core' ),
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
			'navText'            => array( "<i class='fa fa-angle-left'></i>", "<i class='fa fa-angle-right'></i>" ),
			'autoplay'           => $data['slider_autoplay'] == 'yes' ? true : false,
			'autoplayTimeout'    => $data['slider_interval'],
			'autoplaySpeed'      => $data['slider_autoplay_speed'],
			'autoplayHoverPause' => $data['slider_stop_on_hover'] == 'yes' ? true : false,
			'loop'               => $data['slider_loop'] == 'yes' ? true : false,
			'margin'             => 0,
			'responsive'         => array(
				'0'    => array( 'items' => $data['col_mobile'] ),
				'480'  => array( 'items' => $data['col_xs'] ),
				'768'  => array( 'items' => $data['col_sm'] ),
				'992'  => array( 'items' => $data['col_md'] ),
				'1200' => array( 'items' => $data['col_lg'] ),
			)
		);

		$data['owl_data'] = json_encode( $owl_data );
		$this->rt_load_scripts();
		
		switch ( $data['layout'] ) {
			case 'layout2':
			$template = 'logo-grid';
			break;
			default:
			$template = 'logo-slider';
			break;
		}


		return $this->rt_template( $template, $data );
	}
}