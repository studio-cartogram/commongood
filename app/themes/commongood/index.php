<?php

/*
Template Name: Home
*/

get_template_part('part-head');
get_header();
?>
	<!-- Add your site or application content here -->
	<ui-view ng-animate="">
        <span class="text--center loading">Loading</span>
    </ui-view>
    
<?php
get_footer();
get_template_part('part-foot');
?>