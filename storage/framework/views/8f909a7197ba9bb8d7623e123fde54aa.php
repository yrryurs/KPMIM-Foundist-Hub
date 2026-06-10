 
<?php $__env->startSection('content'); ?>
<main>
    <div class="box">
        <h2>Edit Item</h2><br>
        
        <?php if($errors->any()): ?>
            <div style="color: red;">
                <ul>
                    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li><?php echo e($error); ?></li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            </div>
        <?php endif; ?>
        
        <form action="<?php echo e(route('items.update', $item->id)); ?>" method="POST" enctype="multipart/form-data">
            <?php echo csrf_field(); ?>
            <?php echo method_field('PUT'); ?> 
            <table> 
                <tr>
                    <th>Item Name</th>
                    <td><input type="text" name="itemname" value="<?php echo e(old('itemname',$item->itemname)); ?>" required></td>
                </tr>
                <tr>
                    <th>Category</th>
                    <td><select name="category_id" required>
                        <option value="">Select Category</option>
                        <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($category->id); ?>"<?php echo e(old('category_id', $item->category_id)==$category->id ?'selected':''); ?>><?php echo e($category->name); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select></td>
                </tr>
                <tr>
                    <th>Description</th>
                    <td><input type="text" name="description" value="<?php echo e(old('description',$item->description)); ?>" required></td>
                </tr>
                <tr>
                    <th>Status</th>
                    <td>
                        <select name="status" required>
                            <option value="lost" <?php echo e($item->status=='lost'?'selected':''); ?>>Lost</option>
                            <option value="found" <?php echo e($item->status=='found'?'selected':''); ?>>Found</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <th>Location</th>
                    <td><input type="text" name="location" value="<?php echo e(old('location',$item->location)); ?>" required></td>
                </tr>
                <tr>
                    <th>Date</th>
                    <td><input type="date" name="date" value="<?php echo e(old('date',$item->date)); ?>" required></td>
                </tr>
                <tr>
                    <th>Image</th>
                    <td>
                        <?php if($item->image): ?>
                            
                            <img src="<?php echo e(asset('storage/'.$item->image)); ?>" width="80"><br>
                            
                            <label><input type="checkbox" name="deleteImage" value="1">Delete image</label><br><br>
                        <?php endif; ?>
                        
                        <input type="file" name="image" accept="image/*">
                    </td>
                </tr>
                <tr>
                    <td colspan="2" style="text-align: center;">
                        <br>
                        <button type="submit">Update</button>
                        <a href="<?php echo e(route('items.view')); ?>">Cancel</a>
                    </td>
                </tr>
            </table>
        </form>
    </div>
</main>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\lostfound\resources\views/update.blade.php ENDPATH**/ ?>