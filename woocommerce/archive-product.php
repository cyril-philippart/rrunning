<?php
/**
 * The Template for displaying product archives, including the main shop page which is a post type archive
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/archive-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.4.0
 */

defined( 'ABSPATH' ) || exit;
$cat_title = single_term_title('', false); 
get_header(); 
?>
		<?php if (is_product_category()) :?>
			<header class="woocommerce-products-header">
				<?php if ( apply_filters( 'woocommerce_show_page_title', true ) ) : ?>
					<h1 class="title mb-4">Notre selection <?= $cat_title ?></h1>
					<?php
						if ( is_product_category()) {
							woocommerce_taxonomy_archive_description();
						}
					?>
				<?php endif; ?>
				<div class="sous-categorie mt-5">
					<?php 
						
						$terms = get_terms( array(
							'taxonomy' => 'product_cat',
							'parent'   => get_term_by( 'name', $cat_title, 'product_cat' )->term_id,
						) );
						if (empty($terms)) {
							echo '<style>.background { height: 430px; }</style>';
							echo '<style>.container-taxonomy-product {padding-top: 20px;}</style>';
						}

						foreach ( $terms as $term ) {
							$thumbnail_id = get_term_meta( $term->term_id, 'thumbnail_id', true );
							$image = wp_get_attachment_url( $thumbnail_id );
							$name = $term->name;
							$link = get_term_link($term->term_id);
							echo '
							<a href="'.$link.'">
								<div class="content_sous_categorie position-relative">
									<div class="overlay">
										<img style="height: 200px;width: 300px;object-fit: cover;" src="' . $image . '" alt="' . $name . '">
										<h3 class="title_sous_categorie">' . $name . '</h3>
									</div>
								</div>
							</a>
							';
						}
					?>
				</div>
			</header>
		<?php endif;?>
		<?php if (is_tax('marque') ) :?>
			<?php
				$term = get_term_by('name', $cat_title, 'marque' );
				echo '<style>.background { height: 430px; }</style>';
				echo '<style>.container-taxonomy-product {padding-top: 20px;}</style>';
			?>
			<header class="woocommerce-products-header">
				<h1 class="title mb-4">Notre selection de la marque <?= $cat_title ?></h1>
				<div class="term-description"><p><?= $term->description ?></p></div>
			</header>
		<?php endif;?>
	</div>
	<div class="container container-taxonomy-product mb-5">
		<div class="row m-0">
			<div class="col-md-3"><?php get_sidebar()?></div>
			<div class="col-md-9">
				<?php do_action( 'woocommerce_before_main_content' ); ?>
				<?php woocommerce_content();?>
			</div>
		</div>
	</div>
<?php get_footer();?>
<script>

	var resultCount = document.querySelector('.woocommerce-result-count');
	var orderingForm = document.querySelector('.woocommerce-ordering');
	var gridListToggle = document.querySelector('nav.gridlist-toggle');

	gridListToggle.appendChild(resultCount);
	gridListToggle.appendChild(orderingForm);

</script>