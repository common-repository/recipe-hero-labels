<?php
/**
 * Recipe Hero General Settings
 *
 * @package   Recipe Hero Labels
 * @author    Captain Theme <info@captaintheme.com>
 * @license   GPL-2.0+
 * @link      http://captaintheme.com
 * @copyright 2014 Captain Theme
 * @since     1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

if ( ! class_exists( 'RHL_Settings' ) ) :

/**
 * RHL_Settings
 */
class RHL_Settings extends RH_Settings_Page {

	/**
	 * Constructor.
	 */
	public function __construct() {

		$this->id    = 'rhl-labels';
		$this->label = __( 'Labels', 'recipe-hero-labels' );

		add_filter( 'recipe_hero_settings_tabs_array', array( $this, 'add_settings_page' ), 20 );
		add_action( 'recipe_hero_settings_' . $this->id, array( $this, 'output' ) );
		add_action( 'recipe_hero_settings_save_' . $this->id, array( $this, 'save' ) );
	}

	/**
	 * Get settings array
	 *
	 * @return array
	 */
	public function get_settings() {

		$settings = apply_filters( 'recipe_hero_general_settings', array(

			array( 'title' => __( 'Custom Labels', 'recipe-hero-labels' ), 'type' => 'title', 'desc' => '', 'id' => 'rhl_options' ),

			array(
				'title'    => __( 'Serves', 'recipe-hero-labels' ),
				'id'       => 'rhl_serves',
				'type'     => 'text',
				'default'  => '',
				'placeholder'	=> __( 'Serves', 'recipe-hero-labels' ),
				'class'    => '',
				'css'      => '',
			),

			array(
				'title'    => __( 'Equipment', 'recipe-hero-labels' ),
				'id'       => 'rhl_equipment',
				'type'     => 'text',
				'default'  => '',
				'placeholder'	=> __( 'Equipment', 'recipe-hero-labels' ),
				'class'    => '',
				'css'      => '',
			),

			array(
				'title'    => __( 'Prep Time', 'recipe-hero-labels' ),
				'id'       => 'rhl_preptime',
				'type'     => 'text',
				'default'  => '',
				'placeholder'	=> __( 'Prep Time', 'recipe-hero-labels' ),
				'class'    => '',
				'css'      => '',
			),

			array(
				'title'    => __( 'Cook Time', 'recipe-hero-labels' ),
				'id'       => 'rhl_cooktime',
				'type'     => 'text',
				'default'  => '',
				'placeholder'	=> __( 'Cook Time', 'recipe-hero-labels' ),
				'class'    => '',
				'css'      => '',
			),

			array(
				'title'    => __( 'Cuisine', 'recipe-hero-labels' ),
				'id'       => 'rhl_cuisine',
				'type'     => 'text',
				'default'  => '',
				'placeholder'	=> __( 'Cuisine', 'recipe-hero-labels' ),
				'class'    => '',
				'css'      => '',
			),

			array(
				'title'    => __( 'Course', 'recipe-hero-labels' ),
				'id'       => 'rhl_course',
				'type'     => 'text',
				'default'  => '',
				'placeholder'	=> __( 'Course', 'recipe-hero-labels' ),
				'class'    => '',
				'css'      => '',
			),

			array( 'type' => 'sectionend', 'id' => '' ),

		) );

		return apply_filters( 'recipe_hero_get_settings_' . $this->id, $settings );
	}


	/**
	 * Save settings
	 */
	public function save() {
		$settings = $this->get_settings();

		RH_Admin_Settings::save_fields( $settings );
	}

}

endif;

return new RHL_Settings();