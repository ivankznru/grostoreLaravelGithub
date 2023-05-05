<section class="pt-80 pb-120">
    <div class="container">
        <div class="row justify-content-center g-4">
            <!--New Products-->
            <div class="col-xxl-4 col-lg-6">
                <div class="product-listing-box bg-white rounded-2">
                    <div class="d-flex align-items-center justify-content-between gap-3 mb-5 flex-wrap">
                        <h4 class="mb-0">Новые продукты</h4>
                        <a href="<?php echo e(route('products.index')); ?>"
                            class="explore-btn text-secondary fw-bold">Посмотреть больше<span class="ms-2"><i
                                    class="fas fa-arrow-right"></i></span></a>
                    </div>

                    <?php $__currentLoopData = \App\Models\Product::isPublished()->latest()->take(3)->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="mb-3">

                            <?php echo $__env->make('frontend.default.pages.partials.products.horizontal-product-card', [
                                'product' => $product,
                            ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
            <!--New Products-->

            <div class="col-xxl-4 col-lg-6">
                <div class="product-listing-box bg-white rounded-2">
                    <div class="d-flex align-items-center justify-content-between gap-3 mb-5 flex-wrap">
                        <h4 class="mb-0">Бестселлер</h4>
                        <a href="<?php echo e(route('products.index')); ?>"
                            class="explore-btn text-secondary fw-bold">Все продукты<span
                                class="ms-2"><i class="fas fa-arrow-right"></i></span></a>
                    </div>
                    <?php
                        $best_selling_products = getSetting('best_selling_products') != null ? json_decode(getSetting('best_selling_products')) : [];
                        $products = \App\Models\Product::whereIn('id', $best_selling_products)->get();
                    ?>

                    <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="mb-3">
                            <?php echo $__env->make('frontend.default.pages.partials.products.horizontal-product-card', [
                                'product' => $product,
                            ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
            <div class="col-xxl-3 col-xl-4 col-lg-5 col-md-6 col-sm-8 col-10 d-none d-xl-block d-none-1399">
                <a href="<?php echo e(getSetting('best_selling_banner_link')); ?>" class=""><img
                        src="<?php echo e(uploadedAsset(getSetting('best_selling_banner'))); ?>" alt=""
                        class="img-fluid rounded-2 d-flex flex-column h-100"></a>
            </div>
        </div>
    </div>
</section>
<?php /**PATH F:\LARAVEL PROJECT\c-grostore-food-grocery-laravel update 9  1\resources\views/frontend/default/pages/partials/home/products.blade.php ENDPATH**/ ?>