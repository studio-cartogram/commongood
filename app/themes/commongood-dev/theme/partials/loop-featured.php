<?php

if( have_rows('featured_works', 'options') ):

  echo '<div id="js-swiper-featured" class="featured swiper-container"
    >';

    echo '<div class="swiper-wrapper">';

    $count = 0;
    while( have_rows('featured_works', 'options') ): the_row(); $count++;

      $work = get_sub_field('work');

      set_query_var( 'item', $work );


      set_query_var( 'count', $count );
      get_template_part('partials/item', 'featured');


    endwhile;

    echo '</div>';

    echo '<div class="featured__copy">';

      echo '<a class="js-scroll-link" href="#all-work">';

        echo '<span class="gamma inline-block">' . 'All Work' . '</span>';

        set_query_var( 'icon', 'arrow-down' );
        get_template_part('partials/icon');

      echo '</a>';

    echo '</div>';

  echo '</div>';

endif;

?>
