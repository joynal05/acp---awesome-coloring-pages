<?php get_header(); ?>
<?php
$queried_object = get_queried_object();

$term_id = $queried_object->term_id;
$taxonomy_name = 'pages';
$termchildren = get_term_children( $term_id, $taxonomy_name );
$term_children_count = count($termchildren);

$all_array = array();
$all_array_child = array();

// echo '<pre>';
// print_r($termchildren);
// echo '</pre>';

?>




<div class="acp-section-wrapper acp-archive">
    <div class="acp-container">
        <div class="acp-row">
            <div class="acp-category-area">
                <div class="acp-category-title">
                    <h2><?php echo get_term( $term_id )->name; ?></h2>
                </div>
                <?php if($term_children_count > 0){ ?>

                <div class="acp-category-items-wrapper">
                    
                    <?php                     
                        foreach ( $termchildren as $child ) { 

                            $term1 = get_term_by( 'id', $child, $taxonomy_name );
                            array_push($all_array, $child );
                            $term1_children = get_term_children( $term1->term_id, $taxonomy_name );
                            if (!empty($term1_children)) {
                                array_push($all_array_child, $term1_children[0] );
                            }
                            
                        } 
                        $results = array_diff($all_array, $all_array_child);

                        foreach ( $results as $result ) {
                            $term = get_term_by( 'id', $result, $taxonomy_name ); ?>

                            <?php if($term->parent == $term_id): ?>

                            <a href="<?php echo get_term_link( $result, $taxonomy_name ) ?>" class="acp-category-item">
                                <div class="acp-category-item-image-wrap">
                                    <img src="<?php echo get_term_meta( $result, 'category_image', true); ?>">
                                </div>
                                <h3><?php echo $term->name ; ?></h3>
                            </a>

                            <?php endif; ?>

                    <?php } ?>

                </div>

    

                    <?php echo '</ul>';
                }else{ ?>


                <div class="acp-category-items-wrapper">
                    <?php while ( have_posts() ) : the_post(); ?>
                        <a href="<?php the_permalink(); ?>" class="acp-category-item">
                            <div class="acp-category-item-image-wrap">
                                <img src='<?php the_post_thumbnail_url(); ?>'>
                            </div>
                            <h3><?php the_title(); ?></h3>
                        </a>


                    <?php endwhile; wp_reset_query(); ?>
                </div>

                <?php } ?>

            </div>

        </div>
    </div>
</div>



<?php
get_footer();



// $term_id = 3;
// $image = get_term_meta($term_id, 'category_image', true);
// echo '<img src="'.$image.'" />';