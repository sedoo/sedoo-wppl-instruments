<section>
<?php
$blockfilter_type_mesure = get_field('sedoo_instruments_type_de_mesures');
$blockfilter_type_thematique = get_field('sedoo_instruments_thematique_de_recherche');
$blockfilter_platform = get_field('sedoo_instruments_plateforme');
$blockfilter_site = get_field('filter_site');

$tax_query = array('relation' => 'AND');

// ADD THE TAXO TO THE WP_QUERY ARGS IF TAXO ARE SELECTED
if($blockfilter_type_mesure != NULL) {
   
    $tax_query[] = array(
        'taxonomy' => 'sedoo-type-demesures',
        'field'    => 'id',
        'terms'    => $blockfilter_type_mesure,
    );
}
if($blockfilter_type_thematique != NULL) {
    $tax_query[] = array(
        'taxonomy' => 'sedoo-theme-labo',
        'field'    => 'id',
        'terms'    => $blockfilter_type_thematique,
    );
}

if($blockfilter_platform != NULL) {
    ?>

    <figure class="wp-block-table">
        <table class="instrument_table">
        <?php 
        $TableStartDisplayed = 0;
        $FirstTimeInLoop = 1;
        foreach($blockfilter_platform as $platform) {
            if($FirstTimeInLoop == 0) {
                array_pop($tax_query); // remove the last tax query array (the previous platform tag)
            }
            $tax_query[] = array(
                'taxonomy' => 'sedoo-platform-tag',
                'field'    => 'id',
                'terms'    => $platform,
            );
            $args = array(
                'post_type' => 'sedoo_instruments',
                'tax_query' => $tax_query,
                'status'    => 'publish',
                'order' => 'ASC',
                'orderby' => 'title',
                'posts_per_page' => '-1',
            );
            $FirstTimeInLoop = 0;
            $query = new WP_Query( $args );
                if ( $query->have_posts() ) {
                    ?>
                        <?php if($TableStartDisplayed == 0) { ?>
                            <thead>
                                <tr>
                                    <th><?php echo __( 'Instrument', 'sedoo-wppl-instruments' ); ?></th>
                                    <th><?php echo __( 'Thématique', 'sedoo-wppl-instruments' ); ?></th>
                                    <th><?php echo __( 'Type de mesure', 'sedoo-wppl-instruments' ); ?></th>
                                    <th><?php echo __( 'Mobilité', 'sedoo-wppl-instruments' ); ?></th>
                                </tr>
                            </thead>
                            <tbody>
                        <?php $TableStartDisplayed = 1;  } ?>
                            <?php 
                            $platform = get_term( $platform, 'sedoo-platform-tag'  );
                            echo '<tr class="tbl_instru_heading"><td colspan="4">'.$platform->name.'</td></tr>';
                            while ( $query->have_posts() ) {
                                $query->the_post();
                                ?>
                                <tr>
                                    <td><a href="<?php echo get_the_permalink(); ?>"><?php echo the_title(); ?></a></td>
                                    <td>
                                        <?php 
                                            $post_thematique = get_the_terms( get_the_ID(), 'sedoo-theme-labo' );
                                            echo '<ul>';
                                            foreach($post_thematique as $thematique) {
                                                echo '<li>'.$thematique->name.'</li>';
                                            }
                                            echo '</ul>';
                                        ?>
                                    </td>
                                    <td>
                                        <?php 
                                            $post_type_de_mesure = get_the_terms( get_the_ID(), 'sedoo-type-demesures' );
                                            echo '<ul>';
                                            foreach($post_type_de_mesure as $type_mesure) {
                                                echo '<li>'.$type_mesure->name.'</li>';
                                            }
                                            echo '</ul>';
                                        ?>
                                    </td>
                                    <td>
                                        <?php echo get_field('field_6076a65698216', get_the_ID()); /* get mobility (not working with field name, dk why */?>       
                                    </td>
                                </tr>
                                <?php 
                            }
                            ?>
                        </tbody>
                    <?php 
                } 
                ?>
            <?php 
        }
    ?>
</table>
</figure>
    <?php 
    }
    ?>
</section>