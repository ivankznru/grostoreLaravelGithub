<section class="pb-120 position-relative z-1 pt-120">
    <div class="container">
        <div class="row g-4 align-items-center justify-content-center">
            <div class="col-xxl-4 col-xl-5 order-2 order-xxl-1 d-none d-xl-block d-none-1399">
                <a href="<?php echo e(getSetting('best_deal_banner_link')); ?>">
                    <img src="<?php echo e(uploadedAsset(getSetting('best_deal_banner'))); ?>" alt="" class="img-fluid">
                </a>
            </div>
            <div class="col-xxl-8 order-1 order-xxl-2">
                <div
                    class="timing-box d-flex align-items-center justify-content-center justify-content-sm-between rounded-3 flex-wrap gap-3">
                    <h4 class="mb-0">Еженедельные лучшие предложения</h4>
                    <?php
                        $best_deal_end_date = getSetting('best_deal_end_date');
                        if (!is_null($best_deal_end_date)) {
                            $best_deal_end_date = date('m/d/Y H:i:s', strtotime($best_deal_end_date));
                        }
                    ?>

                    <ul class="timing-countdown countdown-timer d-flex align-items-center gap-2"
                        data-date="<?php echo e($best_deal_end_date); ?>">
                        <li
                            class="position-relative z-1 d-flex align-items-center justify-content-center flex-column rounded-2">
                            <h5 class="mb-0 days">00</h5>
                            <span class="gshop-subtitle fs-xxs d-block">Дни</span>
                        </li>
                        <li
                            class="position-relative z-1 d-flex align-items-center justify-content-center flex-column rounded-2">
                            <h5 class="mb-0 hours">00</h5>
                            <span class="gshop-subtitle fs-xxs d-block">Часы</span>
                        </li>
                        <li
                            class="position-relative z-1 d-flex align-items-center justify-content-center flex-column rounded-2">
                            <h5 class="mb-0 minutes">00</h5>
                            <span class="gshop-subtitle fs-xxs d-block">Мин</span>
                        </li>
                        <li
                            class="position-relative z-1 d-flex align-items-center justify-content-center flex-column rounded-2">
                            <h5 class="mb-0 seconds">00</h5>
                            <span class="gshop-subtitle fs-xxs d-block">Сек</span>
                        </li>
                    </ul>
                </div>
                <div class="mt-4">
                    <div class="row g-4">
                        <?php
                            $weekly_best_deals = getSetting('weekly_best_deals') != null ? json_decode(getSetting('weekly_best_deals')) : [];
                            $products = \App\Models\Product::whereIn('id', $weekly_best_deals)->get();
                        ?>

                        <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="col-lg-6">
                                <?php echo $__env->make(
                                    'frontend.default.pages.partials.products.horizontal-product-card',
                                    [
                                        'product' => $product,
                                    ]
                                , \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php /**PATH L:\LARAVEL PROJECT\c-grostore-food-grocery-laravel update 9  2\resources\views/frontend/default/pages/partials/home/bestDeals.blade.php ENDPATH**/ ?>