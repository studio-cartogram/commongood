<?php

$item = get_query_var('item');
$content = get_the_content($item->ID);
$title = get_the_title($item->ID);
$website = get_field('website', $item->ID);
$attachment_id = get_post_thumbnail_id($item->ID);
$thumbnail = (get_field('thumbnail', $item->ID) ? get_field('thumbnail', $item->ID) : wp_get_attachment_image_url( $attachment_id, 'img_xlarge' ));

$directorWorks = get_posts(array(
  'post_type' => 'works',
  'meta_query' => array(
    array(
      'key' => 'talent', 
      'value' => '"' . $item->ID . '"', 
      'compare' => 'LIKE'
    )
  )
));

echo '<div class="commongood row">';

  echo '<div class="js-content column column-4-tablet commongood__content">';

    echo '<div class="commongood__title">';

        echo '<h2 class="mega">' . $title . '</h2>';

    echo '</div>';

    // echo '<div class="commongood__content">';

    echo '<p class="soft-duo--bottom">' . $content . '</p>';

    if ($directorWorks) : echo '<a class="commongood__link link" href="' . get_permalink() . '">' . 'View Work' . '</a> '; endif;

    // echo '</div>';

  echo '</div>';

  echo '<div class="column column-8-tablet commongood__img">';

    echo '<div class="">';

      echo '<div id="js-swiper-commongoods" class="swiper-container swiper-container-child js-swiper-commongoods-child">';

        echo '<div class="swiper-wrapper">';

          if( $directorWorks ):

          foreach( $directorWorks as $work):

          $title = get_the_title($work->ID);
          $client = get_field('client', $work->ID);
          $vimeo_id = get_field('vimeo_id', $work->ID);
          $thumbnail = (get_field('thumbnail', $work->ID) ? get_field('thumbnail', $work->ID) : wp_get_attachment_image_url( $attachment_id, 'img_xlarge' ));

          echo '<div class="swiper-slide">';

            echo '<a href="' . (get_permalink($work->ID)) . '?show_director_works=true"><img
              class="commongood__img__img"
              alt="' . (get_the_title($work->ID)) . '"
              src="' . $thumbnail . '"
            /></a>';

          echo '</div>';

          endforeach;

          endif;

        echo '</div>';

      echo '</div>';

    echo '</div>';

  echo '</div>';

echo '</div>';

?>
