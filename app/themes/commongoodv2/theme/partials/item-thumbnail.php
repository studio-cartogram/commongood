<?php

$item = get_query_var('item');
$attachment_id = get_post_thumbnail_id($item->ID);
$thumbnail = (get_field('thumbnail', $item->ID) ? get_field('thumbnail', $item->ID) : wp_get_attachment_image_url( $attachment_id, 'medium' ));

echo '<a
        href="' . get_permalink($item->ID) . '"
        class="thumbnail column"
      >';
  echo '<img
    class="thumbnail__img"
    alt="' . esc_attr(get_the_title($item->ID)) . '"
    src="' . $thumbnail . '"
  />';
echo '</a>';


?>
