<?php
class Adminnotice {
	public function __construct() {
		add_action( 'admin_notices', array( $this, 'warn_sta_active' ) );
	}

	public function warn_sta_active() {
		$class   = 'notice notice-error';
		$message = 'Das Plugin Scroll-to-Anchor ist noch aktiv. Bitte deaktvieren!';
		printf( '<div class="%1$s"><p>%2$s</p></div>', esc_attr( $class ), esc_html( $message ) );
	}
}
