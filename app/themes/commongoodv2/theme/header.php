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

    echo '<div id="js-toggle--nav" class="hamburger nav-toggle">';

      echo '<span class="line"></span>';
      echo '<span class="line"></span>';
      echo '<span class="line"></span>';

    echo '</div>';

  echo '</div>';

  echo '<div class="header__group">';

    echo '<a href="' . get_bloginfo('url') . '" class="logo">';

    echo '<span class="show-for-sr">' . get_bloginfo('name') . '</span>';

   echo '<svg class="logo__icon icon"><use xlink:href="#logo"></use></svg>';

   // echo '<svg class="icon logo__icon hide-for-large"><use xlink:href="#logo-icon"></use></svg>';

    echo '</a>';

    echo '<span class="header__item spinner">Loading</span>';

  echo '</div>';

echo '</header>';


