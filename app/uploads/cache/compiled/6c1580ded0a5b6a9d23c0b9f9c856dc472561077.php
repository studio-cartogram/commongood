<?php $__env->startSection('content'); ?>
  <?php echo $__env->make('partials.page-header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

  <?php 
    $args = array(
      'post_type' => 'works'
    );
   ?>

  <?php $bladeQuery = new WP_Query($args); ?><?php while ($bladeQuery->have_posts()) : ?><?php $bladeQuery->the_post(); ?>
    <h2><?php the_title(); ?></h2>
  <?php endwhile; ?>

  <?php if(!have_posts()): ?>
    <div class="alert alert-warning">
      <?php echo e(__('Sorry, no results were found.', 'sage')); ?>

    </div>
    <?php echo get_search_form(false); ?>

  <?php endif; ?>

  <?php while(have_posts()): ?> <?php (the_post()); ?>
    <?php echo $__env->make('partials.content-'.(get_post_type() !== 'post' ? get_post_type() : get_post_format()), array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
  <?php endwhile; ?>

  <?php echo get_the_posts_navigation(); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.base', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>