<?php

$directorWorks = get_posts(array(
  'post_type' => 'works',
  'meta_query' => array(
    array(
      'key' => 'talent', 
      'value' => '"' . get_the_ID() . '"', 
      'compare' => 'LIKE'
    )
  )
));

if( $directorWorks ):

  echo '<div id="all-work" class="row row--full thumbnails js-videos">';

  foreach( $directorWorks as $work):

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
?>
