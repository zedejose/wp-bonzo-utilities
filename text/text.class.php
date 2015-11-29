<?php
/**
 * The WP Bonzo Utilites Text class
 *
 * Functions to modify text strings.
 *
 * @package WordPress
 * @subpackage WP_Bonzo_Utilities
 * @since 0.0.1
 *
 */

Namespace WP_Bonzo_Utilities;

	class Text {

		/**
		 * Trim passed text to a maximum of $cut_after words.
		 *
		 * @param  string 	$text           		String to parse
		 * @param  integer 	$cut_after           	How many words?
		 * @param  string  	$read_more           	'Read More' string, false if none
		 * @param  string  	$wrap_before         	String before the returned text
		 * @param  string  	$wrap_after          	String after the returned text
		 * @param  bool  	$strip_html          	Strip HTML tags?
		 * @param  array 	$allowed_tags 			List ( '<p><a>' ) of allowed HTML tags, see http://php.net/manual/en/function.strip-tags.php
		 * @return string                       	Formatted text
		 */
		function trim_text_to_words ( $text = '', $cut_after = 20, $read_more = false, $wrap_before = '', $wrap_after = '', $strip_html = true, $allowed_tags = '' ) {

			// Strip HTML, if requested
			if ( $strip_html ) {
				$text = strip_tags( $text, $allowed_tags );
			}

			// Transform text into array
			$words = explode( ' ', $text );

			// Only cut if the string ins't already shorter than the $cut_after
			if ( count ( $words ) >= $cut_after ) {

				// Format Read More
				if ( false !== $read_more ) $read_more = '&nbsp;' . $read_more;
				// Slice to requested words
				$words 	= array_slice( $words, 0, $cut_after );
				// Recompose string, add $read_more
				$text 	= implode( ' ' , $words ) . $read_more;

			}

			// Wrap the string
			$text = $wrap_before . $text . $wrap_after;

			// Apply filters and return
			return apply_filters( 'wp_bonzo_trim_text_to_words', $text );

		}

	}