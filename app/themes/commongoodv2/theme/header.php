<?php
global $language;

$nav_primary = array(
    'theme_location'  => 'nav_primary',
    'container'       => false,
    'items_wrap'      => '%3$s',
);


echo '<header role="banner" class="container header">';

    echo '<div class="row">';

        echo '<div class="columns small-2 medium-1 large-3 medium-order-1">';

            echo '<a href="' . get_bloginfo('url') . '" class="logo">';

                echo '<span class="show-for-sr">' . get_bloginfo('name') . '</span>';

                echo '<svg class="logo__icon icon icon--medium icon--white show-for-large"><use xlink:href="#fsl-logo-' . $language . '"></use></svg>';

                echo '<svg class="icon logo__icon icon--white hide-for-large"><use xlink:href="#fsl-icon"></use></svg>';

            echo '</a>';

        echo '</div>';

        echo '<nav role="navigation" class="nav--global medium-order-3 nav--with-seperation nav--inverted text-right columns">';

        echo '<ul class="menu">';

                wp_nav_menu( $nav_primary );

            echo '</ul>';

        echo '</nav>';

echo '</header>';


