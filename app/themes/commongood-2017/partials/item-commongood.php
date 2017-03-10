<?php

$item = get_query_var('item');
$content = get_the_content($item->ID);
$title = get_the_title($item->ID);
$website = get_field('website', $item->ID);
$attachment_id = get_post_thumbnail_id($item->ID);
$thumbnail = (get_field('thumbnail', $item->ID) ? get_field('thumbnail', $item->ID) : wp_get_attachment_image_url( $attachment_id, 'medium' ));

echo '<div class="swiper-slide">';

  echo '<div class="commongood row">';

    echo '<div class="column column-4-tablet commongood__content">';

      echo '<div class="commongood__title">';

        echo '<h2 class="mega">' . $title . '</h2>';

      echo '</div>';

      echo '<p>' . $content . '</p>';

      if ($website) : echo '<a class="link" href="' . $website . '" target="_blank">' . 'View Work' . '</a> '; endif;

    echo '</div>';

    echo '<div class="column column-8-tablet commongood__img">';

      echo '<img
        class="commongood__img__img"
        alt="' . esc_attr(get_the_title($item->ID)) . '"
        src="' . $thumbnail . '"
      />';

    echo '</div>';

  echo '</div>';

echo '</div>';


?>