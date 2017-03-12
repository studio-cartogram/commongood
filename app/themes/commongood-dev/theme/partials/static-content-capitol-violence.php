<?php

echo '<div class="static__content row">';

  echo '<div class="column column-6-tablet ">';

    echo '<div class="paragraph--lead">';

      the_content();

    echo '</div>';

  echo '</div>';

echo '</div>';

set_query_var('context', 'capitol-violence');
get_template_part('partials/loop', 'capitol-violence');
?>
