<?php

$agency = get_field('agency');
$director = get_field('director');

echo '<section class="row work__footer">';

  echo '<div class="column column-6">';

    if ($agency) : echo '<h2><strong>Agency</strong> ' . $agency . '</h2>'; endif;

  echo '</div>';

  echo '<div class="column column-6 text-align-right">';

    if ($director) : echo '<h2><strong>Director</strong> ' . $director . '</h2>'; endif;

  echo '</div>';

echo '</section>';

?>
