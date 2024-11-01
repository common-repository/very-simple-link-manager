<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Register VS Link Manager block in the backend.
 *
 * @since 2.3
 */
function vslm_register_block() {
	$attributes = array(
		'listType' => array(
			'type' => 'string'
		),
		'shortcodeSettings' => array(
			'type' => 'string'
		),
		'noNewChanges' => array(
			'type' => 'boolean'
		),
		'executed' => array(
			'type' => 'boolean'
		)
	);
	register_block_type(
		'vslm/vslm-block',
		array(
			'attributes' => $attributes,
			'render_callback' => 'vslm_get_link_manager'
		)
	);
}
add_action( 'init', 'vslm_register_block' );

/**
 * Load VS Link Manager block scripts.
 *
 * @since 2.3
 */
function vslm_enqueue_block_editor_assets() {
	wp_enqueue_style(
		'vslm-style',
		plugins_url('/css/vslm-style.min.css',__FILE__ )
	);
	wp_enqueue_script(
		'vslm-block-script',
		plugins_url( '/js/vslm-block.js' , __FILE__ ),
		array( 'wp-blocks', 'wp-i18n', 'wp-element' ),
		false,
		true
	);
	$dataL10n = array(
		'title' => esc_html__( 'VS Link Manager', 'very-simple-link-manager' ),
		'addSettings' => esc_html__( 'Settings', 'very-simple-link-manager' ),
		'listTypeLabel' => esc_html__( 'Columns', 'very-simple-link-manager' ),
		'listTypes' => array(
			array(
				'id' => 'four',
				'label' => esc_html__( 'Four columns', 'very-simple-link-manager' )
			),
			array(
				'id' => 'three',
				'label' => esc_html__( 'Three columns', 'very-simple-link-manager' )
			),
			array(
				'id' => 'two',
				'label' => esc_html__( 'Two columns', 'very-simple-link-manager' )
			),
			array(
				'id' => 'one',
				'label' => esc_html__( 'One column', 'very-simple-link-manager' )
			),
			array(
				'id' => 'disable',
				'label' => esc_html__( 'Disable', 'very-simple-link-manager' )
			)
		),
		'shortcodeSettingsLabel' => esc_html__( 'Attributes', 'very-simple-link-manager' ),
		'example' => esc_html__( 'Example', 'very-simple-link-manager' ),
		'previewButton' => esc_html__( 'Apply changes', 'very-simple-link-manager' ),
		'linkText' => esc_html__( 'For info and available attributes', 'very-simple-link-manager' ),
		'linkLabel' => esc_html__( 'click here', 'very-simple-link-manager' )
	);
	wp_localize_script(
		'vslm-block-script',
		'vslm_block_l10n',
		$dataL10n
	);
}
add_action( 'enqueue_block_editor_assets', 'vslm_enqueue_block_editor_assets' );

/**
 * Get shortcode with attributes to display in a VS Link Manager block.
 *
 * @since 2.3
 */
function vslm_get_link_manager( $attr ) {
	$return = '';
	if ( isset( $attr['listType'] ) ) {
		if ( $attr['listType'] == 'disable' ) {
			$list_type = 'columns="0"';
		} else if ( $attr['listType'] == 'one' ) {
			$list_type = 'columns="1"';
		} else if ( $attr['listType'] == 'two' ) {
			$list_type = 'columns="2"';
		} else if ( $attr['listType'] == 'three' ) {
			$list_type = 'columns="3"';
		} else if ( $attr['listType'] == 'four' ) {
			$list_type = 'columns="4"';
		}
	} else {
		$list_type = 'columns="4"';
	}
	$shortcode_settings = isset( $attr['shortcodeSettings'] ) ? $attr['shortcodeSettings'] : '';
	$shortcode_settings = str_replace( array( '[', ']' ), '', $shortcode_settings );
	$return .= do_shortcode( '[links ' . $shortcode_settings . ' ' . $list_type .']' );
	return $return;
}
