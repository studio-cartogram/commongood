<?php

$context = get_query_var( 'context' );
$modifications = array();
$post_type = ($context == 'commongood' ? 'commongood' : 'works');
$modifications['post_type'] = array($post_type);

$works = get_field('works');

$args = array_merge(
  // $wp_query->query_vars,
  $modifications 
);

$the_query = new WP_Query($args);

if ( $the_query->have_posts() ) :

  while ( $the_query->have_posts() ) : $the_query->the_post();

    set_query_var( 'item', $post );

    get_template_part('partials/item', $context);

  endwhile;

else :

  get_template_part('partials/empty');

endif;

?>
