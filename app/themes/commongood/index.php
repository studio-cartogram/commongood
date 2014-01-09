<?php

/*
Template Name: Home
*/

get_template_part('part-head');
get_header();
?>
	<!-- Add your site or application content here -->
	<ui-view>
        <span class="loading">Loading</span>
    </ui-view>
    
<?php
get_footer();
get_template_part('part-foot');
?>