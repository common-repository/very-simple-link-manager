<?php
// disable direct access
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// category container
$output .= '<li class="vslm-cat-list '.esc_attr($vslm_cat->slug).'">';
	// category title
	$output .= '<div class="vslm-cat-name">'.esc_attr($vslm_cat->name).'</div>';
	// category description
	$vslm_cat_description = category_description( $vslm_cat->term_id );
	if ( ($vslm_atts['category_description'] == "true") && !empty($vslm_cat_description) ) {
		$output .= '<div class="vslm-cat-description">'.wp_kses_post( $vslm_cat_description ).'</div>';
	}
	// link list
	$output .= '<ul class="vslm-link-list">';
		// links query
		$bookmarks = get_bookmarks( array(
			'category_name' => $vslm_cat->name,
			'limit' => $vslm_atts['links_per_category'],
			'order' => $vslm_atts['order'],
			'orderby' => $vslm_atts['orderby']
		) );
		foreach ( $bookmarks as $bookmark ) :
			// set rel
			if (!empty($bookmark->link_rel) ) {
				$rel = 'rel="'.$bookmark->link_rel.'"';
			} else {
				$rel = '';
			}
			// set target
			if (!empty($bookmark->link_target) ) {
				$target = 'target="'.$bookmark->link_target.'"';
			} else {
				$target = '';
			}
			// begin link
			$slug = str_replace(' ', '-', strtolower($bookmark->link_name));
			if (!empty($bookmark->link_image) ) {
				$output .= '<li class="vslm-link vslm-li-image '.esc_attr($slug).'">';
			} else {
				$output .= '<li class="vslm-link '.esc_attr($slug).'">';
			}
			// link image
			if (!empty($bookmark->link_image) ) {
				$output .= '<a class="vslm-link-image" href="'.esc_url($bookmark->link_url).'" '.$rel.' title="'.esc_attr($bookmark->link_name).'" '.$target.'><img src="'.esc_url( $bookmark->link_image ).'" alt="'.esc_attr($bookmark->link_name).'"></a>';
			}
			// link title			
			if ( ($vslm_atts['hide_link_title'] == "true") && !empty($bookmark->link_image) ) {
				$output .= '';
			} else {
				$output .= '<a class="vslm-link-name" href="'.esc_url($bookmark->link_url).'" '.$rel.' title="'.esc_attr($bookmark->link_name).'" '.$target.'>'.esc_attr($bookmark->link_name).'</a>';
			}
			// link description
			if ( ($vslm_atts['hide_link_description'] == "true") && !empty($bookmark->link_description) ) {
				$output .= '';
			} else {
				$output .= '<div class="vslm-link-description">'.esc_attr($bookmark->link_description).'</div>';
			}
			// end link
			$output .= '</li>';
		endforeach;
	$output .= '</ul>';
$output .= '</li>';
