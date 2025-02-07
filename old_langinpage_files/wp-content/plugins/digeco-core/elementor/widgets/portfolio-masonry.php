<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

namespace radiustheme\Digeco_Core;
use Elementor\Controls_Manager;

if ( ! defined( 'ABSPATH' ) ) exit;

class Portfolio_Masonry extends Custom_Widget_Base {

	public function __construct( $data = [], $args = null ){
		$this->rt_name = esc_html__( 'RT Portfolio Masonry', 'digeco-core' );
		$this->rt_base = 'rt-portfolio-masonry';
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

	public function rt_fields(){
		
		$terms  = get_terms( array( 'taxonomy' => 'digeco_portfolio_category', 'fields' => 'id=>name' ) );
		$category_dropdown = array( '0' => __( 'Please Selecet category', 'digeco-core' ) );

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
				'id'      => 'layout',
				'label'   => esc_html__( 'Layout', 'digeco-core' ),
				'options' => array(
					'layout1' => esc_html__( 'Masonry layout 1', 'digeco-core' ),
					'layout2' => esc_html__( 'Masonry layout 2', 'digeco-core' ),
					'layout3' => esc_html__( 'Masonry layout 3', 'digeco-core' ),
					'layout4' => esc_html__( 'Masonry layout 4', 'digeco-core' ),
					'layout5' => esc_html__( 'Masonry layout 5', 'digeco-core' ),
				),
				'default' => 'layout1',
			),
			
			/*category select( box Multi )*/
			array (
				'type'    => Controls_Manager::REPEATER,
				'id'      => 'category_list',
				'label'   => esc_html__( 'Add as many Categories as you want', 'digeco-core' ),
				'fields'  => array(
					array(
						'type'    => Controls_Manager::SELECT2,
						'name'    => 'cat_multi_box',
						'label'   => esc_html__( 'Categories', 'digeco-core' ),
						'options' => $category_dropdown,
						'multiple'=> false,
						'default' => '1',
					),
				),
			),		
			/*Post Order*/
			array(
				'type'    => Controls_Manager::SELECT2,
				'id'      => 'post_ordering',
				'label'   => esc_html__( 'Post Ordering', 'digeco-core' ),
				'options' => array(
					'DESC'	=> esc_html__( 'Desecending', 'digeco-core' ),
					'ASC'	=> esc_html__( 'Ascending', 'digeco-core' ),
				),
				'default' => 'DESC',
			),
			array(
				'type'    => Controls_Manager::SELECT2,
				'id'      => 'orderby',
				'label'   => esc_html__( 'Post Sorting', 'digeco-core' ),				
				'options' => array(
					'recent' 		=> esc_html__( 'Recent Post', 'digeco-core' ),
					'rand' 			=> esc_html__( 'Random Post', 'digeco-core' ),
					'menu_order' 	=> esc_html__( 'Custom Order', 'digeco-core' ),
					'title' 		=> esc_html__( 'By Name', 'digeco-core' ),
				),
				'default' => 'recent',
			),			
			array(
				'type'    => Controls_Manager::REPEATER,
				'id'      => 'posts_not_in',
				'label'   => esc_html__( 'Enter Post ID that will not display', 'digeco-core' ),
				'fields'  => array(
					array(
						'type'    => Controls_Manager::NUMBER,
						'name'    => 'post_not_in',
						'label'   => esc_html__( 'Post ID', 'digeco-core' ),
						'default' => '0',
					),
				),
			),
			array (
				'type'        => Controls_Manager::SWITCHER,
				'id'          => 'cat_display',
				'label'       => esc_html__( 'Category Name Display', 'digeco-core' ),
				'label_on'    => esc_html__( 'Show', 'digeco-core' ),
				'label_off'   => esc_html__( 'Hide', 'digeco-core' ),
				'default'     => 'yes',
			),
			array(
				'type'    => Controls_Manager::SELECT2,
				'id'      => 'column_no_gutters',
				'label'   => esc_html__( 'Display column gap', 'digeco-core' ),
				'options' => array(
					'show'        => esc_html__( 'Gap', 'digeco-core' ),
					'hide'        => esc_html__( 'No Gap', 'digeco-core' ),
				),
				'default' => 'show',
			),
			array(
				'type'    => Controls_Manager::NUMBER,
				'id'      => 'itemnumber',
				'label'   => esc_html__( 'Item Number', 'digeco-core' ),
				'default' => -1,
				'description' => esc_html__( 'Use -1 for showing all items( Showing items per category )', 'digeco-core' ),
			),
			array(
				'type'    => Controls_Manager::NUMBER,
				'id'      => 'title_size',
				'label'   => esc_html__( 'Title Font Size', 'digeco-core' ),
				'default' => 24,
			),
			array(
				'type'    => Controls_Manager::NUMBER,
				'id'      => 'title_count',
				'label'   => esc_html__( 'Title count', 'digeco-core' ),
				'default' => 5,
				'description' => esc_html__( 'Maximum number of words', 'digeco-core' ),				
			),
			array (
				'type'        => Controls_Manager::SWITCHER,
				'id'          => 'excerpt_display',
				'label'       => esc_html__( 'Excerpt/Content Display', 'digeco-core' ),
				'label_on'    => esc_html__( 'Show', 'digeco-core' ),
				'label_off'   => esc_html__( 'Hide', 'digeco-core' ),
				'default'     => 'false',
			),
			array(
				'type'    => Controls_Manager::NUMBER,
				'id'      => 'excerpt_count',
				'label'   => esc_html__( 'Word count', 'digeco-core' ),
				'default' => 13,
				'description' => esc_html__( 'Maximum number of words', 'digeco-core' ),
				'condition'   => array( 'excerpt_display' =>'yes' ),
			),
			array (
				'type'    => Controls_Manager::COLOR,
				'id'      => 'item_title_color',
				'label'   => esc_html__( 'Item Title Color', 'digeco-core' ),
				'default' => '',
				'selectors' => array( 
					'{{WRAPPER}} .portfolio-default .rtin-content h3 a' => 'color: {{VALUE}}',
				),
			),
			array (
				'type'    => Controls_Manager::COLOR,
				'id'      => 'item_link_color',
				'label'   => esc_html__( 'Item Link Color', 'digeco-core' ),
				'default' => '',
				'selectors' => array(
					'{{WRAPPER}} .portfolio-default .rtin-item .rtin-cat a' => 'color: {{VALUE}}',
					'{{WRAPPER}} .portfolio-default .rtin-item  .rtin-icon a' => 'color: {{VALUE}}',
				),
			),
			array (
				'type'    => Controls_Manager::COLOR,
				'id'      => 'item_content_color',
				'label'   => esc_html__( 'Item Content Color', 'digeco-core' ),
				'default' => '',
				'selectors' => array(
					'{{WRAPPER}} .portfolio-default .rtin-item .rtin-content p' => 'color: {{VALUE}}',
				),
			),
			array(
				'type'    => Controls_Manager::SELECT2,
				'id'      => 'all_button',
				'label'   => esc_html__( 'Show All Button', 'digeco-core' ),
				'options' => array(
					'show'        => esc_html__( 'Show', 'digeco-core' ),
					'hide'        => esc_html__( 'Hide', 'digeco-core' ),
				),
				'default' => 'show',
			),
			array(
				'type'    => Controls_Manager::SELECT2,
				'id'      => 'more_button',
				'label'   => esc_html__( 'More Button', 'digeco-core' ),
				'options' => array(
					'show'        => esc_html__( 'Show', 'digeco-core' ),
					'hide'        => esc_html__( 'Hide', 'digeco-core' ),
				),
				'default' => 'show',				
			),
			array (
				'type'    => Controls_Manager::TEXT,
				'id'      => 'see_button_text',
				'label'   => esc_html__( 'Button Text', 'digeco-core' ),
				'condition'   => array( 'more_button' => array( 'show' ) ),
				'default' => esc_html__( 'Show More', 'digeco-core' ),
			),
			array (
				'type'    => Controls_Manager::TEXT,
				'id'      => 'see_button_link',
				'label'   => esc_html__( 'Button Link', 'digeco-core' ),
				'condition'   => array( 'more_button' => array( 'show' ) ),
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
				'mode' => 'section_end',
			),
		);
		return $fields;
	}

	private function rt_load_scripts(){
		wp_enqueue_script( 'isotope-pkgd' );
		wp_enqueue_script( 'isotope-func' );
	}

	protected function render() {
		$data = $this->get_settings();

		$this->rt_load_scripts();

		switch ( $data['layout'] ) {
			case 'layout5':
			$template = 'portfolio-masonry-5';
			break;
			case 'layout4':
			$template = 'portfolio-masonry-4';
			break;
			case 'layout3':
			$template = 'portfolio-masonry-3';
			break;
			case 'layout2':
			$template = 'portfolio-masonry-2';
			break;
			default:
			$template = 'portfolio-masonry-1';
			break;
		}

		return $this->rt_template( $template, $data );
	}
}