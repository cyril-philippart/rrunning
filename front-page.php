<?php
/**
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package rrunningcyclepassion_theme
 */

get_header();
?>

<p>sous changement 1</p>
    <h1 class="title mb-4">Votre expert vélo running à Grasse et ses environs</h1>
    <div class="text-center pt-4 mt-5">
        <a class="cta_point_de_vente" href="#">
            <img style="width: 40px;" src="/wp-content/uploads/2023/04/store.svg" alt="">
            Notre point de vente à Grasse
        </a>
    </div>
</div>
<div class="coup_de_coeur pt-5 mb-5 pb-5">
    <div class="content_coup_de_coeur text-center mb-5">
        <h2 class="second_title second_title_coup_de_coeur mb-5">Nos produits <span style="color: #f15a23;">coup de coeur</span></h2>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Laudantium rerum est maiores quis pariatur earum, necessitatibus veniam quod dolorem quidem dolore doloribus ad, hic suscipit! Aperiam deleniti nostrum aspernatur eius.</p>
    </div>

    <div class="content_slider">
        <div class="slider_featured_product">
            <?php
                $args = array(
                    'post_type'      => 'product',
                    'tax_query'      => array(
                        array(
                            'taxonomy' => 'product_visibility',
                            'field'    => 'name',
                            'terms'    => 'featured',
                        ),
                    ),
                );
        
                $featured_products = new WP_Query( $args );
        
                if ( $featured_products->have_posts() ) {
                    while ( $featured_products->have_posts() ) {
                        $featured_products->the_post();
                        $terms = get_the_terms( get_the_ID(), 'marque' );
                        if ( ! empty( $terms ) ) {
                            foreach ( $terms as $term ) {
                                echo 
                                '
                                <div class="content_card_featured_product">
                                    <a href="' . get_permalink() . '">
                                        <div class="content_featured_product text-center">
                                            <div class="featured_product_img">' . get_the_post_thumbnail() . '</div>
                                            <p class="featured_product_title text-uppercase fw-bold">' . get_the_title() . ' <span style="color: #f15a23">' . $term->name . '</span></p>
                                        </div>
                                    </a>
                                </div>';
                            }
                        }
                       
                    }
                }
            ?>
        </div>
    </div>
</div>
<div class="last_product mb-5">
    <div class="row m-0">
        <div class="col-md-1"></div>
        <div class="col-md-5 content_news p-5">
            <h2 class="second_title lh-base mb-5">Les dernières <br><span style="color: #f15a23">nouveautés</span></h2>
            <p class="text-uppercase">les derniers arrivages <span style="color: #f15a23">en avant première</span></p>
            <p class="text-uppercase">Des conseils d'expert <span style="color: #f15a23">à chaque instant</span></p>
            <p class="text-uppercase">les meilleurs prix <span style="color: #f15a23">garantie</span></p>
            <p class="text-uppercase">une selection de <span style="color: #f15a23">marques professionnelles</span></p>
        </div>
        <div class="col-md-6">
            <div class="slider_last_product">
                <?php
                    $args = array(
                        'post_type'      => 'product',
                        'orderby'        => 'date',
                        'order'          => 'DESC',
                        'posts_per_page' => 6
                    );
                    
                    $products = new WP_Query( $args );
                    
                    if ( $products->have_posts() ) {
                        while ( $products->have_posts() ) {
                            $products->the_post();
                            $brand = get_the_terms( get_the_ID(), 'marque' );
                            $categories  = get_the_terms( get_the_ID(), 'product_cat' );
                            if ( ! empty( $categories ) ) {
                                ?>
                                    <div class="content_card_featured_product">
                                        <a href="<?= get_permalink() ?>">
                                            <div class="content_featured_product text-center">
                                                <div class="featured_product_img"><?= get_the_post_thumbnail() ?></div>
                                                <p class="featured_product_title fw-bold"><?= get_the_title() .' '. $categories[0]->name ?>
                                                <?php if ($brand) :?>
                                                    - <span style="color: #f15a23"><?= $brand[0]->name?></span>
                                                <?php endif; ?>
                                                </p>
                                            </div>
                                        </a>
                                    </div> 
                                    <?php
                            }
                            wp_reset_postdata();
                        }
                    }
                    
                ?>
            </div>
        </div>
    </div>
</div>
<div class="reviews p-5">
    <h2 class="second_title lh-base mb-5 text-center">Vous donnez <span style="color: #f15a23">votre avis</span></h2>
        <div class="woocommerce star-rating row m-0 text-center">
            <?php 
                $args = array(
                    'post_type' => 'product',
                    'posts_per_page' => 3,
                    'meta_query' => array(
                        array(
                            'key' => '_wc_average_rating', 
                            'value' => 0,
                            'compare' => '!=',
                        ),
                    ),
                );
                
                $products = new WP_Query( $args );

                if ( $products->have_posts() ) {
                    while ( $products->have_posts() ) {
                        $products->the_post();
                        $rating = get_post_meta( get_the_ID(), '_wc_average_rating', true );
                        $rating_html = wc_get_rating_html( $rating );
                        echo '
                        <div class="col-md-4">'.
                            $rating_html.'
                            <a style="text-decoration:none" href="' . get_permalink() . '">
                                <h3 style="font-size: 16px;" class="text-uppercase">' . get_the_title() . '</h3>
                            </a>
                            ';
                        
                        $comments_args = array(
                            'post_id' => get_the_ID(),
                            'status' => 'approve',
                            'meta_query' => array(
                                array(
                                    'key' => 'rating',
                                    'value' => 0,
                                    'compare' => '>',
                                ),
                            ),
                        );
                        $comments = get_comments( $comments_args );
                        if ( ! empty( $comments ) ) {
                            foreach ( $comments as $comment ) {
                                echo '<p class="fst-italic">' . $comment->comment_content . '</p>';
                                echo '<p><strong>' . $comment->comment_author . '</strong></p>';
                            }
                        }
                        echo '
                        <a href="' . get_permalink() . '">
                            <div class="featured_product_img">' . get_the_post_thumbnail() . '</div>
                        </a>
                        </div>'; 
                    }
                    wp_reset_postdata();   
                }
            ?>
        </div>
    
</div>


<?php
get_footer();
