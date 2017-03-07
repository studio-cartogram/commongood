<?php

$item = get_query_var('item');
$content = get_the_content($item->ID);
$title = get_the_title($item->ID);
$website = get_field('website', $item->ID);
$attachment_id = get_post_thumbnail_id($item->ID);
$thumbnail = (get_field('thumbnail', $item->ID) ? get_field('thumbnail', $item->ID) : wp_get_attachment_image_url( $attachment_id, 'medium' ));

echo '<div
        class="commongood row"
      >';

  echo '<div class="column column-9 commongood__img">';

    echo '<img
      class="thumbnail__img"
      alt="' . esc_attr(get_the_title($item->ID)) . '"
      src="' . $thumbnail . '"
    />';

  echo '</div>';

  echo '<div class="column column-3 commongood__content">';

    echo '<h2 class="mega">' . $title . '</h2>';

    echo '<p>' . $content . '</p>';

    if ($website) : echo '<a class="link" href="' . $website . '>' . $website . '</a> '; endif;

  echo '</div>';


echo '</div>';


?>
