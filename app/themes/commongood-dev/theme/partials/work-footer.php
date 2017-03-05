<?php

$agency = get_field('agency');
$director = get_field('director');

echo '<section class="row work__footer">';

  echo '<div class="column column-6">';

    if ($agency) : echo '<span class="epsilon inline-block">Agency</span> <span class="delta inline-block">' . $agency . '</span>'; endif;

  echo '</div>';

  echo '<div class="column column-6 text-align-right">';

    if ($director) : echo '<span class="epsilon inline-block">Director</span> <span class="delta inline-block">' . $director . '</span>'; endif;

  echo '</div>';

echo '</section>';

?>
