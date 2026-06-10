 
<?php $__env->startSection('content'); ?>
<main>
	<div class="box">
		<?php
		//Get the user's role
		$role=auth()->user()->role;
        $roleName='User';
		if ($role==='admin'){
			$roleName='Admin';
		} elseif ($role==='user'){
			$roleName='User';
		}
		?>
		
		<h3>Welcome to Foundist Hub, dear <?php echo e(auth()->user()->name); ?> !</h3>
		<h4><i>You've logged in as <?php echo e($roleName); ?>.</i></h4>
		<p>Add. Search. Reclaim - all in one place.</p>
	</div>
	<div class="button-container">
		<a class="button" href="<?php echo e(route('items')); ?>"><img src="lostfound.png" style="width: 150px; vertical-align: middle; margin-right: 10px;">Add Lost/Found Item</a>
		<a class="button" href="<?php echo e(route('items.view')); ?>"><img src="view.png" style="width: 140px; vertical-align: middle; margin-right: 10px;">View Items</a>
	</div>
</main>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\lostfound\resources\views/home.blade.php ENDPATH**/ ?>