<?php


function register_sedoo_instruments_block_types() {

    // register a testimonial block.
    acf_register_block_type(array(
        'name'              => 'sedoo_instruments_block',
        'title'             => __('Sedoo Instruments'),
        'description'       => __('Ajoute un tableau des instruments'),
        'enqueue_style'     => plugin_dir_url(__DIR__) . '/template-parts/block/instrumentsblock.css',
        'render_template'   => plugin_dir_path(__FILE__) . '../template-parts/block/instrumentsblock.php',
        'category'          => 'sedoo-block-category',
        'icon'              => 'editor-justify',
        'keywords'          => array( 'instruments', 'sedoo', 'block', 'bloc' ),
    ));
}

// Check if function exists and hook into setup.
if( function_exists('acf_register_block_type') ) {
    add_action('acf/init', 'register_sedoo_instruments_block_types');
}
