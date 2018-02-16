<?php
$exclude = get_the_ID();
$talent = get_field('talent');
$siteUrl = get_site_url();

if ($talent) :

  echo '<section class="work__related">';

    foreach( $talent as $t ):

      echo '<div class="work__related--header">';

        echo '<div class="work__related--header-item">';

          echo '<span class="epsilon inline-block">More from&nbsp;</span>';
          echo '<span class="delta inline-block">' . get_the_title($t->ID) . '</span>';

        echo '</div>';

        echo '<div class="work__related--header-item">';

          echo '<a href="'. $siteUrl .'/commongood" class="epsilon inline-block">';
          echo 'All Directors</a>';

        echo '</div>';

      echo '</div>';

      $directorWorks = get_posts(array(
        'post_type' => 'reels',
        'post__not_in' => array($exclude),
        'meta_query' => array(
          array(
            'key' => 'talent',
            'value' => '"' . $t->ID . '"',
            'compare' => 'LIKE',
          )
        )
      ));

      if ($directorWorks) :

        echo '<div id="all-work" class="row row--full thumbnails js-videos">';

        foreach( $directorWorks as $work ):

          $title = get_the_title($work->ID);
          $client = get_field('client', $work->ID );
          $vimeo_id = get_field('vimeo_id', $work->ID);
          $thumbnail = get_field('thumbnail', $work->ID);

          echo '<a href="' . get_permalink($work->ID) . '?show_director_works=true" class="thumbnail column">';

            echo '<div
              style="padding-bottom: 56%;"
              class="ratio-container"
            >';

              echo '<img
                data-vimeo-id="' . $vimeo_id . '"
                data-object-fit="cover"
                class="js-load-vimeo-image thumbnail__img "
                alt="' . get_the_title($work->ID) . '"
              />';

              echo '<img
                data-object-fit="cover"
                class="thumbnail__img thumbnail__img--fallback"
                alt="' . get_the_title($work->ID) . '"
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

      endif;

    endforeach;

  echo '</section>';

endif;

?>
