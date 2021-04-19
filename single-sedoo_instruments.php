<?php
/**
 * template for Research Teams CPT (show post / platform associate by theme taxonomy)
*/

get_header(); 

while ( have_posts() ) : the_post();
?>

<!-- L'AFFICHAGE COMMENCE ICI -->
<?php
if (function_exists('sedoo_wpth_labs_test_if_post_thumbnail_and_display')) {
sedoo_wpth_labs_test_if_post_thumbnail_and_display();
}
// Show title first on mobile
if ((get_field( 'table_content' )) && (function_exists('sedoo_wpth_labs_display_title_on_top_on_mobile'))) {
   sedoo_wpth_labs_display_title_on_top_on_mobile();
}
?>
<div class="single-post single-sedoo-wppl-project">
   <?php // table_content ( value ) 
   if ((get_field( 'table_content' )) && (function_exists('sedoo_wpth_labs_display_sommaire'))) {
      sedoo_wpth_labs_display_sommaire('Sommaire');
   } 
?>


<div id="primary" class="content-area">
        <div class="wrapper-layout">    
            <main id="main" class="site-main">
                <article id="post-<?php the_ID();?>">	
                    <header>
						<div>
							<h1><?php the_title(); ?></h1>
						</div>
	                </header>
                    <section>
                        <?php the_content(); ?>
                    </section>
                </article>
            </main><!-- #main -->
			
			<?php 
				$liste_platforms = get_the_terms( get_the_ID(), 'sedoo-platform-tag' );
				$liste_type_de_mesure = get_the_terms( get_the_ID(), 'sedoo-type-demesures' );
				$liste_themat = get_the_terms( get_the_ID(), 'sedoo-theme-labo' );
				$contact_field = get_field('contact', get_the_ID());
				$mobilite_field = get_field('mobilite', get_the_ID());
			?>

				<aside class="contextual-sidebar">

					<?php 
                            if($contact_field) {
                                echo '<h2>'.__( 'Contact', 'sedoo-wppl-instruments' ).'</h2>';
                                echo '<div class="tag">';
                                echo $contact_field;
                                echo '</div>';
                            }
                            if($liste_platforms) {
                                echo '<h2> '.__( 'Plateformes', 'sedoo-wppl-instruments' ).' </h2>';
                                echo '<div class="tag">';
                                foreach($liste_platforms as $platform) {
                                    echo '<a href="'.get_term_link($platform->term_id).'">'.esc_html($platform->name).'</a>';   
                                }
                                echo '</div>';
                            }
                            if($liste_type_de_mesure) {
                                echo '<h2> '.__( 'Types de mesures', 'sedoo-wppl-instruments' ).' </h2>';
                                echo '<div class="tag">';
                                foreach($liste_type_de_mesure as $type_de_mesure) {
                                    echo '<a href="'.get_term_link($type_de_mesure->term_id).'">'.esc_html($type_de_mesure->name).'</a>';   
                                }
                                echo '</div>';
                            }
                            if($liste_themat) {
                                echo '<h2> '.__( 'Thématiques', 'sedoo-wppl-instruments' ).'  </h2>';
                                echo '<div class="tag">';
                                foreach($liste_themat as $thematique) {
                                    echo '<a href="'.get_term_link($thematique->term_id).'">'.esc_html($thematique->name).'</a>';   
                                }
                                echo '</div>';
                            }
                            if($mobilite_field) {
                                echo '<h2> '.__( 'Mobilité', 'sedoo-wppl-instruments' ).'  </h2>';
                                echo '<div class="tag">';
                                echo $mobilite_field;
                                echo '</div>';
                            }
					?>
				</aside>
		</div>
	</div>
</div>
<?php 
endwhile; 
get_footer();
