<?php
/**
 * Define shortcode [sta_anchor]
 * */
class Shortcode {
	public function __construct() {
		add_shortcode( 'sta_anchor', array( $this, 'define_sta_anchor' ) );
	}
	public function define_sta_anchor( $atts, $content = null ) {
		$pairs = array(
			'id'    => '',   // id of the anchor
			'class' => '',   // CSS class, if provided by user
		);

		$a = shortcode_atts( $pairs, $atts );

		// Sanitize before output
		$sta_id    = esc_attr( $a['id'] );
		$sta_class = esc_attr( $a['class'] );

		// Build the html code.
		$html = '<span id="' . $sta_id . '" class="sta-anchor';

		if ( $sta_class ) {
			$html .= ' ' . $sta_class;
		}

		$html .= '" aria-hidden="true">' . $content . '</span>';

		return $html;
	}
}
