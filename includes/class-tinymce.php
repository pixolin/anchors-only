<?php
class TinyMCE {
	public function __construct() {
		add_action( 'admin_enqueue_scripts', array( $this, 'ao_admin_style' ) );
		add_action( 'admin_head', array( $this, 'ao_tinymce_button' ) );
	}

	public function ao_admin_style() {
		wp_enqueue_style( 'ao-backend', plugins_url( '../css/admin-style.css', __FILE__ ) );
	}
	public function ao_tinymce_button() {
		global $typenow;

		// verify the post type
		$allowedposttypes = array( 'post', 'page' );

		if ( ! in_array( $typenow, $allowedposttypes ) ) {
			return;
		}

		// check user permissions
		if ( ! current_user_can( 'edit_posts' ) && ! current_user_can( 'edit_pages' ) ) {
			return;
		}

		// check if WYSIWYG is enabled
		if ( get_user_option( 'rich_editing' ) === 'true' ) {
			add_filter( 'mce_external_plugins', array( $this, 'ao_add_tinymce_plugin' ) );
			add_filter( 'mce_buttons', array( $this, 'ao_register_my_tc_button' ) );
		}
	}


	public function ao_add_tinymce_plugin( $plugin_array ) {
		$plugin_array['staButton'] = plugins_url( '../js/tinymce-button.js', __FILE__ );
		return $plugin_array;
	}


	public function ao_register_my_tc_button( $buttons ) {
		array_push( $buttons, 'staButton' );
		return $buttons;
	}

}
