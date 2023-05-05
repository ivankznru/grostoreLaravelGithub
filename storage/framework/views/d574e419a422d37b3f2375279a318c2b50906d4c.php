

<?php $__env->startSection('title'); ?>
    Купоны <?php echo e(getSetting('title_separator')); ?> <?php echo e(getSetting('system_title')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb-contents'); ?>
    <div class="breadcrumb-content">
        <h2 class="mb-2 text-center">Все купоны</h2>
        <nav>
            <ol class="breadcrumb justify-content-center">
                <li class="breadcrumb-item fw-bold" aria-current="page"><a
                        href="<?php echo e(route('home')); ?>">Домашная страница</a></li>
                <li class="breadcrumb-item fw-bold" aria-current="page">Купоны</li>
            </ol>
        </nav>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('contents'); ?>
    <!--breadcrumb-->
    <?php echo $__env->make('frontend.default.inc.breadcrumb', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <!--breadcrumb-->

    <!--campaign section start-->
    <section class="tt-campaigns ptb-100">
        <div class="container">
            <div class="row g-4">

                <?php
                    $coupons = \App\Models\Coupon::where('end_date', '>=', strtotime(date('Y-m-d')))
                        ->latest()
                        ->get();
                ?>

                <?php $__empty_1 = true; $__currentLoopData = $coupons; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $coupon): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <div class="col-lg-4 col-md-6">
                        <div class="card shadow-lg border-0 tt-coupon-single tt-gradient-top"
                            style="background:
          url('<?php echo e(uploadedAsset($coupon->banner)); ?>')no-repeat center
          center / cover">
                            <div class="card-body text-center py-5 px-4">
                                <div class="offer-text mb-2 justify-content-center">
                                    <div class="up-to fw-bold text-light">Вплоть до</div>
                                    <div class="display-4 fw-bold text-danger">
                                        <?php echo e($coupon->discount_type != 'flat' ? $coupon->discount_value : formatPrice($coupon->discount_value)); ?>

                                    </div>
                                    <p class="mb-0 fw-bold text-danger">
                                        <span><?php echo e($coupon->discount_type != 'flat' ? '%' : ''); ?></span> <br>
                                        Выключенный
                                    </p>
                                </div>
                                <div class="coupon-row">
                                    <span class="copyCode"><?php echo e($coupon->code); ?></span>
                                    <span class="copyBtn copy-text"
                                        data-clipboard-text="<?php echo e($coupon->code); ?>">Копировать код</span>
                                </div>
                                <ul class="timing-countdown countdown-timer d-inline-block gap-2 mt-3"
                                    data-date="<?php echo e(date('m/d/Y', $coupon->end_date)); ?> 23:59:59">
                                    <li class="list-inline-item bg-white position-relative z-1 rounded-2">
                                        <h5 class="mb-1 days fs-sm">00</h5>
                                        <span class="gshop-subtitle fs-xxs d-block">Дни</span>
                                    </li>
                                    <li class="list-inline-item bg-white position-relative z-1 rounded-2">
                                        <h5 class="mb-1 hours fs-sm">00</h5>
                                        <span class="gshop-subtitle fs-xxs d-block">Часы</span>
                                    </li>
                                    <li class="list-inline-item bg-white position-relative z-1 rounded-2">
                                        <h5 class="mb-1 minutes fs-sm">00</h5>
                                        <span class="gshop-subtitle fs-xxs d-block">Мин</span>
                                    </li>
                                    <li class="list-inline-item bg-white position-relative z-1 rounded-2">
                                        <h5 class="mb-1 seconds fs-sm">00</h5>
                                        <span class="gshop-subtitle fs-xxs d-block">Сек</span>
                                    </li>
                                </ul>

                            </div>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <div class="col-12 col-md-6 mx-auto">

                        <img src="<?php echo e(staticAsset('frontend/default/assets/img/no-data-found.png')); ?>" class="img-fluid"
                            alt="">
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </section>
    <!--campaign section end-->
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.default.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH L:\LARAVEL PROJECT\cgrostorefoodgrocerylaravel 92\resources\views/frontend/default/pages/coupons/index.blade.php ENDPATH**/ ?>