<?php

$item = get_query_var('item');
$title = get_the_title($item->ID);
$client = get_field('client', $item->ID);

echo '<li>';

echo '<a
        href="' . get_permalink($item->ID) . '"
        class="link--secondary"
      >';
      if ($client) : echo '<span class="gamma inline-block">' . $client . '</span> '; endif;

      echo '<span class="gamma inline-block font-weight-regular">' . $title . '</span>';
echo '</a>';

echo '</li>';

?>
