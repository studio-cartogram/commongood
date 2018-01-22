<?php

$title = get_the_title();
$client = get_field('client');

echo '<section class="row work__header">';

  echo '<div class="column work__title">';

    if ($client) : echo '<span class="beta inline-block font-weight-bold">' . $client . '</span> '; endif;

    echo '<span class="beta inline-block ">' . $title . '</span>';

  echo '</div>';

  echo '<div class="work__back hamburger is-active">';

    echo '<span class="line"></span>';
    echo '<span class="line"></span>';
    echo '<span class="line"></span>';

  echo '</div>';

echo '</section>';

?>
