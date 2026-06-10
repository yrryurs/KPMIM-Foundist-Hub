<html>
<head>
    <title>Foundist Hub</title>
    <link rel="stylesheet" href="<?php echo e(asset('css/style.css')); ?>">
    <script>
    //function to confirm logout
    function confirmLogout(){
        if (confirm('Are you sure you want to log out?')){
            document.getElementById('logout-form').submit();
        }
    }
    </script>
</head>
<body>
    <header>
    <h1>
        <img src="<?php echo e(asset('kpm.png')); ?>" style='width: 60px;'>
        KPMIM Foundist Hub
        <img src="<?php echo e(asset('logo.png')); ?>" style='width:50px;'>
    </h1>
</header>
    <nav>
        <a href="<?php echo e(url('/home')); ?>">Home</a>
        <a href="<?php echo e(url('/items')); ?>">Add Items</a>
        <a href="<?php echo e(url('/view')); ?>">View Items</a>
        <?php if(auth()->guard()->check()): ?>
        <!-- Only show "Trash if user is an admin -->
        <?php if(auth()->user()->role==='admin'): ?>
        <a href="<?php echo e(route('trash')); ?>">Trash</a>
        <?php endif; ?>
        <?php endif; ?>
        <a href="<?php echo e(url('aboutus')); ?>">About Us</a>
        <?php if(auth()->guard()->check()): ?>
        <a href="#" onclick="event.preventDefault(); confirmLogout();">Logout</a>
        <!--Form used for logging out-->
        <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;">
        <?php echo csrf_field(); ?>
        </form>
        <?php endif; ?>
    </nav>
    <!--Main content section that is different in each pages-->
    <div class="container">
        <?php echo $__env->yieldContent('content'); ?>
    </div>
<footer>
    <p>&copy; 2025 KPMIM Lost and Found Management System | @lostfoundkpmim@gmail.com</p>
</footer>
</body>
</html><?php /**PATH C:\xampp\htdocs\lostfound\resources\views/layouts/app.blade.php ENDPATH**/ ?>