<?php
/**
 * Recipe Hero Labels
 *
 * @package   Recipe Hero Labels
 * @author    Captain Theme <info@captaintheme.com>
 * @license   GPL-2.0+
 * @link      http://captaintheme.com
 * @copyright 2014 Captain Theme
 * @since     1.0.0
 */

class RHL_Labels {

	protected static $instance = null;

    function __construct() {
 
 		add_filter( 'rh_label_serves', array( $this, 'label_serves' ) );
 		add_filter( 'rh_label_equipment', array( $this, 'label_equipment' ) );
 		add_filter( 'rh_label_preptime', array( $this, 'label_preptime' ) );
 		add_filter( 'rh_label_cooktime', array( $this, 'label_cooktime' ) );
 		add_filter( 'rh_label_cuisine', array( $this, 'label_cuisine' ) );
 		add_filter( 'rh_label_course', array( $this, 'label_course' ) );

    }

    /**
	 * Start the Class when called
	 */

	public static function get_instance() {
	  // If the single instance hasn't been set, set it now.
	  if ( null == self::$instance ) {
		self::$instance = new self;
	  }
	  return self::$instance;
	}

	/* Serves Text */
	public function label_serves( $label ) {
		$serves = get_option( 'rhl_serves' );
		if ( $serves ) {
			return $serves;
		} else {
			return $label;
		}
	}

	/* Equipment Text */
	public function label_equipment( $label ) {
		$equipment = get_option( 'rhl_equipment' );
		if ( $equipment ) {
			return $equipment;
		} else {
			return $label;
		}
	}

	/* Prep Time Text */
	public function label_preptime( $label ) {
		$preptime = get_option( 'rhl_preptime' );
		if ( $preptime ) {
			return $preptime;
		} else {
			return $label;
		}
	}

	/* Cook Time Text */
	public function label_cooktime( $label ) {
		$cooktime = get_option( 'rhl_cooktime' );
		if ( $cooktime ) {
			return $cooktime;
		} else {
			return $label;
		}
	}

	/* Cuisine Text */
	public function label_cuisine( $label ) {
		$cuisine = get_option( 'rhl_cuisine' );
		if ( $cuisine ) {
			return $cuisine;
		} else {
			return $label;
		}
	}

	/* Course Text */
	public function label_course( $label ) {
		$course = get_option( 'rhl_course' );
		if ( $course ) {
			return $course;
		} else {
			return $label;
		}
	}


}

new RHL_Labels;