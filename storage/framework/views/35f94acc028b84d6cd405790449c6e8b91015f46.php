<section class="banner-section position-relative z-1 overflow-hidden bg-white">
    <img src="<?php echo e(staticAsset('frontend/default/assets/img/shapes/bg-shape-3.png')); ?>" alt="bg shape"
        class="position-absolute start-0 bottom-0 z--1 w-100">
    <div class="container">
        <div class="row align-items-center g-4">
            <?php $__currentLoopData = $banner_section_one_banners; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $banner): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-xl-4 col-md-6">
                    <a href="<?php echo e($banner->link); ?>" class="d-block">
                        <img src="<?php echo e(uploadedAsset($banner->image)); ?>" class="img-fluid" alt="" srcset="">
                    </a>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
</section>
<?php /**PATH F:\LARAVEL PROJECT\c-grostore-food-grocery-laravel update 9  1\resources\views/frontend/default/pages/partials/home/banners.blade.php ENDPATH**/ ?>