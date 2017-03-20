<?php

get_template_part('partials/head');

get_template_part('partials/analytics');

get_header();

get_template_part('partials/nav');

echo '<main id="main" role="main" class="main">';

echo '<div id="barba-wrapper">';

  echo '<div class="barba-container" data-namespace="works">';

    get_template_part('partials/loop-featured');

    echo '<div id="all-work" class="row row--full thumbnails js-videos">';

      set_query_var( 'context', 'thumbnail' );

      get_template_part('partials/loop');

    echo '</div>';

  echo '</div>';

echo '</div>';

echo '</main>';

get_footer();

get_template_part('partials/curtain');

get_template_part('partials/foot');
