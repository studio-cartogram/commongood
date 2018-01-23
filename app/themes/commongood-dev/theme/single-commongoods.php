<?php

$title = get_the_title();
$siteUrl = get_site_url();

get_template_part('partials/head');

get_template_part('partials/analytics');

get_header();

get_template_part('partials/nav');

echo '<main id="main" role="main" class="main">';

echo '<div id="barba-wrapper">';

  echo '<div class="barba-container" data-namespace="single">';

  while ( have_posts() ) : the_post();

    echo '<div class="work">';

      echo '<div class="work__header">';

        echo '<span class="alpha inline-block">' . $title . '</span>';

        echo '<a href="'. $siteUrl .'/commongood" class="epsilon inline-block">';
        
        echo 'All Directors</a>';

      echo '</div>';

      get_template_part('partials/work-related-director');

    echo '</div>';

  endwhile;

  echo '</div>';

echo '</div>';

echo '</main>';

get_footer();

get_template_part('partials/curtain');

get_template_part('partials/foot');

?>
