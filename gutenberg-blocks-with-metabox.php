<?php
/** @noinspection PhpUnused */

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://booskills.com/rao
 * @since             1.0.0
 * @package           GutenbergBlocksWithMetabox
 *
 * @wordpress-plugin
 * Plugin Name:       Gutenberg Blocks with Metabox
 * Plugin URI:        https://boospot.com/
 * Description:       This is a test plugin to create Gutenberg blocks with Metabox.io
 * Requires PHP:      7.0
 * Requires at least: 5.0
 * Tested up to:      5.7
 * Version:           1.0.0
 * Author:            Rao
 * Author URI:        https://booskills.com/rao
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       gutenberg-blocks-with-metabox
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Currently plugin version.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
define( 'GUTENBERG_BLOCKS_WITH_METABOX_VERSION', '1.0.0' );

define( 'GUTENBERG_BLOCKS_WITH_METABOX_NAME', 'gutenberg-blocks-with-metabox' );

/**
 * Plugin base name.
 * used to locate plugin resources primarily code files
 * Start at version 1.0.0
 */
/** @noinspection PhpUnused */
define( 'GUTENBERG_BLOCKS_WITH_METABOX_BASE_NAME', basename( __FILE__ ) );


/**
 * Plugin base dir path.
 * used to locate plugin resources primarily code files
 * Start at version 1.0.0
 */
/** @noinspection PhpUnused */
define( 'GUTENBERG_BLOCKS_WITH_METABOX_DIR_PATH', plugin_dir_path( __FILE__ ) );

/**
 * Plugin url to access its resources through browser
 * used to access assets images/css/js files
 * Start at version 1.0.0
 */
/** @noinspection PhpUnused */
define( 'GUTENBERG_BLOCKS_WITH_METABOX_URL_PATH', plugin_dir_url( __FILE__ ) );

/**
 * Composer Auto Loader
 */
require_once 'vendor/autoload.php';


/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-skeleton-activator.php
 */
function gutenberg_blocks_with_metabox_activate() {
	GutenbergBlocksWithMetabox\Activator::activate();

}

register_activation_hook( __FILE__, 'gutenberg_blocks_with_metabox_activate' );
/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-skeleton-deactivator.php
 */
function gutenberg_blocks_with_metabox_deactivate() {
	GutenbergBlocksWithMetabox\Deactivator::deactivate();
}

register_deactivation_hook( __FILE__, 'gutenberg_blocks_with_metabox_deactivate' );

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function gutenberg_blocks_with_metabox() {

	return GutenbergBlocksWithMetabox\Init::get_instance();

}

gutenberg_blocks_with_metabox();