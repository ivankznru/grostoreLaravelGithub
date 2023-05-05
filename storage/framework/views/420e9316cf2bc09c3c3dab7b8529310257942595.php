

<?php $__env->startSection('title'); ?>
    Продукты <?php echo e(getSetting('title_separator')); ?> <?php echo e(getSetting('system_title')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb-contents'); ?>
    <div class="breadcrumb-content">
        <h2 class="mb-2 text-center">Продукты</h2>
        <nav>
            <ol class="breadcrumb justify-content-center">
                <li class="breadcrumb-item fw-bold" aria-current="page"><a
                        href="<?php echo e(route('home')); ?>">Домашная страница</a></li>
                <li class="breadcrumb-item fw-bold" aria-current="page">Продукты</li>
            </ol>
        </nav>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('contents'); ?>
    <!--breadcrumb-->
    <?php echo $__env->make('frontend.default.inc.breadcrumb', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <!--breadcrumb-->

    <form class="filter-form" action="<?php echo e(Request::fullUrl()); ?>" method="GET">
        <!--shop grid section start-->
        <section class="gshop-gshop-grid ptb-120">
            <div class="container">
                <div class="row g-4">
                    <div class="col-xl-3 d-none d-xl-block">
                        <div class="gshop-sidebar bg-white rounded-2 overflow-hidden">
                            <!--Filter by search-->
                            <div class="sidebar-widget search-widget bg-white py-5 px-4">
                                <div class="widget-title d-flex">
                                    <h6 class="mb-0 flex-shrink-0">Ищи сейчас</h6>
                                    <span class="hr-line w-100 position-relative d-block align-self-end ms-1"></span>
                                </div>
                                <div class="search-form d-flex align-items-center mt-4">
                                    <input type="hidden" name="view" value="<?php echo e(request()->view); ?>">
                                    <input type="text" id="search" name="search"
                                        <?php if(isset($searchKey)): ?>
                               value="<?php echo e($searchKey); ?>"
                               <?php endif; ?>
                                        placeholder="Поиск">
                                    <button type="submit" class="submit-icon-btn-secondary"><i
                                            class="fa-solid fa-magnifying-glass"></i></button>
                                </div>
                            </div>
                            <!--Filter by search-->
                            <!--Filter by Categories-->
                            <div class="sidebar-widget category-widget bg-white py-5 px-4 border-top">
                                <div class="widget-title d-flex">
                                    <h6 class="mb-0 flex-shrink-0">Категории</h6>
                                    <span class="hr-line w-100 position-relative d-block align-self-end ms-1"></span>
                                </div>
                                <ul class="widget-nav mt-4">

                                    <?php
                                        $product_listing_categories = getSetting('product_listing_categories') != null ? json_decode(getSetting('product_listing_categories')) : [];
                                        $categories = \App\Models\Category::whereIn('id', $product_listing_categories)->get();
                                    ?>
                                    <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php
                                            $productsCount = \App\Models\ProductCategory::where('category_id', $category->id)->count();
                                        ?>
                                        <li><a href="<?php echo e(route('products.index')); ?>?&category_id=<?php echo e($category->id); ?>"
                                                class="d-flex justify-content-between align-items-center"><?php echo e($category->collectLocalization('name')); ?><span
                                                    class="fw-bold fs-xs total-count"><?php echo e($productsCount); ?></span></a></li>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                </ul>
                            </div>
                            <!--Filter by Categories-->

                            <!--Filter by Price-->
                            <div class="sidebar-widget price-filter-widget bg-white py-5 px-4 border-top">
                                <div class="widget-title d-flex">
                                    <h6 class="mb-0 flex-shrink-0">Фильтровать по цене</h6>
                                    <span class="hr-line w-100 position-relative d-block align-self-end ms-1"></span>
                                </div>
                                <div class="at-pricing-range mt-4">
                                    <form class="range-slider-form">
                                        <div class="price-filter-range"></div>
                                        <div class="d-flex align-items-center mt-3">
                                            <input type="number" min="0" oninput="validity.valid||(value='0');"
                                                class="min_price price-range-field price-input price-input-min"
                                                name="min_price" data-value="<?php echo e($min_value); ?>" data-min-range="0">
                                            <span class="d-inline-block ms-2 me-2 fw-bold">-</span>

                                            <input type="number" max="<?php echo e($max_range); ?>"
                                                oninput="validity.valid||(value='<?php echo e($max_range); ?>');"
                                                class="max_price price-range-field price-input price-input-max"
                                                name="max_price" data-value="<?php echo e($max_value); ?>"
                                                data-max-range="<?php echo e($max_range); ?>">

                                        </div>
                                        <button type="submit"
                                            class="btn btn-primary btn-sm mt-3">Фильтр</button>
                                    </form>
                                </div>
                            </div>
                            <!--Filter by Price-->

                            <!--Filter by Tags-->
                            <div class="sidebar-widget tags-widget py-5 px-4 bg-white">
                                <div class="widget-title d-flex">
                                    <h6 class="mb-0">Теги</h6>
                                    <span class="hr-line w-100 position-relative d-block align-self-end ms-1"></span>
                                </div>
                                <div class="mt-4 d-flex gap-2 flex-wrap">
                                    <?php $__currentLoopData = $tags; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <a href="<?php echo e(route('products.index')); ?>?&tag_id=<?php echo e($tag->id); ?>"
                                            class="btn btn-outline btn-sm"><?php echo e($tag->name); ?></a>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </div>
                            </div>
                            <!--Filter by Tags-->
                        </div>
                    </div>

                    <!--rightbar-->
                    <div class="col-xl-9">
                        <div class="shop-grid">
                            <!--filter-->
                            <div
                                class="listing-top d-flex align-items-center justify-content-between flex-wrap gap-3 bg-white rounded-2 px-4 py-4 mb-5">
                                <p class="mb-0 fw-bold">Показаны
                                    <?php echo e($products->firstItem()); ?>-<?php echo e($products->lastItem()); ?> Выкл
                                    <?php echo e($products->total()); ?> Результаты</p>
                                <div class="listing-top-right text-end d-inline-flex align-items-center gap-3 flex-wrap">
                                    <div class="number-count-filter d-flex align-items-center gap-3">
                                        <label
                                            class="fw-bold fs-xs text-dark flex-shrink-0">Показать:</label>
                                        <input type="number"
                                            <?php if(isset($per_page)): ?>
                                        value="<?php echo e($per_page); ?>"
                                        <?php else: ?>
                                        value="9"
                                        <?php endif; ?>
                                            name="per_page" class="product-listing-pagination">
                                    </div>
                                    <div class="select-filter d-inline-flex align-items-center gap-3">
                                        <label
                                            class="fw-bold fs-xs text-dark flex-shrink-0">Сортировать по:</label>
                                        <select name="sort_by"
                                            class="sort_by form-select fs-xxs fw-medium theme-select select-sm">
                                            <option value="new"
                                                <?php if(isset($sort_by)): ?>
                                                <?php if($sort_by == 'new'): ?>
                                                selected
                                                <?php endif; ?>
                                            <?php endif; ?>>
                                                Новички вперед</option>
                                            <option value="best_selling"
                                                <?php if(isset($sort_by)): ?>
                                            <?php if($sort_by == 'best_selling'): ?>
                                            selected
                                            <?php endif; ?>
                                        <?php endif; ?>>
                                                Бестселлер</option>
                                        </select>
                                    </div>
                                    <a href="<?php echo e(route('products.index')); ?>?view=grid"
                                        class="grid-btn <?php echo e(request()->view != 'list' ? 'active' : ''); ?>">
                                        <svg width="17" height="16" viewBox="0 0 17 16" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M5.97196 0H1.37831C0.706579 0 0.160156 0.546422 0.160156 1.21815V5.8118C0.160156 6.48353 0.706579 7.02996 1.37831 7.02996H5.97196C6.64369 7.02996 7.19011 6.48353 7.19011 5.8118V1.21815C7.19 0.546422 6.64369 0 5.97196 0Z"
                                                fill="#FF7C08" />
                                            <path
                                                d="M14.9407 0H10.3471C9.67533 0 9.12891 0.546422 9.12891 1.21815V5.8118C9.12891 6.48353 9.67533 7.02996 10.3471 7.02996H14.9407C15.6124 7.02996 16.1589 6.48353 16.1589 5.8118V1.21815C16.1589 0.546422 15.6124 0 14.9407 0Z"
                                                fill="#FF7C08" />
                                            <path
                                                d="M5.97196 8.96973H1.37831C0.706579 8.96973 0.160156 9.51609 0.160156 10.1878V14.7815C0.160156 15.4532 0.706579 15.9996 1.37831 15.9996H5.97196C6.64369 15.9996 7.19011 15.4532 7.19011 14.7815V10.1878C7.19 9.51609 6.64369 8.96973 5.97196 8.96973Z"
                                                fill="#FF7C08" />
                                            <path
                                                d="M14.9407 8.96973H10.3471C9.67533 8.96973 9.12891 9.51615 9.12891 10.1879V14.7815C9.12891 15.4533 9.67533 15.9997 10.3471 15.9997H14.9407C15.6124 15.9996 16.1589 15.4532 16.1589 14.7815V10.1878C16.1589 9.51609 15.6124 8.96973 14.9407 8.96973Z"
                                                fill="#FF7C08" />
                                        </svg>
                                    </a>
                                    <a href="<?php echo e(route('products.index')); ?>?view=list"
                                        class="grid-btn <?php echo e(request()->view == 'list' ? 'active' : ''); ?>">
                                        <svg width="21" height="16" viewBox="0 0 21 16" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M2.31378 0C1.12426 0 0.160156 0.9641 0.160156 2.15359C0.160156 3.34309 1.12426 4.30722 2.31378 4.30722C3.50328 4.30722 4.46738 3.34312 4.46738 2.15359C4.46738 0.964066 3.50328 0 2.31378 0ZM2.31378 5.74293C1.12426 5.74293 0.160156 6.70706 0.160156 7.89656C0.160156 9.08608 1.12426 10.0502 2.31378 10.0502C3.50328 10.0502 4.46738 9.08608 4.46738 7.89656C4.46738 6.70706 3.50328 5.74293 2.31378 5.74293ZM2.31378 11.4859C1.12426 11.4859 0.160156 12.45 0.160156 13.6395C0.160156 14.829 1.12426 15.7931 2.31378 15.7931C3.50328 15.7931 4.46738 14.829 4.46738 13.6395C4.46738 12.45 3.50328 11.4859 2.31378 11.4859ZM8.05671 3.58933H19.5426C20.3358 3.58933 20.9783 2.94683 20.9783 2.15359C20.9783 1.36036 20.3358 0.717853 19.5426 0.717853H8.05671C7.26348 0.717853 6.62097 1.36036 6.62097 2.15359C6.62097 2.94683 7.26348 3.58933 8.05671 3.58933ZM19.5426 6.46082H8.05671C7.26348 6.46082 6.62097 7.10332 6.62097 7.89656C6.62097 8.68979 7.26348 9.3323 8.05671 9.3323H19.5426C20.3358 9.3323 20.9783 8.68979 20.9783 7.89656C20.9783 7.10332 20.3358 6.46082 19.5426 6.46082ZM19.5426 12.2038H8.05671C7.26348 12.2038 6.62097 12.8463 6.62097 13.6395C6.62097 14.4327 7.26348 15.0752 8.05671 15.0752H19.5426C20.3358 15.0752 20.9783 14.4327 20.9783 13.6395C20.9783 12.8463 20.3358 12.2038 19.5426 12.2038Z"
                                                fill="#5D6374" />
                                        </svg>
                                    </a>
                                </div>
                            </div>
                            <!--filter-->

                            <!--products-->
                            <div class="row g-4">
                                <?php if(count($products) > 0): ?>
                                    <?php if(request()->has('view') && request()->view == 'list'): ?>
                                        <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <div class="col-xl-12">
                                                <?php echo $__env->make(
                                                    'frontend.default.pages.partials.products.product-card-list',
                                                    [
                                                        'product' => $product,
                                                    ]
                                                , \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                            </div>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php else: ?>
                                        <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <div class="col-lg-4 col-md-6 col-sm-10">
                                                <?php echo $__env->make(
                                                    'frontend.default.pages.partials.products.vertical-product-card',
                                                    [
                                                        'product' => $product,
                                                        'bgClass' => 'bg-white',
                                                    ]
                                                , \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                            </div>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php endif; ?>
                                <?php else: ?>
                                    <div class="col-6 mx-auto">
                                        <img src="<?php echo e(staticAsset('frontend/default/assets/img/empty-cart.svg')); ?>"
                                            alt="" srcset="" class="img-fluid">
                                    </div>
                                <?php endif; ?>

                            </div>
                            <ul class="d-flex align-items-center gap-3 mt-7">
                                <?php echo e($products->appends(request()->input())->links()); ?>

                            </ul>
                            <!--products-->
                        </div>
                    </div>
                    <!--rightbar-->

                </div>
            </div>
        </section>
        <!--shop grid section end-->

    </form>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
    <script>
        "use strict";

        $('.product-listing-pagination').on('focusout', function() {
            $('.filter-form').submit();
        });

        $('.sort_by').on('change', function() {
            $('.filter-form').submit();
        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.default.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH F:\LARAVEL PROJECT\c-grostore-food-grocery-laravel update 9  1\resources\views/frontend/default/pages/products/index.blade.php ENDPATH**/ ?>