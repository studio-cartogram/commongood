<?php

get_template_part('partials/head');

// get_template_part('partials/analytics');

get_header();

echo '<main id="main" role="main" class="main">';

echo '<div id="barba-wrapper">';

  echo '<div class="barba-container">';

    get_template_part('partials/featured');

    echo '<div id="js-videos" class="row row--full thumbnails js-videos">';

      set_query_var( 'context', 'thumbnail' );

      get_template_part('partials/loop');

    echo '</div>';

  echo '</div>';

echo '</div>';

echo '</main>';

get_footer();

get_template_part('partials/foot');
