<?php
// disable direct access
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// create shortcode
function vslm_shortcode($vslm_atts) {
	// attributes
	$vslm_atts = shortcode_atts(array(
		'class' => '',
		'columns' => '4',
		'include' => '',
		'exclude' => '',
		'hide_empty' => 1,
		'links_per_category' => -1,
		'order' => 'ASC',
		'orderby' => 'name',
		'category_description' => '',
		'hide_link_title' => '',
		'hide_link_description' => '',
		'no_categories_text' => __('No categories found.', 'very-simple-link-manager')
	), $vslm_atts);
	// set class for ul
	if ($vslm_atts['columns'] == '0') {
		$columns = 'vslm-custom';
	} elseif ($vslm_atts['columns'] == '1') {
		$columns = 'vslm-one';
	} elseif ($vslm_atts['columns'] == '2') {
		$columns = 'vslm-two';
	} elseif ($vslm_atts['columns'] == '3') {
		$columns = 'vslm-three';
	} else {
		$columns = 'vslm-four';
	}
	// initialize output
	$output = '';
	// main container
	if ( empty($vslm_atts['class']) ) {
		$custom_class = '';
	} else {
		$custom_class = ' '.sanitize_key($vslm_atts['class']);
	}
	// categories query
	$vslm_cats = get_terms( array(
		'order' => 'ASC',
		'orderby' => 'name',
		'taxonomy' => 'link_category',
		'include' => $vslm_atts['include'],
		'exclude' => $vslm_atts['exclude'],
		'hide_empty' => $vslm_atts['hide_empty']
	) );
	if ( !empty($vslm_cats) && !is_wp_error($vslm_cats) ) {
		$output .= '<ul id="vslm" class="'.$columns.$custom_class.'">';
			foreach ($vslm_cats as $vslm_cat) :
				// include template
				include 'vslm-template.php';
			endforeach;
		$output .= '</ul>';
	} else {
		$output .= '<p class="vslm-no-categories">';
		$output .= esc_attr($vslm_atts['no_categories_text']);
		$output .= '</p>';
	}
	// return output
	return $output;
}
add_shortcode('links', 'vslm_shortcode');
