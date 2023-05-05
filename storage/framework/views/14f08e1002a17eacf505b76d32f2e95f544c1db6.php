<section class="related-product-slider pb-120">
    <div class="container">
        <div class="row align-items-center justify-content-between">
            <div class="col-sm-8">
                <div class="section-title text-center text-sm-start">
                    <h2 class="mb-0">Вам может быть интересно</h2>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="rl-slider-btns text-center text-sm-end mt-3 mt-sm-0">
                    <button class="rl-slider-btn slider-btn-prev"><i class="fas fa-arrow-left"></i></button>
                    <button class="rl-slider-btn slider-btn-next ms-3"><i class="fas fa-arrow-right"></i></button>
                </div>
            </div>
        </div>
        <div class="rl-products-slider swiper mt-8">
            <div class="swiper-wrapper">
                <?php $__empty_1 = true; $__currentLoopData = $relatedProducts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $relatedProduct): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <!-- veritcal product card -->
                    <?php echo $__env->make('frontend.default.pages.partials.products.vertical-product-card', [
                        'product' => $relatedProduct,
                        'bgClass' => 'bg-white',
                    ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    <!-- veritcal product card -->
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <div class="mx-auto w-50 w-md-25">

                        <img src="<?php echo e(staticAsset('frontend/default/assets/img/empty-cart.svg')); ?>" alt=""
                            srcset="" class="img-fluid">
                    </div>
                <?php endif; ?>

            </div>
        </div>
    </div>
</section>
<?php /**PATH F:\LARAVEL PROJECT\c-grostore-food-grocery-laravel update 9  1\resources\views/frontend/default/pages/partials/products/related-products.blade.php ENDPATH**/ ?>