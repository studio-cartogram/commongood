<?php

$nav_social = array(
    'theme_location'  => 'nav_social',
    'container'       => false,
    'items_wrap'      => '%3$s',
);

$nav_footer = array(
    'theme_location'  => 'nav_footer',
    'container'       => false,
    'items_wrap'      => '%3$s',
);

set_query_var( 'icon', 'logo-icon' );

echo '<footer class="footer row row--full">';

  echo '<nav role="navigation" class="column column-6 footer__nav footer__nav--left">';

    echo '<ul class="list list--spaced-horizontal list--small">';

      wp_nav_menu( $nav_footer );

    echo '</ul>';

  echo '</nav>';

  echo '<nav role="navigation" class="column column-6 footer__nav footer__nav--right">';

    echo '<ul class="list--spaced-horizontal list list--right list--small">';

      wp_nav_menu( $nav_social );

    echo '</ul>';

  echo '</nav>';

  echo '<div class="visuallyhidden clearvisuallyhidden--tablet footer__icon ">';

    get_template_part('partials/icon');

  echo '</div>';


echo '</footer>';
?>
