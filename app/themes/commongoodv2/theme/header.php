<?php
global $language;

$nav_primary = array(
    'theme_location'  => 'nav_primary',
    'container'       => false,
    'items_wrap'      => '%3$s',
);

echo '<header role="banner" class="header">';

  echo '<div class="header__group header__group--reverse">';

    echo '<div class="spinner">';

      echo '<span class="loading open-circle"></span>';

    echo '</div>';

    echo '<div class="js-nav-toggle hamburger nav-toggle">';

      echo '<span class="line"></span>';
      echo '<span class="line"></span>';
      echo '<span class="line"></span>';

    echo '</div>';

  echo '</div>';

  echo '<div class="header__group header__group--right">';

    echo '<a href="' . get_bloginfo('url') . '" class="logo">';

    echo '<span class="visuallyhidden">' . get_bloginfo('name') . '</span>';

      set_query_var( 'icon', 'logo' );

      get_template_part('partials/icon');

    echo '</a>';

    echo '<span class="header__item spinner">Loading</span>';

  echo '</div>';

echo '</header>';

echo '<nav class="nav js-nav">';

  echo '<ul class="nav__list list">';

    wp_nav_menu( $nav_primary );

  echo '</ul>';

echo '</nav>';
