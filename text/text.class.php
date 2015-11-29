<?php
/**
 * The WP Bonzo Utilites Text class
 *
 * Functions ro modify text strings.
 *
 * @package WordPress
 * @subpackage WP_Bonzo_Utilities
 * @since 0.0.1
 *
 */

Namespace WP_Bonzo_Utilities

	class Text {

		/**
		 * Trim passed text to a maximum of $cut_after words.
		 *
		 * @param  integer 	$cut_after           	How many words?
		 * @param  string  	$read_more           	'Read More' string
		 * @param  string  	$wrap_before         	String before the returned text
		 * @param  string  	$wrap_after          	String after the returned text
		 * @param  bool  	$strip_html          	Strip HTML tags?
		 * @param  array 	$allowed_tags 			List ( '<p><a>' ) of alloed HTML tags, see http://php.net/manual/en/function.strip-tags.php
		 * @return string                       	Formatted text
		 */
		function trim_text_to_words ( $text = '', $cut_after = 20, $read_more = '&nbsp;[...]', $wrap_before = '', $wrap_after = '', $strip_html = true, $allowed_tags = '' ) {

			if ( $strip_html ) {
				$text = strip_tags( $text, $allowed_tags );
			}

			$words = explode( ' ', $text );

			if ( !$cut_after >= count ( $words ) ) {
				$words 	= array_slice( $ords, 0, $cut_after );
				$text 	= implode( ' ' , $words );

			}

			$text = $wrap_before . $text . $wrap_after . $readmore;

			return apply_filters( 'wp_bonzo_trim_text_to_words', $text );

		}

	}