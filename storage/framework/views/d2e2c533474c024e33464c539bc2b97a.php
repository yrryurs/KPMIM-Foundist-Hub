
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
<h2>Do contact us for any inquery</h2><br>
<table>
    <tr>
        <th>Email</th>
        <td>lostfoundkpmim@gmail.com</td>
    </tr>
    <tr>
        <th>Number</th>
        <td>012-3456789</td>
    </tr>
    <tr>
        <th>Instagram</th>
        <td>@lostfound</td>
    </tr>
</table>
</div>
</main>
</body>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\lostfound\resources\views/contact.blade.php ENDPATH**/ ?>