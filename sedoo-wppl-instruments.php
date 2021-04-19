<?php
/**
 * Plugin Name:     Sedoo - Instruments
 * Plugin URI:      https://github.com/sedoo/sedoo-wppl-instruments
 * Description:     Plugin Instruments
 * Author:          Pierre VERT & Nicolas Gruwe - SEDOO DATA CENTER
 * Author URI:      https://www.sedoo.fr 
 * Text Domain:     sedoo-wppl-instruments
 * Domain Path:     /languages
 * Version:         0.0.2
 * GitHub Plugin URI: sedoo/sedoo-wppl-instruments
 * GitHub Branch:     master
 * @package         Sedoo_Wppl_Instruments
 */



include(plugin_dir_path(__FILE__).'inc/sedoo-wppl-instruments-post-type.php');
include(plugin_dir_path(__FILE__).'inc/sedoo-wppl-instruments-taxo.php');
include(plugin_dir_path(__FILE__).'inc/sedoo-wppl-instruments-acf.php');
include(plugin_dir_path(__FILE__).'inc/sedoo-wppl-instruments-block.php');


// PLUGIN ACTIVATION
function sedoo_wppl_instruments_check_other_plugin_on_activate(  ) {
    
    if ( ! function_exists('get_field') ) {        
        add_action( 'admin_init', 'sedoo_instrument_deactivate');
        add_action( 'admin_notices', 'sedoo_instruments_notice');

        //Désactiver le plugin
        function sedoo_instrument_deactivate () {
            deactivate_plugins( plugin_basename( __FILE__ ) );
        }
        
        // Alerter pour expliquer pourquoi il ne s'est pas activé
        function sedoo_instruments_notice () {
            
            echo '<div class="error">Le plugin requiert ACF Pro pour fonctionner <br><strong>Activez ACF Pro ci-dessous</strong> ou <a href=https://wordpress.org/plugins/advanced-custom-fields/> Téléchargez ACF Pro &raquo;</a><br></div>';

            if ( isset( $_GET['activate'] ) ) 
                unset( $_GET['activate'] );	
        }
    }
}
register_activation_hook(__FILE__, 'sedoo_wppl_instruments_check_other_plugin_on_activate');

// USE SINGLE TEMPLATE ON SINGLE INSTRUMENTS
function sedoo_wppl_instrument_register_single_template( $template ) {
    global $post;
    if ( 'sedoo_instruments' === $post->post_type && locate_template( array( 'single-sedoo_instruments.php' ) ) !== $template ) {
        return plugin_dir_path( __FILE__ ) . 'single-sedoo_instruments.php';
    }
    return $template;
}
add_filter( 'single_template', 'sedoo_wppl_instrument_register_single_template' );


// INSTRUMENTS ARCHIVE PAGE

//////////////////////
// alter the taxonomy pages
add_filter ( 'archive_template', 'sedoo_wppl_instruments_change_archive_template' );
function sedoo_wppl_instruments_change_archive_template($taxo_template) {

    global $post;
    if ( is_post_type_archive ( 'sedoo_instruments' ) ) {
		$taxo_template = plugin_dir_path( __FILE__ ) . '/template-parts/taxonomie-template.php';
	}
    return $taxo_template;
}