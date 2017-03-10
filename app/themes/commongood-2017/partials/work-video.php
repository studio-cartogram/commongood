<?php

$vimeo_id = get_field('vimeo_id');
echo '<div class="work__video">';
echo '<div
  style="padding-bottom: 56%;"
  class="ratio-container"
  >';
echo '<iframe src="https://player.vimeo.com/video/' . $vimeo_id . '?autoplay=1&title=0&byline=0"" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>';
echo '</div>';
echo '</div>';

?>