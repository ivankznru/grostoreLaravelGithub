<?php if(productBasePrice($product) == discountedProductBasePrice($product)): ?>
    <?php if(productBasePrice($product) == productMaxPrice($product)): ?>
        <span class="fw-bold h4 text-danger"><?php echo e(formatPrice(productBasePrice($product))); ?></span>
    <?php else: ?>
        <span class="fw-bold h4 text-danger"><?php echo e(formatPrice(productBasePrice($product))); ?></span>
        -
        <span class="fw-bold h4 text-danger"><?php echo e(formatPrice(productMaxPrice($product))); ?></span>
    <?php endif; ?>
<?php else: ?>
    <?php if(discountedProductBasePrice($product) == discountedProductMaxPrice($product)): ?>
        <span class="fw-bold h4 text-danger"><?php echo e(formatPrice(discountedProductBasePrice($product))); ?></span>
    <?php else: ?>
        <span class="fw-bold h4 text-danger"><?php echo e(formatPrice(discountedProductBasePrice($product))); ?></span>
        -
        <span class="fw-bold h4 text-danger"><?php echo e(formatPrice(discountedProductMaxPrice($product))); ?></span>
    <?php endif; ?>

    <?php if(isset($br)): ?>
        <br>
    <?php endif; ?>

    <?php if(!isset($onlyPrice) || $onlyPrice == false): ?>
        <?php if(productBasePrice($product) == productMaxPrice($product)): ?>
            <span
                class="fw-bold h4 deleted text-muted <?php echo e(isset($br) ? '' : 'ms-1'); ?>"><?php echo e(formatPrice(productBasePrice($product))); ?></span>
        <?php else: ?>
            <span
                class="fw-bold h4 deleted text-muted <?php echo e(isset($br) ? '' : 'ms-1'); ?>"><?php echo e(formatPrice(productBasePrice($product))); ?></span>
            -
            <span class="fw-bold h4 deleted text-muted ms-1"><?php echo e(formatPrice(productMaxPrice($product))); ?></span>
        <?php endif; ?>
    <?php endif; ?>
<?php endif; ?>

<?php if($product->unit): ?>
    <small>/<?php echo e($product->unit->collectLocalization('name')); ?></small>
<?php endif; ?>
<?php /**PATH F:\LARAVEL PROJECT\cgrostorefoodgrocerylaravel 92\resources\views/frontend/default/pages/partials/products/pricing.blade.php ENDPATH**/ ?>