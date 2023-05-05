
<?php $__env->startSection('contents'); ?>
    <section class="section-404 ptb-120 position-relative overflow-hidden z-1">
        <img src="<?php echo e(staticAsset('frontend/default/assets/img/shapes/frame-circle.svg')); ?>" alt="frame circle"
            class="position-absolute z--1 frame-circle d-none d-sm-block">
        <img src="<?php echo e(staticAsset('frontend/default/assets/img/shapes/cauliflower.png')); ?>" alt="cauliflower"
            class="position-absolute cauliflower z--1 d-none d-sm-block">
        <img src="<?php echo e(staticAsset('frontend/default/assets/img/shapes/leaf.svg')); ?>" alt="leaf"
            class="position-absolute leaf z--1 d-none d-sm-block">
        <img src="<?php echo e(staticAsset('frontend/default/assets/img/shapes/pata-xs.svg')); ?>" alt="pata"
            class="position-absolute pata z--1 d-none d-sm-block">
        <img src="<?php echo e(staticAsset('frontend/default/assets/img/shapes/tomato-half.svg')); ?>" alt="tomato"
            class="position-absolute tomato-half z--1 d-none d-sm-block">
        <img src="<?php echo e(staticAsset('frontend/default/assets/img/shapes/garlic-white.png')); ?>" alt="garlic"
            class="position-absolute garlic-white z--1 d-none d-sm-block">
        <img src="<?php echo e(staticAsset('frontend/default/assets/img/shapes/tomato-slice.svg')); ?>" alt="tomato"
            class="position-absolute tomato-slice z--1 d-none d-sm-block">
        <img src="<?php echo e(staticAsset('frontend/default/assets/img/shapes/onion.png')); ?> " alt="onion"
            class="position-absolute onion z--1 d-none d-sm-block">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-6">
                    <div class="content-404 text-center">
                        <img src="<?php echo e(staticAsset('frontend/default/assets/img/500.png')); ?>" alt="not found"
                            class="img-fluid mb-5 d-none d-md-inline-block w-50">
                        <h3 class="fw-bold display-1 mb-0">500</h3>
                        <h2 class="mt-3">Извините, внутренняя ошибка сервера</h2>
                        <p class="mb-6">Страница, которую вы ищете, возможно, была удалена из-за изменения ее названия или
                            временно недоступна.</p>
                        <a href="<?php echo e(env('APP_URL')); ?>" class="btn btn-secondary btn-md rounded-1">Вернуться на главную страницу</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.default.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH L:\LARAVEL PROJECT\cgrostorefoodgrocerylaravel 92\resources\views/errors/500.blade.php ENDPATH**/ ?>