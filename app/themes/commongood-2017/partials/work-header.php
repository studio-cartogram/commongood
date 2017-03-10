<?php

$title = get_the_title();
$client = get_field('client');

echo '<section class="row work__header">';

  echo '<div class="column work__title">';

    if ($client) : echo '<span class="gamma inline-block">' . $client . '</span> '; endif;

    echo '<span class="gamma inline-block font-weight-regular">' . $title . '</span>';


  echo '</div>';

  echo '<div class="work__back hamburger is-active">';

    echo '<span class="line"></span>';
    echo '<span class="line"></span>';
    echo '<span class="line"></span>';

  echo '</div>';

echo '</section>';

?>