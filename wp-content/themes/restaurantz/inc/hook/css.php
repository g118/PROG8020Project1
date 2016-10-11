<?php
/**
 * CSS related hooks.
 *
 * This file contains hook functions which are related to CSS.
 *
 * @package Restaurantz
 */

if ( ! function_exists( 'restaurantz_trigger_custom_css_action' ) ) :

	/**
	 * Do action theme custom CSS.
	 *
	 * @since 1.0.0
	 */
	function restaurantz_trigger_custom_css_action() {

		/**
		 * Hook - restaurantz_action_theme_custom_css.
		 *
		 * @hooked restaurantz_add_option_custom_css - 99
		 */
		do_action( 'restaurantz_action_theme_custom_css' );

	}

endif;

add_action( 'wp_head', 'restaurantz_trigger_custom_css_action', 99 );

if ( ! function_exists( 'restaurantz_add_option_custom_css' ) ) :

	/**
	 * Add custom CSS.
	 *
	 * @since 1.0.0
	 */
	function restaurantz_add_option_custom_css() {

		$custom_css = restaurantz_get_option( 'custom_css' );
		$output = '';
		if ( ! empty( $custom_css ) ) {
			$output = "\n" . '<style type="text/css">' . "\n";
			$output .= wp_strip_all_tags( $custom_css );
			$output .= "\n" . '</style>' . "\n" ;
		}
		echo $output;

	}

endif;

add_action( 'restaurantz_action_theme_custom_css', 'restaurantz_add_option_custom_css', 99 );
