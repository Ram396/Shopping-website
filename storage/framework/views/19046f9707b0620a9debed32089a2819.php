<?php $__env->startSection('aimeos_header'); ?>
    <title><?php echo e(__( 'Checkout')); ?></title>
    <?= $aiheader['checkout/standard'] ?>
    <?= $aiheader['catalog/search'] ?? '' ?>
    <?= $aiheader['catalog/tree'] ?? '' ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('aimeos_nav'); ?>
    <?= $aibody['catalog/tree'] ?? '' ?>
    <?= $aibody['catalog/search'] ?? '' ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('aimeos_body'); ?>
    <div class="container-fluid">
        <?= $aibody['checkout/standard'] ?>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('shop::base', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\rakhi\myshop\vendor\aimeos\aimeos-laravel/views/checkout/index.blade.php ENDPATH**/ ?>