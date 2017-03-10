<?php

$item = get_query_var('item');
$content = get_the_content($item->ID);
$title = get_the_title($item->ID);
$website = get_field('website', $item->ID);
$attachment_id = get_post_thumbnail_id($item->ID);
$thumbnail = (get_field('thumbnail', $item->ID) ? get_field('thumbnail', $item->ID) : wp_get_attachment_image_url( $attachment_id, 'medium' ));

echo '<div class="swiper-slide">';

  echo '<div class="commongood row">';

    echo '<div class="js-content column column-4-tablet commongood__content">';


      echo '<div class="commongood__title">';
      echo '<div class="js-curtain-2">';

        echo '<h2 class="mega">' . $title . '</h2>';

      echo '</div>';

      echo '</div>';

      echo '<div class="js-curtain-3">';

      echo '<p>' . $content . '</p>';

      if ($website) : echo '<a class="commongood__link link" href="' . $website . '" target="_blank">' . 'View Work' . '</a> '; endif;

      echo '</div>';
    echo '</div>';

    echo '<div class="column column-8-tablet commongood__img">';

      echo '<div class="js-curtain-1">';

        echo '<img
          class="commongood__img__img"
          alt="' . esc_attr(get_the_title($item->ID)) . '"
          src="' . $thumbnail . '"
        />';

      echo '</div>';
    echo '</div>';

  echo '</div>';

// <section class="content">
// 				<div class="dual">
// 					<div class="dual__inner" id="rev-1">
// 						<div class="dual__half"></div>
// 					</div>
// 					<div class="dual__content">
// 						Study hard what interests you the most in the most undisciplined, irreverent and original manner possible.<span class="author">― Richard Feynman</span>
// 					</div>
// 				</div>
// 			</section>
//
echo '</div>';


?>
