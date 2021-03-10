<?php

namespace SkeletonPlugin;
/**
 * Fired during plugin activation
 *
 * @link       https://booskills.com/rao
 * @since      1.0.0
 *
 * @package    SkeletonPlugin
 * @subpackage SkeletonPlugin/includes
 */

/**
 * Fired during plugin activation.
 *
 * This class defines all code necessary to run during the plugin's activation.
 *
 * @since      1.0.0
 * @package    SkeletonPlugin
 * @subpackage SkeletonPlugin/includes
 * @author     Rao <rao@booskills.com>
 */
class Activator {

	/**
	 * Short Description. (use period)
	 *
	 * Long Description.
	 *
	 * @since    1.0.0
	 */
	public static function activate() {

		self::check_compatibility();

	}


	/**
	 *
	 */
	public static function check_compatibility() {

		// Version Check
		global $wp_version;

		$php_required = '7.0';
		$wp_required  = '4.8';

		if ( version_compare( PHP_VERSION, $php_required, '<=' ) ) {
			deactivate_plugins( SKELETON_PLUGIN_BASE_NAME );
			wp_die(
				'<p>' .
				sprintf(
					'%s plugin requires PHP %s or higher. You’re still on %s. Please check the official %s to see if you are vulnerable to hacks. Your PHP version can be updated by your hosting company.',
					SKELETON_PLUGIN_NAME,
					$php_required,
					'<strong>' . PHP_VERSION . '</strong>',
					'<a href="https://www.php.net/supported-versions.php" target="_blank">' . esc_html__( 'Supported Versions', 'uschema' ) . '</a>'
				)
				. '</p> <a href="' . admin_url( 'plugins.php' ) . '">' . esc_html__( 'go back', '' ) . '</a>'
			);
		}

		if ( version_compare( $wp_version, $wp_required, '<=' ) ) {
			deactivate_plugins( SKELETON_PLUGIN_BASE_NAME );
			$vulnerability_link = 'https://wpvulndb.com/wordpresses/' . str_replace( ".", "", $wp_version );
			wp_die(
				'<p>' .
				sprintf(
					'%s plugin requires WordPress %s or higher. You’re still on %s. Please go to Dashboard &#9656; Updates to grab the latest version of WordPress. Please check %s to see vulnerabilities in your version of WordPress',
					SKELETON_PLUGIN_NAME,
					$wp_required,
					'<strong>' . $wp_version . '</strong>',
					'<a href="' . $vulnerability_link . '" target="_blank">' . $vulnerability_link . '</a>'
				)
				. '</p> <a href="' . admin_url( 'plugins.php' ) . '">' . esc_html__( 'go back', '' ) . '</a>'
			);
		}

	}


}
