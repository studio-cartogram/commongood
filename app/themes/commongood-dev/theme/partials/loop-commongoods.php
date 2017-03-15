<?php

$context = get_query_var( 'context' );
$modifications = array();
$post_type = ($context == 'commongoods' ? 'commongoods' : 'works');
$modifications['post_type'] = array($post_type);

$args = array_merge(
  // $wp_query->query_vars,
  $modifications 
);

$the_query = new WP_Query($args);

if ( $the_query->have_posts() ) :


  echo '<div id="js-swiper-commongoods" class="commongoods swiper-container">';

    echo '<div class="swiper-wrapper">';

      while ( $the_query->have_posts() ) : $the_query->the_post();

        set_query_var( 'item', $post );

        get_template_part('partials/item', $context);

      endwhile;

    echo '</div>';

    echo '<div class="commongoods__controls">';


    echo '<div class="js-commongoods__prev commongoods__prev">';
      set_query_var( 'icon', 'arrow-left' );
      get_template_part('partials/icon');
    echo '</div>';

    echo '<div class="js-commongoods__next commongoods__next">';
      set_query_var( 'icon', 'arrow-right' );
      get_template_part('partials/icon');
    echo '</div>';

    echo '<div class="delta js-commongoods__pagination commongoods__pagination"></div>';

    echo '</div>';

  echo '</div>';


else :

  get_template_part('partials/empty');

endif;

?>
