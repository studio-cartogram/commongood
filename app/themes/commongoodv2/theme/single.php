<?php

get_template_part('partials/head');

// get_template_part('partials/analytics');

get_header();

get_template_part('partials/nav');

echo '<main id="main" role="main" class="main">';

echo '<div id="barba-wrapper">';

  echo '<div class="barba-container">';

    echo '<div id="js-videos" class="row row--full js-videos">';

      set_query_var( 'context', 'thumbnail' );

      while ( have_posts() ) : the_post();

        get_template_part('partials/video');

      endwhile;

    echo '</div>';

  echo '</div>';

echo '</div>';

echo '</main>';

get_footer();

get_template_part('partials/curtain');

get_template_part('partials/foot');

?>
