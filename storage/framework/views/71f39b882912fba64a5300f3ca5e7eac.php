 
<?php $__env->startSection('content'); ?>
<head>
<style>
  table{
    border-collapse: collapse;
    width: 100%;
    border: 2px solid black;
  }
  th,td{
    border: 1px solid black;
    padding: 8px;
    text-align: left;
  }
  th{
    background-color: #113c6c;
    color: white;
  }
  p.center-text{
    text-align: center;
    }
</style>
</head>
<body>
<main>
<div class="box">
<h2>About Us</h2><br>
<table>
    <tr>
        <th>Email</th>
        <td>lostfoundkpmim@gmail.com</td>
    </tr>
    <tr>
        <th>Location</th>
        <td>Beside parcel room</td>
    </tr>
</table><br>
<h2>Comment</h2><br>

<?php if(session('success')): ?>
<p style="color: green;"><?php echo e(session('success')); ?></p>
<?php endif; ?>
<?php if(auth()->guard()->check()): ?>

<?php if(auth()->user()->role==='user'): ?>
<form action="<?php echo e(route('comments.store')); ?>" method="POST">
  <?php echo csrf_field(); ?>
  <textarea name="message" rows="4" style="width:100%;" placeholder="Write your comment..." required></textarea><br><br>
  <button type="submit">Submit</button>
</form>
<?php endif; ?>

<?php if(auth()->user()->role==='admin'): ?>
<table>
  <tr>
    <th>User</th>
    <th>Comment</th>
    <th>Time</th>
  </tr>
  
  <?php $__empty_1 = true; $__currentLoopData = $comments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $comment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
  <tr>
      <td><?php echo e($comment->user->email); ?></td>
      <td><?php echo e($comment->message); ?></td>
      <td><?php echo e($comment->created_at->format('Y-m-d H:i')); ?></td>
  </tr>
  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
  <tr>
      <td colspan="3">No comments yet.</td>
  </tr>
  <?php endif; ?>
</table>
<?php endif; ?>
<?php endif; ?>
</div>
</main>
</body>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\lostfound\resources\views/aboutus.blade.php ENDPATH**/ ?>