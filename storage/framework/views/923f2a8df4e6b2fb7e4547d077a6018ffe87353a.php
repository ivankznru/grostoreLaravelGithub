<section class="gshop-hero pt-120 bg-white position-relative z-1 overflow-hidden">
    <img src="<?php echo e(staticAsset('frontend/default/assets/img/shapes/leaf-shadow.png')); ?>" alt="leaf"
        class="position-absolute leaf-shape z--1 rounded-circle d-none d-lg-inline">
    <img src="<?php echo e(staticAsset('frontend/default/assets/img/shapes/mango.png')); ?>" alt="mango"
        class="position-absolute mango z--1" data-parallax='{"y": -120}'>

    <img src="<?php echo e(staticAsset('frontend/default/assets/img/shapes/hero-circle-sm.png')); ?>" alt="circle"
        class="position-absolute hero-circle circle-sm z--1 d-none d-md-inline">

    <div class="container">
        <div class="gshop-hero-slider swiper">
            <div class="swiper-wrapper">

                <?php $__currentLoopData = $sliders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $slider): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="swiper-slide gshop-hero-single">
                        <div class="row align-items-center justify-content-between">
                            <div class="col-xl-5 col-lg-7">
                                <div class="hero-left-content">
                                    <span
                                        class="gshop-subtitle fs-5 text-secondary mb-2 d-block"><?php echo e($slider->sub_title); ?></span>
                                    <h1 class="display-4 mb-3"><?php echo e($slider->title); ?></h1>
                                    <p class="mb-5 fs-6"><?php echo e($slider->text); ?></p>

                                    <div class="hero-btns d-flex align-items-center gap-3 gap-sm-5 flex-wrap">
                                        <a href="<?php echo e($slider->link); ?>"
                                            class="btn btn-secondary">Исследуйте сейчас<span
                                                class="ms-2"><i class="fa-solid fa-arrow-right"></i></span></a>
                                        <a href="<?php echo e(route('home.pages.aboutUs')); ?>"
                                            class="btn btn-primary">О нас<span class="ms-2"><i
                                                    class="fa-solid fa-arrow-right"></i></span></a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-5">
                                <div class="hero-right text-center position-relative z-1 mt-6 mt-xl-0">

                                    <img src="<?php echo e(uploadedAsset($slider->image)); ?>" alt=""
                                        class="img-fluid position-absolute end-0 top-50 hero-img">

                                    <img src="<?php echo e(staticAsset('frontend/default/assets/img/shapes/hero-circle-lg.png')); ?>"
                                        alt="circle shape" class="img-fluid hero-circle">
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
    </div>
    <div class="at-header-social d-none d-xl-flex align-items-center position-absolute">
        <span class="title fw-medium">Следовать по</span>
        <ul class="social-list ms-3">
            <li>
                <a href="<?php echo e(getSetting('facebook_link')); ?>" target="_blank"><i class="fab fa-facebook-f"></i></a>
            </li>
            <li><a href="<?php echo e(getSetting('twitter_link')); ?>" target="_blank"><i class="fab fa-twitter"></i></a></li>
            <li><a href="<?php echo e(getSetting('linkedin_link')); ?>" target="_blank"><i class="fab fa-linkedin-in"></i></a></li>
            <li><a href="<?php echo e(getSetting('youtube_link')); ?>" target="_blank"><i class="fab fa-youtube"></i></a></li>
        </ul>
    </div>
    <div class="gshop-hero-slider-pagination theme-slider-control position-absolute top-50 translate-middle-y z-5">
    </div>
</section>
<?php /**PATH F:\LARAVEL PROJECT\c-grostore-food-grocery-laravel update 9  1\resources\views/frontend/default/pages/partials/home/hero.blade.php ENDPATH**/ ?>