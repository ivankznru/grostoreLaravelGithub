<section class="ptb-120 bg-shade position-relative overflow-hidden z-1 feedback-section">
    <img src="<?php echo e(staticAsset('frontend/default/assets/img/shapes/bg-shape-5.png')); ?>" alt="bg shape"
        class="position-absolute start-0 bottom-0 z--1 w-100">
    <img src="<?php echo e(staticAsset('frontend/default/assets/img/shapes/map-bg.png')); ?>" alt="map"
        class="position-absolute start-50 top-50 translate-middle z--1">
    <img src="<?php echo e(staticAsset('frontend/default/assets/img/shapes/fd-1.png')); ?>" alt="shape"
        class="position-absolute z--1 fd-1">
    <img src="<?php echo e(staticAsset('frontend/default/assets/img/shapes/fd-2.png')); ?>" alt="shape"
        class="position-absolute z--1 fd-2">
    <img src="<?php echo e(staticAsset('frontend/default/assets/img/shapes/fd-3.png')); ?>" alt="shape"
        class="position-absolute z--1 fd-3">
    <img src="<?php echo e(staticAsset('frontend/default/assets/img/shapes/fd-4.png')); ?>" alt="shape"
        class="position-absolute z--1 fd-4">
    <img src="<?php echo e(staticAsset('frontend/default/assets/img/shapes/fd-5.png')); ?>" alt="shape"
        class="position-absolute z--1 fd-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-6">
                <div class="section-title text-center">
                    <h2 class="mb-6">Что говорят наши клиенты</h2>
                </div>
            </div>
            <div class="col-xl-8">
                <div class="gshop-feedback-slider-wrapper">
                    <div class="swiper gshop-feedback-thumb-slider">
                        <div class="swiper-wrapper">
                            <?php $__currentLoopData = $client_feedback; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $feedback): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="swiper-slide control-thumb">
                                    <img src="<?php echo e(uploadedAsset($feedback->image)); ?>" alt="clients"
                                        class="img-fluid rounded-circle">
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    </div>
                    <div class="swiper gshop-feedback-slider mt-4">
                        <div class="swiper-wrapper">
                            <?php $__currentLoopData = $client_feedback; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $feedback): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="swiper-slide feedback-single text-center">
                                    <p class="mb-5"><?php echo e($feedback->review); ?></p>
                                    <span
                                        class="clients_name text-dark fw-bold d-block mb-1"><?php echo e($feedback->name); ?></span>
                                    <ul class="star-rating fs-sm d-inline-flex align-items-center text-warning">
                                        <?php echo e(renderStarRatingFront($feedback->rating)); ?>

                                    </ul>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php /**PATH F:\LARAVEL PROJECT\cgrostorefoodgrocerylaravel 92\resources\views/frontend/default/pages/partials/home/feedback.blade.php ENDPATH**/ ?>