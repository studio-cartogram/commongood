<?php

$item = get_query_var('item');
$count = get_query_var('count');
$title = get_the_title($item->ID);
$vimeo_id = get_field('vimeo_id', $item->ID);
$client = get_field('client', $item->ID);

echo '<a
        href="' . get_permalink($item->ID) . '"
        class="swiper-slide feature"
      >';

    echo '<img
      data-vimeo-id="' . $vimeo_id . '"
      class="js-load-vimeo-image feature__img"
      alt="' . esc_attr(get_the_title($item->ID)) . '"
    />';
    // echo '<video
    //   loop=""
    //   muted=""
    //   data-vimeo-id="' . $vimeo_id . '"
    //   class="js-load-vimeo-image feature__video"
    //   id="js-video"
    //   src="https://player.vimeo.com/external/194837908.sd.mp4?s=c350076905b78c67f74d7ee39fdb4fef01d12420&profile_id=164"
    //   >';
    // echo '</video>';

    echo '<div class="feature__copy">';

    if ($client) : echo '<span class="gamma inline-block">' . $client . '</span> '; endif;

    echo '<span class="gamma inline-block font-weight-regular">' . $title . '</span>';

  echo '</div>';

  echo '<div class="overlay featured__overlay"></div>';

echo '</a>';


?>
