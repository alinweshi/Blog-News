
<?php $__env->startSection("body"); ?>
<!DOCTYPE html>
<html lang="en"> 
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="<?php echo e(asset('adminassets/form.css')); ?>" rel="stylesheet"></head>
<body>
    <h3><?php echo e(__("words.settings")); ?> </h3>


<form action="<?php echo e(route("dashboard.settings.update")); ?>" method="POST" enctype="multipart/form-data" class="settings-form">
    <?php echo csrf_field(); ?>
    <?php if(count($errors) > 0): ?>
    <div class="alert alert-danger">
        <ul>
            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li><?php echo e($error); ?></li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
    </div>
<?php endif; ?>
    <div class="form-group">
        <label for="logo">Logo:</label>
        <input type="file" name="logo" id="logo" class="form-control" value="<?php echo e($settings->logo); ?>">
        <img src="<?php echo e(asset($settings->logo )); ?>">
    </div>
    <div class="form-group">
        <label for="favicon">Favicon:</label>
        <input type="file" name="favicon" id="favicon" class="form-control" value="<?php echo e($settings->favicon); ?>">
        <img src="<?php echo e(asset($settings->favicon)); ?>">
    </div>
    <div class="form-group">
        <label for="facebook">Facebook:</label>
        <input type="text" name="facebook" id="facebook" class="form-control" value="<?php echo e($settings->facebook); ?>">
    </div>
    <div class="form-group">
        <label for="instagram">Instagram:</label>
        <input type="text" name="instagram" id="instagram" class="form-control" value="<?php echo e($settings->instagram); ?>">
    </div>
    <div class="form-group">
        <label for="email">Email:</label>
        <input type="email" name="email" id="email" class="form-control" value="<?php echo e($settings->email); ?>">
    </div>
    <div class="form-group">
        <label for="phone">Phone:</label>
        <input type="text" name="phone" id="phone" class="form-control" value="<?php echo e($settings->phone); ?>">
    </div>
    <div class="form-group">
        <label for="address">Address:</label>
        <input type="text" name="address" id="address" class="form-control" value="<?php echo e($settings->address); ?>">
    </div> 
    <div class="tab-group">
        <ul class="nav nav-tabs mb-3" id="language-tabs" role="tablist">
            <?php $__currentLoopData = config("app.languages"); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li class="nav-item" role="presentation">
                    <a class="nav-link <?php if($loop->first): ?> active <?php endif; ?>"  id="<?php echo e($key); ?>" data-mdb-toggle="tab" href="#<?php echo e($key); ?>" role="tab" aria-controls="<?php echo e($key); ?>" aria-selected="<?php echo e($loop->first ? 'true' : 'false'); ?>"><?php echo e($value); ?></a>
                </li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
    </div>
    <?php $__currentLoopData = config("app.languages"); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="tab-pane fade <?php if($loop->index==0): ?> show active in <?php endif; ?>" data-tab="<?php echo e($key); ?>" id="<?php echo e($key); ?>" for="<?php echo e($key); ?>" role="tab-pane">
            <div class="form-group">
                <label for="<?php echo e($key); ?>-title"><?php echo e(__("word.title")); ?></label>
                <input type="text"  name="<?php echo e($key); ?>[title]" id="<?php echo e($key); ?>-title" class="form-control" value="<?php echo e($settings->translate($key)->title); ?> ">
            </div>
            <div class="form-group">
                <label for="<?php echo e($key); ?>-content"><?php echo e(__('word.content')); ?></label>
                <input type="text"  name="<?php echo e($key); ?>[content]" id="<?php echo e($key); ?>-content" class="form-control" value="<?php echo e($settings->translate($key)->content); ?>  ">
            </div>
        </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <div class="form-group">
        <button type="submit" class="btn btn-primary">Submit</button>
        <button type="reset" class="btn btn-secondary">Reset</button>
    </div>

</form>

</body>
</html>

<?php $__env->stopSection(); ?>

<?php echo $__env->make("dashboard.layouts.layout", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\blog\resources\views/dashboard/settings.blade.php ENDPATH**/ ?>