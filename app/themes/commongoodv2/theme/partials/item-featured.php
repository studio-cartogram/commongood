<?php

$item = get_query_var('item');
$count = get_query_var('count');
$title = get_the_title($item->ID);
$vimeo_id = get_field('vimeo_id', $item->ID);
$client = get_field('client', $item->ID);
$attachment_id = get_post_thumbnail_id($item->ID);
$thumbnail = (get_field('thumbnail', $item->ID) ? get_field('thumbnail', $item->ID) : wp_get_attachment_image_url( $attachment_id, 'medium' ));

echo '<a
        href="' . get_permalink($item->ID) . '"
        class="swiper-slide feature"
        data-cg-vimeo-url="https://player.vimeo.com/video/' . $vimeo_id . '?background=1"
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

  echo '<div class="overlay featured__overlay"></div>';

echo '</a>';


?>
