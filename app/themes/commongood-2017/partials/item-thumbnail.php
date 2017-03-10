<?php

$item = get_query_var('item');
$title = get_the_title($item->ID);
$client = get_field('client', $item->ID);
$vimeo_id = get_field('vimeo_id', $item->ID);

echo '<a
        href="' . get_permalink($item->ID) . '"
        class="thumbnail column"
      >';

  echo '<div
    style="padding-bottom: 56%;"
    class="ratio-container"
  >';

    echo '<img
      data-vimeo-id="' . $vimeo_id . '"
      class="js-load-vimeo-image thumbnail__img"
      alt="' . esc_attr(get_the_title($item->ID)) . '"
    />';

  echo '</div>';

  echo '<div class="thumbnail__copy">';

    if ($client) : echo '<span class="gamma inline-block">' . $client . '</span> '; endif;

    echo '<span class="gamma inline-block font-weight-regular">' . $title . '</span>';

  echo '</div>';

  echo '<div class="overlay thumbnail__overlay"></div>';

echo '</a>';


?>