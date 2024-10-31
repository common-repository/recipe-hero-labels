<?php
/**
 * Plugin Name: Recipe Hero Labels
 * Plugin URI: http://recipehero.in/
 * Description: Adds a settings tab to Recipe Hero that allows you to customize the labels used by the plugin.
 * Author: Recipe Hero / Bryce Adams
 * Author URI: http://recipehero.in/
 * Version: 1.0.0
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program. If not, see <http://www.gnu.org/licenses/>.
 *
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Check if WooCommerce is active
 **/
if ( in_array( 'recipe-hero/recipe-hero.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {

	// Load plugin text domain
	add_action( 'init', 'rhl_load_textdomain' );

	// Load up...
	require_once( plugin_dir_path( __FILE__ ) . 'includes/class-rhl-labels.php' );

	// Vroom.. Vroom..
	add_action( 'plugins_loaded', array( 'RHL_Labels', 'get_instance' ) );
	add_filter( 'recipe_hero_get_settings_pages', 'rhl_settings_page' );

} else {

	add_action( 'admin_notices', 'rhl_rh_deactivated' );

}

/**
* Recipe Here Include Settings
**/
if ( ! function_exists( 'rhl_settings_page' ) ) {
	function rhl_settings_page( $settings ) {
		$settings[] = include( 'includes/class-rhl-settings.php' );
		return $settings;
	}
}

/**
 * Load the plugin text domain for translation.
 *
 * @return void
 */
if ( ! function_exists( 'rhl_load_textdomain' ) ) {
	function rhl_load_textdomain() {
		$locale = apply_filters( 'plugin_locale', get_locale(), 'recipe-hero-labels' );

		load_textdomain( 'recipe-hero-labels', trailingslashit( WP_LANG_DIR ) . 'recipe-hero-video/recipe-hero-labels-' . $locale . '.mo' );
		load_plugin_textdomain( 'recipe-hero-labels', false, dirname( plugin_basename( __FILE__ ) ) . '/languages/' );
	}
}

/**
* Recipe Hero Deactivated Notice
**/
if ( ! function_exists( 'rhl_rh_deactivated' ) ) {
	function rhl_rh_deactivated() {
		echo '<div class="error"><p>' . sprintf( __( 'Recipe Hero Labels requires %s to be installed and active.', 'recipe-hero-labels' ), '<a href="http://www.recipehero.in/" target="_blank">Recipe Hero</a>' ) . '</p></div>';
	}
}