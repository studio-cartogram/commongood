<?php

$nav_primary = array(
  'theme_location'  => 'nav_primary',
  'container'       => false,
  'items_wrap'      => '%3$s',
);

$nav_social = array(
  'theme_location'  => 'nav_social',
  'container'       => false,
  'items_wrap'      => '%3$s',
);


echo '<nav id="js-nav" class="nav js-nav">';

  echo '<div class="nav__inner">';

    echo '<div class="nav__section">';

    echo '<ul class="nav__list list list--large">';

      wp_nav_menu( $nav_primary );

    echo '</ul>';

    echo '<ul class="nav__list list">';

      wp_nav_menu( $nav_social );

    echo '</ul>';

    echo '</div>';

    echo '<div class="visuallyhidden clearvisuallyhidden--tablet nav__section">';

      echo '<ul class="nav__list nav__list--works list">';

      set_query_var( 'context', 'nav' );

      get_template_part('partials/loop');

      echo '</ul>';

    echo '</div>';

  echo '</div>';


echo '</nav>';

?>
