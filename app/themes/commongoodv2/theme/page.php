<?php

get_template_part('partials/head');

// get_template_part('partials/analytics');

get_header();

get_template_part('partials/nav');

echo '<main id="main" role="main" class="main">';

echo '<div id="barba-wrapper">';

  echo '<div class="barba-container">';

  while ( have_posts() ) : the_post();

    echo '<div class="page page--' . $post->post_name . '">';

      get_template_part('partials/page-header');

      echo '<div class="page__content row">';

        echo '<div class="column column-6 ">';

        the_content();

        echo '</div>';

        echo '<div class="column column-3">';

        echo '<h3 class="secondary">People</h3>';

        if( have_rows('people') ):

          while( have_rows('people') ): the_row(); 

            $name = get_sub_field('name');
            $role = get_sub_field('role');
            $phone = get_sub_field('phone');
            $email = get_sub_field('email');

            echo '<ul class="soft-duo--bottom list list--vertical">';

              echo '<li><a class="link" href="mailto:' . $email . '">' . $name . '</a></li>';
              echo '<li><a class="link is-active" href="mailto:' . $email . '">' . $name . '</a></li>';
              echo '<li><a class="link link--secondary" href="mailto:' . $email . '">' . $name . '</a></li>';
              echo '<li><a class="link link--secondary is-active" href="mailto:' . $email . '">' . $name . '</a></li>';

              echo '<li>' . $role . '</li>';

              echo '<li>' . $phone . '</li>';

            echo '</ul>';

          endwhile;

        endif;

        echo '</div>';

        echo '<div class="column column-3">';

        echo '<h4>Address</h4>';
        echo '<h4>Representation</h4>';

        echo '</div>';

      echo '</div>';

    echo '</div>';

  endwhile;

  echo '</div>';

echo '</div>';

echo '</main>';

get_footer();

get_template_part('partials/curtain');

get_template_part('partials/foot');

?>
