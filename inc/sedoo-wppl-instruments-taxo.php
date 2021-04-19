<?php 
// Register Custom Taxonomy
function instruments_type_de_mesures() {
    register_taxonomy( 'sedoo-type-demesures', array( 'page', 'sedoo-platform' , 'sedoo_instruments'), array(
		'hierarchical'      => true,
		'public'            => true,
		'show_in_nav_menus' => true,
		'show_ui'           => true,
		'show_admin_column' => true,
		'show_tagcloud'     => true,
		'query_var'         => true,
		'rewrite'           => true,
		'capabilities'      => array(
			'manage_terms'  => 'edit_posts',
			'edit_terms'    => 'edit_posts',
			'delete_terms'  => 'edit_posts',
			'assign_terms'  => 'edit_posts',
		),
		'labels'            => array(
			'name'                       => __( 'Types de mesure', 'sedoo-wppl-instrumentss' ),
			'singular_name'              => _x( 'Type de mesure', 'taxonomy general name', 'sedoo-wppl-instrumentss' ),
			'search_items'               => __( 'Search Instruments', 'sedoo-wppl-instrumentss' ),
			'popular_items'              => __( 'Popular Instruments', 'sedoo-wppl-instrumentss' ),
			'all_items'                  => __( 'All Instruments', 'sedoo-wppl-instrumentss' ),
			'parent_item'                => __( 'Parent Type de mesure', 'sedoo-wppl-instrumentss' ),
			'parent_item_colon'          => __( 'Parent Instrument:', 'sedoo-wppl-instrumentss' ),
			'edit_item'                  => __( 'Edit Type de mesure', 'sedoo-wppl-instrumentss' ),
			'update_item'                => __( 'Update Type de mesure', 'sedoo-wppl-instrumentss' ),
			'view_item'                  => __( 'View Type de mesure', 'sedoo-wppl-instrumentss' ),
			'add_new_item'               => __( 'Add New Type de mesure', 'sedoo-wppl-instrumentss' ),
			'new_item_name'              => __( 'New Type de mesure', 'sedoo-wppl-instrumentss' ),
			'separate_items_with_commas' => __( 'Separate Instruments with commas', 'sedoo-wppl-instrumentss' ),
			'add_or_remove_items'        => __( 'Add or remove Instruments', 'sedoo-wppl-instrumentss' ),
			'choose_from_most_used'      => __( 'Choose from the most used Instruments', 'sedoo-wppl-instrumentss' ),
			'not_found'                  => __( 'No Instruments found.', 'sedoo-wppl-instrumentss' ),
			'no_terms'                   => __( 'No Instruments', 'sedoo-wppl-instrumentss' ),
			'menu_name'                  => __( 'Types de mesure', 'sedoo-wppl-instrumentss' ),
			'items_list_navigation'      => __( 'Instruments list navigation', 'sedoo-wppl-instrumentss' ),
			'items_list'                 => __( 'Instruments list', 'sedoo-wppl-instrumentss' ),
			'most_used'                  => _x( 'Most Used', 'sedoo-Type de mesure', 'sedoo-wppl-instrumentss' ),
			'back_to_items'              => __( '&larr; Back to Type de mesure', 'sedoo-wppl-instrumentss' ),
		),
		'show_in_rest'      => true,
		'rest_base'         => 'sedoo-typedemesures',
		'rest_controller_class' => 'WP_REST_Terms_Controller',
	) );

}
add_action( 'init', 'instruments_type_de_mesures', 0 );
