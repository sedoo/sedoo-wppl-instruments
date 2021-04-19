<?php 
// Register Custom Post Type
function sedoo_instruments_post_type() {

	$labels = array(
		'name'                  => _x( 'Instruments', 'Post Type General Name', 'sedoo-wppl-instruments' ),
		'singular_name'         => _x( 'Instrument', 'Post Type Singular Name', 'sedoo-wppl-instruments' ),
		'menu_name'             => __( 'Instruments', 'sedoo-wppl-instruments' ),
		'name_admin_bar'        => __( 'Instruments', 'sedoo-wppl-instruments' ),
		'archives'              => __( 'Item Archives', 'sedoo-wppl-instruments' ),
		'attributes'            => __( 'Item Attributes', 'sedoo-wppl-instruments' ),
		'parent_item_colon'     => __( 'Parent Item:', 'sedoo-wppl-instruments' ),
		'all_items'             => __( 'All Items', 'sedoo-wppl-instruments' ),
		'add_new_item'          => __( 'Add New Item', 'sedoo-wppl-instruments' ),
		'add_new'               => __( 'Add New', 'sedoo-wppl-instruments' ),
		'new_item'              => __( 'New Item', 'sedoo-wppl-instruments' ),
		'edit_item'             => __( 'Edit Item', 'sedoo-wppl-instruments' ),
		'update_item'           => __( 'Update Item', 'sedoo-wppl-instruments' ),
		'view_item'             => __( 'View Item', 'sedoo-wppl-instruments' ),
		'view_items'            => __( 'View Items', 'sedoo-wppl-instruments' ),
		'search_items'          => __( 'Search Item', 'sedoo-wppl-instruments' ),
		'not_found'             => __( 'Not found', 'sedoo-wppl-instruments' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'sedoo-wppl-instruments' ),
		'featured_image'        => __( 'Featured Image', 'sedoo-wppl-instruments' ),
		'set_featured_image'    => __( 'Set featured image', 'sedoo-wppl-instruments' ),
		'remove_featured_image' => __( 'Remove featured image', 'sedoo-wppl-instruments' ),
		'use_featured_image'    => __( 'Use as featured image', 'sedoo-wppl-instruments' ),
		'insert_into_item'      => __( 'Insert into item', 'sedoo-wppl-instruments' ),
		'uploaded_to_this_item' => __( 'Uploaded to this item', 'sedoo-wppl-instruments' ),
		'items_list'            => __( 'Items list', 'sedoo-wppl-instruments' ),
		'items_list_navigation' => __( 'Items list navigation', 'sedoo-wppl-instruments' ),
		'filter_items_list'     => __( 'Filter items list', 'sedoo-wppl-instruments' ),
	);
	$args = array(
		'label'                 => __( 'Instrument', 'sedoo-wppl-instruments' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'thumbnail' , 'revisions'),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_rest'          => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
	);
	register_post_type( 'sedoo_instruments', $args );

}
add_action( 'init', 'sedoo_instruments_post_type', 0 );