<?php

$icon = get_query_var( 'icon' );

echo '<svg class="icon icon--' . $icon . '"><use xlink:href="#icon-' . $icon . '"></use></svg>';

?>
