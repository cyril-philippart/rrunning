<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package rrunningcyclepassion
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<script>
	function changeColorToggle(checkboxElement) {
    let activatedClass = 'hamburger_activated';
    if (checkboxElement.checked) {
        content = document.querySelector('#burger_menu');
        content.classList.add(activatedClass);
        content_overlay = document.querySelector('#burger_menu_overlay')
        content_overlay.style.display = 'block'
		button = document.querySelector('.hamburger_button > div')
		button.style.backgroundColor = '#fff'
		button.style.zIndex = '999'
    } else {
        content = document.querySelector('#burger_menu');
        content.classList.remove(activatedClass);
        content_overlay = document.querySelector('#burger_menu_overlay')
        content_overlay.style.display = 'none'
		button = document.querySelector('.hamburger_button > div')
		button.style.backgroundColor = '#303a41'
		button.style.zIndex = 'initial'
    }
    }
</script>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
	<header class="site-header">
		<div class="row m-0 align-items-center">
			<div class="row col-md-3">
				<div class="col-md-6">
					<div class="row">
						<div class="col-1 col-lg-2 text-center"><img class="picto_header" src="http://localhost/rrunningcyclepassion/wp-content/uploads/2023/04/phone.svg" alt=""></div>
						<div class="col-10"><a class="text-decoration-none" href="tel:+33624576770">06 24 57 67 70</a></div>
					</div>
				</div>
				<div class="col-md-6">
					<div class="row">
						<div class="col-1 col-lg-2 text-center"><img class="picto_header" src="http://localhost/rrunningcyclepassion/wp-content/uploads/2023/04/mail.svg" alt=""></div>
						<div class="col-10"><a class="text-decoration-none" href="mailto:grasse.rrunningcyrclepassion@orange.fr">grasse.rrunningcyrclepassion@orange.fr</a></div>
					</div>
				</div>
			</div>
			<div class="col-md-5"></div>
			<div class="row col-md-4">
				<div class="col-md-6">
					<div class="row">
						<?php aws_get_search_form( true ); ?>
					</div>
				</div>
				<?php if (!wp_is_mobile()) :?>
					<div class="col-md-6">
						<div class="row align-items-center">
							<div class="col-md-3"><img class="logo_header" src="http://localhost/rrunningcyclepassion/wp-content/uploads/2023/04/logo-rruning-2.svg" alt=""></div>
							<div class="col-md-9 mb-1"><a class="text-decoration-none text-uppercase" href="#">Notre histoire</a></div>
						</div>
					</div>
				<?php endif; ?>
			</div>
		</div>
	</header>
	<div class="background position-relative mb-5">
    <?php if(wp_is_mobile()) :?>
        <div id="burger_menu">
            <div id="burger_menu_content">
                <?php
                    wp_nav_menu([
                        'theme_location' => 'menu',
                        'container' => true,
                        'menu_class' => 'nav_menu'
                    ]);
                ?>
                <div class="mt-5 pt-5">
					<div class="row align-items-center">
						<div class="col-3"><img class="logo_header" src="http://localhost/rrunningcyclepassion/wp-content/uploads/2023/04/logo-rruning-2.svg" alt=""></div>
						<div class="col-9 mb-1"><a class="text-decoration-none text-uppercase" href="#">Notre histoire</a></div>
					</div>
				</div>
            </div>
        </div> 
        <input type="checkbox" onchange="changeColorToggle(this) "class="toggler">
        <div class="hamburger_button">
            <div></div>
        </div>
        <div id="burger_menu_overlay"></div> 
    <?php else: ?>
        <div class="content_menu">
            <?php
                $logo = get_custom_logo();
                $categories = get_terms( array(
                    'taxonomy'     => 'product_cat',
                    'hide_empty'   => false,
                    'parent'       => 0,
                    'exclude'      => array( get_option( 'default_product_cat' ) ),
                    'orderby'      => 'count',
                    'order'        => 'DESC',
                ));
                
                if ( $categories ) {
                    echo '<ul class="nav_menu">';
                    if ( $logo ) {
                        echo $logo;
                    }
                
                    foreach ( $categories as $category ) {
                        echo '<li class="menu-item-has-children"><a href="' . get_term_link( $category ) . '">' . $category->name . '</a>';
                
                        $subcategories = get_terms( array(
                            'taxonomy'     => 'product_cat',
                            'hide_empty'   => false,
                            'parent'       => $category->term_id,
                            'orderby'      => 'count',
                            'order'        => 'DESC',
                        ));
                
                        if ( $subcategories ) {
                            echo '<ul class="sub-menu sub-menu-custom">';
                
                            foreach ( $subcategories as $subcategory ) {
                                echo '<a href="' . get_term_link( $subcategory ) . '"><li> '. $subcategory->name . '</li></a>';
                            }
                
                            echo '</ul>';
                        }
                
                        echo '</li>';
                    }
                
                    $marques = get_terms( array(
                        'taxonomy'     => 'marque',
                        'hide_empty'   => false,
                        'orderby'      => 'name',
                        'order'        => 'ASC',
                    ));
                
                    if ( $marques ) {
                        echo '<li id="marques" class="menu-item-has-children"><a href="' . get_post_type_archive_link( 'marque' ) . '">Marques</a><ul class="sub-menu sub-menu-custom">';
                
                        foreach ( $marques as $marque ) {
                            echo '<li><a href="' . get_term_link( $marque ) . '">' . $marque->name . '</a></li>';
                        }
                
                        echo '</ul></li>';
                    }
                
                    echo '</ul>';
                }                
            ?>                
        </div>
        <script>
            (function($) {
                jQuery(document).ready(function() {
                    jQuery('.nav_menu .menu-item-has-children').hover(function() {
                        jQuery(this).find('.sub-menu').first().stop(true, true);
                    }, function() {
                        jQuery(this).find('.sub-menu').first().stop(true, true);
                    });
                });
            })(jQuery);
        </script>
    <?php endif;?>