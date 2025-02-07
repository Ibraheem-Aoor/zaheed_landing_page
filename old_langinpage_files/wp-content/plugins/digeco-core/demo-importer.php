<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

namespace radiustheme\Digeco_Core;

use \FW_Ext_Backups_Demo;
use \WPCF7_ContactFormTemplate;

if (! defined('ABSPATH')) {
    exit;
}

class Demo_Importer
{

    public function __construct()
    {
        add_filter('plugin_action_links_rt-demo-importer/rt-demo-importer.php', array( $this, 'add_action_links' )); // Link from plugins page
        add_filter('rt_demo_installer_warning', array( $this, 'data_loss_warning' ));
        add_filter('fw:ext:backups-demo:demos', array( $this, 'demo_config' ));
        add_action('fw:ext:backups:tasks:success:id:demo-content-install', array( $this, 'after_demo_install' ));
    }

    public function add_action_links($links)
    {
        $mylinks = array(
            '<a href="' . esc_url(admin_url('tools.php?page=fw-backups-demo-content')) . '">'.__('Install Demo Contents', 'digeco-core').'</a>',
        );
        return array_merge($links, $mylinks);
    }

    public function data_loss_warning($links)
    {
        $html  = '<div style="margin-top:20px;color:#f00;font-size:20px;line-height:1.3;font-weight:600;margin-bottom:40px;border-color: #f00;border-style: dashed;border-width: 1px 0;padding:10px 0;">';
        $html .= __('Warning: All your old data will be lost if you install One Click demo data from here, so it is suitable only for a new website.', 'digeco-core');
        $html .= '</div>';
        return $html;
    }

    public function demo_config($demos)
    {
        $demos_array = array(
            'demo1' => array(
                'title' => __('Home 1', 'digeco-core'),
                'screenshot' => plugins_url('screenshots/screenshot1.jpg', __FILE__),
                'preview_link' => 'https://radiustheme.com/demo/wordpress/themes/digeco/',
            ),       
            'demo2' => array(
                'title' => __('Home 2', 'digeco-core'),
                'screenshot' => plugins_url('screenshots/screenshot2.jpg', __FILE__),
                'preview_link' => 'https://radiustheme.com/demo/wordpress/themes/digeco/home-2/',
            ),
            'demo3' => array(
                'title' => __('Home 3', 'digeco-core'),
                'screenshot' => plugins_url('screenshots/screenshot3.jpg', __FILE__),
                'preview_link' => 'https://radiustheme.com/demo/wordpress/themes/digeco/home-3/',
            ),
            'demo4' => array(
                'title' => __('Home 4', 'digeco-core'),
                'screenshot' => plugins_url('screenshots/screenshot4.jpg', __FILE__),
                'preview_link' => 'https://radiustheme.com/demo/wordpress/themes/digeco/home-4/',
            ),
            'demo5' => array(
                'title' => __('Home 5', 'digeco-core'),
                'screenshot' => plugins_url('screenshots/screenshot5.jpg', __FILE__),
                'preview_link' => 'https://radiustheme.com/demo/wordpress/themes/digeco/home-5/',
            ),
            'demo6' => array(
                'title' => __('Home 6', 'digeco-core'),
                'screenshot' => plugins_url('screenshots/screenshot6.jpg', __FILE__),
                'preview_link' => 'https://radiustheme.com/demo/wordpress/themes/digeco/home-6/',
            ),
            'demo7' => array(
                'title' => __('Home 7', 'digeco-core'),
                'screenshot' => plugins_url('screenshots/screenshot7.jpg', __FILE__),
                'preview_link' => 'https://radiustheme.com/demo/wordpress/themes/digeco/home-7/',
            ),
            'demo8' => array(
                'title' => __('Home 8', 'digeco-core'),
                'screenshot' => plugins_url('screenshots/screenshot8.jpg', __FILE__),
                'preview_link' => 'https://radiustheme.com/demo/wordpress/themes/digeco/home-8/',
            ),
            'demo9' => array(
                'title' => __('Home 9', 'digeco-core'),
                'screenshot' => plugins_url('screenshots/screenshot9.jpg', __FILE__),
                'preview_link' => 'https://radiustheme.com/demo/wordpress/themes/digeco/home-9/',
            ),
            'demo10' => array(
                'title' => __('Home 10', 'digeco-core'),
                'screenshot' => plugins_url('screenshots/screenshot10.jpg', __FILE__),
                'preview_link' => 'https://radiustheme.com/demo/wordpress/themes/digeco/home-10/',
            ),
            'demo11' => array(
                'title' => __('Home 11', 'digeco-core'),
                'screenshot' => plugins_url('screenshots/screenshot11.jpg', __FILE__),
                'preview_link' => 'https://radiustheme.com/demo/wordpress/themes/digeco/home-11/',
            ),
            'demo12' => array(
                'title' => __('Home 12', 'digeco-core'),
                'screenshot' => plugins_url('screenshots/screenshot12.jpg', __FILE__),
                'preview_link' => 'https://radiustheme.com/demo/wordpress/themes/digeco/home-12/',
            ), 
            'demo13' => array(
                'title' => __('Home 13', 'digeco-core'),
                'screenshot' => plugins_url('screenshots/screenshot13.jpg', __FILE__),
                'preview_link' => 'https://radiustheme.com/demo/wordpress/themes/digeco/home-13/',
            ),
            'demo14' => array(
                'title' => __('Home 14', 'digeco-core'),
                'screenshot' => plugins_url('screenshots/screenshot14.jpg', __FILE__),
                'preview_link' => 'https://radiustheme.com/demo/wordpress/themes/digeco/home-14/',
            ),
            'demo15' => array(
                'title' => __('Home 15', 'digeco-core'),
                'screenshot' => plugins_url('screenshots/screenshot15.jpg', __FILE__),
                'preview_link' => 'https://radiustheme.com/demo/wordpress/themes/digeco/home-15/',
            ),
            'demo16' => array(
                'title' => __('Home 16', 'digeco-core'),
                'screenshot' => plugins_url('screenshots/screenshot16.jpg', __FILE__),
                'preview_link' => 'https://radiustheme.com/demo/wordpress/themes/digeco/home-16/',
            ),
            'demo17' => array(
                'title' => __('Home 1 ( One Page )', 'digeco-core'),
                'screenshot' => plugins_url('screenshots/screenshot1.jpg', __FILE__),
                'preview_link' => 'https://radiustheme.com/demo/wordpress/themes/digeco/home1-one-page/',
            ),
            'demo18' => array(
                'title' => __('Home 2 ( One Page )', 'digeco-core'),
                'screenshot' => plugins_url('screenshots/screenshot2.jpg', __FILE__),
                'preview_link' => 'https://radiustheme.com/demo/wordpress/themes/digeco/home2-one-page/',
            ),
            'demo19' => array(
                'title' => __('Home 3 ( One Page )', 'digeco-core'),
                'screenshot' => plugins_url('screenshots/screenshot3.jpg', __FILE__),
                'preview_link' => 'https://radiustheme.com/demo/wordpress/themes/digeco/home3-one-page/',
            ),
            'demo20' => array(
                'title' => __('Home 4 ( One Page )', 'digeco-core'),
                'screenshot' => plugins_url('screenshots/screenshot4.jpg', __FILE__),
                'preview_link' => 'https://radiustheme.com/demo/wordpress/themes/digeco/home4-one-page/',
            ),
            'demo21' => array(
                'title' => __('Home 6 ( One Page )', 'digeco-core'),
                'screenshot' => plugins_url('screenshots/screenshot6.jpg', __FILE__),
                'preview_link' => 'https://radiustheme.com/demo/wordpress/themes/digeco/home6-one-page/',
            ),
            'demo22' => array(
                'title' => __('Home 7 ( One Page )', 'digeco-core'),
                'screenshot' => plugins_url('screenshots/screenshot7.jpg', __FILE__),
                'preview_link' => 'https://radiustheme.com/demo/wordpress/themes/digeco/home7-one-page/',
            ),
            'demo23' => array(
                'title' => __('Home 8 ( One Page )', 'digeco-core'),
                'screenshot' => plugins_url('screenshots/screenshot8.jpg', __FILE__),
                'preview_link' => 'https://radiustheme.com/demo/wordpress/themes/digeco/home8-one-page/',
            ),
            'demo24' => array(
                'title' => __('Home 9 ( One Page )', 'digeco-core'),
                'screenshot' => plugins_url('screenshots/screenshot9.jpg', __FILE__),
                'preview_link' => 'https://radiustheme.com/demo/wordpress/themes/digeco/home9-one-page/',
            ),
            'demo25' => array(
                'title' => __('Home 10 ( One Page )', 'digeco-core'),
                'screenshot' => plugins_url('screenshots/screenshot10.jpg', __FILE__),
                'preview_link' => 'https://radiustheme.com/demo/wordpress/themes/digeco/home10-one-page/',
            ),
            'demo26' => array(
                'title' => __('Home 11 ( One Page )', 'digeco-core'),
                'screenshot' => plugins_url('screenshots/screenshot11.jpg', __FILE__),
                'preview_link' => 'https://radiustheme.com/demo/wordpress/themes/digeco/home11-one-page/',
            ),
            'demo27' => array(
                'title' => __('Home 12 ( One Page )', 'digeco-core'),
                'screenshot' => plugins_url('screenshots/screenshot12.jpg', __FILE__),
                'preview_link' => 'https://radiustheme.com/demo/wordpress/themes/digeco/home12-one-page/',
            ),
            'demo28' => array(
                'title' => __('Home 13 ( One Page )', 'digeco-core'),
                'screenshot' => plugins_url('screenshots/screenshot13.jpg', __FILE__),
                'preview_link' => 'https://radiustheme.com/demo/wordpress/themes/digeco/home13-one-page/',
            ),
            'demo29' => array(
                'title' => __('Home 14 ( One Page )', 'digeco-core'),
                'screenshot' => plugins_url('screenshots/screenshot14.jpg', __FILE__),
                'preview_link' => 'https://radiustheme.com/demo/wordpress/themes/digeco/home14-one-page/',
            ),
            'demo30' => array(
                'title' => __('Home 15 ( One Page )', 'digeco-core'),
                'screenshot' => plugins_url('screenshots/screenshot15.jpg', __FILE__),
                'preview_link' => 'https://radiustheme.com/demo/wordpress/themes/digeco/home15-one-page/',
            ),
            'demo31' => array(
                'title' => __('Home 16 ( One Page )', 'digeco-core'),
                'screenshot' => plugins_url('screenshots/screenshot16.jpg', __FILE__),
                'preview_link' => 'https://radiustheme.com/demo/wordpress/themes/digeco/home16-one-page/',
            ),
 
        );

        $download_url = 'http://demo.radiustheme.com/wordpress/demo-content/digeco/';

        foreach ($demos_array as $id => $data) {
            $demo = new FW_Ext_Backups_Demo($id, 'piecemeal', array(
                'url' => $download_url,
                'file_id' => $id,
            ));

            $demo->set_title($data['title']);
            $demo->set_screenshot($data['screenshot']);
            $demo->set_preview_link($data['preview_link']);

            $demos[ $demo->get_id() ] = $demo;

            unset($demo);
        }

        return $demos;
    }

    public function after_demo_install($collection)
    {
        // Update front page id
        $demos = array(
            'demo1'  => 126,
            'demo2'  => 128,
            'demo3'  => 130,
            'demo4'  => 132,
            'demo5'  => 134,
            'demo6'  => 2862,
            'demo7'  => 2958,
            'demo8'  => 3019,
            'demo9'  => 3045,
            'demo10'  => 3054,
            'demo11'  => 3174,
            'demo12'  => 3250,
            'demo13'  => 3412,
            'demo14'  => 3948,
            'demo15'  => 3964,
            'demo16'  => 3979,
            'demo17'  => 2771,
            'demo18'  => 2787,
            'demo19'  => 2805,
            'demo20'  => 2821,
            'demo21'  => 2873,
            'demo22'  => 2960,
            'demo23'  => 3112,
            'demo24'  => 3113,
            'demo25'  => 3116,
            'demo26'  => 3177,
            'demo27'  => 3289,
            'demo28'  => 3735,
            'demo29'  => 4064,
            'demo30'  => 4065,
            'demo31'  => 4066,
        );

        $data = $collection->to_array();

        foreach ($data['tasks'] as $task) {
            if ($task['id'] == 'demo:demo-download') {
                $demo_id = $task['args']['demo_id'];
                $page_id = $demos[$demo_id];
                update_option('page_on_front', $page_id);
                flush_rewrite_rules();
                break;
            }
        }

        // Update contact form 7 email
        $cf7ids = array( 1680, 1711 );
        foreach ($cf7ids as $cf7id) {
            $mail = get_post_meta($cf7id, '_mail', true);
            $mail['recipient'] = get_option('admin_email');

            if (class_exists('WPCF7_ContactFormTemplate')) {
                $pattern = "/<[^@\s]*@[^@\s]*\.[^@\s]*>/"; // <email@email.com>
                $replacement = '<'. WPCF7_ContactFormTemplate::from_email().'>';
                $mail['sender'] = preg_replace($pattern, $replacement, $mail['sender']);
            }
            
            update_post_meta($cf7id, '_mail', $mail);
        }

        // Update WooCommerce emails
        $admin_email = get_option('admin_email');
        update_option('woocommerce_email_from_address', $admin_email);
        update_option('woocommerce_stock_email_recipient', $admin_email);
    }
}

new Demo_Importer;
