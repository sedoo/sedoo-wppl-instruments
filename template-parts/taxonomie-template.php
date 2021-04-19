<?php
get_header();
?>
<div id="content-area" class="wrapper archives">
    <main id="main" class="site-main">
        <h1> <?php echo __( 'Instruments', 'sedoo-wppl-instruments' ); ?> </h1>
        <?php 
            $args = array(
                'post_type' => 'sedoo_instruments', 
                'status'    => 'publish'
            );
            $query = new WP_Query( $args );
            $displayed_site = '';
            if ( $query->have_posts() ) {
                ?>
                <figure class="wp-block-table">
                <table class="instrument_table">
                    <thead>
                        <tr>
                            <th><?php echo __( 'Instrument', 'sedoo-wppl-instruments' ); ?></th>
                            <th><?php echo __( 'Plateforme', 'sedoo-wppl-instruments' ); ?></th>
                            <th><?php echo __( 'Thématique', 'sedoo-wppl-instruments' ); ?></th>
                            <th><?php echo __( 'Type de mesure', 'sedoo-wppl-instruments' ); ?></th>
                            <th><?php echo __( 'Mobilité', 'sedoo-wppl-instruments' ); ?></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        while ( $query->have_posts() ) {
                            $query->the_post();
                            ?>
                            <tr>
                                <td><a href="<?php echo get_the_permalink(); ?>"><?php echo the_title(); ?></a></td>
                                <td>
                                    <?php 
                                        $post_platforms = get_the_terms( get_the_ID(), 'sedoo-platform-tag' );
                                        echo '<ul>';
                                        foreach($post_platforms as $platformtag) {
                                            echo '<li>'.$platformtag->name.'</li>';
                                        }
                                        echo '</ul>';
                                    ?>
                                </td>
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
                </table>
                </figure>
                <?php 
            } else {
                echo __( 'Aucun instrument ne correspond.', 'sedoo-wppl-instruments' );
            }
            ?>
    </main><!-- #main -->
</div><!-- #primary -->

<?php 
get_footer();
?>