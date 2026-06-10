 
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
    <h2>Deleted Items</h2><br>
    
    <?php if(session('success')): ?>
        <div style="color: green;"><?php echo e(session('success')); ?></div>
    <?php endif; ?>
    
    <?php if(auth()->user()->role==='admin'): ?>
        <?php if($deletedItems->isEmpty()): ?>
            <p>No deleted items.</p>
        
        <?php else: ?>
            <table>
                <tr>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Deleted At</th>
                    <th></th>
                </tr>
                
                <?php $__currentLoopData = $deletedItems; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e($item->itemname); ?></td>
                        <td><?php echo e($item->description); ?></td>
                        <td><?php echo e($item->deleted_at->format('Y-m-d H:i')); ?></td>
                        
                        <td><form action="<?php echo e(route('items.restore',$item->id)); ?>" method="POST" onsubmit="return confirm('Restore this item?');" style="display: inline-block;">
                            <?php echo csrf_field(); ?>
                            <button type="submit" style="background: none; border: none;"><img src="<?php echo e(asset('restore.png')); ?>" width="25"></button></form>
                            
                            <form action="<?php echo e(route('items.forceDelete',$item->id)); ?>" method="POST" style="display:inline-block;" onsubmit="return confirm('Delete this item?');">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('DELETE'); ?>
                            <button type="submit" style="background: none; border: none;"><img src="<?php echo e(asset('bin.png')); ?>" width="25"></button></form>
                        </td>
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </table>
            <?php endif; ?>
            
            <?php else: ?>
            <p>You are not authorized to view this page.</p>
           <?php endif; ?>
</div>
</main>
</body>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\lostfound\resources\views/trash.blade.php ENDPATH**/ ?>