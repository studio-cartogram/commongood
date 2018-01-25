<?php

$context = get_query_var( 'context' );
$modifications = array();
$post_type = ($context == 'commongoods' ? 'commongoods' : 'works');
$modifications['post_type'] = array($post_type);
// $modifications['posts_per_page'] = 1;

$args = array_merge(
  // $wp_query->query_vars,
  $modifications
);

$the_query = new WP_Query($args);

if ( $the_query->have_posts() ) :

  echo '<div class="commongoods">';

    echo '<div class="">';

      while ( $the_query->have_posts() ) : $the_query->the_post();

        set_query_var( 'item', $post );

        get_template_part('partials/item', $context);

      endwhile;

    echo '</div>';

  echo '</div>';

else :

  get_template_part('partials/empty');

endif;

?>
