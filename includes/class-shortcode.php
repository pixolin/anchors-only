<?php
/**
 * Define shortcode [sta_anchor]
 * */
class Shortcode {
	public function __construct() {
		add_shortcode( 'sta_anchor', array( $this, 'define_sta_anchor' ) );
		add_action( 'wp_enqueue_scripts', array( $this, 'ao_style' ) );
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

		// and finally return it …
		return $html;
	}

	public function ao_style() {
		wp_register_style( 'aoStylesheet', plugins_url( '../css/ao-style.css', __FILE__ ), false, '0.1.0' );
		wp_enqueue_style( 'aoStylesheet' );
	}
}
