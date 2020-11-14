<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Juans Auto Paint</title>
        <link rel="stylesheet" href="<?php echo e(asset('css/style.css')); ?>">
        <script src="<?php echo e(asset('js/jquery-3.5.1.js')); ?>"></script>
    </head>
    <body class="antialiased">
        <div class="wrapper">
            <?php echo $__env->make('includes.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php echo $__env->make('includes.nav', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <main>
                <?php echo $__env->yieldContent('content'); ?>
            </main>
        </div>
    </body>
</html>
<?php /**PATH C:\xampp\htdocs\systems\paintJobs\resources\views/layout/app.blade.php ENDPATH**/ ?>