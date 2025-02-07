<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

namespace radiustheme\Digeco_Core;

use Elementor\Controls_Manager;
use Elementor\Group_Control_Background;

if ( ! defined( 'ABSPATH' ) ) exit;

class Content_Toggle extends Custom_Widget_Base {
  public function __construct( $data = [], $args = null ){
    $this->rt_name = esc_html__( 'Content toggle', 'digeco-core' );
    $this->rt_base = 'rt-content-toggle';
    parent::__construct( $data, $args );
  }
  public function get_post_template( $type = 'page' ) {
    $posts = get_posts(
      array(
        'post_type'      => 'elementor_library',
        'orderby'        => 'title',
        'order'          => 'ASC',
        'posts_per_page' => '-1',
        'tax_query'      => array(
          array(
            'taxonomy' => 'elementor_library_type',
            'field'    => 'slug',
            'terms'    => $type,
          ),
        ),
      )
    );
    $templates = array();
    foreach ( $posts as $post ) {
      $templates[] = array(
        'id'   => $post->ID,
        'name' => $post->post_title,
      );
    }

    return $templates;
  }
  public function get_saved_data( $type = 'section' ) {
    $saved_widgets = $this->get_post_template( $type );
    $options[-1]   = __( 'Select', 'digeco-core' );
    if ( count( $saved_widgets ) ) {
      foreach ( $saved_widgets as $saved_row ) {
        $options[ $saved_row['id'] ] = $saved_row['name'];
      }
    } else {
      $options['no_template'] = __( 'It seems that, you have not saved any template yet.', 'digeco-core' );
    }
    return $options;
  }
  public function get_content_type() {
    $content_type = array(
      'content'              => __( 'Content', 'digeco-core' ),
      'saved_rows'           => __( 'Saved Section', 'digeco-core' ),
      'saved_page_templates' => __( 'Saved Page', 'digeco-core' ),
    );
    return $content_type;
  }
  public function rt_fields(){
    $fields = [
      [
        'mode'    => 'section_start',
        'id'      => 'section_1',
        'label'   => esc_html__( 'Content 1', 'digeco-core' ),
      ],
      [
        'type'        => Controls_Manager::TEXT,
        'id'          => 'section_1_heading',
        'label'       => esc_html__( 'Heading', 'digeco-core' ),
        'default'     => "Heading 1",
      ],
      [
        'type'    => Controls_Manager::SELECT2,
        'id'      => 'section_1_content',
        'label'   => esc_html__( 'Select Template', 'digeco-core' ),
        'options' => $this->get_saved_data('section'),
        'default' => 'key',
      ],      
      [
        'mode' => 'section_end',
      ],
      [
        'mode'    => 'section_start',
        'id'      => 'section_2',
        'label'   => esc_html__( 'Content 2', 'digeco-core' ),
      ],
      [
        'type'        => Controls_Manager::TEXT,
        'id'          => 'section_2_heading',
        'label'       => esc_html__( 'Heading', 'digeco-core' ),
        'default'     => "Heading 2",
      ],
      [
        'type'    => Controls_Manager::SELECT2,
        'id'      => 'section_2_content',
        'label'   => esc_html__( 'Select Template', 'digeco-core' ),
        'options' => $this->get_saved_data('section'),
        'default' => 'key',
      ],      
      [
        'mode' => 'section_end',
      ],
      [
        'mode'    => 'section_start',
        'id'      => 'content_style',
        'label'   => esc_html__( 'Tab Style', 'digeco-core' ),
        'tab'     => Controls_Manager::TAB_STYLE,
      ],
      [
        'type'      => Controls_Manager::COLOR,
        'id'        => 'active_tab_color',
        'label'     => esc_html__( 'Active Tab Color', 'digeco-core' ),
        'selectors' => [
          '{{WRAPPER}} .rtel-content-toggle ul.nav.nav-tabs .nav-item.show .nav-link' => 'color: {{VALUE}}',
          '{{WRAPPER}} .rtel-content-toggle ul.nav.nav-tabs .nav-link.active' => 'color: {{VALUE}}',
        ],
      ],
      [
        'mode'            => 'group',
        'separator'       => 'before',
        'label_block'     => true,
        'type'            => Group_Control_Background::get_type(),
        'name'            => 'active_tab_background',
        'types'           => [ 'classic', 'gradient', ],
        'fields_options'  => [
          'background' => [
            'label' => esc_html__( 'Active Tab Background', 'digeco-core' ),
          ],
        ],
        'selector'        => '
          {{WRAPPER}} .rtel-content-toggle ul.nav.nav-tabs .nav-item.show .nav-link,
          {{WRAPPER}} .rtel-content-toggle ul.nav.nav-tabs .nav-link.active,
          {{WRAPPER}} noselector
        ',
      ],
      [
        'mode' => 'section_end',
      ],
    ];
    return $fields;
  }
  protected function render() {
    $data = $this->get_settings();
    $template = 'content-toggle';
    return $this->rt_template( $template, $data );
  }
}
