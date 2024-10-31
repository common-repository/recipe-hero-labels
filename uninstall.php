<?php
/**
 * Runs on Uninstall of Recipe Hero Labels (deleted through WordPress admin)
 *
 * @package   Recipe Hero Labels
 * @author    Captain Theme <info@captaintheme.com>
 * @license   GPL-2.0+
 * @link      http://captaintheme.com
 * @copyright 2014 Captain Theme
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

$options = array(
	'rhl_serves',
	'rhl_equipment',
	'rhl_preptime',
	'rhl_cooktime',
	'rhl_cuisine',
	'rhl_course',
);

foreach ( $options as $option ) {
	if ( get_option( $option ) ) {
		delete_option( $option );
	}
}