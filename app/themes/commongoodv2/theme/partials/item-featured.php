<?php

$item = get_query_var('item');
$title = get_the_title($item->ID);
$client = get_field('client', $item->ID);
$attachment_id = get_post_thumbnail_id($item->ID);
$thumbnail = (get_field('thumbnail', $item->ID) ? get_field('thumbnail', $item->ID) : wp_get_attachment_image_url( $attachment_id, 'medium' ));

echo '<a
        href="' . get_permalink($item->ID) . '"
        class="feature"
      >';

  echo '<img
    class="feature__img"
    alt="' . esc_attr(get_the_title($item->ID)) . '"
    src="' . $thumbnail . '"
  />';

  echo '<div class="feature__copy">';
    if ($client) : echo '<span class="gamma inline-block">' . $client . '</span> '; endif;
    echo '<span class="gamma inline-block font-weight-regular">' . $title . '</span>';
  echo '</div>';
echo '</a>';


?>
