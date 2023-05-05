<section class="position-relative banner-section z-1 overflow-hidden">
    <img src="<?php echo e(staticAsset('frontend/default/assets/img/shapes/bg-shape-4.png')); ?>" alt="bg shape"
        class="position-absolute start-0 bottom-0 w-100 z--1">
    <div class="container">
        <div class="row g-4">
            <div class="col-xl-8">
                <a href="<?php echo e(getSetting('banner_section_two_banner_one_link')); ?>">
                    <img src="<?php echo e(uploadedAsset(getSetting('banner_section_two_banner_one'))); ?>" alt=""
                        srcset="" class="img-fluid w-100 h-100">
                </a>
            </div>
            <div class="col-xl-4 d-none d-xl-block">
                <a href="<?php echo e(getSetting('banner_section_two_banner_two_link')); ?>">
                    <img src="<?php echo e(uploadedAsset(getSetting('banner_section_two_banner_two'))); ?>" alt=""
                        srcset="" class="img-fluid w-100 h-100">
                </a>
            </div>
        </div>
    </div>
</section>
<?php /**PATH F:\LARAVEL PROJECT\cgrostorefoodgrocerylaravel 92\resources\views/frontend/default/pages/partials/home/bannersTwo.blade.php ENDPATH**/ ?>