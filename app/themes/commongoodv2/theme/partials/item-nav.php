<?php

$item = get_query_var('item');

echo '<li>';

echo '<a
        href="' . get_permalink($item->ID) . '"
        class=""
      >';
      echo get_the_title($item->ID);
echo '</a>';

echo '</li>';

?>
