<html>
<head>
    <meta charset="UTF-8">
    <title>Foundist Hub</title>
    
    <link rel="stylesheet" href="<?php echo e(asset('css/style.css')); ?>">
</head>
<body>
    <header>
    <h1>
        <img src="kpm.png" style='width: 60px;'>
        KPMIM Foundist Hub
        <img src="logo.png" style='width: 50px;'>
    </h1>
    </header>
    <main>
        <div class="box">
            <h2>Sign Up</h2>
            <p>A first time user? Please sign up first.</p><br>
            
            <?php if($errors->any()): ?>
                <ul style="color: red;">
                    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php echo e($error); ?>

                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            <?php endif; ?>
            <form method="POST" action="<?php echo e(route('signup.submit')); ?>">
                <?php echo csrf_field(); ?>
                <table>
                    <tr>
                        <th><label>Name:</label></th>
                        <td><input type="text" name="name" required style="width:250px;"><br><br></td>
                    </tr>
                    <tr>
                        <th><label>Email:</label></th>
                        <td><input type="email" name="email" required style="width:250px;"><br><br></td>
                    </tr>
                    <tr>
                        <th><label>Password:</label></th>
                        <td><input type="password" name="password" required style="width:250px;"><br><br></td>
                    </tr>
                    <tr>
                        <th><label>Confirm Password:</label></th>
                        <td><input type="password" name="password_confirmation" required style="width:250px;"><br><br></th>
                    </tr>
                </table><br>
                <button type="submit" style="width:70px;">Sign Up</button>
            </form><br>
            
            <p>Already have an account? <a href="<?php echo e(route('login')); ?>">Login</a></p>
        </div>
    </main>
</body>
<footer>
    <p>&copy; 2025 KPMIM Lost and Found Management System | @lostfoundkpmim@gmail.com</p>
</footer>
</html><?php /**PATH C:\xampp\htdocs\lostfound\resources\views/signup.blade.php ENDPATH**/ ?>