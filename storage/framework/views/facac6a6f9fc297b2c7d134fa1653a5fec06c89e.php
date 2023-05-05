<div class="quickview-double-slider">
    <?php
        $galleryImages = explode(',', $product->gallery_images);
    ?>
    <div class="quickview-product-slider swiper">
        <div class="swiper-wrapper">
            <?php $__currentLoopData = $galleryImages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $galleryImage): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="swiper-slide text-center">
                    <img src="<?php echo e(uploadedAsset($galleryImage)); ?>" alt="<?php echo e($product->collectLocalization('name')); ?>"
                        class="img-fluid">
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
    <div class="product-thumbnail-slider swiper mt-80">
        <div class="swiper-wrapper">
            <?php $__currentLoopData = $galleryImages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $galleryImage): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div
                    class="swiper-slide product-thumb-single rounded-2 d-flex align-items-center justify-content-center">
                    <img src="<?php echo e(uploadedAsset($galleryImage)); ?>?thumb"
                        alt="<?php echo e($product->collectLocalization('name')); ?>" class="img-fluid">
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        </div>
    </div>
</div>
<?php /**PATH F:\LARAVEL PROJECT\c-grostore-food-grocery-laravel update 9  1\resources\views/frontend/default/pages/partials/products/sliders.blade.php ENDPATH**/ ?>