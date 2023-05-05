

<?php
    $detailedProduct = $product;
?>

<?php $__env->startSection('title'); ?>
    <?php if($detailedProduct->meta_title): ?>
        <?php echo e($detailedProduct->meta_title); ?>

    <?php else: ?>
        Информация о продукте <?php echo e(getSetting('title_separator')); ?> <?php echo e(getSetting('system_title')); ?>

    <?php endif; ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('meta_description'); ?>
    <?php echo e($detailedProduct->meta_description); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('meta_keywords'); ?>
    <?php $__currentLoopData = $detailedProduct->tags; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php echo e($tag->name); ?> <?php if(!$loop->last): ?>
            ,
        <?php endif; ?>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('meta'); ?>
    <!-- Schema.org markup for Google+ -->
    <meta itemprop="name" content="<?php echo e($detailedProduct->meta_title); ?>">
    <meta itemprop="description" content="<?php echo e($detailedProduct->meta_description); ?>">
    <meta itemprop="image" content="<?php echo e(uploadedAsset($detailedProduct->meta_img)); ?>">

    <!-- Twitter Card data -->
    <meta name="twitter:card" content="product">
    <meta name="twitter:site" content="@publisher_handle">
    <meta name="twitter:title" content="<?php echo e($detailedProduct->meta_title); ?>">
    <meta name="twitter:description" content="<?php echo e($detailedProduct->meta_description); ?>">
    <meta name="twitter:creator" content="@author_handle">
    <meta name="twitter:image" content="<?php echo e(uploadedAsset($detailedProduct->meta_img)); ?>">
    <meta name="twitter:data1" content="<?php echo e(formatPrice($detailedProduct->min_price)); ?>">
    <meta name="twitter:label1" content="Price">

    <!-- Open Graph data -->
    <meta property="og:title" content="<?php echo e($detailedProduct->meta_title); ?>" />
    <meta property="og:type" content="og:product" />
    <meta property="og:url" content="<?php echo e(route('products.show', $detailedProduct->slug)); ?>" />
    <meta property="og:image" content="<?php echo e(uploadedAsset($detailedProduct->meta_img)); ?>" />
    <meta property="og:description" content="<?php echo e($detailedProduct->meta_description); ?>" />
    <meta property="og:site_name" content="<?php echo e(getSetting('meta_title')); ?>" />
    <meta property="og:price:amount" content="<?php echo e(formatPrice($detailedProduct->min_price)); ?>" />
    <meta property="product:price:currency" content="<?php echo e(env('DEFAULT_CURRENCY')); ?>" />
    <meta property="fb:app_id" content="<?php echo e(env('FACEBOOK_PIXEL_ID')); ?>">
<?php $__env->stopSection(); ?>


<?php $__env->startSection('breadcrumb-contents'); ?>
    <div class="breadcrumb-content">
        <h2 class="mb-2 text-center">Информация о продукте</h2>
        <nav>
            <ol class="breadcrumb justify-content-center">
                <li class="breadcrumb-item fw-bold" aria-current="page"><a
                        href="<?php echo e(route('home')); ?>">Домашная страница</a></li>
                <li class="breadcrumb-item fw-bold" aria-current="page">Продукты</li>
                <li class="breadcrumb-item active fw-bold" aria-current="page">Информация о продукте</li>
            </ol>
        </nav>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('contents'); ?>
    <!--breadcrumb-->
    <?php echo $__env->make('frontend.default.inc.breadcrumb', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <!--breadcrumb-->

    <!--product details start-->
    <section class="product-details-area ptb-120">
        <div class="container">
            <div class="row g-4">
                <div class="col-xl-9">
                    <div class="product-details">
                        <!-- product-view-box -->
                        <?php echo $__env->make(
                            'frontend.default.pages.partials.products.product-view-box',
                            compact('product'), \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        <!-- product-view-box -->

                        <!-- description -->
                        <?php echo $__env->make(
                            'frontend.default.pages.partials.products.description',
                            compact('product'), \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        <!-- description -->
                    </div>

                    <div class="col-xl-3 col-lg-6 col-md-8 d-none d-xl-block">
                        <div class="gshop-sidebar">
                            <div class="sidebar-widget info-sidebar bg-white rounded-3 py-3">
                                <?php $__currentLoopData = $product_page_widgets; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $widget): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="sidebar-info-list d-flex align-items-center gap-3 p-4">
                                        <span
                                            class="icon-wrapper d-inline-flex align-items-center justify-content-center rounded-circle text-primary">
                                            <img src="<?php echo e(uploadedAsset($widget->image)); ?>" class="img-fluid"
                                                alt="">
                                        </span>
                                        <div class="info-right">
                                            <h6 class="mb-1 fs-md"><?php echo e($widget->title); ?></h6>
                                            <span class="fw-medium fs-xs"><?php echo e($widget->sub_title); ?></span>
                                        </div>
                                    </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                            <div class="sidebar-widget banner-widget mt-4">
                                <a href="<?php echo e(getSetting('product_page_banner_link')); ?>">
                                    <img src="<?php echo e(uploadedAsset(getSetting('product_page_banner'))); ?>" alt=""
                                        class="img-fluid">
                                </a>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
    </section>
    <!--product details end-->

    <!--related product slider start -->
    <?php echo $__env->make('frontend.default.pages.partials.products.related-products', [
        'relatedProducts' => $relatedProducts,
    ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <!--related products slider end-->
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.default.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH F:\LARAVEL PROJECT\c-grostore-food-grocery-laravel update 9  1\resources\views/frontend/default/pages/products/show.blade.php ENDPATH**/ ?>