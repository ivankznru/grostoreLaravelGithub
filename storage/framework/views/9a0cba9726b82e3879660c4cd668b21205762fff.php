<section class="pt-8 pb-100 bg-white position-relative overflow-hidden z-1 trending-products-area">
    <img src="<?php echo e(staticAsset('frontend/default/assets/img/shapes/garlic.png')); ?>" alt="garlic"
        class="position-absolute garlic z--1" data-parallax='{"y": 100}'>
    <img src="<?php echo e(staticAsset('frontend/default/assets/img/shapes/carrot.png')); ?>" alt="carrot"
        class="position-absolute carrot z--1" data-parallax='{"y": -100}'>
    <img src="<?php echo e(staticAsset('frontend/default/assets/img/shapes/mashrom.png')); ?>" alt="mashrom"
        class="position-absolute mashrom z--1" data-parallax='{"x": 100}'>
    <div class="container">
        <div class="row align-items-center">
            <div class="col-xl-5">
                <div class="section-title text-center text-xl-start">
                    <h3 class="mb-0">Самые популярные продукты</h3>
                </div>
            </div>
            <div class="col-xl-7">
                <div class="filter-btns gshop-filter-btn-group text-center text-xl-end mt-4 mt-xl-0">

                    <?php
                        $trending_product_categories = getSetting('trending_product_categories') != null ? json_decode(getSetting('trending_product_categories')) : [];
                        $categories = \App\Models\Category::whereIn('id', $trending_product_categories)->get();
                    ?>
                    <button class="active" data-filter="*"><?php echo e(localize('All Products')); ?></button>
                    <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <button data-filter=".<?php echo e($category->id); ?>"><?php echo e($category->collectLocalization('name')); ?></button>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
        </div>
        <div class="row justify-content-center g-4 mt-5 filter_group">

            <?php
                $trending_products = getSetting('top_trending_products') != null ? json_decode(getSetting('top_trending_products')) : [];
                $products = \App\Models\Product::whereIn('id', $trending_products)->get();
            ?>

            <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div
                    class="col-xxl-3 col-lg-4 col-md-6 col-sm-10 filter_item
                    <?php
if($product->categories()->count() > 0){
                            foreach ($product->categories as $category) {
                               echo $category->id .' ';
                            }
                        } ?>">
                    <?php echo $__env->make('frontend.default.pages.partials.products.trending-product-card', [
                        'product' => $product,
                    ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
</section>
<?php /**PATH L:\LARAVEL PROJECT\cgrostorefoodgrocerylaravel 92\resources\views/frontend/default/pages/partials/home/trendingProducts.blade.php ENDPATH**/ ?>