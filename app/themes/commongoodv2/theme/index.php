<?php

get_template_part('partials/head');

// get_template_part('partials/analytics');

get_header();

echo '<div id="barba-wrapper">';

  echo '<div class="barba-container">';

  echo '<main id="main" role="main" class="main">';

    get_template_part('partials/loop');

  echo '</main>';

  echo '</div>';

echo '</div>';

get_footer();

get_template_part('partials/foot');
