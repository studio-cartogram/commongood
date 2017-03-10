<?php

echo '<div id="js-curtain" class="curtain">';
  echo '<div class="curtain__inner">';
    set_query_var( 'icon', 'logo' );
    echo '<div class="curtain__logo">';
    get_template_part('partials/icon');
    echo '</div>';
  echo '</div>';
echo '</div>';

?>
