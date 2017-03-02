<?php

global $wp_query;

$modifications = array();

$modifications['post_type'] = array('works');

$args = array_merge(
  $wp_query->query_vars,
  $modifications 
);

$the_query = new WP_Query($args);

if ( $the_query->have_posts() ) :

echo '<section class="container">';

  echo '<div class="row">';

    while ( $the_query->have_posts() ) : $the_query->the_post();

      echo '<div class="column item">';

        get_template_part('partials/item');

      echo '</div>';

    endwhile;

  echo '</div>';

echo '</div>';

else :

  get_template_part('partials/empty');

endif;

?>
