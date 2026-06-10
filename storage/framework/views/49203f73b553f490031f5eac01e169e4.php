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
            <h2>Sign In</h2><br>
            <?php if($errors->any()): ?>
                <ul style="color: red;">
                    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li><?php echo e($error); ?></li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            <?php endif; ?>
            <form method="POST" action="<?php echo e(route('signin')); ?>">
                <?php echo csrf_field(); ?>
                <table>
                    <tr>
                        <th><label>Name:</label></th>
                        <td><input type="text" name="name" required><br><br></td>
                    </tr>
                    <tr>
                        <th><label>Email:</label></th>
                        <td><input type="email" name="email" required><br><br></td>
                    </tr>
                    <tr>
                        <th><label>Password:</label></th>
                        <td><input type="password" name="password" required><br><br></td>
                    </tr>
                    <tr>
                        <th><label>Confirm Password:</label></th>
                        <td><input type="password" name="password_confirmation" required><br><br></th>
                    </tr>
                    <tr>
                        <th><label>User Type:</label></th>
                        <td><select name="role" required>
                            <option value="user">User</option>
                            <option value="admin">Admin</option>
                            </select><br></td>
                    </tr>
                </table><br>
                <button type="submit">Sign In</button>
            </form>
            <p>Already have an account? <a href="<?php echo e(route('login')); ?>">Login</a></p>
        </div>
    </main>
</body>
<footer>
    <p>&copy; 2025 Lost and Found System | Contact: lostfoundkpmim@gmail.com</p>
</footer>
</html><?php /**PATH C:\xampp\htdocs\lostfound\resources\views/signin.blade.php ENDPATH**/ ?>