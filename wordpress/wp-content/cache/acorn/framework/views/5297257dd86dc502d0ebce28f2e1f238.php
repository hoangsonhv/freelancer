<?php $__env->startSection('content'); ?>
  <?php if (isset($component)) { $__componentOriginal7a219438579842cfd2397f8843d8f597 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal7a219438579842cfd2397f8843d8f597 = $attributes; } ?>
<?php $component = App\View\Components\LiveScores::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('live-scores'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\LiveScores::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal7a219438579842cfd2397f8843d8f597)): ?>
<?php $attributes = $__attributesOriginal7a219438579842cfd2397f8843d8f597; ?>
<?php unset($__attributesOriginal7a219438579842cfd2397f8843d8f597); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal7a219438579842cfd2397f8843d8f597)): ?>
<?php $component = $__componentOriginal7a219438579842cfd2397f8843d8f597; ?>
<?php unset($__componentOriginal7a219438579842cfd2397f8843d8f597); ?>
<?php endif; ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /var/www/html/wp-content/themes/my-theme/resources/views/index.blade.php ENDPATH**/ ?>