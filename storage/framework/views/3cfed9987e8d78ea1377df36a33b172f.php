<!DOCTYPE html>
<html class="no-js" lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>" dir="<?php echo e(in_array(app()->getLocale(), ['ar', 'az', 'dv', 'fa', 'he', 'ku', 'ur']) ? 'rtl' : 'ltr'); ?>">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

		<?php if( config('app.debug') !== true ): ?>
			<meta http-equiv="Content-Security-Policy" content="base-uri 'self'; default-src 'self' 'nonce-<?php echo e(app( 'aimeos.context' )->get()->nonce()); ?>'; <?php echo e(config( 'shop.csp.frontend', 'style-src \'unsafe-inline\' \'self\'; img-src \'self\' data: https://aimeos.org; frame-src https://www.youtube.com https://player.vimeo.com' )); ?>">
		<?php endif; ?>

		<?php if( in_array(app()->getLocale(), ['ar', 'az', 'dv', 'fa', 'he', 'ku', 'ur']) ): ?>
			<link type="text/css" rel="stylesheet" href="<?php echo e(asset('vendor/shop/themes/default/app.rtl.css?v=' . config( 'shop.version', 1 ) )); ?>">
		<?php else: ?>
			<link type="text/css" rel="stylesheet" href="<?php echo e(asset('vendor/shop/themes/default/app.css?v=' . config( 'shop.version', 1 ) )); ?>">
		<?php endif; ?>
		<link type="text/css" rel="stylesheet" href="<?php echo e(asset('vendor/shop/themes/default/aimeos.css?v=' . config( 'shop.version', 1 ) )); ?>">

		<?php echo $__env->yieldContent('aimeos_header'); ?>

		<style nonce="<?php echo e(app( 'aimeos.context' )->get()->nonce()); ?>">
			:root {
				<?php $__currentLoopData = app( 'aimeos.context' )->get()->locale()->getSiteItem()->getConfigValue( 'theme/default', [] ); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					<?php echo e($key); ?>: <?php echo e($value); ?>;
				<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
			}
		</style>

		<link rel="icon" href="<?php echo e(asset( 'aimeos/' . ( app( 'aimeos.context' )->get()->locale()->getSiteItem()->getIcon() ?: '../vendor/shop/themes/default/assets/icon.png' ) )); ?>">

		<link rel="preload" href="<?php echo e(asset('vendor/shop/themes/default/assets/roboto-condensed-v19-latin-regular.woff2')); ?>" as="font" type="font/woff2" crossorigin>
		<link rel="preload" href="<?php echo e(asset('vendor/shop/themes/default/assets/roboto-condensed-v19-latin-700.woff2')); ?>" as="font" type="font/woff2" crossorigin>
		<link rel="preload" href="<?php echo e(asset('vendor/shop/themes/default/assets/bootstrap-icons.woff2')); ?>" as="font" type="font/woff2" crossorigin>
	</head>
	<body class="<?php echo e($page ?? ''); ?>">
		<nav class="navbar navbar-expand-md navbar-top">
			<a class="navbar-brand" href="/" title="<?php echo e(__('To the home page')); ?>">
				<img src="<?php echo e(asset( 'aimeos/' . ( app( 'aimeos.context' )->get()->locale()->getSiteItem()->getLogo() ?: '../vendor/shop/themes/default/assets/logo.png' ) )); ?>" height="40" alt="<?php echo e(__('To the home page')); ?>">
			</a>

			<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar-top" aria-controls="navbar-top" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbar-top">
				<?php echo $__env->yieldContent('aimeos_head_nav'); ?>
			</div>

			<?php echo $__env->yieldContent('aimeos_head_locale'); ?>
			<?php echo $__env->yieldContent('aimeos_head_search'); ?>

			<ul class="navbar-nav">
				<?php if(Auth::guest() && config('app.shop_registration')): ?>
					<li class="nav-item register"><a class="nav-link" href="<?php echo e(airoute( 'register' )); ?>" title="<?php echo e(__( 'Register' )); ?>"><span class="name"><?php echo e(__('Register')); ?></span></a></li>
				<?php endif; ?>
				<?php if(Auth::guest()): ?>
					<li class="nav-item login"><a class="nav-link" href="<?php echo e(airoute( 'login' )); ?>" title="<?php echo e(__( 'Login' )); ?>"><span class="name"><?php echo e(__( 'Login' )); ?></span></a></li>
				<?php else: ?>
					<li class="nav-item login profile dropdown">
						<a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown" role="button" aria-expanded="false" title="<?php echo e(__( 'Account' )); ?>"><span class="name"><?php echo e(__( 'Account' )); ?></span> <span class="caret"></span></a>
						<ul class="dropdown-menu dropdown-menu-end" role="menu">
							<li class="dropdown-item"><a class="nav-link" href="<?php echo e(airoute( 'aimeos_shop_account' )); ?>"><span class="name"><?php echo e(__( 'Profile' )); ?></span></a></li>
							<li class="dropdown-item"><form id="logout" action="<?php echo e(airoute( 'logout' )); ?>" method="POST"><?php echo e(csrf_field()); ?><button class="nav-link"><span class="name"><?php echo e(__( 'Logout' )); ?></span></button></form></li>
						</ul>
					</li>
				<?php endif; ?>
			</ul>

			<?php echo $__env->yieldContent('aimeos_head_basket'); ?>
		</nav>

		<div class="content">
			<?php echo $__env->yieldContent('aimeos_stage'); ?>
			<main>
				<?php echo $__env->yieldContent('aimeos_body'); ?>
				<?php echo $__env->yieldContent('content'); ?>
			</main>
		</div>


		<footer>
			<div class="container-fluid">
				<div class="row">
					<div class="col-md-8">
						<div class="row">
							<div class="col-sm-6 footer-left">
								<div class="footer-block">
									<h2 class="pb-3" aria-label="<?php echo e(__('Legal information')); ?>"><?php echo e(__( 'LEGAL' )); ?></h2>
									<p><a href="<?php echo e(airoute('aimeos_page', ['path' => 'terms'])); ?>"><?php echo e(__( 'Terms & Conditions' )); ?></a></p>
									<p><a href="<?php echo e(airoute('aimeos_page', ['path' => 'privacy'])); ?>"><?php echo e(__( 'Privacy Notice' )); ?></a></p>
									<p><a href="<?php echo e(airoute('aimeos_page', ['path' => 'cancel'])); ?>"><?php echo e(__( 'Cancellation' )); ?></a></p>
								</div>
							</div>
							<div class="col-sm-6 footer-center">
								<div class="footer-block">
									<h2 class="pb-3" aria-label="<?php echo e(__('About the company')); ?>"><?php echo e(__( 'ABOUT US' )); ?></h2>
									<p><a href="<?php echo e(airoute('aimeos_page', ['path' => 'contact'])); ?>"><?php echo e(__( 'Contact us' )); ?></a></p>
									<p><a href="<?php echo e(airoute('aimeos_page', ['path' => 'about'])); ?>"><?php echo e(__( 'Company' )); ?></a></p>
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-4 footer-right">
						<div class="footer-block">
							<a class="logo" href="/" title="<?php echo e(__('To the home page')); ?>">
							    <img src="<?php echo e(asset( 'aimeos/' . ( app( 'aimeos.context' )->get()->locale()->getSiteItem()->getLogo() ?: '../vendor/shop/themes/default/assets/logo.png' ) )); ?>" height="40" alt="<?php echo e(__('To the home page')); ?>">
							</a>
							<div class="social" aria-label="<?php echo e(__('Social media links')); ?>">
								<p><a href="#" class="sm facebook" title="Facebook" rel="noopener">Facebook</a></p>
								<p><a href="#" class="sm twitter" title="Twitter" rel="noopener">Twitter</a></p>
								<p><a href="#" class="sm instagram" title="Instagram" rel="noopener">Instagram</a></p>
								<p><a href="#" class="sm youtube" title="Youtube" rel="noopener">Youtube</a></p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</footer>



		<a id="toTop" class="back-to-top" href="#" title="<?php echo e(__( 'Back to top' )); ?>">
			<div class="top-icon"></div>
		</a>

		<!-- Scripts -->
		<script src="<?php echo e(asset('vendor/shop/themes/default/app.js?v=' . config( 'shop.version', 1 ) )); ?>"></script>
		<script src="<?php echo e(asset('vendor/shop/themes/default/aimeos.js?v=' . config( 'shop.version', 1 ) )); ?>"></script>
		<?php echo $__env->yieldContent('aimeos_scripts'); ?>
	</body>
</html>
<?php /**PATH C:\Users\rakhi\myshop\vendor\aimeos\aimeos-laravel/views/base.blade.php ENDPATH**/ ?>