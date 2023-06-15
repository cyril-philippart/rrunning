<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package rrunningcyclepassion
 */

?>
</div> 
	<footer id="colophon" class="site-footer">
		<div class="container">
			<div class="row align-items-center">
				<div class="col-md-4">
					<?php
								wp_nav_menu([
									'theme_location' => 'menu',
									'container' => true,
									'menu_class' => 'nav_menu_footer'
								]);
							?>
				</div>
				<div id="second_nav_menu_footer" class="nav_menu_footer col-md-3">
					<ul>
						<li class="text-uppercase"><a style="text-decoration: none;" href="#">Notre histoire</a></li>
						<li class="text-uppercase"><a style="text-decoration: none;" href="#">Notre point de vente</a></li>
						<li class="text-uppercase"><a style="text-decoration: none;" href="#">Contact</a></li>
					</ul>
				</div>
				<div class="col-md-3"></div>
				<div class="social col-md-2">
					<a href="#"><img src="/wp-content/uploads/2023/04/insta.svg" alt=""></a>
					<a id="facebook" class="mt-3 mb-3" href="#"><img src="/wp-content/uploads/2023/04/facebook.svg" alt=""></a>
					<a href="#"><img src="/wp-content/uploads/2023/04/linkedin-2.svg" alt=""></a>
				</div>
			</div>
		</div>
		<div class="mt-5 pb-5 text-center">
			<span class="copyright">&copy; 2023 rrunningcyclepassion.fr | <a style="text-decoration: none;" class="text-uppercase" href="#">mentions légales</a></span> 
		</div>
	</footer>
</div>

<?php wp_footer(); ?>

</body>
</html>
