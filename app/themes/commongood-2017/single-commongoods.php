<?php

$reel = get_field('reel');
$title = get_the_title();
$works = get_field('director_works');

get_template_part('partials/head');

get_template_part('partials/analytics');

get_header();

get_template_part('partials/nav');

echo '<main id="main" role="main" class="main">';

echo '<div id="barba-wrapper">';

  echo '<div class="barba-container" data-namespace="works">';

    echo '<div class="work">';

      echo '<section class="row work__header">';

        echo '<span class="alpha inline-block ">' . $title . '</span>';

      echo '</section>';

      get_template_part('partials/work-header');

      echo '<div class="work__video">';

        echo '<div style="padding-bottom: 56%;" class="ratio-container">';

          echo '<iframe src="https://player.vimeo.com/video/' . $reel . '?autoplay=1&title=0&color=252328&portrait=0&byline=0"" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>';

        echo '</div>';

      echo '</div>';

      get_template_part('partials/work-prev-next');

      get_template_part('partials/work-footer');

    echo '</div>';


      if( $works ):

        echo '<div id="all-work" class="row row--full thumbnails js-videos">';
        
          foreach( $works as $post):

          setup_postdata($post);

            // clean this up

            $title = get_the_title();
            $client = get_field('client');
            $vimeo_id = get_field('vimeo_id');
            $thumbnail = get_field('thumbnail');

            echo '<a href="' . get_permalink() . '" class="thumbnail column">';

              echo '<div
                style="padding-bottom: 56%;"
                class="ratio-container"
              >';

                echo '<img
                  data-vimeo-id="' . $vimeo_id . '"
                  data-object-fit="cover"
                  class="js-load-vimeo-image thumbnail__img "
                  alt="' . esc_attr(get_the_title()) . '"
                />';

                echo '<img
                  data-object-fit="cover"
                  class="thumbnail__img thumbnail__img--fallback"
                  alt="' . esc_attr(get_the_title()) . '"
                  src="' . $thumbnail . '"
                />';

              echo '</div>';

              echo '<div class="thumbnail__copy">';

                if ($client) : echo '<span class="gamma inline-block">' . $client . '</span> '; endif;

                echo '<span class="gamma inline-block font-weight-regular">' . $title . '</span>';

              echo '</div>';

              echo '<div class="overlay thumbnail__overlay"></div>';

            echo '</a>';

            // end clean this up

            endforeach;

            wp_reset_postdata();
        
        echo '</div>';

      endif;

  echo '</div>';

echo '</div>';

echo '</main>';

get_footer();

get_template_part('partials/curtain');

get_template_part('partials/foot');
