<?php

$talent = get_field('talent');

if ($talent) :

  echo '<section class="work__related">';

    foreach( $talent as $post ):

      setup_postdata($post);

      echo '<div class="work__related--header">';

        echo '<span class="epsilon inline-block">More from&nbsp;</span>';
        echo '<span class="delta inline-block">' . get_the_title() . '</span>'; 

      echo '</div>';

      $directorWorks = get_posts(array(
        'post_type' => 'works',
        'meta_query' => array(
          array(
            'key' => 'talent', // name of custom field
            'value' => '"' . get_the_ID() . '"', // matches exaclty "123", not just 123.This prevents a match for "1234" 
            'compare' => 'LIKE'
          )
        )
      ));

      if ($directorWorks) :

        echo '<div id="all-work" class="row row--full thumbnails js-videos">';

        foreach( $directorWorks as $post ):

          setup_postdata($post);

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

        endforeach;

        wp_reset_postdata();

      endif;

    endforeach;

  echo '</section>';

  wp_reset_postdata();

endif;

?>
