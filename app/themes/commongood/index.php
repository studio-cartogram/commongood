<?php

/*
Template Name: Home
*/

get_template_part('part-head');
get_header();
?>
	<!-- Add your site or application content here -->
	<div class="view-wrap">
		<div class="container" ng-view="" ng-animate=""></div>
	</div>



<?php
get_footer();
get_template_part('part-foot');
?>