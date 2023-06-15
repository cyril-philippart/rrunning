<?php
/**
 * The Template for displaying all single products
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see         https://docs.woocommerce.com/document/template-structure/
 * @package     WooCommerce\Templates
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}
get_header(); 
echo '<style>.background { height: 250px; }</style>';
echo '<style>.container-taxonomy-product {padding-top: 20px;}</style>';
?>
</div>
<div class="container mb-5">
	<div class="row m-0">
		<div class="col-md-12">
			<?php do_action( 'woocommerce_before_main_content' ); ?>
			<?php woocommerce_content();?>
		</div>
	</div>
</div>

<?php get_footer();?>
