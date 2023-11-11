<?php $__env->startSection('aimeos_header'); ?>
    <title><?php echo e(__( 'Thank you')); ?></title>
    <?= $aiheader['checkout/confirm'] ?>
    <?= $aiheader['catalog/search'] ?? '' ?>
    <?= $aiheader['catalog/tree'] ?? '' ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('aimeos_head_nav'); ?>
    <?= $aibody['catalog/tree'] ?? '' ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('aimeos_head_search'); ?>
    <?= $aibody['catalog/search'] ?? '' ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('aimeos_body'); ?>
    <div class="container-fluid">
        <?= $aibody['checkout/confirm'] ?>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('shop::base', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\rakhi\myshop\vendor\aimeos\aimeos-laravel/views/checkout/confirm.blade.php ENDPATH**/ ?>