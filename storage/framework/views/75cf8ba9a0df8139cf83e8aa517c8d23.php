 
<?php $__env->startSection('content'); ?>
<head>
    <script>
        //Validation form before submission
        function validateForm(){
            const itemName=document.getElementById("itemName").value;
            const desc=document.getElementById("description").value;
            const loc=document.getElementById("location").value;
            if (itemName.length<3 || desc.length<3 || loc.length<3){
                alert("Item name, description, and location must be at least 3 characters");
                return false;
            }
            return true;
        }
    </script>
</head>
<body>
<main>
    <div class="box">
        <h2>Add Item</h2>
        
        <form action="<?php echo e(route('items.store')); ?>" method="POST" enctype="multipart/form-data" onsubmit="return validateForm()">
            <?php echo csrf_field(); ?> 
            <table>
                <tr>
                    <td><label for="itemName">Item Name:</label></td>
                    <td><input type="text" name="itemname" id="itemName" required></td>
                </tr>
                <tr>
                    <td>Category</td>
                    
                    <td><select name="category_id">
                        <option value="">Select Category</option>
                        <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($category->id); ?>"<?php echo e(old('category_id', $item->category_id ??'')==$category->id?'selected':''); ?>>
                            <?php echo e($category->name); ?>

                        </option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select></td>
                </tr>
                <tr>
                    <td><label for="description">Description:</label></td>
                    <td><input type="text" name="description" id="description" required></td>
                </tr>
                <tr>
                    <td><label for="status">Status:</label></td>
                    <td>
                        <select name="status" id="status" required>
                            <option value="lost">Lost</option>
                            <option value="found">Found</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td><label for="location">Location:</label></td>
                    <td><input type="text" name="location" id="location" required></td>
                </tr>
                <tr>
                    <td><label for="date">Date:</label></td>
                    <td><input type="date" name="date" id="date" required></td>
                </tr>
                <tr>
                    <td><label for="itemImage">Upload Image (optional):</label></td>
                    <td><input type="file" name="image" id="itemImage" accept="image/*"></td>
                </tr><br>
                <tr>
                    <td colspan="2" style='text-align: center;'><br>
                        <button type="submit">Submit</button>
                        <button type="reset">Reset</button>
                    </td>
                </tr>
            </table>
        </form>
    </div>
</main>
</body>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\lostfound\resources\views/items.blade.php ENDPATH**/ ?>