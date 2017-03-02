<?php

global $language;

$nav_footer = array(
    'theme_location'  => 'nav_footer',
    'container'       => false,
    'items_wrap'      => '%3$s',
);

echo '<footer class="footer" role="contentinfo">';

    echo '<div class="row">';

        echo '<div class="columns large-order-2 medium-6 large-5 small-12">';

            echo '<nav role="navigation" class="nav--center nav--footer nav--with-seperation nav--small nav--inverted ">';

                echo '<ul class="expanded menu">';

                    wp_nav_menu( $nav_footer );

                echo '</ul>';

            echo '</nav>';

        echo '</div>';

    echo '</div>';

echo '</footer>';
?>
