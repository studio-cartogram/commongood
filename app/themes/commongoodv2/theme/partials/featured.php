
<?php

if( have_rows('featured_works', 'options') ):

  while( have_rows('featured_works', 'options') ): the_row(); 

    $work = get_sub_field('work');

    set_query_var( 'item', $work );

    get_template_part('partials/item', 'featured');

  endwhile;

endif;

?>
