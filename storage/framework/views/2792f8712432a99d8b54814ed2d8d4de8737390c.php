<div class="vertical-product-card rounded-2 position-relative <?php echo e(isset($bgClass) ? $bgClass : ''); ?>">

    <?php
        $discountPercentage = discountPercentage($product);
    ?>

    <?php if($discountPercentage > 0): ?>
        <span class="offer-badge text-white fw-bold fs-xxs bg-danger position-absolute start-0 top-0">
            -<?php echo e(discountPercentage($product)); ?>% <span class="text-uppercase">Выкл</span>
        </span>
    <?php endif; ?>

    <div class="thumbnail position-relative text-center p-4">
        <img src="<?php echo e(uploadedAsset($product->thumbnail_image)); ?>" alt="<?php echo e($product->collectLocalization('name')); ?>"
            class="img-fluid">
        <div class="product-btns position-absolute d-flex gap-2 flex-column">

            <?php if(Auth::check() && Auth::user()->user_type == 'customer'): ?>
                <a href="javascript:void(0);" class="rounded-btn"><i class="fa-regular fa-heart"
                        onclick="addToWishlist(<?php echo e($product->id); ?>)"></i></a>
            <?php elseif(!Auth::check()): ?>
                <a href="javascript:void(0);" class="rounded-btn"><i class="fa-regular fa-heart"
                        onclick="addToWishlist(<?php echo e($product->id); ?>)"></i></a>
            <?php endif; ?>

            <a href="javascript:void(0);" class="rounded-btn" onclick="showProductDetailsModal(<?php echo e($product->id); ?>)"><i
                    class="fa-regular fa-eye"></i></a>
        </div>
    </div>

    <div class="card-content">
        <!--product category start-->
        <div class="mb-2 tt-category tt-line-clamp tt-clamp-1">
            <?php if($product->categories()->count() > 0): ?>
                <?php $__currentLoopData = $product->categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <a href="<?php echo e(route('products.index')); ?>?&category_id=<?php echo e($category->id); ?>"
                        class="d-inline-block text-muted fs-xxs"><?php echo e($category->collectLocalization('name')); ?>

                        <?php if(!$loop->last): ?>
                            ,
                        <?php endif; ?>
                    </a>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php endif; ?>
        </div>
        <!--product category end-->

        <a href="<?php echo e(route('products.show', $product->slug)); ?>"
            class="card-title fw-bold mb-2 tt-line-clamp tt-clamp-1"><?php echo e($product->collectLocalization('name')); ?>

        </a>

        <h6 class="price">
            <?php echo $__env->make('frontend.default.pages.partials.products.pricing', [
                'product' => $product,
                'onlyPrice' => true,
            ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </h6>

        <?php if(isset($showSold)): ?>
            <div class="card-progressbar mt-3 mb-2 rounded-pill">
                <span class="card-progress bg-primary" data-progress="<?php echo e(sellCountPercentage($product)); ?>%"
                    style="width: <?php echo e(sellCountPercentage($product)); ?>%;"></span>
            </div>
            <p class="mb-0 fw-semibold"><?php echo e(localize('Total Sold')); ?>: <span
                    class="fw-bold text-secondary"><?php echo e($product->total_sale_count); ?>/<?php echo e($product->sell_target); ?></span>
            </p>
        <?php endif; ?>
    </div>
    <div class="card-btn bg-white">

        <?php
            $isVariantProduct = 0;
            $stock = 0;
            if ($product->variations()->count() > 1) {
                $isVariantProduct = 1;
            } else {
                $stock = $product->variations[0]->product_variation_stock ? $product->variations[0]->product_variation_stock->stock_qty : 0;
            }
        ?>

        <?php if($isVariantProduct): ?>
            <a href="javascript:void(0);" class="btn btn-secondary d-block btn-md rounded-1"
                onclick="showProductDetailsModal(<?php echo e($product->id); ?>)">Добавить в корзину</a>
        <?php else: ?>
            <form action="" class="direct-add-to-cart-form">
                <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
                <input type="hidden" name="product_variation_id" value="<?php echo e($product->variations[0]->id); ?>">
                <input type="hidden" value="1" name="quantity">

                <?php if(!$isVariantProduct && $stock < 1): ?>
                    <a href="javascript:void(0);" class="btn btn-secondary d-block btn-md rounded-1 w-100">
                        Распродано</a>
                <?php else: ?>
                    <a href="javascript:void(0);" onclick="directAddToCartFormSubmit(this)"
                        class="btn btn-secondary d-block btn-md rounded-1 w-100 direct-add-to-cart-btn add-to-cart-text">Добавить в корзину</a>
                <?php endif; ?>
            </form>
        <?php endif; ?>
    </div>
</div>
<?php /**PATH F:\LARAVEL PROJECT\cgrostorefoodgrocerylaravel 92\resources\views/frontend/default/pages/partials/products/trending-product-card.blade.php ENDPATH**/ ?>