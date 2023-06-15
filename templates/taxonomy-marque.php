<?php
get_header();

$terms = get_terms('marque');
echo '<style>.background { height: 340px; }</style>';
echo '<style>.container-taxonomy-product {padding-top: 20px;}</style>';
?>
    <header class="woocommerce-products-header">
		<h1 class="title mb-4">Nos marques</h1>
		<?php
			if ( is_product_category()) {
				woocommerce_taxonomy_archive_description();
			}
		?>
	</header>
</div>

<div class="container mb-5">
	<div class="row m-0">
        <div class="col-md-3"><?php get_sidebar()?></div>
		<div class="col-md-9">
            <?php do_action( 'woocommerce_before_main_content' ); ?>
            <div class="row m-0 mt-4 align-items-center">
                <?php
                   
                    foreach ( $terms as $term ) {
                        $image = get_field('image_marque', $term);
                        $name = $term->name;
                        $link = get_term_link($term->term_id);
                        echo '
                        <a class="col-md-4" href="'.$link.'">
                            <div class="content_sous_categorie position-relative p-2">
                                <img src="' . $image . '" alt="' . $name . '">
                            </div>
                        </a>
                        ';
                    } 
                    
            ?>
            </div>
		</div>
	</div>
</div>
<?php
get_footer();
?>

