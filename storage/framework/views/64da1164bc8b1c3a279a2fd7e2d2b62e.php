 
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
        
        <h2>Item Lost</h2><br>
        <?php if($itemlost->isEmpty()): ?>
        <p style="text-align: center;">No lost items yet.</p>
        <?php else: ?>
        <table>
            <tr>
                <th>Item Name</th>
                <th>Category</th>
                <th>Description</th>
                <th>Location</th>
                <th>Date</th>
                <th>Image</th>
                <th></th>
            </tr>
            
            <?php $__currentLoopData = $itemlost; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td><?php echo e($item->itemname); ?></td>
                <td><?php echo e($item->category->name); ?></td>
                <td><?php echo e($item->description); ?></td>
                <td><?php echo e($item->location); ?></td>
                <td><?php echo e(\Carbon\Carbon::parse($item->date)->format('d F Y')); ?></td> 
                <td>
                    <?php if($item->image): ?>
                        <img src="<?php echo e(asset('storage/'.$item->image)); ?>" width="80">
                    <?php else: ?>
                        No image
                    <?php endif; ?>
                </td>
                <td>
                    
                    <?php if(auth()->user()->role==='user'||auth()->user()->role==='admin'): ?> 
                    <a href="<?php echo e(route('items.edit',$item->id)); ?>"><img src="<?php echo e(asset('editing.png')); ?>" width="25"></a>
                    <?php endif; ?>
                    
                    <?php if(auth()->user()->role==='admin'): ?>
                    <form action="<?php echo e(route('items.destroy',$item->id)); ?>" method="POST" style="display:inline-block;" onsubmit="return confirm('Delete this item?');">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('DELETE'); ?>
                        <button type="submit" style="background: none; border: none;"><img src="<?php echo e(asset('bin.png')); ?>" width="25"></button>
                    </form>
                    <?php endif; ?>
                </td>
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </table>
    <?php endif; ?>
    </div>
    <div class='box'>
        
        <h2>Item Found</h2><br>
        <?php if($itemfound->isEmpty()): ?>
        <p style="text-align: center;">No found items yet.</p>
        <?php else: ?>
        <table>
            <tr>
                <th>Item Name</th>
                <th>Category</th>
                <th>Description</th>
                <th>Location</th>
                <th>Date</th>
                <th>Image</th>
                <th></th>
            </tr>
            
            <?php $__currentLoopData = $itemfound; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td><?php echo e($item->itemname); ?></td>
                <td><?php echo e($item->category->name); ?></td>
                <td><?php echo e($item->description); ?></td>
                <td><?php echo e($item->location); ?></td>
                <td><?php echo e(\Carbon\Carbon::parse($item->date)->format('d F Y')); ?></td> 
                <td>
                    <?php if($item->image): ?>
                        <img src="<?php echo e(asset('storage/'.$item->image)); ?>" width="80">
                    <?php else: ?>
                        No image
                    <?php endif; ?>
                </td>
                <td>
                    
                    <?php if(auth()->user()->role==='user'||auth()->user()->role==='admin'): ?> 
                    <a href="<?php echo e(route('items.edit',$item->id)); ?>"><img src="<?php echo e(asset('editing.png')); ?>" width="25"></a>
                    <?php endif; ?>
                    
                    <?php if(auth()->user()->role==='admin'): ?>
                    <form action="<?php echo e(route('items.destroy',$item->id)); ?>" method="POST" style="display:inline-block;" onsubmit="return confirm('Delete this item?');">
                        <?php echo csrf_field(); ?>
                            <?php echo method_field('DELETE'); ?>
                        <button type="submit" style="background: none; border: none;"><img src="<?php echo e(asset('bin.png')); ?>" width="25"></button>
                    </form>
                    <?php endif; ?>
                </td>
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </table>
    <?php endif; ?>
    </div>
</main>
</body>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\lostfound\resources\views/view.blade.php ENDPATH**/ ?>