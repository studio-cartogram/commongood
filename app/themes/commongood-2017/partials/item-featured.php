<?php

$item = get_query_var('item');
$count = get_query_var('count');
$title = get_the_title($item->ID);
$vimeo_id = get_field('vimeo_id', $item->ID);
$client = get_field('client', $item->ID);
$thumbnail = get_field('thumbnail', $item->ID);
$video_file = get_sub_field('video_file');

echo '<a
        href="' . get_permalink($item->ID) . '"
        class="swiper-slide feature"
      >';

    if ( wp_is_mobile() ) :
    echo '<img
      data-object-fit="cover"
      data-vimeo-id="' . $vimeo_id . '"
      class="js-load-vimeo-image feature__img "
      alt="' . esc_attr(get_the_title($item->ID)) . '"
    />';

    echo '<img
      data-object-fit="cover"
      class="feature__img feature__img--fallback "
      alt="' . esc_attr(get_the_title($item->ID)) . '"
      src="' . $thumbnail . '"
    />';
    else : 
      echo '<video
        data-object-fit="cover"
        data-vimeo-id="' . $vimeo_id . '"
        muted
        loop
        class="js-load-vimeo-image js-video feature__video fix-fix-cover"
        src="' . $video_file . '"
      >';
    echo '</video>';

    endif;

    echo '<div class="feature__copy">';

    if ($client) : echo '<span class="gamma inline-block">' . $client . '</span> '; endif;

    echo '<span class="gamma inline-block font-weight-regular">' . $title . '</span>';

  echo '</div>';

  echo '<div class="overlay featured__overlay"></div>';

echo '</a>';


?>
