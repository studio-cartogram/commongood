<?php

get_template_part('partials/head');

// get_template_part('partials/analytics');

get_header();

get_template_part('partials/nav');

echo '<main id="main" role="main" class="main">';

echo '<div id="barba-wrapper">';

  echo '<div class="barba-container">';

  while ( have_posts() ) : the_post();

    echo '<div class="static static--' . $post->post_name . '">';

      get_template_part('partials/static-header');
      get_template_part('partials/static-content', $post->post_name);

    echo '</div>';

  endwhile;

  echo '</div>';

echo '</div>';

echo '</main>';

get_footer();

get_template_part('partials/curtain');

get_template_part('partials/foot');

?>
