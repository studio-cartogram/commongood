<?php

$item = get_query_var('item');
$title = get_the_title($item->ID);
$client = get_field('client', $item->ID);
$attachment_id = get_post_thumbnail_id($item->ID);
$thumbnail = (get_field('thumbnail', $item->ID) ? get_field('thumbnail', $item->ID) : wp_get_attachment_image_url( $attachment_id, 'medium' ));

echo '<a
        href="' . get_permalink($item->ID) . '"
        class="thumbnail column"
      >';

  echo '<div
    style="padding-bottom: 56%;"
    class="ratio-container"
  >';

    echo '<img
      class="thumbnail__img"
      alt="' . esc_attr(get_the_title($item->ID)) . '"
      src="' . $thumbnail . '"
    />';

  echo '</div>';

  echo '<div class="thumbnail__copy">';

    if ($client) : echo '<span class="gamma inline-block">' . $client . '</span> '; endif;

    echo '<span class="gamma inline-block font-weight-regular">' . $title . '</span>';

  echo '</div>';

  echo '<div class="overlay thumbnail__overlay"></div>';

echo '</a>';


?>
