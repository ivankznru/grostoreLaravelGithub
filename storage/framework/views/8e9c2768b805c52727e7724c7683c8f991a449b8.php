<?php $__currentLoopData = $mediaFiles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $mediaFile): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <div class="avatar avatar-xl selected-file">
        <img class="rounded-circle" src="<?php echo e(uploadedAsset($mediaFile->id)); ?>" alt="">
        <span class="tt-remove" onclick="removeSelectedFile(this, <?php echo e($mediaFile->id); ?>)"><i
                data-feather="trash"></i></span>
    </div>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php /**PATH F:\LARAVEL PROJECT\c-grostore-food-grocery-laravel update 9  1\resources\views/backend/inc/media-manager/image.blade.php ENDPATH**/ ?>