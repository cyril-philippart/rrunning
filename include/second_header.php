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