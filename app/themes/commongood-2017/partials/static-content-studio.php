<?php

echo '<div class="static__content row">';

  echo '<div class="column column-6-tablet ">';

    echo '<div class="paragraph--lead">';

      the_content();

    echo '</div>';

  echo '</div>';

  echo '<div class="column column-5-tablet offset-1-tablet">';

  echo '<div class="row">';

    echo '<div class="column column-6-tablet">';

      echo '<h3 class="secondary">People</h3>';

      if( have_rows('people') ):

        while( have_rows('people') ): the_row(); 

          $name = get_sub_field('name');
          $role = get_sub_field('role');
          $phone = get_sub_field('phone');
          $email = get_sub_field('email');

          echo '<ul class="soft-duo--bottom list list--vertical">';

            echo '<li><a class="link" href="mailto:' . $email . '">' . $name . '</a></li>';

            echo '<li>' . $role . '</li>';

            echo '<li>' . $phone . '</li>';

          echo '</ul>';

        endwhile;

      endif;

    echo '</div>';

    echo '<div class="column column-6-tablet">';

      echo '<h3 class="secondary">Address</h3>';

      echo '<p class="soft-duo--bottom">';

      $address_link = get_field('address_link');

      if($address_link) : echo '<a class="" target="_blank" href="' . $address_link . '">'; endif;

        echo get_field('address');

      if($address_link) : echo '</a>'; endif;

      echo '</p>';

      if( have_rows('representation') ):

        echo '<h3 class="secondary">Representation</h3>';

          while( have_rows('representation') ): the_row(); 

            $name = get_sub_field('name');
            $location = get_sub_field('location');
            $website = get_sub_field('website');

            echo '<ul class="soft-duo--bottom list list--vertical">';

              echo '<li><a class="link" target="_blank" href="' . $website . '">' . $name . '</a></li>';

              echo '<li>' . $location . '</li>';

            echo '</ul>';

          endwhile;

        endif;

      echo '</div>';

    echo '</div>';

  echo '</div>';

echo '</div>';

?>
