<?php

get_template_part('partials/head');

get_template_part('partials/analytics');

get_header();

get_template_part('partials/nav');

echo '<main id="main" role="main" class="main">';

echo '<div id="barba-wrapper">';

  echo '<div class="barba-container" data-namespace="single">';

  while ( have_posts() ) : the_post();

    echo '<div class="work">';

      get_template_part('partials/work-header');
      get_template_part('partials/work-video');
      get_template_part('partials/work-footer');
      get_template_part('partials/work-prev-next');
      get_template_part('partials/work-related');

    echo '</div>';

  endwhile;

  echo '</div>';

echo '</div>';

echo '</main>';

get_footer();

get_template_part('partials/curtain');

get_template_part('partials/foot');

?>
