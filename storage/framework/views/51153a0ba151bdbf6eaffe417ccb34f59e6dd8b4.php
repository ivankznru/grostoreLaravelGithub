<div class="gstore-product-quick-view bg-white rounded-3 py-6 px-4">
    <div class="row g-4">
        <div class="col-xl-6 align-self-end">
            <!-- sliders -->
            <?php echo $__env->make('frontend.default.pages.partials.products.sliders', compact('product'), \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <!-- sliders -->
        </div>
        <div class="col-xl-6">
            <div class="product-info">
                <h3 class="mt-1 mb-3 h5"><?php echo e($product->collectLocalization('name')); ?></h3>

                <!-- pricing -->
                <div class="pricing all-pricing mt-2">
                    <?php echo $__env->make('frontend.default.pages.partials.products.pricing', compact('product'), \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </div>
                <!-- pricing -->

                <!-- selected variation pricing -->
                <div class="pricing variation-pricing mt-2 d-none">

                </div>
                <!-- selected variation pricing -->

                <div class="widget-title d-flex mt-4">
                    <h6 class="mb-1 flex-shrink-0">Описание</h6>
                    <span class="hr-line w-100 position-relative d-block align-self-end ms-1"></span>
                </div>
                <p class="mb-3">
                    <?php echo e($product->collectLocalization('short_description')); ?>

                </p>

                <form action="" class="add-to-cart-form">
                    <?php
                        $isVariantProduct = 0;
                        $stock = 0;
                        if ($product->variations()->count() > 1) {
                            $isVariantProduct = 1;
                        } else {
                            $stock = $product->variations[0]->product_variation_stock ? $product->variations[0]->product_variation_stock->stock_qty : 0;
                        }
                    ?>

                    <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
                    <input type="hidden" name="product_variation_id"
                        <?php if(!$isVariantProduct): ?> value="<?php echo e($product->variations[0]->id); ?>" <?php endif; ?>>

                    <!-- variations -->
                    <?php echo $__env->make('frontend.default.pages.partials.products.variations', compact('product'), \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    <!-- variations -->

                    <div class="d-flex align-items-center gap-3 flex-wrap mt-5">
                        <div class="product-qty qty-increase-decrease d-flex align-items-center">
                            <button type="button" class="decrease">-</button>
                            <input type="text" readonly value="1" name="quantity" min="1"
                                <?php if(!$isVariantProduct): ?> max="<?php echo e($stock); ?>" <?php endif; ?>>
                            <button type="button" class="increase">+</button>
                        </div>

                        <button type="submit" class="btn btn-secondary btn-md add-to-cart-btn"
                            <?php if(!$isVariantProduct && $stock < 1): ?> disabled <?php endif; ?>>
                            <span class="me-2">
                                <i class="fa-solid fa-bag-shopping"></i>
                            </span>
                            <span class="add-to-cart-text">
                                <?php if(!$isVariantProduct && $stock < 1): ?>
                                    Распродано
                                <?php else: ?>
                                    Добавить в корзину
                                <?php endif; ?>
                            </span>
                        </button>

                        <button type="button" class="btn btn-primary btn-md"
                            onclick="addToWishlist(<?php echo e($product->id); ?>)">
                            <i class="fa-solid fa-heart"></i>
                        </button>
                    </div>

                    <!--product category start-->
                    <?php if($product->categories()->count() > 0): ?>
                        <div class="tt-category-tag mt-4">
                            <?php $__currentLoopData = $product->categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <a href="<?php echo e(route('products.index')); ?>?&category_id=<?php echo e($category->id); ?>"
                                    class="text-muted fs-xxs"><?php echo e($category->collectLocalization('name')); ?></a>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    <?php endif; ?>
                    <!--product category end-->
                </form>

            </div>
        </div>
    </div>
</div>
<?php /**PATH F:\LARAVEL PROJECT\c-grostore-food-grocery-laravel update 9  1\resources\views/frontend/default/pages/partials/products/product-view-box.blade.php ENDPATH**/ ?>