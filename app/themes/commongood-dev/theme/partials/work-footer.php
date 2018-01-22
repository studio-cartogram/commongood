<?php

$agency = get_field('agency');
$director = get_field('director');
$talent = get_field('talent');

echo '<section class="row work__footer">';

  echo '<div class="column column-6">';

    if ($agency) : echo '<span class="epsilon inline-block">Agency</span> <span class="delta inline-block">' . $agency . '</span>'; endif;

  echo '</div>';

  echo '<div class="column column-6 text-align-right">';

    if ($talent) : 

      foreach( $talent as $post) :

        setup_postdata($post);
      
        echo '<span class="epsilon inline-block">Director&nbsp;</span>';
        
        echo '<span class="delta inline-block">' . get_the_title() . '</span>'; 

      endforeach;

      wp_reset_postdata();

    else :

      echo '<span class="epsilon inline-block">Director&nbsp;</span>';
        
      echo '<span class="delta inline-block">Common Good</span>'; 
    
    endif;

  echo '</div>';

echo '</section>';

?>
