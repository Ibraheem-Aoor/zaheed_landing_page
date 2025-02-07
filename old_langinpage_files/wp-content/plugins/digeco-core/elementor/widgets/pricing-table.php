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
use Elementor\Utils;
if ( ! defined( 'ABSPATH' ) ) exit;

class Pricing_Table extends Custom_Widget_Base {

	public function __construct( $data = [], $args = null ){
		$this->rt_name = esc_html__( 'RT Pricing Table', 'digeco-core' );
		$this->rt_base = 'rt-pricing-table';
		parent::__construct( $data, $args );
	}

	public function rt_fields(){
		$repeater = new \Elementor\Repeater();
		
		$repeater->add_control(
			'text', [
				'type' => Controls_Manager::TEXT,
				'label'   => esc_html__( 'Text', 'digeco-core' ),
				'label_block' => true,
			]
		);
		$repeater->add_control(
			'list_icon_class', [
				'type' => Controls_Manager::ICONS,
				'label'   => esc_html__( 'List Icon', 'digeco-core' ),
				'Description'  => esc_html__( 'Icon will place before features text', 'digeco-core' ),
				'label_block' => true,
			]
		);
		$repeater->add_control(
			'list_icon_color', [
				'type' => Controls_Manager::COLOR,
				'label'   => esc_html__( 'Icon Color', 'digeco-core' ),
				'default'  => '',
				'label_block' => true,
			]
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
				'label'   => esc_html__( 'Layout', 'digeco-core' ),
				'options' => array(
					'layout1' => esc_html__( 'Layout 1', 'digeco-core' ),
					'layout2' => esc_html__( 'Layout 2', 'digeco-core' ),
					'layout3' => esc_html__( 'Layout 3', 'digeco-core' ),
					'layout4' => esc_html__( 'Layout 4', 'digeco-core' ),
					'layout5' => esc_html__( 'Layout 5', 'digeco-core' ),
					'layout6' => esc_html__( 'Layout 6', 'digeco-core' ),
				),
				'default' => 'layout1',
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
			/*Icon Start*/
			array(
				'type'    => Controls_Manager::ICONS,
				'id'      => 'icon_class',
				'label'   => esc_html__( 'Icon', 'digeco-core' ),
				'default' => array(
			      'value' => 'flaticon-origami',
			      'library' => 'fa-solid',
				),
				'condition'   => array( 'layout' => array( 'layout1' ) ),
			),
			array(
				'type'    => Controls_Manager::NUMBER,
				'id'      => 'icon_size',
				'label'   => esc_html__( 'Icon Size', 'digeco-core' ),
				'description' => esc_html__( 'Recommended Icon size is 52x52 px', 'digeco-core' ),
				'default' => '',
				'selectors' => array(
					'{{WRAPPER}} .rt-price-table-box .rtin-icon i' => 'font-size: {{VALUE}}px',
				),
				'condition'   => array( 'layout' => array( 'layout1' ) ),
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'icon_color',
				'label'   => esc_html__( 'Icon Color', 'digeco-core' ),
				'default' => '',
				'selectors' => array(
					'{{WRAPPER}} .rt-price-table-box .rtin-icon i' => 'color: {{VALUE}}',
				),
				'condition'   => array( 'layout' => array( 'layout1' ) ),
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'icon_bag_color',
				'label'   => esc_html__( 'Icon Background Color', 'digeco-core' ),
				'default' => '',
				'selectors' => array(
					'{{WRAPPER}} .rtin-pricing-layout1 .rtin-icon:before' => 'background-color: {{VALUE}}',
					'{{WRAPPER}} .rtin-pricing-layout1 .rtin-icon:after' => 'background-color: {{VALUE}}',
				),
				'condition'   => array( 'layout' => array( 'layout1' ) ),
			),
			array(
				'type'    => Controls_Manager::TEXT,
				'id'      => 'title',
				'label'   => esc_html__( 'Title', 'digeco-core' ),
				'default' => esc_html__( 'Basic', 'digeco-core' ),
			),			
			array(
				'type'    => Controls_Manager::TEXT,
				'id'      => 'price',
				'label'   => esc_html__( 'Price', 'digeco-core' ),
				'default' => '39',
				'description' => esc_html__( "Including currency sign eg. $59", 'digeco-core' ),
			),
			array(
				'type'    => Controls_Manager::TEXT,
				'id'      => 'price_fac',
				'label'   => esc_html__( 'Price Faction', 'digeco-core' ),
				'default' => '99',
				'condition'   => array( 'layout' => array( 'layout3', 'layout4', 'layout6' ) ),
			),
			array(
				'type'    => Controls_Manager::TEXT,
				'id'      => 'price_symbol',
				'label'   => esc_html__( 'Price Symbol', 'digeco-core' ),
				'default' => '$',
			),
			array(
				'type'    => Controls_Manager::TEXT,
				'id'      => 'unit',
				'label'   => esc_html__( 'Unit Name', 'digeco-core' ),
				'default' => 'Per month',
				'condition'   => array( 'layout' => array( 'layout1', 'layout2', 'layout5' ) ),
			),
			array(
				'type'    => Controls_Manager::TEXTAREA,
				'id'      => 'features',
				'label'   => esc_html__( 'Features', 'digeco-core' ),
				'default' => 'One line per feature',
				'description' => esc_html__( "One line per feature. Put BLANK keyword if you want blank line. eg.<br/>Investment Plan</br>Education Loan</br>Tax Planning</br>BLANK", 'digeco-core' ),
				'condition'   => array( 'layout' => array( 'layout1', 'layout2', 'layout3', 'layout4', 'layout6' ) ),
			),
			array(
				'type'        => Controls_Manager::SWITCHER,
				'id'          => 'has_icon',
				'label_on'    => esc_html__( 'Show', 'digeco-core' ),
				'label_off'   => esc_html__( 'Hide', 'digeco-core' ),
				'label'       => esc_html__( 'Features prefix icon', 'digeco-core' ),
				'default'     => "yes",
			),
			array(
				'type'    => Controls_Manager::REPEATER,
				'id'      => 'list_feature',
				'label'   => esc_html__( 'Features ', 'digeco-core' ),
				'fields' => $repeater->get_controls(),
				'default' => array(
					['text' => 'Speed(1AM-8PM) : 20mbps', ],
					['text' => 'Normal Speed (8PM-1AM) : 10mbps', ],
					['text' => 'Youtube Speed : 100mbps', ],
					['text' => 'Ftp Speed : 100mbps', ],
					['text' => 'Live TV : 0', ],
					['text' => 'Local Speed :Youtube, Facebook', ],
				),
				'condition'   => array( 'layout' => array( 'layout5' ) ),
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
				'default' => 'Order Now',
			),
			array(
				'type'    => Controls_Manager::SELECT2,
				'id'      => 'display_active',
				'label'   => esc_html__( 'Display Active', 'digeco-core' ),
				'options' => array(
					'common-class' => esc_html__( 'Common Price Table', 'digeco-core' ),
					'active-class'  => esc_html__( 'Active Price Table', 'digeco-core' ),
				),
				'default' => 'common-class',
			),
			array(
				'type'    => Controls_Manager::SELECT2,
				'id'      => 'offer_active',
				'label'   => esc_html__( 'Display Offer', 'digeco-core' ),
				'options' => array(
					'offer-active' 		=> esc_html__( 'Offer Active', 'digeco-core' ),
					'offer-inactive'  	=> esc_html__( 'Offer Inactive', 'digeco-core' ),
				),
				'default' => 'offer-inactive',
				'condition'   => array( 'layout' => array( 'layout2', 'layout3', 'layout4', 'layout6' ) ),
			),
			array(
				'type'    => Controls_Manager::TEXT,
				'id'      => 'offertext',
				'label'   => esc_html__( 'Button Text', 'digeco-core' ),
				'default' => 'New',				
				'condition'   => array( 'offer_active' => array( 'offer-active' ), 'layout' => array( 'layout2', 'layout3', 'layout4', 'layout6' ) ),
			),
			
			array(
				'mode' => 'section_end',
			),
			
			array(
				'mode'        => 'section_start',
				'id'          => 'sec_style',
				'label'       => esc_html__( 'Style', 'digeco-core' ),
				'tab'     => Controls_Manager::TAB_STYLE,
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'bgcolor',
				'label'   => esc_html__( 'Background Color', 'digeco-core' ),
				'default' => '',
				'selectors' => array(
					'{{WRAPPER}} .rtin-pricing-layout1 .rt-price-table-box' => 'background: {{VALUE}}',
					'{{WRAPPER}} .rtin-pricing-layout2 .rt-price-table-box' => 'background: {{VALUE}}',
					'{{WRAPPER}} .rtin-pricing-layout3 .rt-price-table-box' => 'background: {{VALUE}}',
					'{{WRAPPER}} .rtin-pricing-layout4 .rt-price-table-box' => 'background: {{VALUE}}',
					'{{WRAPPER}} .rtin-pricing-layout5 .rt-price-table-box' => 'background: {{VALUE}}',
					'{{WRAPPER}} .rtin-pricing-layout6' => 'background: {{VALUE}}',
				),
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'bghovcolor',
				'label'   => esc_html__( 'Background Hover Color', 'digeco-core' ),
				'default' => '',
				'selectors' => array(
					'{{WRAPPER}} .rtin-pricing-layout4.active-class .rt-price-table-box' => 'background: {{VALUE}}',
					'{{WRAPPER}} .rtin-pricing-layout4 .rt-price-table-box:hover' => 'background: {{VALUE}}',
					'{{WRAPPER}} .rtin-pricing-layout6:hover' => 'background: {{VALUE}}',
				),
				'condition'   => array( 'layout' => array( 'layout4' ) ),
			),
			array (
				'mode'    => 'group',
				'type'    => Group_Control_Typography::get_type(),
				'name'    => 'title_typo',
				'label'   => esc_html__( 'Title Style', 'digeco-core' ),
				'selector' => '{{WRAPPER}} .default-pricing .price-header .rtin-title, {{WRAPPER}} .rtin-pricing-layout6 .item-title',
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'title_color',
				'label'   => esc_html__( 'Title Color', 'digeco-core' ),
				'default' => '',
				'selectors' => array(
					'{{WRAPPER}} .rtin-pricing-layout1 .price-header .rtin-title' => 'color: {{VALUE}}',
					'{{WRAPPER}} .rtin-pricing-layout2 .price-header .rtin-title' => 'color: {{VALUE}}',
					'{{WRAPPER}} .rtin-pricing-layout3 .price-header .rtin-title' => 'color: {{VALUE}}',
					'{{WRAPPER}} .rtin-pricing-layout4 .price-header .rtin-title' => 'color: {{VALUE}}',
					'{{WRAPPER}} .rtin-pricing-layout5 .price-header .rtin-title' => 'color: {{VALUE}}',
					'{{WRAPPER}} .rtin-pricing-layout6 .item-title' => 'color: {{VALUE}}',
				),
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'content_color',
				'label'   => esc_html__( 'Content Color', 'digeco-core' ),
				'default' => '',
				'selectors' => array(
					'{{WRAPPER}} .rtin-pricing-layout1 .rt-price-table-box ul li' => 'color: {{VALUE}}',
					'{{WRAPPER}} .rtin-pricing-layout2 .rt-price-table-box ul li' => 'color: {{VALUE}}',
					'{{WRAPPER}} .rtin-pricing-layout3 .rt-price-table-box ul li' => 'color: {{VALUE}}',
					'{{WRAPPER}} .rtin-pricing-layout4 .rt-price-table-box ul li' => 'color: {{VALUE}}',
					'{{WRAPPER}} .rtin-pricing-layout5 .rt-price-table-box ul li' => 'color: {{VALUE}}',
					'{{WRAPPER}} .rtin-pricing-layout1 .rtin-price .price-unit' => 'color: {{VALUE}}',
					'{{WRAPPER}} .rtin-pricing-layout2 .rtin-price .price-unit' => 'color: {{VALUE}}',
					'{{WRAPPER}} .rtin-pricing-layout3 .rtin-price .price-unit' => 'color: {{VALUE}}',
					'{{WRAPPER}} .rtin-pricing-layout4 .rtin-price .price-unit' => 'color: {{VALUE}}',
					'{{WRAPPER}} .rtin-pricing-layout6 .block-list li' => 'color: {{VALUE}}',
				),
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'price_color',
				'label'   => esc_html__( 'Price Color', 'digeco-core' ),
				'default' => '',
				'selectors' => array(
					'{{WRAPPER}} .rtin-pricing-layout1 .rtin-pricing-price .rtin-price' => 'color: {{VALUE}}',
					'{{WRAPPER}} .rtin-pricing-layout2 .price-header .rtin-price' => 'color: {{VALUE}}',
					'{{WRAPPER}} .rtin-pricing-layout4 .price-header .rtin-price' => 'color: {{VALUE}}',
					'{{WRAPPER}} .rtin-pricing-layout5 .price-header .rtin-price' => 'color: {{VALUE}}',
					'{{WRAPPER}} .rtin-pricing-layout6 .item-price' => 'color: {{VALUE}}',
				),
				'condition'   => array( 'layout' => array( 'layout1', 'layout2', 'layout4', 'layout5', 'layout6' ) ),
			),		
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'offer_color',
				'label'   => esc_html__( 'Offer Background Color', 'digeco-core' ),
				'default' => '',
				'selectors' => array(
					'{{WRAPPER}} .rtin-pricing-layout2 .rt-price-table-box .popular-offer' => 'border-top-color: {{VALUE}}',
					'{{WRAPPER}} .rtin-pricing-layout3 .rt-price-table-box .popular-offer' => 'border-top-color: {{VALUE}}',
					'{{WRAPPER}} .rtin-pricing-layout4 .rt-price-table-box .popular-offer' => 'border-top-color: {{VALUE}}',
					'{{WRAPPER}} .rtin-pricing-layout6 .status-shape' => 'border-top-color: {{VALUE}}',
				),
				'condition'   => array( 'layout' => array( 'layout2', 'layout3', 'layout4', 'layout6' ) ),
			),			
			
			array(
				'mode' => 'section_end',
			),
		);
		return $fields;
	}
	
	private function validate( $str ){
			$str = trim( $str );
			// replace BLANK keyword
			if ( strtolower( $str ) == 'blank'  ) {
				return '&nbsp;';
			}
			return $str;
		}

	protected function render() {
		
		$data = $this->get_settings();
			
		$features = strip_tags( $data['features'] ); // remove tags
		$features = preg_split( "/\R/", $data['features'] ); // string to array
		$features = array_map( array( $this, 'validate' ),  $features ); // validate

		$data['features'] = $features;
		
		$template = 'pricing-table';
		
		switch ( $data['layout'] ) {
			case 'layout6':
			$template = 'pricing-table-6';
			break;
			case 'layout5':
			$template = 'pricing-table-5';
			break;
			case 'layout4':
			$template = 'pricing-table-4';
			break;
			case 'layout3':
			$template = 'pricing-table-3';
			break;
			case 'layout2':
			$template = 'pricing-table-2';
			break;
			default:
			$template = 'pricing-table-1';
			break;
		}

		return $this->rt_template( $template, $data );
	}
}